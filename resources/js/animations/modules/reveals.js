import { gsap } from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";
import { EASE } from "../config/easings";
import { prefersReducedMotion } from '../utils/reducedMotion';

export const initReveals = () => {
    if (prefersReducedMotion()) return;

    const fadeUps = document.querySelectorAll('[data-reveal="fade-up"]');
    
    fadeUps.forEach((el) => {
        gsap.fromTo(el, 
            { opacity: 0, y: 50 },
            {
                opacity: 1, 
                y: 0,
                duration: 1,
                ease: EASE.premium,
                scrollTrigger: {
                    trigger: el,
                    start: "top 85%", // when top of element hits 85% of viewport
                    toggleActions: "play none none reverse" // play on enter, reverse on leave back
                }
            }
        );
    });

    const staggers = document.querySelectorAll('[data-reveal="stagger"]');
    staggers.forEach((container) => {
        const children = container.children;
        gsap.fromTo(children,
            { opacity: 0, y: 30 },
            {
                opacity: 1,
                y: 0,
                duration: 0.8,
                stagger: 0.1,
                ease: EASE.premium,
                scrollTrigger: {
                    trigger: container,
                    start: "top 85%",
                    toggleActions: "play none none reverse"
                }
            }
        );
    });
    
    const scaleImages = document.querySelectorAll('[data-reveal="scale"]');
    scaleImages.forEach((img) => {
        gsap.fromTo(img,
            { scale: 1.1, opacity: 0 },
            {
                scale: 1,
                opacity: 1,
                duration: 1.5,
                ease: EASE.industrial,
                scrollTrigger: {
                    trigger: img,
                    start: "top 90%",
                    toggleActions: "play none none reverse"
                }
            }
        );
    });
};