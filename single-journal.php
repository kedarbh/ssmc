<?php
/**
 * The template for displaying a single Journal Volume and its articles.
 *
 * @package ssmc-custom
 */

get_header(); 

while ( have_posts() ) :
    the_post();

    $volume_num  = get_post_meta( get_the_ID(), '_journal_volume_number', true );
    $pub_date    = get_post_meta( get_the_ID(), '_journal_published_date', true );
    $journal_type = get_post_meta( get_the_ID(), '_journal_type', true );
    
    // Get Articles array
    $articles_json = get_post_meta( get_the_ID(), '_journal_articles', true );
    $articles = array();
    if ( ! empty( $articles_json ) ) {
        $articles = json_decode( $articles_json, true );
        if ( ! is_array( $articles ) ) {
            $articles = array();
        }
    }
?>

<!-- Premium Page Header -->
<div class="bg-primary py-16 md:py-24 relative overflow-hidden">
    <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjAiIGhlaWdodD0iMjAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGNpcmNsZSBjeD0iMiIgY3k9IjIiIHI9IjIiIGZpbGw9IiNmZmZmZmYiIGZpbGwtb3BhY2l0eT0iMC4wNSIvPjwvc3ZnPg==')] opacity-10"></div>
    <div class="absolute top-0 right-0 w-96 h-96 bg-white/5 rounded-full -translate-y-1/2 translate-x-1/3 blur-3xl pointer-events-none"></div>
    <div class="absolute bottom-0 left-0 w-64 h-64 bg-secondary/10 rounded-full translate-y-1/2 -translate-x-1/4 blur-2xl pointer-events-none"></div>

    <div class="container mx-auto px-4 relative z-10">
        <nav class="flex items-center gap-2 text-blue-200/80 text-xs mb-8 font-medium uppercase tracking-widest">
            <a href="<?php echo esc_url( home_url('/') ); ?>" class="hover:text-white transition-colors duration-200">Home</a>
            <span class="opacity-40">/</span>
            <a href="<?php echo esc_url( get_post_type_archive_link('journal') ); ?>" class="hover:text-white transition-colors duration-200">Journals</a>
            <span class="opacity-40">/</span>
            <span class="text-white truncate max-w-[200px]"><?php echo esc_html( $volume_num ? $volume_num : get_the_title() ); ?></span>
        </nav>
        
        <div class="flex flex-col md:flex-row gap-10 items-start">
            <!-- Cover Image -->
            <div class="w-full md:w-1/4 shrink-0">
                <div class="w-full aspect-[3/4] relative bg-white rounded-2xl overflow-hidden shadow-2xl border-4 border-white/10">
                    <?php if ( has_post_thumbnail() ) : ?>
                        <?php the_post_thumbnail( 'large', array( 'class' => 'absolute inset-0 w-full h-full object-cover' ) ); ?>
                    <?php else : ?>
                        <!-- Fallback Cover Design -->
                        <div class="w-full h-full bg-blue-900 flex flex-col items-center justify-center text-white p-6 text-center">
                            <h4 class="font-serif text-3xl font-bold leading-tight mb-2">Saheed Smriti<br>Journal</h4>
                            <?php if ( $volume_num ) : ?>
                                <span class="inline-block px-4 py-1.5 bg-white/20 rounded-full text-sm font-bold tracking-widest uppercase mt-4"><?php echo esc_html( $volume_num ); ?></span>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Header Content -->
            <div class="w-full md:w-3/4 text-white p-4">
                <div class="flex flex-wrap items-center gap-3 mb-6">
                    <?php if ( $journal_type ) : ?>
                        <span class="inline-flex items-center px-3 py-1 rounded-full bg-white/10 text-blue-100 text-xs font-bold uppercase tracking-widest border border-white/20">
                            <?php echo esc_html( $journal_type ); ?>
                        </span>
                    <?php endif; ?>
                    <?php if ( $pub_date ) : ?>
                        <span class="inline-flex items-center text-blue-100/80 text-sm font-semibold uppercase tracking-wider">
                            <svg class="w-4 h-4 mr-1.5 opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            Published: <?php echo esc_html( $pub_date ); ?>
                        </span>
                    <?php endif; ?>
                </div>

                <h1 class="text-3xl md:text-4xl lg:text-5xl font-extrabold tracking-tight leading-tight mb-4">
                    <?php the_title(); ?>
                </h1>
                
                <?php if ( $volume_num ) : ?>
                    <p class="text-xl font-light text-blue-100/90 mb-6 font-serif italic">
                        <?php echo esc_html( $volume_num ); ?>
                    </p>
                <?php endif; ?>

                <div class="flex items-center gap-6">
                    <div class="flex flex-col">
                        <span class="text-blue-200/70 text-xs uppercase font-bold tracking-widest mb-1">Total Articles</span>
                        <span class="text-2xl font-black text-white"><?php echo count($articles); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Main Content (Articles List + Sidebar) -->
<section class="py-20 bg-gray-50 min-h-screen">
    <div class="container mx-auto px-4 max-w-6xl">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
            
            <!-- Main Content Area: Articles List -->
            <div class="lg:col-span-2">
                <?php if ( empty( $articles ) ) : ?>
                    <div class="text-center bg-white rounded-3xl p-16 border border-gray-100 shadow-sm">
                        <div class="w-20 h-20 bg-blue-50 text-blue-900 rounded-full flex items-center justify-center mx-auto mb-6">
                            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                        </div>
                        <h3 class="text-2xl font-black text-gray-900 mb-4">No Articles Uploaded</h3>
                        <p class="text-gray-500 font-light leading-relaxed">
                            Articles for this journal volume have not been entered into the system yet.
                        </p>
                    </div>
                <?php else : ?>
                    
                    <div class="flex items-center justify-between mb-8 border-b border-gray-200 pb-4">
                        <h3 class="text-2xl font-bold text-gray-900 tracking-tight">Table of Contents</h3>
                        <span class="text-gray-500 font-medium bg-gray-100 px-3 py-1 rounded-full text-sm"><?php echo count($articles); ?> Research Papers</span>
                    </div>

                    <div class="space-y-6">
                        <?php foreach ( $articles as $index => $article ) : ?>
                            <div class="bg-white p-6 md:p-8 rounded-2xl border border-gray-100 shadow-sm hover:shadow-lg hover:-translate-y-1 transition-all duration-300 relative group">
                                
                                <!-- Number indicator -->
                                <div class="hidden md:flex absolute -left-4 top-8 w-10 h-10 bg-primary text-white font-bold rounded-full items-center justify-center shadow-md">
                                    <?php echo esc_html( $index + 1 ); ?>
                                </div>

                                <div class="flex flex-col md:flex-row md:items-start justify-between gap-6 md:pl-4">
                                    <div class="flex-grow">
                                        <h4 class="text-lg md:text-xl font-bold text-gray-900 leading-snug mb-2 group-hover:text-primary transition-colors">
                                            <?php echo esc_html( $article['title'] ); ?>
                                        </h4>
                                        
                                        <?php if ( ! empty( $article['author'] ) ) : ?>
                                            <p class="text-gray-600 text-sm font-medium flex items-center gap-1.5">
                                                <svg class="w-3.5 h-3.5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                                <?php echo esc_html( $article['author'] ); ?>
                                            </p>
                                        <?php endif; ?>
                                    </div>

                                    <?php if ( ! empty( $article['link'] ) ) : ?>
                                        <div class="shrink-0 pt-2 md:pt-0">
                                            <a href="<?php echo esc_url( $article['link'] ); ?>" target="_blank" rel="noopener noreferrer" class="inline-flex items-center justify-center px-4 py-2 text-sm bg-blue-50 text-primary font-bold rounded-lg hover:bg-primary hover:text-white transition-all duration-300 group/btn whitespace-nowrap border border-blue-100 w-full md:w-auto">
                                                Read Now
                                                <svg class="w-3.5 h-3.5 ml-1.5 opacity-70 group-hover/btn:opacity-100 group-hover/btn:translate-x-1 transition-all" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                                            </a>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Sidebar -->
            <div class="lg:col-span-1 space-y-8">
                
                <!-- About the Journal Card -->
                <div class="bg-white p-6 md:p-8 rounded-3xl border border-gray-100 shadow-sm relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-blue-50 rounded-full translate-x-1/2 -translate-y-1/2 z-0"></div>
                    <div class="relative z-10">
                        <h4 class="text-lg font-bold text-gray-900 mb-3 tracking-tight flex items-center gap-2">
                            <span class="w-1 h-5 rounded-full bg-primary block"></span>
                            About the Journal
                        </h4>
                        <p class="text-gray-600 text-[0.8rem] leading-relaxed mb-5">
                            The <strong>Saheed Smriti Journal</strong> is an annual, peer-reviewed, multidisciplinary publication featuring rigorous research, insightful academic essays, and in-depth analytical articles crafted by our dedicated campus faculty and scholars.
                        </p>
                        <a href="<?php echo esc_url( get_permalink( get_page_by_path( 'contact' ) ) ); ?>" class="block w-full text-center px-4 py-2.5 text-sm bg-gray-50 text-gray-700 font-semibold rounded-lg hover:bg-gray-100 transition-colors border border-gray-200">
                            Submit a Paper
                        </a>
                    </div>
                </div>

                <!-- Recent Volumes Widget -->
                <div class="bg-white p-6 md:p-8 rounded-3xl border border-gray-100 shadow-sm">
                    <h4 class="text-lg font-bold text-gray-900 mb-5 tracking-tight flex items-center gap-2">
                        <span class="w-1 h-5 rounded-full bg-secondary block"></span>
                        Recent Volumes
                    </h4>
                    
                    <?php
                    // Query latest 3 journal volumes excluding the current one
                    $recent_journals = new WP_Query( array(
                        'post_type'      => 'journal',
                        'posts_per_page' => 3,
                        'post__not_in'   => array( get_the_ID() ),
                        'orderby'        => 'date',
                        'order'          => 'DESC',
                    ) );

                    if ( $recent_journals->have_posts() ) :
                        echo '<ul class="space-y-4">';
                        while ( $recent_journals->have_posts() ) : $recent_journals->the_post();
                            $vol_num = get_post_meta( get_the_ID(), '_journal_volume_number', true );
                            
                            // Article count for sidebar
                            $art_json  = get_post_meta( get_the_ID(), '_journal_articles', true );
                            $art_count = 0;
                            if ( ! empty( $art_json ) ) {
                                $art_arr = json_decode( $art_json, true );
                                if ( is_array( $art_arr ) ) {
                                    $art_count = count( $art_arr );
                                }
                            }
                    ?>
                            <li>
                                <a href="<?php the_permalink(); ?>" class="group flex gap-4 items-start p-3 -mx-3 rounded-xl hover:bg-blue-50 transition-colors">
                                    <div class="w-16 h-20 shrink-0 bg-gray-100 rounded-lg overflow-hidden border border-gray-200 relative">
                                        <?php if ( has_post_thumbnail() ) : ?>
                                            <?php the_post_thumbnail( 'thumbnail', array( 'class' => 'absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition-transform duration-500' ) ); ?>
                                        <?php else : ?>
                                            <div class="w-full h-full bg-primary flex items-center justify-center p-1">
                                                <span class="text-[0.5rem] font-bold text-white uppercase text-center leading-tight">SSMC<br>Jrnl</span>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    <div>
                                        <h5 class="text-sm font-bold text-gray-900 group-hover:text-primary transition-colors line-clamp-2 leading-tight mb-1">
                                            <?php the_title(); ?>
                                        </h5>
                                        <?php if ( $vol_num ) : ?>
                                            <p class="text-xs text-gray-500 font-medium mb-1"><?php echo esc_html( $vol_num ); ?></p>
                                        <?php endif; ?>
                                        <span class="text-[0.65rem] uppercase font-bold text-primary tracking-wider bg-primary/10 px-2 py-0.5 rounded-full inline-block">
                                            <?php echo $art_count; ?> Articles
                                        </span>
                                    </div>
                                </a>
                            </li>
                    <?php 
                        endwhile;
                        echo '</ul>';
                        wp_reset_postdata();
                    else :
                        echo '<p class="text-sm text-gray-500 italic">No other volumes published yet.</p>';
                    endif;
                    ?>
                    
                    <a href="<?php echo esc_url( get_post_type_archive_link('journal') ); ?>" class="mt-6 flex items-center justify-center w-full gap-2 text-sm font-bold text-primary hover:text-blue-800 transition-colors">
                        View Complete Archive
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </a>
                </div>

            </div>
        </div>
    </div>
</section>

<?php 
endwhile; 
get_footer(); 
?>
