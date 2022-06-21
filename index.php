<?php
$getfile = file_get_contents('data.json');
$jsonfile = json_decode($getfile);
?>
<html>

<head>
<link rel="stylesheet" href="style.css">
  
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> PHP-JavaScript CURD - JSON </title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
</head>

<body>
  <div class="container">
    <div class="container">
      <div class="topMargin">
        <div class="row">
          <div class="col-lg-8">
            <h3>PHP-javaScript CRUD using JSON &nbsp; <a class="btn btn-primary" href="add.php">Add</a></h3>
          </div>
          <div class="col-lg-4">
              <input type="text" class="form-control" placeholder="Search Data..." name="search" id="myInput" onkeyup="myFunction()">
              </input>
          </div>
        </div>
      </div>
    </div>
    


    <table class="table" id="myTable">
      <br>
      <thead>
        <tr>

          <th scope="col">id</th>
          <th scope="col">Unique ID</th>
          <th scope="col">Price</th>
          <th scope="col">Row</th>
          <th scope="col">Plot</th>
          <th scope="col">Lot</th>
          <th scope="col">Latitude</th>
          <th scope="col">Longitude</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($jsonfile as $index => $var) : ?>
          <tr>

            <td><?php echo $var->id; ?></td>
            <td><?php echo $var->szPlotIdUniqueKey; ?></td>
            <td><?php echo $var->fPrice; ?></td>
            <td><?php echo $var->szRow; ?></td>
            <td><?php echo $var->szPlot; ?></td>
            <td><?php echo $var->szLot; ?></td>
            <td><?php echo $var->szCentroidLatitude; ?></td>
            <td><?php echo $var->szCentroidLongtitude; ?></td>
            <td>
              <a class="btn btn-warning" onclick="onEdit(<?php echo $var->id; ?>)" data-bs-toggle="modal" data-bs-target="#edit">Update</a>
              <a class="btn btn-danger" onclick="onDel(<?php echo $var->id; ?>)" data-bs-toggle="modal" data-bs-target="#del">Delete</a>
              <a class="btn btn-info" onclick="onView(<?php echo $var->id; ?>)" data-bs-toggle="modal" data-bs-target="#view">View</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
    <!-- Modal view -->
    <div class="modal fade" id="view" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">View</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="container">
              <div class="row">
                <div class="col-xl-9">
                  <div id="googleMap" style="width:100%;height:100%;"></div>
                </div>
                <div class="col-xl-3">
                  <div class="scroll">
                    <div class="row">
                      <h6>ID:</h6>
                      <p id="vID"></p>
                    </div>
                    <div class="row">
                      <h6>Unique ID:</h6>
                      <p id="vUid" />
                    </div>
                    <div class="row">
                      <h6>Price:</h6>
                      <p id="vPrice" />
                    </div>
                    <div class="row">
                      <h6>Row:</h6>
                      <p id="vRow" />
                    </div>
                    <div class="row">
                      <h6>Plot:</h6>
                      <p id="vPlot" />
                    </div>
                    <div class="row">
                      <h6>Lot:</h6>
                      <p id="vLot" />
                    </div>
                    <div class="row">
                      <h6>Latitude:</h6>
                      <p id="vLat" />
                    </div>
                    <div class="row">
                      <h6>Longitude:</h6>
                      <p id="vLong" />
                    </div>
                    <div class="row">
                      <h6>Centroid Northing:</h6>
                      <p id="vNorthing" />
                    </div>
                    <div class="row">
                      <h6>Centroid Easting:</h6>
                      <p id="vEasting" />
                    </div>

                    <div class="row">
                      <h6>NE Corner Latitude:</h6>
                      <p id="vNecLat" />
                    </div>
                    <div class="row">
                      <h6>NE Corner Longitude:</h6>
                      <p id="vNecLon" />
                    </div>
                    <div class="row">
                      <h6>NW Corner Latitude:</h6>
                      <p id="vNwcLat" />
                    </div>
                    <div class="row">
                      <h6>NW Corner Longitude:</h6>
                      <p id="vNwcLong" />
                    </div>
                    <div class="row">
                      <h6>SE Corner Laatitude:</h6>
                      <p id="vSecLat" />
                    </div>
                    <div class="row">
                      <h6>SE Corner Longitude:</h6>
                      <p id="vSecLong" />
                    </div>
                    <div class="row">
                      <h6>SW Corner Latitude:</h6>
                      <p id="vSwcLat" />
                    </div>
                    <div class="row">
                      <h6>SW Corner Longitude:</h6>
                      <p id="vSwcLong" />
                    </div>
                    <div class="row">
                      <h6>Boundary Plot:</h6>
                      <p id="vBPlot" />
                    </div>
                    <div class="row">
                      <h6>Corner Plot:</h6>
                      <p id="vCPlot" />
                    </div>
                    <div class="row">
                      <h6>Price with tax:</h6>
                      <p id="vPwithTax" />
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    <!-- Modal delete -->
    <div class="modal fade" id="del" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="delete.php" method="post">

              <input type="hidden" name="id" id="delid">
              <p>Are you sure to delete the record?</p>


          </div>
          <div class="modal-footer">
            <button type="submit" name="delete" class="btn btn-danger">YES</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- Modal update -->
    <div class="modal fade modal-xl" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Update</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">

            <form action="edit.php" method="POST">
              <div class="form">


                <div class="row">
                  <div class="col-sm-4">
                    <div class="row">

                      <div class="col-sm-10">
                        <input type="hidden" class="form-control" name="id" id="editID" />
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="row">
                      <div class="col-sm-2">
                        <label for="price">Price:</label>
                      </div>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="fPrice" id="editP" value="" />
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="row">

                        <div class="col-sm-10">
                          <input type="hidden" class="form-control" name="szPlotIdUniqueKey" id="editUid" />
                        </div>
                      </div>
                    </div>

                  </div>
                </div><br />
                <div class="row">
                  <div class="col-sm-4">
                    <div class="row">
                      <div class="col-sm-2">
                        <label for="row">Row:</label>
                      </div>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="szRow" id="row" value="" />
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="row">
                      <div class="col-sm-2">
                        <label for="plotSize">Plot:</label>
                      </div>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="szPlot" id="plot" value="" />
                      </div>
                    </div>
                  </div>

                  <div class="col-sm-4">
                    <div class="row">
                      <div class="col-sm-2">
                        <label for="lot">Lot:</label>
                      </div>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="szLot" id="lot" value="" />
                      </div>
                    </div>
                  </div>
                </div><br />
                <div class="row">
                  <div class="col-sm-4">
                    <div class="row">
                      <div class="col-sm-3">
                        <label for="latitude">Latitude:</label>
                      </div>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="szCentroidLatitude" id="lat" value="" />
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="row">
                      <div class="col-sm-3">
                        <label for="longitude">Longitude:</label>
                      </div>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="szCentroidLongtitude" id="long" value="" />
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="row">
                      <div class="col-sm-3">
                        <label for="northing">Centroid Northing:</label>
                      </div>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="szCentroidNorthing" id="northing" value="" />
                      </div>
                    </div>
                  </div>
                </div><br />
                <div class="row">
                  <div class="col-sm-4">
                    <div class="row">
                      <div class="col-sm-3">
                        <label for="easting">Centroid Easting:</label>
                      </div>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="szCentroidEasting" id="easting" value="" />
                      </div>
                    </div>
                  </div>

                  <div class="col-sm-4">
                    <div class="row">
                      <div class="col-sm-3">
                        <label for="neC_Lt">NE Corner Latitude:</label>
                      </div>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="szNECornerLatitude" id="necLat" value="" />
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="row">
                      <div class="col-sm-3">
                        <label for="neC_lg">NE Corner Longitude:</label>
                      </div>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="szNECornerLongitude" id="necLon" value="" />
                      </div>
                    </div>
                  </div>
                </div><br />
                <div class="row">
                  <div class="col-sm-4">
                    <div class="row">
                      <div class="col-sm-3">
                        <label for="nwC_lt">NW Corner Latitude:</label>
                      </div>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="szNWCornerLatitude" id="nwcLat" value="" />
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="row">
                      <div class="col-sm-3">
                        <label for="nwC_lg">NW Corner Longitude:</label>
                      </div>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="szNWCornerLongitude" id="nwcLong" value="" />
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="row">
                      <div class="col-sm-3">
                        <label for="seC_lt">SE Corner Laatitude:</label>
                      </div>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" " name=" szSECornerLatitude" id="secLat" value="" />
                      </div>
                    </div>
                  </div>
                </div><br />
                <div class="row">

                  <div class="col-sm-4">
                    <div class="row">
                      <div class="col-sm-3">
                        <label for="seC_lg">SE Corner Longitude:</label>
                      </div>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="szSECornerLongitude" id="secLong" value="" />
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="row">
                      <div class="col-sm-3">
                        <label for="swC_lt">SW Corner Latitude:</label>
                      </div>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="szSWCornerLatitude" id="swcLat" value="" />
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="row">
                      <div class="col-sm-3">
                        <label for="swC_lg">SW Corner Longitude:</label>
                      </div>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="szSWCornerLongitude" id="swcLong" value="" />
                      </div>
                    </div>
                  </div>
                </div><br />
                <div class="row">
                  <div class="col-sm-4">
                    <div class="row">
                      <div class="col-sm-3">
                        <label for="boundryPlot">Boundary Plot:</label>
                      </div>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="boundaryPlot" id="bPlot" value="" />
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="row">
                      <div class="col-sm-2">
                        <label for="cornerPlot">Corner Plot:</label>
                      </div>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="cornerPlot" id="cPlot" value="" />
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="row">
                      <div class="col-sm-3">
                        <label for="priceWTax">Price with tax:</label>
                      </div>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="PriceWithTaxWithExtra" id="pwithTax" value="" />
                      </div>
                    </div>
                  </div>
                </div><br />
              </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" name="update" class="btn btn-warning">Update</button>
          </div>
          </form>
        </div>
      </div>
    </div>
    <script src="js/script.js"></script> 

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAfUroDQu3kObHcbvYvCoGNbwfDPrAJ3aw&callback=myMap">
    </script>
  </div>
</body>

</html>