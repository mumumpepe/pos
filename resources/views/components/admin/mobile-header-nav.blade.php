<header x-data="{ isOpen: false }" class="w-full bg-sidebar py-5 px-6 sm:hidden">
    <div class="flex items-center justify-between">
        <a href="#" class="text-white text-3xl font-semibold uppercase hover:text-gray-300">Admin</a>
        <button @click="isOpen = !isOpen" class="text-white text-3xl focus:outline-none">
            <i x-show="!isOpen" class="fas fa-bars"></i>
            <i x-show="isOpen" class="fas fa-times"></i>
        </button>
    </div>

    <!-- Dropdown Nav -->
    <nav :class="isOpen ? 'flex': 'hidden'" class="flex flex-col pt-4">
        <x-sm-link href="/admin/dashboard" :active="request()->is('admin/dashboard')"> <i class="fas fa-tachometer-alt mr-3"></i>Dashboard</x-sm-link>
        <x-sm-link href="/admin/blank" :active="request()->is('admin/blank')"> <i class="fas fa-user mr-3"></i>Users</x-sm-link>
        <x-sm-link href="/admin/sales" :active="request()->is('admin/sales')"> <i class="fas fa-coins mr-3"></i>Sales</x-sm-link>
        <x-sm-link href="/admin/register" :active="request()->is('admin/register')"> <i class="fas fa-table mr-3"></i>Register</x-sm-link>
        <x-sm-link href="/admin/calendar" :active="request()->is('admin/calendar')"> <i class="fas fa-calendar mr-3"></i>Calendar</x-sm-link>
        <x-sm-link href="#"> <i class="fas fa-coins mr-3"></i>Support</x-sm-link>
        <x-sm-link href="#"> <i class="fas fa-coins mr-3"></i>My Account</x-sm-link>
        <x-sm-link href="/logout">
        <form action="/logout" method="POST">
            <button type="submit" class="bg-none">Sign Out</button>
        </form>
        </x-sm-link>
        <button class="w-full bg-white cta-btn font-semibold py-2 mt-3 rounded-lg shadow-lg hover:shadow-xl hover:bg-gray-300 flex items-center justify-center">
            <i class="fas fa-arrow-circle-up mr-3"></i> Upgrade to Pro!
        </button>
    </nav>
    <button class="w-full bg-white cta-btn font-semibold py-2 mt-5 rounded-br-lg rounded-bl-lg rounded-tr-lg shadow-lg hover:shadow-xl hover:bg-gray-300 flex items-center justify-center">
        <a href="/admin/report"> <i class="fas fa-plus mr-3"></i> New Report</a>
    </button>
</header>
