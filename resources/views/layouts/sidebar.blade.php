<div
    x-cloak
    x-show="sidebarOpen"
    x-transition:enter="transition ease-out duration-200"
    x-transition:enter-start="-translate-x-full"
    x-transition:enter-end="translate-x-0"
    x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="translate-x-0"
    x-transition:leave-end="-translate-x-full"
    class="w-64 min-h-screen bg-slate-900 text-white flex flex-col fixed lg:static inset-y-0 left-0 z-50 lg:z-auto lg:!flex"
>

    {{-- Logo + mobile close button --}}
    <div class="p-6 border-b border-slate-700 flex items-center justify-between">

        <div class="text-3xl font-bold">
            <span class="text-blue-500">Stock</span><span class="text-green-500">Wise</span>
        </div>

        <button
            @click="sidebarOpen = false"
            type="button"
            class="lg:hidden text-2xl text-white hover:text-red-400 transition"
        >
            <i class="fa-solid fa-xmark"></i>
        </button>

    </div>


    {{-- Navigation --}}
    <nav class="flex-1 mt-8 space-y-2">

        <a href="{{ route('dashboard') }}"
           class="block px-6 py-5 rounded-lg hover:bg-slate-800 transition duration-200">
            <i class="fa-solid fa-chart-line mr-3"></i>
            Dashboard
        </a>

        <a href="{{ route('products.index') }}"
           class="block px-6 py-5 rounded-lg hover:bg-slate-800 transition duration-200">
            <i class="fa-solid fa-box-open mr-3"></i>
            Products
        </a>

        <a href="{{ route('sales.index') }}"
           class="flex items-center w-full px-6 py-3 rounded-lg hover:bg-slate-800 transition">
            <i class="fa-solid fa-cart-shopping w-6 mr-3"></i>
            Sales
        </a>

        <a href="{{ route('stock-movements.create') }}"
           class="flex items-center w-full px-6 py-3 rounded-lg hover:bg-slate-800 transition">
            <i class="fa-solid fa-boxes-stacked w-6 mr-3"></i>
            <span>Restock</span>
        </a>

        <a href="{{ route('stock-movements.index') }}"
           class="flex items-center w-full px-6 py-3 rounded-lg hover:bg-slate-800 transition">
            <i class="fa-solid fa-clock-rotate-left w-6 mr-3"></i>
            <span>Stock History</span>
        </a>

        <a href="{{ route('categories.index') }}"
           class="block px-6 py-5 rounded-lg hover:bg-slate-800 transition duration-200">
            <i class="fa-solid fa-folder-tree mr-3"></i>
            Categories
        </a>

    </nav>

</div>