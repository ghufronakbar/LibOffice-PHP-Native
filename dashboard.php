<?php
require_once 'layout/dashboard.php';
require_once 'services/report/getCount.php';
require_once 'services/report/countBySection.php';
require_once 'services/report/countMonthlyCreated.php';

$counts = getCounts();
$countSections = countBySection();
$countMonthly = countMonthlyCreated();

$sectionNames = [];
$totalBooks = [];
foreach ($countSections as $section) {
    $sectionNames[] = $section['sectionName'];
    $totalBooks[] = $section['totalBooks'];
}

$months = [];
$totalBooksMonthly = [];
foreach ($countMonthly as $entry) {
    $months[] = $entry['month'];
    $totalBooksMonthly[] = $entry['totalBooks'];
}
?>

<div class="ml-72 p-6 text-white">
    <h1 class="text-2xl font-bold text-accent mb-4">Dashboard</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div class="bg-primary p-6 rounded-lg">
            <h2 class="text-lg font-semibold">Total Buku</h2>
            <p class="text-3xl font-bold"><?php echo $counts['totalBooks']; ?></p>
        </div>
        <div class="bg-secondary p-6 rounded-lg">
            <h2 class="text-lg font-semibold">Total Jenis Buku</h2>
            <p class="text-3xl font-bold"><?php echo $counts['totalSections']; ?></p>
        </div>
        <div class="mt-8 bg-white p-6 rounded-lg">
            <canvas id="myPieChart" width="400" height="400"></canvas>
        </div>

        <div class="mt-8 bg-white p-6 rounded-lg">
            <canvas id="myBarChart" width="400" height="400"></canvas>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const ctx = document.getElementById('myPieChart').getContext('2d');
            const myPieChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: <?php echo json_encode($sectionNames); ?>,
                    datasets: [{
                        label: 'Total Books',
                        data: <?php echo json_encode($totalBooks); ?>,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.5)',
                            'rgba(54, 162, 235, 0.5)',
                            'rgba(255, 206, 86, 0.5)',
                            'rgba(75, 192, 192, 0.5)',
                            'rgba(153, 102, 255, 0.5)',
                            'rgba(255, 159, 64, 0.5)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 2
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'right',
                            labels: {
                                font: {
                                    size: 14
                                },
                                color: '#333'
                            }
                        },
                        title: {
                            display: true,
                            text: 'Totak Buku Berdasarkan Jenis',
                            font: {
                                size: 18
                            },
                            color: '#333'
                        }
                    }
                }
            });

            const ctxBar = document.getElementById('myBarChart').getContext('2d');
            const gradient = ctxBar.createLinearGradient(0, 0, 0, 400);
            gradient.addColorStop(0, 'rgba(54, 162, 235, 0.8)');
            gradient.addColorStop(1, 'rgba(75, 192, 192, 0.8)');

            const myBarChart = new Chart(ctxBar, {
                type: 'bar',
                data: {
                    labels: <?php echo json_encode($months); ?>,
                    datasets: [{
                        label: 'Buku Terdaftar',
                        data: <?php echo json_encode($totalBooksMonthly); ?>,
                        backgroundColor: gradient,
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 2
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                color: '#333',
                                font: {
                                    size: 12
                                }
                            }
                        },
                        x: {
                            ticks: {
                                color: '#333',
                                font: {
                                    size: 12
                                }
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            position: 'top',
                            labels: {
                                font: {
                                    size: 14
                                },
                                color: '#333'
                            }
                        },
                        title: {
                            display: true,
                            text: 'Buku Terdaftar Tiap Bulan',
                            font: {
                                size: 18
                            },
                            color: '#333'
                        }
                    }
                }
            });
        });
    </script>
</div>

<?php include 'layout/endDashboard.php'; ?>