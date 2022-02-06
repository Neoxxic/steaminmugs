<?php
include_once "static/header.php"
?>

<section class="home-slider owl-carousel">

	<div class="slider-item" style="background-image: url(images/bg_3.jpg);" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="container">
			<div class="row slider-text justify-content-center align-items-center">

				<div class="col-md-7 col-sm-12 text-center ftco-animate">
					<h1 class="mb-3 mt-5 bread">Our Menu</h1>
					<p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span>Menu</span></p>
				</div>

			</div>
		</div>
	</div>
</section>

<?php
include_once "static/intro.php"
?>


<section class="ftco-section">
	<div class="container">
		<div class="row">
			<?php

			$sql = "SELECT * FROM tbl_categories";
			$res = mysqli_query($conn, $sql);
			$count = mysqli_num_rows($res);

			if ($count > 0) {

				while ($row = mysqli_fetch_assoc($res)) {

					$category_title = $row['title'];
					$category_id = $row['id'];
			?>
					<div class="col-md-6 mb-5 pb-3">
						<h3 class="mb-5 heading-pricing ftco-animate"><?php echo $category_title; ?></h3>

						<?php

						$sql2 = "SELECT * FROM tbl_food WHERE category_id=$category_id";
						$res2 = mysqli_query($conn, $sql2);
						$count2 = mysqli_num_rows($res2);

						if ($count2 > 0) {

							while ($row2 = mysqli_fetch_assoc($res2)) {

								$title = $row2['title'];
								$price = $row2['price'];
								$description = $row2['description'];
								$image_name = $row2['image_name'];
						?>
								<div class="pricing-entry d-flex ftco-animate">
									<?php
									if ($image_name != "") {

									?>

										<div class="img" style="background-image: url(<?php echo $siteurl .'admin/upload/product/'. $image_name; ?>);"></div>

									<?php



									} else {

										echo "<div class='error'>Image not Added</div>";
									}
									?>
									<div class="desc pl-3">
										<div class="d-flex text align-items-center">
											<h3><span><?php echo $title; ?></span></h3>
											<span class="price"><?php echo '₱' . $price; ?></span>
										</div>
										<div class="d-block">
											<p><?php echo $description; ?></p>
										</div>
									</div>
								</div>
						<?php
							}
						} else {

							echo "<div class'error'>Food not available</div>";
						}
						?>
					</div>
			<?php
				}
			} else {
			}

			?>

		</div>
	</div>
</section>



<?php
include_once "static/product-list.php"
?>

<?php
include_once "static/footer.php"
?>