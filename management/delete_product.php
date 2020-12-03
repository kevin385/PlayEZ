<?php # delete_product.php

// This page deletes a product
// This page is accessed through view_products.php.

$page_title = 'Delete a product';

// Check for a valid product ID, through GET or POST.
if ( (isset($_GET['id'])) && (is_numeric($_GET['id'])) ) { // Accessed through view_products.php
	$id = $_GET['id'];
} elseif ( (isset($_POST['id'])) && (is_numeric($_POST['id'])) ) { // Form has been submitted.
	$id = $_POST['id'];
} else { // No valid ID, kill the script.
	echo '<h1 id="mainhead">Page Error</h1>
	<p class="error">This page has been accessed in error.</p><p><br /><br /></p>';
	include ('./includes/footer.html'); 
	exit();
}

include ('mysqli_connect.php'); // Connect to the db.

// Check if the form has been submitted.
if (isset($_POST['submitted'])) {

	if ($_POST['sure'] == 'Yes') { // Delete them.

		// Make the query.
	   $query = "SELECT Product_id, description, pro_name,price FROM Product WHERE Product_id=$id";		
	   $result = @mysqli_query ($dbc, $query); // Run the query.
	
	   if (mysqli_num_rows($result) == 1) { // Valid product ID, show the result.

		// Get the product information.
		$row = @mysqli_fetch_array ($result, MYSQL_NUM);	
		
		$query_del = "DELETE FROM Product WHERE Product_id=$id";		
		$result_del = @mysqli_query ($dbc, $query_del); // Run the query.

		if (mysqli_affected_rows($dbc) == 1) { // If it ran OK.


		// Get the product information.
		$row_del = @mysqli_fetch_array ($result_del, MYSQL_NUM);
		//$row_del returns NULL
		// Product information is in $row
		// Create the result page.
		echo '<h1 id="mainhead">Delete a Product</h1>
		<p>The product <b>'.$row[2].'</b> with product id <b>'.$row[0].'</b> with price <b>'.$row[3].' </b> which is categorized under <b>'.$row[1].'</b> has been deleted.</p><p><br /><br /></p>';	
	} else { // Did not run OK.
			echo '<h1 id="mainhead">System Error</h1>
			<p class="error">The product could not be deleted due to a system error.</p>'; // Public message.
			echo '<p>' . mysqli_error($dbc) . '<br /><br />Query: ' .
			$query_del . '</p>'; // Debugging message.
	}


	}
		

		
	 else { // Not a valid movie ID.
					echo '<h1 id="mainhead">Page Error</h1>
		<p class="error">This page has been accessed in error.</p><p><br /><br /></p>';
		} //End of else.
	
	} // End of $_POST['sure'] == 'Yes' if().
	else { // Wasn't sure about deleting the product.
		echo '<h1 id="mainhead">Delete a Product</h1>';

	$query = "SELECT * FROM Product WHERE Product_id=$id";		
	$result = @mysqli_query ($dbc, $query); // Run the query.
	
	if (mysqli_num_rows($result) == 1) { // Valid product ID, show the result.

		// Get the product information.
		$row = mysqli_fetch_array ($result, MYSQL_NUM);
		
		// Create the result page.
  echo'
		<p>The product <b>'.$row[2].'</b> with description as  <b>'.$row[1].'</b> has NOT been deleted.</p><p><br /><br /></p>';	
	} else { // Not a valid product ID.
		echo '<h1 id="mainhead">Page Error</h1>
		<p class="error">This page has been accessed in error.</p><p><br /><br /></p>';
	}


} // End of wasn’t sure else().

} // End of main submit conditional.

else { // Show the form.

	// Retrieve the product's information.
	$query = "SELECT * FROM Product WHERE Product_id=$id";		
	$result = @mysqli_query ($dbc, $query); // Run the query.
	
	if (mysqli_num_rows($result) == 1) { // Valid product ID, show the form.

		// Get the product information.
		$row = @mysqli_fetch_array ($result, MYSQL_NUM);
		
		// Draw the form.
		echo '<h2>Delete a Product</h2>
	<form action="delete_product.php" method="post">
	<h3>Name: ' . $row[2] . '</h3>
	<h3>Description: ' . $row[1] .'</h3>
	<h3>Price: ' . $row[3] . '</h3>

	<p>Are you sure you want to delete this product?<br />
	<input type="radio" name="sure" value="Yes" /> Yes 
	<input type="radio" name="sure" value="No" checked="checked" /> No</p>
	<p><input type="submit" name="submit" value="Submit" /></p>
	<input type="hidden" name="submitted" value="TRUE" />
	<input type="hidden" name="id" value="' . $id . '" />
	</form>';
	
	} //End of valid product ID if().
	else { // Not a valid product ID.
		echo '<h1 id="mainhead">Page Error</h1>
		<p class="error">This page has been accessed in error.</p><p><br /><br /></p>';
	}

} // End of the main Submit conditional.

@mysqli_close($dbc); // Close the database connection.

?>