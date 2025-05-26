<?php

namespace App\Http\Controllers\Customer;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Ulasan;
use App\Models\Pelatihan;
use Illuminate\Http\Request;
use App\Models\DetailPelatihan;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\View\Components\Layouts\admin;
use RealRashid\SweetAlert\Facades\Alert;

class PelatihanController extends Controller
{
    public function ShowView()
    {
        $pelatihans = Pelatihan::orderBy('created_at', 'desc')->get();

        $semuaulasans = Ulasan::with('user')->where('tipe_ulasan_id', 2)->orderBy('created_at', 'desc')->get();

        $user = Auth::user();
        $waktuBatas = Carbon::now()->subMinutes(5);

        if ($user) {
            $ulasanBaruUser = $semuaulasans->filter(function ($ulasan) use ($user, $waktuBatas) {
                return $ulasan->user_id === $user->id && $ulasan->created_at >= $waktuBatas;
            });

            $ulasanLain = $semuaulasans->filter(function ($ulasan) use ($ulasanBaruUser) {
                return !$ulasanBaruUser->contains($ulasan);
            });

            $ulasans = $ulasanBaruUser->concat($ulasanLain);
        } else {
            $ulasans = $semuaulasans;
        }

        return view('customer.pelatihan.pelatihan', compact('pelatihans', 'ulasans'));
    }

    public function detailPelatihan($id)
    {
        if (!Auth::check()) {
            Alert::warning('Peringatan', 'harap masuk terlebih dahulu!')->position('top')->autoClose(5000)->hideCloseButton();
            return back();
        }

        $user = Auth::user();

        $admin = User::where('role', 'admin')->first();

        $pelatihans = Pelatihan::with(['detailPelatihans' => function ($query) {
            $query->where('status', 'lunas')->with('user');
            }])->findOrFail($id);

        $jumlahPeserta = $pelatihans->detailPelatihans->count();
        $sisaKuota = $pelatihans->kuota - $jumlahPeserta;

        $exists = detailPelatihan::where('user_id', $user->id)->where('pelatihan_id', $id)->exists();
        // dd($exists);

        return view('customer.pelatihan.detail-pelatihan', compact('pelatihans', 'exists', 'sisaKuota', 'user', 'admin'));
    }

    public function cekUser()
    {
    $user = Auth::user();
    if (empty($user->name) || empty($user->email) || empty($user->nomor)) {
        return response()->json([
            'status' => 'error',
            'message' => 'Lengkapi data profil Anda terlebih dahulu!'
        ]);
    }
    return response()->json(['status' => 'ok']);
    }

    public function daftarPelatihan($id)
    {
        $user = Auth::user();
        DetailPelatihan::create([
            'user_id' => $user->id,
            'pelatihan_id' => $id
        ]);

        toast('Anda telah terdaftar pelatihan ini!', 'success')->autoClose(3000)->position('top-end')->hideCloseButton();
        return redirect()->back();
    }

    public function ShowViewRiwayatPelatihan(Request $request, $id)
    {
        $query = DetailPelatihan::where('user_id', $id)
            ->with('pelatihan');

        if ($request->has('search') && $request->search != '') {
            $query->whereHas('pelatihan', function ($q) use ($request) {
                $q->where('judul_pelatihan', 'like', '%' . $request->search . '%');
            });
        }

        $sortOrder = $request->get('sort', 'asc');
        $query->orderBy('created_at', $sortOrder);

        $pelatihans = $query->get();

        return view('customer.pelatihan.riwayat-pelatihan', compact('pelatihans', 'id'));
    }

}