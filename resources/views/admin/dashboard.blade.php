@extends('admin.layout.admin')
@section('dashboard')

<div class="min-h-screen flex bg-gray-100">
    <!-- Sidebar -->
    <div class="w-1/4 bg-white shadow-lg">
        <div class="p-4 border-b">
            <h2 class="text-2xl font-semibold">Welcome, {{ Auth::guard('admin')->user()->name }}</h2>
        </div>
        <nav class="mt-4">
            <a href="{{route('admin.dashboard')}}" class="block py-2 px-4 text-gray-700 hover:bg-gray-200">
                Manage Courses
            </a>
            <a href="#" class="block py-2 px-4 text-gray-700 hover:bg-gray-200">
                Manage Chapters
            </a>
            <a href="#" class="block py-2 px-4 text-gray-700 hover:bg-gray-200">
                Manage Content
            </a>
            <a href="#" class="block py-2 px-4 text-gray-700 hover:bg-gray-200">
                User Management
            </a>
            <a href="#" class="block py-2 px-4 text-gray-700 hover:bg-gray-200">
                Settings
            </a>
        </nav>
    </div>

    <!-- Main Content -->
    <div class="w-3/4 p-6">
        <!-- Top Bar -->
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-3xl font-semibold">Dashboard</h1>
        </div>

        <!-- Statistics Cards -->
        <div class="grid grid-cols-3 gap-4">
            <!-- Card 1 -->
            <div class="bg-white p-6 shadow-lg rounded-lg">
                <h2 class="text-xl font-bold text-gray-700">{{ $total_courses }}</h2>
                <p class="text-gray-500">Total Courses</p>
            </div>

            <!-- Card 2 -->
            <div class="bg-white p-6 shadow-lg rounded-lg">
                <h2 class="text-xl font-bold text-gray-700">{{ $total_chapters }}</h2>
                <p class="text-gray-500">Total Chapters</p>
            </div>

            <!-- Card 3 -->
            <div class="bg-white p-6 shadow-lg rounded-lg">
                <h2 class="text-xl font-bold text-gray-700">{{ $total_contents }}</h2>
                <p class="text-gray-500">Total Contents</p>
            </div>
        </div>

        <!-- Graph Section -->
        <div class="mt-8 bg-white p-6 shadow-lg rounded-lg">
            <h2 class="text-lg font-semibold text-gray-700 mb-4">Data Distribution</h2>
            <div class="w-full h-80">
                <canvas id="myChart"></canvas>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Prepare data
        const labels = ['Courses', 'Chapters', 'Contents']; // Labels for the chart
        const data = [`{{ $total_courses }}`, `{{ $total_chapters }}`, `{{ $total_contents }}`]; // Data values

        // Create the doughnut chart
        const ctx = document.getElementById('myChart').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'doughnut', // Chart type
            data: {
                labels: labels, // Set the labels
                datasets: [{
                    label: 'Distribution',
                    data: data, // Set the data values
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.6)', // Courses color
                        'rgba(255, 206, 86, 0.6)', // Chapters color
                        'rgba(75, 192, 192, 0.6)'  // Contents color
                    ],
                    borderColor: [
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: true, // Display legend
                        position: 'top' // Position legend
                    },
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                const total = tooltipItem.chart.data.datasets[0].data.reduce((sum, value) => sum + value, 0);
                                const percentage = ((tooltipItem.raw / total) * 100).toFixed(2);
                                return `${tooltipItem.label}: ${tooltipItem.raw} (${percentage}%)`;
                            }
                        }
                    }
                }
            }
        });
    });
</script>

@endsection
