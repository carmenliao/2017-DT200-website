<!doctype html>
<html lang="en"dir="ltr">
	<head>
		<meta name="viewport" content="width=device-width">
		<meta charset="UTF-8">
		<title>Teacher Search</title>
		<meta name="description"content="Teacher Search"/>
		<meta name="copyright" content="Copyright Carmen Liao 2017">
		<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
		<link rel="stylesheet" type="text/css" href="css/styles.css"  media="all">

	</head>
	
	<body>	
	
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
					<h1>Teacher Search</h1> 
							</div>
				
				<p class = "center" >&nbsp &nbsp The following information shows as at <?php echo date('D-d-M-Y'); 
				  // Shows the page results and the current date at that moment ?>:</div> 
				
			</article>

			<?php
			
			$code = $_POST['code'];
			$dbc = @mysqli_connect('localhost', 'root', '', 'clteachersdb1');
			
				if(!$dbc) {
						echo '<div id= "pretty"> The database of this website is down at the moment, please try again later! </div>';
						echo '<br></br><footer><div id = "smallest"><a class = "link_back" href="http://localhost/uniform/database.html">Back</a></div></footer>'; // a back button for convenience (goes back to database page)
					} else {
						$sql = "SELECT * FROM `teacherdetails` WHERE `code` = '$code'";
						
						$result = @mysqli_query($dbc, $sql);
						
						if(!$result) {
						// only reason for no result is error in query
						echo '<div id = "pretty"> There was a query error in the system, please come back later! </div>';
						echo '<br></br><footer><div id = "smallest"><a class = "link_back" href="http://localhost/uniform/database.html">Back</a></div></footer>'; // a back button for convenience (goes back to database page)
						
					}  else {					
						if(mysqli_num_rows($result) == 0 ) {
							echo "<div id = 'pretty'>The teacher code you've searched shows no results</div>";// shows that there is no teacher code available. If the user just presses enter (without entering a name), it still displays this message
							
							echo '<br></br><footer><div id = "smallest"><a class = "link_back" href="http://localhost/uniform/database.html">Back</a></div></footer>'; 
							/*** if the user clicks on this link, it would take them back to the database page. This is convenient ***/
							} 
						else {
							// output the records to the screen using a table
							echo "<br/> <table class = 'center'> \n ";
							echo "<tr class='row-heading'><th> First Name </th> <th> Last Name </th> <th> Code </th> <th> Faculty </th></tr>";
							
							while($row = mysqli_fetch_assoc($result)) {
								echo 	
								"<tr>
								<td> $row[f_name] </td> \n
								<td> $row[l_name] </td> \n
								<td> $row[code] </td> \n
								<td> $row[faculty] </td> \n
								</tr>
								";
								}	
								echo "</table>";
								echo '<br></br><footer><div id = "smallest"><a class = "link_back" href="http://localhost/uniform/database.html">Back</a></div></footer>';
								/*** if the user clicks on this link, it would take them back to the database page. This is convenient ***/
						}
					}
				}
				 
				?>
			
				<br></br>
				
			
			
			