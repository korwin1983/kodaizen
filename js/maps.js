function initMap() {
  var kodaizen = {lat: 43.613060, lng: 1.396900};
  var map = new google.maps.Map(document.getElementById('map'), {
    backgroundColor:"#3aaa35",
    scrollwheel:false,
    zoom: 12,
    center: kodaizen
  });
  var image = "http://www.kodaizen.fr/img/maps_marker.png";
  var marker = new google.maps.Marker({
    position: kodaizen,
    map: map,
    icon: image
  });
}
