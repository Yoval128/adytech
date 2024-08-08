document.addEventListener("DOMContentLoaded", function() {
    const submenuToggles = document.querySelectorAll('.submenu-toggle');

    submenuToggles.forEach(function(toggle) {
        toggle.addEventListener('click', function() {
            const submenu = this.querySelector('.submenu');
            submenu.classList.toggle('show');
        });
    });
});
