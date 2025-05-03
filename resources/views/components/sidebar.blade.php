<div class="bg-white pt-[12px] px-[25px]">
    <div class="flex items-center space-x-[8px] mb-[32px]">
        <img src="{{ asset('images/logo_nusantara.webp') }}" alt="logo" loading="lazy" class="w-[40px] h-[40px]">
        <h1 class="text-[12px] text-text font-bold">{{ config('app.name') }}</h1>
    </div>

    <h2 class="ml-[17px] mb-[24px] text-[16px]">Administrator</h2>

    <div class="flex flex-col space-y-3">
        <x-bar-link href="{{ Route('BerandaAdmin') }}" :active="request()->routeIs('BerandaAdmin')"><x-slot name="icon">
                <x-akar-dashboard class="w-[24px] h-[24px] mr-[16px]" />Beranda</x-bar-link>

        <x-bar-link href="{{ Route('ProdukAdmin') }}" :active="request()->routeIs('ProdukAdmin')"><x-slot name="icon">
                <x-solar-bag-4-outline class="w-[24px] h-[24px] mr-[16px]" />Produk</x-bar-link>

        <x-bar-link href="{{ Route('ArtikelAdmin') }}" :active="request()->routeIs('ArtikelAdmin')"><x-slot name="icon">
                <x-heroicon-o-document-text class="w-[24px] h-[24px] mr-[16px]" />Artikel</x-bar-link>

        <x-bar-link href="{{ Route('PelatihanAdmin') }}" :active="request()->routeIs('PelatihanAdmin')"><x-slot name="icon">
                <x-solar-users-group-two-rounded-outline class="w-[24px] h-[24px] mr-[16px]" />Pelatihan</x-bar-link>

        <x-bar-link href="{{ Route('UlasanAdmin') }}" :active="request()->routeIs('UlasanAdmin')"><x-slot name="icon">
                <x-majestic-analytics-line class="w-[24px] h-[24px] mr-[16px]" />Ulasan</x-bar-link>
    </div>
</div>
