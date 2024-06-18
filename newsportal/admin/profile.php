<?php
    session_start();
    include('includes/config.php');
    error_reporting(0);
    if(strlen($_SESSION['login'])==0)
    { 
    header('location:index.php');
    }
    else{
    // if($_GET['action']=='del' && $_GET['rid'])
    // {
    //     $id=intval($_GET['rid']);
    //     $query=mysqli_query($con,"UPDATE tblcategory SET Is_Active='0' WHERE Cat_ID='$id'");
    //     $msg="Category deleted ";
    // }
    // // Code for restore
    // if($_GET['resid'])
    // {
    //     $id=intval($_GET['resid']);
    //     $query=mysqli_query($con,"UPDATE tblcategory SET Is_Active='1' WHERE  Cat_ID='$id'");
    //     $msg="Category restored successfully";
    // }

    // // Code for Forever deletionparmdel
    // if($_GET['action']=='parmdel' && $_GET['rid'])
    // {
    //     $id=intval($_GET['rid']);
    //     $query=mysqli_query($con,"DELETE FROM  tblcategory  WHERE Cat_ID='$id'");
    //     $delmsg="Category deleted forever";
    // }

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <title> | Profile</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/menu.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="../plugins/switchery/switchery.min.css">
    <script src="assets/js/modernizr.min.js"></script>

</head>
<style>
    .row{
     margin-top:130px;
    }
    </style>

<body class="fixed-left">

    <!-- Begin page -->
    <div id="wrapper">

        <!-- Top Bar Start -->
        <?php include('includes/topheader.php');?>

        <!-- ========== Left Sidebar Start ========== -->
        <?php include('includes/leftsidebar.php');?>
        <!-- Left Sidebar End -->


      
        
                <div class="container  ">
                    <div class="row ">
                        <div class="col-md-4 d-block">
                            <div class="col-12"></div>
                            <div class="col-12"></div>
                        </div>
                        <div class="col-md-7 ml-5">
                        <form  action="" method="post">
                                            <div class="form-group">
                                                <label class="col-md-2 control-label">Username</label>
                                                <div class="col-md-10">
                                                    <input type="text" class="form-control"
                                                        value=""
                                                        name="username" readonly>
                                                </div><br><br><br>
                                                <label class="col-md-2 control-label">Email</label>
                                                <div class="col-md-10">
                                                    <input type="text" class="form-control"
                                                        value=""
                                                        name="username" readonly>
                                                </div><br><br><br>
                                                <label class="col-md-2 control-label">Email</label>
                                                <div class="col-md-10">
                                                    <input type="text" class="form-control"
                                                        value=""
                                                        name="username" readonly>
                                                </div><br><br><br>
                                                <label class="col-md-2 control-label">Email</label>
                                                <div class="col-md-10">
                                                    <input type="text" class="form-control"
                                                        value=""
                                                        name="username" readonly>
                                                </div><br><br><br>
                                            </div>
                        </div>
                    </div>
               
       </div>
        <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/detect.js"></script>
        <script src="assets/js/fastclick.js"></script>
        <script src="assets/js/jquery.blockUI.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>
        <script src="../plugins/switchery/switchery.min.js"></script>

        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>

</body>

</html>
<?php } ?>