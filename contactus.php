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
						<a class="nav-link active" href="./contactus.php">Contact Us <span class="sr-only">(current)</span></a>
					</li>
				</ul>
<?php
if (isset($_SESSION['login_user'])) {
?>
				<ul class="navbar-nav navbar-right">
					<li><a href="#"><span class="fa fa-user"></span> Welcome <?php echo $_SESSION['login_user']; ?> </a></li>
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
					<form>
						<div class="form-row">
							<div class="form-group col-sm-4">
								<label for="exampleInputEmail3">Email Address</label><input type="email" class="form-control form-control-sm mr-1" id="exampleInputEmail" placeholder="Enter email">
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-sm-4">
								<label for="exampleInputPassword3">Password</label><input type="password" class="form-control form-control-sm mr-1" id="exampleInputPassword" placeholder="Password">
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
							<button type="submit" class="btn btn-primary btn-sm ml-1">Sign in</button>        
						</div>
					</form>
				</div>
			</div>
		</div>
	</div> -->

	
	<div class="container">
        <div class="row">
            <ol class="col-12 breadcrumb">
                <li class="breadcrumb-item"><a href="./index.php">Home</a></li>
                <li class="breadcrumb-item active">Contact Us</li>
            </ol>
            <div class="col-12">
               <h3>Contact Us</h3>
               <hr>
            </div>
        </div>

        <div class="row row-content">
           <div class="col-12">
              <h3>Location Information</h3>
           </div>
            <div class="col-12 col-sm-4 offset-sm-1">
                   	<h5>Our Address</h5>
                    <address style="font-size: 100%">
						625 2nd Street, <br>
						4th Floor, MG Road, <br>
						Bangalore, India<br>
						<i class="fa fa-phone fa-lg"></i> : +91 98765 56789<br>
						<i class="fa fa-fax fa-lg"></i> : +91 87654 43210<br>
						<i class="fa fa-envelope fa-lg"></i> : <a href="mailto:pogchamp@playez.net">pogchamp@playez.net</a>
					</address>
            </div>
            <div class="col-12 col-sm-11 offset-sm-1">
                <div class="btn-group" role="group">
                    <a role="
                    button" class="btn btn-primary" href="tel: +919876556789"><i class="fa fa-phone"></i> Call</a>
                     <a role="
                    button" class="btn btn-info" href="https://www.skype.com/en/"><i class="fab fa-skype"></i> Skype</a>
                     <a role="
                    button" class="btn btn-success" href="mailto:confusion@food.net"><i class="fa fa-envelope"></i> Email</a>
                </div>
            </div>
        </div>

        <div class="row row-content">
           <div class="col-12">
              <h3>Send us your Feedback</h3>
           </div>
            <div class="col-12 col-md-9">
                <form>
                    <div class="form-group row">
                        <label for="firstname" class="col-md-2 col-form-label">First Name</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="firstname" name="firstname" placeholder="First Name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="lastname" class="col-md-2 col-form-label">Last Name</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Last Name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="telnum" class="col-md-2 col-form-label">Contact Tel.</label>
                        <div class="col-5 col-md-3">
                            <input type="tel" class="form-control" id="areacode" name="areacode" placeholder="Area Code">
                        </div>
                        <div class="col-7 col-md-7">
                            <input type="tel" class="form-control" id="telnum" name="telnum" placeholder="Tel. Number">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="emailid" class="col-md-2 col-form-label">Email</label>
                        <div class="col-md-10">
                            <input type="email" class="form-control" id="emailid" name="emailid" placeholder="Email">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6 offset-md-2">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="approve" id="approve" value="">
                                <label class="form-check-label" for="approve">
                                    <strong>May we contact you?</strong>
                                </label>
                            </div>
                        </div>
                        <div class="col-md-3 offset-md-1">
                            <select class="form-control">
                                <option>Tel.</option>
                                <option>Email</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="feedback" class="col-md-2 col-form-label">Your Feedback</label>
                        <div class="col-md-10">
                            <textarea class="form-control" id="feedback" name="feedback" rows="12"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="offset-md-2 col-md-10">
                            <button type="submit" class="btn btn-primary">Send Feedback</button>
                        </div>
                    </div>
                </form>
            </div>
             <div class="col-12 col-md">
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