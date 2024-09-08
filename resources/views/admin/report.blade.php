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


            <h1 class="w-full text-3xl text-black pb-6">Sales Report</h1>

            <div class="flex flex-wrap">
                <div class="w-full lg:w-1/2 my-6 pr-0 lg:pr-2">
                    <p class="text-xl pb-6 flex items-center">
                        <i class="fas fa-calendar mr-3"></i>Start Date
                    </p>
                    <div class="leading-loose">
                        <form class="p-10 bg-white rounded shadow-xl" action="/report" method="POST">
                            @csrf
                            <x-div-input>
                                <x-label for="name"></x-label>
                                <x-input type="date" id="start_date" name="start_date" ></x-input>
                            </x-div-input>
                    </div>
                </div>

                <div class="w-full lg:w-1/2 mt-6 pl-0 lg:pl-2">
                    <p class="text-xl pb-6 flex items-center">
                        <i class="fas fa-calendar mr-3"></i> End Date
                    </p>
                    <div class="leading-loose">
                        <div class="p-10 bg-white rounded shadow-xl">
                            <div class="">
                                <x-div-input>
                                    <x-label for="end_date"></x-label>
                                    <x-input type="date" id="end_date" max="{{ date('Y-m-d') }}" name="end_date" class="px-5 py-1"></x-input>
                                </x-div-input>
                                <div class="mt-6">
                                    <button class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded" type="submit">Generate</button>
                                </div>
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
