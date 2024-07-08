<div id="createProductModal" class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50 z-50 hidden">

    <div class="bg-white rounded-lg shadow-lg w-1/3 p-6">
     
        <div class="flex justify-between items-center border-b pb-2 mb-4">
            <h3 class="text-xl font-semibold text-gray-800">Create Product</h3>
            <button class="text-gray-600 hover:text-gray-800" onclick="closeModal()">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <form hx-post="api/create" hx-target="#products-list" hx-swap="innerHTML" hx-trigger="submit">
            @csrf
           
            <div class="mb-4">
                <label for="name">Name: </label>
                <input type="text" name="name" id="name" class="py-2 px-2 rounded border border-gray-500 w-[100%]" placeholder="Input product name">
                <div id="name-error"></div>
            </div>

            <div class="mb-2">
                <label for="brand">Brand: </label>
                <input type="text" name="brand" id="brand" class="py-2 px-2 rounded border border-gray-500 w-[100%]" placeholder="Input product brand">
                <div id="brand-error"></div>
            </div>

            <div class="mb-2">
                <label for="description">Description: </label>
                <input type="text" name="description" id="description" class="py-2 px-2 rounded border border-gray-500 w-[100%]" placeholder="Input product description">
                <div id="description-error"></div>
            </div>

            <div class="mb-2">
                <label for="price">Price: </label>
                <input type="text" name="price" id="price" class="py-2 px-2 rounded border border-gray-500 w-[100%]" placeholder="Input product price">
                <div id="price-error"></div>
            </div>

            <div class="mb-2">
                <label for="quantity">Quantity: </label>
                <input type="text" name="quantity" id="quantity" class="py-2 px-2 rounded border border-gray-500 w-[100%]" placeholder="Input product quantity">
                <div id="quantity-error"></div>
            </div>

            <div id="message"></div>
  
            <div class="flex justify-end space-x-1 p-2 border-t">
                <button class="py-2 px-2 bg-blue-500 text-white hover:bg-blue-800 rounded" type="submit">Submit</button>

                <button type="button" class="py-2 px-2 bg-red-500 text-white hover:bg-red-800 rounded" onclick="closeModal()">Close</button>

            </form>
        </div>
    </div>
</div>

<script>
    function closeModal() {
  
        document.getElementById('createProductModal').classList.add('hidden');
        
        document.getElementById('name').value = '';
        document.getElementById('brand').value = '';
        document.getElementById('description').value = '';
        document.getElementById('price').value = '';
        document.getElementById('quantity').value = '';
        
        document.getElementById('message').classList.add('hidden');
    }
</script>
