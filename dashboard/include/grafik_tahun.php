<?php
include '../../koneksi/koneksi.php';

$label = ["2017","2018","2019","2020","2021","2022","2023","2024","2025","2026"];

for($bulan = 2017;$bulan < 2026;$bulan++)
{
	$query = mysqli_query($conn,"select count(id_user) as id_user from detail_pendaftaran where YEAR(tanggal_daftar)='$bulan'");
	$row = $query->fetch_array();
	$jumlah_produk[] = $row['id_user'];
}
?>
<!DOCTYPE html>
<html>
<head>
	<script type="text/javascript" src="../../assets/js/Chart.js"></script>
</head>
<body>
	<div style="margin-top: 250px; margin-left: 350px;">
		<p style="color: white; font-size: 25px; font-weight: 900;">Grafik Data Pendaftar Per Tahun</p>
	</div> 
	<div style="width: 800px;height: auto; margin-top: 10px; background-color: white; margin-left: 120px;">
		<canvas id="myChart"></canvas>
	</div>


	<script>
		var ctx = document.getElementById("myChart").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: <?php echo json_encode($label); ?>,
				datasets: [{
					label: 'Jumlah Pendaftar',
					data: <?php echo json_encode($jumlah_produk); ?>,
					backgroundColor: [
				      'rgba(255, 99, 132, 0.2)',
				      'rgba(255, 99, 132, 0.2)',
				      'rgba(255, 99, 132, 0.2)',
				      'rgba(255, 99, 132, 0.2)',
				      'rgba(255, 99, 132, 0.2)',
				      'rgba(255, 99, 132, 0.2)',
				      'rgba(255, 99, 132, 0.2)'
				    ],
				    borderColor: [
				      'rgb(255, 99, 132)',
				      'rgb(255, 99, 132)',
				      'rgb(255, 99, 132)',
				      'rgb(255, 99, 132)',
				      'rgb(255, 99, 132)',
				      'rgb(255, 99, 132)',
				      'rgb(255, 99, 132)'
				    ],
					borderWidth: 1

				}]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				}
			}
		});
	</script>
</body>
</html>