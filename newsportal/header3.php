<?php
include "config.php";?>
<!DOCTYPE html>
<html>
<head>
<title>NewsFeed</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="frontend/assets/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="frontend/assets/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="frontend/assets/css/animate.css">
<link rel="stylesheet" type="text/css" href="frontend/assets/css/font.css">
<link rel="stylesheet" type="text/css" href="frontend/assets/css/li-scroller.css">
<link rel="stylesheet" type="text/css" href="frontend/assets/css/slick.css">
<link rel="stylesheet" type="text/css" href="frontend/assets/css/jquery.fancybox.css">
<link rel="stylesheet" type="text/css" href="frontend/assets/css/theme.css">
<link rel="stylesheet" type="text/css" href="frontend/assets/css/style.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />

<!--[if lt IE 9]>
<script src="assets/js/html5shiv.min.js"></script>
<script src="assets/js/respond.min.js"></script>
<![endif]-->
</head>

<header id="header">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="header_top">
          <div class="header_top_left">
            <ul class="top_nav">
              <li><a href="index2.php">Home</a></li>
              <li><a href="admin/aboutus.php">About</a></li>
              <li><a href="pages/contact.html">Contact</a></li>
            </ul>
          </div>
          <div class="header_top_right">
            <p><?php echo $today= date("F  j  Y");?></p>
          </div>
        </div>
      </div>
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="header_bottom">
          <div class="logo_area"><a href="index.php" class="logo"><img src="brand.jpg" alt=""></a></div>
          <div class="add_banner"><a href="#"><img src="images/addbanner_728x90_V1.jpg" alt=""></a></div>
        </div>
      </div>
    </div>
  </header>
  <section id="navArea">
    <nav class="navbar navbar-inverse" role="navigation">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
      <?php
      if(isset($_GET['id'])){ 
        $id=$_GET['id'];
      }else{
        $id="";
      }
      $sql1="SELECT * FROM  `tblcategory` LIMIT 6";
      $query1=mysqli_query($con,$sql1) or die("Query Failed. : Category");
      $run1=mysqli_num_rows($query1);
      
      if($run1){
       ?>
      <ul class="nav navbar-nav main_nav">
        <!-- <home button> -->
                <li class="active"><a href="index2.php"><span class="fa fa-home desktop-home"></span><span class="mobile-show"></span></a></li>
                <!-- if(empty( $SubCat)){?> -->
            
       <?php
        while($row1=mysqli_fetch_assoc($query1)){
          if($row1['Cat_ID'] ==$id){
            $active="active";

          }else{
            $active="";
          }
          // $sub=$row1['Sub_CatID'];
           ?>

            <li  >
              <a href="categorie.php?id=<?= $row1['Cat_ID']?>" class='<?php echo $active ?>'><?=$row1['Cat_Name']?></a>
            </li>

        <?php }?>
            
        </ul>
       <?php
     }
?>
        

      </div>
    </nav>
  </section>
  <section id="newsSection">
    <div class="row">
      <div class="col-lg-12 col-md-12">
        <div class="latest_newsarea"> <span>Latest News</span>
          <ul id="ticker01" class="news_sticker">
          <?php
            
            $limit=5;
            $sql="SELECT * FROM `tblposts`LEFT JOIN `tblcategory` ON `tblposts`.`Category`=`tblcategory`.`Cat_ID`ORDER BY `tblposts`.`Post_ID` DESC LIMIT {$limit}" ;
            $query=mysqli_query($con,$sql);
            
             if($query){
                while($result=mysqli_fetch_assoc($query)){
                  ?>
                   <li><a href="dfp.php?id=<?=$result['Post_ID']?>">
                   <?php $img=$result['Post_Image']?>
                    <img src="/newsportal/admin/postimages/<?= $img?>" alt=""><?=$result['Post_Title']?></a></li>
                 <?php
                }
              }
              ?>
          </ul>
          <div class="social_area">
            <ul class="social_nav">
              <li class="facebook"><a href="#"></a></li>
              <li class="twitter"><a href="#"></a></li>
              <li class="flickr"><a href="#"></a></li>
              <li class="pinterest"><a href="#"></a></li>
              <li class="googleplus"><a href="#"></a></li>
              <li class="vimeo"><a href="#"></a></li>
              <li class="youtube"><a href="#"></a></li>
              <li class="mail"><a href="#"></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
  </html>
