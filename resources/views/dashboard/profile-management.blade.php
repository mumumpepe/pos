<!DOCTYPE html>
<html lang="en">
<x-head></x-head>
<body class="bg-gray-100 font-family-karla flex">
@if(Auth::user()->role == 'administrator')
    <x-admin.aside></x-admin.aside>
@endif
@if(Auth::user()->role == 'salesman')
    <x-aside></x-aside>
@endif

<div class="relative w-full flex flex-col h-screen overflow-y-hidden">
    <x-desktop-header></x-desktop-header>
    <!-- Mobile Header & Nav -->
    <x-mobile-header-nav></x-mobile-header-nav>

    <div class="w-full h-screen overflow-x-hidden border-t flex flex-col">
        <main class="w-full flex-grow p-6">
            <h1 class="w-full text-3xl text-black pb-6">User Profile Management</h1>


            <div class="flex flex-wrap">
                <div class="w-full lg:w-1/2 my-6 pr-0 lg:pr-2">
                    <p class="text-xl pb-6 flex items-center">
                        <i class="fas fa-solid fa-user mr-3"></i>Pofile Picture
                    </p>
                    <div class="leading-loose">
                        <form class="p-10 bg-white rounded shadow-xl" action="/upload/{{Auth::user()->id}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <x-div-input>
                                <img class="w-3/4 mx-auto rounded-2xl"  src="{{ asset('storage/images/'.Auth::user()->image_path) }}" alt="image">
                            </x-div-input>

                            <x-div-input class="inline-block mt-2 pr-1 lg:flex sm:mx-auto">

                                <x-input class="py-2 w-1/3 pr-1"  type="file" name="image"></x-input>

                                <button class="px-4 w-full m-1 py-1 text-white font-light tracking-wider bg-gray-900 rounded" type="submit">Upload/Update</button>
                            </x-div-input>

                        </form>
                    </div>
                </div>


                <div class="w-full lg:w-1/2 mt-6 pl-0 lg:pl-2">
                    <p class="text-xl pb-6 flex items-center">
                        <i class="fas fa-solid fa-lock mr-3"></i> User Info - Change Password
                    </p>
                    <div class="leading-loose">
                        <form action="/user/{{ Auth::user()->id }}/password" method="POST">
                            @csrf
                            @method('PATCH')
                        <div class="p-10 bg-white rounded shadow-xl">
                            <div class="">
                                <x-div-input>
                                    <x-label for="first_name">First Name</x-label>
                                    <x-input type="text" min="1"  class="px-5 py-1" placeholder="{{ Auth::user()->first_name }}" readonly></x-input>
                                </x-div-input>

                                <x-div-input>
                                    <x-label for="last_name">Last Name</x-label>
                                    <x-input class="py-2" type="text"  class="px-5 py-1" placeholder="{{ Auth::user()->last_name }}" readonly></x-input>
                                </x-div-input>

                                <x-div-input>
                                    <x-label for="email">Email</x-label>
                                    <x-input class="py-2" type="text"  class="px-5 py-1" placeholder="{{ Auth::user()->email }}"  readonly></x-input>
                                </x-div-input>

                                <x-div-input>
                                    <x-label for="password">New Password</x-label>
                                    <x-input class="py-2" type="password" name="password" class="px-5 py-1"></x-input>
                                </x-div-input>

                                <x-input class="hidden" name="email" value="{{ Auth::user()->email }}"></x-input>


                                <div class="mt-6">
                                    <button class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded" type="submit">Save</button>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
        </main>

        <x-footer></x-footer>

    </div>

</div>



<!-- AlpineJS -->
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
<!-- Font Awesome -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>

<!-- Unity Price -->
<script>
    function calculateTotal() {
        var quantity = document.getElementById("sales_quantity").value;
        var unity_price = document.getElementById("unity_price").value;
        var sum = unity_price * quantity;
        document.getElementById("total_price").value = sum;
        document.getElementById("total_button").innerHTML = "Tsh. " + sum;
    }

</script>

</body>
</html>
