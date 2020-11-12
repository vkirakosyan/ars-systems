window.sr = ScrollReveal();

sr.reveal('.navbar-links,.navbar-link,.team-img,.team-hover',
{
    viewFactor: 0.5,
}, 100);

// $('.team-hover[src*="armando"]').on('dblclick', () => {
//     const communist_elephant = `${window.location.origin}/images/Media/communist_elephant.jpeg`;
//     window.open(communist_elephant,'_blank');
// });

// $('.team-hover[src*="armando"]').parent().find('.info-card').on('dblclick', function(){
//     const maradona = 'https://minuto7com.files.wordpress.com/2017/01/diego-armando-maradona-dam.jpg?w=270';
//     const maradona_hover = 'https://www.librimondadori.it/content/uploads/2017/08/0007641FAU-270x270.jpg';
//     $(this).find('h1').text('Diego Armando');
//     $(this).find('h3').text('World Cup Winner');
//     $(this).parent().find('.team-img').attr('src',maradona);
//     $(this).parent().find('.team-hover').attr('src',maradona_hover);
// });