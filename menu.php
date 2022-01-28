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
					<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Menu</span></p>
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



<section class="ftco-menu mb-5 pb-5">
	<div class="container">
		<div class="row justify-content-center mb-5">
			<div class="col-md-7 heading-section text-center ftco-animate">
				<span class="subheading">Discover</span>
				<h2 class="mb-4">Our Products</h2>
				<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
			</div>
		</div>
		<div class="row d-md-flex">
			<div class="col-lg-12 ftco-animate p-md-5">
				<div class="row">
					<div class="col-md-12 nav-link-wrap mb-5">
						<div class="nav ftco-animate nav-pills justify-content-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
							<?php
							$sql3 = "SELECT * FROM tbl_categories";
							$res3 = mysqli_query($conn, $sql3);
							$count3 = mysqli_num_rows($res3);

							if ($count3 > 0) {

								while ($row3 = mysqli_fetch_assoc($res3)) {

									$category_id2 = $row3['id'];
									$category_title2 = $row3['title'];
							?>
									<a class="nav-link" id="v-pills-<?php echo $category_id2; ?>-tab" data-toggle="pill" href="#v-pills-<?php echo $category_id2; ?>" role="tab" aria-controls="v-pills-1" aria-selected="true"><?php echo $category_title2 ?></a>
							<?php
								}
							} else {

								echo "<div class'error'>Food not available</div>";
							}

							?>

						</div>
					</div>
					<div class="col-md-12 d-flex align-items-center">

						<div class="tab-content ftco-animate" id="v-pills-tabContent">
							<?php
							$sql4 = "SELECT * FROM tbl_categories";
							$res4 = mysqli_query($conn, $sql4);
							$count4 = mysqli_num_rows($res4);

							if ($count4 > 0) {

								while ($row4 = mysqli_fetch_assoc($res4)) {

									$category_id3 = $row4['id'];

							?>

									<div class="tab-pane fade show active" id="v-pills-<?php echo $category_id3; ?>" role="tabpanel" aria-labelledby="v-pills-<?php echo $category_id3; ?>-tab">
										<div class="row">

											<?php

											$sql5 = "SELECT * FROM tbl_food WHERE category_id=$category_id3";
											$res5 = mysqli_query($conn, $sql5);
											$count5 = mysqli_num_rows($res5);

											if ($count5 > 0) {

												while ($row5 = mysqli_fetch_assoc($res5)) {

													$title2 = $row5['title'];
													$price2 = $row5['price'];
													$description2 = $row5['description'];
													$image_name2 = $row5['image_name'];
											?>
													<div class="col-md-4 text-center">
														<div class="menu-wrap">
															<?php 
																if($image_name2 == ""){

																	echo "<div class'error'>Image not available</div>";

																} else {
																	?>
																	<a href="#" class="menu-img img mb-4" style="background-image: url(<?php echo $siteurl .'admin/upload/product/'.$image_name2; ?>);"></a>
																	<?php
																}
															?>
															
															<div class="text">
																<h3><a href="#"><?php echo $title2; ?></a></h3>
																<p><?php echo $description2;?></p>
																<p class="price"><span><?php echo $price2;?></span></p>
																<p><a href="#" class="btn btn-primary btn-outline-primary">Add to cart</a></p>
															</div>
														</div>
													</div>
											<?php
												}
											} else {

												echo "<div class'error'>Category not available</div>";
											}
											?>

										</div>
									</div>

							<?php
								}
							} else {

								echo "<div class'error'>Category not available</div>";
							}

							?>

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