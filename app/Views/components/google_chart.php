<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<div id="piechart" style="width: 500px; height: 400px;"></div>
<script>
    google.charts.load('current', {
        'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Vulnerability Level', 'Percentage'],
            ['Low', <?php echo $report['Report'][0]['low_per']; ?>],
            ['Medium', <?php echo $report['Report'][0]['medium_per']; ?>],
            ['High', <?php echo $report['Report'][0]['high_per']; ?>],
            ['Critical', <?php echo $report['Report'][0]['critical_per']; ?>]
        ]);
        var options = {
            title: 'Vulnerability Levels',
            pieHole: 0.4
        };
        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        chart.draw(data, options);
    }
</script>