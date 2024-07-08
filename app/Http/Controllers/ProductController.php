<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(){

        $products = Product::orderBy('created_at', 'DESC')->get();

        return view('products', compact('products'));
    }

    public function delete(Product $product){

        $product -> delete();
       
        return "";

    }

    public function store(Request $request)
{
    try {
        $validate = $request->validate([
            'name' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
        ]);

        $product = new Product();
        $product->name = $validate['name'];
        $product->brand = $validate['brand'];
        $product->description = $validate['description'];
        $product->price = $validate['price'];
        $product->quantity = $validate['quantity'];
        $product->save();

        $products = Product::orderBy('created_at', 'DESC')->get();

     
        $errorMessages = [
            'name' => '<div id="name-error" hx-swap-oob="true"></div>',
            'brand' => '<div id="brand-error" hx-swap-oob="true"></div>',
            'description' => '<div id="description-error" hx-swap-oob="true"></div>',
            'price' => '<div id="price-error" hx-swap-oob="true"></div>',
            'quantity' => '<div id="quantity-error" hx-swap-oob="true"></div>',
        ];

        $errorMessageHTML = '';
        foreach ($errorMessages as $errorMessage) {
            $errorMessageHTML .= $errorMessage;
        }

        $successMessage = '';

        $successMessage .= '<div id="message" hx-swap-oob="true" class="py-2 px-2 text-center bg-green-200 text-green-500 rounded m-2">Product has been successfully Added!</div>';

        $html = view('inclusions.products-list', compact('products'))->render();
        return $html . $errorMessageHTML . $successMessage;

    } catch (\Exception $e) {
        $errorMessages = [
            'name' => '',
            'brand' => '',
            'description' => '',
            'price' => '',
            'quantity' => '',
        ];

        if ($e instanceof \Illuminate\Validation\ValidationException) {
            $errors = $e->validator->errors();

            foreach ($errorMessages as $field => $message) {
                if ($errors->has($field)) {
                    $errorMessages[$field] = '<div id="' . $field . '-error" hx-swap-oob="true" class="italic text-left text-red-500 text-sm">' . $errors->first($field) . '</div>';
                } else {
                    $errorMessages[$field] = '<div id="' . $field . '-error" hx-swap-oob="true" class="italic text-left text-red-500 text-sm"></div>';
                }
            }

            $errorMessageHTML = '';

            foreach ($errorMessages as $errorMessage) {
                $errorMessageHTML .= $errorMessage;
            }

            $errorMessage = '';

            $errorMessage .= '<div id="message" hx-swap-oob="true" class="py-2 px-2 text-center bg-red-200 text-red-500 rounded m-2">Product Error!</div>';

            $products = Product::orderBy('created_at', 'DESC')->get();
            $html = view('inclusions.products-list', compact('products'))->render();
            return $html . $errorMessageHTML . $errorMessage;

        } else {
            return view('errors.product-error');
        }
    }
}

}
