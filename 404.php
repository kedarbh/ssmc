<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package ssmc-custom
 */

get_header();
?>

<section class="min-h-[70vh] flex items-center justify-center bg-gray-50 py-20 relative overflow-hidden">
    <!-- Decorative background elements -->
    <div class="absolute top-0 right-0 w-96 h-96 bg-primary/5 rounded-full -translate-y-1/2 translate-x-1/3 blur-3xl pointer-events-none"></div>
    <div class="absolute bottom-0 left-0 w-64 h-64 bg-secondary/10 rounded-full translate-y-1/2 -translate-x-1/3 blur-2xl pointer-events-none"></div>

    <div class="container mx-auto px-4 relative z-10">
        <div class="max-w-3xl mx-auto text-center">
            
            <!-- Playful 404 Illustration -->
            <div class="relative inline-block mb-12">
                <h1 class="text-[10rem] md:text-[15rem] font-black text-primary/5 leading-none select-none">404</h1>
                <div class="absolute inset-0 flex items-center justify-center">
                    <span class="text-6xl md:text-8xl animate-bounce">🎓</span>
                </div>
                <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-full">
                    <h2 class="text-3xl md:text-5xl font-extrabold text-gray-900 tracking-tight">Oops! Page Missing</h2>
                </div>
            </div>

            <p class="text-gray-500 text-lg md:text-xl font-light leading-relaxed mb-12 max-w-xl mx-auto">
                The chapter you're looking for seems to have been misplaced. Don't worry, even the best scholars get lost sometimes.
            </p>

            <div class="flex flex-wrap items-center justify-center gap-4">
                <a href="<?php echo esc_url( home_url('/') ); ?>" class="inline-flex items-center justify-center gap-3 bg-primary text-white font-extrabold py-4 px-10 rounded-xl hover:bg-blue-800 transition-all duration-300 shadow-lg shadow-primary/20 hover:-translate-y-1 text-xs uppercase tracking-widest">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                    Back to Home
                </a>
                <a href="<?php echo esc_url( get_post_type_archive_link('program') ); ?>" class="inline-flex items-center justify-center gap-3 bg-white text-gray-700 font-extrabold py-4 px-10 rounded-xl hover:bg-gray-50 transition-all duration-300 border border-gray-100 shadow-sm hover:-translate-y-1 text-xs uppercase tracking-widest">
                    Academic Programs
                </a>
            </div>

            <!-- Search Bar for Convenience -->
            <div class="mt-20 pt-12 border-t border-gray-200">
                <p class="text-gray-400 text-xs font-bold uppercase tracking-widest mb-6">Or try searching for it</p>
                <div class="max-w-md mx-auto">
                    <?php get_search_form(); ?>
                </div>
            </div>

        </div>
    </div>
</section>

<?php
get_footer();
