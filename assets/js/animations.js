document.addEventListener(
  "DOMContentLoaded",
  () => {
    const observerOptions = {
      root: null,
      rootMargin: "0px",
      threshold: 0.1,
    };

    const observer = new IntersectionObserver(
      (entries, observer) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            entry.target.classList.add(
              "is-visible",
            );
            observer.unobserve(entry.target); // Only animate once
          }
        });
      },
      observerOptions,
    );

    // Elements to animate
    const animatedElements =
      document.querySelectorAll(
        ".card, .section-title, .section-subtitle, .feature-item, .hero-actions, .animate-on-scroll, .zigzag-section, .bank-grid-container",
      );

    animatedElements.forEach((el) => {
      el.classList.add("fade-in-up");
      observer.observe(el);
    });

    // FAQ Accordion
    const faqQuestions =
      document.querySelectorAll(
        ".faq-question",
      );
    faqQuestions.forEach((question) => {
      question.addEventListener("click", () => {
        const item = question.parentElement;

        // Toggle active class
        item.classList.toggle("active");

        // Optional: Close others
        /*
            faqQuestions.forEach(q => {
                if (q !== question) {
                    q.parentElement.classList.remove('active');
                }
            });
            */
      });
    });
    // Slider Logic
    const slides = document.querySelectorAll(".hero-slide");
    const dots = document.querySelectorAll(".dot");
    let currentSlideIndex = 0;
    const slideInterval = 5000; // 5 seconds

    function showSlide(index) {
      // Wrap around
      if (index >= slides.length) index = 0;
      if (index < 0) index = slides.length - 1;

      // Update classes
      slides.forEach((slide) => slide.classList.remove("active"));
      dots.forEach((dot) => dot.classList.remove("active"));

      slides[index].classList.add("active");
      if(dots[index]) dots[index].classList.add("active");
      
      currentSlideIndex = index;
    }

    // Auto Play
    let slideTimer = setInterval(() => {
        showSlide(currentSlideIndex + 1);
    }, slideInterval);

    // Manual Control via Dots
    dots.forEach((dot, index) => {
        dot.addEventListener('click', () => {
            clearInterval(slideTimer); // Stop auto play on interaction
            showSlide(index);
            // Restart timer
            slideTimer = setInterval(() => {
                showSlide(currentSlideIndex + 1);
            }, slideInterval);
        });
    });

  },
);
