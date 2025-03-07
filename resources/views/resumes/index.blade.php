<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Resumes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a href="{{ route('resumes.create') }}" class="btn btn-primary">Create Resume</a>
                    
                    <table class="table-auto w-full mt-4">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">Title</th>
                                <th class="px-4 py-2">Created At</th>
                                <th class="px-4 py-2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($resumes as $resume)
                                <tr>
                                    <td class="border px-4 py-2">{{ $resume->title }}</td>
                                    <td class="border px-4 py-2">{{ $resume->created_at }}</td>
                                    <td class="border px-4 py-2">
                                        <a href="{{ route('resumes.edit', $resume->id) }}" class="btn btn-secondary">Edit</a>
                                        <a href="{{ route('resumes.show', $resume->id) }}" class="btn btn-info">View</a>
                                        <form action="{{ route('resumes.destroy', $resume->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
