import './bootstrap';
import { initAnimations } from './animations/index.js';
import Alpine from 'alpinejs';

window.Alpine = Alpine;
Alpine.start();

document.addEventListener('DOMContentLoaded', () => {
    initAnimations();
});