<a {{ $attributes }}
   class="{{ $active ? 'bg-blue-400 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }} block rounded-md px-3 py-2 text-base font-medium"
   aria-current="page">
   {{ $slot }}
</a>
