<?php  

include '../auth.php';
include '../koneksi/koneksi.php';

$role = "";

$id 	= $_SESSION['auth'];


if ($_SESSION['role_user'] == 0) {
	$role = "Admin";
    $query      = "SELECT * FROM akun WHERE id = $id";

    $exec       = mysqli_query($conn, $query);

    if ($exec) {
    
        while ($user = mysqli_fetch_array($exec)) {
            foreach ($user as $key=>$val) {
                ${$key} = $val;
            }       
        }
    }

}else{
	$role = "User";
    $query      = "SELECT a.*,b.* FROM pendaftaran a, akun b WHERE a.id = $id AND b.id_user=$id";

    $exec       = mysqli_query($conn, $query);


    if ($exec) {
        while ($user = mysqli_fetch_array($exec)) {
            foreach ($user as $key=>$val) {
                ${$key} = $val;
            }       
        }
    }
}




$getPage = $_GET['page'];

switch ($getPage) {
	case 1:
		$page 				= "include/home.php";
		$_SESSION['active']	= "1";
		break;
	case 2:
		$page 				= "include/profile.php";
		$_SESSION['active']	= "2";
		break;
	case 4:
		$page 				= "include/syarat_pendaftaran.php";
		$_SESSION['active'] = "3";
		break;
	case 5:
		$page 				= "include/upload_akte.php";
		$_SESSION['active'] = "3";
		break;
	case 6:
		$page 				= "include/upload_foto2r.php";
		$_SESSION['active'] = "3";
		break;
	case 7:
		$page 				= "include/konfirmasi_pendaftaran.php";
		$_SESSION['active']	= "4";
		break;
    case 8:
        $page               = "include/detail_pendaftaran.php";
        $ida                = $_GET['ida'];
        $idd                = $_GET['idd'];
        $_SESSION['active'] = "4";
        break;
    case 9:
        $page               = "include/laporan.php";
        $_SESSION['active'] = "9";
        break;
    case 10:
        $page               = "include/grafik_tahun.php";
        $_SESSION['active'] = "10";        
        break;
    case 11:
        $page               = "include/cetak.php";
        $_SESSION['active'] = "3";
        break;
	default:
		$page 	= "include/home.php";
		$_SESSION['active']	= "1";
		break;
}

?>

<!doctype html>
<html lang="en">
	
<head>
    
    <title>Dashboard <?php echo $role; ?></title>
	

    <?php  
    	include "include/libs.php";
    ?>
</head>
<style type="text/css">
    .logo{
        background: #303641;
    }
    .nav p{
        color: white;
    }
</style>
<body>
    <div class="wrapper">
        <div class="sidebar" data-color="purple" data-image="../assets/img/sidebar-1.jpg">
            <!--
                Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

                Tip 2: you can also add an image using data-image tag
            -->
            <div class="logo">
                <a href="http://www.anggitprayogo.com" class="simple-text">
                    Selamat datang <?php $role == "Admin" ? print($nama_admin) : print($nama_panggilan); ?>
                </a>
            </div>
            <div class="sidebar-wrapper">
                <ul class="nav">
                    <li class="<?php $_SESSION['active'] == 1 ? print("active") : print("") ?>">
                        <a href="index.php?page=1">
                            <i class="material-icons">dashboard</i>
                            <p>Dashboard</p>
                        </a>
                    </li>
					
					<?php  
					if ($role == "User") {
					?>
					<li class="<?php $_SESSION['active'] == 2 ? print("active") : print("") ?>">
                        <a href="index.php?page=2">
                            <i class="material-icons">person</i>
                            <p>Profile </p>
                        </a>
                    </li>
					<?php
					}
					?>
                    <?php  
					if ($role == "Admin") {
					?>
					<li class="<?php $_SESSION['active'] == 4 ? print("active") : print("") ?>">
                        <a href="index.php?page=7">
                            <i class="material-icons">content_paste</i>
                            <p>Konfirmasi Pendaftaran </p>
                        </a>
                    </li>
                    <li class="<?php $_SESSION['active'] == 9 ? print("active") : print("") ?>">
                        <a href="index.php?page=9">
                            <i class="material-icons">subject</i>
                            <p>Laporan</p>
                        </a>
                    </li>
                    <li class="<?php $_SESSION['active'] == 10 ? print("active") : print("") ?>">
                        <a href="index.php?page=10">
                            <i class="material-icons">G</i>
                            <p>Grafik</p>
                        </a>
                    </li>
					<?php
					}
					?>
                    <?php  
                    if ($role == "User") {
                    ?>
                    <li class="<?php $_SESSION['active'] == 3 ? print("active") : print("") ?>">
                        <a href="index.php?page=4">
                            <i class="material-icons">content_paste</i>
                            <p>Syarat Pendaftaran</p>
                        </a>
                    </li>
                    
                    <?php
                    }
                    ?>
                    <li>
                        <a href="../logout.php">
                            <i class="material-icons text-gray">notifications</i>
                            <p>Logout</p>
                        </a>
                    </li>
                   
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <div class="content">
                <div class="container-fluid">
                   
                   <?php  

                   include $page;

                   ?>
                        
                </div>
            </div>
        </div>
    </div>
</body>

<!--   Core JS Files   -->
<script src="../assets/js/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="../assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="../assets/js/material.min.js" type="text/javascript"></script>
<!--  Charts Plugin -->
<script src="../assets/js/chartist.min.js"></script>
<!--  Dynamic Elements plugin -->
<script src="../assets/js/arrive.min.js"></script>
<!--  PerfectScrollbar Library -->
<script src="../assets/js/perfect-scrollbar.jquery.min.js"></script>
<!--  Notifications Plugin    -->
<script src="../assets/js/bootstrap-notify.js"></script>
<!--  Google Maps Plugin    -->
<!-- <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script> -->
<!-- Material Dashboard javascript methods -->
<script src="../assets/js/material-dashboard.js?v=1.2.0"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="../assets/js/demo.js"></script>

<script>
    $(document).ready(function(){
        $("#cetak").click(function(){
            window.print();
        });
    });
</script>

</html>