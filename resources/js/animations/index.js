import { gsap } from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";
import { initLenis } from "./global/smoothScroll";
import { initHeader } from "./global/header";
import { initLoader } from "./global/loader";
import { initHero } from "./modules/hero";
import { initReveals } from "./modules/reveals";
import { initCards } from "./modules/cards";
import { initCarousels } from "./modules/carousel";

gsap.registerPlugin(ScrollTrigger);

export const initAnimations = () => {
    // 1. Setup Scroll
    initLenis();

    // 2. Play Loader
    initLoader(() => {
        // Callback after loader finishes (or immediately if user prefers reduced motion)
        
        // 3. Initialize Global Elements
        initHeader();
        
        // 4. Play Hero Intro
        initHero();
        
        // 5. Setup Scroll Reveals & Interactions
        initReveals();
        initCards();
        initCarousels();
    });
};