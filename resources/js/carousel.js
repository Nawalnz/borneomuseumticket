document.addEventListener('DOMContentLoaded', () => {
    const carousel = document.getElementById('carouselExample');
    const slides = carousel.querySelectorAll('[data-carousel-item]');
    const nextButton = carousel.querySelector('[data-carousel-next]');
    const prevButton = carousel.querySelector('[data-carousel-prev]');
    let currentIndex = 0;
    const totalSlides = slides.length;

    const updateSlides = () => {
        slides.forEach((slide, index) => {
            slide.classList.add('hidden');
            slide.classList.remove('block');
            if (index === currentIndex) {
                slide.classList.add('block');
                slide.classList.remove('hidden');
            }
        });
    };

    nextButton.addEventListener('click', () => {
        currentIndex = (currentIndex + 1) % totalSlides;
        updateSlides();
    });

    prevButton.addEventListener('click', () => {
        currentIndex = (currentIndex - 1 + totalSlides) % totalSlides;
        updateSlides();
    });

    // Optional: Auto-slide every 5 seconds
    setInterval(() => {
        currentIndex = (currentIndex + 1) % totalSlides;
        updateSlides();
    }, 5000);

    // Initialize the first slide as visible
    updateSlides();
});
