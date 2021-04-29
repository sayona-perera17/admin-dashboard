<?php


$directory_self = str_replace(basename($_SERVER['PHP_SELF']), '', $_SERVER['PHP_SELF']);

$uploadHandler = 'http://' . $_SERVER['HTTP_HOST'] . $directory_self . 'upload.processor.php';


$max_file_size = 3000000; // size in bytes

?>
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


<script type="text/javascript" src="js/script1.js"></script> 
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
		<div class="col-lg-8 text-left">
              <!-- Page Content start -->
		
	<legend>Add Food Items From Here.</legend>
				      <form action="<?php echo $uploadHandler ?>" 
			 enctype="multipart/form-data" class="register" method="POST">
					   
				<div class="form-group">
						<label>Product Name</label>
						<input type="text" name="txtname" class="form-control"  placeholder="Enter Name" required/>
						</div>
						<div class="form-group">
						<label>Product Price</label>
						<input type="number" name="txtprice" class="form-control"  placeholder="Enter Price" required/>
						</div>
				
				<div class="form-group">
						<label>Product Category</label>
						<!--<input type="text" name="txtcat" class="form-control"  placeholder="Enter Category" required/>
						-->
						<select name="txtcat" class="form-control">
						<option>Please Select Category</option>
						<?php
					mysql_connect("localhost", "nilwalaw_emark", "32432sdcfsdF") or die(mysql_error());
					
					mysql_select_db("nilwalaw_emark") or die(mysql_error());
					
					$sql = mysql_query("SELECT * FROM category order by id DESC")
					or die(mysql_error());  
					
					while($row = mysql_fetch_array($sql)){
						echo '<option value="'.$row['name'].'">'.$row['name'].'</option>';
						
						}
						?>
						</select>
						
						
						</div>
						
						<div class="form-group">
						<label>Product Description</label>


<textarea id="elm1"  rows="25" name="txtdesc" cols="80" style="width: 100%" class="tinymce">
               
               
            </textarea>
						</div>
				
				
				<div class="form-group">
						<label>Product Image</label>
						<input type="file" name="file" class="form-control"   required/>
						</div>
				<input style="font-size:15px" class="btn btn-warning" name="submit" type="submit" value="Submit &raquo;" />
			
				
				</form>
			  </br>
			  
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
<script type="text/javascript" src="js1/jquery.itextclear.js"></script>

<script type="text/javascript" src="lib/tinymce/jquery.tinymce.js"></script>
<script type="text/javascript">
    $().ready(function() {
        $('textarea.tinymce').tinymce({
            // Location of TinyMCE script
            script_url : 'lib/tinymce/tiny_mce.js',

            // General options
            theme : "advanced",
            plugins : "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,advlist",

            // Theme options
            theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
            theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
            theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
            theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak",
            theme_advanced_toolbar_location : "top",
            theme_advanced_toolbar_align : "left",
            theme_advanced_statusbar_location : "bottom",
            theme_advanced_resizing : true,

            // Example content CSS (should be your site CSS)
            content_css : "css/content.css",

            // Drop lists for link/image/media/template dialogs
            template_external_list_url : "lists/template_list.js",
            external_link_list_url : "lists/link_list.js",
            external_image_list_url : "lists/image_list.js",
            media_external_list_url : "lists/media_list.js",

            // Replace values for the template plugin
            template_replace_values : {
                username : "Some User",
                staffid : "991234"
            }
        });
    });
</script>
<script type="text/javascript">
var sc_project=9046834; 
var sc_invisible=1; 
var sc_security="ec55ba17"; 
var scJsHost = (("https:" == document.location.protocol) ?
"https://secure." : "http://www.");
document.write("<sc"+"ript type='text/javascript' src='" +
scJsHost+
"statcounter.com/counter/counter.js'></"+"script>");
</script>
<noscript><div class="statcounter"><a title="free hit
counter" href="http://statcounter.com/" target="_blank"><img 
class="statcounter"
src="http://c.statcounter.com/9046834/0/ec55ba17/1/"
alt="free hit counter"></a></div></noscript>
</html>
