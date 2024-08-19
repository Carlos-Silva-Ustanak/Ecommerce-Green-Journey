/* document.addEventListener('DOMContentLoaded', () => {
    const darkMode = localStorage.getItem('darkMode') === 'true';
    const sunIcon = document.getElementById('sun-icon');
    const moonIcon = document.getElementById('moon-icon');
    const body = document.body;

    if (darkMode) {
        body.classList.add('dark');
        sunIcon.classList.add('hidden');
        moonIcon.classList.remove('hidden');
    } else {
        body.classList.remove('dark');
        sunIcon.classList.remove('hidden');
        moonIcon.classList.add('hidden');
    }

    document.getElementById('theme-toggle-button').addEventListener('click', () => {
        const isDark = body.classList.toggle('dark');
        localStorage.setItem('darkMode', isDark);
        sunIcon.classList.toggle('hidden', isDark);
        moonIcon.classList.toggle('hidden', !isDark);
    });
});
 */

document.addEventListener('DOMContentLoaded', function () {
    const themeToggleButton = document.getElementById('theme-toggle-button');
    const mobileMenuToggle = document.getElementById('mobile-menu-toggle');
    const mobileSidebar = document.getElementById('mobile-sidebar');
    const closeSidebarButton = document.getElementById('close-sidebar');
    const sunIcon = document.getElementById('sun-icon');
    const moonIcon = document.getElementById('moon-icon');

    // Check the saved theme in local storage and apply it
    const currentTheme = localStorage.getItem('theme') || 'light';
    document.body.classList.add(currentTheme);
    sunIcon.classList.toggle('hidden', currentTheme === 'dark');
    moonIcon.classList.toggle('hidden', currentTheme === 'light');

    // Theme Toggle Logic
    themeToggleButton.addEventListener('click', () => {
        const newTheme = document.body.classList.contains('dark') ? 'light' : 'dark';
        document.body.classList.remove('dark', 'light');
        document.body.classList.add(newTheme);
        localStorage.setItem('theme', newTheme);
        sunIcon.classList.toggle('hidden', newTheme === 'dark');
        moonIcon.classList.toggle('hidden', newTheme === 'light');
    });

    // Mobile Menu Toggle Logic
    mobileMenuToggle.addEventListener('click', () => {
        const isSidebarVisible = !mobileSidebar.classList.contains('hidden');
        if (isSidebarVisible) {
            mobileSidebar.classList.add('hidden');
        } else {
            mobileSidebar.classList.remove('hidden');
            // Ensure the sidebar is closed if user navigates to another page
            window.addEventListener('click', function(event) {
                if (!mobileSidebar.contains(event.target) && !mobileMenuToggle.contains(event.target)) {
                    mobileSidebar.classList.add('hidden');
                }
            });
        }
    });

    // Close Mobile Sidebar
    closeSidebarButton.addEventListener('click', () => {
        mobileSidebar.classList.add('hidden');
    });
});
