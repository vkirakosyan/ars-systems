window.sr = ScrollReveal();

sr.reveal('.navbar-links,.navbar-link',
{
    viewFactor: 0.5,
}, 100);

$(window).load(() => {
    setTimeout(() => {
        document.getElementById("client-req").style.animation = "0.66s circletransform";
        document.getElementById("client-req-text").style.display = "block";
    },1000);

    setTimeout(() => {
        document.getElementById("project-planning").style.animation = "0.66s circletransform";
        document.getElementById("project-planning-text").style.display = "block";        
    },2000);

    setTimeout(() => {
        document.getElementById("design").style.animation = "0.66s circletransform";
        document.getElementById("design-text").style.display = "block";
    },3000);

    setTimeout(() => {
        document.getElementById("project-dev").style.animation = "0.66s circletransform";
        document.getElementById("project-dev-text").style.display = "block";
    },4000);
});