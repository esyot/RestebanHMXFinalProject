<!-- Modal Background -->

<div class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50 z-50 hidden" id="confirmDelete{{ $prod->id }}">
    <!-- Modal Content -->
    <div class="bg-white rounded-lg shadow-lg w-1/3 p-6">
        <!-- Modal Header -->
        <div class="flex justify-between items-center border-b pb-2 mb-4">
            <h3 class="text-xl font-semibold text-gray-800">Confirm Deletion</h3>
            <button class="text-gray-600 hover:text-gray-800" onclick="document.getElementById('confirmDelete{{$prod->id}}').classList.add('hidden')">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        <!-- Modal Body -->
        <div class="mb-4">
    <p class="text-gray-700">You are going to delete this item:</p>
    <ul class="list-disc list-inside text-gray-700 ml-6">
        <li>Name: <i class="text-red-500">{{$prod->name}}</i></li>
        <li>Brand: <i class="text-red-500">{{$prod->brand}}</i></li>
        <li>Description: <i class="text-red-500">{{$prod->description}}</i></li>
        <li>Price: <i class="text-red-500">₱{{$prod->price}}</i></li>
        <li>Quantity: <i class="text-red-500">{{$prod->quantity}}</i></li>
    </ul>
   
</div>

        <!-- Modal Footer -->
        <div class="flex justify-end space-x-4">

        <form hx-delete="api/delete/{{$prod->id}}" hx-target='#product{{$prod->id}}' hx-swap='outerHTML swap:1.1s' method="POST">
        @csrf
        <button onclick="document.getElementById('confirmDelete{{ $prod->id }}').classList.add('hidden')"
         type="submit"  class='bg-red-500 text-white font-bold py-2 px-4 rounded'>
        Confirm
    </button>

     <button type="button" class="bg-gray-300 text-gray-800 px-4 py-2 rounded hover:bg-gray-400" onclick="document.getElementById('confirmDelete{{$prod->id}}').classList.add('hidden')">Cancel</button>
  

        </form>
                 </div>
    </div>
</div>
