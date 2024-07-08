@foreach($products->get() as $prod) 

    @include('inclusion.single-product',['prod'=>$prod])

@endforeach

<div hx-swap-oob="true" id="addProductMessage">
    <div class="bg-green-200 text-green-800 p-2 rounded">
        The product has been successfully added!
    </div>
</div>