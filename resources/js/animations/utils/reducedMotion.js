export const prefersReducedMotion = () => {
    const mediaQuery = window.matchMedia('(prefers-reduced-motion: reduce)');
    return mediaQuery && mediaQuery.matches;
};