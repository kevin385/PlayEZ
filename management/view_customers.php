<?php # view_customers.php

$page_title = 'View Customers';

// Page header.
echo '<h1 id="mainhead" align="center">Customers of the Game Store:</h1>';

include ('mysqli_connect.php');

// Number of records to show per page:
$display = 5;

// Determine how many pages there are. 
if (isset($_GET['np'])) { // Already been determined.
	$num_pages = $_GET['np'];
} else { // Need to determine.

 	// Count the number of records
	$query = "SELECT COUNT(*) FROM customer ORDER BY customer_id ASC";
	$result = @mysqli_query ($dbc, $query);
	$row = @mysqli_fetch_array ($result);
	if($row){
		$num_records = $row[0];
	}
	else{
		$num_records = NULL;
	}
	
	
	// Calculate the number of pages.
	if ($num_records > $display) { // More than 1 page.
		$num_pages = ceil ($num_records/$display);
	} else {
		$num_pages = 1;
	}

} // End of np IF.


// Determine where in the database to start returning results.
if (isset($_GET['s'])) {
	$start = $_GET['s'];
} else {
	$start = 0;
}

// Default column links.
$link1 = "{$_SERVER['PHP_SELF']}?sort=cid_d";
$link2 = "{$_SERVER['PHP_SELF']}?sort=cn_a";
// Determine the sorting order.
if (isset($_GET['sort'])) {

	// Use existing sorting order.
	switch ($_GET['sort']) {
		case 'cid_a':
			$order_by = 'customer_id ASC';
			$link1 = "{$_SERVER['PHP_SELF']}?sort=cid_d";
			break;
		case 'cid_d':
			$order_by = 'customer_id DESC';
			$link1 = "{$_SERVER['PHP_SELF']}?sort=cid_a";
			break;
		case 'cn_a':
			$order_by = 'customer_name ASC';
			$link2 = "{$_SERVER['PHP_SELF']}?sort=cn_d";
			break;
		case 'cn_d':
			$order_by = 'customer_name DESC';
			$link2 = "{$_SERVER['PHP_SELF']}?sort=cn_a";
			break;
		
		default:
			$order_by = 'customer_id ASC';
			break;
	}
	
	// $sort will be appended to the pagination links.
	$sort = $_GET['sort'];
	
} else { // Use the default sorting order.
	$order_by = 'customer_id ASC';
	$sort = 'cid_a';
}

// Make the query.
$query = "SELECT * FROM customer
ORDER BY $order_by LIMIT $start, $display";		
$result = @mysqli_query ($dbc, $query); // Run the query.
//echo $result;
// Table header.
echo "<p align='center'><b>Ordered by $order_by </b></p>";
echo '<table align="center" cellspacing="0" cellpadding="5">
<tr>
	<td align="left"><b>Edit</b></td>
	<td align="left"><b>Delete</b></td>
	<td align="left"><b><a href="' . $link1 . '">Customer ID </a></b></td>
	<td align="left"><b><a href="' . $link2 . '">Name</a></b></td>
	<td align="left"><b>Phone</b></td>
	<td align="left"><b>Address</b></td>	
</tr>
';


// Fetch and print all the records.
$bg = '#eeeeee'; // Set the background color.
while ($row = @mysqli_fetch_array($result)) {
	$bg = ($bg=='#eeeeee' ? '#ffffff' : '#eeeeee'); // Switch the background color.
	
	echo '<tr bgcolor="' . $bg . '">
		<td align="left"><a href="edit_customer.php?id=' . $row['customer_id'] . '">Edit</a></td>
		<td align="left"><a href="delete_customer.php?id=' . $row['customer_id'] . '">Delete</a></td>
		<td align="left">' . $row['customer_id'] . '</td>
		<td align="left">' . $row['customer_name'] .'</td>
		<td align="left">' . $row['customer_phone'] . '</td>
		<td align="left">' . $row['address'] . '</td>
		<td align="left"><a href="view_cust_orders.php?id=' . $row['customer_id'] . '">View Orders</a></td>
	</tr>
	';
}

echo '</table>';

@mysqli_free_result ($result); // Free up the resources.	

@mysqli_close($dbc); // Close the database connection.

// Make the links to other pages, if necessary.
if ($num_pages > 1) {
	
	echo '<br /><p align="center">';
	// Determine what page the script is on.	
	$current_page = ($start/$display) + 1;
	
	// If it's not the first page, make a First button and a Previous button.
	if ($current_page != 1) {
		echo '<a href="view_customers.php?s=0&np=' . $num_pages . '&sort=' . $sort .'">First</a> ';
		echo '<a href="view_customers.php?s=' . ($start - $display) . '&np=' . $num_pages . '&sort=' . $sort .'">Previous</a> ';
	}
	
	// Make all the numbered pages.
	for ($i = 1; $i <= $num_pages; $i++) {
		if ($i != $current_page) {
			echo '<a href="view_customers.php?s=' . (($display * ($i - 1))) . '&np=' . $num_pages . '&sort=' . $sort .'">' . $i . '</a> ';
		} else {
			echo $i . ' ';
		}
	}
	
	// If it's not the last page, make a Last button and a Next button.
	if ($current_page != $num_pages) {
		echo '<a href="view_customers.php?s=' . ($start + $display) . '&np=' . $num_pages . '&sort=' . $sort .'">Next</a> ';
		echo '<a href="view_customers.php?s=' . (($num_pages-1) * $display) . '&np=' . $num_pages . '&sort=' . $sort .'">Last</a>';

	}
	
	echo '</p>';
echo "<p align='center'><a href='cust_product.php'>View Customers with the Products they Ordered</p>";	
} // End of links section.

?>


