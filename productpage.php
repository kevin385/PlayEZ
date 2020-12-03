<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
?>

<!DOCTYPE html>
<html>
<head>
	<title>PlayEZ</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<link rel="stylesheet" type="text/css" href="css/styles.css">
</head>

<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
		<div class="container">
			<a class="navbar-brand" href="./index.php">PlayEZ</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item">
						<a class="nav-link" href="./index.php">Home <span class="sr-only">(current)</span></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="./aboutus.php">About Us</a>
					</li>
					<li class="nav-item">
						<a class="nav-link active" href="./catalog.php">Catalog</a>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Consoles
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="./productpage.php?id=1037">PlayStation 5</a>
							<a class="dropdown-item" href="./productpage.php?id=1038">Xbox Series X</a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="./productpage.php?id=1003">Playstation 4</a>
							<a class="dropdown-item" href="./productpage.php?id=1039">Xbox One</a>
							<a class="dropdown-item" href="./productpage.php?id=1041">Nintendo Switch</a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="./productpage.php?id=1002">Playstation 3</a>
							<a class="dropdown-item" href="./productpage.php?id=1000">Xbox 360</a>
							<a class="dropdown-item" href="./productpage.php?id=1043">Nintendo Wii</a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="./productpage.php?id=1042">Playstation 2</a>
							<a class="dropdown-item" href="./productpage.php?id=1001">Playstation</a>
							<a class="dropdown-item" href="./productpage.php?id=1040">Xbox</a>
						</div>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Accessories
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="#">PlayStation Accessories</a>
							<a class="dropdown-item" href="#">Xbox Accessories</a>
							<a class="dropdown-item" href="#">Nintendo Accessories</a>
						</div>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="./contactus.php">Contact Us <span class="sr-only">(current)</span></a>
					</li>
				</ul>
<?php
if (isset($_SESSION['login_user'])) {
?>
				<ul class="navbar-nav navbar-right">
					<li><a href="#"><span class="fa fa-user"></span> Welcome <?php echo $_SESSION['login_user']; ?>  </a></li>
					<li><a href="cart.php"><span class="fa fa-shopping-cart"></span> Cart
							(<?php
								if(isset($_SESSION["cart"])){
									$count = count($_SESSION["cart"]); 
									echo "$count"; 
								}
								else
									echo "0";
								?>)
					</a></li>
					<li><a href="logout_u.php"><span class="fa fa-log-out"></span> Log Out </a></li>
					</ul>
<?php        
}
else {
?>
				<a href="./customerlogin.php">
					<span class="fa fa-sign-in"></span>Login
				</a>
<?php
}
?>
			</div>
		</div>
	</nav>

<?php
	$pid = $_GET["id"];
	require 'connection.php';
	$conn = Connect();
	$sql = "SELECT * FROM product where Product_id = '$pid'";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);
	$category = $row["description"];
	$price = $row["price"];
	$img = $row["imgpath"];
	if($category == "console"){
		$sql1 = "SELECT * FROM $category where console_id = '$pid'";
		$result1 = mysqli_query($conn, $sql1);
		$row1 = mysqli_fetch_assoc($result1);
		$product_name = $row1["drive_type"];
		$description = $row1["details"];
		$size = $row1["size"];
	}
	else if($category == "accessories"){
		$sql1 = "SELECT * FROM $category where accessory_id = '$pid'";
		$result1 = mysqli_query($conn, $sql1);
		$row1 = mysqli_fetch_assoc($result1);
		$product_name = $row1["accessory_name"];
		$description = $row1["details"];
	}
	else{
		$sql1 = "SELECT * FROM $category where Games_id = '$pid'";
		$result1 = mysqli_query($conn, $sql1);
		$row1 = mysqli_fetch_assoc($result1);
		$product_name = $row1["games_name"];
		$description = $row1["details"];
	}
	
?>
	<br><br>
	<div class="container">
		<div class="card bg-dark">
		<div class="card-body">
		<div class="row">
			<div class="col-sm-6">
				<div class="col-12 mb-0">
					<figure class="view overlay rounded z-depth-1 main-img">
						<img src="<?php echo $img;?>" class="img-fluid z-depth-1">
					</figure>
				</div>
			</div>
			<div class="col-md-6">
			<h5><?php echo $product_name; ?></h5>
			<p class="mb-2 text-muted text-uppercase small"><?php echo $category;?></p>
			<p><span class="mr-1"><strong>&#8377; <?php echo $price; ?></strong></span></p>
			<p class="pt-1"><?php echo $description; ?></p>
			<div class="table-responsive">
			<!-- <table class="table table-sm table-borderless mb-0">
				<tbody>
					<tr>
						<th class="pl-0 w-25" scope="row"><strong>Model</strong></th>
						<td>Shirt 5407X</td>
					</tr>
					<tr>
						<th class="pl-0 w-25" scope="row"><strong>Color</strong></th>
						<td>Black</td>
					</tr>
					<tr>
						<th class="pl-0 w-25" scope="row"><strong>Delivery</strong></th>
						<td>USA, Europe</td>
					</tr>
				</tbody>
			</table> -->
			</div>
			<hr>
	<!-- <div class="table-responsive mb-2">
		<table class="table table-sm table-borderless">
			<tbody>
				<tr>
					<td class="pl-0 pb-0 w-25">Quantity</td>
				</tr>
				<tr>
					<td class="pl-0">
						<div class="def-number-input number-input safari_only mb-0">
							<button onclick="this.parentNode.querySelector('input[type=number]').stepDown()"
							class="minus"></button>
							<input class="quantity" min="0" name="quantity" value="1" type="number">
							<button onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
							class="plus"></button>
						</div>
					</td>
					
				</tr>
			</tbody>
		</table>
	</div> -->
			<form method="post" action="cart.php?action=add&id= <?php echo $row['Product_id']; ?>">
				<button type="submit" name="add" style="margin-top:5px;" class="btn btn-light btn-md mr-1 mb-2" value="Add to Cart" method="post"><i class="fas fa-shopping-cart pr-2"></i>Add to Cart</button>
			</form>
			</div>
		</div>
		</div>
		</div>
	</div>

	<br><br>

	<footer class="footer bg-dark">
		<div class="container">
			<div class="row">             
				<div class="col-4 offset-1 col-sm-2">
					<h5>Links</h5>
					<ul class="list-unstyled">
						<li><a href="./index.php">Home</a></li>
						<li><a href="./aboutus.php">About</a></li>
						<li><a href="./catalog.php">Catalog</a></li>
						<li><a href="./contactus.php">Contact</a></li>
						<li><a href="./management/index.php">Management</a></li>
					</ul>
				</div>
				<div class="col-7 col-sm-5">
					<h5>Our Address</h5>
					<address>
						625 2nd Street, <br>
						4th Floor, MG Road, <br>
						Bangalore, India<br>
						<i class="fa fa-phone fa-lg"></i> : +91 98765 56789<br>
						<i class="fa fa-fax fa-lg"></i> : +91 87654 43210<br>
						<i class="fa fa-envelope fa-lg"></i> : <a href="mailto:pogchamp@playez.net">pogchamp@playez.net</a>
					</address>
				</div>
				<div class="col-12 col-sm-4 align-self-center">
					<div class="text-center">
						<a class="btn btn-social-icon btn-google" href="http://google.com/"><i class="fab fa-google fa-lg"></i></a>
						<a class="btn btn-social-icon btn-facebook" href="http://www.facebook.com/profile.php?id="><i class="fab fa-facebook fa-lg"></i></a>
						<a class="btn btn-social-icon btn-linkedin" href="http://www.linkedin.com/in/"><i class="fab fa-linkedin fa-lg"></i></a>
						<a class="btn btn-social-icon btn-twitter" href="http://twitter.com/"><i class="fab fa-twitter fa-lg"></i></a>
						<a class="btn btn-social-icon btn-google" href="http://youtube.com/"><i class="fab fa-youtube fa-lg"></i></a>
					</div>
				</div>
			</div>
			<div class="row justify-content-center">             
				<div class="col-auto">
					<p>© Copyright 2020 PlayEZ</p>
				</div>
			</div>
		</div>
	</footer>


	<script src="js/jquery.slim.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/scripts.js"></script>
</body>
</html>