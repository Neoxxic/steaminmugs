<?php
include_once "static/header.php"
?>

<section class="home-slider owl-carousel">

	<div class="slider-item" style="background-image: url(images/bg_3.jpg);" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="container">
			<div class="row slider-text justify-content-center align-items-center">

				<div class="col-md-7 col-sm-12 text-center ftco-animate">
					<h1 class="mb-3 mt-5 bread">Product Detail</h1>
					<p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span>Product Detail</span></p>
				</div>

			</div>
		</div>
	</div>
</section>

<section class="ftco-section">
	<div class="container">
		<div class="row">
			<?php
			if (isset($_GET['product_id'])) {

				$id = $_GET['product_id'];
				$sql = "SELECT * FROM tbl_food WHERE id=$id";
				$res = mysqli_query($conn, $sql);
				$count = mysqli_num_rows($res);

				if ($count == 1) {
					$row = mysqli_fetch_assoc($res);
					$title = $row['title'];
					$description = $row['description'];
					$price = $row['price'];
					$current_image = $row['image_name'];
					$current_category = $row['category_id'];
					$featured = $row['featured'];
					$active = $row['active'];
				} else {
					echo "<div class='error'>Product not Found</div>";
				}
			}

			?>
			<div class="col-lg-6 mb-5 ftco-animate">
				<?php
				if ($current_image != "") {

				?>
					<a href="<?php echo $siteurl; ?>admin/upload/product/<?php echo $current_image ?>" class="image-popup"><img src="<?php echo $siteurl; ?>admin/upload/product/<?php echo $current_image ?>" class="img-fluid" alt="Colorlib Template"></a>
				<?php


				} else {
					echo "<div class='message-error'>Image not found</div>";
				}
				?>
			</div>

			<div class="col-lg-6 product-details pl-md-5 ftco-animate">
				<form action="" method="POST">
					<h3><?php echo $title; ?></h3>
					<input type="hidden" name="id" value="<?php echo $id; ?>">
					<input type="hidden" name="food_img" value="<?php echo $current_image; ?>">
					<input type="hidden" name="product" value="<?php echo $title; ?>">
					<p id="price" data-pricevalue="<?php echo $price; ?>" class="price"><span id="priceDisplay"><?php echo $price; ?></span></p>
					<input type="hidden" name="price" value="<?php echo $price; ?>">
					<p><?php echo $description; ?></p>
					<p>On her way she met a copy. The copy warned the Little Blind Text, that where it came from it would have been rewritten a thousand times and everything that was left from its origin would be the word "and" and the Little Blind Text should turn around and return to its own, safe country. But nothing the copy said could convince her and so it didn’t take long until a few insidious Copy Writers ambushed her, made her drunk with Longe and Parole and dragged her into their agency, where they abused her for their.
					</p>
					<div class="row mt-4">
						<div class="col-md-6">
							<div class="form-group d-flex">
								<div class="select-wrap">
									<div class="icon"><span class="ion-ios-arrow-down"></span></div>
									<select name="size" id="size" class="form-control">
										<option value="Short" selected>Short</option>
										<option value="Tall">Tall</option>
										<option value="Grande">Grande</option>
										<option value="Venti">Venti</option>
									</select>
								</div>
							</div>
						</div>
						<div class="w-100"></div>
						<div class="input-group col-md-6 d-flex mb-3">
							<span class="input-group-btn mr-2">
								<button type="button" class="quantity-left-minus btn" data-type="minus" data-field="">
									<i class="icon-minus"></i>
								</button>
							</span>
							<input type="text" id="quantity" name="quantity" class="form-control input-number" value="1" min="1" max="100">
							<span class="input-group-btn ml-2">
								<button type="button" class="quantity-right-plus btn" data-type="plus" data-field="">
									<i class="icon-plus"></i>
								</button>
							</span>
						</div>
					</div>
					<p><input type="submit" name="add-to-cart" class="btn btn-primary py-3 px-5" value="Add to cart"></input></p>
					</from>
			</div>
		</div>
	</div>
</section>

<section class="ftco-section">
	<div class="container">
		<div class="row justify-content-center mb-5 pb-3">
			<div class="col-md-7 heading-section ftco-animate text-center">
				<span class="subheading">Discover</span>
				<h2 class="mb-4">Related products</h2>
				<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
			</div>
		</div>
		<div class="row">
			<?php

			$sql3 = "SELECT * FROM tbl_food WHERE category_id=$current_category";
			$res3 = mysqli_query($conn, $sql3);
			$count3 = mysqli_num_rows($res3);
			$num = 0;

			if ($count3 > 0) {

				while ($row3 = mysqli_fetch_assoc($res3)) {

					$title2 = $row3['title'];
					$description2 = $row3['description'];
					$price2 = $row3['price'];
					$current_image2 = $row3['image_name'];
					$current_category2 = $row3['category_id'];
					$featured2 = $row3['featured'];
					$active2 = $row3['active'];

					if ($featured2 == "Yes" && $active2 == "Yes") {

						if ($num == 4) {
							break;
						} else {

			?>
							<div class="col-md-3">
								<div class="menu-entry">
									<?php
									if ($current_image != "") {

									?>
										<a href="<?php echo $siteurl . 'product-single.php?product_id=' . $product_id ?>" class="img" style="background-image: url(<?php echo $siteurl; ?>admin/upload/product/<?php echo $current_image2 ?>);"></a>
									<?php


									} else {
										echo "<div class='message-error'>Image not found</div>";
									}
									?>

									<div class="text text-center pt-4">
										<h3><a href="<?php echo $siteurl . 'product-single.php?product_id=' . $product_id ?>"><?php echo $title2; ?></a></h3>
										<p><?php echo $description2; ?></p>
										<p class="price"><span><?php echo $price2; ?></span></p>
										<p><a href="<?php echo $siteurl . 'product-single.php?product_id=' . $product_id ?>" class="btn btn-primary btn-outline-primary">Add to Cart</a></p>
									</div>
								</div>
							</div>
			<?php

							$num++;
						}
					} else {

						echo "<div class='error'>No Active products</div>";
					}
				}
			} else {
			}

			?>

		</div>
	</div>
</section>

<?php
include_once "static/footer.php"
?>

<script>
	$(document).ready(function() {

		var quantity = 0;
		$('.quantity-right-plus').click(function(e) {

			// Stop acting like a button
			e.preventDefault();
			// Get the field name
			var quantity = parseInt($('#quantity').val());

			// If is not undefined

			$('#quantity').val(quantity + 1);


			// Increment

		});

		$('.quantity-left-minus').click(function(e) {
			// Stop acting like a button
			e.preventDefault();
			// Get the field name
			var quantity = parseInt($('#quantity').val());

			// If is not undefined

			// Increment
			if (quantity > 0) {
				$('#quantity').val(quantity - 1);
			}
		});

	});

	var tall = 10
	var grande = 15
	var venti = 20
	var price = $('#price').data("pricevalue");
	var basePrice = parseInt(price);

	var sizeData = {
		Short: basePrice,
		Tall: basePrice + tall,
		Grande: basePrice + tall + grande,
		Venti: basePrice + tall + grande + venti,
	}

	$(function() {
		$("#size").on('change', updateHandler);
		$("#quantity").on('input', updateHandler);
	});

	function updateHandler(e) {
		// accumulate the data
		var value = $("#size").val();
		var quantity = $("#quantity").val();
		var price = sizeData[value];
		var endPrice = price * quantity;

		// display the data
		$('#priceDisplay').html(price);
		$("#sizeDisplay").html(value);
		$("#totalDisplay").html(endPrice);
	}
</script>


</body>

</html>