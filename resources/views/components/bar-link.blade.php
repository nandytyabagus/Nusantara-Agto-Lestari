@props(['active' => false])

<a class="{{ $active ? 'bg-[#1474A7] text-white' : 'bg-white hover:bg-blue-50 text-textsidebar hover:text-blue-400' }} flex px-[20px] py-[16px] items-center text-sm rounded-lg"
    aria-current="{{ $active ? 'page' : false }}" {{ $attributes }}>{{ $icon }} {{ $slot }}</a>
