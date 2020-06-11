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
var usiaCanvas = document.getElementById("myChart").getContext('2d');
var IsidataUsia = {
 label: 'Usia',
 data: [ <?php foreach ($data_pasien as $data) { echo $data->jumlah . ", "; } ?> ],
 backgroundColor: '#9ED4A9',
 borderColor: '##93C3D2',
 yAxisID: "y-axis-data1"
};

var datausia = {
 labels: [ <?php foreach ($data_pasien as $data) { echo "'" .$data->range_umur ."',"; } ?> ],
 datasets: [IsidataUsia]
};
var chartOptions = {
 scales: {
 xAxes: [{ categoryPercentage: 0.5 }],
 yAxes: [ { id: "y-axis-data1" , ticks: { beginAtZero:true } } ]
 }
};
var barChart = new Chart(usiaCanvas, {
 type: 'bar',
 data: datausia,
 options: chartOptions
});
</script>
</body>
</html>
