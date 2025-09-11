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
createIcons({ icons });

// GSAP Initialization
gsap.registerPlugin(ScrollTrigger, ScrollSmoother, TextPlugin);
