document.addEventListener("DOMContentLoaded", function() {
    const submenuToggle = document.querySelector('.submenu-toggle');

    if (submenuToggle) {
        submenuToggle.addEventListener('click', function() {
            const submenu = this.querySelector('.submenu');
            submenu.classList.toggle('show');
        });
    }
});
