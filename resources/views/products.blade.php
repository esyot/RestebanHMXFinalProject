@extends('templates.header')
@section('content')
@include('modals.create-product')

<button class="py-2 px-2 bg-blue-500 rounded m-2 text-white hover:bg-blue-700"
    onclick="document.getElementById('createProductModal').classList.remove('hidden')">Add Product</button>

<div class="container mx-auto p-6 bg-white rounded-lg shadow-md mt-6">
<div id="products-list" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

@include('inclusions.products-list')


@endsection
