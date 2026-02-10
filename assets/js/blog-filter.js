document.addEventListener('DOMContentLoaded', function() {
    // Only run if we are on a page with the blog grid
    const blogContainer = document.querySelector('.pxl-blog-container');
    if (!blogContainer) return;

    // Attach click event listeners to pagination items
    const paginationItems = document.querySelectorAll('.pagination-item');
    
    paginationItems.forEach(item => {
        item.addEventListener('click', function(e) {
            e.preventDefault();
            const pageNum = parseInt(this.textContent.trim());
            if (pageNum) {
                switchBlogPage(pageNum);
            }
        });
    });

    // --- UPGRADE: Robust Initialization ---
    function initBlogPagination() {
        console.log("Blog filter initializing...");
        const pages = document.querySelectorAll('.blog-page-content');
        
        pages.forEach((page) => {
            if (page.classList.contains('blog-page-1')) { 
                page.classList.remove('hidden');
                page.style.display = 'block';
                page.style.opacity = '1';
            } else {
                page.classList.add('hidden');
                page.style.display = 'none';
                page.style.opacity = '0';
            }
        });
        console.log("Found " + pages.length + " pages. Page 1 active.");

        // Re-attach listeners based on target
        const paginationItems = document.querySelectorAll('.pagination-item');
        paginationItems.forEach(item => {
            item.addEventListener('click', function(e) {
                e.preventDefault();
                const targetPage = this.getAttribute('data-target');
                if (targetPage) {
                    switchBlogPage(parseInt(targetPage));
                }
            });
        });
    }

    initBlogPagination();

    let isAnimating = false;

    function switchBlogPage(pageNumber) {
        if (isAnimating) return;
        
        const activeItem = document.querySelector('.pagination-item.active');
        if (activeItem && parseInt(activeItem.getAttribute('data-target')) === pageNumber) return;

        console.log("Switching to page " + pageNumber);
        isAnimating = true;

        const pages = document.querySelectorAll('.blog-page-content');
        const paginationItems = document.querySelectorAll('.pagination-item');
        const targetClass = 'blog-page-' + pageNumber;
        
        // 1. Fade out CURRENT page first
        let currentPage = null;
        pages.forEach(p => {
            if (!p.classList.contains('hidden')) currentPage = p;
        });

        if (currentPage) {
            currentPage.style.opacity = '0';
            currentPage.style.transform = 'translateY(-10px) scale(0.98)';
        }

        // 2. Wait for fade out, then swap
        setTimeout(() => {
            pages.forEach((page) => {
                if (page.classList.contains(targetClass)) {
                    page.classList.remove('hidden');
                    page.style.display = 'block';
                    // Trigger reflow
                    page.offsetHeight; 
                    page.style.opacity = '1';
                    page.style.transform = 'translateY(0) scale(1)';
                } else {
                    page.classList.add('hidden');
                    page.style.display = 'none';
                }
            });

            // Update active state on buttons
            paginationItems.forEach(btn => {
                btn.classList.remove('active');
                if (parseInt(btn.getAttribute('data-target')) === pageNumber) {
                    btn.classList.add('active');
                }
            });

            isAnimating = false;
        }, 300); // Wait 300ms for old page to fade out partially

        // Smooth scroll
        const container = document.querySelector('.pxl-blog-container');
        if (container) {
            const headerOffset = 120;
            const elementPosition = container.getBoundingClientRect().top + window.pageYOffset;
            window.scrollTo({
                top: elementPosition - headerOffset,
                behavior: "smooth"
            });
        }
    }
});
