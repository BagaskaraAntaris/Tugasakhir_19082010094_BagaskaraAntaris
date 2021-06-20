<!DOCTYPE html>
<html>
<?php 
	include '../../koneksi/koneksi.php';
	$userid = $_GET['u'];
	$cekdulu = mysqli_query($conn,"SELECT * FROM pendaftaran WHERE id='$userid'");
    $ambil = mysqli_fetch_array($cekdulu);
?>
<head>
	<title></title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>
<style type="text/css">
	body{
			background-image: url('../../assets/img/back.jpg');
			background-repeat: no-repeat;
			width: 100%;
			height: 100%;
			background-size: 100%;
		}
	img{
		width: 200px;
		height: 150px;
	}
	p{
		font-size: 20px;
	}
	.awal{
		margin: 120px;
	}
	.jorok{
		margin-left: 70px;
	}
	.awal h1{
		color: white;
	}
	.jorok p{
		color: white;
	}
	.foto{
		float: right;
		color: white;
		margin-right:  100px;
	}
	a{
		text-decoration-line: none;
		color: white;
	}
</style>
<body>
	<!-- <table border="1">
		<tr>
			<td>Nama</td>
			<td>Gambar</td>
		</tr>
		<?php  
			// $query = mysqli_query($conn, "SELECT * FROM pendaftaran");
			// while ($row = mysqli_fetch_array($query)) {
		?>
		<tr>
			<td><?php //echo $row['nama']; ?></td>	
			<td><?php //echo $row['foto_anak']; ?></td>	
		</tr>
		<?php //} ?>
	</table> -->
	<div class="awal">
		<h1><?php echo $ambil['nama']; ?></h1>
		<div class="foto">
				<p>Akte : <img src="../../assets/uploads/<?php echo $ambil['upload_akte'] ?>"> </p>
				<p>Kartu Keluarga :  <img src="../../assets/uploads/<?php echo $ambil['upload_kartu_keluarga'] ?>"> </p>
				<p>Foto Siswa :  <img src="../../assets/uploads/<?php echo $ambil['foto_anak'] ?>"> </p>	
				<button class="btn btn-primary"><a href="../index.php?page=7">Kembali</a></button>
			</div>
		<div class="jorok">		
			<p>Nama Panggilan : <?php  echo $ambil['nama_panggilan'];?></p>
			<p>Tempat Lahir	  : <?php  echo $ambil['tempat_lahir'];?> </p>
			<p>Tanggal Lahir  : <?php  echo $ambil['tanggal_lahir'];?> </p>
			<p>Jenis Kelamin  : <?php  echo $ambil['jenis_kelamin'];?> </p>
			<p>Anak Ke 		  : <?php  echo $ambil['anak_ke'];?> </p>
			<p>Jumlah Saudara : <?php  echo $ambil['jumlah_saudara'];?> </p>
			<p>Nama Ayah  	  : <?php  echo $ambil['nama_ayah'];?> </p>
			<p>Pekerjaan Ayah : <?php  echo $ambil['pekerjaan_ayah'];?> </p>
			<p>Pendidikan Terakhir Ayah : <?php  echo $ambil['pendidikan_terakhir_ayah'];?></p>
			<p>Agama Ayah	  : <?php  echo $ambil['agama_ayah'];?></p>
			<p>Nama Ibu 	  : <?php  echo $ambil['nama_ibu'];?> </p>
			<p>Pekerjaan ibu  : <?php  echo $ambil['pekerjaan_ibu'];?></p>
			<p>Pendidikan Terakhir Ibu : <?php  echo $ambil['pendidikan_terakhir_ibu'];?> </p>
			<p>Agama Ibu	  : <?php  echo $ambil['agama_ibu'];?> </p>
			<p>No Telp 		  : <?php  echo $ambil['telp'];?> </p>
		</div>
	</div>
</body>

</html>