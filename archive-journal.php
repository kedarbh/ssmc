<?php
/**
 * The template for displaying Journal Archives
 *
 * @package ssmc-custom
 */

get_header(); ?>

<!-- Premium Page Header -->
<div class="bg-gradient-to-br from-primary via-primary to-blue-900 py-16 relative overflow-hidden">
    <div class="absolute top-0 right-0 w-64 h-64 bg-white/5 rounded-full -translate-y-1/2 translate-x-1/3 blur-3xl pointer-events-none"></div>
    <div class="absolute bottom-0 left-0 w-48 h-48 bg-secondary/10 rounded-full translate-y-1/2 -translate-x-1/3 blur-2xl pointer-events-none"></div>

    <div class="container mx-auto px-4 relative z-10">
        <nav class="flex items-center gap-2 text-blue-200/80 text-xs mb-4 font-medium uppercase tracking-widest">
            <a href="<?php echo esc_url( home_url('/') ); ?>" class="hover:text-white transition-colors duration-200">Home</a>
            <span class="opacity-40">/</span>
            <span class="text-white">Journals</span>
        </nav>
        
        <div class="max-w-4xl">
            <h1 class="text-3xl md:text-5xl lg:text-6xl font-extrabold text-white tracking-tight leading-tight">Academic Journals</h1>
            <p class="text-blue-100/70 mt-6 max-w-2xl font-light text-xl leading-relaxed">
                Explore our collection of peer-reviewed academic research, articles, and scholarly publications authored by our faculty and research scholars.
            </p>
        </div>
    </div>
</div>

<!-- Journals List -->
<section class="py-24 bg-gray-50 min-h-screen">
    <div class="container mx-auto px-4">

        <?php if ( have_posts() ) : ?>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                <?php while ( have_posts() ) : the_post(); 
                    
                    $volume_num  = get_post_meta( get_the_ID(), '_journal_volume_number', true );
                    $pub_date    = get_post_meta( get_the_ID(), '_journal_published_date', true );
                    $journal_type = get_post_meta( get_the_ID(), '_journal_type', true );
                    
                    // Count articles securely
                    $articles_json = get_post_meta( get_the_ID(), '_journal_articles', true );
                    $article_count = 0;
                    if ( ! empty( $articles_json ) ) {
                        $articles_array = json_decode( $articles_json, true );
                        if ( is_array( $articles_array ) ) {
                            $article_count = count( $articles_array );
                        }
                    }
                ?>

                    <a href="<?php the_permalink(); ?>" class="group bg-white rounded-3xl overflow-hidden shadow-sm hover:shadow-2xl border border-gray-100 transition-all duration-500 hover:-translate-y-2 flex flex-col h-full">
                        <!-- Cover Image Container -->
                        <div class="w-full h-64 relative bg-gray-100 overflow-hidden flex items-center justify-center border-b border-gray-100">
                            <?php if ( has_post_thumbnail() ) : ?>
                                <?php the_post_thumbnail( 'large', array( 'class' => 'absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-700' ) ); ?>
                            <?php else : ?>
                                <!-- Fallback Cover Design -->
                                <div class="w-full h-full bg-blue-900 flex flex-col items-center justify-center text-white p-6 relative overflow-hidden group-hover:scale-105 transition-transform duration-700">
                                    <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjAiIGhlaWdodD0iMjAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGNpcmNsZSBjeD0iMiIgY3k9IjIiIHI9IjIiIGZpbGw9IiNmZmZmZmYiIGZpbGwtb3BhY2l0eT0iMC4wNSIvPjwvc3ZnPg==')] opacity-30"></div>
                                    <h4 class="font-serif text-2xl md:text-3xl font-bold text-center leading-tight mb-2 relative z-10 text-white/90">Saheed Smriti<br>Journal</h4>
                                    <?php if ( $volume_num ) : ?>
                                        <span class="inline-block px-3 py-1 bg-white/20 rounded-full text-xs font-bold tracking-widest uppercase relative z-10 backdrop-blur-sm mt-4"><?php echo esc_html( $volume_num ); ?></span>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                            
                            <!-- Hover Overlay -->
                            <div class="absolute inset-0 bg-primary/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        </div>

                        <!-- Content Area -->
                        <div class="p-8 flex flex-col flex-grow">
                            <!-- Badges -->
                            <div class="flex items-center gap-2 mb-4">
                                <?php if ( $journal_type ) : ?>
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-md bg-blue-50 text-blue-700 text-xs font-semibold uppercase tracking-wider">
                                        <?php echo esc_html( $journal_type ); ?>
                                    </span>
                                <?php endif; ?>
                                <?php if ( $pub_date ) : ?>
                                    <span class="inline-flex items-center text-gray-500 text-xs font-semibold uppercase tracking-wider">
                                        &bull; <?php echo esc_html( $pub_date ); ?>
                                    </span>
                                <?php endif; ?>
                            </div>

                            <h2 class="text-xl font-bold text-gray-900 mb-4 group-hover:text-primary transition-colors leading-snug">
                                <?php the_title(); ?>
                            </h2>
                            
                            <div class="mt-auto pt-6 border-t border-gray-100 flex items-center justify-between">
                                <span class="text-sm font-semibold text-gray-500 flex items-center gap-2 group-hover:text-primary transition-colors">
                                    <svg class="w-5 h-5 opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 002-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                                    <?php echo esc_html( $article_count ); ?> Articles
                                </span>
                                <span class="w-8 h-8 rounded-full bg-gray-50 text-primary flex items-center justify-center group-hover:bg-primary group-hover:text-white transition-colors duration-300">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                                </span>
                            </div>
                        </div>
                    </a>

                <?php endwhile; ?>
            </div>

            <!-- Pagination -->
            <div class="mt-16 flex justify-center">
                <?php
                echo paginate_links( array(
                    'prev_text' => '<span class="flex items-center gap-1"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg> Prev</span>',
                    'next_text' => '<span class="flex items-center gap-1">Next <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg></span>',
                    'class'     => 'pagination-links flex items-center gap-2',
                ) );
                ?>
            </div>

        <?php else : ?>

            <div class="text-center bg-white rounded-3xl p-16 border border-gray-100 shadow-sm max-w-2xl mx-auto">
                <div class="w-20 h-20 bg-blue-50 text-primary rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                </div>
                <h3 class="text-2xl font-black text-gray-900 mb-4 tracking-tight">No Journals Published Yet</h3>
                <p class="text-gray-500 font-light leading-relaxed mb-8">
                    Our academic journals and publications will appear here once they are published. Please check back later.
                </p>
                <a href="<?php echo esc_url( home_url('/') ); ?>" class="inline-flex items-center px-6 py-3 bg-primary text-white font-bold rounded-xl hover:bg-blue-800 transition-colors">
                    Return to Homepage
                </a>
            </div>

        <?php endif; ?>

    </div>
</section>

<!-- Custom Pagination CSS for Tailwind -->
<style>
.pagination-links .page-numbers {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    min-width: 2.5rem;
    height: 2.5rem;
    padding: 0 0.75rem;
    border-radius: 0.5rem;
    background-color: #fff;
    border: 1px solid #e5e7eb;
    color: #4b5563;
    font-weight: 600;
    font-size: 0.875rem;
    transition: all 0.2s;
}
.pagination-links .page-numbers:hover {
    background-color: #f3f4f6;
    color: #111827;
}
.pagination-links .current {
    background-color: #016087; /* Primary */
    color: #fff;
    border-color: #016087;
}
.pagination-links .current:hover {
    background-color: #016087;
    color: #fff;
}
.pagination-links .dots {
    border: none;
    background: transparent;
}
</style>

<?php get_footer(); ?>
