<!DOCTYPE html>
<html>
<head>
<title>BusFinder Admin</title>
<?php
    include($_SERVER['DOCUMENT_ROOT']."/bus_routefinder/admin/includes/admin_header.php");
?>
</head>
<body>
<?php
    include($_SERVER['DOCUMENT_ROOT'].'/bus_routefinder/admin/includes/admin_navigation.php');
?> 
 <div class="col-sm-12 col-md-8 working" style="overflow: hidden;">
    	<form action="" method="post">
			<div class="bg-image"></div>
			<div class="bg-grad"></div>
			<div class="header">
				<div>Add<span>Place</span></div>
			</div>

			<div class="form-box">
    			<input type = "text" name = "node_address" placeholder="address"/>
    			<input type = "text" name = "node_latitude" placeholder="latitude"/>
    			<input type = "text" name = "node_longitude" placeholder="longitude"/>
    			<input type="submit" name="addNode" value="Submit Form"/>								
			</div>
       </form>					
</div>
<script>
window.onload = function(){
    document.querySelector(".active").classList.remove("active");
    var x = document.getElementsByClassName("sidebar");
    x[0].getElementsByTagName("li")[2].classList.add("active");
}
</script>
<?php
if(isset($_POST['addNode'])) {
    
    include($_SERVER['DOCUMENT_ROOT'].'/bus_routefinder/admin/includes/connection1.php');
	$address = $_POST['node_address'];    
    $latitude = $_POST['node_latitude'];    
	$longitude = $_POST['node_longitude'];    
        
    $q = "select * from nodes where address = '$address'";
	$run_q = mysqli_query($con, $q);
	if(!mysqli_num_rows($run_q)) {
		$q = "insert into nodes (address,latitude,longitude) values ('$address','$latitude','$longitude')";
		$run_q = mysqli_query($con, $q);
	}
}
?>

</body>
</html>