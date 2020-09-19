<!doctype html>
<html lang="en"dir="ltr">
	<head>
		<meta name="viewport" content="width=device-width">
		<meta charset="UTF-8">
		<title>WEGC Teachers with Registration Numbers</title>
		<meta name="description"content="WEGC Teachers with Registration Numbers"/>
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
					<h1>WEGC Teachers with Registration Numbers</h1> 
							</div>
				
					<p class = "center" >&nbsp &nbsp Page results as at <?php echo date('D-d-M-Y'); 
				  // Shows the page results and the current date at that moment ?>:</div> 
				
			</article>

			<?php
			
			$dbc = @mysqli_connect('localhost', 'root', '', 'clteachersdb1');
			
				if(!$dbc) {
						echo '<div id= "pretty">The database of this website is down at the moment, please try again later!</div>';
						echo '<br></br><footer><div id = "smallest"><a class = "link_back" href="http://localhost/uniform/database.html">Back</a></div></footer>'; // a back button for convenience (goes back to database page)
					} else {
						$sql = "SELECT * FROM `teachers with reg num` ORDER BY code";
						
						$result = @mysqli_query($dbc, $sql);
						
						if(!$result) { 
						echo '<div id = "pretty"> There was a query error in the system, please come back later! </div>';
						echo '<br></br><footer><div id = "smallest"><a class = "link_back" href="http://localhost/uniform/database.html">Back</a></div></footer>'; // a back button for convenience (goes back to database page)
					}  else {					
							echo "<br/> <table class = 'center'> \n ";
							echo "<tr class='row-heading'><th> First Name </th> <th> Last Name </th> <th> Code </th> <th> Registration No. </th> <th> Status </th> <th> Expiry Date </th></tr>";
						
							while($row = mysqli_fetch_assoc($result)) {
			
								echo 	
								"<tr>
								<td> $row[f_name] </td> \n
								<td> $row[l_name] </td> \n
								<td> $row[code] </td> \n
								<td> $row[reg_num] </td> \n
								<td> $row[status] </td>
								<td> $row[expirydate] </td> \n
								</tr>";
								}	
							echo "</table>";
							echo "<br></br><footer><a class = 'big' href='#backtotop'>Back to top</a></footer>";
							// if the user clicks on this link, it will take them back to the top of the page. This is convenient as the list of details can be very long

						}
					}
				
				 
				?>
			
				
			
			
			