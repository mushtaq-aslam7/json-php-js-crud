
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

function searchTable() {
    var input, filter, table, tr, td, i,j, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");
    for (i = 1; i < tr.length; i++) {
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

  function sortTable(n) {
    var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
    table = document.getElementById("myTable");
    switching = true;
    // Set the sorting direction to ascending:
    dir = "asc";
    /* Make a loop that will continue until
    no switching has been done: */
    while (switching) {
      // Start by saying: no switching is done:
      switching = false;
      rows = table.rows;
      /* Loop through all table rows (except the
      first, which contains table headers): */
      for (i = 1; i < (rows.length - 1); i++) {
        // Start by saying there should be no switching:
        shouldSwitch = false;
        /* Get the two elements you want to compare,
        one from current row and one from the next: */
        x = rows[i].getElementsByTagName("TD")[n];
        y = rows[i + 1].getElementsByTagName("TD")[n];
        /* Check if the two rows should switch place,
        based on the direction, asc or desc: */
        if (isNaN(x.innerHTML)) {
          if (dir == "asc") {
            if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
              // If so, mark as a switch and break the loop:
              shouldSwitch = true;
              break;
            }
          } else if (dir == "desc") {
            if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
              // If so, mark as a switch and break the loop:
              shouldSwitch = true;
              break;
            }
          }
        }
        else
        {
        if (dir == "asc") {
          if (Number(x.innerHTML) > Number(y.innerHTML)) {
            // If so, mark as a switch and break the loop:
            shouldSwitch = true;
            break;
          }
        } else if (dir == "desc") {
          if (Number(x.innerHTML) < Number(y.innerHTML)) {
            // If so, mark as a switch and break the loop:
            shouldSwitch = true;
            break;
          }
        }
      }
      }
      if (shouldSwitch) {
        /* If a switch has been marked, make the switch
        and mark that a switch has been done: */
        rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
        switching = true;
        // Each time a switch is done, increase this count by 1:
        switchcount ++;
      } else {
        /* If no switching has been done AND the direction is "asc",
        set the direction to "desc" and run the while loop again. */
        if (switchcount == 0 && dir == "asc") {
          dir = "desc";
          switching = true;
        }
      }
    }
  }

  function toggle(source) {
    checkboxes = document.getElementsByName('foo[]');
      for(var i=0, n=checkboxes.length;i<n;i++) {
      checkboxes[i].checked = source.checked;
    }
  }
  
  function onBdel() {
    //check the checked
    let ids=[];
    let c = document.getElementsByName("foo[]");
    console.log(c);
     c.forEach(element => {
      if(element.checked)
      {
        console.log(element.value);
        ids.push(element.value);
      }
    });
    $.ajax({
      type: 'post',
      url: 'deleteBulk.php',
      data: {ids: ids},
      success: function (data) {
       console.log(data);
       location.reload();
    }
      });
     
  }
  
  
  