
<?php
$numRows=144;
$numColumns=40;
$zoomLevel= $_POST['zoomLevel'];
$con=mysqli_connect("localhost","root","","test");
$numZoom=8;
// Check connection
if (mysqli_connect_errno($con))
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
$result=mysqli_query($con,"select * from phyloDB;");

$count=0;
while($row = mysqli_fetch_array($result))
  {
  	$playcount[$count/$numColumns][$count%$numColumns]=$row['playcount'];
  	$count++;
   }


$sum[0][0]=0;

for($i=0;$i<($numRows*$zoomLevel/$numZoom);$i++){
	for($j=0;$j<($numColumns*$zoomLevel/$numZoom);$j++){
		$sum[$i][$j]=0;
		for($k=0;$k<$numZoom/$zoomLevel;$k++){
			for($l=0;$l<$numZoom/$zoomLevel;$l++){
				
				$sum[$i][$j]+=$playcount[$i+$k][$j+$l];
			}
		}
		$sum[$i][$j]=$sum[$i][$j]/pow($numZoom/$zoomLevel,2);	
	}
	
}

echo json_encode($sum);
mysqli_close($con);
?>

