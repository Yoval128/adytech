// Animacion del menu lateral
document.querySelectorAll('.menu-toggle').forEach(item => {
    item.addEventListener('click', () => {
        const submenu = item.nextElementSibling;

        submenu.style.display = submenu.style.display === 'block' ? 'none' : 'block';
    });
});

