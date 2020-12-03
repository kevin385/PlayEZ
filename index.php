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
					<li class="nav-item active">
						<a class="nav-link" href="./index.php">Home <span class="sr-only">(current)</span></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="./aboutus.php">About Us</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="./catalog.php">Catalog</a>
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

	<!-- <div id="loginModal" class="modal fade" role="dialog">
		<div class="modal-dialog modal-lg" role="content">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Login </h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
					<form action="">
						<div class="form-row">
							<div class="form-group col-sm-4">
								<label for="inputEmail">Email Address</label><input type="email" class="form-control form-control-sm mr-1" id="inputEmail" name="inputEmail" placeholder="Enter email">
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-sm-4">
								<label for="inputPassword">Password</label><input type="password" class="form-control form-control-sm mr-1" id="inputPassword" name="inputPassword" placeholder="Password">
							</div>
						</div>
						<div class="form-row">
							<div class="col-sm-auto">
								<div class="form-check">
									<input class="form-check-input" type="checkbox">
									<label class="form-check-label"> Remember me
									</label>
								</div>
							</div>
						</div>
						<div class="form-row">
							<button type="button" class="btn btn-secondary btn-sm ml-auto" data-dismiss="modal">Cancel</button>
							<button type="submit" id="submit" name="submit" class="btn btn-primary btn-sm ml-1">Sign in</button>    
						</div>
					</form>
				</div>
			</div>
		</div>
	</div> -->

	<header class="jumbotron">
        <div class="container">
            <div class="row row-header">
                <div class="col-12 col-sm-6">
                    <h1>PlayEZ</h1>
                    <p>We offer a unique Gaming experience with wide range of Game consoles. Our experience & commitments combined with love for games & innovation makes us the exclusive place where the dream of all the games come true.</p>
                </div>
            </div>
        </div>
    </header>


	<div class="container">
		<div class="row row-content">
			<div class="col">
				<div id="mycarousel" class="carousel slide" data-ride="carousel">
					<div class="carousel-inner" role="listbox">
						<div class="carousel-item active">
							<a href="./productpage.php?id=1037"><img class="img-fluid"
							src="img/ps5car.png" alt="ps5car"></a>
							
						</div>
						<div class="carousel-item">
							<img class="img-fluid"
							src="img/xboxseriescar.jpg" alt="xboxseriescar">
						</div>
						<div class="carousel-item">
							<img class="img-fluid"
							src="img/spidercar.png" alt="spidercar">
						</div>
					</div>
					<ol class="carousel-indicators">
						<li data-target="#mycarousel" data-slide-to="0" class="active"></li>
						<li data-target="#mycarousel" data-slide-to="1"></li>
						<li data-target="#mycarousel" data-slide-to="2"></li>
					</ol>
					<a class="carousel-control-prev" href="#mycarousel" role="button" data-slide="prev">
						<span class="carousel-control-prev-icon"></span>
					</a>
					<a class="carousel-control-next" href="#mycarousel" role="button" data-slide="next">
						<span class="carousel-control-next-icon"></span>
					</a> 
					<button class="btn btn-danger btn-sm" id="carouselButton">
						<span class="fa fa-pause"></span>
					</button>
				</div>                   
			</div>
		</div>

		<div class="row row-content align-items-center">
            <div class="col-12 col-sm-4 order-sm-last col-md-3">
                <h3>Our Top Seller</h3>
            </div>
            <div class="col col-sm order-sm-first col-md">
                <div class="media d-flex flex-row">
                    <img class="mr-3 img-thumbnail align-self-center img-responsive" src="img/ps4slim.png" alt="ps4slim">
                    <div class="media-body">
                        <h2 class="mt-0">PlayStation 4 <span class="badge badge-danger">HOT</span></h2>
                        <p class="d-none d-sm-block">The PlayStation 4 system opens the door to an incredible journey through immersive new gaming worlds and a deeply connected gaming community. Play amazing top-tier blockbusters and innovative indie hits on PS4.</p>
                    </div>
                </div>
            </div>
        </div>


        <div class="row row-content align-items-center">
            <div class="col-12 col-sm-4 col-md-3 order-sm-first">
                <h3>Newest Arrivals</h3>
            </div>
            <div class="col col-sm col-md order-sm-last">
                <div class="media d-flex flex-row-reverse">
                    <img class="img-thumbnail align-self-center" src="img/xboxseriess.png" alt="xboxseriess">
                    <div class="media-body mr-3">
                        <h2 class="mt-0">Xbox Series S <span class="badge badge-danger">NEW</span></h2>
                        <p class="d-none d-sm-block">Introducing the Xbox series S, the smallest, sleekest Xbox console ever. Experience the speed and performance of a next-gen all-digital console at an accessible price point.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row row-content align-items-center">
            <div class="col-12 col-sm-4 order-sm-last col-md-3">
                <h2><center>GOTY</center></h2>
            </div>
            <div class="col col-sm order-sm-first col-md">
                <div class="media">
                    <img class="d-flex mr-3 img-thumbnail align-self-center"  src="img/cyberpunk.png" alt="cyberpunk">
                    <div>
                        <h2 class="mt-0">Cyberpunk 2077</h2>
                        <p class="d-none d-sm-block">Cyberpunk 2077 is an open-world, action-adventure story set in Night City, a megalopolis obsessed with power, glamour and body modification. You play as V, a mercenary outlaw going after a one-of-a-kind implant that is the key to immortality.
						Set in 2077, the game is set in an intriguing dystopian place called night city in California; It is an open-world game and is based on the idea of edge runners serving society in different ways. </p>
                    </div>
                </div>
            </div>
        </div>
	</div>




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