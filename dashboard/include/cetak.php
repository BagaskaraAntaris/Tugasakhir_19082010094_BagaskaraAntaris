<?php
//mengeksekusi file koneksi1.pdf
	//mengeksekusi library dompdf
	
	require_once("../../assets/libs/dompdf/autoload.inc.php");
	use Dompdf\Dompdf;
	//membuat konstruktor
	$dompdf = new Dompdf();
	//membaca data dari database
	//membuat script HTML
	$html ='<html><hr><center><h1 style = "text-align : center; border: 2px solid black; border-radius: 5px; padding: 10px; width : 100px; margin-left : 300px;" >LULUS</h1></center><br/><br/><hr/><br/>';
	// $html .= '<table border="1" width="100%" style="table-layout: fixed">
	// <tr>
	// 	<th>Kerja Ibu</th>
	// 	<th>Gaji Ibu</th>
	// 	<th>Berkebuthan Khusus</th>
	// </tr>';
	// $html.=
	// "<tr>	
	// <td>".$nama."</td>
	// <td>".$nama."</td>
	// <td>".$nama."</td>
	// </tr>";
	// $html.='<h1 style = "text-align : center; border: 5px solid red; border-radius: 25px; padding: 10px; width : 30px; margin-left : 100px;">sss</h1>';
	$html.="</html>";
	$dompdf->loadHtml($html);
	//setting ukuran dan orientasi kertas
	$dompdf->setPaper('A4','potrait');
	//rendering dari HTML ke PDF
	$dompdf->render();
	//melakukan output ke file PDF
	$dompdf->stream('laporan_siswa.pdf');
?>