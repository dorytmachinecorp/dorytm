import { gsap } from "gsap";
import { EASE } from "../config/easings";

export const initCards = () => {
    const cards = document.querySelectorAll('.js-hover-card');
    
    cards.forEach(card => {
        const img = card.querySelector('img');
        const arrow = card.querySelector('.js-card-arrow');
        
        card.addEventListener('mouseenter', () => {
            gsap.to(card, { y: -10, duration: 0.4, ease: EASE.premium });
            if (img) gsap.to(img, { scale: 1.05, duration: 0.6, ease: EASE.premium });
            if (arrow) gsap.to(arrow, { x: 5, duration: 0.3, ease: EASE.snap });
        });
        
        card.addEventListener('mouseleave', () => {
            gsap.to(card, { y: 0, duration: 0.4, ease: EASE.premium });
            if (img) gsap.to(img, { scale: 1, duration: 0.6, ease: EASE.premium });
            if (arrow) gsap.to(arrow, { x: 0, duration: 0.3, ease: EASE.snap });
        });
    });
};