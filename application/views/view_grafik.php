<!DOCTYPE html>
<html>
<head><!-- panggil library -->
 <script type="text/javascript" src="<?php echo base_url();?>assets/Chart.js"></script>
</head>
<body>
 <h2>Grafik jumlah peserta berdasarkan kota</h2>
 <!-- canvas untuk menampilkan grafik -->
 <div style="width: 550px; height: 500px">
 <canvas id="myChart"></canvas>
 </div>

 <!-- membuat grafik -->
 <script>
 // memanggil object canvas
 var dataCanvas = document.getElementById("myChart").getContext('2d');
 // inisiasi data
 var isiData = {
 label: 'jumlah peserta', // nama label dari data
 data: [ 120, 180, 167, 90, 87, 102, 210 ], // isi angka datanya
 backgroundColor: '#99bbff', // warna grafik data
 borderColor: '##93C3D2',
 yAxisID: "y-axis-data1" // menampilkan rentang angka datanya
 };
 var dataTampil = {
 // label data
 labels: ["Medan", "Jakarta", "Bandung", "Semarang", "Yogyakarta", "Surabaya", "Makassar"],
 // isi data
 datasets: [isiData]
 };
 var chartOptions = {
 scales: {
 xAxes: [ { categoryPercentage: 0.5 }],
 yAxes: [ { id: "y-axis-data1" , ticks: {beginAtZero:true} } ] // tampilkan axis rentang data
 }
 };
// menampilkan grafik
var barChart = new Chart(dataCanvas, {
 type: 'bar', // tipe grafik
 data: dataTampil,
 options: chartOptions
 });
</script>
</body>
</html>