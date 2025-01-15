<a {{ $attributes }}
    class="{{ $active ? 'bg-blue-400 text-white' : 'text-blue-400 hover:bg-blue-400 hover:text-white' }} rounded-md px-3 py-2 text-sm font-medium"
    aria-current="{{$active ? 'page' : false }}">
    {{ $slot }}
</a>
