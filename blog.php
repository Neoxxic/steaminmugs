<?php
include_once "static/header.php"
?>

<section class="home-slider owl-carousel">

  <div class="slider-item" style="background-image: url(images/bg_3.jpg);" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row slider-text justify-content-center align-items-center">

        <div class="col-md-7 col-sm-12 text-center ftco-animate">
          <h1 class="mb-3 mt-5 bread">Blog</h1>
          <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span>Blog</span></p>
        </div>

      </div>
    </div>
  </div>
</section>

<section class="ftco-section">
  <div class="container">
    <div class="row d-flex">
      <?php

      $sql = "SELECT * FROM tbl_blog";
      $res = mysqli_query($conn, $sql);
      $count = mysqli_num_rows($res);

      if ($count > 0) {

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

          $sql3 = "SELECT * FROM tbl_comment WHERE blog_id=$id";
          $res3 = mysqli_query($conn, $sql3);
          $count3 = mysqli_num_rows($res3);
          $row3 = mysqli_fetch_assoc($res3);


          if ($active == 'Yes') {
      ?>
            <div class="col-md-4 d-flex ftco-animate">
              <div class="blog-entry align-self-stretch">
              <?php
										if ($image_1 == "") {
											echo "<div class'error'>Image not available</div>";
										} else {
										?>
                      <a href="blog-single.php?blog_id=<?php echo $id;?>" class="block-20" style="background-image: url(<?php echo $siteurl . 'admin/upload/blog/' . $image_1; ?>);"></a>
                    <?php
										}
							?>
               
                <div class="text py-4 d-block">
                  <div class="meta">
                    <div><a href="#"><?php echo date("m/d/Y", strtotime($date_posted))?></a></div>
                    <div><a href="#"><?php echo $admin_name;?></a></div>
                    <div><a href="#" class="meta-chat"><span class="icon-chat"></span> <?php echo $count3;?></a></div>
                  </div>
                  <h3 class="heading mt-2"><a href="#"><?php echo $blog_title;?></a></h3>
                  <p><?php echo $content1?></p>
                </div>
              </div>
            </div>

      <?php

          }
        }
      }

      ?>
  </div>
</section>

<?php
include_once "static/footer.php"
?>