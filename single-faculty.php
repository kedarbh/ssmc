<?php

/**
 * The template for displaying faculty single posts
 *
 * @package ssmc-custom
 */

get_header(); ?>

<div class="bg-gray-50 min-h-screen pb-24">
    <!-- Faculty Header Section -->
    <header class="bg-primary text-white py-24 relative overflow-hidden">
        <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(circle at 2px 2px, white 1px, transparent 0); background-size: 40px 40px;"></div>
        <div class="container mx-auto px-4 relative z-10">
            <div class="flex flex-col md:flex-row items-center gap-12 text-center md:text-left">
                <div class="w-64 h-64 shrink-0 rounded-[3rem] overflow-hidden shadow-2xl border-8 border-white/10 group">
                    <?php if (has_post_thumbnail()) : ?>
                        <?php the_post_thumbnail('large', array('class' => 'w-full h-full object-cover transform group-hover:scale-110 transition duration-1000')); ?>
                    <?php else : ?>
                        <div class="w-full h-full bg-blue-900/50 flex items-center justify-center text-6xl">👤</div>
                    <?php endif; ?>
                </div>
                <div>
                    <?php
                    $categories = get_the_terms(get_the_ID(), 'faculty_category');
                    $is_teaching = false;
                    if ($categories && ! is_wp_error($categories)) {
                        foreach ($categories as $cat) {
                            if (strtolower($cat->name) === 'teaching staff') {
                                $is_teaching = true;
                                break;
                            }
                        }
                    }

                    if ($is_teaching) : ?>
                        <span class="text-xs font-black text-secondary uppercase tracking-[0.4em] mb-4 block">Academic Faculty</span>
                    <?php endif; ?>
                    <h1 class="text-4xl md:text-6xl font-black mb-2 uppercase tracking-tighter"><?php the_title(); ?></h1>

                    <?php
                    $designation = get_post_meta(get_the_ID(), '_ssmc_faculty_designation', true);
                    $qualifications = get_post_meta(get_the_ID(), '_ssmc_faculty_qualifications', true);
                    $categories = get_the_terms(get_the_ID(), 'faculty_category');
                    ?>

                    <?php if ($qualifications) : ?>
                        <p class="text-xl md:text-2xl font-bold text-blue-100 tracking-tight mb-4 opacity-90">
                            <?php echo esc_html($qualifications); ?>
                        </p>
                    <?php endif; ?>

                    <div class="space-y-4">
                        <?php if ($designation || $categories) : ?>
                            <div class="flex flex-wrap gap-4 justify-center md:justify-start items-center">
                                <?php if ($designation) : ?>
                                    <div class="px-6 py-2 bg-white/10 backdrop-blur-md rounded-xl border border-white/20">
                                        <span class="text-secondary font-black uppercase text-xs tracking-widest"><?php echo esc_html($designation); ?></span>
                                    </div>
                                <?php endif; ?>
                                <?php if ($categories) : ?>
                                    <?php foreach ($categories as $cat) : ?>
                                        <div class="px-6 py-2 bg-primary/30 backdrop-blur-md rounded-xl border border-secondary/20">
                                            <span class="text-blue-200 font-bold uppercase text-[10px] tracking-widest"><?php echo esc_html($cat->name); ?></span>
                                        </div>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>


                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="container mx-auto px-4 -mt-12 relative z-20">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">

            <!-- Bio & Info (Main content) -->
            <div class="lg:col-span-8">
                <div class="bg-white rounded-[2.5rem] p-10 md:p-16 shadow-xl shadow-gray-200/50 border border-gray-100 mb-12">
                    <?php
                    $short_bio = get_post_meta(get_the_ID(), '_ssmc_faculty_short_bio', true);
                    $content = get_the_content();

                    if ($short_bio) : ?>
                        <div class="mb-12 pb-12 border-b border-gray-50">
                            <h2 class="text-xs font-black text-primary uppercase tracking-[0.4em] mb-8">Executive Summary</h2>
                            <div class="text-2xl font-light text-gray-800 leading-relaxed italic border-l-4 border-secondary pl-8">
                                <?php echo apply_filters('the_content', $short_bio); ?>
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php if (! empty($content)) : ?>
                        <h2 class="text-xs font-black text-primary uppercase tracking-[0.4em] mb-8">Detailed Biography</h2>
                        <div class="prose prose-blue prose-xl max-w-none text-gray-600 font-light leading-relaxed">
                            <?php the_content(); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Contact & Department Sidebar -->
            <div class="lg:col-span-4">
                <div class="sticky top-32 space-y-8">

                    <!-- Contact Card -->
                    <?php
                    $email = get_post_meta(get_the_ID(), '_ssmc_faculty_email', true);
                    $phone = get_post_meta(get_the_ID(), '_ssmc_faculty_phone', true);
                    if ($email || $phone) : ?>
                        <div class="bg-white rounded-[2.5rem] p-10 shadow-xl shadow-gray-200/50 border border-gray-100 overflow-hidden relative">
                            <div class="absolute top-0 right-0 w-24 h-24 bg-pri/blmary/5 rounded-full -mr-12 -mt-12"></div>
                            <h3 class="text-xs font-black text-primary uppercase tracking-[0.3em] mb-8">Contact Details</h3>

                            <div class="space-y-6">
                                <?php if ($email) : ?>
                                    <div class="flex items-center gap-4">
                                        <div class="w-10 h-10 rounded-xl bg-gray-50 flex items-center justify-center text-primary border border-gray-100">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                            </svg>
                                        </div>
                                        <a href="mailto:<?php echo esc_attr($email); ?>" class="text-gray-600 hover:text-primary transition font-medium text-sm truncate"><?php echo esc_html($email); ?></a>
                                    </div>
                                <?php endif; ?>

                                <?php if ($phone) : ?>
                                    <div class="flex items-center gap-4">
                                        <div class="w-10 h-10 rounded-xl bg-gray-50 flex items-center justify-center text-primary border border-gray-100">
                                            <svg class="w-5 h-5" fill="currentColor" stroke="none" viewBox="0 0 24 24">
                                                <path d="M6.54 5c.06.89.21 1.76.45 2.59l-1.2 1.2c-.41-1.2-.67-2.47-.76-3.79zm9.86 12.02c.85.24 1.72.39 2.6.45v1.49c-1.32-.09-2.59-.35-3.8-.75zM7.5 3H4c-.55 0-1 .45-1 1c0 9.39 7.61 17 17 17c.55 0 1-.45 1-1v-3.49c0-.55-.45-1-1-1c-1.24 0-2.45-.2-3.57-.57a.8.8 0 0 0-.31-.05c-.26 0-.51.1-.71.29l-2.2 2.2a15.15 15.15 0 0 1-6.59-6.59l2.2-2.2c.28-.28.36-.67.25-1.02A11.4 11.4 0 0 1 8.5 4c0-.55-.45-1-1-1" />
                                            </svg>
                                        </div>
                                        <span class="text-gray-600 font-medium text-sm"><?php echo esc_html($phone); ?></span>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php
                    $resume_url = get_post_meta(get_the_ID(), '_ssmc_faculty_resume_pdf_url', true);
                    if ($resume_url) : ?>
                        <!-- Resume Download Card -->
                        <div class="bg-blue-50 rounded-[2.5rem] p-10 shadow-lg border border-blue-100 relative overflow-hidden group">
                            <div class="absolute -right-6 -top-6 w-24 h-24 bg-blue-100 rounded-full group-hover:scale-150 transition duration-700"></div>

                            <h3 class="text-xs font-black text-blue-900 uppercase tracking-[0.3em] mb-6 relative z-10">Curriculum Vitae</h3>

                            <a href="<?php echo esc_url($resume_url); ?>" target="_blank" rel="noopener noreferrer" class="relative z-10 inline-flex items-center justify-center gap-3 w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-4 px-6 rounded-2xl shadow-md transition-all hover:-translate-y-1">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                                <span>Download Resume (PDF)</span>
                            </a>
                        </div>
                    <?php endif; ?>

                    <!-- Affiliations Card -->
                    <div class="bg-gray-900 rounded-[2.5rem] p-10 text-white shadow-2xl relative overflow-hidden group">
                        <div class="absolute -bottom-10 -left-10 w-40 h-40 bg-white/5 rounded-full group-hover:scale-110 transition duration-700"></div>
                        <h3 class="text-xs font-black text-secondary uppercase tracking-[0.3em] mb-8">Affiliations</h3>

                        <?php
                        $departments = get_the_terms(get_the_ID(), 'department');
                        if ($departments) : ?>
                            <div class="flex flex-wrap gap-2 relative z-10">
                                <?php foreach ($departments as $dept) : ?>
                                    <a href="<?php echo esc_url(get_term_link($dept)); ?>" class="px-4 py-2 bg-white/10 hover:bg-white/20 rounded-lg text-[10px] font-black uppercase tracking-widest transition-all">
                                        <?php echo esc_html($dept->name); ?>
                                    </a>
                                <?php endforeach; ?>
                            </div>
                        <?php else : ?>
                            <p class="text-white/40 text-xs italic">No specific department assigned.</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<?php get_footer(); ?>