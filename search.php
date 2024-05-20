<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles/search.css">
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

<input type="text" id="searchInput" placeholder="Search Portfolio ID...">

<table id="cus">
    <tr>
        <th>Portfolio ID</th>
        <th>Image name</th>
        <th>Title</th>
        <th>Description</th>
    </tr>

    <?php
    $serverName='localhost';
    $userName='root';
    $password='';
    $db_Name='photography';

    $con=new mysqli($serverName,$userName,$password,$db_Name);
    if($con->connect_error){
        die('connection error'.$con->connect_error);
    }

    // Fetch data from the database
    $result = $con->query("SELECT * FROM portfolio");

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $row['portfolio_id'] . '</td>';
            echo '<td>' . $row['img_name'] . '</td>';
            echo '<td>' . $row['portfolio_title'] . '</td>';
            echo '<td>' . $row['portfolio_description'] . '</td>';
            echo '</tr>';
        }
        echo '</table>';
    } else {
        echo 'No records found.';
    }
    ?>
</table>

<script>
    // JavaScript to filter the table based on the Portfolio ID search input
    document.getElementById("searchInput").addEventListener("keyup", function() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("searchInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("cus");
        tr = table.getElementsByTagName("tr");
        for (i = 1; i < tr.length; i++) {  // Start from 1 to skip the header row
            td = tr[i].getElementsByTagName("td")[0]; // Use index 0 for Portfolio ID column
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    });
</script>
</body>
</html>

