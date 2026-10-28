/**
 * Application Entry Point
 * Coffee Break Landing Page
 */

// 1. HTTP Client & Axios Setup
import './bootstrap';

// 2. Darkmode / Theme Handler
import './darkmode';

// 3. Alpine.js Framework
import Alpine from 'alpinejs';

window.Alpine = Alpine;
Alpine.start();