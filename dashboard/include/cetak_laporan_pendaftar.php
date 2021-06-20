<?php  
// ob_start();
// include '../../assets/libs/fpdf/fpdf.php';
// include '../../koneksi/koneksi.php';
// include '../../assets/libs/fpdf/mc_table/mc_table.php';

// $id_maintenance = $_GET['id_mnt'];


// // Instanciation of inherited class
// $pdf = new PDF_MC_Table();
// $pdf->AliasNbPages();
// $pdf->AddPage();



// $pdf->Ln(15);
// $pdf->Cell(40,10,'',0,0,'L');
// $pdf->SetFont('TIMES','B',12);
// $pdf->Cell(100,10,'List Pendaftaran',1,1,'C');
// $pdf->Ln();
// $pdf->SetFont('TIMES','',10);
// $pdf->Cell(10,10,'No.',1,0,'C');
// $pdf->Cell(40,10,'Nama',1,0,'C');
// $pdf->Cell(50,10,'Email',1,0,'C');
// $pdf->Cell(20,10,'Usia',1,0,'C');
// $pdf->Cell(20,10,'Gender',1,0,'C');
// $pdf->Cell(20,10,'Tanggal Daftar',1,1,'C');

// $query	=	"SELECT * FROM pendaftaran a, akun b, detail_pendaftaran c WHERE a.Id = c.id_user AND b.id_user = a.Id";
// $exec 	=	mysqli_query($conn, $query);

// $no = 0;

// $pdf->SetWidths(array(10,40,50,20,20,20,30));

// while ($rows = mysqli_fetch_array($exec)) {
//   $pdf->Row(array(++$no,$rows['nama'],$rows['email'],$rows['usia'],$rows['jenis_kelamin'],$rows['tanggal_daftar']));
// }


// $pdf->Output();
	include '../../assets/libs/dompdf/autoload.inc.php';
	include '../../koneksi/koneksi.php';
	use Dompdf\Dompdf;
	//membuat konstruktor
	$dompdf = new Dompdf();
	//membaca data dari database
	$query = mysqli_query($conn,"SELECT * FROM pendaftaran a, akun b, detail_pendaftaran c WHERE a.Id = c.id_user AND b.id_user = a.Id");
	//membuat script HTML
	$html ='<html><hr> <img style="width : 100px; height : auto; margin-top: 50px;" src="../../assets/img/sekolah.png"> <center><h3>Laporan Pendaftar</h3><br/><br/><hr/><br/><p>SMP 2 TAMAN</p></center>';
	$html .= '<table border="1" width="110%" style="table-layout: fixed; margin-right: 50px;">
		<tr>
			<th>No</th>
			<th>Nama</th>
			<th>Email</th>
			<th>Usia</th>
			<th>Gender</th>
			<th>Tanggal Daftar</th>
		</tr>';
	$no = 1;
	while($row = mysqli_fetch_array($query))
	{
		$html.="<tr>	
		<td>".$no."</td>																									
		<td>". $row['nama']."</td>
		<td>". $row['email']."</td>
		<td>". $row['usia']."</td>
		<td>". $row['jenis_kelamin']."</td>
		<td>". $row['tanggal_daftar']."</td>
		</tr>";
	}

	$html.="</html>";
	$dompdf->loadHtml($html);
	//setting ukuran dan orientasi kertas
	$dompdf->setPaper('A3','potrait');
	//rendering dari HTML ke PDF
	$dompdf->render();
	//melakukan output ke file PDF
	$dompdf->stream('jancok.pdf');

?>