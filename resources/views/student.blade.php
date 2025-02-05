<x-layout>
    <x-slot:title>
        {{ $title }}
    </x-slot:title>
    <form action="{{ route('students.search2') }}" method="GET" class="mb-4">
        <input type="text" name="query" placeholder="Search students..." class="border rounded-lg p-2 pl-10" />
        <button type="submit" class="bg-blue-500 text-white rounded-lg p-2">Search</button>
    </form>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kelas</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Departemen</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Alamat</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($students as $student)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{$student->id}}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{$student->name}}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{$student->grade_student->name}}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{$student->grade_student->departmen->name}}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{$student->email}}</td>
                                <td class="px-6 py-4 text-sm text-gray-500">{{$student->address}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-layout>
