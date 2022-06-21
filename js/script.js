
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

function myFunction() {
    var input, filter, table, tr, td, i,j, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");
    for (i = 1; i < tr.length; i++) {
        // Hide the row initially.
        tr[i].style.display = "none";
    
        td = tr[i].getElementsByTagName("td");
        for (var j = 0; j < td.length; j++) {
          cell = tr[i].getElementsByTagName("td")[j];
          if (cell) {
            if (cell.innerHTML.toUpperCase().indexOf(filter) > -1) {
              tr[i].style.display = "";
              break;
            } 
          }
        }
    }
  }
