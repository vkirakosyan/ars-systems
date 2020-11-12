const currentPage = window.location.pathname.split('/')[1];

if(currentPage.length > 1)
{
    const currentLink = document.getElementById(`${currentPage}-link`);
    currentLink.focus();
}

$('.logo').on('click', () => {
    window.location = window.location.origin;
})