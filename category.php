
<?php
$link=mysqli_connect("localhost","root","","cms");
$no=@$_GET["dele"];
$delete="delete from category where id='$no'";
mysqli_query($link,$delete);


?>
<html>
	<head>
		<title>category</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
		<style>
		body{
				
				height:100%;
				width:100%;
				background-color:#de962b;
			}	
			label{
				color:black;
				    bottom: -29px;
				position: relative;
			}
			.pml{
			    position: relative;
				bottom: -14px;
				left: 10px;	
			}
			
			.ju{
			background-color: rgb(0,0,0,0.3);
			height: 215px;
			width: 65%;
			border-radius: 13px;
			position: relative;
			bottom: 70px;
			}
			.iol{
				position: relative;
				left: 120px;
			}
			.bn{
			position: relative;
			left: 130px;
			}
			.b{
			position: relative;
			left: 37px;
			bottom: -11px;	
			}
			.hy{
				text-decoration:none;
				color: darkblue;
				background-color: bisque;
				padding-top: 2px;
				padding-left: 9px;
				padding-right: 9px;
				padding-bottom: 6px;
				border-radius: 9px;
			}
			.hy:hover{
					color:darkblue;
			}
		</style>
		<link rel="stylesheet" href="css/style.css">
	</head>
<body>

<a href="welcome.php" class="btn btn-success pml">Go To Home</a>

<div class="container a c">
	<div class="row">
	<div class="ju">
		<div class="col-lg-6 ">
<form method="post" autocomplete=off>	
	<div class="form-group">
	<center><h1 style="color:black;" class="iol">Category</h1></center>
					<label>Category Name:-</label>
					<input type="text" class="form-control bn" name="name">
		 </div>
		  <input type="submit" name="category" value="Add category" class="btn btn-dark b">

</form>
	</div>
</div>
	</div>
</div>

</body>
</html>


<?php
	if(isset($_POST["category"]))
	{
	  if($_POST["name"])
	  {
		$category=$_POST["name"];
		$status='-';
		$link=mysqli_connect("localhost","root","","cms");
		
		$insert="insert into category(category,status) values('$category','$status')";
		
		mysqli_query($link,$insert);
	  }
	  $category=null;
	}
?>


<center><h1 style="color:black;">Display Category</h1></center>
<table class="table table-light">
<thead class="table table-dark">
	<th>No.</th>
	<th>Category</th>
	<th>Delete</th>
</thead>
<?php
	$link=mysqli_connect("localhost","root","","cms");
	$disp=mysqli_query($link,"select * from category");
	while($value=mysqli_fetch_array($disp))
	{
?>   
		<tr>
		
			<td><?php echo $value['id']; ?></td>
			<td><?php echo $value['category']; ?></td>
			<td><a href="category.php?dele=<?php echo $value['id'];?>" class="hy">Delete</a></td>

		</tr>
	<?php } ?>
</table>
