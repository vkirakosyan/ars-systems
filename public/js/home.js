$(window).load(() => {
	$('.owl-carousel').owlCarousel({
		items:1,
		merge:true,
		loop:true,
		margin:10,
		video:true,
		center:true,
		responsive:{
			480:{
				items:2
			},
			600:{
				items:4
			}
		}
	});
	
	setTimeout(() => { 
		try
		{
			new Photostack(document.getElementById('photostack-1'), {
				callback: item => {
					//console.log(item);
				}
			});
		}
		catch(e)
		{
	
		} 
	}, 300);

	window.sr = ScrollReveal();
	
	sr.reveal('.navbar-links,.navbar-link,.arrow,.content,.first-row-pic,.grid,.on-youtube',{
		viewFactor: 0.3,
		origin: 'top'
	});
	
	$('.arrow').on('click', () => {
		document.querySelector('.content').scrollIntoView({block: 'start', behavior: 'smooth'});
	});
	
	$('.green-panel').addClass('green-panel-hover');

	$('.img-adjusted').on('click', function(){
		const url = $(this).attr('data-client-url');
		window.open(url,'_blank');
	});
})