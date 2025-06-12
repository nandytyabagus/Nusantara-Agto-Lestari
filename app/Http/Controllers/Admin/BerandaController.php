<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Produk;
use App\Models\Ulasan;
use App\Models\Artikel;
use App\Models\Kategori;
use App\Models\Pelatihan;
use Illuminate\Http\Request;
use App\Models\DetailPelatihan;
use App\Http\Controllers\Controller;
use App\View\Components\Layouts\admin;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class BerandaController extends Controller
{
    public function ShowViewAdmin()
    {
        $produk = Produk::count();
        $artikel = Artikel::count();
        $pelatihan = Pelatihan::count();
        $user = User::where('role', 'pelanggan')->count();
        $admin = User::where('role', 'admin')->first();

        $produkPerKategori = Kategori::withCount('produks')->get();
        $kategoriLabels = $produkPerKategori->pluck('nama')->toArray();
        $produkCountPerKategori = $produkPerKategori->pluck('produks_count')->toArray();

        // Data artikel per bulan tahun ini
        $year = now()->year;
        $artikelPerBulan = [];
        $ulasanPerBulan = [];
        $bulanLabels = [];
        $ulasanProdukPerBulan = [];
        $ulasanPelatihanPerBulan = [];
        $pendaftarPerBulan = [];

        for ($i = 1; $i <= 12; $i++) {
            $artikelCount = Artikel::whereYear('created_at', $year)
                ->whereMonth('created_at', $i)
                ->count();
            $ulasanCount = Ulasan::whereYear('created_at', $year)
                ->whereMonth('created_at', $i)
                ->count();
            // Ulasan produk (misal tipe_ulasan_id = 1)
            $totalUlasanProduk = Ulasan::where('tipe_ulasan_id', 1)->count();
            // Ulasan pelatihan (misal tipe_ulasan_id = 2)
            $totalUlasanPelatihan = Ulasan::where('tipe_ulasan_id', 2)->count();

            // Tambahkan ini untuk chart line pendaftar
            $jumlahPendaftar = DetailPelatihan::whereYear('created_at', $year)
                ->whereMonth('created_at', $i)
                ->count();
            $pendaftarPerBulan[] = $jumlahPendaftar;

            $artikelPerBulan[] = $artikelCount;
            $ulasanPerBulan[] = $ulasanCount;
            $ulasanProdukPerBulan[] = $totalUlasanProduk;
            $ulasanPelatihanPerBulan[] = $totalUlasanPelatihan;
            $bulanLabels[] = Carbon::create()->month($i)->locale('id')->isoFormat('MMMM');
        }

        // Chart Artikel
        $chartArtikel = (new LarapexChart)->barChart()
            ->setTitle('Pembuatan Artikel per Bulan ' . $year)
            ->setXAxis($bulanLabels)
            ->setDataset([
                [
                    'name' => 'Artikel',
                    'data' => $artikelPerBulan
                ]
            ])->setHeight(350);

        // Chart Ulasan
        $chartUlasan = (new LarapexChart)->barChart()
            ->setTitle('Upload Ulasan per Bulan ' . $year)
            ->setXAxis($bulanLabels)
            ->setDataset([
                [
                    'name' => 'Ulasan',
                    'data' => $ulasanPerBulan
                ]
            ])->setHeight(350);

        // Chart Perbandingan Ulasan Produk vs Pelatihan
        $chartDonatUlasan = (new LarapexChart)->donutChart()
            ->setTitle('Total Ulasan Produk & Pelatihan')
            ->setLabels(['Ulasan Produk', 'Ulasan Pelatihan'])
            ->setDataset([$totalUlasanProduk, $totalUlasanPelatihan]);

        $chartProdukKategori = (new LarapexChart)->donutChart()
            ->setTitle('Jumlah Produk per Kategori')
            ->setLabels($kategoriLabels)
            ->setDataset($produkCountPerKategori);

        $chartLinePendaftar = (new LarapexChart)->lineChart()
            ->setTitle('Jumlah Pendaftar Pelatihan per Bulan ' . $year)
            ->setXAxis($bulanLabels)
            ->setDataset([
                [
                    'name' => 'Pendaftar',
                    'data' => $pendaftarPerBulan
                ]
            ])->setHeight(300);

        $chartDonatTotal = (new LarapexChart)->donutChart()
            ->setTitle('Total Produk, Artikel, dan Pelatihan')
            ->setLabels(['Produk', 'Artikel', 'Pelatihan'])
            ->setDataset([$produk, $artikel, $pelatihan]);

        return view('admin.beranda.beranda', compact(
            'produk', 'artikel', 'pelatihan', 'user', 'admin',
            'chartArtikel', 'chartUlasan', 'chartDonatUlasan',
            'chartProdukKategori', 'produkPerKategori', 'chartLinePendaftar',
            'chartDonatTotal'
        ));
    }
}