<x-admin-layout>
    <x-slot name="title">
        Edit Student
    </x-slot>

    <div class="bg-gray-50 rounded-xl shadow-md">
        <div class="p-8 border-b border-gray-200 flex items-center gap-4 bg-gray-100">
            <div class="p-3 bg-gray-200 rounded-lg">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
            </div>
            <div>
                <h2 class="text-2xl font-bold text-gray-700">Edit Student Profile</h2>
                <p class="text-gray-500">{{ $student->name }}</p>
            </div>
        </div>

        <div class="p-8">
            <form action="{{ route('students.update', $student->id) }}" method="POST" class="max-w-3xl mx-auto space-y-8">
                @csrf
                @method('PUT')
                <div class="grid gap-6 sm:grid-cols-2">
                    <div class="sm:col-span-2 bg-white p-6 rounded-lg shadow-sm">
                        <div class="flex items-center gap-3 mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                            <label for="name" class="text-sm font-medium text-gray-700">Full Name</label>
                        </div>
                        <input type="text"
                               name="name"
                               id="name"
                               value="{{ old('name', $student->name) }}"
                               class="bg-gray-50 border border-gray-200 text-gray-900 text-sm rounded-lg focus:ring-gray-400 focus:border-gray-400 block w-full p-3 transition duration-150"
                               placeholder="Enter student's full name"
                               required>
                        @error('name')
                            <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="sm:col-span-2 bg-white p-6 rounded-lg shadow-sm">
                        <div class="flex items-center gap-3 mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>
                            <label for="grade_student_id" class="text-sm font-medium text-gray-700">Grade/Class</label>
                        </div>
                        <select id="grade_student_id"
                                name="grade_student_id"
                                class="bg-gray-50 border border-gray-200 text-gray-900 text-sm rounded-lg focus:ring-gray-400 focus:border-gray-400 block w-full p-3 transition duration-150">
                            <option value="">Select grade level</option>
                            @foreach($grade_students as $grade)
                                <option value="{{ $grade->id }}" {{ (old('grade_student_id', $student->grade_student_id) == $grade->id) ? 'selected' : '' }}>
                                    {{ $grade->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('grade_student_id')
                            <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="sm:col-span-2 bg-white p-6 rounded-lg shadow-sm">
                        <div class="flex items-center gap-3 mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            <label for="email" class="text-sm font-medium text-gray-700">Email Address</label>
                        </div>
                        <input type="email"
                               name="email"
                               id="email"
                               value="{{ old('email', $student->email) }}"
                               class="bg-gray-50 border border-gray-200 text-gray-900 text-sm rounded-lg focus:ring-gray-400 focus:border-gray-400 block w-full p-3 transition duration-150"
                               placeholder="student@example.com"
                               required>
                        @error('email')
                            <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="sm:col-span-2 bg-white p-6 rounded-lg shadow-sm">
                        <div class="flex items-center gap-3 mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <label for="address" class="text-sm font-medium text-gray-700">Complete Address</label>
                        </div>
                        <textarea id="address"
                                  name="address"
                                  rows="4"
                                  class="bg-gray-50 border border-gray-200 text-gray-900 text-sm rounded-lg focus:ring-gray-400 focus:border-gray-400 block w-full p-3 transition duration-150"
                                  placeholder="Enter complete address">{{ old('address', $student->address) }}</textarea>
                        @error('address')
                            <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="flex justify-end gap-4 pt-4">
                    <a href="{{ url('admin/student') }}"
                       class="px-6 py-3 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition-all duration-200 font-medium inline-flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                        Cancel
                    </a>
                    <button type="submit"
                            class="px-6 py-3 bg-gray-700 text-white rounded-lg hover:bg-gray-800 transition-all duration-200 font-medium inline-flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4" />
                        </svg>
                        Save Changes
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>