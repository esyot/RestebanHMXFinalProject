
@foreach($products as $prod)
        <div id="product{{$prod->id}}" class="p-6 bg-gray-200 rounded-lg shadow hover:shadow-lg transition-shadow fade-me-out">
                <h2 class="text-[30px] font-bold mb-2">{{ $prod->name }}</h2>
                <p class="text-gray-700">Description: {{ $prod->description }}</p>
                <p class="text-gray-700">Price: {{ $prod->price }}</p>
                <p class="text-gray-700">Quantity: {{ $prod->quantity }}</p>
            <button onclick="document.getElementById('confirmDelete{{ $prod->id }}').classList.remove('hidden')" 
            class="bg-red-500 text-white shadow-md rounded hover:bg-red-800 px-2 py-2 p-2 m-2">delete</button>
        </div>
        @include('modals.confirm-delete', ['prod'=>$prod]) 
        @endforeach
    </div>
</div>