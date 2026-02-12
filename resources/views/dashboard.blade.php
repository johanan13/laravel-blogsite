@extends('layouts.app')

@section('content')
@if (session('success'))
<div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)"
     class="fixed top-20 right-5 bg-green-500 text-white py-2 px-4 rounded-xl text-sm">
    <p>{{ session('success') }}</p>
</div>
@endif
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 flex justify-between items-center">
                <div>
                    <h1 class="text-3xl font-bold text-gray-800 dark:text-gray-200">Welcome Back, {{ auth()->user()->name }}!</h1>
                    <p class="text-gray-600 dark:text-gray-400">You are logged in.</p>
                </div>
            </div>
        </div>

        <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6">
                <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-200 mb-4">Create a New Post</h2>
                <form action="{{ route('posts.create') }}" method="POST" class="space-y-4">
                    @csrf
                    <input type="text" name="title" placeholder="Post title" value="{{ old('title') }}"
                           class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600 dark:bg-gray-700 dark:text-gray-200 dark:border-gray-600 @error('title') border-red-500 @enderror">
                    @error('title')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                    @enderror
                    <textarea name="body" placeholder="Body content..."
                              class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600 dark:bg-gray-700 dark:text-gray-200 dark:border-gray-600 @error('body') border-red-500 @enderror">{{ old('body') }}</textarea>
                    @error('body')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                    @enderror
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Save Post</button>
                </form>
            </div>
        </div>

        <div class="mt-8" x-data="{ activeTab: 'all' }">
            <div class="border-b border-gray-200 dark:border-gray-700">
                <nav class="-mb-px flex space-x-8" aria-label="Tabs">
                    <button @click="activeTab = 'all'"
                            :class="{ 'border-blue-500 text-blue-600': activeTab === 'all', 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 dark:text-gray-400 dark:hover:text-gray-300': activeTab !== 'all' }"
                            class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">
                        All Posts
                    </button>
                    <button @click="activeTab = 'my'"
                            :class="{ 'border-blue-500 text-blue-600': activeTab === 'my', 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 dark:text-gray-400 dark:hover:text-gray-300': activeTab !== 'my' }"
                            class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">
                        My Posts
                    </button>
                </nav>
            </div>

            <div x-show="activeTab === 'all'" class="mt-6 space-y-4">
                @foreach($allPosts as $post)
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h3 class="text-xl font-bold text-gray-800 dark:text-gray-200">{{$post->title}} by {{$post->user->name}}</h3>
                    <div class="text-xs text-gray-500 dark:text-gray-400 mt-.5">
                        <span>Created: {{$post->created_at->format('M d, Y H:i')}}</span> |
                        <span>Updated: {{$post->updated_at->format('M d, Y H:i')}}</span>
                    </div>
                    <p class="text-gray-600 dark:text-gray-200 mt-2">{{$post->body}}</p>
                    @if(auth()->user()->id === $post->user_id)
                    <div class="mt-4 flex justify-end space-x-2">
                        <a href="{{ route('posts.edit', $post->id) }}" class="text-blue-500 hover:underline">Edit</a>
                        <form action="{{ route('posts.delete', $post->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:underline" onclick="return confirm('Are you sure you want to delete this post?');">Delete</button>
                        </form>
                    </div>
                    @endif
                </div>
                @endforeach
            </div>

            <div x-show="activeTab === 'my'" class="mt-6 space-y-4">
                @foreach($myPosts as $post)
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h3 class="text-xl font-bold text-gray-800 dark:text-gray-200">{{$post->title}} by {{$post->user->name}}</h3>
                    <div class="text-xs text-gray-500 dark:text-gray-400 mt-.5">
                        <span>Created: {{$post->created_at->format('M d, Y H:i')}}</span> |
                        <span>Updated: {{$post->updated_at->format('M d, Y H:i')}}</span>
                    </div>s
                    <p class="text-gray-600 dark:text-gray-200 mt-2">{{$post->body}}</p>
                    <div class="mt-4 flex justify-end space-x-2">
                        <a href="{{ route('posts.edit', $post->id) }}" class="text-blue-500 hover:underline">Edit</a>
                        <form action="{{ route('posts.delete', $post->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:underline" onclick="return confirm('Are you sure you want to delete this post?');">Delete</button>
                        </form>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection