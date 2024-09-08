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
                <h1 class="text-3xl text-black pb-6">Sales</h1>

                <div class="w-full mt-6">
                    <p class="text-xl pb-3 flex items-center">
                        <i class="fas fa-coins mr-3"></i> Latest Sales
                    </p>
                    <div class="bg-white overflow-auto">
                        <table class="min-w-full bg-white">
                            <thead class="bg-gray-800 text-white">
                                <tr>
                                    <th class="w-1/6 text-left py-3  px-4 uppercase font-semibold text-sm">Product</th>
                                    <th class="w-1/8 text-left py-3  px-4 uppercase font-semibold text-sm">Quantity</th>
                                    <th class="text-left py-3  px-4 uppercase font-semibold text-sm">Total Price</th>
                                    <th class="text-left py-3  px-4 uppercase font-semibold text-sm">Customer</th>
                                    <th class="text-left py-3  px-4 uppercase font-semibold text-sm">Phone</th>
                                    <th class="text-left py-3  px-4 uppercase font-semibold text-sm" colspan="2">Action</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-700">

                            @foreach($sales as $sale)
                                <tr>
                                    <td class="w-1/6 text-left py-3  px-4">{{ $sale['product_name'] }}</td>
                                    <td class="w-1/8 text-left py-3  px-4">{{ $sale['quantity'] }}</td>
                                    <td class="text-left py-3  px-4">{{ Number::currency($sale['total_price'], in: 'Tsh.') }}</td>
                                    <td class="text-left py-3  px-4">{{ Str::title($sale['customer_name']) }}</td>
                                    <td class="text-left py-3  px-4"><a class="hover:text-blue-500" href="tel:{{ $sale['phone'] }}">{{ $sale['phone'] }}</a></td>
                                    <td class="text-left py-3  px-4"><a class="hover:text-blue-500" href="/sale/{{ $sale->id }}/edit">Edit</a></td>
                                    <td class="text-left py-3  px-4">
                                            <form class="inline" action="/sales/{{ $sale->id }}" method="POST" id="delete-form">
                                                @csrf
                                                @method('DELETE')
                                                <button class="bg-none text-black"> Delete</button>
                                            </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="mt-4">
                    {{ $sales->links() }}
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
