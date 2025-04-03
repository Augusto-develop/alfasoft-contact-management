@extends('layouts.app')

@section('content')
    <div class="max-w-2xl mx-auto mt-10 p-6 bg-white dark:bg-gray-800 shadow-lg rounded-lg">
        <h2 class="text-3xl font-semibold text-gray-800 dark:text-gray-200 mb-4">{{ $contact->name }}</h2>

        <div class="space-y-2">
            <p class="text-lg text-gray-700 dark:text-gray-300"><strong>Phone:</strong>
                {{ \App\Helpers\PhoneHelper::formatPhone($contact->phone) }}
            </p>
            <p class="text-lg text-gray-700 dark:text-gray-300"><strong>Email:</strong> {{ $contact->email }}</p>
        </div>

        <div class="mt-6 flex space-x-4">
            <a href="{{ route('contacts.edit', $contact) }}"
                class="px-4 py-2 bg-blue-500 text-white font-bold rounded-lg hover:bg-blue-600 transition">
                Edit
            </a>

            <form action="{{ route('contacts.destroy', $contact) }}" method="POST"
                onsubmit="return confirm('Tem certeza que deseja excluir este contato?');">
                @csrf
                @method('DELETE')
                <button type="submit"
                    class="ml-1 px-4 py-2 bg-red-500 text-white font-bold rounded-lg hover:bg-red-600 transition">
                    Delete
                </button>
            </form>
        </div>
    </div>
@endsection
