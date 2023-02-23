<div class="infographic">
  <h2 class="infographic-title">Vulnerability Levels</h2>
  <canvas id="myChart"></canvas>
  <ul class="legend">
    <li><span class="legend-icon" style="background-color:#4CAF50;"></span>Low</li>
    <li><span class="legend-icon" style="background-color:#FFC107;"></span>Medium</li>
    <li><span class="legend-icon" style="background-color:#FF9800;"></span>High</li>
    <li><span class="legend-icon" style="background-color:#F44336;"></span>Critical</li>
  </ul>
  <p class="infographic-caption">This chart shows the vulnerability levels for the report.</p>
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
  var ctx = document.getElementById('myChart').getContext('2d');
  var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ['Low', 'Medium', 'High', 'Critical'],
      datasets: [{
        label: 'Vulnerability Levels',
        data: [<?php echo $report['Report'][0]['Low_vuln']; ?>, <?php echo $report['Report'][0]['Medium_vuln']; ?>, <?php echo $report['Report'][0]['High_vuln']; ?>, <?php echo $report['Report'][0]['Critical_vuln']; ?>],
        backgroundColor: ['#4CAF50', '#FFC107', '#FF9800', '#F44336']
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