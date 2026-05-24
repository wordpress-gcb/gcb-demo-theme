<?php
/**
 * GCB Demo Theme — index template.
 *
 * Intentionally minimal. The public frontend for this theme is the
 * Next.js app at https://gcb-next-starter.vercel.app/. WordPress is
 * the CMS; the React app is the renderer.
 *
 * If someone hits the WP frontend directly (no Next.js in front), they
 * get a plain page with a redirect notice rather than blank output.
 *
 * @package GCB_Demo_Theme
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header(); ?>
<main style="max-width:42rem;margin:4rem auto;padding:0 1.5rem;font-family:system-ui,sans-serif;line-height:1.6;color:#1a1a1a;">
    <h1 style="font-size:1.75rem;margin-bottom:1rem;">GCB Demo</h1>
    <p>This WordPress install backs the live demo at
        <a href="https://gcb-next-starter.vercel.app/">gcb-next-starter.vercel.app</a>.</p>
    <p>The Next.js frontend fetches pages from this install over the REST
        API and renders them with React. Try
        <a href="<?php echo esc_url(rest_url('wp/v2/pages')); ?>">/wp-json/wp/v2/pages</a> or
        <a href="<?php echo esc_url(rest_url('gcblite/v1/blocks')); ?>">/wp-json/gcblite/v1/blocks</a>
        to see the data the frontend consumes.</p>
</main>
<?php get_footer();
