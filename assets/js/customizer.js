/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

(function ($) {

    // Hero Badge Text
    wp.customize('ssmc_hero_badge_text', function (value) {
        value.bind(function (to) {
            $('#hero-badge').text(to);
        });
    });

    // Hero Headline Part 1
    wp.customize('ssmc_hero_headline_1', function (value) {
        value.bind(function (to) {
            $('#hero-headline-1').text(to);
        });
    });

    // Hero Headline Part 2
    wp.customize('ssmc_hero_headline_2', function (value) {
        value.bind(function (to) {
            $('#hero-headline-2').text(to);
        });
    });

    // Hero Description
    wp.customize('ssmc_hero_description', function (value) {
        value.bind(function (to) {
            $('#hero-description').text(to);
        });
    });

    // Hero Primary Button Text
    wp.customize('ssmc_hero_btn1_text', function (value) {
        value.bind(function (to) {
            $('#hero-btn1').text(to);
        });
    });

    // Hero Secondary Button Text
    wp.customize('ssmc_hero_btn2_text', function (value) {
        value.bind(function (to) {
            $('#hero-btn2').text(to);
        });
    });

    // Chairman Name
    wp.customize('ssmc_chairman_name', function (value) {
        value.bind(function (to) {
            $('#leadership-name-1').text(to);
        });
    });

    // Chairman Quote
    wp.customize('ssmc_chairman_quote', function (value) {
        value.bind(function (to) {
            $('#leadership-quote-1').text(to);
        });
    });

    // Campus Chief Name
    wp.customize('ssmc_chief_name', function (value) {
        value.bind(function (to) {
            $('#leadership-name-2').text(to);
        });
    });

    // Campus Chief Quote
    wp.customize('ssmc_chief_quote', function (value) {
        value.bind(function (to) {
            $('#leadership-quote-2').text(to);
        });
    });

    // Intro Badge
    wp.customize('ssmc_intro_badge', function (value) {
        value.bind(function (to) {
            $('#intro-badge').text(to);
        });
    });

    // Intro Title
    wp.customize('ssmc_intro_title', function (value) {
        value.bind(function (to) {
            $('#intro-title').text(to);
        });
    });

    // Intro Description
    wp.customize('ssmc_intro_desc', function (value) {
        value.bind(function (to) {
            $('#intro-desc').text(to);
        });
    });

    // Feature 1 Title
    wp.customize('ssmc_intro_feat1_title', function (value) {
        value.bind(function (to) {
            $('#intro-feat1-title').text(to);
        });
    });

    // Feature 1 Text
    wp.customize('ssmc_intro_feat1_text', function (value) {
        value.bind(function (to) {
            $('#intro-feat1-text').text(to);
        });
    });

    // Feature 2 Title
    wp.customize('ssmc_intro_feat2_title', function (value) {
        value.bind(function (to) {
            $('#intro-feat2-title').text(to);
        });
    });

    // Feature 2 Text
    wp.customize('ssmc_intro_feat2_text', function (value) {
        value.bind(function (to) {
            $('#intro-feat2-text').text(to);
        });
    });

})(jQuery);
