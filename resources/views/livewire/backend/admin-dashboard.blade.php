<div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Dashboard</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Monthly News Post Counts</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <caption>Total news posts created each month</caption>
                                    <thead>
                                        <tr>
                                            <th>Month</th>
                                            <th>Year</th>
                                            <th>Count</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $totalCount = 0;
                                        @endphp
                                        @foreach ($monthlyCounts as $monthlyCount)
                                            <tr>
                                                <td>{{ \Carbon\Carbon::create()->month($monthlyCount->month)->format('F') ?? '' }}
                                                </td>
                                                <td>{{ $monthlyCount->year ?? '' }}</td>
                                                <td>{{ $monthlyCount->count ?? '' }}</td>
                                                @php
                                                    $totalCount += $monthlyCount->count;
                                                @endphp
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <td colspan="2" class="text-right"><strong>Total</strong></td>
                                            <td><strong>{{ $totalCount }}</strong></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Chart --}}
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header bg-transparent border-bottom py-3">
                            <h4 class="card-title">Pie Chart </h4>
                        </div>
                        <div class="card-body">
                            <div class="col-lg-8">
                                <canvas id="monthlyCountsPieChart" width="100" height="100"></canvas>
                            </div>
                            {{-- <div class="col-lg-6"> --}}
                          {{-- <canvas id="monthlyCountsChart" width="800" height="400"></canvas> --}}
                            {{-- </div> --}}
                        </div>
                    </div>
                </div>
            </div>






            <!-- end row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header bg-transparent border-bottom py-3">
                            <h4 class="card-title">Dashboard</h4>
                            <p class="card-title-desc mb-0">Fill out the particulars in order to add or update.</p>
                        </div>
                        <div class="card-body">
                            <!--success or error alert-->
                            @livewire('backend.git-status')
                        </div>
                    </div>
                </div>
            </div>

            {{-- pie chart  --}}
            <script>
                // Fetch data from Livewire
                let monthlyCounts = {!! json_encode($monthlyCounts) !!};
            
                // Log the fetched data to the console
                console.log('Monthly Counts Data:', monthlyCounts);
            
                // Prepare data for charting
                let labels = [];
                let counts = [];
                let totalCount = 0;
            
                // Array of month names
                const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
            
                // Extract count, month, and year from the provided data structure
                monthlyCounts.forEach(monthlyCount => {
                    counts.push(monthlyCount.count);
                    // Concatenate month name and year
                    labels.push(`${monthNames[monthlyCount.month - 1]} (${monthlyCount.year})`); // Subtract 1 because month index starts from 0
                    totalCount += monthlyCount.count;
            
                    // Log individual count, month, and year
                    console.log('Count:', monthlyCount.count);
                    console.log('Month:', monthNames[monthlyCount.month - 1]); // Subtract 1 because month index starts from 0
                    console.log('Year:', monthlyCount.year);
                });
            
                // Log the total count to the console
                console.log('Total Count:', totalCount);
            
                // Create the pie chart
                let ctx = document.getElementById('monthlyCountsPieChart').getContext('2d');
                let chart = new Chart(ctx, {
                    type: 'pie',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Monthly Counts',
                            data: counts,
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.5)',   // Red
                                'rgba(54, 162, 235, 0.5)',   // Blue
                                'rgba(255, 205, 86, 0.5)',   // Yellow
                                'rgba(75, 192, 192, 0.5)',   // Green
                                'rgba(153, 102, 255, 0.5)',  // Purple
                                'rgba(255, 159, 64, 0.5)'    // Orange
                            ],
                            borderColor: [
                                'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 205, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)'
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        plugins: {
                            title: {
                                display: true,
                                text: `Monthly Counts (${totalCount})`
                            },
                            legend: {
                                display: true,
                                position: 'right',
                                labels: {
                                    boxWidth: 20,
                                    fontSize: 12
                                }
                            },
                            tooltip: {
                                callbacks: {
                                    label: function(context) {
                                        let label = context.label || '';
                                        if (label) {
                                            label += ': ';
                                        }
                                        label += context.formattedValue || '';
                                        return label;
                                    }
                                }
                            }
                        }
                    }
                });
            </script>
            

{{-- Col chat  --}}
            {{-- <script>
                // Fetch data from Livewire
                let monthlyCounts = {!! json_encode($monthlyCounts) !!};
            
                // Log the fetched data to the console
                console.log('Monthly Counts Data:', monthlyCounts);
            
                // Prepare data for charting
                let labels = [];
                let counts = [];
                let totalCount = 0;
            
                // Array of month names
                const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
            
                // Extract count, month, and year from the provided data structure
                monthlyCounts.forEach(monthlyCount => {
                    counts.push(monthlyCount.count);
                    // Concatenate month name and year
                    labels.push(`${monthNames[monthlyCount.month - 1]} (${monthlyCount.year})`); // Subtract 1 because month index starts from 0
                    totalCount += monthlyCount.count;
            
                    // Log individual count, month, and year
                    console.log('Count:', monthlyCount.count);
                    console.log('Month:', monthNames[monthlyCount.month - 1]); // Subtract 1 because month index starts from 0
                    console.log('Year:', monthlyCount.year);
                });
            
                // Log the total count to the console
                console.log('Total Count:', totalCount);
            
                // Create the chart
                let ctx = document.getElementById('monthlyCountsChart').getContext('2d');
                let chart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Monthly Counts',
                            data: counts,
                            backgroundColor: 'rgba(54, 162, 235, 0.5)', // Adjust color as needed
                            borderColor: 'rgba(54, 162, 235, 1)', // Adjust color as needed
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        },
                        plugins: {
                            title: {
                                display: true,
                                text: 'Monthly Counts'
                            }
                        }
                    }
                });
            </script> --}}

            {{-- News total  --}}
            {{-- <script>
   document.addEventListener('livewire:init', () => {
        Livewire.on('updatePieChart', function (monthlyCounts) {
            // Process monthlyCounts and update pie chart
            console.log(monthlyCounts); // Check if data is received correctly
            // Call the function to update the pie chart
            updatePieChart(monthlyCounts);
        });
    });
</script> --}}
        </div>
        <!-- container-fluid -->
    </div>
</div>
