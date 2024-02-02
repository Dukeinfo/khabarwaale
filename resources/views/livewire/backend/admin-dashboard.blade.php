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
            <div class="row">
                @php
                $colors = ['bg-primary', 'bg-success', 'bg-danger', 'bg-warning', 'bg-info']; // Define colors
                $colorIndex = 0; // Index for selecting colors
            @endphp
                @foreach ($totalyearCounts as $yearCount)
                <div class="col-lg-4">
                    <div class="card mb-4 ">
                        <div class="card-header  {{ $colors[$colorIndex % count($colors)] }} text-white">
                            <h5 class="card-title">{{ $yearCount->year }}</h5>
                        </div>
                        <div class="card-body">
                            <p class="card-text">Total News Count: {{ $yearCount->count }}</p>
                        </div>
                    </div>
                </div>
                @php
                $colorIndex++; // Move to the next color
            @endphp
                @endforeach
            </div>
            @php
                
                $totalCount = 0;
                foreach ($totalyearCounts as $yearCount) {
                    $totalCount += $yearCount->count;
                }
                @endphp

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header bg-info text-white">
                            <h5 class="card-title">Total Count</h5>
                        </div>
                        <div class="card-body">
                            <p class="card-text">Total: {{ $totalCount }}</p>
                        </div>
                    </div>
                </div>
            </div>
         
            <!-- end page title -->
            {{-- <div class="row">
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
            </div> --}}

            {{-- Chart --}}
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header bg-transparent border-bottom py-3">
                            <h4 class="card-title">Monthly Counts Pie Chart</h4>
                        </div>
                        <div class="card-body">
                            <div class="col-lg-12">
                                <canvas id="monthlyCountsPieChart" width="500" height="500"></canvas>
                            </div>
                            {{-- <div class="col-lg-6"> --}}
                          {{-- <canvas id="monthlyCountsChart" width="800" height="400"></canvas> --}}
                            {{-- </div> --}}
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header bg-transparent border-bottom py-3">
                            <h4 class="card-title">Monthly Counts</h4>
                        </div>
                        <div class="card-body">
                            @php
                            $colors = ['bg-primary', 'bg-success', 'bg-danger', 'bg-warning', 'bg-info']; // Define colors
                            $colorIndex = 0; // Index for selecting colors
                        @endphp
                            @foreach ($modifiedCounts as $year => $months)
                       
                        
                                <h5 class=" {{ $colors[$colorIndex % count($colors)] }} text-white px-3 py-2">{{ $year }}</h5>
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th width="50%">Month</th>
                                            <th>Count</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                 @php
                                      $colorIndex++; // Move to the next color
                                 @endphp
                                        @foreach ($months as $month => $count)
                                            <tr>
                                                <td>{{ \Carbon\Carbon::create()->month($month)->format('F') }}</td>
                                                <td>{{ $count }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                </div>
                            @endforeach
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
            
                // Define color arrays with at least 12 colors
                const backgroundColors = [
                    '#4BC0C0', // Green: #4BC0C0
                    '#36A2EB', // Blue: #36A2EB
                    '#FFCD56', // Yellow: #FFCD56
                    '#FF6384', // Red: #FF6384
                    '#9966FF', // Purple: #9966FF
                    '#FF9F40', // Orange: #FF9F40
                    '#FF0000', // Bright Red: #FF0000
                    '#00FF00', // Bright Green: #00FF00
                    '#0000FF', // Bright Blue: #0000FF
                    '#FFFF00', // Yellow: #FFFF00
                    '#800080', // Indigo: #800080
                    '#FFA500', // Orange: #FFA500
                    '#008000', // Dark Green: #008000
                    '#5626C4', // Blue Violet: #5626C4
                    '#E60576', // Hollywood Cerise: #E60576
                    '#2CCCC3', // Maximum Blue Green: #2CCCC3
                    '#FACD3D', // Sunglow: #FACD3D
                    '#FF5100', // Red Orange: #FF5100
                    '#181818'  // Cod Gray: #181818

                ];
            
                const borderColors = [
                    '#4BC0C0', // Green: #4BC0C0
                    '#36A2EB', // Blue: #36A2EB
                    '#FFCD56', // Yellow: #FFCD56
                    '#FF6384', // Red: #FF6384
                    '#9966FF', // Purple: #9966FF
                    '#FF9F40', // Orange: #FF9F40
                    '#FF0000', // Bright Red: #FF0000
                    '#00FF00', // Bright Green: #00FF00
                    '#0000FF', // Bright Blue: #0000FF
                    '#FFFF00', // Yellow: #FFFF00
                    '#800080', // Indigo: #800080
                    '#FFA500', // Orange: #FFA500
                    '#008000', // Dark Green: #008000
                    '#5626C4', // Blue Violet: #5626C4
                    '#E60576', // Hollywood Cerise: #E60576
                    '#2CCCC3', // Maximum Blue Green: #2CCCC3
                    '#FACD3D', // Sunglow: #FACD3D
                    '#FF5100', // Red Orange: #FF5100
                    '#181818'  // Cod Gray: #181818
                ];
            
                // Create the pie chart
                let ctx = document.getElementById('monthlyCountsPieChart').getContext('2d');
                let chart = new Chart(ctx, {
                    type: 'pie',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Monthly Counts',
                            data: counts,
                            backgroundColor: backgroundColors,
                            borderColor: borderColors,
                            borderWidth: 1
                        }]
                    },
                    options: {
                        plugins: {
                            title: {
                                display: true,
                                text: `Monthly Counts (${totalCount})`,
                                position: 'top',
                                align: 'start', // Adjusts alignment to start (left) of the legend box

                                
                            },
                            legend: {
                                display: true,
                                position: 'right',
                                align: 'start', // Adjusts alignment to start (left) of the legend box
                                labels: {
                                    boxWidth: 20,
                                    fontSize: 12,
                                    padding: 20, // Add padding to legend items
                                    
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
                        },
                        responsive: true, // Make the chart responsive
                         maintainAspectRatio: false // Prevent the chart from maintaining aspect ratio
                         
                        //     onClick: function(e, legendItem) {
                        //     // Toggle visibility of the corresponding month in the chart
                        //     let index = legendItem.index;
                        //     let meta = this.chart.getDatasetMeta(0);
                        //     meta.data[index].hidden = !meta.data[index].hidden;
                        //     this.chart.update();
                        // }
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
