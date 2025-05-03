<x-layouts.admin>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
        @csrf
        <button type="submit" class="hidden">Logout</button>
    </form>
    <a href="#" class="m-3" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        Logout
    </a>
</x-layouts.admin>
