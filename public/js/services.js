window.sr = ScrollReveal();

sr.reveal('.navbar-links,.navbar-link,.custom-progress,.custom-bar', 
{
    viewFactor: 0.5,
}, 100);

$('.custom-bar').each(function () {
    var $this = $(this);
    jQuery({ Counter: 0 }).animate({ Counter: parseInt($this.text()) }, {
      duration: 3500,
      easing: 'swing',
      step: function () {
        $this.text(Math.ceil(this.Counter) + '%');
      }
    });
});