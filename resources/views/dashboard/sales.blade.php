<!DOCTYPE html>
<html lang="en">
<x-head></x-head>
<body class="bg-gray-100 font-family-karla flex">
<x-aside></x-aside>
    <div class="relative w-full flex flex-col h-screen overflow-y-hidden">
<x-desktop-header></x-desktop-header>
        <!-- Mobile Header & Nav -->
<x-mobile-header-nav></x-mobile-header-nav>

        <div class="w-full h-screen overflow-x-hidden border-t flex flex-col">
            <main class="w-full flex-grow p-6">
                <h1 class="w-full text-3xl text-black pb-6">Sales Panel</h1>

                <div class="flex flex-wrap">
                    <div class="w-full lg:w-1/2 my-6 pr-0 lg:pr-2">
                        <p class="text-xl pb-6 flex items-center">
                            <i class="fas fa-list mr-3"></i>Customer's Contact Form
                        </p>
                        <div class="leading-loose">
                            <form class="p-10 bg-white rounded shadow-xl" action="/sale" method="POST">
                                @csrf
                                <x-div-input>
                                    <x-label for="name">Name</x-label>
                                    <x-input type="text" id="customer_name" name="customer_name"></x-input>
                                </x-div-input>

                                <x-div-input>
                                    <x-label for="email">Email</x-label>
                                    <x-input type="email" id="email" name="email" class="py-4"></x-input>
                                </x-div-input>

                                <x-div-input>
                                    <x-label for="address">Address</x-label>
                                    <x-input  class="py-2" type="text" id="address" name="address" placeholder="Street"></x-input>
                                </x-div-input>

                                <x-div-input>
                                    <x-label for="city" class="hidden">City</x-label>
                                    <x-input class="py-2" type="text" id="city" name="city" placeholder="City"></x-input>
                                </x-div-input>

                                <x-div-input class="inline-block mt-2 w-1/2 pr-1">
                                    <x-label for="country" class="hidden">Country</x-label>
                                    <x-input class="py-2" type="text" id="country" name="country" placeholder="Country"></x-input>
                                </x-div-input>

                                <x-div-input class="inline-block mt-2 -mx-1 pl-1 w-1/2">
                                    <x-label for="zip" class="hidden">Zip</x-label>
                                    <x-input class="py-2" type="text" id="zip" name="zip"></x-input>
                                </x-div-input>

                                <x-div-input>
                                    <x-label for="phone">Phone</x-label>
                                    <x-input type="tel" id="phone" name="phone" class="px-5 py-1" placeholder="0700 000 000"></x-input>
                                </x-div-input>

                            </div>
                    </div>

                    <div class="w-full lg:w-1/2 mt-6 pl-0 lg:pl-2">
                        <p class="text-xl pb-6 flex items-center">
                            <i class="fas fa-list mr-3"></i> Sales Information
                        </p>
                        <div class="leading-loose">
                            <div class="p-10 bg-white rounded shadow-xl">
                                <div class="">
                                    <div class="">
                                        <label class="block text-sm text-gray-600" for="product_name">Product Name</label>
                                        <select class="w-full px-5 py-3 text-gray-700 bg-gray-200 rounded" id="product_name" name="product_name" required="">
                                            <option>Juice</option>
                                        </select>
                                    </div>

                                    <x-div-input>
                                        <x-label for="quantity">Quantity</x-label>
                                        <x-input type="number" min="1" id="sales_quantity" name="quantity" class="px-5 py-1" placeholder="10" oninput="calculateTotal()"></x-input>
                                    </x-div-input>

                                    <x-div-input>
                                        <x-label for="unity_price">Unity Price</x-label>
                                        <x-input class="py-2" type="number" min="1" id="unity_price" name="unity_price" class="px-5 py-1" placeholder="Tsh. 200" oninput="calculateTotal()"></x-input>
                                    </x-div-input>

                                    <x-div-input>
                                        <x-label for="total_price">Total Price</x-label>
                                        <x-input class="py-2" type="number"  id="total_price" name="total_price" class="px-5 py-1" placeholder="Tsh. 1000" readonly></x-input>
                                    </x-div-input>


                                <div class="mt-6">
                                    <button class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded" type="submit"><b id="total_button">Tsh. 0</b></button>
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
