<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Online Fashion Store</title>

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
                <a class="navbar-brand" href="#">OnlineFashion.lk</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="#">menu1</a>
                    </li>
                    <li>
                        <a href="#">menu2</a>
                    </li>
					 <li>
                        <a href="#">menu3</a>
                    </li>
					 <li>
                        <a href="#">menu4</a>
                    </li>
                    <li>
                        <a href="#">menu5</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">

        <div class="row">
            <div class="col-lg-12 text-center">
              <!-- Page Content start -->
			  
			  <table class="table table-hover">
			  <thead>
				<th>ID</th>
				<th>First Name</th>
			    <th>Last Name</th>
				<th>Email</th>
				<th>Address</th>
				<th>Tel</th>
				<th>User Name</th>
				<th>Password</th>
			  
			  </thead>
			  <tbody>
			  
			  <?php
					mysql_connect("localhost", "root", "") or die(mysql_error());
					
					mysql_select_db("fd") or die(mysql_error());
					
					$sql = mysql_query("SELECT * FROM users order by id DESC")
					or die(mysql_error());  
					
					while($row = mysql_fetch_array($sql)){
					
					echo '<tr>';
					echo '<td>'.$row['id'].'</td>';
					echo '<td>'.$row['firstname'].'</td>';
					echo '<td>'.$row['lastname'].'</td>';
					echo '<td>'.$row['email'].'</td>';
					echo '<td>'.$row['address'].'</td>';
					echo '<td>'.$row['telno'].'</td>';
					echo '<td>'.$row['username'].'</td>';
					echo '<td>'.$row['password'].'</td>';
					echo '<td><a href="#">Update</a>';
					echo '<td><a href="deleteuser.php?id=1">Delete</a>';
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
