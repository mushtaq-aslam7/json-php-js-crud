<?php
if (isset($_POST["add"])) {
    $file = file_get_contents('data.json');
    $data = json_decode($file, true);
    unset($_POST["add"]);
    $data = array_values($data);
    // print_r($data);
    array_push($data, $_POST);
    file_put_contents("data.json", json_encode($data, JSON_PRETTY_PRINT));
    header("Location: index.php");
}
?>
<html>
<head>
	<title>Add</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
</head>

<body style="background-color: white;">
<div class="container">

<style> *{color: black;}</style>

<center>
<div class="container"><br><br>
<div class="row">
    <div class="col-sm-2">
    </div>
    <div class="col-sm-2">
    </div>
    <div class="col-sm-2">
    <h4>Create</h4>

  </div>
    <div class="col-sm-2">
    </div>
    <div class="col-sm-2">
    </div><br>
</div><br/>


<form action="add.php" method="POST">
  <div class="row">
    <div class="col-sm-4">
      <input type="text" class="form-control" placeholder="Id" required name="id"/>
    </div>
    <div class="col-sm-4">
      <input type="text" class="form-control" placeholder="Unique Id" name="szPlotIdUniqueKey"/>
    </div>
    <div class="col-sm-4">
      <input type="text" class="form-control" placeholder="Price" name="fPrice"/>
    </div>
</div><br/>
<div class="row">
    <div class="col-sm-4">
      <input type="text" class="form-control" placeholder="Row" name="szRow"/>
    </div>
    <div class="col-sm-4">
      <input type="text" class="form-control" placeholder="Plot" name="szPlot"/>
    </div>

    <div class="col-sm-4">
      <input type="text" class="form-control" placeholder="Lot" required name="szLot"/>
    </div>
</div><br/>
<div class="row">
    <div class="col-sm-4">
      <input type="text" class="form-control" placeholder="Latitude" name="szCentroidLatitude"/>
    </div>
    <div class="col-sm-4">
      <input type="text" class="form-control" placeholder="Longitude" name="szCentroidLongtitude"/>
    </div>
    <div class="col-sm-4">
      <input type="text" class="form-control" placeholder="Centroid Northing" name="szCentroidNorthing"/>
    </div>
</div><br/>
<div class="row">
    <div class="col-sm-4">
      <input type="text" class="form-control" placeholder="Centroid Easting" name="szCentroidEasting"/>
    </div><br>

    <div class="col-sm-4">
      <input type="text" class="form-control" placeholder="NE Corner Latitude" required name="szNECornerLatitude"/>
    </div>
    <div class="col-sm-4">
      <input type="text" class="form-control" placeholder="NE Corner Longitude" name="szNECornerLongitude"/>
    </div>
</div><br/>
<div class="row">
    <div class="col-sm-4">
      <input type="text" class="form-control" placeholder="NW Corner Latitude" name="szNWCornerLatitude"/>
    </div>
    <div class="col-sm-4">
      <input type="text" class="form-control" placeholder="NW Corner Longitude" name="szNWCornerLongitude"/>
    </div>
    <div class="col-sm-4">
      <input type="text" class="form-control" placeholder="SE Corner Latitude" name="szSECornerLatitude"/>
    </div>
</div><br/>
<div class="row">

    <div class="col-sm-4">
      <input type="text" class="form-control" placeholder="SE Corner Longitude" required name="szSECornerLongitude"/>
    </div>
    <div class="col-sm-4">
      <input type="text" class="form-control" placeholder="SW Corner Latitude" name="szSWCornerLatitude"/>
    </div>
    <div class="col-sm-4">
      <input type="text" class="form-control" placeholder="SW Corner Longitude" name="szSWCornerLongitude"/>
    </div>
</div>
<br/>
<div class="row">
    <div class="col-sm-4">
      <input type="text" class="form-control" placeholder="Boundary Plot" name="boundaryPlot"/>
    </div>
    <div class="col-sm-4">
      <input type="text" class="form-control" placeholder="Corner Plot" name="cornerPlot"/>
    </div>
    <div class="col-sm-4">
      <input type="text" class="form-control" placeholder="Price With Tax" name="PriceWithTaxWithExtra"/>
    </div>
</div><br/>
    
<div class="col-auto">
    
    <input class="btn btn-outline-primary" type="submit" name="add"/>
	  <a href="index.php" class="btn btn-outline-danger">Cancel</a>    </div>
    
</div><br/>

<br/>
	<div class="col-auto">
      
	</div>
	
</form>
</div>
</center>
</div>
</body>
</html>


