<footer class="ftco-footer ftco-section img">
  <div class="overlay"></div>
  <div class="container">
    <div class="row mb-5">
      <div class="col-lg-3 col-md-6 mb-5 mb-md-5">
        <div class="ftco-footer-widget mb-4">
          <h2 class="ftco-heading-2">About Us</h2>
          <p>To aid and support our local farmers, Steamin Mugs creates coffee drinks, pastries, and frappes using only local and organic products. </p>
          <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
            <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
            <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
            <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
          </ul>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 mb-5 mb-md-5">
        <div class="ftco-footer-widget mb-4">
          <h2 class="ftco-heading-2">Recent Blog</h2>
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

                if ($num == 2) {
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
                      <h3 class="heading"><a href="#"><?php echo $blog_title; ?></a></h3>
                      <div class="meta">
                        <div><a href="#"><span class="icon-calendar"></span> <?php echo date("m/d/Y" . ' ' . "h:i a", strtotime($date_posted)) ?></a></div>
                        <div><a href="#"><span class="icon-person"></span> <?php echo $admin_name; ?></a></div>
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
      </div>
      <div class="col-lg-2 col-md-6 mb-5 mb-md-5">
        <div class="ftco-footer-widget mb-4 ml-md-4">
          <h2 class="ftco-heading-2">Services</h2>
          <ul class="list-unstyled">
            <li><a href="#" class="py-2 d-block">Cooked</a></li>
            <li><a href="#" class="py-2 d-block">Deliver</a></li>
            <li><a href="#" class="py-2 d-block">Quality Foods</a></li>
            <li><a href="#" class="py-2 d-block">Mixed</a></li>
          </ul>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 mb-5 mb-md-5">
        <div class="ftco-footer-widget mb-4">
          <h2 class="ftco-heading-2">Have a Questions?</h2>
          <div class="block-23 mb-3">
            <ul>
              <li><span class="icon icon-map-marker"></span><span class="text">403 East Virgo St. Dream Village, Caloocan City, Metro Manila, Philippines</span></li>
              <li><a href="#"><span class="icon icon-phone"></span><span class="text">+639950618373</span></a></li>
              <li><a href="#"><span class="icon icon-envelope"></span><span class="text">info@steaminmugsph.com</span></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 text-center">

        <p>
          <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
          Copyright &copy;<script>
            document.write(new Date().getFullYear());
          </script> All rights reserved</a>
          <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
        </p>
      </div>
    </div>
  </div>
  </div>
</footer>



<!-- loader -->
<!-- <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div> -->


<script src="js/jquery.min.js"></script>
<script src="js/jquery-migrate-3.0.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
<script src="js/jquery.waypoints.min.js"></script>
<script src="js/jquery.stellar.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/aos.js"></script>
<script src="js/jquery.animateNumber.min.js"></script>
<script src="js/bootstrap-datepicker.js"></script>
<script src="js/jquery.timepicker.min.js"></script>
<script src="js/scrollax.min.js"></script>
<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script> -->
<!-- <script src="js/google-map.js"></script> -->
<script src="js/main.js"></script>

</body>

</html>