import './bootstrap';
import Alpine from 'alpinejs';
import { createIcons, icons } from 'lucide';
import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';
// ScrollSmoother requires Scrolltrigger
import { ScrollSmoother } from 'gsap/ScrollSmoother';
import { TextPlugin } from 'gsap/TextPlugin';


// Alpine JS
window.Alpine = Alpine;
Alpine.start();

// Lucide Icons
const lucideIcons = createIcons({ icons });

function renderLucideFromDataAttributes() {
    document.querySelectorAll('[data-lucide]').forEach(el => {
        const name = el.getAttribute('data-lucide');
        if (!name) return;

        // Ubah nama ke PascalCase karena Lucide npm pakai PascalCase
        const iconName = name
            .split('-')
            .map(part => part.charAt(0).toUpperCase() + part.slice(1))
            .join('');

        const Icon = lucideIcons[iconName];
        if (!Icon) {
            console.warn(`Lucide icon "${iconName}" not found.`);
            return;
        }

        const svg = Icon({
            width: el.clientWidth || 24,
            height: el.clientHeight || 24,
            class: el.className // pertahankan class Tailwind
        });
        el.replaceWith(svg);
    });
}

document.addEventListener('DOMContentLoaded', renderLucideFromDataAttributes);

// GSAP Initialization
gsap.registerPlugin(ScrollTrigger, ScrollSmoother, TextPlugin);