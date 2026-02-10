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

    function switchBlogPage(pageNumber) {
        console.log("Switching to page " + pageNumber);
        const pages = document.querySelectorAll('.blog-page-content');
        const paginationItems = document.querySelectorAll('.pagination-item');
        const targetClass = 'blog-page-' + pageNumber;
        
        pages.forEach((page) => {
            if (page.classList.contains(targetClass)) {
                page.classList.remove('hidden');
                page.style.display = 'block';
                setTimeout(() => {
                    page.style.opacity = '1';
                }, 50);
            } else {
                page.style.opacity = '0';
                setTimeout(() => {
                    page.classList.add('hidden');
                    page.style.display = 'none';
                }, 300);
            }
        });

        // Update active state on buttons
        paginationItems.forEach(btn => {
            btn.classList.remove('active');
            if (parseInt(btn.getAttribute('data-target')) === pageNumber) {
                btn.classList.add('active');
            }
        });

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
