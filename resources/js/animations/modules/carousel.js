import Splide from '@splidejs/splide';

export const initCarousels = () => {
    const carousels = document.querySelectorAll('.splide');
    
    carousels.forEach(carousel => {
        new Splide(carousel, {
            type   : 'loop',
            perPage: 3,
            perMove: 1,
            gap    : '2rem',
            pagination: false,
            breakpoints: {
                1024: { perPage: 2 },
                640 : { perPage: 1 },
            }
        }).mount();
    });
};