window.onload = function () {
  var marcadores = [
    ["SGPS", 1.299917, 103.79218, "Singapur Sede"],
    ["SGPO", 1.28187, 103.8514, "Singapur Oficina"],
    ["SGH", 31.18894, 121.43751, "Shanghai"]
  ]; //array bidimensional de marcadores
  var hoyoSede = new google.maps.LatLng(1.299917, 103.79218);
  var mapOptions = {
    center: hoyoSede,
    zoom: 8,
    mapTypeId: google.maps.MapTypeId.ROADMAP,
  };
  var mapahoyoSede = new google.maps.Map(
    document.getElementById("mapaHoyo"),
    mapOptions
  );
  setMarkers(mapahoyoSede, marcadores);
  var infowindow;
  function setMarkers(mapahoyoSede, marcadores) {
    for (var i = 0; i < marcadores.length; i++) {
      var myLatLng = new google.maps.LatLng(marcadores[i][1], marcadores[i][2]);
      var marker = new google.maps.Marker({
        position: myLatLng,
        map: mapahoyoSede,
        title: marcadores[i][0],
      });
      /* Se utiliza una función autoinvocada para asegurarse de que las referencias a marker e i se mantengan correctamente dentro del alcance de
la función de escucha del evento */
      (function (marker, i) {
        google.maps.event.addListener(marker, "click", function () {
          if (!infowindow) {
            infowindow = new google.maps.InfoWindow();
          }
          infowindow.setContent(marcadores[i][3]);
          infowindow.open(mapahoyoSede, marker);
        }); // fin function
      })(marker, i);
    } // fin for
  } //fin function setmarkers
}; //fin function principal
