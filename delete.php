<?php

if(isset($_POST['delete'])){
    $id =$_POST['id'];
    $getfile = file_get_contents('data.json');
    $jArray = json_decode($getfile , true);
    $k=array_search($id, array_column($jArray , 'id'));
    unset($jArray[$k]);
    $s=array_values($jArray);
    $put = json_encode($s);
    file_put_contents('data.json', $put);

header("location:index.php");
}
?>
