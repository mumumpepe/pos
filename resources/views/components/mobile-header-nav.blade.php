<header x-data="{ isOpen: false }" class="w-full bg-sidebar py-5 px-6 sm:hidden">
    <div class="flex items-center justify-between">
        <a href="index.html" class="text-white text-3xl font-semibold uppercase hover:text-gray-300">POS</a>
        <button @click="isOpen = !isOpen" class="text-white text-3xl focus:outline-none">
            <i x-show="!isOpen" class="fas fa-bars"></i>
            <i x-show="isOpen" class="fas fa-times"></i>
        </button>
    </div>

    <!-- Dropdown Nav -->
    <nav :class="isOpen ? 'flex': 'hidden'" class="flex flex-col pt-4">

        <x-sm-link href="/sales"> <i class="fas fa-coins mr-3"></i>Sales</x-sm-link>
        <x-sm-link href="/tables"> <i class="fas fa-coins mr-3"></i>Recent Sales</x-sm-link>
        <x-sm-link href="/calendar"> <i class="fas fa-coins mr-3"></i>Calendar</x-sm-link>
        <x-sm-link href="#"> <i class="fas fa-coins mr-3"></i>Support</x-sm-link>
        <x-sm-link href="#"> <i class="fas fa-coins mr-3"></i>My Account</x-sm-link>
        <x-sm-link href="3"> <i class="fas fa-coins mr-3"></i>Sign Out</x-sm-link>

    </nav>
</header>
