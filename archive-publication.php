<?php

/**
 * The template for displaying publication archives (and taxonomy)
 *
 * @package ssmc-custom
 */

get_header(); ?>

<div class="bg-gray-50 min-h-screen pb-24">
    <!-- Header Section -->
    <header class="bg-primary text-white py-24 relative overflow-hidden">
        <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(circle at 2px 2px, white 1px, transparent 0); background-size: 40px 40px;"></div>
        <div class="container mx-auto px-4 relative z-10 text-center">
            <span class="text-xs font-black text-secondary uppercase tracking-[0.4em] mb-4 block animate-fade-in-up">Research & Guidelines</span>
            <h1 class="text-5xl md:text-7xl font-black mb-6 uppercase tracking-tighter animate-fade-in-up" style="animation-delay: 0.1s;">
                <?php
                if (is_search()) {
                    echo 'Search Results';
                } elseif (is_tax('publication_category')) {
                    single_term_title();
                } else {
                    _e('Publications', 'ssmc-custom');
                }
                ?>
            </h1>
            <p class="text-xl text-blue-100 max-w-2xl mx-auto font-light leading-relaxed animate-fade-in-up" style="animation-delay: 0.2s;">
                <?php
                if (is_search()) {
                    printf(esc_html__('Search results for: "%s"', 'ssmc-custom'), '<span>' . get_search_query() . '</span>');
                } elseif (is_tax('publication_category') && term_description()) {
                    echo wp_strip_all_tags(term_description());
                } else {
                    _e('Explore our academic publications, reports, and official documents.', 'ssmc-custom');
                }
                ?>
            </p>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container mx-auto px-4 py-16 -mt-12 relative z-20">
        <div class="max-w-6xl mx-auto">

            <!-- Live Search Bar -->

            <div class="bg-white/70 backdrop-blur-sm rounded-[2rem] p-4 md:p-5 shadow-sm shadow-gray-200/40 border border-gray-200/70 mb-10 relative z-30 group hover:shadow-md hover:border-gray-300 transition-all duration-300 transform hover:-translate-y-0.5">
                <form id="pub-search-form" action="" onsubmit="return false;" class="m-0">
                    <label for="search_pub" class="sr-only">Search Publications</label>
                    <div class="relative flex items-center w-full bg-white rounded-2xl border border-gray-200 hover:border-gray-300 focus-within:border-primary focus-within:ring-2 focus-within:ring-primary/20 transition-all duration-300 shadow-inner overflow-hidden">
                        <div class="pl-6 text-primary/50 transition-colors duration-300 pointer-events-none">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                        <input type="text" id="search_pub" placeholder="Search publications by title, category, or keyword..." class="w-full h-14 md:h-16 pl-4 pr-16 bg-transparent text-base md:text-lg font-medium text-gray-800 placeholder-gray-400 outline-none" autocomplete="off" />

                        <!-- Search indicator/spinner -->
                        <div class="absolute right-6 pointer-events-none opacity-0 transition-opacity duration-300 z-10" id="search-indicator">
                            <div class="w-6 h-6 border-4 border-primary border-t-transparent rounded-full animate-spin"></div>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Publications Table -->
            <div class="bg-white rounded-[2.5rem] shadow-xl shadow-gray-200/50 border border-gray-100 overflow-hidden relative z-20">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse" id="publications-table">
                        <thead>
                            <tr class="bg-gray-50/50">
                                <th class="px-8 py-6 text-xs font-black text-primary uppercase tracking-widest border-b border-gray-100">Publication Details</th>
                                <th class="px-8 py-6 text-xs font-black text-primary uppercase tracking-widest border-b border-gray-100">Category</th>
                                <th class="px-8 py-6 text-xs font-black text-primary uppercase tracking-widest border-b border-gray-100 text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-50 pub-table-body">
                            <?php
                            // Custom query to get ALL publications for client-side search
                            $args = array(
                                'post_type'      => 'publication',
                                'posts_per_page' => -1,
                            );
                            if (is_tax('publication_category')) {
                                $args['tax_query'] = array(
                                    array(
                                        'taxonomy' => 'publication_category',
                                        'field'    => 'slug',
                                        'terms'    => get_queried_object()->slug,
                                    ),
                                );
                            }

                            $pub_query = new WP_Query($args);

                            if ($pub_query->have_posts()) : while ($pub_query->have_posts()) : $pub_query->the_post();
                                    $file_url = get_post_meta(get_the_ID(), '_ssmc_publication_file_url', true);
                                    $categories = get_the_terms(get_the_ID(), 'publication_category');
                            ?>
                                    <tr class="group pub-row hover:bg-blue-50/30 transition duration-300">
                                        <td class="px-8 py-6">
                                            <div class="flex items-start gap-5">
                                                <div class="w-12 h-12 rounded-xl bg-red-50 text-red-500 flex items-center justify-center shrink-0 border border-red-100">
                                                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                                        <path d="M11.362 2c4.156 0 2.638 6 2.638 6s6-1.65 6 2.457v11.543h-16v-20h7.362zm.827-2h-10.189v24h20v-14.386c0-2.391-6.648-9.614-9.811-9.614zm-4.189 12.339c-.933 0-1.853.511-2.073 1.558-.293 1.391 1.761 1.139 1.748 3.031-.013 1.777-2.029 1.259-2.222 1.127l-.462 1.314c.31.189 1.636.858 2.946.858 1.487 0 1.933-.509 2.083-1.488.291-1.921-2.433-1.619-2.42-2.731.006-.579.522-1.011 1.291-1.011.697 0 1.416.324 1.741.564l.432-1.353c-.347-.238-1.503-.869-2.964-.869zm8.563-1.059c-1.347 0-2.126.83-2.126 2.45v2.969c0 1.611.758 2.427 2.067 2.427 1.284 0 2.049-.781 2.049-2.451v-2.964c0-1.617-.751-2.431-2.09-2.431zm-1.026 5.503v-3.134c0-.756.284-1.16.897-1.16.634 0 .918.423.918 1.16v3.134c0 .809-.283 1.2-.918 1.2-.625 0-.897-.373-.897-1.2h0zm-6.238 1.659c0 1.312-.225 1.716-.902 1.716-1.002 0-.616-1.554-.616-1.554l-.451.983c0-.022 1.309 4.354 3.094 4.354.341 0 .684-.047.962-.122l.643-2.012c-.179.034-.367.048-.528.048-1.121 0-.964-1.233-.964-1.233z" />
                                                    </svg>
                                                </div>
                                                <div>
                                                    <h3 class="font-bold text-gray-900 text-lg group-hover:text-primary transition leading-tight mb-1 pub-title"><?php the_title(); ?></h3>
                                                    <?php if (has_excerpt()) : ?>
                                                        <div class="text-sm text-gray-500 font-light max-w-2xl line-clamp-2 pub-desc">
                                                            <?php echo get_the_excerpt(); ?>
                                                        </div>
                                                    <?php endif; ?>
                                                    <div class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mt-2 flex items-center gap-2">
                                                        <span>Published: <?php echo get_the_date(); ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-8 py-6 align-top pt-8 pub-cat">
                                            <?php if ($categories && ! is_wp_error($categories)) : ?>
                                                <div class="flex flex-wrap gap-2">
                                                    <?php foreach ($categories as $cat) : ?>
                                                        <span class="px-3 py-1 bg-gray-100 text-gray-600 rounded-md text-[10px] font-black uppercase tracking-widest">
                                                            <?php echo esc_html($cat->name); ?>
                                                        </span>
                                                    <?php endforeach; ?>
                                                </div>
                                            <?php else: ?>
                                                <span class="text-xs text-gray-400 italic">Uncategorized</span>
                                            <?php endif; ?>
                                        </td>
                                        <td class="px-8 py-6 text-right align-top pt-7">
                                            <?php if ($file_url) : ?>
                                                <a href="<?php echo esc_url($file_url); ?>"
                                                    target="_blank" rel="noopener noreferrer"
                                                    class="inline-flex items-center justify-center gap-2 px-6 py-3 bg-primary text-white fill-white text-xs font-black uppercase tracking-widest rounded-xl hover:bg-primary/90 transition shadow-lg shadow-primary/20 hover:shadow-primary/30 group/btn">
                                                    <span>View PDF</span>
                                                    <svg class="w-4 h-4 transform group-hover/btn:translate-x-1 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                                                    </svg>
                                                </a>
                                            <?php else : ?>
                                                <span class="inline-flex px-4 py-2 bg-gray-100 text-gray-400 rounded-lg text-xs font-medium italic">No PDF Attached</span>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endwhile;
                                wp_reset_postdata();
                            else : ?>
                                <tr>
                                    <td colspan="3" class="px-8 py-20 text-center">
                                        <div class="w-20 h-20 bg-gray-50 text-gray-300 rounded-full flex items-center justify-center mx-auto mb-6">
                                            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"></path>
                                            </svg>
                                        </div>
                                        <h3 class="text-xl font-bold text-gray-900 mb-2">No publications found</h3>
                                        <p class="text-gray-500 font-light">Check back later for newly added publications.</p>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>


            <!-- Client-Side Live Search JS -->
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const searchInput = document.getElementById('search_pub');
                    const searchIndicator = document.getElementById('search-indicator');
                    const pubRows = document.querySelectorAll('.pub-row');
                    const tbody = document.querySelector('.pub-table-body');
                    let searchTimeout;

                    if (!searchInput || !pubRows.length) return;

                    searchInput.addEventListener('input', function(e) {
                        const searchTerm = e.target.value.toLowerCase().trim();

                        // Show indicator
                        if (searchIndicator) {
                            searchIndicator.style.opacity = '1';
                        }

                        clearTimeout(searchTimeout);

                        // Add a tiny delay to show the spinner and prevent UI blocking
                        searchTimeout = setTimeout(() => {
                            let visibleCount = 0;

                            // Remove existing no-results row if any
                            const existingNoResult = document.getElementById('no-results-live');
                            if (existingNoResult) existingNoResult.remove();

                            pubRows.forEach(row => {
                                // Extract text from title, desc, and category
                                const title = row.querySelector('.pub-title') ? row.querySelector('.pub-title').textContent.toLowerCase() : '';
                                const desc = row.querySelector('.pub-desc') ? row.querySelector('.pub-desc').textContent.toLowerCase() : '';
                                const cat = row.querySelector('.pub-cat') ? row.querySelector('.pub-cat').textContent.toLowerCase() : '';

                                const textContent = title + ' ' + desc + ' ' + cat;

                                if (textContent.includes(searchTerm)) {
                                    row.style.display = '';
                                    visibleCount++;
                                } else {
                                    row.style.display = 'none';
                                }
                            });

                            // Show no results message if nothing matches
                            if (visibleCount === 0 && searchTerm !== '') {
                                const tr = document.createElement('tr');
                                tr.id = 'no-results-live';
                                tr.innerHTML = `
                                <td colspan="3" class="px-8 py-16 text-center">
                                    <div class="w-16 h-16 bg-red-50 text-red-300 rounded-full flex items-center justify-center mx-auto mb-4">
                                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                                    </div>
                                    <h3 class="text-lg font-bold text-gray-900 mb-1">No matches found</h3>
                                    <p class="text-gray-500 font-light text-sm">We couldn't find any publications matching "<strong>${e.target.value}</strong>".</p>
                                </td>
                            `;
                                tbody.appendChild(tr);
                            }

                            // Hide indicator
                            if (searchIndicator) {
                                searchIndicator.style.opacity = '0';
                            }
                        }, 200);
                    });
                });
            </script>

        </div>
    </main>
</div>

<?php get_footer(); ?>