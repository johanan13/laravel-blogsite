@extends('layouts.app')

@section('content')
<div class="flex items-center justify-center min-h-screen bg-gray-100 dark:bg-gray-900">
    <div class="w-full max-w-md p-8 space-y-6 bg-white dark:bg-gray-800 rounded-lg shadow-md">
        <h3 class="text-2xl font-bold text-center text-gray-800 dark:text-gray-200">Login to your account</h3>
        <form action="/login" method="POST" class="space-y-6">
            @csrf
            <div class="mt-4">
                <div>
                    <label class="block text-gray-700 dark:text-gray-300" for="username_email">Username or Email</label>
                    <input type="text" name="username_email" id="username_email" placeholder="Username or Email"
                        class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600 dark:bg-gray-700 dark:text-gray-200 dark:border-gray-600" required>
                    @error('username_email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mt-4">
                    <label class="block text-gray-700 dark:text-gray-300" for="password">Password</label>
                    <input type="password" name="password" id="password" placeholder="Password"
                        class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600 dark:bg-gray-700 dark:text-gray-200 dark:border-gray-600" required>
                </div>
                <div class="mt-6 flex items-center justify-between">
                    <button type="submit"
                        class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Login
                    </button>
                </div>
            </div>
        </form>
        <p class="text-sm text-center text-gray-600 dark:text-gray-400 mt-4">
            Don't have an account? <a href="/register" class="font-medium text-blue-600 hover:text-blue-500">Register here</a>
        </p>
    </div>
</div>

@endsection