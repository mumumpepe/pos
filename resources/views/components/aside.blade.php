<aside class="relative bg-sidebar h-screen w-64 hidden sm:block shadow-xl">
    <div class="p-6">
        <a href="/sales" class="text-white text-3xl font-semibold uppercase hover:text-gray-300">POS</a>
    </div>
    <nav class="text-white text-base font-semibold pt-3">
        <x-link href="/sales" :active="request()->is('sales')"><i class="fas fa-coins mr-3"></i>Sales</x-link>
        <x-link href="/tables" :active="request()->is('tables')"><i class="fas fa-table mr-3"></i>Recent Sales</x-link>
        <x-link href="/calendar" :active="request()->is('calendar')"><i class="fas fa-calendar mr-3"></i>Calendar</x-link>
    </nav>


</aside>
