
<html>
<head>
	<title>Portfolio</title>
	<link rel="stylesheet" href="styles/stylesheet.css">
	<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
</head>
<body>
	<center>
		<img src="images/header.jpg" width="100%">
	</center>

	<div class="heading">
		<h1 id="topic"> B CREATIVE PHOTOGRAPHY</h1>
		<h3>&mdash; Portfolio &mdash;</h3>
	</div>

	<nav>
		<ul>
			<li><h2>CATEGORIES</h2></li>
			<li style="float:right"><a class="active" href="">Official</a></li>
			<li style="float:right"><a class="active" href="">Celebration</a></li>
			<li style="float:right"><a class="active" href="Photoview1.php">Couple</a></li>
			<li style="float:right"><a class="active" href="Photoview1.php">Recent galleries</a></li>
			<li style="float:right"><a class="active" href="">All</a></li>
			<li style="float:right"><a class="active" href="curator_hub.php"> BACK </a></li>
		</ul>
	</nav>

	<hr>
	<div class="menu">
		
		<!--album 1-->
		
<?php
$c = new mysqli("localhost", "root", "", "photography");
$sql = "SELECT * FROM portfolio";
$result_set = $c->query($sql);



while ($row = $result_set->fetch_assoc()) {

	
    echo '
        <div class="categories">

        <img src="upload/' . $row["img_name"] .'">
            <div class="details">
                <div class="details-sub">
                    <h5>'.$row["portfolio_title"] .'</h5><br>
                    <p>'.$row["portfolio_description"].'</p><br>
					<a href="' . $row["Category"] . '"><button>View</button></a>
                </div>
            </div>
        </a>
        </div>
    ';
}
$c->close();
?>

</div>

</body>
</html>