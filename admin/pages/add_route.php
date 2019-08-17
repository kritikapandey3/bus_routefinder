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
    	<form autocomplete="off" action="" method="post">
			<div class="bg-image"></div>
			<div class="bg-grad"></div>
			<div class="header">
				<div>Add<span>Route</span></div>
			</div>

			<div class="form-box">
                <div class="autocomplete" style="width:250px;">
                    <input type="text" name ="from_node" placeholder="from" id="from">
                </div>
                <div class="autocomplete" style="width:250px;">
                	<input type="text" name ="to_node" placeholder="to" id="to">
                </div>			
				<input type = "text" name = "distance" placeholder="distance">
				<input type="submit" name="addEdge" value="Submit Form"/>							
			</div>
       </form>					
</div>
<script>
window.onload = function(){
    document.querySelector(".active").classList.remove("active");
    var x = document.getElementsByClassName("sidebar");
    x[0].getElementsByTagName("li")[1].classList.add("active");
}
</script>
<script>
<?php
    include($_SERVER['DOCUMENT_ROOT'].'/bus_routefinder/admin/includes/connection1.php');
    $q = "select * from nodes";
    $run_q = mysqli_query($con, $q);
    $row=mysqli_fetch_all($run_q);
    foreach ($row as $result)
    {
        $nodes[] = $result[1];
    }
    echo "var jsony =".json_encode($nodes).";\n";
    ?>
    autocomplete(document.getElementById("from"),jsony);
    autocomplete(document.getElementById("to"),jsony);
</script>
<?php
if(isset($_POST['addEdge'])) {

    include($_SERVER['DOCUMENT_ROOT'].'/bus_routefinder/admin/includes/connection1.php');
	
	$from = $_POST['from_node'];
	$to = $_POST['to_node'];
	$dist = $_POST['distance'];    

	$q = "select * from nodes where address = '$from'";
	$run_q = mysqli_query($con, $q);
	$row_q = mysqli_fetch_array($run_q);
	$f = $row_q['node_id'];

	$q = "select * from nodes where address = '$to'";
	$run_q = mysqli_query($con, $q);
	$row_q = mysqli_fetch_array($run_q);
	$t = $row_q['node_id'];

	$q = "select * from edges where edges.from = '$f' and edges.to = '$t'";
	$run_q = mysqli_query($con, $q);
	if(!mysqli_num_rows($run_q)) {
		$qq = "SELECT max(edge_id)+1 'id' FROM edges";
		$run_q = mysqli_query($con, $qq);
		$row_q = mysqli_fetch_array($run_q);
		$tt = $row_q['id'];

		$q = "insert into edges (edge_id, edges.from, edges.to, distance) values ($tt, '$f','$t', '$dist')";
		$run_q = mysqli_query($con, $q);
	
	}
}
?>

</body>
</html>