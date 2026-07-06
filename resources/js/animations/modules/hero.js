import { gsap } from "gsap";
import { EASE } from "../config/easings";

export const initHero = () => {
    const hero = document.querySelector('.js-hero');
    if (!hero) return;

    const title = hero.querySelector('h1');
    const subtitle = hero.querySelector('.js-hero-subtitle');
    const buttons = hero.querySelectorAll('.js-hero-btn');
    const bgImage = hero.querySelector('.js-hero-bg');

    const tl = gsap.timeline();

    // Background Image Parallax on load
    if (bgImage) {
        gsap.set(bgImage, { scale: 1.1 });
        tl.to(bgImage, { scale: 1, duration: 2, ease: EASE.premium }, 0);
    }

    // Split text for h1 (rudimentary split without SplitText plugin)
    if (title) {
        const words = title.innerText.split(' ');
        title.innerHTML = '';
        words.forEach(word => {
            const span = document.createElement('span');
            span.style.display = 'inline-block';
            span.style.overflow = 'hidden';
            span.style.verticalAlign = 'top';
            span.innerHTML = `<span style="display:inline-block; transform:translateY(100%); opacity:0;" class="js-word-inner">${word}&nbsp;</span>`;
            title.appendChild(span);
        });

        const inners = title.querySelectorAll('.js-word-inner');
        tl.to(inners, {
            y: '0%',
            opacity: 1,
            duration: 1,
            stagger: 0.05,
            ease: EASE.industrial
        }, 0.2);
    }

    if (subtitle) {
        tl.fromTo(subtitle, 
            { opacity: 0, y: 20 },
            { opacity: 1, y: 0, duration: 1, ease: EASE.premium },
            "-=0.6"
        );
    }

    if (buttons.length) {
        tl.fromTo(buttons,
            { opacity: 0, y: 20 },
            { opacity: 1, y: 0, duration: 0.8, stagger: 0.1, ease: EASE.premium },
            "-=0.8"
        );
    }
};