@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <div class="flex items-center mb-6">
        <a href="{{ route('dashboard') }}" class="text-black flex items-center focus:outline-none">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mr-2" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd"
                    d="M5.707 10l5.147-5.146a.5.5 0 01.708.708L7.707 10l3.853 3.854a.5.5 0 01-.708.708l-5.147-5.146a.5.5 0 010-.708z"
                    clip-rule="evenodd" />
            </svg>
            Back to Dashboard
        </a>
    </div>

    <div class="bg-white shadow-md rounded-lg p-6">
        <h2 class="text-3xl font-bold mb-6">Edit Article</h2>
        <form action="{{ route('artikel.update', $article->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="judul" class="block text-sm font-medium text-gray-700">Title</label>
                <input type="text" id="judul" name="judul"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50"
                    value="{{ $article->judul }}" required>
            </div>

            <div class="mb-4">
                <label for="kategori" class="block text-sm font-medium text-gray-700">Category</label>
                <input type="text" id="kategori" name="kategori"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50"
                    value="{{ $article->kategori }}" required>
            </div>

            <div class="mb-4">
                <label for="artikel" class="block text-sm font-medium text-gray-700">Content</label>
                <textarea id="artikel" name="artikel"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50"
                    rows="6" required>{{ $article->artikel }}</textarea>
            </div>

            <div class="mb-4">
                <label for="gambar" class="block text-sm font-medium text-gray-700">Image</label>
                <input type="file" id="gambar" name="gambar"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50">
                @if ($article->gambar)
                <img src="/storage/{{ $article->gambar }}" alt="{{ $article->judul }}"
                    class="mt-2 w-32 h-auto object-cover">
                @endif
            </div>

            <div class="flex justify-end">
                <button type="submit"
                    class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-md transition duration-300 ease-in-out">Update
                    Article</button>
            </div>
        </form>
    </div>
</div>
@endsection
