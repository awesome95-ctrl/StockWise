<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Register | StockWise</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet">

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-slate-100 min-h-screen">

    <div class="min-h-screen flex">

        {{-- LEFT SIDE --}}
        <div class="hidden lg:flex lg:w-1/2 bg-slate-900 text-white flex-col justify-between p-12">

            <div>
                <div class="text-4xl font-bold">
                    <span class="text-blue-500">Stock</span><span class="text-green-500">Wise</span>
                </div>

                <p class="mt-3 text-slate-400">
                    Smart inventory management made simple.
                </p>
            </div>

            <div class="max-w-md">

                <i class="fa-solid fa-chart-line text-6xl text-green-500 mb-8"></i>

                <h1 class="text-4xl font-bold leading-tight">
                    Start managing your stock smarter.
                </h1>

                <p class="mt-5 text-lg text-slate-400">
                    Create your StockWise account and keep your products,
                    sales, and inventory organized in one place.
                </p>

            </div>

            <p class="text-sm text-slate-500">
                © {{ date('Y') }} StockWise. All rights reserved.
            </p>

        </div>


        {{-- RIGHT SIDE --}}
        <div class="w-full lg:w-1/2 flex items-center justify-center p-6 sm:p-10">

            <div class="w-full max-w-md">

                {{-- Mobile logo --}}
                <div class="lg:hidden text-center mb-8">

                    <div class="text-4xl font-bold">
                        <span class="text-blue-500">Stock</span><span class="text-green-500">Wise</span>
                    </div>

                    <p class="text-gray-500 mt-2">
                        Smart inventory management
                    </p>

                </div>


                {{-- Register Card --}}
                <div class="bg-white rounded-2xl shadow-xl p-6 sm:p-8">

                    <div class="mb-7">

                        <h2 class="text-3xl font-bold text-gray-800">
                            Create your account
                        </h2>

                        <p class="text-gray-500 mt-2">
                            Get started with StockWise today.
                        </p>

                    </div>


                    <form method="POST" action="{{ route('register') }}">

                        @csrf


                        {{-- Name --}}
                        <div>

                            <label
                                for="name"
                                class="block text-sm font-semibold text-gray-700 mb-2">
                                Full name
                            </label>

                            <div class="relative">

                                <i class="fa-solid fa-user absolute left-4 top-1/2 -translate-y-1/2 text-gray-400"></i>

                                <input
                                    id="name"
                                    type="text"
                                    name="name"
                                    value="{{ old('name') }}"
                                    required
                                    autofocus
                                    autocomplete="name"
                                    placeholder="Your name"
                                    class="w-full border border-gray-300 rounded-lg pl-11 pr-4 py-3 focus:border-blue-500 focus:ring-blue-500"
                                >

                            </div>

                            <x-input-error
                                :messages="$errors->get('name')"
                                class="mt-2"
                            />

                        </div>


                        {{-- Email --}}
                        <div class="mt-5">

                            <label
                                for="email"
                                class="block text-sm font-semibold text-gray-700 mb-2">
                                Email address
                            </label>

                            <div class="relative">

                                <i class="fa-solid fa-envelope absolute left-4 top-1/2 -translate-y-1/2 text-gray-400"></i>

                                <input
                                    id="email"
                                    type="email"
                                    name="email"
                                    value="{{ old('email') }}"
                                    required
                                    autocomplete="username"
                                    placeholder="you@gmail.com"
                                    class="w-full border border-gray-300 rounded-lg pl-11 pr-4 py-3 focus:border-blue-500 focus:ring-blue-500"
                                >

                            </div>

                            <x-input-error
                                :messages="$errors->get('email')"
                                class="mt-2"
                            />

                        </div>


                        {{-- Password --}}
                        <div class="mt-5">

                            <label
                                for="password"
                                class="block text-sm font-semibold text-gray-700 mb-2">
                                Password
                            </label>

                            <div class="relative">

                                <i class="fa-solid fa-lock absolute left-4 top-1/2 -translate-y-1/2 text-gray-400"></i>

                                <input
                                    id="password"
                                    type="password"
                                    name="password"
                                    required
                                    autocomplete="new-password"
                                    placeholder="Create a password"
                                    class="w-full border border-gray-300 rounded-lg pl-11 pr-4 py-3 focus:border-blue-500 focus:ring-blue-500"
                                >

                            </div>

                            <x-input-error
                                :messages="$errors->get('password')"
                                class="mt-2"
                            />

                        </div>


                        {{-- Confirm Password --}}
                        <div class="mt-5">

                            <label
                                for="password_confirmation"
                                class="block text-sm font-semibold text-gray-700 mb-2">
                                Confirm password
                            </label>

                            <div class="relative">

                                <i class="fa-solid fa-lock absolute left-4 top-1/2 -translate-y-1/2 text-gray-400"></i>

                                <input
                                    id="password_confirmation"
                                    type="password"
                                    name="password_confirmation"
                                    required
                                    autocomplete="new-password"
                                    placeholder="Confirm your password"
                                    class="w-full border border-gray-300 rounded-lg pl-11 pr-4 py-3 focus:border-blue-500 focus:ring-blue-500"
                                >

                            </div>

                            <x-input-error
                                :messages="$errors->get('password_confirmation')"
                                class="mt-2"
                            />

                        </div>


                        {{-- Register --}}
                        <button
                            type="submit"
                            class="w-full mt-6 bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 rounded-lg transition duration-200">

                            <i class="fa-solid fa-user-plus mr-2"></i>

                            Create Account

                        </button>

                    </form>


                    {{-- Login --}}
                    <div class="text-center mt-7 pt-6 border-t border-gray-200">

                        <p class="text-sm text-gray-600">

                            Already have an account?

                            <a
                                href="{{ route('login') }}"
                                class="text-blue-600 hover:text-blue-800 font-semibold">

                                Sign in

                            </a>

                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</body>

</html>