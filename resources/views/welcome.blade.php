<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StockWise</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">

<nav class="bg-white shadow">
    <div class="max-w-7xl mx-auto px-8 py-4 flex justify-between items-center">

        <h1 class="text-3xl font-bold text-blue-600">
            StockWise
        </h1>

        <div class="space-x-3">

            <a href="{{ route('login') }}"
               class="bg-blue-600 text-white px-5 py-2 rounded-lg hover:bg-blue-700">
                Login
            </a>

            <a href="{{ route('register') }}"
               class="border border-blue-600 text-blue-600 px-5 py-2 rounded-lg hover:bg-blue-600 hover:text-white">
                Register
            </a>

        </div>

    </div>
</nav>

<section class="max-w-7xl mx-auto px-8 py-24">

    <div class="grid lg:grid-cols-2 gap-16 items-center">

        <div>

            <h2 class="text-6xl font-bold leading-tight">
                Smart Inventory Management
            </h2>

            <p class="mt-6 text-gray-600 text-xl">
                StockWise helps businesses organize products,
                monitor inventory levels, manage categories,
                and keep track of stock from one simple dashboard.
            </p>

            <div class="mt-8">

                <a href="{{ route('login') }}"
                   class="bg-blue-600 text-white px-8 py-4 rounded-lg hover:bg-blue-700">

                    Get Started

            </a>

            </div>

        </div>

        <div>

            <img src="https://images.unsplash.com/photo-1553413077-190dd305871c"
                class="rounded-xl shadow-xl">

        </div>

    </div>

</section>
{{-- hero  --}}
<section class="bg-white py-20">
    <div class = "max-w-7xl mx-auto px-8">
        <h2 class="text-4xl font-bold text-center mb-12">
            Why Choose StockWise?
        </h2>

        <div class="grid md:grid-cols-3 gap-8">
            <div class="bg-gray-100 rounded-xl p-8 shadow">
                <div class="text-5xl mb-4">📦 </div>
                <h3 class="text-2xl font-semibold mb-3">
                    Product Management
                </h3>

                <p class="text-gray-600">
                    Create,edit and organize products with images, pricing and  inventory information
                </p>
            </div>
            <div class="bg-gray-100 rounded-xl p-8 shadow hover:shadow-lg transition">
                <div class="text-5xl mb-4">📊</div>
            <h3 class="text-2xl font-semibold mb-3">
                Inventory tracking
            </h3>
            <p class="text=gray-600">
                Monitor Stock levels and quickly identify low-stock or depleted products
            </p>
            </div>

            <div class="bg-gray-100 rounded-xl p-8 shadow hover:shadow-lg transition">
                <div class="text-5xl mb-4">🗄️</div>
                <h3 class="text-2xl font-semibold mb-3">
                    Category Organization
                </h3>
                <p class="text-gray-600">
                    Keep products neatly grouped into categories for easier management.
                </p>
            </div>
        </div>
            

</section>
{{-- Hero end --}}

<section>
    <footer class="bg-gray-900 text-white py-8 mt-16">
        <div class="max-w-7xl mx-auto px-8 flex justify-between items-center">
            <div>
                <h2 class="text-2xl font-bold">StockWise</h2>
                <p class="tex-gray-400 mt-2">
                    Smart Inventory Management System
                </p>
            </div>
            {{-- Copy right --}}
            <div class="text-gray-400">
                &copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved
            </div>
        </div>
    </footer>
</section>

</body>
</html>