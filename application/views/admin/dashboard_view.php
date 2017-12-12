<!--main content start-->
<div class="content-wrapper" style="min-height: 916px;">
    <script src="<?php echo site_url('assets/admin/'); ?>Chart.js-2.7.1/Chart.js"></script>
    <script src="<?php echo site_url('assets/admin/'); ?>Chart.js-2.7.1/Chart.min.js"></script>

    <section class="content row">
        <div>
            <canvas id="surveyChart" width="200" height="30"></canvas>
        </div>
    </section>
</div>
<script>
    var surveyChartLabel = ['Con được học và chơi gì?', '"Khi đến tường cô giáo như mẹ hiền"', 'Con được ăn gì? Uống gì? Ngủ ngon không?', 'Tất cả các ý kiến trên'];
    var surveyChartData = [<?php echo '"'.implode('","',  $count ).'"' ?>];
    var ctx = document.getElementById("surveyChart").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'horizontalBar',
        data: {
            labels: surveyChartLabel,
            datasets: [{
                label: 'Bạn quan tâm nhất điều gì khi con tới trường?',
                data: surveyChartData,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)'
                ],
                borderColor: [
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
//            legend: {
//                display: false
//            },
            scales: {
                xAxes: [{
                    ticks: {
                        beginAtZero:true
                    }
                }],
                yAxes: [{
                    barThickness: 20,
                    stacked: true
                }]
            }
        }
    });
</script>

