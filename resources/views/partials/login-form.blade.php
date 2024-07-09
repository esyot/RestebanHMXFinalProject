<div class="max-w-lg mx-auto mt-48 border border-gray-300 rounded-lg shadow-lg p-8 bg-white">

    <form hx-trigger="submit" hx-post="/api/login" hx-target="#main_content" hx-swap="innerHTML">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="mb-4">
            <label for="email" class="block text-gray-700 font-bold mb-2">Email:</label>
            <input type="email" id="email" name="email" placeholder="Input email"
            class="w-full rounded p-3 border border-gray-300 focus:ring focus:ring-blue-200 focus:border-blue-500">
            @yield('email-error')
        </div>
        

        <div class="mb-4">
            <label for="password" class="block text-gray-700 font-bold mb-2">Password:</label>
            <input type="password" id="password" placeholder="Input password"
            class="w-full rounded p-3 border border-gray-300 focus:ring focus:ring-blue-200 focus:border-blue-500" name="password">
            @yield('password-error')
        </div>
       

        @yield('error-message')

        <div class="flex justify-end">
            <button type="submit" class="py-2 px-6 ml-2 rounded bg-blue-600 hover:bg-blue-700 text-white font-bold transition duration-200 ease-in-out">
                Login
            </button>

            <button type="button" class="py-2 px-6 ml-2 rounded bg-green-600 hover:bg-green-700 text-white font-bold transition duration-200 ease-in-out">
                Sign-Up
            </button>
        </div>
    </form>
</div>
