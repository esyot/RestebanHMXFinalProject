<div class="w-[600px] mx-auto mt-[12rem] border border-gray-500 rounded-lg shadow p-8">

    <form hx-trigger="submit" hx-post="/api/login" hx-target="#main-content" hx-swap="innerHTML">
        <div class="mb-3 flex-col gap-3">
            <input type="email" class="rounded p-2 border border-gray-400" name="email">
        </div>

        <div class="mb-3 flex-col gap-3">
            <input type="password" class="rounded p-2 border border-gray-400" name="password">
        </div>
         
        @yield('error')

        <div class="mb-3">
            <button type="submit" class="py-2 px-4 rounded bg-blue-700 text-white">
                Login
            </button>
        </div>
    </form>
</div>