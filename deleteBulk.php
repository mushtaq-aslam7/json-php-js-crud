<?php
$ids= $_POST['ids'];
echo var_dump($ids);
$getfile = file_get_contents('data.json');
$jArray = json_decode($getfile , true);
$length=count($ids);

for($i=0;$i<$length;$i++){
    
    $k=array_search($ids[$i], array_column($jArray , 'id'));
  unset($jArray[$k]);
   $jArray=array_values($jArray);
}

  

  
    $put = json_encode($jArray);
    file_put_contents('data.json', $put);
header("location:index.php");
?>
