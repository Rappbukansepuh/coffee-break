/**
 * Dark Mode Theme Handler
 * Supports localStorage persistence and system color-scheme detection.
 */
const THEME_KEY = 'coffeebreak_theme';

export function initTheme() {
    const savedTheme = localStorage.getItem(THEME_KEY);
    const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;

    if (savedTheme === 'dark' || (!savedTheme && prefersDark)) {
        document.documentElement.classList.add('dark');
    } else {
        document.documentElement.classList.remove('dark');
    }
}

export function toggleTheme() {
    const isDark = document.documentElement.classList.toggle('dark');
    localStorage.setItem(THEME_KEY, isDark ? 'dark' : 'light');
    return isDark;
}

// Auto-run on DOM ready
if (typeof document !== 'undefined') {
    initTheme();
}

window.toggleTheme = toggleTheme;
