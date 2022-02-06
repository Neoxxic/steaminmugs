<?php
include_once "static/header.php"
?>

<section class="home-slider owl-carousel">

  <div class="slider-item" style="background-image: url(images/bg_3.jpg);" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row slider-text justify-content-center align-items-center">

        <div class="col-md-7 col-sm-12 text-center ftco-animate">
          <h1 class="mb-3 mt-5 bread">Blog Details</h1>
          <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span class="mr-2"><a href="blog.php">Blog</a></span> <span>Blog Single</span></p>
        </div>

      </div>
    </div>
  </div>
</section>

<?php
$id = $_GET['blog_id'];
$sql = "SELECT * FROM tbl_blog WHERE id=$id";
$res = mysqli_query($conn, $sql);
$count = mysqli_num_rows($res);

if ($count == 1) {

  while ($row = mysqli_fetch_assoc($res)) {
    $id = $row['id'];
    $blog_title = $row['blog_title'];
    $content1 = $row['content_1'];
    $image_1 = $row['image_1'];
    $content2 = $row['content_2'];
    $image_2 = $row['image_2'];
    $featured = $row['featured'];
    $active = $row['active'];
    $admin_id = $row['admin_id'];
    $date_posted = $row['date_posted'];

    $sql2 = "SELECT * FROM tbl_admin WHERE id=$admin_id";
    $res2 = mysqli_query($conn, $sql2);
    $count2 = mysqli_num_rows($res2);
    $row2 = mysqli_fetch_assoc($res2);

    $admin_name = $row2['full_name'];
    $admin_img = $row2['admin_img'];
    $admin_info = $row2['admin_info'];
  }
}

?>

<section class="ftco-section">
  <div class="container">
    <div class="row">
      <div class="col-md-8 ftco-animate">
        <h2 class="mb-3"><?php echo $blog_title; ?></h2>
        <p><?php echo $content1; ?></p>
        <p>
          <?php
          if ($image_1 == "") {
            echo "<div class'error'>Image not available</div>";
          } else {
          ?>
            <img src="<?php echo $siteurl . 'admin/upload/blog/' . $image_1; ?>" alt="" class="img-fluid">
          <?php
          }
          ?>
        </p>
        <p><?php echo $content2; ?></p>
        <p>
          <?php
          if ($image_2 == "") {
            echo "<div class'error'>Image not available</div>";
          } else {
          ?>
            <img src="<?php echo $siteurl . 'admin/upload/blog/' . $image_2; ?>" alt="" class="img-fluid">
          <?php
          }
          ?>
        </p>
        <div class="tag-widget post-tag-container mb-5 mt-5">
          <div class="tagcloud">
            <a href="#" class="tag-cloud-link">Life</a>
            <a href="#" class="tag-cloud-link">Sport</a>
            <a href="#" class="tag-cloud-link">Tech</a>
            <a href="#" class="tag-cloud-link">Travel</a>
          </div>
        </div>

        <div class="about-author d-flex">
          <div class="bio align-self-md-center mr-5">
            <?php
            if ($admin_img == "") {
              echo "<div class'error'>Image not available</div>";
            } else {
            ?>
              <img src="<?php echo $siteurl . 'admin/upload/admin/' . $admin_img; ?>" alt="Image placeholder" class="img-fluid mb-4" width="120em">
            <?php
            }
            ?>
          </div>
          <div class="desc align-self-md-center">
            <h3><?php echo $admin_name; ?></h3>
            <p><?php echo $admin_info; ?></p>
          </div>
        </div>



        <?php

        $sql3 = "SELECT * FROM tbl_comment WHERE blog_id=$id";
        $res3 = mysqli_query($conn, $sql3);
        $count3 = mysqli_num_rows($res3);

        if ($count3 > 0) {
        ?>
          <div class="pt-5 mt-5">
            <h3 class="mb-5"><?php echo $count3; ?> Comments</h3>
            <ul class="comment-list">
              <?php

              while ($row3 = mysqli_fetch_assoc($res3)) {

                $comment_id = $row3['id'];
                $name = $row3['name'];
                $message = $row3['message'];
                $date = $row3['date'];
                $active = $row3['active'];

              ?>
                <li class="comment">
                  <div class="vcard bio">
                    <img src="images/default-comment-profile.jpg" alt="Image placeholder">
                  </div>
                  <div class="comment-body">
                    <h3><?php echo $name; ?></h3>
                    <div class="meta"><?php echo date("m/d/Y" . ' ' . "h:i a", strtotime($date_posted)) ?></div>
                    <p><?php echo $message; ?></p>
                    <!--<p><a href="#" class="reply">Reply</a></p>-->
                  </div>
                </li>

            <?php

              }
            } else {

              //NO Comment

            }

            ?>




            <!--<ul class="children">
                <li class="comment">
                  <div class="vcard bio">
                    <img src="images/person_1.jpg" alt="Image placeholder">
                  </div>
                  <div class="comment-body">
                    <h3>John Doe</h3>
                    <div class="meta">June 27, 2018 at 2:21pm</div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
                    <p><a href="#" class="reply">Reply</a></p>
                  </div>
              </ul> -->


            <div class="comment-form-wrap pt-5">
              <h3 class="mb-5">Leave a comment</h3>
              <form method="POST" action="#">
                <div class="form-group">
                  <label for="name">Name *</label>
                  <input name="name" type="text" class="form-control" id="name">
                </div>
                <div class="form-group">
                  <label for="email">Email *</label>
                  <input name="email" type="email" class="form-control" id="email">
                </div>
                <div class="form-group">
                  <label for="message">Message</label>
                  <textarea name="message" id="message" cols="30" rows="10" class="form-control"></textarea>
                </div>
                <div class="form-group">
                  <input type="hidden" name="blog_id" value="<?php echo $id; ?>">
                  <input name="comment" type="submit" value="Post Comment" class="btn py-3 px-4 btn-primary">
                </div>

              </form>
            </div>
          </div>

      </div> <!-- .col-md-8 -->
      <div class="col-md-4 sidebar ftco-animate">
        <div class="sidebar-box">
          <form action="#" class="search-form">
            <div class="form-group">
              <div class="icon">
                <span class="icon-search"></span>
              </div>
              <input type="text" class="form-control" placeholder="Search...">
            </div>
          </form>
        </div>
        <div class="sidebar-box ftco-animate">
          <div class="categories">
            <h3>Categories</h3>
            <li><a href="#">Tour <span>(12)</span></a></li>
            <li><a href="#">Hotel <span>(22)</span></a></li>
            <li><a href="#">Coffee <span>(37)</span></a></li>
            <li><a href="#">Drinks <span>(42)</span></a></li>
            <li><a href="#">Foods <span>(14)</span></a></li>
            <li><a href="#">Travel <span>(140)</span></a></li>
          </div>
        </div>

        <div class="sidebar-box ftco-animate">
          <h3>Recent Blog</h3>
          <?php
          $sql4 = "SELECT * FROM tbl_blog";
          $res4 = mysqli_query($conn, $sql4);
          $count4 = mysqli_num_rows($res4);
          $num = 0;
          if ($count4 > 0) {

            while ($row4 = mysqli_fetch_assoc($res4)) {
              $id = $row4['id'];
              $blog_id_list = $row4['id'];
              $blog_title = $row4['blog_title'];
              $content1 = $row4['content_1'];
              $image_1 = $row4['image_1'];
              $content2 = $row4['content_2'];
              $image_2 = $row4['image_2'];
              $featured = $row4['featured'];
              $active = $row4['active'];
              $admin_id = $row4['admin_id'];
              $date_posted = $row4['date_posted'];

              
              $sql5 = "SELECT * FROM tbl_admin WHERE id=$admin_id";
              $res5 = mysqli_query($conn, $sql5);
              $count5 = mysqli_num_rows($res5);
              $row5 = mysqli_fetch_assoc($res5);

              $admin_name = $row5['full_name'];

              $sql6 = "SELECT * FROM tbl_comment WHERE blog_id=$blog_id_list";
              $res6 = mysqli_query($conn, $sql6);
              $count6 = mysqli_num_rows($res6);
              $row6 = mysqli_fetch_assoc($res6);


              if ($featured == 'Yes' and $active == 'Yes') {

                if ($num == 3) {
                  break;
                } else {
          ?>
                  <div class="block-21 mb-4 d-flex">
                    <?php
                    if ($image_1 == "") {
                      echo "<div class'error'>Image not available</div>";
                    } else {
                    ?>
                      <a href="blog-single.php?blog_id=<?php echo $id; ?>" class="blog-img mr-4" style="background-image: url(<?php echo $siteurl . 'admin/upload/blog/' . $image_1; ?>);"></a>
                    <?php
                    }
                    ?>

                    <div class="text">
                      <h3 class="heading"><a href="#"><?php echo $blog_title;?></a></h3>
                      <div class="meta">
                        <div><a href="#"><span class="icon-calendar"></span> <?php echo date("m/d/Y" . ' ' . "h:i a", strtotime($date_posted)) ?></a></div>
                        <div><a href="#"><span class="icon-person"></span> <?php echo $admin_name;?></a></div>
                        <div><a href="#"><span class="icon-chat"></span> <?php echo $count6; ?></a></div>
                      </div>
                    </div>
                  </div>

          <?php
                  $num++;
                }
              }
            }
          }


          ?>
        </div>

        <div class="sidebar-box ftco-animate">
          <h3>Tag Cloud</h3>
          <div class="tagcloud">
            <a href="#" class="tag-cloud-link">dish</a>
            <a href="#" class="tag-cloud-link">menu</a>
            <a href="#" class="tag-cloud-link">food</a>
            <a href="#" class="tag-cloud-link">sweet</a>
            <a href="#" class="tag-cloud-link">tasty</a>
            <a href="#" class="tag-cloud-link">delicious</a>
            <a href="#" class="tag-cloud-link">desserts</a>
            <a href="#" class="tag-cloud-link">drinks</a>
          </div>
        </div>
      </div>

    </div>
  </div>
</section> <!-- .section -->

<?php
include_once "static/footer.php"
?>