<?php
include_once "static/header.php"
?>

<section class="home-slider owl-carousel">

	<div class="slider-item" style="background-image: url(images/bg_3.jpg);" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="container">
			<div class="row slider-text justify-content-center align-items-center">
				<div class="col-md-7 col-sm-12 text-center ftco-animate">
					<h1 class="mb-3 mt-5 bread">Checkout</h1>
					<p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span>Checkout</span></p>
				</div>

			</div>
		</div>
	</div>
</section>

<section class="ftco-section">
	<div class="container">
		<div class="row">
			<div class="col-md-12 ftco-animate">
				<div class="cart-list">
					<table class="table">
						<thead class="thead-primary">
							<tr class="text-center">
								<th>&nbsp;</th>
								<th>&nbsp;</th>
								<th>Product</th>
								<th>Size</th>
								<th>Price</th>
								<th>Quantity</th>
								<th>Total</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$temp_id = $_GET['order_temp_id'];
							$sql = "SELECT * FROM tbl_order WHERE temp_id=$temp_id";
							$res = mysqli_query($conn, $sql);
							$count = mysqli_num_rows($res);

							if ($count > 0) {
								while ($row = mysqli_fetch_assoc($res)) {

									$id = $row['id'];
									$product = $row['food'];
									$product_img = $row['food_img'];
									$price = $row['price'];
									$qty = $row['qty'];
									$size = $row['size'];

									if ($size == "Short") {
										$price = $price;
									} elseif ($size == "Tall") {
										$price = $price + 10;
									} elseif ($size == "Grande") {
										$price = $price + 25;
									} elseif ($size == "Venti") {
										$price = $price + 55;
									}

									$order_date = $row['order_date'];
									$status = $row['status'];
									$total = $qty * $price;

							?>

									<tr class="text-center">
										<td class="product-remove"><a href="delete-cart.php?order_temp_id=<?php echo $temp_id ?>&order_id=<?php echo $id ?>"><span class="icon-close"></span></a></td>

										<td class="image-prod">
											<?php
											if ($product_img == "") {

												echo "<div class'error'>Image not available</div>";
											} else {
											?>
												<div class="img" style="background-image:url(<?php echo $siteurl . 'admin/upload/product/' . $product_img; ?>);"></div>
											<?php
											}
											?>

										</td>

										<td class="product-name">
											<h3><?php echo $product; ?></h3>
										</td>

										<td class="price"><?php echo $size; ?></td>
										<td class="price"><?php echo $price; ?></td>

										<td class="quantity">
											<div class="price">
												<h3><?php echo $qty; ?></h3>
											</div>
										</td>

										<td class="total"><?php echo $total; ?></td>
									</tr>
							<?php


								}
							} else {
								session_destroy();
							}







							?>

						</tbody>
					</table>
				</div>
			</div>
		</div>
		<div class="row mt-5">
			<div class="col-xl-8 ftco-animate">
				<form action="#" id="billing" method="POST" class="billing-form ftco-bg-dark p-3 p-md-5">
					<h3 class="mb-4 billing-heading">Billing Details</h3>
					<div class="row align-items-end">
						<div class="col-md-6">
							<div class="form-group">
								<label for="firstname">First Name</label>
								<input name="firstname" type="text" class="form-control" placeholder="">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="lastname">Last Name</label>
								<input name="lastname" type="text" class="form-control" placeholder="">
							</div>
						</div>
						<div class="w-100"></div>
						<div class="col-md-12">
							<div class="form-group">
								<label for="country">State / Country</label>
								<div class="select-wrap">
									<div class="icon"><span class="ion-ios-arrow-down"></span></div>
									<select name="country" id="" class="form-control">
										<option value="">France</option>
										<option value="">Italy</option>
										<option value="">Philippines</option>
										<option value="">South Korea</option>
										<option value="">Hongkong</option>
										<option value="">Japan</option>
									</select>
								</div>
							</div>
						</div>
						<div class="w-100"></div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="streetaddress">Street Address</label>
								<input name="street" type="text" class="form-control" placeholder="House number and street name">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<input name="unit" type="text" class="form-control" placeholder="Appartment, suite, unit etc: (optional)">
							</div>
						</div>
						<div class="w-100"></div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="towncity">Town / City</label>
								<input name="city" type="text" class="form-control" placeholder="">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="postcodezip">Postcode / ZIP *</label>
								<input name="postal" type="text" class="form-control" placeholder="">
							</div>
						</div>
						<div class="w-100"></div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="phone">Phone</label>
								<input name="phone" type="text" class="form-control" placeholder="">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="emailaddress">Email Address</label>
								<input name="email" type="text" class="form-control" placeholder="">
							</div>
						</div>
					</div>
					<!-- END -->


					<?php

					$sql_total = "SELECT SUM(total) AS total_sum
									FROM tbl_order
									WHERE temp_id=$temp_id";
					$res2 = mysqli_query($conn, $sql_total);
					$row2 = mysqli_fetch_assoc($res2);

					$total = $row2['total_sum'];

					$delivery = 50;
					$discount = 10;

					$sum = ($total + $delivery) - $discount;

					?>

					<div class="row mt-5 pt-3 d-flex">
						<div class="col-md-6 d-flex">
							<div class="cart-detail cart-total ftco-bg-dark p-3 p-md-4">
								<h3 class="billing-heading mb-4">Cart Total</h3>
								<p class="d-flex">
									<span>Subtotal</span>
									<span><?php echo $total; ?></span>
								</p>
								<p class="d-flex">
									<span>Delivery</span>
									<span><?php echo $delivery; ?></span>
								</p>
								<p class="d-flex">
									<span>Discount</span>
									<span><?php echo $discount; ?></span>
								</p>
								<hr>
								<p class="d-flex total-price">
									<span>Total</span>
									<span><?php echo $sum; ?></span>
								</p>
							</div>
						</div>
						<div class="col-md-6">
							<div class="cart-detail ftco-bg-dark p-3 p-md-4">
								<h3 class="billing-heading mb-4">Payment Method</h3>
								<div class="form-group">
									<div class="col-md-12">
										<div class="radio">
											<label><input value="cod" type="radio" name="payment" class="mr-2" checked> Cash On Delivery </label>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="col-md-12">
										<div class="radio">
											<label><input value="bank" type="radio" name="payment" class="mr-2"> Direct Bank Tranfer</label>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="col-md-12">
										<div class="radio">
											<label><input value="gcash" type="radio" name="payment" class="mr-2"> Gcash</label>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="col-md-12">
										<div class="checkbox">
											<input type="hidden" name="total" value="<?php echo $sum ?>">
											<input type="hidden" name="temp_id" value="<?php echo $temp_id ?>">
											<input type="hidden" name="id" value="<?php echo $id ?>">
											<input type="hidden" name="product" value="<?php echo $product ?>">
											<input type="hidden" name="price" value="<?php echo $price ?>">
											<input type="hidden" name="qty" value="<?php echo $qty ?>">
											<input type="hidden" name="size" value="<?php echo $size ?>">
											<label><input type="checkbox" value="" class="mr-2"> I have read and accept the terms and conditions</label>
										</div>
									</div>
								</div>
								<p><input type="submit" value="Place Order" name="place-order" href="#" class="btn btn-primary py-3 px-4"></p>
							</div>
						</div>
					</div>
				</form>
			</div> <!-- .col-md-8 -->


			<div class="col-xl-4 sidebar ftco-animate">
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
								<div class="block-21 mb-4 d-flex">
									<?php
									if ($image_1 == "") {
										echo "<div class'error'>Image not available</div>";
									} else {
									?>
										<a class="blog-img mr-4" style="background-image: url(<?php echo $siteurl . 'admin/upload/blog/' . $image_1; ?>);"></a>
									<?php
									}
									?>

									<div class="text">
										<h3 class="heading"><a href="blog-single.php?blog_id=<?php echo $id; ?>"><?php echo $blog_title; ?></a></h3>
										<div class="meta">
											<div><a href="#"><span class="icon-calendar"></span> <?php echo date("m/d/Y", strtotime($date_posted)) ?></a></div>
											<div><a href="#"><span class="icon-person"></span> <?php echo $admin_name; ?></a></div>
											<div><a href="#"><span class="icon-chat"></span> <?php echo $count3; ?></a></div>
										</div>
									</div>
								</div>
					<?php

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


</body>

</html>