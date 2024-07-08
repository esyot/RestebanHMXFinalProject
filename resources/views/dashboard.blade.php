@extends('templates.base')

@section('content')

<div class="container mx-auto p-8 bg-white rounded-lg shadow-md mt-2">
    <div class="text-center">
        <h2 class="text-2xl font-semibold mb-4">Welcome to the Dashboard</h2>
        <p class="text-gray-600">Here you can manage your application settings and view analytics.</p>
        
        <form action="{{ route('logout') }}" method="POST" class="mt-4">
            @csrf
            <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-700">
                Logout
            </button>
        </form>
    </div>
</div>

@endsection
