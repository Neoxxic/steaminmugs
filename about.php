<?php
include_once "static/header.php"
?>

<section class="home-slider owl-carousel">

	<div class="slider-item" style="background-image: url(images/bg_3.jpg);" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="container">
			<div class="row slider-text justify-content-center align-items-center">

				<div class="col-md-7 col-sm-12 text-center ftco-animate">
					<h1 class="mb-3 mt-5 bread">About Us</h1>
					<p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span>About</span></p>
				</div>

			</div>
		</div>
	</div>
</section>

<?php
include_once "static/story.php"
?>

<section class="ftco-section">
	<div class="container">
		<div class="row d-flex justify-content-center">
			<div class="heading-section ftco-animate ">
				<span class="subheading">Meet</span>
				<h2 class="mb-4">The Team</h2>
			</div>
		</div>
		<div class="row d-flex">
			<?php



			$sql2 = "SELECT * FROM tbl_admin";
			$res2 = mysqli_query($conn, $sql2);
			$count2 = mysqli_num_rows($res2);


			if ($count2 > 0) {

				while ($row2 = mysqli_fetch_assoc($res2)) {

					$admin_name = $row2['full_name'];
					$admin_img = $row2['company_img'];
					$admin_info = $row2['admin_info'];

					if ( $admin_name != 'SteaminMugs' AND $admin_name != 'Marvin Vinarao' ) {
			?>
						<div class="col-md-4 ftco-animate d-flex justify-content-center">
							<div class="blog-entry align-self-stretch">
								<?php
								if ($admin_img == "") {
									echo "<div class'error'>Image not available</div>";
								} else {
								?>
									<a href="#" class="block-20 rounded-circle" style="background-image: url(<?php echo $siteurl . 'admin/upload/admin/' . $admin_img; ?>);  height: 250px; width: 250px;"></a>
								<?php
								}
								?>

								<div class="text py-4 d-block ">
									<center>
										<div class="meta">
											<h4 class="card-title mt-2"><?php echo $admin_name; ?></h4>
											<h6 class="card-subtitle"><?php echo $admin_info; ?></h6>
										</div>
									</center>
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
include_once "static/customersays.php"
?>



<section class="ftco-section">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-md-6 pr-md-5">
				<div class="heading-section text-md-right ftco-animate">
					<span class="subheading">Discover</span>
					<h2 class="mb-4">Our Menu</h2>
					<p class="mb-4">Take a sip of our divine coffee, which is only available at our store, and pair it with a freshly baked pastry. Don't be hesitant to give our items a shot and you will never regret.</p>
					<p><a href="#" class="btn btn-primary btn-outline-primary px-4 py-3">View Full Menu</a></p>
				</div>
			</div>
			<div class="col-md-6">
				<div class="row">
					<div class="col-md-6">
						<div class="menu-entry">
							<a href="#" class="img" style="background-image: url(images/menu-1.jpg);"></a>
						</div>
					</div>
					<div class="col-md-6">
						<div class="menu-entry mt-lg-4">
							<a href="#" class="img" style="background-image: url(images/menu-2.jpg);"></a>
						</div>
					</div>
					<div class="col-md-6">
						<div class="menu-entry">
							<a href="#" class="img" style="background-image: url(images/menu-3.jpg);"></a>
						</div>
					</div>
					<div class="col-md-6">
						<div class="menu-entry mt-lg-4">
							<a href="#" class="img" style="background-image: url(images/menu-4.jpg);"></a>
						</div>
					</div>
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

<?php
include_once "static/footer.php"
?>