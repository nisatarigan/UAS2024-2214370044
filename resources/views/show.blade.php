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
        <h1 class="text-3xl font-bold mb-4">{{ $article->judul }}</h1>

        <img src="/storage/{{ $article->gambar }}" alt="{{ $article->judul }}" class="rounded-lg w-full mb-4">

        <p class="text-gray-600 mb-4">Kategori: {{ $article->kategori }}</p>
        <p class="text-gray-600 mb-6">Ditulis oleh {{ $article->user->name }}</p>
        <p class="text-gray-800 leading-relaxed mb-6">{{ $article->artikel }}</p>

        <div class="flex space-x-4 mb-6">
            <a href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}"
                class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md transition duration-300 ease-in-out">
                Share on Facebook
            </a>
            <a href="https://twitter.com/intent/tweet?url={{ url()->current() }}&text={{ $article->judul }}"
                class="bg-blue-400 hover:bg-blue-500 text-white px-4 py-2 rounded-md transition duration-300 ease-in-out">
                Share on Twitter
            </a>
            <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ url()->current() }}"
                class="bg-blue-700 hover:bg-blue-800 text-white px-4 py-2 rounded-md transition duration-300 ease-in-out">
                Share on LinkedIn
            </a>
        </div>

        @auth
        @if (auth()->user()->id === $article->user_id)
        <div class="flex space-x-4 mb-4">
            <a href="{{ route('artikel.edit', $article->id) }}"
                class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-md transition duration-300 ease-in-out">
                Edit Artikel
            </a>
            <form action="{{ route('artikel.destroy', $article->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit"
                    class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-md transition duration-300 ease-in-out"
                    onclick="return confirm('Anda yakin ingin menghapus artikel ini?')">Hapus Artikel</button>
            </form>
        </div>
        @endif
        @endauth

        <div class="bg-gray-100 rounded-lg p-4">
            <h2 class="text-xl font-semibold mb-4">Komentar</h2>
            @forelse ($article->comments as $comment)
            <div class="bg-white shadow-md rounded-lg p-4 mb-4">
                <p class="text-gray-800">{{ $comment->body }}</p>
                <p class="text-gray-600 text-sm mt-2">Ditulis oleh {{ $comment->user->name }} pada
                    {{ $comment->created_at->format('d M Y H:i') }}</p>
            </div>
            @empty
            <p class="text-gray-600">Belum ada komentar untuk artikel ini.</p>
            @endforelse

            <form action="{{ route('comments.store', $article->id) }}" method="POST" class="mt-6">
                @csrf
                <textarea name="body" rows="3"
                    class="w-full border-gray-300 rounded-md p-2 focus:outline-none focus:border-gray-400"
                    placeholder="Tulis komentar Anda"></textarea>
                <button type="submit"
                    class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md mt-2">Kirim
                    Komentar</button>
            </form>
        </div>
    </div>
</div>
@endsection
