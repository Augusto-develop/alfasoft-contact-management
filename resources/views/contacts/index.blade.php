@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto mt-10 bg-white dark:bg-gray-800 p-6 rounded-lg shadow"
        style="min-height: calc(100vh - 130px);">
        <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-200 mb-4">Contact List</h2>

        <a href="{{ route('contacts.create') }}"
            class="inline-block bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600 transition">
            New Contact
        </a>

        @if ($contacts->isEmpty())
            <p class="mt-4 text-gray-600 dark:text-gray-300">No contacts found.</p>
        @else
            <ul class="mt-4 space-y-4">
                @foreach ($contacts as $contact)
                    <li class="flex items-center justify-between p-4 bg-gray-100 dark:bg-gray-700 rounded-md mt-1">
                        <span class="text-gray-800 dark:text-gray-200">
                            {{ $contact->name }} - {{ $contact->email }}
                        </span>
                        <div class="flex space-x-2">
                            <a href="{{ route('contacts.show', ['contact' => $contact->id]) }}"
                                class="inline-block bg-pink-500 text-white px-3 py-1 rounded-md hover:bg-pink-600 transition">
                                View
                            </a>
                            <a href="{{ route('contacts.edit', ['contact' => $contact->id]) }}"
                                class="inline-block bg-blue-500 text-white px-3 py-1 rounded-md hover:bg-blue-600 transition">
                                Edit
                            </a>
                            <form action="{{ route('contacts.destroy', ['contact' => $contact->id]) }}" method="POST"
                                class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="bg-red-500 text-white px-3 py-1 rounded-md hover:bg-red-600 transition"
                                    onclick="return confirm('Tem certeza que deseja excluir?')">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
@endsection
