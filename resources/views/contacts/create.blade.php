@extends('layouts.app')

@section('content')
    <div class="content-form max-w-2xl mx-auto mt-10 p-6 bg-white dark:bg-gray-800 shadow-lg"
        style="min-height: calc(100vh - 130px);">
        <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-200 mb-4">
            {{ isset($contact) ? 'Editar Contato' : 'Novo Contato' }}
        </h2>

        <form action="{{ isset($contact) ? route('contacts.update', $contact) : route('contacts.store') }}" method="POST"
            class="space-y-4">
            @csrf
            @if (isset($contact))
                @method('PUT')
            @endif

            <!-- Nome -->
            <div>
                <label class="block text-gray-700 dark:text-gray-300 font-medium">Nome:</label>
                <input type="text" name="name" value="{{ old('name', $contact->name ?? '') }}" required
                    class="w-full mt-1 p-2 border rounded-md bg-gray-100 dark:bg-gray-700 text-gray-900 dark:text-gray-200 focus:ring focus:ring-indigo-300 dark:focus:ring-indigo-600">

                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Telefone -->
            <div>
                <label class="block text-gray-700 dark:text-gray-300 font-medium">Telefone:</label>
                <input type="text" name="phone" value="{{ old('phone', $contact->phone ?? '') }}" required
                    maxlength="9" pattern="\d*" oninput="this.value = this.value.replace(/\D/g, '').slice(0,9)"
                    class="w-full mt-1 p-2 border rounded-md bg-gray-100 dark:bg-gray-700 text-gray-900 dark:text-gray-200 focus:ring focus:ring-indigo-300 dark:focus:ring-indigo-600">

                @error('phone')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Email -->
            <div>
                <label class="block text-gray-700 dark:text-gray-300 font-medium">Email:</label>
                <input type="email" name="email" value="{{ old('email', $contact->email ?? '') }}" required
                    class="w-full mt-1 p-2 border rounded-md bg-gray-100 dark:bg-gray-700 text-gray-900 dark:text-gray-200 focus:ring focus:ring-indigo-300 dark:focus:ring-indigo-600">

                @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Botões -->
            <div class="flex gap-4">
                <button type="submit"
                    class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded-lg transition">
                    Salvar
                </button>

                <a href="{{ route('contacts.index') }}"
                    class="w-full text-center bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded-lg transition">
                    Cancelar
                </a>
            </div>
        </form>
    </div>
@endsection
