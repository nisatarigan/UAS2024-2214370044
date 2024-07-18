@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6">

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <div class="flex items-center">
                    <div class="bg-blue-500 text-white rounded-full p-3">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 4a1 1 0 011-1h16a1 1 0 011 1v16a1 1 0 01-1 1H4a1 1 0 01-1-1V4z"></path>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <h4 class="text-2xl font-bold">{{ $articlesCount }}</h4>
                        <p class="text-gray-600">Total Articles</p>
                    </div>
                </div>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-lg">
                <div class="flex items-center">
                    <div class="bg-green-500 text-white rounded-full p-3">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5.121 17.804A13.937 13.937 0 0112 15c3.473 0 6.627 1.263 9.379 3.367M7.5 7.5a2.5 2.5 0 115 0 2.5 2.5 0 01-5 0m-4.5 6.5a6 6 0 1112 0 6 6 0 01-12 0z">
                            </path>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <h4 class="text-2xl font-bold">{{ $usersCount }}</h4>
                        <p class="text-gray-600">Total Users</p>
                    </div>
                </div>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-lg">
                <div class="flex items-center">
                    <div class="bg-red-500 text-white rounded-full p-3">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 8h2a2 2 0 012 2v10a2 2 0 01-2 2h-2m-4 0H7a2 2 0 01-2-2V10a2 2 0 012-2h2m4 0V4a2 2 0 00-2-2H7a2 2 0 00-2 2v4m8 0H7"></path>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <h4 class="text-2xl font-bold">{{ $commentsCount }}</h4>
                        <p class="text-gray-600">Total Comments</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="relative mx-auto">
            <div class="container mx-auto mb-4 mt-10 flex items-center">
                <div class="w-full lg:w-2/1">
                    <form id="searchForm" method="GET" action="{{ route('dashboard') }}">
                        <div class="lg:flex items-center">
                            <input type="text" name="search" placeholder="Search..."
                                class="lg:mr-2 px-4 py-2 border bg-primary border-secondary rounded-full focus:outline-none focus:border-secondary flex-1 mb-2 lg:mb-0">
                            <button type="submit"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg ml-2">Search</button>
                        </div>
                    </form>
                </div>
            </div>

        <div class="bg-white p-6 rounded-lg shadow-lg mb-6">
            <h2 class="text-3xl font-bold mb-4">Recent Articles</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($recentArticles as $article)
                    <div class="bg-gray-100 p-4 rounded-lg shadow-md">
                        <div class="mb-2">
                            <img src="/storage/{{ $article->gambar }}" alt="{{ $article->judul }}"
                                class="w-full h-48 object-cover rounded-md">
                        </div>
                        <h3 class="text-xl font-bold">{{ $article->judul }}</h3>
                        <p class="text-gray-600 text-xl mb-2">Author : {{ $article->user->name }}</p>
                        <p class="text-gray-700">{{ Str::limit($article->artikel, 10) }}</p>
                        <a href="{{ route('show', $article->id) }}"
                            class="text-blue-500 hover:underline mt-2 inline-block">Read More</a>
                    </div>
                @endforeach
            </div>

            <div class="container mt-12 mx-auto">
                <button type="button"
                        class="w-fit flex items-center px-4 py-2 bg-gray-200 text-black rounded-md hover:bg-primary focus:outline-none "><a
                            href="{{ route('artikel') }}">Upload Artikel</a>
        
                        <svg class="h-4 w-4 inline-block ml-1 -mt-0.3" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v12m-6-6h12">
                            </path>
                        </svg>
                    </button>
                </div>
        </div>
    </div>
@endsection
