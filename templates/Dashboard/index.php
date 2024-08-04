<?= $this->Html->script('https://cdn.jsdelivr.net/npm/chart.js') ?>
<?= $this->Html->css('https://cdn.jsdelivr.net/npm/chart.js/dist/chart.min.css') ?>
<?= $this->Html->script('https://code.jquery.com/jquery-3.6.0.min.js') ?>

<div class="charts index content">
    <h2 style="padding-top: 50px">Biểu đồ thống kê tổng số tiền bán được</h1>
    <canvas id="myChart" width="400" height="200"></canvas>
    
    <form id="dateFilterForm" style = "display: flex; align-items: center; justify-content: space-evenly; flex-direction: column;">
        <div class="dateType" style="display: flex; align-items: center; text-wrap: nowrap; justify-content: center;">
            <label style="font-size: 15px; padding-right: 10px; margin-bottom: 0px;" for="date_type"><?= __('Date Type: ') ?></label>
            <div style="display: flex; flex-direction: row; padding-right: 15px; align-items: center;">
                <input style="margin-bottom: 0px;" type="radio" id="date_type_day" name="date_type" value="day" <?= $dateType === 'day' ? 'checked' : '' ?>>
                <label style="font-size: 15px; padding-right: 10px; margin-bottom: 0px;" for="date_type_day">Day</label>
            </div>
            <div style="display: flex; flex-direction: row; padding-right: 15px; align-items: center;">
                <input style="margin-bottom: 0px;" type="radio" id="date_type_month" name="date_type" value="month" <?= $dateType === 'month' ? 'checked' : '' ?>>
                <label style="font-size: 15px; padding-right: 10px; margin-bottom: 0px;" for="date_type_month">Month</label>
            </div>
            <div style="display: flex; flex-direction: row; padding-right: 15px; align-items: center;">
                <input style="margin-bottom: 0px;" type="radio" id="date_type_year" name="date_type" value="year" <?= $dateType === 'year' ? 'checked' : '' ?>>
                <label style="font-size: 15px; padding-right: 10px; margin-bottom: 0px;" for="date_type_year">Year</label>
            </div>
        </div>

        <div style="display: flex; width: 100%; justify-content: space-evenly; align-items: center;">
            <div class ="startDate" style = "display: flex; align-items: center; text-wrap: nowrap;">
                <label style="font-size: 15px; padding-right: 10px; margin-bottom: 0px;" for="start_date"><?= __('Start Date: ') ?></label>
                <input  style=" margin-bottom: 0px;" type="date" id="start_date" name="start_date" value="<?= h($startDate->format('Y-m-d')) ?>">
            </div>

            <div class ="startDate" style = "display: flex; align-items: center; text-wrap: nowrap;">
                <label style="font-size: 15px; padding-right: 10px;  margin-bottom: 0px;" for="end_date"><?= __('End Date: ') ?></label>
                <input style=" margin-bottom: 0px;" type="date" id="end_date" name="end_date" value="<?= h($endDate->format('Y-m-d')) ?>">
            </div>

            <button style=" margin-bottom: 0px;" type="submit"><?= __('Filter') ?></button>
        </div>        
    </form>

    <h2 style="padding-top: 50px">Biểu đồ thống kê sản phẩm bán được</h1>
    <div style = "display: flex; width: 100%; justify-content: center;">
    <canvas style = "max-width: 600px; max-height: 600px;" id="myChart1" width="400" height="200"></canvas>
    </div >
    <div style="display: flex; justify-content: space-between;">
        <div id="chartLegend" style="padding-left: 20px;"></div>
    </div>
    <form id="dateFilterForm1" style = "display: flex; align-items: center; justify-content: space-evenly; flex-direction: column; padding-bottom: 50px">
        <div style="display: flex; width: 100%; justify-content: space-evenly; align-items: center;">
            <div class ="startDate" style = "display: flex; align-items: center; text-wrap: nowrap;">
                <label style="font-size: 15px; padding-right: 10px; margin-bottom: 0px;" for="start_date1"><?= __('Start Date: ') ?></label>
                <input  style=" margin-bottom: 0px;" type="date" id="start_date1" name="start_date1" value="<?= h($startDate->format('Y-m-d')) ?>">
            </div>

            <div class ="startDate" style = "display: flex; align-items: center; text-wrap: nowrap;">
                <label style="font-size: 15px; padding-right: 10px;  margin-bottom: 0px;" for="end_date1"><?= __('End Date: ') ?></label>
                <input style=" margin-bottom: 0px;" type="date" id="end_date1" name="end_date1" value="<?= h($endDate->format('Y-m-d')) ?>">
            </div>

            <button style=" margin-bottom: 0px;" type="submit"><?= __('Filter') ?></button>
        </div>        
    </form>

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
                    },
                    plugins: {
                    legend: {
                        position: 'top',
                        display: false,
                    },
                    title: {
                        display: true,
                        text: 'Doanh thu'
                    },
                    }
                }
            });

            $('#dateFilterForm').on('submit', function(e) {
                e.preventDefault();

                var startDate = $('#start_date').val();
                var endDate = $('#end_date').val();
                var dateType = document.querySelector('input[name="date_type"]:checked').value;

                $.ajax({
                    type: 'GET',
                    url: "<?= $this->Url->build(['controller' => 'Dashboard', 'action' => 'totalAmountChart']) ?>",
                    dataType: 'json',
                    cache: false,
                    data: { start_date: startDate, end_date: endDate, date_type: dateType },
                    success: function(response) {
                        myChart.data = response.chartData;
                        myChart.update();
                    },
                    error: function() {
                    }
                }).done(function() {
                });
            });

            //===============
            var ctx1 = document.getElementById('myChart1').getContext('2d');
            var chartData1 = <?= json_encode($chartData1) ?>;
            console.log(chartData1);
            var myChart1 = new Chart(ctx1, {
                type: 'pie',
                data: chartData1,
                options: {
                    plugins: {
                    legend: {
                        position: 'top',
                        display: false,
                    },
                    title: {
                        display: true,
                        text: 'Sản phẩm'
                    },
                    }
                }
            });

            $('#dateFilterForm1').on('submit', function(e) {
                e.preventDefault();

                var startDate = $('#start_date1').val();
                var endDate = $('#end_date1').val();
                var dateType = document.querySelector('input[name="date_type"]:checked').value;

                $.ajax({
                    type: 'GET',
                    url: "<?= $this->Url->build(['controller' => 'Dashboard', 'action' => 'totalProductChart']) ?>",
                    dataType: 'json',
                    cache: false,
                    data: { start_date: startDate, end_date: endDate },
                    success: function(response) {
                        myChart1.data = response.chartData1;
                        myChart1.update();
                        updateChartLegend();
                    },
                    error: function() {
                    }
                }).done(function() {
                });
            });
            updateChartLegend();

            function updateChartLegend() {
                var legendContainer = document.getElementById('chartLegend');
                legendContainer.innerHTML = ''; // Clear existing legend
                console.log();
                
                myChart1.data.labels.forEach(function(value, index) {
                        console.log(index);
                        var color = myChart1.data.datasets[0].backgroundColor[index];
                        var label = value;

                        var legendItem = document.createElement('div');
                        legendItem.style.display = 'flex';
                        legendItem.style.alignItems = 'center';
                        legendItem.style.marginBottom = '4px';

                        var colorBox = document.createElement('div');
                        colorBox.style.width = '20px';
                        colorBox.style.height = '20px';
                        colorBox.style.backgroundColor = color;
                        colorBox.style.marginRight = '10px';

                        var text = document.createElement('span');
                        text.innerText = `${label}: ${value}`;

                        legendItem.appendChild(colorBox);
                        legendItem.appendChild(text);
                        legendContainer.appendChild(legendItem);
                    });
            }
        });
    </script>
</div>
