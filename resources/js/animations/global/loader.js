import { gsap } from "gsap";
import { EASE } from "../config/easings";
import { prefersReducedMotion } from '../utils/reducedMotion';

export const initLoader = (onCompleteCallback) => {
    const loader = document.querySelector('.js-loader');
    if (!loader || prefersReducedMotion()) {
        if (loader) loader.style.display = 'none';
        if (onCompleteCallback) onCompleteCallback();
        return;
    }

    const tl = gsap.timeline({
        onComplete: () => {
            loader.style.display = 'none';
            if (onCompleteCallback) onCompleteCallback();
        }
    });

    // Assume loader has a logo and progress bar inside
    const logo = loader.querySelector('.js-loader-logo');
    const progress = loader.querySelector('.js-loader-progress');

    if (logo) {
        tl.fromTo(logo, 
            { opacity: 0, y: 20 }, 
            { opacity: 1, y: 0, duration: 1, ease: EASE.premium }
        );
    }
    
    if (progress) {
        tl.to(progress, { scaleX: 1, transformOrigin: 'left center', duration: 1.5, ease: EASE.industrial });
    }

    tl.to(loader, {
        yPercent: -100,
        duration: 0.8,
        ease: EASE.industrial,
        delay: 0.2
    });
};