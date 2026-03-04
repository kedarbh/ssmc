<?php
/**
 * The template for displaying download archives
 *
 * @package ssmc-custom
 */

get_header(); ?>

<div class="bg-gray-50 min-h-screen">
    <!-- Header Section -->
    <header class="bg-primary text-white py-24 relative overflow-hidden">
        <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(circle at 2px 2px, white 1px, transparent 0); background-size: 40px 40px;"></div>
        <div class="container mx-auto px-4 relative z-10 text-center">
            <span class="text-xs font-black text-secondary uppercase tracking-[0.4em] mb-4 block animate-fade-in-up">Resource Center</span>
            <h1 class="text-5xl md:text-7xl font-black mb-6 uppercase tracking-tighter animate-fade-in-up" style="animation-delay: 0.1s;">Downloads</h1>
            <p class="text-xl text-blue-100 max-w-2xl mx-auto font-light leading-relaxed animate-fade-in-up" style="animation-delay: 0.2s;">
                Access official campus documents, syllabi, admission forms, and academic resources.
            </p>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container mx-auto px-4 py-16 -mt-12 relative z-20">
        <div class="max-w-5xl mx-auto">
            
            <div class="bg-white rounded-[2.5rem] shadow-xl shadow-gray-200/50 border border-gray-100 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-gray-50/50">
                                <th class="px-8 py-6 text-xs font-black text-primary uppercase tracking-widest border-b border-gray-100">Document Title</th>
                                <th class="px-8 py-6 text-xs font-black text-primary uppercase tracking-widest border-b border-gray-100">Date Added</th>
                                <th class="px-8 py-6 text-xs font-black text-primary uppercase tracking-widest border-b border-gray-100 text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-50">
                            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); 
                                $file_url = get_post_meta( get_the_ID(), '_ssmc_download_file_url', true );
                                $file_ext = pathinfo($file_url, PATHINFO_EXTENSION);
                                $icon = '📄';
                                switch(strtolower($file_ext)) {
                                    case 'pdf': $icon = '📕'; break;
                                    case 'doc': case 'docx': $icon = '📘'; break;
                                    case 'xls': case 'xlsx': $icon = '📗'; break;
                                    case 'jpg': case 'jpeg': case 'png': $icon = '🖼️'; break;
                                }
                            ?>
                                <tr class="group hover:bg-gray-50/80 transition duration-300">
                                    <td class="px-8 py-6">
                                        <div class="flex items-center gap-4">
                                            <span class="text-2xl"><?php echo $icon; ?></span>
                                            <div>
                                                <h3 class="font-bold text-gray-900 group-hover:text-primary transition"><?php the_title(); ?></h3>
                                                <span class="text-[10px] font-bold text-gray-400 uppercase tracking-widest"><?php echo strtoupper($file_ext); ?> File</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-8 py-6">
                                        <span class="text-sm text-gray-500"><?php echo get_the_date(); ?></span>
                                    </td>
                                    <td class="px-8 py-6 text-right">
                                        <?php if ( $file_url ) : ?>
                                            <a href="<?php echo esc_url( $file_url ); ?>" 
                                               download
                                               class="inline-flex items-center gap-2 px-6 py-2 bg-primary text-white text-xs font-black uppercase tracking-widest rounded-lg hover:bg-secondary transition shadow-lg shadow-primary/20 hover:shadow-secondary/30 group/btn">
                                               Download
                                               <svg class="w-4 h-4 transform group-hover/btn:translate-y-0.5 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a2 2 0 002 2h12a2 2 0 002-2v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                                            </a>
                                        <?php else : ?>
                                            <span class="text-xs text-gray-400 italic">No file attached</span>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endwhile; else : ?>
                                <tr>
                                    <td colspan="3" class="px-8 py-16 text-center">
                                        <div class="text-4xl mb-4">📂</div>
                                        <p class="text-gray-500 font-light">No downloads available at the moment. Please check back later.</p>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Pagination -->
            <div class="mt-12">
                <?php 
                the_posts_pagination( array(
                    'mid_size'  => 2,
                    'prev_text' => '← Previous',
                    'next_text' => 'Next →',
                    'class'     => 'flex justify-center gap-4'
                ) ); 
                ?>
            </div>

        </div>
    </main>
</div>

<?php get_header(); ?>
