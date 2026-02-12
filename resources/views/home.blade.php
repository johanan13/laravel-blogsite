@extends('layouts.app')

@section('content')

        <div class="text-center py-16">
            <h1 class="text-5xl font-bold text-gray-800 dark:text-gray-200">Welcome to Blogsite</h1>
            <p class="mt-4 text-lg text-gray-600 dark:text-gray-400">Blog, Blog, Blog, Blog, Blog, Blog</p>
            <div class="mt-8">
                <a href="/login" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-full text-lg">
                    Get Started </a>

        <div class="py-20">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                        <h2 class="text-2xl font-bold text-center text-gray-800 dark:text-gray-200 mb-8">Features</h2>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                            <div class="p-6 bg-gray-100 dark:bg-gray-700 rounded-lg">
                                <h3 class="text-xl font-bold text-gray-800 dark:text-gray-200">Feature One</h3>
                                <p class="mt-2 text-gray-600 dark:text-gray-400">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            </div>
                            <div class="p-6 bg-gray-100 dark:bg-gray-700 rounded-lg">
                                <h3 class="text-xl font-bold text-gray-800 dark:text-gray-200">Feature Two</h3>
                                <p class="mt-2 text-gray-600 dark:text-gray-400">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            </div>
                            <div class="p-6 bg-gray-100 dark:bg-gray-700 rounded-lg">
                                <h3 class="text-xl font-bold text-gray-800 dark:text-gray-200">Feature Three</h3>
                                <p class="mt-2 text-gray-600 dark:text-gray-400">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection