document.addEventListener('DOMContentLoaded', function() {
    /* =========================================
       1. Smart Sticky Header (Hide down, Show up)
       ========================================= */
    const header = document.querySelector('.site-header');
    const scrollTopBtn = document.getElementById('scroll-to-top');
    let lastScrollTop = 0;
    const delta = 5; // Minimum scroll amount to trigger change
    const headerHeight = header ? header.offsetHeight : 90;

    // Check for elements
    if (header || scrollTopBtn) {
        window.addEventListener('scroll', function() {
            let scrollTop = window.pageYOffset || document.documentElement.scrollTop;

            // Make sure they scroll more than delta
            if (Math.abs(lastScrollTop - scrollTop) <= delta)
                return;

            // --- 1. Smart Header Logic ---
            if (header) {
                if (scrollTop > lastScrollTop && scrollTop > headerHeight) {
                    // Scroll Down -> Hide Header
                    header.classList.remove('nav-down');
                    header.classList.add('nav-up');
                } else {
                    // Scroll Up -> Show Header
                    if (scrollTop + window.innerHeight < document.body.scrollHeight) {
                        header.classList.remove('nav-up');
                        header.classList.add('nav-down');
                    }
                }
            }
            
            // --- 2. Scroll To Top Button Logic ---
            if (scrollTopBtn) {
                if (scrollTop > 300) { // Threshold
                    if (scrollTop > lastScrollTop) {
                        // Scroll Down -> Show Button
                        scrollTopBtn.classList.add('btn-show');
                    } else {
                        // Scroll Up -> Hide Button
                        scrollTopBtn.classList.remove('btn-show');
                    }
                } else {
                    // At Top -> Hide Button
                    scrollTopBtn.classList.remove('btn-show');
                }
            }

            lastScrollTop = scrollTop;
        });
    }

    // Scroll to Top Click Event
    if (scrollTopBtn) {
        scrollTopBtn.addEventListener('click', function(e) {
            e.preventDefault();
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    }

    /* =========================================
       2. Cursor Tracking Circle (Soft Blur Effect)
       ========================================= */
    // Create the cursor element dynamically
    const cursor = document.createElement('div');
    cursor.classList.add('custom-cursor');
    document.body.appendChild(cursor);

    let mouseX = 0;
    let mouseY = 0;
    let cursorX = 0;
    let cursorY = 0;

    // Update mouse coordinates on move
    document.addEventListener('mousemove', function(e) {
        mouseX = e.clientX;
        mouseY = e.clientY;
    });

    // Animate the cursor movement smoothly
    function animateCursor() {
        // Linear interpolation for smooth trailing
        // Increase 0.1 to make it faster, decrease to make it slower/smoother
        const speed = 0.5;
        
        cursorX += (mouseX - cursorX) * speed;
        cursorY += (mouseY - cursorY) * speed;

        cursor.style.transform = `translate3d(${cursorX}px, ${cursorY}px, 0)`;

        requestAnimationFrame(animateCursor);
    }

    animateCursor();

    // Hide cursor when leaving window
    document.addEventListener('mouseleave', () => {
        cursor.style.opacity = '0';
    });

    // Show cursor when entering window
    document.addEventListener('mouseenter', () => {
        cursor.style.opacity = '1';
    });
});
