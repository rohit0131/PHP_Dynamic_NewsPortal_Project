<?php
      include "config.php";
    error_reporting(0);   
session_start();
if (empty($_SESSION['token'])) {
  $_SESSION['token'] = bin2hex(random_bytes(32));
 }

 if(isset($_POST['submit']))
{
  //Verifying CSRF Token
if (!empty($_POST['csrftoken'])) {
    if (hash_equals($_SESSION['token'], $_POST['csrftoken'])) {
$name=$_POST['name'];
$email=$_POST['email'];
$comment=$_POST['comment'];
$post_id=intval($_GET['id']);
$st1='0';
$query=mysqli_query($con,"INSERT INTO `tblcomments`(`Post_ID`,`Name`,`Email`,Comment,`status`) VALUES ('$post_id','$name','$email','$comment','$st1')");
if($query):
  echo "<script>alert('comment successfully submit. Comment will be display after admin review ');</script>";
  unset($_SESSION['token']);
else :
 echo "<script>alert('Something went wrong. Please try again.');</script>";  

endif;

}
}
}
$post_id=intval($_GET['id']);

    $sql = "SELECT viewCounter FROM tblposts WHERE  Post_ID = '$post_id'";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $visits = $row["viewCounter"];
            $sql = "UPDATE tblposts SET viewCounter = $visits+1 WHERE Post_ID ='$post_id'";
    $con->query($sql);

        }
    } else {
        echo "no results";
    }
    


 ?>
<!DOCTYPE html>
<html>

<head>
  <title> Single Page</title>

  <!--[if lt IE 9]>
<script src="../assets/js/html5shiv.min.js"></script>
<script src="../assets/js/respond.min.js"></script>
<![endif]-->
</head>

<body>
  <div id="preloader">
    <div id="status">&nbsp;</div>
  </div>
  <a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
  <div class="container">
    <?php include "header3.php";?>

    <section id="contentSection">
      <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8">
          <div class="left_content">
            <div class="single_page">
              <!-- <ol class="breadcrumb">
              <li><a href="../index.html">Home</a></li>
              <li><a href="#">Technology</a></li>
              <li class="active">Mobile</li>
            </ol> -->
              <?php
          
          $post_id=$_GET['id'];
          $sql4="SELECT * FROM `tblposts`LEFT JOIN `tblcategory` ON `tblposts`.`Category`=`tblcategory`.`Cat_ID`  WHERE `tblposts`.`Post_ID`= '{$post_id}'" ;
          $query4= mysqli_query($con,$sql4);
          if($query4){
            while($result4=mysqli_fetch_assoc($query4)){
              ?>
              <h1>
                <?= $result4['Post_Title']?>
              </h1>
              <div class="post_commentbox"> <a href="#"><i class="fa fa-user"></i>Wpfreeware</a> <span><i
                    class="fa fa-calendar"></i>
                  <?= $result4['PostingDate']?>
                </span> <a href="#"><i class="fa fa-tags"></i>
                  <?= $result4['Cat_Name']?>
                </a> </div>
              <?php $cat=$result4['Cat_Name'];?>
              <?php $img=$result4['Post_Image']?>

              <img class="img-center" style="margin-top: 80px; margin-bottom:50px;"
                src="/newsportal/admin/postimages/<?=$img?>" width="100%" alt="">

              <div>
                <p class="description">
                  <?=$result4['Post_Description']?>
                </p>
              </div>
              <?php 
            }
          }
          else{
            echo"<h2>NO Record Found</h2>";
          }
          ?>
              <!-- < Comment Section > -->
              <?php 
        $sts=1;
        $query2=mysqli_query($con,"SELECT `tblcomments`.`Name`,`tblcomments`.`Comment`,`tblcomments`.`postingDate` FROM  `tblcomments` WHERE `Post_ID`='$post_id' AND `status`='$sts'");
        while ($row2=mysqli_fetch_array($query2)) {
          ?>
              <div class="media mb-4">
                <img class="d-flex mr-3 rounded-circle" src="images/usericon.png" alt="">
                <div class="media-body">
                  <h5 class="mt-0 ">
                    <?php echo htmlentities($row2['Name']);?> <br>
                    <span style="font-size:11px;"><b>at</b>
                      <?php echo htmlentities($row2['postingDate']);?>
                    </span>
                  </h5>
                  <?php echo htmlentities($row2['Comment']);?>
                </div>
              </div>
              
              <?php } ?>
              <div calss="container" style="margin-top:200px; margin-bottom:100px; ">
                <div class="card my-4">
                  <h5 class="card-header">Leave a Comment:</h5>
                  <div class="card-body">
                    <form name="Comment" method="post">
                      <input type="hidden" name="csrftoken" value="<?php echo htmlentities($_SESSION['token']); ?>">
                      <div class="form-group">
                        <input type="text" name="name" class="form-control" placeholder="Enter your fullname" required>
                      </div>

                      <div class="form-group">
                        <input type="email" name="email" class="form-control" placeholder="Enter your Valid email"
                          required>
                      </div>
                      <div class="form-group">
                        <textarea class="form-control" name="comment" rows="3" placeholder="Comment"
                          required></textarea>
                      </div>
                      <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                    </form>
                  </div>
                </div>
              </div>
           

            <!-- < social media > -->

            <div class="social_link">
              <ul class="sociallink_nav">
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
              </ul>
            </div>


            <div class="related_post">
              <h2>Related Post <i class="fa fa-thumbs-o-up"></i></h2>
              <ul class="spost_nav wow fadeInDown animated">
                <?php
            $sql5="SELECT * FROM `tblposts`LEFT JOIN `tblcategory` ON `tblposts`.`Category`=`tblcategory`.`Cat_ID`  WHERE`tblcategory`.`Cat_Name` ='{$cat}'" ;
          $query5= mysqli_query($con,$sql5);
          if($query5){
            while($result5=mysqli_fetch_assoc($query5)){
             ?>
                <?php $img=$result5['Post_Image']?>
                <li>
                  <div class="media"> <a class="media-left" href="dfp.php?id=<?=$result5['Post_ID']?>"> <img
                        src="/newsportal/admin/postimages/<?=$img?>" alt=""> </a>
                    <div class="media-body"> <a class="catg_title" href="dfp.php?id=<?=$result5['Post_ID']?>">
                        <?= $result5['Post_Title']?>
                      </a> </div>
                  </div>
                </li>

                <?php
             }}?>

              </ul>
            </div>
          </div>
        </div>
      </div>
      <nav class="nav-slit"> <a class="prev" href="#"> <span class="icon-wrap"><i class="fa fa-angle-left"></i></span>
          <div>
            <h3>City Lights</h3>
            <img src="../images/post_img1.jpg" alt="" />
          </div>
        </a> <a class="next" href="#"> <span class="icon-wrap"><i class="fa fa-angle-right"></i></span>
          <div>
            <h3>Street Hills</h3>
            <img src="../images/post_img1.jpg" alt="" />
          </div>
        </a> </nav>
      <div class="col-lg-4 col-md-4 col-sm-4">
        <aside class="right_content">
          <div class="single_sidebar">
            <h2><span>Popular Post</span></h2>
            <ul class="spost_nav">
              <?php  $sql3="SELECT * FROM `tblposts`LEFT JOIN `tblcategory` ON `tblposts`.`Category`=`tblcategory`.`Cat_ID`  ORDER BY viewCounter DESC LIMIT 6";
          $query3= mysqli_query($con,$sql3);
          if($query3){
            while($result3=mysqli_fetch_assoc($query3)){
            ?>
              <li>
                <?php $img=$result3['Post_Image']?>
                <div class="media wow fadeInDown"> <a href="dfp.php?id=<?=$result3['Post_ID']?>" class="media-left">
                    <img alt="" src="/newsportal/admin/postimages/<?=$img?>"> </a>
                  <div class="media-body"> <a href="dfp.php?id=<?=$result3['Post_ID']?>" class="catg_title">
                      <?= $result3['Post_Title']?>
                    </a> </div>
                </div>
              </li>
              <?php
            }} ?>


            </ul>
          </div>
          <div class="single_sidebar">
            <ul class="nav nav-tabs" role="tablist">
              <li role="presentation" class="active"><a href="#category" aria-controls="home" role="tab"
                  data-toggle="tab">Category</a></li>
              <li role="presentation"><a href="#video" aria-controls="profile" role="tab" data-toggle="tab">Video</a>
              </li>
              <li role="presentation"><a href="#comments" aria-controls="messages" role="tab"
                  data-toggle="tab">Comments</a></li>
            </ul>
            <div class="tab-content">
              <div role="tabpanel" class="tab-pane active" id="category">
                <ul>
                  <?php
                $sql2="SELECT * FROM `tblcategory`";
                $query2=mysqli_query($con,$sql2) or die("Query Failed. : Category");
                $run2=mysqli_num_rows($query2);
                if($run2){
                while($result2=mysqli_fetch_assoc($query2)){
                
                ?>
                  <li class="cat-item"><a href="categorie.php?id=<?=$result2['Cat_ID']?>">
                      <?=$result2['Cat_Name']?>
                    </a></li>
                  <?php
                 
                 }}?>
                </ul>
              </div>
              <div role="tabpanel" class="tab-pane" id="video">
                <div class="vide_area">
                  <iframe width="100%" height="250"
                    src="http://www.youtube.com/embed/h5QWbURNEpA?feature=player_detailpage" frameborder="0"
                    allowfullscreen></iframe>
                </div>
              </div>
              <div role="tabpanel" class="tab-pane" id="comments">
                <ul class="spost_nav">
                  <li>
                  <?php
                  $sql1="SELECT  * FROM `tblposts`LEFT JOIN `tblcomments` ON `tblposts`.`Post_ID`=`tblcomments`.`Post_ID` WHERE `tblcomments`.`Post_ID` ";
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
                  </li>

                </ul>
              </div>
            </div>
          </div>
          <!-- <div class="single_sidebar wow fadeInDown">
            <h2><span>Sponsor</span></h2>
            <a class="sideAdd" href="#"><img src="../images/add_img.jpg" alt=""></a> </div>
          <div class="single_sidebar wow fadeInDown">
            <h2><span>Category Archive</span></h2>
            <select class="catgArchive">
              <option>Select Category</option>
              <option>Life styles</option>
              <option>Sports</option>
              <option>Technology</option>
              <option>Treads</option>
            </select>
          </div> -->
          <!-- <div class="single_sidebar wow fadeInDown">
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
  <footer id="footer">
    <?php include "footer3.php";?>
  </footer>
  </div>

</body>

</html>
