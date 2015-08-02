<?php
require_once 'connection/db.php';
echo $_SESSION['user_session'];
try {
    //$conn = new PDO("mysql:host=$DB_host;dbname=$DB_name", $DB_user, $DB_pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));

    $sql = 'SELECT * FROM resortdata where userId =1 ';
    $q = $user->query($sql);
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
                        ข้อมูลรีสอร์ท
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
                        <div class="box-body">
                            <table id="example2" class="table table-bordered table-hover" width="50%">
                                <thead>
                                    <tr>
                                        <th>หัวข้อ</th>
                                        <th>รายละเอียด</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($r = $q->fetch()): ?>
                                        <tr>
                                            <td>ชื่อรีสอร์ท ภาษาไทย</td>
                                            <td><?php echo htmlspecialchars($r['nameTH']); ?></td>
                                        </tr>
                                        <tr>
                                            <td>ที่อยู่</td>
                                            <td><?php echo htmlspecialchars($r['addressTH']); ?></td>
                                        </tr>
                                        <tr>
                                            <td>เบอร์โทรศัพท์</td>
                                            <td><?php echo htmlspecialchars($r['telResort']); ?></td>
                                        </tr>
                                        <tr>
                                            <td>เบอร์มือถือ</td>
                                            <td><?php echo htmlspecialchars($r['telMobile']); ?></td>
                                        </tr>
                                        <tr>
                                            <td>บริเวณที่ตั้ง</td>
                                            <td><?php echo htmlspecialchars($r['location']); ?></td>
                                        </tr>
                                        <tr>
                                            <td>จำนวนห้อง</td>
                                            <td><?php echo htmlspecialchars($r['totalRoom']); ?></td>
                                        </tr>
                                        <tr>
                                            <td>ข้อมูลรีสอร์ท</td>
                                            <td><?php echo htmlspecialchars($r['information']); ?></td>
                                        </tr>
                                        <tr>
                                            <td>นโยบาย</td>
                                            <td><?php echo htmlspecialchars($r['vision']); ?></td>
                                        </tr>
                                        <tr>
                                            <td>ที่จอกรถ</td>
                                            <td><?php if($r['paking'] == 0){ echo "ไม่มี";} else { echo "มี";} ?></td>
                                        </tr>
                                        <tr>
                                            <td>พนักงานบริการ</td>
                                            <td><?php if($r['roomService'] == 0){ echo "ไม่มี";} else { echo "มี";} ?> </td>                                               
                                        </tr>
                                        <tr>
                                            <td>บาร์</td>
                                            <td><?php if($r['bar'] == 0){ echo "ไม่มี";} else { echo "มี";} ?></td>
                                        </tr>
                                        <tr>
                                            <td>จักรยาน</td>
                                            <td><?php if($r['bicycle'] == 0){ echo "ไม่มี";} else { echo "มี";} ?></td>
                                        </tr>
                                        <tr>
                                            <td>บริการซักรีด</td>
                                            <td><?php if($r['laundry'] == 0){ echo "ไม่มี";} else { echo "มี";} ?></td>
                                        </tr>
                                        <tr>
                                            <td>สระว่ายน้ำ</td>
                                            <td><?php if($r['pool'] == 0){ echo "ไม่มี";} else { echo "มี";} ?></td>
                                        </tr>
                                        <tr>
                                            <td>ห้องอาหาร</td>
                                            <td><?php if($r['restaurant'] == 0){ echo "ไม่มี";} else { echo "มี";} ?></td>
                                        </tr>
                                        <tr>
                                            <td>ร้านสะดวกซื้อ</td>
                                            <td><?php if($r['shop'] == 0){ echo "ไม่มี";} else { echo "มี";} ?></td>
                                        </tr>
                                                                                <tr>
                                            <td>จุดสูบบุหรี่</td>
                                            <td><?php if($r['smokingArea'] == 0){ echo "ไม่มี";} else { echo "มี";} ?></td>
                                        </tr>
                                                                                <tr>
                                            <td>สปา</td>
                                            <td><?php if($r['spa'] == 0){ echo "ไม่มี";} else { echo "มี";} ?></td>
                                        </tr>
                                                                                <tr>
                                            <td>ห้องฟิตเนต</td>
                                            <td><?php if($r['fitness'] == 0){ echo "ไม่มี";} else { echo "มี";} ?></td>
                                    <?php endwhile; ?>
                                </tbody>
                            </table>
                            <p>
                            <div class="voffset5"><a href="#" class="btn btn-primary">แก้ไข</a></div>
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
