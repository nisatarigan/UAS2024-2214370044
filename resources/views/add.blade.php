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
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <h2 class="text-3xl font-bold mb-4">Tambah Artikel Baru</h2>
            <form action="{{ route('artikel.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label for="judul" class="block text-gray-700 text-sm font-bold mb-2">Judul:</label>
                    <input type="text" id="judul" name="judul" class="border-2 border-gray-200 rounded-md p-2 w-full">
                </div>
                <div class="mb-4">
                    <label for="judul" class="block text-gray-700 text-sm font-bold mb-2">Kategori:</label>
                    <input type="text" id="kategori" name="kategori" class="border-2 border-gray-200 rounded-md p-2 w-full">
                </div>
                <div class="mb-4">
                    <label for="konten" class="block text-gray-700 text-sm font-bold mb-2">Artikel:</label>
                    <textarea id="artikel" name="artikel" class="border-2 border-gray-200 rounded-md p-2 w-full h-32"></textarea>
                </div>
                <div class="mb-4">
                    <label for="gambar" class="block text-gray-700 text-sm font-bold mb-2">Gambar:</label>
                    <input type="file" id="gambar" name="gambar" accept="image/*">
                </div>
                <div class="flex justify-end">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection
