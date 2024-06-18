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
<footer id="footer">
    <div class="footer_top">
      <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-4">
          <div class="footer_widget wow fadeInLeftBig">
            <h2>Flickr Images</h2>
            <!-- <img src="brand.jpg" width="250px" alt="Logo"> -->
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4">
          <div class="footer_widget wow fadeInDown">
            <h2>categories</h2>
            <ul class="tag_nav">

            <?php
                $sql5="SELECT * FROM `tblcategory`";
                $query5=mysqli_query($con,$sql5) or die("Query Failed. : Category");
                $run5=mysqli_num_rows($query5);
                if($run5){
                while($result5=mysqli_fetch_assoc($query5)){
                
                ?>
                
                <li ><a href="categorie.php?id=<?=$result5['Cat_ID']?>"><?=$result5['Cat_Name']?></a></li>
                
                <?php
                
                }}?>
            </ul>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4">
          <div class="footer_widget wow fadeInRightBig">
            <h2>Contact</h2>
            
            <div style="margin-bottom: 70px ; margin-top:20px;   " >
              <ul class="social_nav " >
                <li class="facebook" style=""><a href="#"></a></li>
                <li class="twitter"><a href="#"></a></li>
                <li class="flickr"><a href="#"></a></li>
                <li class="pinterest"><a href="#"></a></li>
                <li class="googleplus"><a href="#"></a></li>
                <li class="vimeo"><a href="#"></a></li>
                <li class="youtube"><a href="#"></a></li>
                <li class="mail"><a href="#"></a></li>
              </ul>
          </div>
            <span style="display:felx;">
                <div class="pl-5"><p>775701XXXX</p></div>
            </span>
            <span style="display:felx;">
                
                <div class="pl-5"><p>xyz@gmail.com</p></div>
            </span>
            <span class="d-flex">
                
                <div class="pl-5"><p> wagholi pune</p></div>
            </span>
            
          </div>
        </div>
      </div>
    </div>
    <!-- <div class="footer_bottom">
      <p class="copyright">Copyright &copy; 2045 <a href="index2.php">A News 24 X 7</a></p>
      
    </div> -->
</footer>

</html>
<script src="frontend/assets/js/jquery.min.js"></script> 
<script src="frontend/assets/js/wow.min.js"></script> 
<script src="frontend/assets/js/bootstrap.min.js"></script> 
<script src="frontend/assets/js/slick.min.js"></script> 
<script src="frontend/assets/js/jquery.li-scroller.1.0.js"></script> 
<script src="frontend/assets/js/jquery.newsTicker.min.js"></script> 
<script src="frontend/assets/js/jquery.fancybox.pack.js"></script> 
<script src="frontend/assets/js/custom.js"></script>