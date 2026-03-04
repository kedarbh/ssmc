<?php
/**
 * The template for the front page (homepage)
 *
 * @package ssmc-custom
 */

get_header(); ?>

<!-- 1. Refined Premium Hero Section -->
<section class="relative bg-primary overflow-hidden min-h-[85vh] flex items-center pt-24 pb-20">
    <!-- Background Image with Overlay -->
    <div class="absolute inset-0 z-0">
        <?php $hero_bg = get_theme_mod( 'ssmc_hero_bg_image', 'https://images.unsplash.com/photo-1541829070764-84a5d30cb273?q=80&w=2938&auto=format&fit=crop' ); ?>
        <img src="<?php echo esc_url( $hero_bg ); ?>" class="w-full h-full object-cover opacity-30 transform scale-110" alt="SSMC Campus" style="object-position:50% 20%;">
        <div class="absolute inset-0 bg-gradient-to-tr from-primary via-primary/60 to-transparent"></div>
    </div>
    
    <div class="container mx-auto px-4 relative z-10">
        <div class="max-w-5xl">
            <?php if ( get_theme_mod( 'ssmc_hero_badge_text', 'Shaping the future since 1980' ) ) : ?>
            <div class="inline-flex items-center gap-3 px-5 py-2 rounded-full bg-white/10 border border-white/20 backdrop-blur-md mb-8">
                <span class="w-2 h-2 rounded-full bg-secondary animate-ping"></span>
                <span class="text-xs font-black tracking-[0.3em] text-blue-50 uppercase"><?php echo esc_html( get_theme_mod( 'ssmc_hero_badge_text', 'Shaping the future since 1980' ) ); ?></span>
            </div>
            <?php endif; ?>
            
            <h1 class="text-6xl md:text-8xl lg:text-9xl font-black text-white leading-[0.85] tracking-tighter mb-10">
                <?php echo esc_html( get_theme_mod( 'ssmc_hero_headline_1', 'Empowering' ) ); ?><br/>
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-secondary via-yellow-200 to-white">
                    <?php echo esc_html( get_theme_mod( 'ssmc_hero_headline_2', "Chitwan's Future" ) ); ?>
                </span>
            </h1>
            
            <p class="text-xl md:text-2xl text-blue-100/70 max-w-2xl font-light leading-relaxed mb-12 border-l-4 border-secondary pl-8">
                <?php echo esc_html( get_theme_mod( 'ssmc_hero_description', 'Established in 1980 AD, Shaheed Smriti Multiple Campus stands as a beacon of academic excellence, nurturing leaders through accessible, high-quality higher education in Nepal.' ) ); ?>
            </p>
            
            <div class="flex flex-wrap gap-6">
                <a href="#programs" class="px-10 py-5 bg-secondary text-primary font-black rounded-2xl hover:bg-yellow-400 transition-all duration-500 uppercase text-xs tracking-widest shadow-xl shadow-secondary/20">
                    Explore Programs
                </a>
                <a href="#news" class="px-10 py-5 bg-white/10 text-white border border-white/20 font-black rounded-2xl hover:bg-white/20 transition-all duration-500 uppercase text-xs tracking-widest backdrop-blur-sm">
                    Latest News
                </a>
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
            <div class="group relative bg-gray-50 rounded-[3rem] p-10 md:p-16 overflow-hidden border border-gray-100 flex flex-col md:flex-row gap-8 items-center md:items-start text-center md:text-left hover:bg-primary transition-all duration-500 shadow-xl shadow-gray-100/50">
                <div class="w-48 h-48 shrink-0 rounded-3xl overflow-hidden shadow-2xl border-4 border-white group-hover:border-secondary transition-colors">
                    <img src="https://ui-avatars.com/api/?name=Uttam+Acharya&size=400&background=1e3a8a&color=fff" class="w-full h-full object-cover grayscale group-hover:grayscale-0 transition duration-500" alt="Uttam Acharya">
                </div>
                <div>
                    <span class="text-[10px] font-black text-primary group-hover:text-secondary uppercase tracking-[0.3em] mb-4 block">Campus Chairman</span>
                    <h4 class="text-3xl font-black text-gray-900 group-hover:text-white mb-6 uppercase tracking-tighter">Uttam Acharya</h4>
                    <p class="text-gray-500 group-hover:text-blue-100/70 font-light italic leading-relaxed text-lg">
                        "As Chairman, my commitment is to ensure SSMC remains a top-tier institution that serves the community and empowers every student to reach their peak potential."
                    </p>
                </div>
                <!-- Quote Icon -->
                <div class="absolute top-10 right-10 text-6xl text-gray-100 group-hover:text-white/5 font-black hidden lg:block">“</div>
            </div>

            <!-- Right Half: Campus Chief -->
            <div class="group relative bg-gray-50 rounded-[3rem] p-10 md:p-16 overflow-hidden border border-gray-100 flex flex-col md:flex-row gap-8 items-center md:items-start text-center md:text-left hover:bg-primary transition-all duration-500 shadow-xl shadow-gray-100/50">
                <div class="w-48 h-48 shrink-0 rounded-3xl overflow-hidden shadow-2xl border-4 border-white group-hover:border-secondary transition-colors">
                    <img src="https://ui-avatars.com/api/?name=Dharma+Datta+Tiwari&size=400&background=fa-cc-15&color=1e3a8a" class="w-full h-full object-cover grayscale group-hover:grayscale-0 transition duration-500" alt="Dr. Dharma Datta Tiwari">
                </div>
                <div>
                    <span class="text-[10px] font-black text-primary group-hover:text-secondary uppercase tracking-[0.3em] mb-4 block">Campus Chief</span>
                    <h4 class="text-3xl font-black text-gray-900 group-hover:text-white mb-6 uppercase tracking-tighter">Dr. Dharma Datta Tiwari</h4>
                    <p class="text-gray-500 group-hover:text-blue-100/70 font-light italic leading-relaxed text-lg">
                        "Fostering an intellectually stimulating environment where local community support meets global academic standards is our core mission."
                    </p>
                </div>
                <!-- Quote Icon -->
                <div class="absolute top-10 right-10 text-6xl text-gray-100 group-hover:text-white/5 font-black hidden lg:block">“</div>
            </div>
        </div>

        <!-- Campus Introduction (Following leadership or integrated) -->
        <div class="mt-24 max-w-5xl mx-auto flex flex-col lg:flex-row gap-16 items-center">
            <div class="lg:w-1/2">
                <div class="relative rounded-[2.5rem] overflow-hidden shadow-2xl border-8 border-gray-50">
                    <img src="https://images.unsplash.com/photo-1523050853063-bd42da225e01?q=80&w=2000&auto=format&fit=crop" class="w-full h-auto" alt="SSMC Campus">
                </div>
            </div>
            <div class="lg:w-1/2">
                <h2 class="text-xs font-black text-primary uppercase tracking-[0.3em] mb-6">Introduction</h2>
                <h3 class="text-4xl font-black text-gray-900 mb-8 leading-tight">Empowering Educational Hub of Ratnanagar</h3>
                <p class="text-gray-600 font-light text-lg leading-relaxed mb-10">
                    Shaheed Smriti Multiple Campus (SSMC) stands as a proud community-based institution. Affiliated with Tribhuvan University, we have spent four decades nurturing the intellectual and professional growth of Chitwan's youth.
                </p>
                <a href="<?php echo esc_url( home_url('/about-us') ); ?>" class="inline-flex py-4 px-8 border-2 border-primary text-primary font-black rounded-xl hover:bg-primary hover:text-white transition-all text-xs uppercase tracking-widest">
                    Learn Our History
                </a>
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
            <?php endfor; endif; ?>
        </div>
    </div>
</section>

<!-- 4. News & Events Section (Balanced Flow) -->
<section id="news" class="py-24 bg-white">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-20">
            <!-- Left: News (Notices) -->
            <div>
                <div class="flex justify-between items-end mb-12 border-b-4 border-gray-50 pb-8 uppercase">
                    <div>
                        <h2 class="text-xs font-black text-primary tracking-[0.4em] mb-4">Pulse of Campus</h2>
                        <h3 class="text-4xl font-black text-gray-900 tracking-tighter">Latest News</h3>
                    </div>
                    <a href="<?php echo esc_url( get_post_type_archive_link('notice') ); ?>" class="text-[10px] font-black text-primary hover:text-secondary mb-2 transition tracking-widest">View All News</a>
                </div>

                <div class="grid grid-cols-1 gap-6">
                    <?php
                    $notices_query = new WP_Query(array(
                        'post_type'      => 'notice',
                        'posts_per_page' => 3,
                        'no_found_rows'  => true,
                    ));

                    if ($notices_query->have_posts()) :
                        while ($notices_query->have_posts()) : $notices_query->the_post();
                    ?>
                        <a href="<?php the_permalink(); ?>" class="group flex gap-8 p-6 bg-gray-50 rounded-3xl hover:bg-white hover:shadow-xl transition-all duration-500 border border-transparent hover:border-gray-100">
                            <div class="shrink-0 w-24 h-24 bg-white rounded-2xl flex flex-col items-center justify-center shadow-inner group-hover:bg-primary transition-colors duration-500">
                                <span class="text-2xl font-black text-primary group-hover:text-white leading-none"><?php echo get_the_date('d'); ?></span>
                                <span class="text-[10px] font-bold text-gray-400 group-hover:text-white/70 uppercase tracking-widest"><?php echo get_the_date('M'); ?></span>
                            </div>
                            <div class="flex flex-col justify-center">
                                <h4 class="text-lg font-black text-gray-900 group-hover:text-primary transition-colors line-clamp-2 uppercase tracking-tight"><?php the_title(); ?></h4>
                                <p class="text-gray-400 text-xs mt-2 font-medium"><?php echo get_the_date('Y'); ?> • Official Announcement</p>
                            </div>
                        </a>
                    <?php 
                        endwhile;
                        wp_reset_postdata();
                    else :
                        echo '<p class="text-gray-400 text-sm italic">Stay tuned for official updates...</p>';
                    endif;
                    ?>
                </div>
            </div>

            <!-- Right: Upcoming Events -->
            <div>
                <div class="flex justify-between items-end mb-12 border-b-4 border-gray-50 pb-8 uppercase">
                    <div>
                        <h2 class="text-xs font-black text-secondary tracking-[0.4em] mb-4">Don't Miss Out</h2>
                        <h3 class="text-4xl font-black text-gray-900 tracking-tighter">Campus Events</h3>
                    </div>
                </div>

                <div class="space-y-8">
                    <div class="flex gap-8 group">
                        <div class="shrink-0 w-[4px] bg-secondary group-hover:w-2 transition-all duration-300"></div>
                        <div>
                            <span class="text-[10px] font-black text-secondary uppercase tracking-[0.2em] mb-2 block">March 15, 2024</span>
                            <h4 class="text-xl font-black text-gray-900 group-hover:text-primary transition uppercase tracking-tight mb-3">Digital Capacity Training</h4>
                            <p class="text-gray-500 font-light text-sm leading-relaxed">Join us for a specialized session for students and educators on leveraging digital tools for research.</p>
                        </div>
                    </div>
                    
                    <div class="flex gap-8 group">
                        <div class="shrink-0 w-[4px] bg-primary group-hover:w-2 transition-all duration-300"></div>
                        <div>
                            <span class="text-[10px] font-black text-primary uppercase tracking-[0.2em] mb-2 block">April 05, 2024</span>
                            <h4 class="text-xl font-black text-gray-900 group-hover:text-primary transition uppercase tracking-tight mb-3">Annual Sports Meet</h4>
                            <p class="text-gray-500 font-light text-sm leading-relaxed">A celebration of teamwork, discipline, and physical excellence featuring multi-discipline competitions.</p>
                        </div>
                    </div>

                    <div class="flex gap-8 group">
                        <div class="shrink-0 w-[4px] bg-gray-200 group-hover:w-2 transition-all duration-300"></div>
                        <div>
                            <span class="text-[10px] font-black text-gray-300 uppercase tracking-[0.2em] mb-2 block">May 12, 2024</span>
                            <h4 class="text-xl font-black text-gray-900 group-hover:text-primary transition uppercase tracking-tight mb-3">Biological Tour 2081</h4>
                            <p class="text-gray-500 font-light text-sm leading-relaxed">Science faculty explore the rich biodiversity of Chitwan's protected regions.</p>
                        </div>
                    </div>
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
                <div class="text-5xl lg:text-7xl font-black text-secondary mb-2 tracking-tighter">35+</div>
                <div class="text-[10px] font-black opacity-40 uppercase tracking-[0.4em]">Programs</div>
            </div>
            <div>
                <div class="text-5xl lg:text-7xl font-black text-white mb-2 tracking-tighter">120+</div>
                <div class="text-[10px] font-black opacity-40 uppercase tracking-[0.4em]">Expert Faculty</div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
