<?php # view_games.php

$page_title = 'View All Games';
// Page header.
echo '<h1 id="mainhead" align="center">All Games:</h1>';
include ('mysqli_connect.php');
// Number of records to show per page:
$display = 5;
// Determine how many pages there are. 
if (isset($_GET['np'])) { // Already been determined.
	$num_pages = $_GET['np'];
} else { // Need to determine.
 	// Count the number of records
 	$query = "SELECT COUNT(*) FROM games ORDER BY Games_id ASC";
	$result = @mysqli_query ($dbc, $query);
	$row = @mysqli_fetch_array ($result);
	$num_records = $row[0];
	// Calculate the number of pages.
	if ($num_records > $display) { // More than 1 page.
		$num_pages = ceil ($num_records/$display);	
	} else {
		$num_pages = 1;
		echo $num_pages;
	}

} // End of np IF.


// Determine where in the database to start returning results.
if (isset($_GET['s'])) {
	$start = $_GET['s'];
} else {
	$start = 0;
}

// Default column links.
$link0 = "{$_SERVER['PHP_SELF']}?sort=i_a";
$link1 = "{$_SERVER['PHP_SELF']}?sort=n_a";
$link2 = "{$_SERVER['PHP_SELF']}?sort=s_d";
$link3 = "{$_SERVER['PHP_SELF']}?sort=p_a";
$link4 = "{$_SERVER['PHP_SELF']}?sort=c_a";
$link5 = "{$_SERVER['PHP_SELF']}?sort=pr_a";
	
// Determine the sorting order.
if (isset($_GET['sort'])) {

	// Use existing sorting order.
	switch ($_GET['sort']) {
		case 'i_a':
			$order_by = 'Games_id ASC';
			$link0 = "{$_SERVER['PHP_SELF']}?sort=i_d";
			break;
		case 'i_d':
			$order_by = 'Games_id DESC';
			$link0 = "{$_SERVER['PHP_SELF']}?sort=i_a";
			break;
		case 'n_a':
			$order_by = 'games_name ASC';
			$link1 = "{$_SERVER['PHP_SELF']}?sort=n_d";
			break;
		case 'n_d':
			$order_by = 'games_name DESC';
			$link1 = "{$_SERVER['PHP_SELF']}?sort=n_a";
			break;
		case 's_a':
			$order_by = 'min_memory_size ASC';
			$link2 = "{$_SERVER['PHP_SELF']}?sort=s_d";
			break;
		case 's_d':
			$order_by = 'min_memory_size DESC';
			$link2 = "{$_SERVER['PHP_SELF']}?sort=s_a";
			break;
		case 'p_a':
			$order_by = 'max_no_players ASC';
			$link3 = "{$_SERVER['PHP_SELF']}?sort=p_d";
			break;
		case 'p_d':
			$order_by = 'max_no_players DESC';
			$link3 = "{$_SERVER['PHP_SELF']}?sort=p_a";
			break;
		case 'c_a':
			$order_by = 'drive_type ASC';
			$link4 = "{$_SERVER['PHP_SELF']}?sort=c_d";
			break;
		case 'c_d':
			$order_by = 'drive_type DESC';
			$link4 = "{$_SERVER['PHP_SELF']}?sort=c_a";
			break;
		case 'pr_a':
			$order_by = 'price ASC';
			$link5 = "{$_SERVER['PHP_SELF']}?sort=pr_d";
			break;
		case 'pr_d':
			$order_by = 'price DESC';
			$link5 = "{$_SERVER['PHP_SELF']}?sort=pr_a";
			break;
		default:
			$order_by = 'Games_id ASC';
			break;
		
	}

	// $sort will be appended to the pagination links.
	$sort = $_GET['sort'];
	
} else { // Use the default sorting order.
	$order_by = 'Games_id ASC';
	$sort = 'i_a';
}


// Table header.
echo "<p align='center'><b>Ordered by $order_by </b></p>";
echo '<table align="center" cellspacing="0" cellpadding="5">
<tr>
	<td align="left"><b>Edit</b></td>	
	<td align="left"><b><a href="' . $link0 . '">Games id</a></b></td>
	<td align="left"><b><a href="' . $link1 . '">Games Name</a></b></td>
	<td align="left"><b><a href="' . $link2 . '">Min Memory size</a></b></td>
	<td align="left"><b><a href="' . $link3 . '">Max no of Players</a></b></td>
	<td align="left"><b> Details </b></td>
	<td align="left"><a href="' . $link4 . '"><b> Console</a></b></td>
	<td align="left"><a href="' . $link5 . '"><b> Price</a></b></td>			
</tr>
';

$query = "SELECT Games_id, games_name,min_memory_size, max_no_players, games.details,console_fk, drive_type ,price FROM games, Product, console WHERE games.Games_id = Product.Product_id  AND console.console_id = games.console_fk ORDER BY $order_by LIMIT $start, $display";

$result = @mysqli_query ($dbc, $query); // Run the query.

// Fetch and print all the records.
$bg = '#eeeeee'; // Set the background color.
while ($row = @mysqli_fetch_array($result)) {
	
	$bg = ($bg=='#eeeeee' ? '#ffffff' : '#eeeeee'); // Switch the background color.
	echo '<tr bgcolor="' . $bg . '">
		<td align="left"><a href="edit_games.php?id=' . $row['Games_id'] . '">Edit</a></td>
		
		<td align="left">' . $row['Games_id'] . '</td>
		<td align="left">' . $row['games_name'] . ' </td>
		<td align="left">' . $row['min_memory_size'] . '</td>
		<td align="left">' . $row['max_no_players'] . '</td>
		<td align="left">' . $row['details'] . '</td>
		<td align="left">' . $row['drive_type'] . '</td>
		<td align="left">' . $row['price'] . '</td>
	</tr>
	';
	
}

echo '</table>';

//@mysqli_free_result ($result); // Free up the resources.	

//@mysqli_close($dbc); // Close the database connection.
//echo $num_pages;
// Make the links to other pages, if necessary.
if ($num_pages > 1) {
	
	echo '<br /><p align="center">';
	// Determine what page the script is on.	
	$current_page = ($start/$display) + 1;
	
	// If it's not the first page, make a First button and a Previous button.
	if ($current_page != 1) {
		echo '<a href="view_games.php?s=0&np=' . $num_pages . '&sort=' . $sort .'">First</a> ';
		echo '<a href="view_games.php?s=' . ($start - $display) . '&np=' . $num_pages . '&sort=' . $sort .'">Previous</a> ';
	}
	
	// Make all the numbered pages.
	for ($i = 1; $i <= $num_pages; $i++) {
		if ($i != $current_page) {
			echo '<a href="view_games.php?s=' . (($display * ($i - 1))) . '&np=' . $num_pages . '&sort=' . $sort .'">' . $i . '</a> ';
		} else {
			echo $i . ' ';
		}
	}
	
	// If it's not the last page, make a Last button and a Next button.
	if ($current_page != $num_pages) {
		echo '<a href="view_games.php?s=' . ($start + $display) . '&np=' . $num_pages . '&sort=' . $sort .'">Next</a> ';
		echo '<a href="view_games.php?s=' . (($num_pages-1) * $display) . '&np=' . $num_pages . '&sort=' . $sort .'">Last</a>';

	}
	
	echo '</p>';
	
} // End of links section.
$query_sub = "SELECT count(Product_id) FROM Product WHERE description ='games' AND Product_id  NOT IN (select Games_id FROM games) ";
$result_sub = @mysqli_query ($dbc, $query_sub);
$row = @mysqli_fetch_array ($result_sub);
$num_pro = $row[0];
if ($num_pro > 0) {
	echo "<p align='center'><b>You have ".$num_pro." pending products to insert in games table. Please Click the link below to do so.</b></p>";
	# code...
	echo '<p align="center"><a href="add_games.php">Add a new game</a></p>';
}
else{
	echo "<p align='center'><b>You do not have any pending products to insert in games table.</b></p>";
}

@mysqli_free_result ($result); // Free up the resources.	
@mysqli_close($dbc); // Close the database connection.

?>


