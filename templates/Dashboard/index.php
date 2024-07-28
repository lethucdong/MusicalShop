<?= $this->Html->script('https://cdn.jsdelivr.net/npm/chart.js') ?>

<?= $this->Html->css('https://cdn.jsdelivr.net/npm/chart.js/dist/chart.min.css') ?>

<div class="charts index content">
    <canvas id="myChart" width="400" height="200"></canvas>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var ctx = document.getElementById('myChart').getContext('2d');
            var chartData = <?= json_encode($chartData) ?>;
            
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: chartData,
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
    </script>
</div>
