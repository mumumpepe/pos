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

        <div class="w-full overflow-x-hidden border-t flex flex-col">
            <main class="w-full flex-grow p-6">
                <h1 class="text-4xl text-center text-black pb-2">Daily Sales</h1>

                <div class=" mt-6">
                    <div class="w-full pr-0 lg:pr-2">
                        <p class="text-xl pb-3 flex items-center">
                            <i class="fas fa-plus mr-3"></i> Weekly Sales Histogram
                        </p>
                        <div class="p-6 bg-white">
                            <canvas id="chartOne" width="400" height="200"></canvas>
                        </div>
                    </div>
                    <div class="w-full  pl-0 lg:pl-2 mt-12 lg:mt-4">
                        <p class="text-xl pb-3 flex items-center">
                            <i class="fas fa-plus mr-3"></i>Weekly Sales Curve
                        </p>
                        <div class="p-6 bg-white">
                            <canvas id="chartTwo" width="400" height="200"></canvas>
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
    <!-- ChartJS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" integrity="sha256-R4pqcOYV8lt7snxMQO/HSbVCFRPMdrhAFMH+vr9giYI=" crossorigin="anonymous"></script>


<script>
    // Create a new Date object
    const now = new Date();

    // Create an array to store the dates of the last 7 days
    const last7Days = [];
    for (let i = 0; i < 7; i++) {
        // Create a new date object for each day
        let date = new Date(now);
        date.setDate(now.getDate() - i); // Subtract i days from today
        // Format the date as YYYY-MM-DD
        last7Days.unshift(date.toISOString().split('T')[0]);
    }

    // Data fetched from backend for the last 7 days
    const dayOne = @json($day_one);
    const dayTwo = @json($day_two);
    const dayThree = @json($day_three);
    const dayFour = @json($day_four);
    const dayFive = @json($day_five);
    const daySix = @json($day_six);
    const daySeven = @json($day_seven);

    // Reverse the order of the sales data to match the order of dates
    const salesData = [daySeven, daySix, dayFive, dayFour, dayThree, dayTwo, dayOne];

    // Chart 1: Bar chart
    var chartOne = document.getElementById('chartOne');
    var myChart = new Chart(chartOne, {
        type: 'bar',
        data: {
            labels: last7Days,  // Use the last 7 days' dates as labels
            datasets: [{
                label: 'Day Sale',
                data: salesData,  // Use the sales data for the last 7 days
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });

    // Chart 2: Line chart
    var chartTwo = document.getElementById('chartTwo');
    var myLineChart = new Chart(chartTwo, {
        type: 'line',
        data: {
            labels: last7Days,  // Use the last 7 days' dates as labels
            datasets: [{
                label: 'Day Sale',
                data: salesData,  // Use the sales data for the last 7 days
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>

<script>
    console.log('Day One:', @json($day_one));
    console.log('Day Two:', @json($day_two));
    console.log('Day Three:', @json($day_three));
    console.log('Day Four:', @json($day_four));
    console.log('Day Five:', @json($day_five));
    console.log('Day Six:', @json($day_six));
    console.log('Day Seven:', @json($day_seven));
</script>


</body>
</html>
