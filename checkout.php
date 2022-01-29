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
					<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Checout</span></p>
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

							$row = mysqli_fetch_assoc($res);

							$id = $row['id'];
							$product = $row['food'];
							$product_img = $row['food_img'];
							$price = $row['price'];
							$qty = $row['qty'];
							$size = $row['size'];
							$order_date = $row['order_date'];
							$status = $row['status'];
							$total = $qty * $price;


							?>
							<tr class="text-center">
								<td class="product-remove"><a href="#"><span class="icon-close"></span></a></td>

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

								<td class="price"><?php echo $price; ?></td>

								<td class="quantity">
									<div class="price">
										<h3><?php echo $qty; ?></h3>
									</div>
								</td>

								<td class="total"><?php echo $total; ?></td>
							</tr>
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
								<label for="firstname">Firt Name</label>
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
												<input type="hidden" name="total" value="<?php echo $sum?>"> 
												<input type="hidden" name="temp_id" value="<?php echo $temp_id?>"> 
												<input type="hidden" name="id" value="<?php echo $id?>"> 
												<input type="hidden" name="product" value="<?php echo $product?>"> 
												<input type="hidden" name="price" value="<?php echo $price?>"> 
												<input type="hidden" name="qty" value="<?php echo $qty?>">
												<input type="hidden" name="size" value="<?php echo $size?>">  
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
					<div class="block-21 mb-4 d-flex">
						<a class="blog-img mr-4" style="background-image: url(images/image_1.jpg);"></a>
						<div class="text">
							<h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about the blind texts</a></h3>
							<div class="meta">
								<div><a href="#"><span class="icon-calendar"></span> July 12, 2018</a></div>
								<div><a href="#"><span class="icon-person"></span> Admin</a></div>
								<div><a href="#"><span class="icon-chat"></span> 19</a></div>
							</div>
						</div>
					</div>
					<div class="block-21 mb-4 d-flex">
						<a class="blog-img mr-4" style="background-image: url(images/image_2.jpg);"></a>
						<div class="text">
							<h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about the blind texts</a></h3>
							<div class="meta">
								<div><a href="#"><span class="icon-calendar"></span> July 12, 2018</a></div>
								<div><a href="#"><span class="icon-person"></span> Admin</a></div>
								<div><a href="#"><span class="icon-chat"></span> 19</a></div>
							</div>
						</div>
					</div>
					<div class="block-21 mb-4 d-flex">
						<a class="blog-img mr-4" style="background-image: url(images/image_3.jpg);"></a>
						<div class="text">
							<h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about the blind texts</a></h3>
							<div class="meta">
								<div><a href="#"><span class="icon-calendar"></span> July 12, 2018</a></div>
								<div><a href="#"><span class="icon-person"></span> Admin</a></div>
								<div><a href="#"><span class="icon-chat"></span> 19</a></div>
							</div>
						</div>
					</div>
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

				<div class="sidebar-box ftco-animate">
					<h3>Paragraph</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque, autem necessitatibus voluptate quod mollitia delectus aut, sunt placeat nam vero culpa sapiente consectetur similique, inventore eos fugit cupiditate numquam!</p>
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