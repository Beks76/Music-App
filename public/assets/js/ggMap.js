// API Google Map
function siteMap() {
  var siteCenter = new google.maps.LatLng(20.989644, 105.794729);
  var mapProp = {center:siteCenter, zoom:15, scrollwheel:true, draggable:true, mapTypeId:google.maps.MapTypeId.ROADMAP};
  var map = new google.maps.Map(document.getElementById("ggMap"),mapProp);
  var marker = new google.maps.Marker({position:siteCenter});
  marker.setMap(map);
}