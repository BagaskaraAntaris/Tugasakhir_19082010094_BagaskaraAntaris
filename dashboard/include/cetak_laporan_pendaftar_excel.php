<?php  
ob_start();
include '../../koneksi/koneksi.php';
require '../../assets/libs/vendor/autoload.php';

	use PhpOffice\PhpSpreadsheet\Spreadsheet;
	use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

	$spreadsheet = new Spreadsheet();
	$sheet = $spreadsheet->getActiveSheet();
	$sheet->setCellValue('A1',	'No');
	$sheet->setCellValue('B1',	'Nama');
	$sheet->setCellValue('C1',	'Email');
	$sheet->setCellValue('D1',	'Usia');
	$sheet->setCellValue('E1',	'Gender');
	$sheet->setCellValue('F1',	'Tanggal Daftar');

	$query	=	"SELECT * FROM pendaftaran a, akun b, detail_pendaftaran c WHERE a.Id = c.id_user AND b.id_user = a.Id";
	$exec 	=	mysqli_query($conn, $query);

	$i = 2;
	$no = 1;
	while($row = mysqli_fetch_array($exec)){
		$sheet->setCellValue('A'.$i, $no++);
		$sheet->setCellValue('B'.$i, $row['nama']);
		$sheet->setCellValue('C'.$i, $row['email']);
		$sheet->setCellValue('D'.$i, $row['usia']);
		$sheet->setCellValue('E'.$i, $row['jenis_kelamin']);
		$sheet->setCellValue('F'.$i, $row['tanggal_daftar']);
		$i++;
	}

	$styleArray = [
		'borders' => [
			'allBorders' => [
				'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
			],
		],
	];
	$i = $i - 1;
	$sheet->getStyle('A1:F'.$i)->applyFromArray($styleArray);

	$file = "hello_world.xlsx";
	$writer = new Xlsx($spreadsheet);
	$writer->save($file);
	 
	header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
	header('Content-Disposition: attachment; filename="'.$file.'"');
	$writer->save("php://output");
?>