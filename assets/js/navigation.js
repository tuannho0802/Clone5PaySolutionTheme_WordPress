document.addEventListener('DOMContentLoaded', () => {
    const menuToggle = document.getElementById('menu-toggle');
    const primaryMenu = document.getElementById('site-navigation');
    const body = document.body;

    if (menuToggle && primaryMenu) {
        menuToggle.addEventListener('click', () => {
            const isExpanded = menuToggle.getAttribute('aria-expanded') === 'true';
            
            menuToggle.setAttribute('aria-expanded', !isExpanded);
            primaryMenu.classList.toggle('toggled');
            body.classList.toggle('menu-open'); // Prevent scrolling when menu is open
        });

        // Close menu when clicking outside
        document.addEventListener('click', (event) => {
            if (!primaryMenu.contains(event.target) && !menuToggle.contains(event.target) && primaryMenu.classList.contains('toggled')) {
                primaryMenu.classList.remove('toggled');
                menuToggle.setAttribute('aria-expanded', 'false');
                body.classList.remove('menu-open');
            }
        });
    }
});
