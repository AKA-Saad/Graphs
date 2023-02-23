<div class="infographic">
  <canvas id="myChart_1"></canvas>
  <p class="infographic-caption">This chart shows the geolocation of the potential attacks for the report.</p>
</div>

<style>
  .infographic {
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 10px;
    padding: 20px;
    margin-bottom: 30px;
  }

  .infographic-title {
    font-size: 24px;
    font-weight: bold;
    margin-top: 0;
    margin-bottom: 20px;
  }

  .legend {
    list-style: none;
    padding: 0;
    margin: 0;
    display: flex;
    justify-content: center;
    align-items: center;
  }

  .legend li {
    display: flex;
    align-items: center;
    margin-right: 20px;
    font-size: 16px;
  }

  .legend-icon {
    display: inline-block;
    width: 20px;
    height: 20px;
    margin-right: 5px;
    border-radius: 50%;
  }

  .infographic-caption {
    font-size: 16px;
    color: #666;
    margin-top: 20px;
    margin-bottom: 0;
  }
</style>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  var ctx = document.getElementById('myChart_1').getContext('2d');
  var report = <?php echo $locations; ?>;
  var labels = Object.keys(report);
  var data = Object.values(report);
  var myChart_1 = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: labels,
      datasets: [{
        label: 'number of threats',
        data: data,
        backgroundColor: [
          'rgba(255, 99, 132, 0.2)',
          'rgba(54, 162, 235, 0.2)',
          'rgba(255, 206, 86, 0.2)',
          'rgba(75, 192, 192, 0.2)'
        ],
        borderColor: [
          'rgba(255, 99, 132, 1)',
          'rgba(54, 162, 235, 1)',
          'rgba(255, 206, 86, 1)',
          'rgba(75, 192, 192, 1)'
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