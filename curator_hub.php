<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title> Admin </title>
    <link rel="stylesheet" href="styles/adminA.css">
    <!-- Font Link -->
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<body>

    <div class="sidebar">
        <div class="logo-details">
            CURATOR_HUB
        </div>
        <ul class="nav-links">
            <li>
                <a href="#" class="active">
                    <span class="links_name">Dashboard</span>
                </a>
            </li>
           
            <li>
                <a href="Portfolio.php" target="_blank">
                    <span class="links_name">Image</span>
                </a>
            </li>
            <li>
                <a href="search.php">
                    <span class="links_name">Search</span>
                </a>
            </li>
             
        </ul>
    </div>
    <center>
		<img src="images/header.jpg" width="100%">
	</center>

	<div class="heading">
		<h1 id="topic"> B CREATIVE PHOTOGRAPHY</h1>
		<h3>&mdash; Portfolio &mdash;</h3>
	</div>

    <div class="forms">
        <div class="formGroup4">
            <form action="add_gallery.php" method="post" enctype="multipart/form-data" class="formImgAdd">
            <div  class="headingform"><u>Insert Gallery image</u></div>
            <input type="file" name="img_file" class="PacField">
            <input type="text" name="img_id" placeholder="image ID" class="PacField">
            <input type="text" name='portfolio_title' placeholder="portfolio_title" class="PacField">
            <input type="text" name='portfolio_description' placeholder="portfolio_description" class="PacField">
            <input type="text" name='Category' placeholder="Category" class="PacField">
            <input type="submit" name="submit" value="ADD" class="crudbutton">
            </form>
        </div>

        <div class="formGroup4">
            <form action="update_gallery.php" method="post" enctype="multipart/form-data" class="formImgAdd">
            <div  class="headingform"><u>Update Gallery image</u></div>
            <select name='pac_id' class="PacField" >
            <option><?php include('getPortfolio.php');?></option>
            </select>
            <input type="file" name="img_file" class="PacField">
            <input type="text" name='portfolio_title' placeholder="portfolio_title" class="PacField">
            <input type="text" name='portfolio_description' placeholder="portfolio_description" class="PacField">
            <input type="text" name='Category' placeholder="Category" class="PacField">
            <input type="submit" name="sub" value="ADD" class="crudbutton">
            </form>
        </div>

        <div class="formGroup4">
            <form action="deleteAlbum.php" method="post" class="formImgDelete">
            <div  class="headingform"><u>Delete Gallery image</u></div>
            <select name='img_id' class="PacField" >
            <?php include('getgallery.php');?>
            </select>
            <input type="submit" name="del" value="Delete" class="crudbutton">
            </form>
        </div>
    </form>
    
    </div>
    
</body>
</html>