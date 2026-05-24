<?php
/**
 * GCB Demo Theme — functions.
 *
 * Nothing fancy. WordPress core handles block discovery automatically
 * because gcb-lite's BlockLoader scans this theme's blocks/ directory at
 * the init action. The only theme-side responsibility is declaring
 * standard WP theme supports.
 *
 * @package GCB_Demo_Theme
 */

if (!defined('ABSPATH')) {
    exit;
}

add_action('after_setup_theme', function () {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('responsive-embeds');
    add_theme_support('html5', ['comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script']);
});

// Skip auto-emitted core block styles on the front-end — there's nothing
// here for visitors to look at anyway (the Next.js app at
// gcb-next-starter.vercel.app is the real frontend).
add_action('wp_enqueue_scripts', function () {
    wp_dequeue_style('wp-block-library');
    wp_dequeue_style('wp-block-library-theme');
}, 100);
