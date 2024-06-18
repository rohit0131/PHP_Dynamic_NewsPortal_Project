<?php
      include "config.php";?>
<!DOCTYPE html>
<html>

<head>
  <title>Category</title>
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

<body>
  <div id="preloader">
    <div id="status">&nbsp;</div>
  </div>
  <a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
  <div class="container">
    <?php include "header3.php";?>

    <section id="sliderSection">
      <div class="row">

        <div class="col-lg-8 col-md-8 col-sm-8">


          <div class="single_post_content">
            <?php
            if($_GET['id']){
              $id = $_GET['id'];
            }
                  
                  $sql8="SELECT * FROM `tblcategory` WHERE `Cat_ID`='{$id}' ";
                  $query8=mysqli_query($con,$sql8); 
                  $result8=mysqli_fetch_assoc($query8);
              ?>
            <h2><span>
                <?=$result8['Cat_Name']?>
              </span></h2>

            <div class="single_post_content_left">
              <ul class="spost_nav">
                <?php 
                $id = $_GET['id'];
                  $sql8="SELECT *  FROM `tblposts`LEFT JOIN `tblcategory` ON `tblposts`.`Category`=`tblcategory`.`Cat_ID` WHERE `Cat_ID`='{$id}' ORDER BY `tblposts`.`Post_ID`DESC ";
                  $query8=mysqli_query($con,$sql8);
                  $row8=mysqli_num_rows($query8);
                if($row8){
                    while($result8=mysqli_fetch_assoc($query8)){
                    ?>
                <li>
                  <?php $img=$result8['Post_Image']?>
                  <div class="media wow fadeInDown"> <a href="dfp.php?id=<?=$result8['Post_ID']?>" class="media-left">
                      <img alt="" src="/newsportal/admin/postimages/<?= $img?>"> </a>
                    <div class="media-body"> <a href="dfp.php?id=<?=$result8['Post_ID']?>" class="catg_title">
                        <?=$result8['Post_Title']?>
                      </a> </div>
                  </div>
                </li>
                <?php }} ?>

              </ul>
            </div>

            <div class="single_post_content_right">
              <ul class="business_catgnav">

                <?php
              $id = $_GET['id'];
              $sql8="SELECT *  FROM `tblposts`LEFT JOIN `tblcategory` ON `tblposts`.`Category`=`tblcategory`.`Cat_ID` WHERE `Cat_ID`='{$id}' ORDER BY `tblposts`.`Post_ID`DESC LIMIT 3 ";
              $query8=mysqli_query($con,$sql8);
              $row8=mysqli_num_rows($query8);
                if($row8){
              while($result8=mysqli_fetch_assoc($query8)){ 
                ?>

                <li>
                  <?php $img=$result8['Post_Image']?>
                  <figure class="bsbig_fig  wow fadeInDown"> <a class="featured_img"
                      href="dfp.php?id=<?=$result8['Post_ID']?>"> <img src="/newsportal/admin/postimages/<?= $img?>"
                        alt=""> <span class="overlay"></span> </a>
                    <figcaption> <a href="dfp.php?id=<?=$result8['Post_ID']?>">
                        <?=$result8['Post_Title']?>
                      </a> </figcaption>
                      <p>
                      <?php echo substr($result8['Post_Description'],0,650)."...";?>
                      </p>
                  </figure>

                </li>
                <?php
              }}?>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4">
          <!-- Related post bar -->
          <div class="latest_post">
            <h2><span> Related post</span></h2>
            <div class="latest_post_container">
              <div id="prev-button"><i class="fa fa-chevron-up"></i></div>
              <ul class="latest_postnav">
                <?php
            
                $limit=5;
                $sql="SELECT *  FROM `tblposts`LEFT JOIN `tblcategory` ON `tblposts`.`Category`=`tblcategory`.`Cat_ID`ORDER BY `tblposts`.`Post_ID` DESC LIMIT {$limit}" ;
                $query=mysqli_query($con,$sql);
          
                if($query){
                  while($result=mysqli_fetch_assoc($query)){
                    ?>
                    <li>
                      <div class="media"> <a href="dfp.php?id=<?=$result['Post_ID']?>" class="media-left">
                          <?php $img=$result['Post_Image']?>
                          <img alt="" src="/newsportal/admin/postimages/<?=$img?>">
                        </a>
                        <div class="media-body"> <a href="dfp.php?id=<?=$result['Post_ID'] ?>" class="catg_title">
                        <?php echo substr($result['Post_Title'],0,106).".";?>
                          </a> </div>
                      </div>
                    </li>
                      <?php
                  }
                }
                ?>
              </ul>
              <div id="next-button"><i class="fa  fa-chevron-down"></i></div>
            </div>
          </div>
          <!-- Related post bar end -->

          <!-- Latest Post bar -->

          <div class="single_sidebar">
            <h2><span>Latest Post</span></h2>
            <ul class="spost_nav">
              
              <?php $limit=5;
              $sql9="SELECT *  FROM `tblposts`LEFT JOIN `tblcategory` ON `tblposts`.`Category`=`tblcategory`.`Cat_ID` ORDER BY `tblposts`.`Post_ID` DESC  LIMIT {$limit}" ;
              $query9=mysqli_query($con,$sql9);
        
              if($query9){
                while($result9=mysqli_fetch_assoc($query9)){
                  ?>
                  <li>
                    <div class="media wow fadeInDown"> <a  href="dfp.php?id=<?=$result9['Post_ID']?>" class="media-left"> 
                    <?php $img=$result9['Post_Image']?>
                    <img alt="" src="/newsportal/admin/postimages/<?=$img?>"> </a>
                      <div class="media-body"> <a  href="dfp.php?id=<?=$result9['Post_ID']?>" class="catg_title"> <?php echo substr($result9['Post_Title'],0,106).".";?></a> </div>
                    </div>
                  </li>
                  <?php
                }
              }
              ?>
            </ul>
          </div><!-- Latest Post bar end -->
          <div class="single_sidebar">
            <ul class="nav nav-tabs" role="tablist">
              <li role="presentation" class="active"><a href="#category" aria-controls="home" role="tab" data-toggle="tab">Category</a></li>
              <li role="presentation"><a href="#video" aria-controls="profile" role="tab" data-toggle="tab">Video</a></li>
              <li role="presentation"><a href="#comments" aria-controls="messages" role="tab" data-toggle="tab">Comments</a></li>
            </ul>
            <div class="tab-content">
              <div role="tabpanel" class="tab-pane active" id="category">
                    <ul>
                      <?php
                      $sql5="SELECT * FROM `tblcategory`";
                      $query5=mysqli_query($con,$sql5) or die("Query Failed. : Category");
                      $run5=mysqli_num_rows($query5);
                      if($run5){
                        while($result5=mysqli_fetch_assoc($query5)){
                          ?>
                            <li class="cat-item"><a href="categorie.php?id=<?=$result5['Cat_ID']?>"><?=$result5['Cat_Name']?></a></li>
                          <?php
                        }
                      }?>
                                            
                    </ul>
              </div>
              <div role="tabpanel" class="tab-pane" id="video">
                <div class="vide_area">
                  <iframe width="100%" height="250" src="http://www.youtube.com/embed/h5QWbURNEpA?feature=player_detailpage" frameborder="0" allowfullscreen></iframe>
                </div>
              </div>
              <div role="tabpanel" class="tab-pane" id="comments">
                <ul class="spost_nav">
                  <?php
                  $sql1="SELECT * FROM `tblposts`LEFT JOIN `tblcomments` ON `tblposts`.`Post_ID`=`tblcomments`.`Post_ID` WHERE `tblcomments`.`Post_ID` ";
                  $query1=mysqli_query($con,$sql1);
                  $row1=mysqli_num_rows($query1);
                  if($query1){
                    while($result1=mysqli_fetch_assoc($query1)){
                      ?>
                      <li>
                      <?php $img=$result1['Post_Image']?>
                        <div class="media wow fadeInDown"> <a href="dfp.php?id=<?=$result1['Post_ID']?>" class="media-left"> <img alt="" src="/newsportal/admin/postimages/<?=$img?>"> </a>
                          <div class="media-body"> <a href="dfp.php?id=<?=$result1['Post_ID']?>" class="catg_title"> <?=$result1['Post_Title']?></a> </div>
                        </div>
                      </li>
                      <?php
                    }
                  }
                  ?>
                 
                 
                </ul>
              </div>
            </div>

          </div>

        </div><!-- col-4 end -->
      </div><!-- row end -->      
    </div>
  </section>
  <!-- <section id="contentSection">
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-8">
       
     </div>
      
      
        <div class="col-lg-4 col-md-4 col-sm-4">
        <aside class="right_content">
         
        </aside>
      </div>
    </div>
  </section> -->

  <!-- footer section -->

  <?php include "footer3.php";?>
  </div>

</body>

</html>