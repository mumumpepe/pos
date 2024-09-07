<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales Report</title>
    <meta name="author" content="David Grzyb">
    <meta name="description" content="">

    <!-- Tailwind -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        /* Import Google Fonts */
        @import url('https://fonts.googleapis.com/css?family=Karla:400,700&display=swap');

        /* Custom fonts and colors */
        .font-family-karla { font-family: 'Karla', sans-serif; }
        .bg-sidebar { background-color: #3d68ff; }
        .cta-btn { color: #3d68ff; }
        .upgrade-btn { background-color: #1947ee; }
        .upgrade-btn:hover { background-color: #0038fd; }
        .active-nav-link { background-color: #1947ee; }
        .nav-item:hover { background-color: #1947ee; }
        .account-link:hover { background-color: #3d68ff; }

        /* Table Styles */
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f8f9fa;
            font-weight: bold;
        }

        .text-center {
            text-align: center;
        }

        .text-right {
            text-align: right;
        }

        .hover-text-blue-500:hover {
            color: #3b82f6;
        }
    </style>
</head>
<body class="bg-gray-100 font-family-karla flex">

<div class="w-full flex flex-col h-screen overflow-y-hidden">
    <div class="w-full h-screen overflow-x-hidden border-t flex flex-col">
        <main class="w-full flex-grow px-6 py-4">
            <!-- Header -->
            <h1 class="text-2xl font-bold text-center mb-4">Business Name</h1>

            <!-- Report Title and Date Range -->
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xl font-semibold">Sales Report: {{ $start_date }} to {{ $end_date }}</h3>
                <h3 class="text-xl font-semibold">Grand Total: {{ Number::currency($grand_total, in: 'Tsh.') }}</h3>
            </div>

            <!-- Table Section -->
            <div class="w-full bg-white shadow-md rounded overflow-auto">
                <table class="table-auto">
                    <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="w-1/6 px-4 py-3">Product</th>
                        <th class="w-1/8 px-4 py-3 text-center">Quantity</th>
                        <th class="px-4 py-3">Total Price</th>
                        <th class="px-4 py-3">Customer</th>
                        <th class="px-4 py-3">Email</th>
                        <th class="px-4 py-3">Phone</th>
                    </tr>
                    </thead>
                    <tbody class="text-gray-700">
                    @foreach($sales as $sale)
                        <tr class="border-t">
                            <td class="px-4 py-3">{{ $sale['product_name'] }}</td>
                            <td class="px-4 py-3 text-center">{{ $sale['quantity'] }}</td>
                            <td class="px-4 py-3">{{ Number::currency($sale['total_price'], in: 'Tsh.') }}</td>
                            <td class="px-4 py-3">{{ Str::title($sale['customer_name']) }}</td>
                            <td class="px-4 py-3"><a href="mailto:{{ $sale['email'] }}" class="hover-text-blue-500">{{ $sale['email'] }}</a></td>
                            <td class="px-4 py-3"><a href="tel:{{ $sale['phone'] }}" class="hover-text-blue-500">{{ $sale['phone'] }}</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</div>

<!-- AlpineJS -->
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
<!-- Font Awesome -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
</body>
</html>
