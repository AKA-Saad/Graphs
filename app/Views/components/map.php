<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <script src="https://d3js.org/d3.v6.min.js"></script>
</head>

<body>
    <div id="chart"></div>
    <script>
        // D3.js code to create the bubble chart
    </script>
</body>

</html>

<script>
    var data = <?php echo json_encode($report['Report']); ?>;
    var svg = d3.select("#chart")
        .append("svg")
        .attr("width", 300)
        .attr("height", 200);

    var color = d3.scaleOrdinal(d3.schemeCategory10);

    var bubble = d3.pack()
        .size([300, 200])
        .padding(1.5);

    var nodes = d3.hierarchy({
            children: data
        })
        .sum(function(d) {
            return d.Threatent;
        });

    var node = svg.selectAll(".node")
        .data(bubble(nodes).descendants())
        .enter()
        .filter(function(d) {
            return !d.children
        })
        .append("g")
        .attr("class", "node")
        .attr("transform", function(d) {
            return "translate(" + d.x + "," + d.y + ")";
        });

    node.append("circle")
        .attr("r", function(d) {
            return d.r;
        })
        .style("fill", function(d, i) {
            return color(i);
        });

    node.append("text")
        .attr("dy", ".3em")
        .style("text-anchor", "middle")
        .text(function(d) {
            return d.data.client_name + " (" + d.data.Threatent + ")";
        });
</script>