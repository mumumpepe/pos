<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tailwind Admin Template</title>
    <meta name="author" content="David Grzyb">
    <meta name="description" content="">

    <!-- Tailwind -->
    @vite('resources/css/app.css')
    <style>
        @import url('https://fonts.googleapis.com/css?family=Karla:400,700&display=swap');
        .font-family-karla { font-family: karla; }
        .bg-sidebar { background: #3d68ff; }
        .cta-btn { color: #3d68ff; }
        .upgrade-btn { background: #1947ee; }
        .upgrade-btn:hover { background: #0038fd; }
        .active-nav-link { background: #1947ee; }
        .nav-item:hover { background: #1947ee; }
        .account-link:hover { background: #3d68ff; }
    </style>
</head>
<body class="bg-gray-100 font-family-karla flex">

    <aside class="relative bg-sidebar h-screen w-64 hidden sm:block shadow-xl">
        <div class="p-6">
            <a href="/index" class="text-white text-3xl font-semibold uppercase hover:text-gray-300">POS</a>
        </div>
        <nav class="text-white text-base font-semibold pt-3">
            <x-link href="/sales" :active="request()->is('sales')"><i class="fas fa-coins mr-3"></i>Sales</x-link>
            <x-link href="/blank" :active="request()->is('blank')"><i class="fas fa-sticky-note mr-3"></i>Blank Page</x-link>
            <x-link href="/tables" :active="request()->is('tables')"><i class="fas fa-table mr-3"></i>Tables</x-link>
            <x-link href="/calendar" :active="request()->is('calendar')"><i class="fas fa-calendar mr-3"></i>Calendar</x-link>
        </nav>
    </aside>

    <div class="relative w-full flex flex-col h-screen overflow-y-hidden">
        <!-- Desktop Header -->
        <header class="w-full items-center bg-white py-2 px-6 hidden sm:flex">
            <div class="w-1/2"></div>
            <div x-data="{ isOpen: false }" class="relative w-1/2 flex justify-end">
                <button @click="isOpen = !isOpen" class="realtive z-10 w-12 h-12 rounded-full overflow-hidden border-4 border-gray-400 hover:border-gray-300 focus:border-gray-300 focus:outline-none">
                    <img src="https://source.unsplash.com/uJ8LNVCBjFQ/400x400">
                </button>
                <button x-show="isOpen" @click="isOpen = false" class="h-full w-full fixed inset-0 cursor-default"></button>
                <div x-show="isOpen" class="absolute w-32 bg-white rounded-lg shadow-lg py-2 mt-16">
                    <a href="#" class="block px-4 py-2 account-link hover:text-white">Account</a>
                    <a href="#" class="block px-4 py-2 account-link hover:text-white">Support</a>
                    <a href="#" class="block px-4 py-2 account-link hover:text-white">Sign Out</a>
                </div>
            </div>
        </header>

        <!-- Mobile Header & Nav -->
        <header x-data="{ isOpen: false }" class="w-full bg-sidebar py-5 px-6 sm:hidden">
            <div class="flex items-center justify-between">
                <a href="/index" class="text-white text-3xl font-semibold uppercase hover:text-gray-300">POS</a>
                <button @click="isOpen = !isOpen" class="text-white text-3xl focus:outline-none">
                    <i x-show="!isOpen" class="fas fa-bars"></i>
                    <i x-show="isOpen" class="fas fa-times"></i>
                </button>
            </div>

            <!-- Dropdown Nav -->
            <nav :class="isOpen ? 'flex': 'hidden'" class="flex flex-col pt-4">
                <a href="/sales" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                    <i class="fas fa-coins mr-3"></i>
                    Sales
                </a>

                <a href="/blank" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                    <i class="fas fa-sticky-note mr-3"></i>
                    Blank Page
                </a>
                <a href="/tables" class="flex items-center active-nav-link text-white py-2 pl-4 nav-item">
                    <i class="fas fa-table mr-3"></i>
                    Tables
                </a>
                <a href="/sales" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                    <i class="fas fa-coins mr-3"></i>
                    Sales
                </a>
                <a href="/calendar" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                    <i class="fas fa-calendar mr-3"></i>
                    Calendar
                </a>
                <a href="#" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                    <i class="fas fa-cogs mr-3"></i>
                    Support
                </a>
                <a href="#" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                    <i class="fas fa-user mr-3"></i>
                    My Account
                </a>
                <a href="#" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                    <i class="fas fa-sign-out-alt mr-3"></i>
                    Sign Out
                </a>
                <button class="w-full bg-white cta-btn font-semibold py-2 mt-3 rounded-lg shadow-lg hover:shadow-xl hover:bg-gray-300 flex items-center justify-center">
                    <i class="fas fa-arrow-circle-up mr-3"></i> Upgrade to Pro!
                </button>
            </nav>
            <!-- <button class="w-full bg-white cta-btn font-semibold py-2 mt-5 rounded-br-lg rounded-bl-lg rounded-tr-lg shadow-lg hover:shadow-xl hover:bg-gray-300 flex items-center justify-center">
                <i class="fas fa-plus mr-3"></i> New Report
            </button> -->
        </header>

        <div class="w-full h-screen overflow-x-hidden border-t flex flex-col">
            <main class="w-full flex-grow p-6">
                <h1 class="text-3xl text-black pb-6">Tables</h1>

                <div class="w-full mt-6">
                    <p class="text-xl pb-3 flex items-center">
                        <i class="fas fa-coins mr-3"></i> Recent Sales
                    </p>
                    <div class="bg-white overflow-auto">
                        <table class="min-w-full bg-white">
                            <thead class="bg-gray-800 text-white">
                                <tr>
                                    <th class="w-1/6 text-left py-3 px-4 uppercase font-semibold text-sm">Product</th>
                                    <th class="w-1/6 text-left py-3 px-4 uppercase font-semibold text-sm">Total Price</th>
                                    <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Customer Name</th>
                                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Email</th>
                                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Phone</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-700">

                            @foreach ($sales as $sale)
                                <tr>
                                    <td class="w-1/6 text-left py-3 px-4">{{ $sale['product_name'] }}</td>
                                    <td class="w-1/6 text-left py-3 px-4">{{ $sale['total_price'] }}</td>
                                    <td class="w-1/3 text-left py-3 px-4">{{ $sale['customer_name'] }}</td>
                                    <td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="mailto:{{ $sale['email'] }}">{{ $sale['email'] }}</a></td>
                                    <td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="tel:{{ $sale['phone'] }}">{{ $sale['phone'] }}</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>



            </main>

            <footer class="w-full bg-white text-right p-4">
                Built by <a target="_blank" href="https://davidgrzyb.com" class="underline">David Grzyb</a>.
            </footer>
        </div>

    </div>

    <!-- AlpineJS -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>
</body>
</html>
