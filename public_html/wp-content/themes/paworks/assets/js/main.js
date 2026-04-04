/**
 * PA Works Theme - Main JavaScript
 *
 * @package PAWorks
 */

(function() {
    'use strict';

    /**
     * Mobile Navigation Toggle
     */
    const headerToggle = document.querySelector('.pw-header__toggle');
    const headerNav = document.querySelector('.pw-header__nav');

    if (headerToggle && headerNav) {
        headerToggle.addEventListener('click', function() {
            headerNav.classList.toggle('is-open');
            this.classList.toggle('is-active');
        });

        // Close menu on outside click
        document.addEventListener('click', function(e) {
            if (!headerToggle.contains(e.target) && !headerNav.contains(e.target)) {
                headerNav.classList.remove('is-open');
                headerToggle.classList.remove('is-active');
            }
        });

        // Close menu on escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                headerNav.classList.remove('is-open');
                headerToggle.classList.remove('is-active');
            }
        });
    }

    /**
     * Sticky Header - Add shadow on scroll
     */
    const header = document.querySelector('.pw-header');
    if (header) {
        window.addEventListener('scroll', function() {
            if (window.scrollY > 10) {
                header.classList.add('is-scrolled');
            } else {
                header.classList.remove('is-scrolled');
            }
        });
    }

    /**
     * Smooth scroll for anchor links
     */
    document.querySelectorAll('a[href^="#"]').forEach(function(anchor) {
        anchor.addEventListener('click', function(e) {
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                e.preventDefault();
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });

})();
