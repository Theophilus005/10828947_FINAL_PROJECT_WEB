
/** toggles mobile menu */

function toggleMenu() {
    const menulinks = document.querySelectorAll('.mobile-menu-links');
    const mobileMenu = document.querySelector('.mobile-menu');    
    
    mobileMenu.classList.toggle('mobile-menu-toggle');
    /*menulinks.forEach(link=> {
        link.classList.toggle('fade');
    })*/
}
