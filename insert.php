<?php
$con=mysqli_connect("localhost","root","","test");

// Check connection
if (mysqli_connect_errno($con))
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  
  



for($count=1;$count<=5760;$count++){
	$playcount=rand(1,100);	
	$result=mysqli_query($con,"insert into phyloDB values(".$count.",".$playcount.");"); 
	if(mysqli_error($con)){
 		echo "error while inserting ". $mysqli_errno;
	}
}

	$result=mysqli_query($con,"commit;");
mysqli_close($con);
?>
