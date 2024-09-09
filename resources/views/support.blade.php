<!DOCTYPE html>
<html lang="en">
<x-head></x-head>
<body class="bg-gray-100 font-family-karla flex">
<x-admin.aside></x-admin.aside>
<div class="relative w-full flex flex-col h-screen overflow-y-hidden">
    <!-- Desktop Header -->
    <x-desktop-header></x-desktop-header>
    <!-- Mobile Header & Nav -->
    <x-admin.mobile-header-nav></x-admin.mobile-header-nav>

    <div class="w-full h-screen overflow-x-hidden border-t flex flex-col">
        <main class="w-full flex-grow p-6">
            <h1 class="text-3xl text-black pb-6">Users</h1>

            <div class="w-full mt-12">
                <p class="text-xl pb-3 flex items-center">
                    <i class="fas fa-list mr-3"></i> User Details
                </p>
                <div class="bg-white overflow-auto">
                    <table class="min-w-full leading-normal">
                        <thead>
                        <tr>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-justify text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                User
                            </th>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-justify text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Role
                            </th>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-justify text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Created at
                            </th>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-justify text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Email
                            </th>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-justify text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Action
                            </th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($users as $user)
                            <tr>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 w-10 h-10">
                                            <img class="w-full h-full rounded-full"
                                                 src="{{ asset('storage/images/'.$user['image_path']) }}"
                                                 alt="" />
                                        </div>
                                        <div class="ml-3">
                                            <p class="text-gray-900 whitespace-no-wrap">
                                                {{ Str::title($user['first_name']) }} {{ Str::title($user['last_name']) }}
                                            </p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <p class="text-gray-900 whitespace-no-wrap">{{ $user['role'] }}</p>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <p class="text-gray-900 whitespace-no-wrap">
                                        {{ $user['created_at'] }}
                                    </p>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <span
                                            class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
                                            <a class="text-gray-900 whitespace-no-wrap" href="mailto:{{ $user['email'] }}">
                                                {{ $user['email'] }}
                                            </a>
                                        </span>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <span
                                            class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
                                   <a class="text-gray-900 whitespace-no-wrap" href="/user/{{ $user->id }}/edit">
                                              Edit
                                            </a>
                                        </span>

                                    <form action="/user/{{ $user->id }}/delete" method = "POST"  class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight" >
                                        @csrf
                                        @method('DELETE')
                                        <span>
                                        <button class="bg-none text-gray-900 whitespace-no-wrap" type="submit">Delete</button>
                                    </form>
                                </td>

                                @endforeach
                            </tr>
                        </tbody>
                    </table>

                </div>
            </div>
            <div class="mt-4">
                {{ $users->links() }}
            </div>


        </main>

        <x-footer></x-footer>

    </div>

</div>

<!-- AlpineJS -->
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
<!-- Font Awesome -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>
</body>
</html>

