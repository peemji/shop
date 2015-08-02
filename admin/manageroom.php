<?php
require_once 'connection/db.php';
try {
    $conn = new PDO("mysql:host=$host;dbname=$db", $user, $pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));

    $sql = 'SELECT * FROM room as a inner join roomtype as b on a.typeID = b.typeID'
            . ' where a.resortID =1 ';
    $q = $conn->query($sql);
    $q->setFetchMode(PDO::FETCH_ASSOC);
} catch (PDOException $pe) {
    die("Could not connect to the database $dbname :" . $pe->getMessage());
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>AdminLTE 2 | Dashboard</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.4 -->
        <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- FontAwesome 4.3.0 -->
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons 2.0.0 -->
        <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="../dist/css/AdminLTE.css" rel="stylesheet" type="text/css" />
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link href="../dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
        <!-- iCheck -->
        <link href="../plugins/iCheck/flat/blue.css" rel="stylesheet" type="text/css" />
        <!-- DATA TABLES -->
        <link href="../plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        
        <style type="text/css">
.voffset5 {
	margin-top: 5px;
}
</style>
    </head>
    <body class="skin-blue sidebar-mini">
        <div class="wrapper">
            <!-- Left side column. contains the logo and sidebar -->
            <?php
            include("/view/header.php");
            include("/view/sidebar.php");
            ?>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        ห้องพัก
                        <small>รายละเอียด</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">

                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">ประเภทห้องพัก</h3>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <table id="example2" class="table table-bordered table-hover" width="50%">
                                <thead>
                                    <tr>
                                        <th>ลำดับ</th>
                                        <th>ชื่อห้องพัก</th>
                                        <th>ประเภทห้องพัก</th>
                                        <th>จำนวนห้อง</th>
                                        <th>เปิดใช้</th>
                                        <th>ราคาเต็ม</th>
                                        <th>ส่วนลด</th>
                                        <th>จัดการ</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($r = $q->fetch()): ?>
                                        <tr>
                                            <?php
                                            $id = 0;
                                            $id++;
                                            ?>
                                            <td><?php echo $id; ?></td>
                                            <td><?php echo htmlspecialchars($r['roomName']); ?></td>
                                            <td><?php echo htmlspecialchars($r['typeName']); ?></td>
                                            <td><?php echo htmlspecialchars($r['roomTotal']); ?></td>
                                            <td><?php echo htmlspecialchars($r['roomUse']); ?></td>
                                            <td><?php echo htmlspecialchars($r['roomPrice']); ?></td>
                                            <td><?php echo htmlspecialchars($r['roomDiscount'])."%"; ?></td>
                                            <td>แก้ไข</td>
                                        </tr>                                        
                                    <?php endwhile; ?>
                                </tbody>
                            </table>
                            <p>
                            <div class="voffset5"><a href="#" class="btn btn-primary">เพิ่มประเภทห้องพัก</a></div>
                            </p>
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->


                </section><!-- /.content -->
            </div><!-- /.content-wrapper -->
            <?php
            include("view/footer.php");
            ?>



            <!-- jQuery 2.1.4 -->
            <script src="../plugins/jQuery/jQuery-2.1.4.min.js"></script>
            <!-- jQuery UI 1.11.4 -->
            <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js" type="text/javascript"></script>
            <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
            <script type="text/javascript">
                $.widget.bridge('uibutton', $.ui.button);
            </script>
            <!-- Bootstrap 3.3.2 JS -->
            <script src="../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
            <!-- Slimscroll -->
            <script src="../plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
            <!-- FastClick -->
            <script src="../plugins/fastclick/fastclick.min.js" type="text/javascript"></script>
            <!-- AdminLTE App -->
            <script src="../dist/js/app.min.js" type="text/javascript"></script>
            <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
            <script src="../dist/js/pages/dashboard.js" type="text/javascript"></script>
            <!-- AdminLTE for demo purposes -->
            <script src="../dist/js/demo.js" type="text/javascript"></script>
            <!-- DATA TABES SCRIPT -->
            <script src="../plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
            <script src="../plugins/datatables/dataTables.bootstrap.min.js" type="text/javascript"></script>
            <!-- page script -->
            <script type="text/javascript">
                $(function () {
                    $("#example1").DataTable();
                    $('#example2').DataTable({
                        "paging": true,
                        "lengthChange": false,
                        "searching": false,
                        "ordering": true,
                        "info": true,
                        "autoWidth": false
                    });
                });
            </script>
    </body>
</html>
