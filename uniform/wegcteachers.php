<!doctype html>
<html lang="en"dir="ltr">
	<head>
		<meta name="viewport" content="width=device-width">
		<meta charset="UTF-8">
		<title>WEGC Teachers with Full Details</title>
		<meta name="description"content="WEGC Teachers with Full Details"/>
		<meta name="copyright" content="Copyright Carmen Liao 2017">
		<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
		<link rel="stylesheet" type="text/css" href="css/styles.css"  media="all">

	</head>

	<body>

		<a name="backtotop">
		<div id="container">
			<header>

				<h1><img src = "images/title_web.jpg" width = "520px" title="title" alt="The title of the website"></h1>
				<h2>Handsewn, Beautiful, Quality Clothing</h2>

			</header>


		<div id="nav">
			<nav class= "main">
				<ul>
					<li><a class = "border" href="index.html">Home</a></li>
					<li><a class = "border" href="summer_uniform.html">Summer Uniform</a></li>
					<li><a class = "border" href="winter_uniform.html">Winter Uniform</a></li>
					<li><a class = "border" href="database.html">The Databases</a></li>
				</ul>
			</nav>

			<article>
				<div id= "database">

					<h1>WEGC Teachers with Full Details</h1>
							</div>

				  <p class = "center" >&nbsp &nbsp Page results as at <?php echo date('D-d-M-Y');
				  // Shows the page results and the current date at that moment ?>:</div>

			</article>

			<?php

			$dbc = @mysqli_connect('localhost', 'root', '', 'images_cl_db');

				if(!$dbc) {
						echo '<div id = "pretty"> The database of this website is down at the moment, please come back later! </div>' ;
						echo '<br></br><footer><div id = "smallest"><a class = "link_back" href="http://localhost/uniform/database.html">Back</a></div></footer>';// a back button for convenience (goes back to database page)
					} else {
						$sql = "SELECT * FROM `images_records` WHERE 1";
						$result = @mysqli_query($dbc, $sql);

						if(!$result) {
						// tells the user to come back later, as there is a query error (SQL)
						echo '<div id = "pretty"> There was a query error in the system, please come back later! </div>';
						echo '<br></br><footer><div id = "smallest"><a class = "link_back" href="http://localhost/uniform/database.html">Back</a></div></footer>';}
					 else {
							// output the records to the screen using a table
							echo "<br/> <table> \n ";
							echo "<tr class='row-heading'><th> Code </th> <th> Title </th> <th> First Name </th> <th> Last Name </th> <th> Role </th> <th> Ako </th> <th> Faculty </th> <th> Job Title </th> <th> Registration No. </th></tr>";

							while($row = mysqli_fetch_assoc($result)) {
								echo
								"<td> $row[image_id] </td> \n
								<td> $row[image_title] </td> \n
								<td> $row[image_owner] </td> \n";
								}
							echo "</table>";
							echo "<br></br><footer><a class = 'big' href='#backtotop'>Back to top</a></footer>";
							// if the user clicks on this link, it will take them back to the top of the page. This is convenient as the list of details can be very long
						}
					}


				?>
