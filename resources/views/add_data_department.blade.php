<x-admin-layout>
    <x-slot name="title">
        Add New Department
    </x-slot>

    <div class="bg-white rounded-lg shadow-lg">
        <div class="p-6 border-b border-gray-200 flex items-center gap-3">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
            </svg>
            <h2 class="text-2xl font-bold text-gray-800">Add New Department</h2>
        </div>

        <div class="p-6">
            <form action="{{ route('department.store') }}" method="POST" class="max-w-3xl mx-auto space-y-6">
                @csrf
                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                    <div class="sm:col-span-2">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Department Name</label>
                        <input type="text"
                               name="name"
                               id="name"
                               value="{{ old('name') }}"
                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                               placeholder="Enter department name"
                               required>
                        @error('name')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="sm:col-span-2">
                        <label for="desc" class="block mb-2 text-sm font-medium text-gray-900">Description</label>
                        <textarea id="desc"
                                  name="desc"
                                  rows="4"
                                  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                  placeholder="Enter department description">{{ old('desc') }}</textarea>
                        @error('desc')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="flex justify-end gap-3">
                    <a href="{{ url('admin/departmen') }}"
                       class="px-5 py-2.5 bg-gray-500 text-white rounded-lg hover:bg-gray-600 transition-all duration-200 font-medium inline-flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        Cancel
                    </a>
                    <button type="submit"
                            class="px-5 py-2.5 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-all duration-200 font-medium inline-flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        Add Department
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout> 