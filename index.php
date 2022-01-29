<?php
include_once 'static/header.php'
?>

<section class="home-slider owl-carousel">
	<div class="slider-item" style="background-image: url(images/bg_1.jpg);">
		<div class="overlay"></div>
		<div class="container">
			<div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

				<div class="col-md-8 col-sm-12 text-center ftco-animate">
					<span class="subheading">Welcome</span>
					<h1 class="mb-4">The Best Coffee Testing Experience</h1>
					<p class="mb-4 mb-md-5">A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
					<p><a href="#" class="btn btn-primary p-3 px-xl-4 py-xl-3">Order Now</a> <a href="#" class="btn btn-white btn-outline-white p-3 px-xl-4 py-xl-3">View Menu</a></p>
				</div>

			</div>
		</div>
	</div>

	<div class="slider-item" style="background-image: url(images/bg_2.jpg);">
		<div class="overlay"></div>
		<div class="container">
			<div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

				<div class="col-md-8 col-sm-12 text-center ftco-animate">
					<span class="subheading">Welcome</span>
					<h1 class="mb-4">Amazing Taste &amp; Beautiful Place</h1>
					<p class="mb-4 mb-md-5">A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
					<p><a href="#" class="btn btn-primary p-3 px-xl-4 py-xl-3">Order Now</a> <a href="#" class="btn btn-white btn-outline-white p-3 px-xl-4 py-xl-3">View Menu</a></p>
				</div>

			</div>
		</div>
	</div>

	<div class="slider-item" style="background-image: url(images/bg_3.jpg);">
		<div class="overlay"></div>
		<div class="container">
			<div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

				<div class="col-md-8 col-sm-12 text-center ftco-animate">
					<span class="subheading">Welcome</span>
					<h1 class="mb-4">Creamy Hot and Ready to Serve</h1>
					<p class="mb-4 mb-md-5">A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
					<p><a href="#" class="btn btn-primary p-3 px-xl-4 py-xl-3">Order Now</a> <a href="#" class="btn btn-white btn-outline-white p-3 px-xl-4 py-xl-3">View Menu</a></p>
				</div>

			</div>
		</div>
	</div>
</section>

<?php
include_once "static/intro.php"
?>

<?php
include_once "static/story.php"
?>

<?php
include_once "static/efq.php"
?>

<section class="ftco-section">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-md-6 pr-md-5">
				<div class="heading-section text-md-right ftco-animate">
					<span class="subheading">Discover</span>
					<h2 class="mb-4">Our Menu</h2>
					<p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
					<p><a href="<?php echo $siteurl . 'menu.php' ?>" class="btn btn-primary btn-outline-primary px-4 py-3">View Full Menu</a></p>
				</div>
			</div>
			<div class="col-md-6">
				<div class="row">
					<?php
					$sql_categories = "SELECT * FROM tbl_categories";
					$res_categories = mysqli_query($conn, $sql_categories);
					$count_categories = mysqli_num_rows($res_categories);

					if ($count_categories > 0) {
						while ($row_categ = mysqli_fetch_assoc($res_categories)) {

							$categories_title = $row_categ['title'];
							$categories_image = $row_categ['image_name'];
							$categories_featured = $row_categ['featured'];
							$categories_active = $row_categ['active'];

							if ($categories_featured == "Yes" && $categories_active == "Yes") {
					?>
								<div class="col-md-6">
									<div class="menu-entry">
										<?php
										if ($categories_image == "") {
											echo "<div class'error'>Image not available</div>";
										} else {
										?>
											<a href="#" class="img" style="background-image: url(<?php echo $siteurl . 'admin/upload/category/' . $categories_image; ?>);"></a>
										<?php
										}
										?>
									</div>
								</div>
					<?php
							} else {
							}
						}
					} else {
					}

					?>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="ftco-counter ftco-bg-dark img" id="section-counter" style="background-image: url(images/bg_2.jpg);" data-stellar-background-ratio="0.5">
	<div class="overlay"></div>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-10">
				<div class="row">
					<div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
						<div class="block-18 text-center">
							<div class="text">
								<div class="icon"><span class="flaticon-coffee-cup"></span></div>
								<strong class="number" data-number="100">0</strong>
								<span>Coffee Branches</span>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
						<div class="block-18 text-center">
							<div class="text">
								<div class="icon"><span class="flaticon-coffee-cup"></span></div>
								<strong class="number" data-number="85">0</strong>
								<span>Number of Awards</span>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
						<div class="block-18 text-center">
							<div class="text">
								<div class="icon"><span class="flaticon-coffee-cup"></span></div>
								<strong class="number" data-number="10567">0</strong>
								<span>Happy Customer</span>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
						<div class="block-18 text-center">
							<div class="text">
								<div class="icon"><span class="flaticon-coffee-cup"></span></div>
								<strong class="number" data-number="900">0</strong>
								<span>Staff</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="ftco-section">
	<div class="container">
		<div class="row justify-content-center mb-5 pb-3">
			<div class="col-md-7 heading-section ftco-animate text-center">
				<span class="subheading">Discover</span>
				<h2 class="mb-4">Best Coffee Sellers</h2>
				<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
			</div>
		</div>
		<div class="row">
			<?php
			$sql_coffee = "SELECT * FROM tbl_categories";
			$res_coffee = mysqli_query($conn, $sql_coffee);
			$count_coffee = mysqli_num_rows($res_coffee);

			if ($count_coffee > 0) {

				while ($row_coffee = mysqli_fetch_assoc($res_coffee)) {

					$category_coffee_title = $row_coffee['title'];

					if ($category_coffee_title == "Coffee") {

						$category_coffee_id = $row_coffee['id'];

						$sql_coffee_prod = "SELECT * FROM tbl_food WHERE category_id=$category_coffee_id";
						$res_coffee_prod = mysqli_query($conn, $sql_coffee_prod);
						$count_coffee_prod = mysqli_num_rows($res_coffee_prod);
						$num3 = 0;

						if ($count_coffee_prod > 0) {

							while ($row_coffee_prod = mysqli_fetch_assoc($res_coffee_prod)) {
								$coffee = $row_coffee_prod['title'];
								$coffee_price = $row_coffee_prod['price'];
								$coffee_description = $row_coffee_prod['description'];
								$coffee_image = $row_coffee_prod['image_name'];
								$coffee_featured = $row_coffee_prod['featured'];
								$coffee_active = $row_coffee_prod['active'];

								if ($coffee_featured == "Yes" && $coffee_active == "Yes") {
									if ($num3 == 4) {
										break;
									} else {
			?>
										<div class="col-md-3">
											<div class="menu-entry">
												<?php
												if ($coffee_image == "") {

													echo "<div class'error'>Image not available</div>";
												} else {
												?>
													<a href="#" class="img" style="background-image: url(<?php echo $siteurl . 'admin/upload/product/' . $coffee_image; ?>);"></a>
												<?php
												}
												?>

												<div class="text text-center pt-4">
													<h3><a href="#"><?php echo $coffee; ?></a></h3>
													<p><?php echo $coffee_description; ?></p>
													<p class="price"><span><?php echo $coffee_price; ?></span></p>
													<p><a href="#" class="btn btn-primary btn-outline-primary">Add to Cart</a></p>
												</div>
											</div>
										</div>

			<?php
										$num3++;
									}
								}
							}
						} else {
						}
					} else {
					}
				}
			}


			?>


		</div>
	</div>
</section>

<section class="ftco-gallery">
	<div class="container-wrap">
		<div class="row no-gutters">
			<div class="col-md-3 ftco-animate">
				<a href="gallery.html" class="gallery img d-flex align-items-center" style="background-image: url(images/gallery-1.jpg);">
					<div class="icon mb-4 d-flex align-items-center justify-content-center">
						<span class="icon-search"></span>
					</div>
				</a>
			</div>
			<div class="col-md-3 ftco-animate">
				<a href="gallery.html" class="gallery img d-flex align-items-center" style="background-image: url(images/gallery-2.jpg);">
					<div class="icon mb-4 d-flex align-items-center justify-content-center">
						<span class="icon-search"></span>
					</div>
				</a>
			</div>
			<div class="col-md-3 ftco-animate">
				<a href="gallery.html" class="gallery img d-flex align-items-center" style="background-image: url(images/gallery-3.jpg);">
					<div class="icon mb-4 d-flex align-items-center justify-content-center">
						<span class="icon-search"></span>
					</div>
				</a>
			</div>
			<div class="col-md-3 ftco-animate">
				<a href="gallery.html" class="gallery img d-flex align-items-center" style="background-image: url(images/gallery-4.jpg);">
					<div class="icon mb-4 d-flex align-items-center justify-content-center">
						<span class="icon-search"></span>
					</div>
				</a>
			</div>
		</div>
	</div>
</section>

<?php
include_once "static/product-list.php"
?>

<?php
include_once "static/customersays.php"
?>

<section class="ftco-section">
	<div class="container">
		<div class="row justify-content-center mb-5 pb-3">
			<div class="col-md-7 heading-section ftco-animate text-center">
				<h2 class="mb-4">Recent from blog</h2>
				<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
			</div>
		</div>
		<div class="row d-flex">
			<div class="col-md-4 d-flex ftco-animate">
				<div class="blog-entry align-self-stretch">
					<a href="blog-single.html" class="block-20" style="background-image: url('images/image_1.jpg');">
					</a>
					<div class="text py-4 d-block">
						<div class="meta">
							<div><a href="#">Sept 10, 2018</a></div>
							<div><a href="#">Admin</a></div>
							<div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
						</div>
						<h3 class="heading mt-2"><a href="#">The Delicious Pizza</a></h3>
						<p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
					</div>
				</div>
			</div>
			<div class="col-md-4 d-flex ftco-animate">
				<div class="blog-entry align-self-stretch">
					<a href="blog-single.html" class="block-20" style="background-image: url('images/image_2.jpg');">
					</a>
					<div class="text py-4 d-block">
						<div class="meta">
							<div><a href="#">Sept 10, 2018</a></div>
							<div><a href="#">Admin</a></div>
							<div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
						</div>
						<h3 class="heading mt-2"><a href="#">The Delicious Pizza</a></h3>
						<p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
					</div>
				</div>
			</div>
			<div class="col-md-4 d-flex ftco-animate">
				<div class="blog-entry align-self-stretch">
					<a href="blog-single.html" class="block-20" style="background-image: url('images/image_3.jpg');">
					</a>
					<div class="text py-4 d-block">
						<div class="meta">
							<div><a href="#">Sept 10, 2018</a></div>
							<div><a href="#">Admin</a></div>
							<div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
						</div>
						<h3 class="heading mt-2"><a href="#">The Delicious Pizza</a></h3>
						<p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>


<section class="ftco-appointment">
	<div class="overlay"></div>
	<div class="container-wrap">
		<div class="row no-gutters d-md-flex align-items-center">
			<div class="col-md-6 d-flex align-self-stretch">
				<!--	<div id="map"></div> -->
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2708.4501681861743!2d121.08682662594873!3d14.764386179144985!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397a5530a0f12f7%3A0xf84ba87fa4b28924!2sNarigin%20Food%20Corporation!5e0!3m2!1sen!2sph!4v1642662514335!5m2!1sen!2sph" width="100%" height="500" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
			</div>
			<div class="col-md-6 appointment ftco-animate">
				<h3 class="mb-3">Book a Table</h3>
				<form action="#" class="appointment-form">
					<div class="d-md-flex">
						<div class="form-group">
							<input type="text" class="form-control" placeholder="First Name">
						</div>
						<div class="form-group ml-md-4">
							<input type="text" class="form-control" placeholder="Last Name">
						</div>
					</div>
					<div class="d-md-flex">
						<div class="form-group">
							<div class="input-wrap">
								<div class="icon"><span class="ion-md-calendar"></span></div>
								<input type="text" class="form-control appointment_date" placeholder="Date">
							</div>
						</div>
						<div class="form-group ml-md-4">
							<div class="input-wrap">
								<div class="icon"><span class="ion-ios-clock"></span></div>
								<input type="text" class="form-control appointment_time" placeholder="Time">
							</div>
						</div>
						<div class="form-group ml-md-4">
							<input type="text" class="form-control" placeholder="Phone">
						</div>
					</div>
					<div class="d-md-flex">
						<div class="form-group">
							<textarea name="" id="" cols="30" rows="2" class="form-control" placeholder="Message"></textarea>
						</div>
						<div class="form-group ml-md-4">
							<input type="submit" value="Appointment" class="btn btn-primary py-3 px-4">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>

<?php
include_once "static/footer.php"
?>