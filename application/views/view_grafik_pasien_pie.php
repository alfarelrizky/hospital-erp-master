<!DOCTYPE html>
<html>
<head><!-- panggil library -->
 <script type="text/javascript" src="<?php echo base_url();?>assets/Chart.js"></script>
</head>
<body>
 <h2>Grafik jumlah pasien berdasarkan usia</h2>
 <div style="width: 550px; height: 500px">
 <canvas id="myChart"></canvas>
 </div>
<script>
var dataCanvas = document.getElementById("myChart").getContext('2d');
var Isidata = {
 label: 'jk',
 data: [<?php foreach ($data_pasien as $data) { echo $data->jumlahnya . ", "; } ?> ],
 backgroundColor: ["#99ffcc","#ff9999"],
 borderColor: ["#99ffcc","#ff9999"],
 yAxisID: "y-axis-data1"
};

var datausia = {
labels: [ <?php foreach ($data_pasien as $data) { echo "'" .$data->jenis_kelamin
."',"; } ?> ],
datasets: [Isidata]
};
var chartOptions = {
 scales: {
 xAxes: [{ categoryPercentage: 0.5 }],
 yAxes: [ { id: "y-axis-data1" , ticks: { beginAtZero:true } } ]
 }
};
var barChart = new Chart(dataCanvas, {
 type: 'pie',
 data: datausia,
 options: chartOptions
 });
</script>
</body>
</html>