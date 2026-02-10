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
    let cursorScale = 1;

    // Update mouse coordinates on move
    document.addEventListener(
      "mousemove",
      function (e) {
        mouseX = e.clientX;
        mouseY = e.clientY;
      },
    );

    // Animate the cursor movement smoothly
    function animateCursor() {
      // Linear interpolation for smooth trailing
      // Increase 0.1 to make it faster, decrease to make it slower/smoother
      const speed = 0.5;

      cursorX += (mouseX - cursorX) * speed;
      cursorY += (mouseY - cursorY) * speed;

      cursor.style.transform = `translate3d(${cursorX}px, ${cursorY}px, 0) scale(${cursorScale})`;

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

    /* =========================================
       3. Fireworks Effect on Hover
       ========================================= */
    const interactiveSelectors = 'a, button, .btn, input, select, textarea, .card, .nav-link, .blog-post-card, .menu-item, .wp-block-button__link, .wp-block-image, .faq-question';

    // Particle Factory
    function createParticle(x, y, type = 'trail') {
        const particle = document.createElement('div');
        particle.classList.add('firework-particle');
        
        // Brand Colors: Blue, Dark Blue, White, Orange, Light Orange
        const colors = ['#1e5ba8', '#004a8f', '#ffffff', '#ff6600', '#ff8533'];
        const color = colors[Math.floor(Math.random() * colors.length)];
        
        const size = type === 'burst' ? Math.random() * 4 + 2 : Math.random() * 3 + 1;
        
        // Inline Styles for performance
        particle.style.width = `${size}px`;
        particle.style.height = `${size}px`;
        particle.style.backgroundColor = color;
        particle.style.position = 'fixed';
        particle.style.left = `${x}px`;
        particle.style.top = `${y}px`;
        particle.style.borderRadius = '50%';
        particle.style.pointerEvents = 'none';
        particle.style.zIndex = '9999';
        particle.style.transform = 'translate(-50%, -50%)'; // Center on cursor
        
        document.body.appendChild(particle);

        // Physics
        const angle = Math.random() * Math.PI * 2;
        const velocity = type === 'burst' ? Math.random() * 6 + 3 : Math.random() * 3 + 1; // Faster
        const lifetime = type === 'burst' ? 800 : 500;

        const animation = particle.animate([
            { transform: `translate(-50%, -50%) translate(0, 0) scale(1)`, opacity: 1 },
            { transform: `translate(-50%, -50%) translate(${Math.cos(angle) * velocity * 25}px, ${Math.sin(angle) * velocity * 25}px) scale(0)`, opacity: 0 }
        ], {
            duration: lifetime,
            easing: 'cubic-bezier(0, .9, .57, 1)',
        });

        animation.onfinish = () => particle.remove();
    }

    // Hover Detection & Trail
    let isHovering = false;

    document.addEventListener('mousemove', (e) => {
        const target = e.target.closest(interactiveSelectors);
        
        if (target) {
            isHovering = true;
            cursor.style.opacity = '0'; // Hide orange circle cursor
            cursorScale = 1; 
            
            // Create Trail Particles - More frequent
            if (Math.random() > 0.5) { 
                createParticle(e.clientX, e.clientY, 'trail');
            }
        } else {
            isHovering = false;
            cursor.style.opacity = '1'; // Show cursor again
            cursorScale = 1;
            cursor.style.mixBlendMode = 'normal';
        }
    });

    // Burst on Enter
    document.addEventListener('mouseover', (e) => {
        if (e.target.matches(interactiveSelectors) || e.target.closest(interactiveSelectors)) {
             const target = e.target.closest(interactiveSelectors);
             if (target && !target.dataset.hovered) {
                 target.dataset.hovered = 'true';
                 target.addEventListener('mouseleave', () => { delete target.dataset.hovered; }, { once: true });
                 
                 // Create Burst - More particles
                 for(let i=0; i<12; i++) {
                     createParticle(e.clientX, e.clientY, 'burst');
                 }
             }
        }
    });
});
