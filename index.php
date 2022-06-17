<?php
$getfile = file_get_contents('data.json');
$jsonfile = json_decode($getfile);
?>
<html>

<head>
  <title> PHP CURD - JSON </title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</head>

<body style="background-color: white;">

  <style>
    * {
      color: black;
    }
  </style><br>

  <div class="container">
    <h3>PHP CRUD using JSON &nbsp; <a class="btn btn-outline-primary" href="add.php">Add</a></h3>

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
          <th scope="col">Centroid Northing</th>
          <th scope="col">Centroid Easting</th>
          <th scope="col">NE Corner Latitude</th>
          <th scope="col">NE Corner Longitude</th>
          <th scope="col">NW Corner Latitude</th>
          <th scope="col">NW Corner Longitude</th>
          <th scope="col">SE Corner Latitude</th>
          <th scope="col">SE Corner Longitude</th>
          <th scope="col">SW Corner Latitude</th>
          <th scope="col">SW Corner Longitude</th>
          <th scope="col">Boundary Plot</th>
          <th scope="col">Corner Plot</th>
          <th scope="col">Price With Tax</th>
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
            <td><?php echo $var->szCentroidNorthing; ?></td>
            <td><?php echo $var->szCentroidEasting; ?></td>
            <td><?php echo $var->szNECornerLatitude; ?></td>
            <td><?php echo $var->szNECornerLongitude; ?></td>
            <td><?php echo $var->szNWCornerLatitude; ?></td>
            <td><?php echo $var->szNWCornerLongitude; ?></td>
            <td><?php echo $var->szSECornerLatitude; ?></td>
            <td><?php echo $var->szSECornerLongitude; ?></td>
            <td><?php echo $var->szSWCornerLatitude; ?></td>
            <td><?php echo $var->szSWCornerLongitude; ?></td>
            <td><?php echo $var->boundaryPlot; ?></td>
            <td><?php echo $var->cornerPlot; ?></td>
            <td><?php echo $var->PriceWithTaxWithExtra; ?></td>
            <td>
              <a class="btn btn-outline-warning" onclick="onEdit(<?php echo $var->id; ?>)" data-bs-toggle="modal" data-bs-target="#edit">Edit</a>

              <a class="btn btn-outline-danger" onclick="onDel(<?php echo $var->id; ?>)" data-bs-toggle="modal" data-bs-target="#del">Delete</a>
              <a class="btn btn-outline-danger" onclick="onView(<?php echo $var->id; ?>)" data-bs-toggle="modal" data-bs-target="#view">View</a>
            </td>
          </tr>
        <?php endforeach; ?>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tbody>
    </table>
    <!-- Modal view -->
    <div class="modal fade" id="view" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal view</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            ...
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
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
            <button type="submit" name="update" class="btn btn-warning" >Update</button>
          </div>
          </form>
        </div>
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
    }
  </script>

</body>

</html>