function initMap() {
  var uluru = {lat: 40.1793269, lng: 44.509618};
  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 17,
    center: uluru
  });
  var marker = new google.maps.Marker({
    position: uluru,
    map: map
  });
}

window.sr = ScrollReveal();

sr.reveal('.navbar-links,.navbar-link,.contact,.animated > p,.contact-info-map,form,.map-social-media,.social-media',
{
  viewFactor: 0.5,
}, 100)

$(window).load(() => {
	$('.contact-info-card').addClass('contact-info-card-hover');
})

$('.icon').on('click',function(){
  window.open($(this).attr('data-link'),'_blank');
});