<?php 
      include '../auth.php';
      include "../koneksi/koneksi.php";
      $nid = $_SESSION['dosen'];
      $query = mysqli_query($conn,"SELECT * FROM dosen where nid=$nid");
      if ($query) {
        $data = mysqli_fetch_array($query);
      }

                $active1 = "";
                $active2 = "";
                $active3 = "";
                $active4 = "";
                $active5 = "";
                $active6 = "";
                $id_ujian = "";
                $kd_matkul = "";
                $page =  "include/home.php";
                $includeVal = "";
                if (isset($_GET['page'])) {
                    $page = $_GET['page'];
                    switch ($page) {
                    case '1':
                      $includeVal = "include/home.php";
                      $active1 = "active";
                      break;
                    case '2':
                      $includeVal = "include/data_akademik.php";
                      $active2 = "active";
                      break;
                    case '3':
                      $includeVal = "include/profil.php";
                      $active3 = "active";
                      break;
                    case '4':
                      $includeVal = "include/data_hp_email.php";
                      $active4 = "active";
                      break;
                    case '5':
                      $includeVal = "include/matkul.php";
                      $active5 = "active";
                      break;
                    case '6':
                      $includeVal = "include/edit_data_pribadi.php";
                      $active6 = "active";
                      break;
                    case '7':
                      $includeVal = "include/lihat_matkul.php";
                      $kd_matkul = $_GET['kode_matkul'];
                      $active5 = "active";
                      break;
                    case '8':
                      $includeVal = "include/edit_nilai_matkul.php";
                      $id_ujian = $_GET['id_ujian'];
                      $active5 = "active";
                      break;
                    case '9':
                      $includeVal = "include/pertemuan.php";
                      $id_matkul = $_GET['id_matkul'];
                      $active5 = "active";
                      break;
                    case '10':
                      $includeVal = "include/absensi_mhs.php";
                      $id_matkul = $_GET['id_matkul'];
                      $pertemuan = $_GET['pertemuan'];
                      $active5 = "active";
                      break;
                    case '11':
                      $includeVal = "include/ubah_absensi_mhs.php";
                      $id_matkul = $_GET['id_matkul'];
                      $pertemuan = $_GET['pertemuan'];
                      $active5 = "active";
                      break;
                    case '12':
                      $includeVal = "include/tambah_deskripsi.php";
                      $id_matkul = $_GET['id_matkul'];
                      $pertemuan = $_GET['pertemuan'];
                      $active5 = "active";
                      break;
                    case '13':
                      $includeVal = "include/ubah_deskripsi.php";
                      $id_matkul = $_GET['id_matkul'];
                      $pertemuan = $_GET['pertemuan'];
                      $id_absen  = $_GET['id_absen'];
                      $active5 = "active";
                      break;
                    case '14':
                      $includeVal = "include/absensi_dosen.php";
                      $id_matkul = $_GET['id_matkul'];
                      $pertemuan = $_GET['pertemuan'];
                      $active5 = "active";
                      break;
                    case '15':
                      $includeVal = "include/ubah_absensi_dosen.php";
                      $id_matkul = $_GET['id_matkul'];
                      $pertemuan = $_GET['pertemuan'];
                      $active5 = "active";
                      break;
                    case '16':
                      $includeVal = "include/matkul_dosen.php";
                      $active6 = "active";
                      break;
                    case '17':
                      $includeVal = "include/nilai_absensi_dosen.php";
                      $id_matkul = $_GET['id_matkul'];
                      $active6 = "active";
                      break;
                    default:
                      $active = "active";
                      $includeVal = "include/home.php"; 
                      break;
                  }
                }else{
                  $active1 = "active";
                  $includeVal = "include/home.php";
                  
                }

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sistem Informasi Absensi Kampus</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../font/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="../plugins/datatables/jquery.dataTables.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="../plugins/iCheck/flat/blue.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="../plugins/morris/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="../plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="../plugins/datepicker/datepicker3.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker-bs3.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

    <script src="../plugins/jQuery/jQuery-2.1.4.min.js"></script>
  
    <style>
    .alert{
      margin-bottom: 0px;
    }
    .skin-blue .main-header .navbar {
        background-color: #008080;
    }
    .skin-blue .main-header .logo {
        background-color: #008080;
        color: #fff;
        border-bottom: 0 solid transparent;
    }
    .skin-blue .sidebar-menu>li:hover>a, .skin-blue .sidebar-menu>li.active>a {
        color: #fff;
        background: #008080;
        border-left-color: #008080;
    }
    .skin-blue .wrapper, .skin-blue .main-sidebar, .skin-blue .left-side {
        background-color: #008080;
    }
    .skin-blue .sidebar a {
        color: #fff;
    }
    .skin-blue .sidebar-menu>li.header {
        color: #fff;
        background: #008080;
    }
    .skin-blue .sidebar-menu>li>a {
         border-left: 0px solid transparent; 
    }
    .user-panel>.info{
      padding-top: 15px;
    }
    /* table.dataTable tr{ background-color:  #E3F2FD; }
    table.dataTable tr:nth-child(even)  { background-color: #F44336;color: white;}
    table.dataTable tr:nth-child(even)  a{ background-color: #F44336;color: white;}
    table.dataTable tr:nth-child(even)  a:hover{ background-color: #F44336;color: blue;}
    .user-panel>.info{
      padding-top: 15px;
    } */
    </style>
    
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

      <header class="main-header">
        <!-- Logo -->
        <a href="index2.html" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>A</b>LT</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Absensi Kampus </b></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
         
        </nav>
      </header>



      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="<?php  
            if ($data['foto']=='') {
              echo 'images/dp.png';
            }else{
              echo "images/$data[foto]";
            }
          ?>" class="img-circle" alt="$data['nm_dosen']">
            </div>
            <div class="pull-left info">
              <p><?php echo $data['nm_dosen']; ?></p>
              
            </div>
          </div>
         
                 
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MENU</li>
            <li class="<?php echo $active1; ?> treeview">
              <a href="index.php?page=1">
                <i class="fa fa-dashboard"></i> <span>HOME</span></i>
              </a>
            </li>

            <li class="header">BIODATA</li>
            <li class="<?php echo $active2; ?> treeview">
              <a href="index.php?page=2">
                <i class="fa fa-files-o"></i>
                <span>Data Dosen</span>
              </a>
            </li>
            <li class="<?php echo $active3; ?> treeview">
              <a href="index.php?page=3">
                <i class="fa fa-user"></i> <span>Profil</span>
              </a>
            </li>
            <li class="<?php echo $active4; ?> treeview">
              <a href="index.php?page=4">
                <i class="fa fa-phone"></i>
                <span>Data HP dan Email</span>
              </a>
            </li>
            
            <li class="header">AKADEMIK ONLINE</li>

            <li class="<?php echo $active5; ?> treeview">
              <a href="index.php?page=5">
                <i class="fa fa-pencil"></i> <span>Absensi Mahasiswa</span>
              </a>
            </li>
            <li class="<?php echo $active6; ?> treeview">
              <a href="index.php?page=16">
                <i class="fa fa-pencil"></i> <span>Nilai Absensi Dosen</span>
              </a>
            </li>
            <li class="treeview">
              <a href="logout.php">
                <i class="fa fa-lock"></i> <span>Logout</span>
              </a>
            </li>


          </ul>
        </section>     
        <!-- /.sidebar -->
      </aside>


      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">

        

        <!-- Main content -->
        <section class="content">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            
            
          </div><!-- /.row -->

          <!-- Main row -->
          <div class="row">
            <!-- Left col -->
            <section class="col-lg-12 connectedSortable">
              <!-- Custom tabs (Charts with tabs)-->
              
              <?php 
                
                include "$includeVal";
                

              ?>      
    
            </section><!-- /.Left col -->
            <!-- right col (We are only adding the ID to make the widgets sortable)-->
            <section class="col-lg-5 connectedSortable">    

            </section><!-- right col -->
          </div><!-- /.row (main row) -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <footer class="main-footer">
        <strong>Copyright &copy; 2016 <a href="http://apw22.blogspot.com">Anggit Prayogo</a>.</strong> All rights reserved.
      </footer>

 

    <!-- jQuery 2.1.4 -->
    
    <!-- jQuery UI 1.11.4 -->
    <script src="../plugins/jQueryUI/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
     
   <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.5 -->
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script src="../plugins/datatables/jquery.dataTables.js"></script>
    <!-- Morris.js charts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="../plugins/morris/morris.min.js"></script>
    <!-- Sparkline -->
    <script src="../plugins/sparkline/jquery.sparkline.min.js"></script>
    <!-- jvectormap -->
    <script src="../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="../plugins/knob/jquery.knob.js"></script>
    <!-- daterangepicker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
    <script src="../plugins/daterangepicker/daterangepicker.js"></script>
    <!-- datepicker -->
    <script src="../plugins/datepicker/bootstrap-datepicker.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <!-- Slimscroll -->
    <script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="../plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/app.min.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="../dist/js/pages/dashboard.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../dist/js/demo.js"></script>
  </body>
</html>
