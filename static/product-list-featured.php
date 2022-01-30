<section class="ftco-menu mb-5 pb-5">
	<div class="container">
		<div class="row justify-content-center mb-5">
			<div class="col-md-7 heading-section text-center ftco-animate">
				<span class="subheading">Discover</span>
				<h2 class="mb-4">Our Products</h2>
				<p>At steamin’ mugs, we care for each customer just as we care for each bean. We want to make sure you have the best coffee drinking experience, whether it’s to start your morning, a little afternoon pick-me-up, or to wrap up the day.</p>
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
							$num = 0;
							$select1 = 'true';
							$select2 = 'false';
							if ($count3 > 0) {

								while ($row3 = mysqli_fetch_assoc($res3)) {


									$category_id2 = $row3['id'];
									$category_title2 = $row3['title'];
									$featured = $row3['featured'];
									$active = $row3['active'];

									if ($featured == "Yes" && $active == "Yes") {

							?>
										<a class="nav-link 
											<?php
											if ($num == 0) {

											?>
												active" id="v-pills-<?php echo $category_id2; ?>-tab" data-toggle="pill" href="#v-pills-<?php echo $category_id2; ?>" role="tab" aria-controls="v-pills-<?php echo $category_id2; ?>" aria-selected="<?php echo $select1; ?>"><?php echo $category_title2 ?></a>

									<?php
												$category_selected = $category_id2;
											} else {

									?>
										" id="v-pills-<?php echo $category_id2; ?>-tab" data-toggle="pill" href="#v-pills-<?php echo $category_id2; ?>" role="tab" aria-controls="v-pills-<?php echo $category_id2; ?>" aria-selected="<?php echo $select2; ?>"><?php echo $category_title2 ?></a>
								<?php

											}
											$num++;
										}

								?>
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
									<div class="tab-pane fade show
									<?php
									if ($category_id3 == $category_selected) {
									?>
											active" id="v-pills-<?php echo $category_id3; ?>" role="tabpanel" aria-labelledby="v-pills-<?php echo $category_id3; ?>-tab">
									<?php
									} else {
									?>
										" id="v-pills-<?php echo $category_id3; ?>" role="tabpanel" aria-labelledby="v-pills-<?php echo $category_id3; ?>-tab">
									<?php

									}

									?>
									<div class="row">

										<?php

										$sql5 = "SELECT * FROM tbl_food WHERE category_id=$category_id3";
										$res5 = mysqli_query($conn, $sql5);
										$count5 = mysqli_num_rows($res5);
										$num = 0;

										if ($count5 > 0) {

											while ($row5 = mysqli_fetch_assoc($res5)) {
												$product_id = $row5['id'];
												$title2 = $row5['title'];
												$price2 = $row5['price'];
												$description2 = $row5['description'];
												$image_name2 = $row5['image_name'];
												$featured = $row5['featured'];
												$active = $row5['active'];

												if ($featured == "Yes" && $active == "Yes") {
													if ($num == 3) {
														break;
													} else {

										?>
														<div class="col-md-4 text-center">
															<div class="menu-wrap">
																<?php
																if ($image_name2 == "") {

																	echo "<div class'error'>Image not available</div>";
																} else {
																?>
																	<a href="<?php echo $siteurl . 'product-single.php?product_id=' . $product_id ?>" class="menu-img img mb-4" style="background-image: url(<?php echo $siteurl . 'admin/upload/product/' . $image_name2; ?>);"></a>
																<?php
																}
																?>

																<div class="text">
																	<h3><a href="<?php echo $siteurl . 'product-single.php?product_id=' . $product_id ?>"><?php echo $title2; ?></a></h3>
																	<p><?php echo $description2; ?></p>
																	<p class="price"><span><?php echo $price2; ?></span></p>
																	<p><a href="<?php echo $siteurl . 'product-single.php?product_id=' . $product_id ?>" class="btn btn-primary btn-outline-primary">Add to cart</a></p>
																</div>
															</div>
														</div>
										<?php

														$num++;
													}
												}
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