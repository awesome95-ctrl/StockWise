<div 
    x-show="sidebarOpen"
    x-transition
    class="w-64 min-h-screen bg-slate-900 text-white flex flex-col">
    <div class="p-6 text-3xl font-bold border-b border-slate-700">
        <span class="text-3xl text-blue-500">Stock</span><span class="text-3xl text-green-500">Wise</span>
    </div>

    <nav class="flex-1 mt-8 space-y-2">
        <a href="{{ route('dashboard') }}"
        class="block px-6 py-5 rounded-lg hover:bg-slate-800 transition duration-200">
        <i class="fa-solid fa-chart-line mr-3"></i> Dashboard
        </a>

        <a href="{{ route('products.index') }}"
        class="block px-6 py-5 rounded-lg hover:bg-slate-800 transition duration-200">
        <i class="fa-solid fa-box-open mr-3"></i> Products
        </a>

        <a href="{{ route('sales.index') }}"
        class="flex-items-center px-6 py-3 hover:bg-slate-800">
    <i class="fa-solid fa-cart-shopping mr-3"></i>
        Sales
</a>

        <a href="{{ route('categories.index') }}"
        class="block px-6 py-5 rounded-lg hover:bg-slate-800 transition duration-200">
        <i class="fa-solid fa-folder-tree mr-3"></i> Categories
        </a>

        <a href="{{ route('dashboard') }}"
        class="block px-6 py-5 rounded-lg hover:bg-slate-800">
        <i class="fa-solid fa-user mr-3"></i> Profile

        </a>
    </nav>

    <div class="p-6 border-t border-slate-700">
        <form method="POST" action ="{{ route('logout') }}">
            @csrf

            <button class="W-full text-left hover:text-red-400"><i class="fa-solid fa-right-from-bracket mr-3"></i> Logout</button>
        </form>
    </div>

</div>