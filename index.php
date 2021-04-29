<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

   

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
    body {
        padding-top: 70px;
        /* Required padding for .navbar-fixed-top. Remove if using .navbar-static-top. Change if height of navigation changes. */
    }
    </style>



</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">ADMIN - EMarket</a>
           

		   </div>
		     <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                        <li>
                        <a href="add_products.php">Add Products</a>
                    </li>
                    <li>
                        <a href="index.php">Add Category</a>
                    </li>
					<li>
                        <a href="manage_products.php">Manage Products</a>
                    </li>
					<li>
                        <a href="manage_uesrs.php">Manage Users</a>
                    </li>
					<li>
                        <a href="add_promotion.php">Add Promotions</a>
                    </li>
					<li>
                        <a href="manage_promotion.php">Manage Promotions</a>
                    </li>
					 
                </ul>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
           
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">

        <div class="row">
		<div class="col-lg-6 text-left">
              <!-- Page Content start -->
		
	<legend>Add Categories From Here.</legend>
						<form action="php/add_category.php" method="POST">
						<div class="form-group">
						<label>Category</label>
						<input type="text" name="txtcat" class="form-control"  placeholder="Enter Category" required/>
						</div>
						
						
						
						<div class="form-group">
						<input type="submit" name="btnaddcat" value="Add Categories" class="btn btn-primary"/>
						</div>
						
						</form>
			  
			  
			 <!-- Page Content end --> 
            </div>
            <div class="col-lg-6 text-left">
              <!-- Page Content start -->
			<legend>Manage Categories.</legend>
	
					 <table class="table table-bordered" >
			  <thead>
				<th>ID</th>
				<th>Category Name</th>
			   
			
			  
			  </thead>
			  <tbody>
			  
			  <?php
					mysql_connect("localhost", "nilwalaw_emark", "32432sdcfsdF") or die(mysql_error());
					
					mysql_select_db("nilwalaw_emark") or die(mysql_error());
					
					$sql = mysql_query("SELECT * FROM category order by id DESC")
					or die(mysql_error());  
					$id;
					while($row = mysql_fetch_array($sql)){
					$id=$row['id'];
					echo '<tr>';
					echo '<td>'.$row['id'].'</td>';
					echo '<td>'.$row['name'].'</td>';
					
				
					
					echo '<td><a class="btn btn-warning" href="delete_category.php?id='.$row['id'].'">Delete</a>';
					
					}
					
					
					
					
					
			  
			  ?>
			  </tr>
			  </tbody>
			  </table>
			
			  
			  
			 <!-- Page Content end --> 
            </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- jQuery Version 1.11.0 -->
    <script src="js/jquery-1.11.0.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
