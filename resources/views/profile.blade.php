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

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="bg-white shadow-md rounded-lg p-6">
                <div class="flex items-center mb-4">
                    <img src="/storage/{{ Auth::user()->profile_picture }}" alt="{{ Auth::user()->name }}"
                        class="w-16 h-16 rounded-full mr-4">
                    <div>
                        <h1 class="text-3xl font-bold">{{ Auth::user()->name }}</h1>
                        <p class="text-gray-600">{{ Auth::user()->email }}</p>
                    </div>
                </div>
                <div class="flex space-x-4 mb-4">
                    <a href=""
                        class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-6 rounded-md transition duration-300 ease-in-out">Edit
                        Profile</a>
                        <a href="{{route('logout')}}"
                        class="bg-red-500 hover:bg-blue-600 text-white py-2 px-6 rounded-md transition duration-300 ease-in-out">Logout</a>
                </div>
            </div>

            <div class="grid grid-cols-1 gap-6 lg:col-span-2">
                <h2 class="text-3xl font-bold mb-6">My Articles</h2>
                <div class="grid grid-cols-1 gap-6">
                    @foreach ($articles as $article)
                        <div class="bg-white overflow-hidden shadow-lg rounded-lg">
                            <img src="/storage/{{ $article->gambar }}" alt="{{ $article->judul }}"
                                class="w-full h-48 object-cover">
                            <div class="p-6">
                                <h3 class="text-xl font-bold mb-2">{{ $article->judul }}</h3>
                                <p class="text-gray-600">{{ $article->kategori }}</p>
                                <div class="grid grid-cols-3 w-fit gap-4 mt-4">
                                    <a href="{{ route('show', $article->id) }}"
                                        class="bg-green-500 hover:bg-blue-600 text-white py-2 px-4 rounded-md transition duration-300 ease-in-out">Read
                                        Article</a>
                                    <a href="{{ route('artikel.edit', $article->id) }}"
                                        class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-md transition duration-300 ease-in-out">Edit
                                        Article</a>
                                    <button onclick="openDeleteModal({{ $article->id }})"
                                        class="bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded-md transition duration-300 ease-in-out">Delete</button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div id="deleteModal"
            class="fixed inset-0 z-50 items-center justify-center bg-black bg-opacity-50 overflow-y-auto hidden">
            <div class="bg-white p-6 rounded-lg shadow-lg max-w-md w-full">
                <div class="text-center">
                    <h3 class="text-xl font-bold mb-4">Are you sure?</h3>
                    <p class="text-gray-700">This action cannot be undone.</p>
                </div>
                <div class="mt-6 flex justify-center space-x-4">
                    <form id="deleteForm" action="" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="bg-red-500 hover:bg-red-600 text-white py-2 px-6 rounded-md transition duration-300 ease-in-out">Delete</button>
                    </form>
                    <button onclick="closeDeleteModal()"
                        class="bg-gray-300 hover:bg-gray-400 text-gray-800 py-2 px-6 rounded-md transition duration-300 ease-in-out">Cancel</button>
                </div>
            </div>
        </div>

        <script>
            function openDeleteModal(articleId) {
                var deleteForm = document.getElementById('deleteForm');
                deleteForm.action = '/artikel/' + articleId;

                document.getElementById('deleteModal').classList.remove('hidden');
                document.getElementById('deleteModal').classList.add('flex');
            }

            function closeDeleteModal() {
                document.getElementById('deleteModal').classList.remove('flex');
                document.getElementById('deleteModal').classList.add('hidden');
            }
        </script>
    </div>
@endsection
