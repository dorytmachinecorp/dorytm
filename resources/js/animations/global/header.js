import { gsap } from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";

export const initHeader = () => {
    const header = document.querySelector('header');
    if (!header) return;

    ScrollTrigger.create({
        start: 'top -100',
        end: 99999,
        onUpdate: (self) => {
            // Check if mobile menu is open via the Alpine-bound data attribute
            const isMobileOpen = header.getAttribute('data-mobile-open') === 'true';
            if (isMobileOpen) {
                gsap.to(header, { yPercent: 0, duration: 0.3, ease: 'power2.out' });
                return;
            }

            // Always show header at the very top of the page
            if (self.scroll() < 60) {
                gsap.to(header, { yPercent: 0, duration: 0.3, ease: 'power2.out' });
                return;
            }

            // self.direction: 1 = scrolling down (hide), -1 = scrolling up (show)
            if (self.direction === 1) {
                gsap.to(header, { yPercent: -105, duration: 0.35, ease: 'power2.inOut' });
            } else {
                gsap.to(header, { yPercent: 0, duration: 0.3, ease: 'power2.out' });
            }
        }
    });
};