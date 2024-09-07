<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tailwind Admin Template</title>
    <meta name="author" content="David Grzyb">
    <meta name="description" content="">

    <!-- Tailwind -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
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

<div class="relative w-full flex flex-col h-screen overflow-y-hidden">
    <div class="w-full h-screen overflow-x-hidden border-t flex flex-col">
        <main class="w-full flex-grow px-6 py-1.5">
            <h3 class="text-2xl text-black pb-2 text-center">Business Name</h3>
            <div class="justify-between flex">
            <h3 class="text-xl text-black">Sales Report From {{ $start_date }} to {{ $end_date }}</h3>
            <h3 class="text-xl text-black">Grand Total: {{ Number::currency($grand_total, in: 'Tsh.' )}}</h3>
            </div>
            <div class="w-full mt-6">
                <div class="bg-white overflow-auto">
                    <table class="min-w-full bg-white">
                        <thead class="bg-gray-800 text-white">
                        <tr>
                            <th class="w-1/6 text-left py-3 px-4 uppercase font-semibold text-sm">Product</th>
                            <th class="w-1/8 text-left py-3 px-4 uppercase font-semibold text-sm">Quantity</th>
                            <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Total Price</th>
                            <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Customer</th>
                            <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Phone</th>
                        </tr>
                        </thead>
                        <tbody class="text-gray-700">

                        @foreach($sales as $sale)
                            <tr>
                                <td class="w-1/6 text-left py-3 px-4">{{ $sale['product_name'] }}</td>
                                <td class="w-1/8 text-left py-3 px-4">{{ $sale['quantity'] }}</td>
                                <td class="text-left py-3 px-4">{{ Number::currency($sale['total_price'], in: 'Tsh.') }}</td>
                                <td class="text-left py-3 px-4">{{ Str::title($sale['customer_name']) }}</td>
                                <td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="tel:{{ $sale['phone'] }}">{{ $sale['phone'] }}</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>

</div>

<!-- AlpineJS -->
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
<!-- Font Awesome -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>
</body>
</html>
