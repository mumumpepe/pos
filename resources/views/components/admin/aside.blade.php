<aside class="relative bg-sidebar h-screen w-64 hidden sm:block shadow-xl">
    <div class="p-6">
        <a href="#" class="text-white text-3xl font-semibold uppercase hover:text-gray-300">Admin</a>
        <button class="w-full bg-white cta-btn font-semibold py-2 mt-5 rounded-br-lg rounded-bl-lg rounded-tr-lg shadow-lg hover:shadow-xl hover:bg-gray-300 flex items-center justify-center">
            <a href="/admin/report"> <i class="fas fa-plus mr-3"></i> New Report</a>
        </button>
    </div>
    <nav class="text-white text-base font-semibold pt-3">
        <x-link href="/admin/dashboard" :active="request()->is('admin/dashboard')"><i class="fas fa-tachometer-alt mr-3"></i>Dashboard</x-link>
        <x-link href="/admin/blank" :active="request()->is('admin/blank')"><i class="fas fa-user mr-3"></i>Users</x-link>
        <x-link href="/admin/sales" :active="request()->is('admin/sales')"><i class="fas fa-coins mr-3"></i>Sales</x-link>
        <x-link href="/admin/register" :active="request()->is('admin/register')"><i class="fas fa-table mr-3"></i>Register</x-link>
        <x-link href="/admin/calendar" :active="request()->is('admin/calendar')"><i class="fas fa-calendar mr-3"></i>Calendar</x-link>
    </nav>
    <a href="#" class="absolute w-full upgrade-btn bottom-0 active-nav-link text-white flex items-center justify-center py-4">
        <i class="fas fa-arrow-circle-up mr-3"></i>
        Upgrade to Pro!
    </a>
</aside>
