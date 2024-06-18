<?php
include "config.php";?>
<!DOCTYPE html>
<html>
<head>
<title>News</title>
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
        <div class="slick_slider">
       <?php $limit=5;
            $sql0="SELECT * FROM `tblposts`LEFT JOIN `tblcategory` ON `tblposts`.`Category`=`tblcategory`.`Cat_ID`ORDER BY `tblposts`.`Post_ID` DESC LIMIT {$limit}" ;
            $query0=mysqli_query($con,$sql0);
            if($query0){
              while($result0=mysqli_fetch_assoc($query0)){
              ?>
              <div class="single_iteam"> <a href="dfp.php?id=<?=$result0['Post_ID']?>"> 
              <?php $img=$result0['Post_Image']?>
              <img src="/newsportal/admin/postimages/<?=$img?>" alt=""></a>
            <div class="slider_article">
              <h2><a class="slider_tittle" href="dfp.php?id=<?=$result0['Post_ID']?>"><?=$result0['Post_Title']?></a></h2>
              <p> <?php echo substr($result0['Post_Description'],0,250)."...";?></p>
            </div>
          </div><?php
              }}?>
          

        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-4">
        <div class="latest_post">
          <h2><span>Latest post</span></h2>
          <div class="latest_post_container">
            <div id="prev-button"><i class="fa fa-chevron-up"></i></div>
            <ul class="latest_postnav">
            <?php
            
            $limit=5;
            $sql="SELECT * FROM `tblposts`LEFT JOIN `tblcategory` ON `tblposts`.`Category`=`tblcategory`.`Cat_ID`ORDER BY `tblposts`.`Post_ID` DESC LIMIT {$limit}" ;
            $query=mysqli_query($con,$sql);
            
            if($query){
              while($result=mysqli_fetch_assoc($query)){
               ?>
                <li>
                  <div class="media"> <a  href="dfp.php?id=<?=$result['Post_ID']?>" class="media-left">
                  <?php $img=$result['Post_Image']?>
                  <img alt="" src="/newsportal/admin/postimages/<?=$img?>"> </a>
                    <div class="media-body"> <a href="dfp.php?id=<?=$result['Post_ID'] ?>" class="catg_title"> <?php echo substr($result['Post_Title'],0,106).".";?></a> </div>
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
      </div>
    </div>
  </section>

  <section id="contentSection">
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-8">
        <div class="left_content">
          <div class="single_post_content">
           <?php
                    
            $sql2="SELECT * FROM `tblposts`LEFT JOIN `tblcategory` ON `tblposts`.`Category`=`tblcategory`.`Cat_ID` WHERE `tblposts`.`Category`='6' ORDER BY `tblposts`.`UpdationDate`||`tblposts`.`PostingDate`DESC LIMIT 5 ";
            $query2=mysqli_query($con,$sql2);
            $row2=mysqli_num_rows($query2);
            $result2=mysqli_fetch_assoc($query2);
            ?>
            <h2><span><?= $result2['Cat_Name']?></span></h2>
            <div class="single_post_content_left">
              <ul class="business_catgnav  wow fadeInDown">
                <li>
                <?php $img=$result2['Post_Image']?>
                  <figure class="bsbig_fig"> <a href="dfp.php?id=<?=$result2['Post_ID']?>" class="featured_img"> <img alt="" src="/newsportal/admin/postimages/<?= $img?>"> <span class="overlay"></span> </a>
                    <figcaption> <a href="dfp.php?id=<?=$result2['Post_ID']?>"><?=$result2['Post_Title']?></a> </figcaption>
                    <p>
                      <?php echo substr($result2['Post_Description'],0,650)."...";?>
                    </p>
                  </figure>
                </li>
              </ul>
            </div>
            <div class="single_post_content_right">
              <ul class="spost_nav">
              <?php
                  $sql2="SELECT * FROM `tblposts`LEFT JOIN `tblcategory` ON `tblposts`.`Category`=`tblcategory`.`Cat_ID` WHERE `tblposts`.`Category`='6' ORDER BY `tblposts`.`UpdationDate`||`tblposts`.`PostingDate`DESC LIMIT 5 ";
                  $query2=mysqli_query($con,$sql2);
                  $row2=mysqli_num_rows($query2);
                
                if($row2){
                  while($result2=mysqli_fetch_assoc($query2)){
                   ?>
                   <li>
                  <div class="media wow fadeInDown"> <a href="dfp.php?id=<?=$result2['Post_ID']?>" class="media-left"> <img alt="" src="/newsportal/admin/postimages/<?= $img?>"> </a>
                    <div class="media-body"> <a href="dfp.php?id=<?=$result2['Post_ID']?>" class="catg_title"><?=$result2['Post_Title']?> </a> </div>
                  </div>
                </li>
                   <?php
                   }} ?>
                
                
              </ul>
            </div>
          </div>

          <div class="fashion_technology_area">
            <div class="fashion">
              <div class="single_post_content">
                <?php
                 
                  
                 $sql6="SELECT * FROM `tblposts` LEFT JOIN `tblcategory` ON `tblposts`.`Category`=`tblcategory`.`Cat_ID`  WHERE `tblposts`.`Category`='5' ORDER BY `tblposts`.`UpdationDate`||`tblposts`.`PostingDate`DESC LIMIT 5 ";
                 $query6=mysqli_query($con,$sql6);
                 $row6=mysqli_num_rows($query6);
                 $result6=mysqli_fetch_assoc($query6);
                 ?>
                
                <h2><span><?= $result6['Cat_Name']?></span></h2>
                <ul class="business_catgnav wow fadeInDown">
                  
                <li>
                <?php $img=$result6['Post_Image']?>
                    <figure class="bsbig_fig"> <a href="dfp.php?id=<?=$result6['Post_ID']?>" class="featured_img"> <img alt="" src="/newsportal/admin/postimages/<?= $img?>"  > <span class="overlay"></span> </a>
                      <figcaption> <a href="dfp.php?id=<?=$result6['Post_ID']?>"><?=$result6['Post_Title']?></a> </figcaption>
                      <p>
                      <?php echo substr($result6['Post_Description'],0,650)."...";?>
                      </p>
                    </figure>
                  </li>
                  
                </ul>
                <ul class="spost_nav">
               <?php
                if($row6){
                  while($result6=mysqli_fetch_assoc($query6)){
                  ?>
                   <li>
                   <?php $img=$result6['Post_Image']?>
                  <div class="media wow fadeInDown"> <a href="dfp.php?id=<?=$result6['Post_ID']?>" class="media-left"> <img alt="" src="/newsportal/admin/postimages/<?= $img?>"> </a>
                    <div class="media-body"> <a href="dfp.php?id=<?=$result6['Post_ID']?>" class="catg_title"><?=$result6['Post_Title']?></a> </div>
                  </div>
                </li>
                  <?php }} ?>
              
                  
                </ul>
              </div>
            </div>
  


            

            <div class="technology">
              <div class="single_post_content">
              <?php
                 
                  
                 $sql7="SELECT * FROM `tblposts` LEFT JOIN `tblcategory` ON `tblposts`.`Category`=`tblcategory`.`Cat_ID`  WHERE `tblposts`.`Category`='3' ORDER BY `tblposts`.`UpdationDate`||`tblposts`.`PostingDate`DESC LIMIT 5 ";
                 $query7=mysqli_query($con,$sql7);
                 $row7=mysqli_num_rows($query7);
                 $result7=mysqli_fetch_assoc($query7);
                 ?>
                 <h2><span><?= $result7['Cat_Name']?></span></h2>
                <ul class="business_catgnav">
                <li>
                <?php $img=$result7['Post_Image']?>
                    <figure class="bsbig_fig"> <a href="dfp.php?id=<?=$result7['Post_ID']?>" class="featured_img"> <img alt="" src="/newsportal/admin/postimages/<?= $img?>"  > <span class="overlay"></span> </a>
                      <figcaption> <a href="dfp.php?id=<?=$result7['Post_ID']?>"><?=$result7['Post_Title']?></a> </figcaption>
                      <p>
                        <?php echo substr($result7['Post_Description'],0,650)."...";?>
                      </p>
                    </figure>
                  </li>
                </ul>
                <ul class="spost_nav">
                 
                 <?php
                if($row7){
                  while($result7=mysqli_fetch_assoc($query7)){
                  ?>
                   <li>
                   <?php $img=$result7['Post_Image']?>
                  <div class="media wow fadeInDown"> <a href="dfp.php?id=<?=$result7['Post_ID']?>" class="media-left"> <img alt="" src="/newsportal/admin/postimages/<?= $img?>"> </a>
                    <div class="media-body"> <a href="dfp.php?id=<?=$result7['Post_ID']?>" class="catg_title"><?=$result7['Post_Title']?></a> </div>
                  </div>
                </li>
                  <?php }} ?>
              
                </ul>
              </div>
            </div>
          </div>
          <div class="single_post_content">
            <h2><span>Photography</span></h2>
            <ul class="photograph_nav  wow fadeInDown">
              <?php 
              $sql4="SELECT* FROM `tblposts`LIMIT 6";
              $query4=mysqli_query($con,$sql4);
              if(mysqli_num_rows($query4)){
               while($result4=mysqli_fetch_assoc($query4)){
                ?>
                <li>
                <div class="photo_grid">
                  <?php $img=$result4['Post_Image']?>
                  <figure class="effect-layla"> <a class="fancybox-buttons" data-fancybox-group="button" href="" title="Photography Ttile 1"> <img src="/newsportal/admin/postimages/<?= $img?>" alt=""/></a> </figure>
                </div>
              </li>
                <?php
               }
              }
              
              ?>
              
             
            </ul>
          </div>
          <div class="single_post_content">
            <?php
                    
              $sql8="SELECT * FROM `tblposts` LEFT JOIN `tblcategory` ON `tblposts`.`Category`=`tblcategory`.`Cat_ID` WHERE `tblposts`.`Category`='8' ORDER BY `tblposts`.`UpdationDate`||`tblposts`.`PostingDate`DESC LIMIT 5 ";
              $query8=mysqli_query($con,$sql8);
              $row8=mysqli_num_rows($query8);
              $result8=mysqli_fetch_assoc($query8);
              ?>
              <h2><span><?=$result8['Cat_Name']?></span></h2>
              <div class="single_post_content_left">
                <ul class="business_catgnav">
                  <li>
                  <?php $img=$result8['Post_Image']?>
                    <figure class="bsbig_fig  wow fadeInDown"> <a class="featured_img" href="dfp.php?id=<?=$result8['Post_ID']?>"> <img src="/newsportal/admin/postimages/<?= $img?>" alt=""> <span class="overlay"></span> </a>
                      <figcaption> <a href="dfp.php?id=<?=$result8['Post_ID']?>"><?=$result8['Post_Title']?></a> </figcaption>
                      <p>
                        <?php echo substr($result8['Post_Description'],0,500)."...";?>
                      </p>
                    </figure>
                  </li>
                </ul>
              </div>
              <div class="single_post_content_right">
                <ul class="spost_nav">
              <?php 
                  $sql8="SELECT * FROM `tblposts` LEFT JOIN `tblcategory` ON `tblposts`.`Category`=`tblcategory`.`Cat_ID`WHERE `tblposts`.`Category`='8' ORDER BY `tblposts`.`UpdationDate`||`tblposts`.`PostingDate`DESC LIMIT 5 ";
                  $query8=mysqli_query($con,$sql8);
                  $row8=mysqli_num_rows($query8);
                if($row8){
                    while($result8=mysqli_fetch_assoc($query8)){
                    ?>
                    <li>
                        <?php $img=$result8['Post_Image']?>
                      <div class="media wow fadeInDown"> <a href="dfp.php?id=<?=$result8['Post_ID']?>" class="media-left"> <img alt="" src="/newsportal/admin/postimages/<?= $img?>"> </a>
                        <div class="media-body"> <a href="dfp.php?id=<?=$result8['Post_ID']?>" class="catg_title"><?=$result8['Post_Title']?></a> </div>
                    </div>
                  </li>
                    <?php }} ?>

                </ul>
              </div>
            </div>
          
        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-4">
        <aside class="right_content">
          <div class="single_sidebar">
            <h2><span>Popular Post</span></h2>
            <ul class="spost_nav">
              
           <?php $limit=5;
        $sql9="SELECT * FROM `tblposts` LEFT JOIN `tblcategory` ON `tblposts`.`Category`=`tblcategory`.`Cat_ID` ORDER BY viewCounter DESC LIMIT {$limit}" ;
        $query9=mysqli_query($con,$sql9);
        
         if($query9){
            while($result9=mysqli_fetch_assoc($query9)){
              ?>
              <li>                                         
                 
                <div class="media wow fadeInDown"> <a  href="dfp.php?id=<?=$result9['Post_ID']?>" class="media-left"> 
                <?php $img=$result9['Post_Image']?>
                <img alt="" src="/newsportal/admin/postimages/<?=$img?>"> </a>
                  <div class="media-body"> <a  href="dfp.php?id=<?= $result9['Post_ID'] ?>" class="catg_title"> <?php echo substr($result9['Post_Title'],0,106).".";?></a> </div>
                </div>
              </li>
              <?php
            }}
        ?>
              
            </ul>
          </div>
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
                
                }}?>
                

                  
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
          <div class="single_sidebar wow fadeInDown">
            <h2><span>Sponsor</span></h2>
            <a class="sideAdd" href="#"><img src="images/add_img.jpg" alt=""></a> </div>
           <!-- <div class="single_sidebar wow fadeInDown">
            <h2><span>Category Archive</span></h2>
            <select class="catgArchive">
              <option>Select Category</option>
              <option>Life styles</option>
              <option>Sports</option>
              <option>Technology</option>
              <option>Treads</option>
            </select>
          </div>
          <div class="single_sidebar wow fadeInDown">
            <h2><span>Links</span></h2>
            <ul>
              <li><a href="#">Blog</a></li>
              <li><a href="#">Rss Feed</a></li>
              <li><a href="#">Login</a></li>
              <li><a href="#">Life &amp; Style</a></li>
            </ul>
          </div> -->
        </aside>
      </div>
    </div>
  </section>
  <!-- footer section -->

  <?php include "footer3.php";?>
</div>


</body>
</html>
