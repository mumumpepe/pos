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

            <div class="bg-cover bg-center bg-fixed" style="background-image: url('https://picsum.photos/1920/1080')">
                <div class="h-screen flex justify-center items-center">
                    <div class="bg-white mx-4 p-8 rounded shadow-md w-full md:w-1/2 lg:w-1/3">
                        <h1 class="text-3xl font-bold mb-8 text-center">Edit User Details</h1>
                        <form action="/user/{{ $id->id }}/edit" method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="mb-4">
                                <x-forms.label>First Name</x-forms.label>
                                <x-forms.input  name="first_name" value="{{ $id->first_name }}" required />
                            </div>
                            <div class="mb-4">
                                <x-forms.label>Last Name</x-forms.label>
                                <x-forms.input  name="last_name" value="{{ $id->last_name }}" required />
                            </div>
                            <div class="mb-4">
                                <x-forms.label>Email</x-forms.label>
                                <x-forms.input name="email" type="email" value="{{ $id->email }}" required />
                            </div>
                            <div class="mb-4">
                                <x-forms.label>Password</x-forms.label>
                                <x-forms.input name="password" type="password"  required />
                            </div>
                            <div class="mb-6">
                                <x-forms.button type="submit">Save Changes</x-forms.button>
                            </div>
                        </form>
                    </div>
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
