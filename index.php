<?php
$getfile = file_get_contents('data.json');
$jsonfile = json_decode($getfile);
?>
<html>

<head>
  <style>
    .scroll {
      background-color: #ffff;
      width: 100%;
      height: 650px;
      border: 0px;
      overflow-y: scroll;
      overflow-x: hidden;
      /* Add the ability to scroll */
    }
  </style>
  <title> PHP-JavaScript CURD - JSON </title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</head>

<body>
  <div class="container">
    <h3>PHP-javaScript CRUD using JSON &nbsp; <a class="btn btn-primary" href="add.php">Add</a></h3>

    <table class="table">
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
              <a class="btn btn-warning" onclick="onEdit(<?php echo $var->id; ?>)" data-bs-toggle="modal" data-bs-target="#edit">Edit</a>
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
            <h5 class="modal-title" id="exampleModalLabel">Modal view</h5>
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
            <h5 class="modal-title" id="exampleModalLabel">Modal del</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="delete.php" method="post">

              <input type="hidden" name="id" id="delid">
              <button type="submit" name="delete">delete</button>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
    </div>
    <!-- Modal update -->
    <div class="modal fade modal-xl" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal update</h5>
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
    <script>
      function onEdit(o) {

        console.log(o);
        fetch('data.json', {
            cache: "reload"
          })
          .then(response => {
            return response.json();
          })
          .then(json => {
            //compare id
            plots = json;

            //console.log(plots);
            var i = plots.findIndex(p => p.id == o);
            console.log("i", i);

            document.getElementById("editID").value = plots[i]['id'];
            document.getElementById("editUid").value = plots[i]['szPlotIdUniqueKey'];
            document.getElementById('editP').value = plots[i]['fPrice'];
            document.getElementById('row').value = plots[i]['szRow'];
            document.getElementById('plot').value = plots[i]['szPlot'];
            document.getElementById('lot').value = plots[i]['szLot'];
            document.getElementById('lat').value = plots[i]['szCentroidLatitude'];
            document.getElementById('long').value = plots[i]['szCentroidLongtitude'];
            document.getElementById('northing').value = plots[i]['szCentroidNorthing'];
            document.getElementById('easting').value = plots[i]['szCentroidEasting'];
            document.getElementById('necLat').value = plots[i]['szNECornerLatitude'];
            document.getElementById('necLon').value = plots[i]['szNECornerLongitude'];
            document.getElementById('nwcLat').value = plots[i]['szNWCornerLatitude'];
            document.getElementById('nwcLong').value = plots[i]['szNWCornerLongitude'];
            document.getElementById('secLat').value = plots[i]['szSECornerLatitude'];
            document.getElementById('secLong').value = plots[i]['szSECornerLongitude'];
            document.getElementById('swcLat').value = plots[i]['szSWCornerLatitude'];
            document.getElementById('swcLong').value = plots[i]['szSWCornerLongitude'];
            document.getElementById('bPlot').value = plots[i]['boundaryPlot'];
            document.getElementById('cPlot').value = plots[i]['cornerPlot'];
            document.getElementById('pwithTax').value = plots[i]['PriceWithTaxWithExtra'];
          })
      }

      function onDel(o) {

        //fetchjson 
        fetch('data.json', {
            cache: "reload"
          })
          .then(response => {
            return response.json();
          })
          .then(json => {
            //compare id
            plots = json;

            //console.log(plots);
            var i = plots.findIndex(p => p.id == o);
            console.log("i", i);

            document.getElementById("delid").value = plots[i]['id'];
          })
        //index 
      }

      function onView(o) {

        console.log(o);
        fetch('data.json', {
            cache: "reload"
          })
          .then(response => {
            return response.json();
          })
          .then(json => {
            //compare id
            plots = json;

            //console.log(plots);
            var i = plots.findIndex(p => p.id == o);
            console.log("i", i);

            document.getElementById("vID").innerHTML = plots[i]['id'];
            document.getElementById("vUid").innerHTML = plots[i]['szPlotIdUniqueKey'];
            document.getElementById('vPrice').innerHTML = plots[i]['fPrice'];
            document.getElementById('vRow').innerHTML = plots[i]['szRow'];
            document.getElementById('vPlot').innerHTML = plots[i]['szPlot'];
            document.getElementById('vLot').innerHTML = plots[i]['szLot'];
            document.getElementById('vLat').innerHTML = plots[i]['szCentroidLatitude'];
            document.getElementById('vLong').innerHTML = plots[i]['szCentroidLongtitude'];
            document.getElementById('vNorthing').innerHTML = plots[i]['szCentroidNorthing'];
            document.getElementById('vEasting').innerHTML = plots[i]['szCentroidEasting'];
            document.getElementById('vNecLat').innerHTML = plots[i]['szNECornerLatitude'];
            document.getElementById('vNecLon').innerHTML = plots[i]['szNECornerLongitude'];
            document.getElementById('vNwcLat').innerHTML = plots[i]['szNWCornerLatitude'];
            document.getElementById('vNwcLong').innerHTML = plots[i]['szNWCornerLongitude'];
            document.getElementById('vSecLat').innerHTML = plots[i]['szSECornerLatitude'];
            document.getElementById('vSecLong').innerHTML = plots[i]['szSECornerLongitude'];
            document.getElementById('vSwcLat').innerHTML = plots[i]['szSWCornerLatitude'];
            document.getElementById('vSwcLong').innerHTML = plots[i]['szSWCornerLongitude'];
            document.getElementById('vBPlot').innerHTML = plots[i]['boundaryPlot'];
            document.getElementById('vCPlot').innerHTML = plots[i]['cornerPlot'];
            document.getElementById('vPwithTax').innerHTML = plots[i]['PriceWithTaxWithExtra'];
          })
      }

      function myMap() {
        var mapProp = {
          center: new google.maps.LatLng(51.508742, -0.120850),
          zoom: 12,
        };
        var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);
      }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAfUroDQu3kObHcbvYvCoGNbwfDPrAJ3aw&callback=myMap">
    </script>
  </div>
</body>

</html>