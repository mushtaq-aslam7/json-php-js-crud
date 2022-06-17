<?php
if(isset($_POST['update'])){
  $id =$_POST['id'];
  $getfile = file_get_contents('data.json');
  $jArray = json_decode($getfile , true);
  $k=array_search($id, array_column($jArray , 'id'));
  $jsonfile = $jArray ;
  $jsonfile = $jsonfile[$k];
 
  // update
  // 
  $post["id"] = isset($_POST["id"]) ? $_POST["id"] : "";
  $post["szPlotIdUniqueKey"] = isset($_POST["szPlotIdUniqueKey"]) ? $_POST["szPlotIdUniqueKey"] : "";
  $post["fPrice"] = isset($_POST["fPrice"]) ? $_POST["fPrice"] : "";
  $post["szRow"] = isset($_POST["szRow"]) ? $_POST["szRow"] : "";
  $post["szPlot"] = isset($_POST["szPlot"]) ? $_POST["szPlot"] : "";
  $post["szLot"] = isset($_POST["szLot"]) ? $_POST["szLot"] : "";
  $post["szCentroidLatitude"] = isset($_POST["szCentroidLatitude"]) ? $_POST["szCentroidLatitude"] : "";
  $post["szCentroidLongtitude"] = isset($_POST["szCentroidLongtitude"]) ? $_POST["szCentroidLongtitude"] : "";
  $post["szCentroidNorthing"] = isset($_POST["szCentroidNorthing"]) ? $_POST["szCentroidNorthing"] : "";
  $post["szCentroidEasting"] = isset($_POST["szCentroidEasting"]) ? $_POST["szCentroidEasting"] : "";
  $post["szNECornerLatitude"] = isset($_POST["szNECornerLatitude"]) ? $_POST["szNECornerLatitude"] : "";
  $post["szNECornerLongitude"] = isset($_POST["szNECornerLongitude"]) ? $_POST["szNECornerLongitude"] : "";
  $post["szNWCornerLatitude"] = isset($_POST["szNWCornerLatitude"]) ? $_POST["szNWCornerLatitude"] : "";
  $post["szNWCornerLongitude"] = isset($_POST["szNWCornerLongitude"]) ? $_POST["szNWCornerLongitude"] : "";
  $post["szSECornerLatitude"] = isset($_POST["szSECornerLatitude"]) ? $_POST["szSECornerLatitude"] : "";
  $post["szSECornerLongitude"] = isset($_POST["szSECornerLongitude"]) ? $_POST["szSECornerLongitude"] : "";
  $post["szSWCornerLatitude"] = isset($_POST["szSWCornerLatitude"]) ? $_POST["szSWCornerLatitude"] : "";
  $post["szSWCornerLongitude"] = isset($_POST["szSWCornerLongitude"]) ? $_POST["szSWCornerLongitude"] : "";
  $post["boundaryPlot"] = isset($_POST["boundaryPlot"]) ? $_POST["boundaryPlot"] : "";
  $post["cornerPlot"] = isset($_POST["cornerPlot"]) ? $_POST["cornerPlot"] : "";
  $post["PriceWithTaxWithExtra"] = isset($_POST["PriceWithTaxWithExtra"]) ? $_POST["PriceWithTaxWithExtra"] : "";

  if ($jsonfile) {
    unset($jArray [$k]);
    $jArray [$k] = $post;
    $jArray  = array_values($jArray );
    file_put_contents("data.json", json_encode($jArray, JSON_PRETTY_PRINT));
  }
  header("Location: index.php");

}
?>
