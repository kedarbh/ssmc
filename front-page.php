<?php

/**
 * The template for the front page (homepage)
 *
 * @package ssmc-custom
 */

get_header(); ?>

<!-- 1. Refined Premium Hero Section -->
<section class="relative bg-primary overflow-hidden min-h-[85vh] flex items-center py-32">
    <!-- Background Image with Overlay -->
    <div class="absolute inset-0 z-0">
        <?php $hero_bg = get_theme_mod('ssmc_hero_bg_image', 'https://images.unsplash.com/photo-1541829070764-84a5d30cb273?q=80&w=2938&auto=format&fit=crop'); ?>
        <img src="<?php echo esc_url($hero_bg); ?>" class="w-full h-full object-cover opacity-30 transform scale-110" alt="SSMC Campus" style="object-position:50% 20%;">
        <div class="absolute inset-0 bg-gradient-to-tr from-primary via-primary/60 to-transparent"></div>
    </div>

    <div class="container mx-auto px-4 relative z-10">
        <div class="flex flex-col lg:flex-row items-center gap-16">
            <div class="lg:w-3/5">
                <?php if (get_theme_mod('ssmc_hero_badge_text', 'Shaping the future since 1980')) : ?>
                    <div class="inline-flex items-center gap-3 px-5 py-2 rounded-full bg-white/10 border border-white/20 backdrop-blur-md mb-8">
                        <span class="w-2 h-2 rounded-full bg-secondary animate-ping"></span>
                        <span id="hero-badge" class="text-xs font-black tracking-[0.3em] text-blue-50 uppercase"><?php echo esc_html(get_theme_mod('ssmc_hero_badge_text', 'Shaping the future since 1980')); ?></span>
                    </div>
                <?php endif; ?>

                <h1 class="text-5xl md:text-7xl lg:text-8xl font-black text-white leading-[0.85] tracking-tighter mb-10">
                    <span id="hero-headline-1"><?php echo esc_html(get_theme_mod('ssmc_hero_headline_1', 'Empowering')); ?></span><br />
                    <span id="hero-headline-2" class="text-transparent bg-clip-text bg-gradient-to-r from-secondary via-yellow-200 to-white">
                        <?php echo esc_html(get_theme_mod('ssmc_hero_headline_2', "Chitwan's Future")); ?>
                    </span>
                </h1>

                <p id="hero-description" class="text-lg md:text-xl text-blue-100/70 max-w-2xl font-light leading-relaxed mb-12 border-l-4 border-secondary pl-8">
                    <?php echo esc_html(get_theme_mod('ssmc_hero_description', 'Established in 1980 AD, Shaheed Smriti Multiple Campus stands as a beacon of academic excellence, nurturing leaders through accessible, high-quality higher education in Nepal.')); ?>
                </p>

                <div class="flex flex-wrap gap-6">
                    <a id="hero-btn1" href="<?php echo esc_url(get_theme_mod('ssmc_hero_btn1_url', '#programs')); ?>" class="px-10 py-5 bg-secondary text-primary font-black rounded-2xl hover:bg-yellow-400 transition-all duration-500 uppercase text-xs tracking-widest shadow-xl shadow-secondary/20">
                        <?php echo esc_html(get_theme_mod('ssmc_hero_btn1_text', 'Explore Programs')); ?>
                    </a>
                    <a id="hero-btn2" href="<?php echo esc_url(get_theme_mod('ssmc_hero_btn2_url', '#news')); ?>" class="px-10 py-5 bg-white/10 text-white border border-white/20 font-black rounded-2xl hover:bg-white/20 transition-all duration-500 uppercase text-xs tracking-widest backdrop-blur-sm">
                        <?php echo esc_html(get_theme_mod('ssmc_hero_btn2_text', 'Latest News')); ?>
                    </a>
                </div>
            </div>

            <!-- New Image Column -->
            <div class="lg:w-2/5 relative animate-fade-in-right">
                <div class="relative z-10 drop-shadow-[0_35px_35px_rgba(0,0,0,0.5)] transform hover:scale-105 transition-transform duration-700">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/graduating-students.png" alt="SSMC Graduates" class="w-full h-auto rounded-[3rem] border-8 border-white/5 backdrop-blur-sm grayscale-[30%] hover:grayscale-0 transition duration-700">

                    <!-- Floating Badge on image -->
                    <div class="absolute -bottom-6 -left-6 bg-white p-6 rounded-3xl shadow-2xl hidden md:block border border-gray-100">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 bg-primary/10 rounded-full flex items-center justify-center">
                                <svg class="w-6 h-6 text-primary" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10.394 2.827a1 1 0 00-.788 0l-7 3a1 1 0 000 1.848l7 3a1 1 0 00.788 0l7-3a1 1 0 000-1.848l-7-3zM14 11.596V13a1 1 0 01-.553.894l-3 1.5a1 1 0 01-.894 0l-3-1.5A1 1 0 016 13V11.596l4 2 4-2z"></path>
                                </svg>
                            </div>
                            <div>
                                <div class="text-[10px] font-black text-gray-400 uppercase tracking-widest leading-none mb-1">Community Pillar</div>
                                <div class="text-sm font-black text-primary uppercase tracking-tighter">Academic Excellence</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Decorative elements behind image -->
                <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[120%] h-[120%] bg-secondary/10 rounded-full blur-[100px] -z-10 animate-pulse"></div>
                <div class="absolute top-0 right-0 w-32 h-32 bg-white/5 rounded-full blur-3xl -z-10 tracking-widest"></div>
            </div>
        </div>
    </div>

    <!-- Decorative Bottom Wave -->
    <div class="absolute bottom-0 left-0 w-full overflow-hidden leading-none z-20">
        <svg class="relative block w-full h-[60px] md:h-[100px]" viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V120H0V95.8C59.71,118.08,130.83,123.6,189.6,108.64,233.1,97.4,281.39,78.29,321.39,56.44Z" fill="#ffffff"></path>
        </svg>
    </div>
</section>

<!-- 2. Introduction & Leadership (Balanced Half-Section) -->
<section class="py-24 bg-white overflow-hidden">
    <div class="container mx-auto px-4">
        <!-- Title area -->
        <div class="max-w-4xl mb-20 text-center mx-auto">
            <h2 class="text-xs font-black text-primary uppercase tracking-[0.4em] mb-4">Our Leadership</h2>
            <h3 class="text-4xl md:text-5xl font-black text-gray-900 tracking-tight">Guiding Excellence with Vision</h3>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <!-- Left Half: Chairman -->
            <div class="group relative bg-white rounded-[2.5rem] p-10 md:p-14 overflow-hidden border border-gray-100 flex flex-col md:flex-row gap-10 items-center md:items-start text-center md:text-left hover:shadow-[0_40px_80px_-15px_rgba(30,58,138,0.1)] transition-all duration-700">
                <div class="w-52 h-52 shrink-0 rounded-[1.5rem] overflow-hidden shadow-xl border-4 border-white group-hover:border-secondary/50 transition-all duration-700 transform group-hover:scale-105">
                    <?php $chairman_img = get_theme_mod('ssmc_chairman_img', 'https://ui-avatars.com/api/?name=Uttam+Acharya&size=400&background=1e3a8a&color=fff'); ?>
                    <img id="leadership-img-1" src="<?php echo esc_url($chairman_img); ?>" class="w-full h-full object-cover transition duration-700" alt="Chairman Photo">
                </div>
                <div class="relative z-10">
                    <div class="text-primary text-[10px] font-black uppercase tracking-[0.3em] mb-2">Campus Chairman</div>
                    <h4 id="leadership-name-1" class="text-3xl font-black text-gray-900 mb-6 uppercase tracking-tighter leading-none"><?php echo esc_html(get_theme_mod('ssmc_chairman_name', 'Uttam Acharya')); ?></h4>
                    <p id="leadership-quote-1" class="text-gray-600 font-light italic leading-relaxed text-lg relative">
                        <span class="text-4xl text-primary/10 absolute -top-4 -left-6 font-serif leading-none italic">“</span>
                        <?php echo esc_html(get_theme_mod('ssmc_chairman_quote', '"As Chairman, my commitment is to ensure SSMC remains a top-tier institution that serves the community and empowers every student to reach their peak potential."')); ?>
                    </p>
                </div>

                <!-- Decorative background elements -->
                <div class="absolute top-0 right-0 w-32 h-32 bg-primary/5 rounded-full -mr-16 -mt-16 group-hover:scale-150 transition-transform duration-1000"></div>
            </div>

            <!-- Right Half: Campus Chief -->
            <div class="group relative bg-white rounded-[2.5rem] p-10 md:p-14 overflow-hidden border border-gray-100 flex flex-col md:flex-row gap-10 items-center md:items-start text-center md:text-left hover:shadow-[0_40px_80px_-15px_rgba(30,58,138,0.1)] transition-all duration-700">
                <div class="w-52 h-52 shrink-0 rounded-[1.5rem] overflow-hidden shadow-xl border-4 border-white group-hover:border-secondary/50 transition-all duration-700 transform group-hover:scale-105">
                    <?php $chief_img = get_theme_mod('ssmc_chief_img', 'https://ui-avatars.com/api/?name=Dharma+Datta+Tiwari&size=400&background=fa-cc-15&color=1e3a8a'); ?>
                    <img id="leadership-img-2" src="<?php echo esc_url($chief_img); ?>" class="w-full h-full object-cover transition duration-700" alt="Campus Chief Photo">
                </div>
                <div class="relative z-10">
                    <div class="text-primary text-[10px] font-black uppercase tracking-[0.3em] mb-2">Campus Chief</div>
                    <h4 id="leadership-name-2" class="text-3xl font-black text-gray-900 mb-6 uppercase tracking-tighter leading-none"><?php echo esc_html(get_theme_mod('ssmc_chief_name', 'Dr. Dharma Datta Tiwari')); ?></h4>
                    <p id="leadership-quote-2" class="text-gray-600 font-light italic leading-relaxed text-lg relative">
                        <span class="text-4xl text-primary/10 absolute -top-4 -left-6 font-serif leading-none italic">“</span>
                        <?php echo esc_html(get_theme_mod('ssmc_chief_quote', '"Fostering an intellectually stimulating environment where local community support meets global academic standards is our core mission."')); ?>
                    </p>
                </div>

                <!-- Decorative background elements -->
                <div class="absolute top-0 right-0 w-32 h-32 bg-primary/5 rounded-full -mr-16 -mt-16 group-hover:scale-150 transition-transform duration-1000"></div>
            </div>
        </div>

        <!-- Campus Introduction -->
        <div class="mt-24  py-24 flex flex-col lg:flex-row gap-16 lg:items-stretch">
            <div class="lg:w-1/2 flex">
                <div class="w-full relative rounded-[2.5rem] overflow-hidden shadow-2xl border-8 border-gray-50 transform hover:scale-[1.02] transition-transform duration-700 min-h-[350px]">
                    <?php $intro_img = get_theme_mod('ssmc_intro_img', 'https://images.unsplash.com/photo-1523050853063-bd42da225e01?q=80&w=2000&auto=format&fit=crop'); ?>
                    <img src="<?php echo esc_url($intro_img); ?>" class="absolute inset-0 w-full h-full object-cover" alt="SSMC Campus">
                </div>
            </div>
            <div class="lg:w-1/2 flex flex-col justify-center py-6 lg:py-0">
                <div class="text-xs font-black text-primary uppercase tracking-[0.4em] mb-4">
                    <span id="intro-badge"><?php echo esc_html(get_theme_mod('ssmc_intro_badge', 'Welcome to SSMC')); ?></span>
                </div>
                <h3 id="intro-title" class="text-4xl md:text-5xl font-black text-gray-900 mb-8 tracking-tight">
                    <?php echo esc_html(get_theme_mod('ssmc_intro_title', 'Empowering Educational Hub of Ratnanagar')); ?>
                </h3>
                <p id="intro-desc" class="text-gray-600 font-light text-lg leading-relaxed mb-10">
                    <?php echo esc_html(get_theme_mod('ssmc_intro_desc', 'Shaheed Smriti Multiple Campus (SSMC) stands as a proud community-based institution. Affiliated with Tribhuvan University, we have spent four decades nurturing the intellectual and professional growth of Chitwan\'s youth. We offer a diverse range of undergraduate and graduate programs tailored to meet the evolving demands of the modern workforce, ensuring our graduates are not just degree holders, but future leaders and innovators in their respective fields.')); ?>
                </p>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="p-6 rounded-3xl bg-gray-50 border border-gray-100 hover:border-secondary transition-colors duration-500">
                        <h4 id="intro-feat1-title" class="text-sm font-black text-gray-900 mb-1 uppercase tracking-tight"><?php echo esc_html(get_theme_mod('ssmc_intro_feat1_title', 'Community-Led')); ?></h4>
                        <p id="intro-feat1-text" class="text-gray-500 font-light text-xs"><?php echo esc_html(get_theme_mod('ssmc_intro_feat1_text', 'Owned and operated by the community.')); ?></p>
                    </div>
                    <div class="p-6 rounded-3xl bg-gray-50 border border-gray-100 hover:border-secondary transition-colors duration-500">
                        <h4 id="intro-feat2-title" class="text-sm font-black text-gray-900 mb-1 uppercase tracking-tight"><?php echo esc_html(get_theme_mod('ssmc_intro_feat2_title', 'Quality Education')); ?></h4>
                        <p id="intro-feat2-text" class="text-gray-500 font-light text-xs"><?php echo esc_html(get_theme_mod('ssmc_intro_feat2_text', 'UGC accredited institution.')); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 3. Academic Degrees (Grid 2.0 - Re-styled for focus) -->
<section id="programs" class="py-24 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="text-center max-w-3xl mx-auto mb-20">
            <h2 class="text-xs font-black text-primary uppercase tracking-[0.4em] mb-6">Degree Portfolio</h2>
            <h3 class="text-4xl md:text-6xl font-black text-gray-900 leading-none tracking-tighter uppercase">Our Programs</h3>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
            <?php
            $programs_query = new WP_Query(array(
                'post_type'      => 'program',
                'posts_per_page' => 3,
                'no_found_rows'  => true,
            ));

            if ($programs_query->have_posts()) :
                while ($programs_query->have_posts()) : $programs_query->the_post();
            ?>
                    <a href="<?php the_permalink(); ?>" class="group block relative h-[550px] rounded-[3rem] overflow-hidden shadow-2xl hover:-translate-y-4 transition-all duration-700">
                        <?php if (has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail('large', array('class' => 'absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition duration-1000 grayscale group-hover:grayscale-0')); ?>
                        <?php else : ?>
                            <div class="absolute inset-0 bg-gray-200"></div>
                        <?php endif; ?>

                        <div class="absolute inset-0 bg-gradient-to-t from-primary/95 via-primary/30 to-transparent group-hover:from-primary/90 transition-all duration-500"></div>

                        <div class="absolute bottom-0 left-0 w-full p-12">
                            <div class="w-12 h-1.5 bg-secondary mb-6 group-hover:w-full transition-all duration-700"></div>
                            <h4 class="text-4xl font-black text-white leading-[0.9] tracking-tighter mb-2 uppercase"><?php the_title(); ?></h4>
                            <div class="text-blue-100/50 text-xs font-black uppercase tracking-widest mt-4 opacity-0 group-hover:opacity-100 transition-opacity">Discover More &rarr;</div>
                        </div>
                    </a>
                <?php
                endwhile;
                wp_reset_postdata();
            else :
                // Show placeholders
                for ($x = 1; $x <= 3; $x++) :
                ?>
                    <div class="relative h-[550px] rounded-[3rem] overflow-hidden bg-white border border-gray-100 flex items-center justify-center p-12 text-center group">
                        <div class="relative z-10">
                            <h4 class="text-3xl font-black text-gray-200 uppercase tracking-tighter">Academic Pillar 0<?php echo $x; ?></h4>
                            <p class="text-gray-300 text-xs font-black uppercase tracking-widest mt-4">Coming Soon</p>
                        </div>
                    </div>
            <?php endfor;
            endif; ?>
        </div>
    </div>
</section>

<section id="news" class="py-24 bg-white relative overflow-hidden">
    <!-- Background accents -->
    <div class="absolute top-0 left-0 w-full h-px bg-gradient-to-r from-transparent via-gray-200 to-transparent opacity-50"></div>
    <div class="absolute top-1/4 left-0 w-96 h-96 bg-primary/5 rounded-full blur-3xl -translate-x-1/2 pointer-events-none"></div>

    <div class="container mx-auto px-4 relative z-10">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 lg:gap-12">

            <!-- Left: News (Standard Posts) -->
            <div class="flex flex-col h-full">
                <div class="flex justify-between items-end mb-10 border-b border-gray-100 pb-6 uppercase">
                    <div>
                        <h2 class="text-[10px] font-black text-primary tracking-[0.4em] mb-3 flex items-center gap-2">
                            <span class="w-1.5 h-1.5 rounded-full bg-primary animate-pulse"></span>
                            Pulse of Campus
                        </h2>
                        <h3 class="text-3xl font-black text-gray-900 tracking-tighter">Latest News</h3>
                    </div>
                </div>

                <div class="flex flex-col flex-1 gap-6">
                    <?php
                    $news_query = new WP_Query(array(
                        'post_type'      => 'post',
                        'posts_per_page' => 3,
                        'no_found_rows'  => true,
                    ));

                    if ($news_query->have_posts()) :
                        $count = 0;
                        while ($news_query->have_posts()) : $news_query->the_post();
                            if ($count === 0) :
                                // Featured News
                    ?>
                                <a href="<?php the_permalink(); ?>" class="group relative block w-full h-64 rounded-3xl overflow-hidden shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-500">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <?php the_post_thumbnail('large', array('class' => 'absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition duration-700')); ?>
                                    <?php else: ?>
                                        <div class="absolute inset-0 bg-gray-200"></div>
                                    <?php endif; ?>
                                    <div class="absolute inset-0 bg-gradient-to-t from-gray-900 via-gray-900/40 to-transparent opacity-90 group-hover:opacity-100 transition-opacity duration-500"></div>
                                    <div class="absolute bottom-0 left-0 p-6 w-full text-left">
                                        <span class="inline-block bg-primary text-white text-[9px] font-bold uppercase tracking-widest px-2.5 py-1 rounded-sm mb-3 shadow-[0_4px_10px_rgba(30,58,138,0.5)]">Featured</span>
                                        <h4 class="text-xl font-black text-white line-clamp-2 leading-tight drop-shadow-md group-hover:text-blue-100 transition-colors"><?php the_title(); ?></h4>
                                        <p class="text-gray-300 text-xs mt-3 font-medium flex items-center gap-2 opacity-80">
                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            <?php echo get_the_date('F d, Y'); ?>
                                        </p>
                                    </div>
                                </a>
                                <div class="space-y-2 mt-2">
                                <?php
                            else :
                                // Regular News List
                                ?>
                                    <a href="<?php the_permalink(); ?>" class="group flex items-center gap-5 hover:bg-gray-50 p-4 -mx-4 rounded-2xl transition-colors duration-300">
                                        <?php if (has_post_thumbnail()) : ?>
                                            <div class="w-20 h-20 shrink-0 rounded-[1rem] overflow-hidden shadow-sm">
                                                <?php the_post_thumbnail('thumbnail', array('class' => 'w-full h-full object-cover group-hover:scale-110 transition duration-500')); ?>
                                            </div>
                                        <?php else: ?>
                                            <div class="w-20 h-20 shrink-0 rounded-[1rem] bg-gray-100 border border-gray-200"></div>
                                        <?php endif; ?>
                                        <div class="flex-1 min-w-0 pb-1">
                                            <p class="text-gray-400 text-[9px] uppercase font-bold tracking-[0.2em] mb-1.5"><?php echo get_the_date('M d, Y'); ?></p>
                                            <h4 class="text-sm font-bold text-gray-800 group-hover:text-primary transition-colors line-clamp-2 leading-[1.4]"><?php the_title(); ?></h4>
                                        </div>
                                    </a>
                        <?php
                            endif;
                            $count++;
                        endwhile;
                        echo '</div>'; // close space-y-2
                        wp_reset_postdata();
                    else :
                        echo '<div class="text-center py-10 bg-gray-50 rounded-3xl border border-gray-100 border-dashed"><p class="text-gray-400 text-sm italic">Stay tuned for official news...</p></div>';
                    endif;
                        ?>
                                </div>
                </div>

                <!-- Middle: Notices -->
                <div class="h-full">
                    <div class="bg-gray-50 rounded-[2.5rem] p-8 lg:p-10 h-full border border-gray-100 shadow-[inset_0_4px_24px_rgba(0,0,0,0.02)] relative overflow-hidden group">
                        <!-- Decorative texture -->
                        <div class="absolute top-0 right-0 w-48 h-48 bg-secondary/15 rounded-full blur-3xl -translate-y-1/2 translate-x-1/3 group-hover:bg-primary/10 transition duration-700 pointer-events-none"></div>

                        <div class="flex justify-between items-end mb-10 relative z-10 border-b border-gray-200/60 pb-6 uppercase">
                            <div>
                                <h2 class="text-[10px] font-black text-secondary tracking-[0.4em] mb-3 flex items-center gap-2">
                                    <span class="w-1.5 h-1.5 rounded-full bg-secondary animate-pulse"></span>
                                    Official
                                </h2>
                                <h3 class="text-3xl font-black text-gray-900 tracking-tighter">Notices</h3>
                            </div>
                            <a href="<?php echo esc_url(get_post_type_archive_link('notice')); ?>" class="text-[10px] font-black text-primary hover:text-secondary mb-1 transition tracking-widest flex items-center gap-1 group/link">
                                View All <svg class="w-3.5 h-3.5 transform group-hover/link:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                </svg>
                            </a>
                        </div>

                        <div class="space-y-4 relative z-10">
                            <?php
                            $notices_query = new WP_Query(array(
                                'post_type'      => 'notice',
                                'posts_per_page' => 4,
                                'no_found_rows'  => true,
                            ));

                            if ($notices_query->have_posts()) :
                                while ($notices_query->have_posts()) : $notices_query->the_post();
                            ?>
                                    <a href="<?php the_permalink(); ?>" class="group/notice flex items-center gap-5 p-4 bg-white rounded-2xl shadow-sm hover:shadow-xl hover:shadow-primary/5 transition-all duration-300 border border-transparent hover:border-gray-200 hover:-translate-y-1">
                                        <div class="shrink-0 flex flex-col items-center justify-center w-14 h-14 bg-gray-50 rounded-[1rem] border border-gray-100 group-hover/notice:bg-primary group-hover/notice:border-primary transition-colors duration-300 shadow-inner">
                                            <span class="text-xl font-black text-gray-900 group-hover/notice:text-white leading-none tracking-tighter"><?php echo get_the_date('d'); ?></span>
                                            <span class="text-[9px] font-bold text-gray-400 group-hover/notice:text-white/80 uppercase tracking-widest mt-0.5"><?php echo get_the_date('M'); ?></span>
                                        </div>
                                        <div class="flex-1 min-w-0 pr-2">
                                            <h4 class="text-sm font-bold text-gray-800 group-hover/notice:text-primary transition-colors line-clamp-2 leading-[1.4]"><?php the_title(); ?></h4>
                                            <div class="text-[9px] text-gray-400 font-bold uppercase tracking-wider mt-2.5 flex items-center gap-1.5 opacity-0 group-hover/notice:opacity-100 transform -translate-x-2 group-hover/notice:translate-x-0 transition-all duration-300">
                                                Read Notice <svg class="w-3 h-3 text-secondary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                                </svg>
                                            </div>
                                        </div>
                                    </a>
                            <?php
                                endwhile;
                                wp_reset_postdata();
                            else :
                                echo '<div class="text-center py-10 bg-white rounded-2xl border border-gray-100"><p class="text-gray-400 text-sm italic">No recent notices...</p></div>';
                            endif;
                            ?>
                        </div>
                    </div>
                </div>

                <!-- Right: Upcoming Events -->
                <div class="flex flex-col h-full pl-0 lg:pl-6">
                    <div class="flex justify-between items-end mb-10 border-b border-gray-100 pb-6 uppercase">
                        <div>
                            <h2 class="text-[10px] font-black text-blue-600 tracking-[0.4em] mb-3 flex items-center gap-2">
                                <span class="w-1.5 h-1.5 rounded-full bg-blue-600 animate-pulse"></span>
                                Don't Miss Out
                            </h2>
                            <h3 class="text-3xl font-black text-gray-900 tracking-tighter">Events</h3>
                        </div>
                        <a href="<?php echo esc_url(get_post_type_archive_link('event')); ?>" class="text-[10px] font-black text-primary hover:text-secondary mb-1 transition tracking-widest flex items-center gap-1 group/link">
                            View All <svg class="w-3.5 h-3.5 transform group-hover/link:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </a>
                    </div>

                    <div class="relative pl-6 space-y-10 before:absolute before:inset-y-0 before:left-2 before:-ml-px before:w-0.5 before:bg-gradient-to-b before:from-gray-200 before:via-gray-200 before:to-transparent pt-2">
                        <?php
                        $events_query = new WP_Query(array(
                            'post_type'      => 'event',
                            'posts_per_page' => 3,
                            'no_found_rows'  => true,
                        ));

                        if ($events_query->have_posts()) :
                            $colors = ['text-secondary', 'text-primary', 'text-blue-500'];
                            $bg_colors = ['bg-secondary', 'bg-primary', 'bg-blue-500'];
                            $i = 0;
                            while ($events_query->have_posts()) : $events_query->the_post();
                                $color_class = $colors[$i % count($colors)];
                                $bg_class = $bg_colors[$i % count($bg_colors)];
                        ?>
                                <a href="<?php the_permalink(); ?>" class="relative flex flex-col gap-2 group block hover:-translate-y-1 transition-transform duration-300">
                                    <span class="absolute -left-[2.05rem] top-1.5 flex h-4 w-4 items-center justify-center">
                                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full <?php echo $bg_class; ?> opacity-20"></span>
                                        <span class="relative inline-flex rounded-full h-2.5 w-2.5 <?php echo $bg_class; ?> ring-4 ring-white shadow-sm"></span>
                                    </span>

                                    <div class="bg-white p-5 rounded-2xl shadow-sm border border-gray-100 group-hover:shadow-xl group-hover:border-gray-200 transition-all duration-300 relative z-10">
                                        <span class="text-[9px] font-black <?php echo $color_class; ?> uppercase tracking-[0.2em] mb-2 block flex items-center gap-1.5">
                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                            </svg>
                                            <?php echo get_the_date('F d, Y'); ?>
                                        </span>
                                        <h4 class="text-lg font-black text-gray-900 group-hover:text-primary transition-colors tracking-tight mb-2 leading-[1.3]"><?php the_title(); ?></h4>
                                        <p class="text-gray-500 font-medium text-xs leading-relaxed line-clamp-2"><?php echo wp_trim_words(get_the_excerpt(), 15); ?></p>
                                    </div>
                                </a>
                        <?php
                                $i++;
                            endwhile;
                            wp_reset_postdata();
                        else :
                            echo '<div class="text-center py-10"><p class="text-gray-400 text-sm italic">Stay tuned for exciting events...</p></div>';
                        endif;
                        ?>
                    </div>
                </div>

            </div>
        </div>
</section>

<!-- 5. Excellence by Numbers (Quick Impact) -->
<section class="py-20 bg-primary text-white overflow-hidden relative">
    <!-- Subtle parallax background pattern -->
    <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(circle at 2px 2px, white 1px, transparent 0); background-size: 40px 40px;"></div>

    <div class="container mx-auto px-4 relative z-10">
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-12 text-center">
            <div>
                <div class="text-5xl lg:text-7xl font-black text-secondary mb-2 tracking-tighter">40+</div>
                <div class="text-[10px] font-black opacity-40 uppercase tracking-[0.4em]">Years of Glory</div>
            </div>
            <div>
                <div class="text-5xl lg:text-7xl font-black text-white mb-2 tracking-tighter">15K+</div>
                <div class="text-[10px] font-black opacity-40 uppercase tracking-[0.4em]">Success Stories</div>
            </div>
            <div>
                <div class="text-5xl lg:text-7xl font-black text-secondary mb-2 tracking-tighter">10+</div>
                <div class="text-[10px] font-black opacity-40 uppercase tracking-[0.4em]">Programs</div>
            </div>
            <div>
                <div class="text-5xl lg:text-7xl font-black text-white mb-2 tracking-tighter">40+</div>
                <div class="text-[10px] font-black opacity-40 uppercase tracking-[0.4em]">Expert Faculty</div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>