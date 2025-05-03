@props(['active' => false])

<a class="{{ $active ? 'font-semibold' : 'font-normal' }} text-logo" aria-current="{{ $active ? 'page' : false }}"
    {{ $attributes }}>{{ $slot }}</a>
