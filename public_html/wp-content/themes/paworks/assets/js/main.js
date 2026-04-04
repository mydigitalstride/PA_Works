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
     * What We Do — Accordion
     */
    document.querySelectorAll('[data-accordion]').forEach(function(item) {
        const trigger = item.querySelector('.pw-whatwedo__accordion-trigger');
        const body    = item.querySelector('.pw-whatwedo__accordion-body');

        if (!trigger) return;

        trigger.addEventListener('click', function() {
            const isOpen = item.classList.contains('is-open');

            // Close all siblings first
            const siblings = item.parentElement.querySelectorAll('[data-accordion]');
            siblings.forEach(function(sib) {
                sib.classList.remove('is-open');
                const sibTrigger = sib.querySelector('.pw-whatwedo__accordion-trigger');
                const sibBody    = sib.querySelector('.pw-whatwedo__accordion-body');
                if (sibTrigger) sibTrigger.setAttribute('aria-expanded', 'false');
                if (sibBody)    sibBody.hidden = true;
            });

            // Toggle clicked item
            if (!isOpen) {
                item.classList.add('is-open');
                trigger.setAttribute('aria-expanded', 'true');
                if (body) body.hidden = false;
            }
        });
    });

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
