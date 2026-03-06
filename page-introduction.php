<?php
/**
 * Template Name: Introduction Page
 *
 * @package ssmccustom
 */

get_header(); ?>

<!-- 1. Premium Hero Section -->
<div class="bg-gradient-to-br from-primary via-primary to-blue-900 py-24 relative overflow-hidden">
    <div class="absolute top-0 right-0 w-96 h-96 bg-white/5 rounded-full -translate-y-1/2 translate-x-1/3 blur-3xl pointer-events-none"></div>
    <div class="absolute bottom-0 left-0 w-64 h-64 bg-secondary/10 rounded-full translate-y-1/2 -translate-x-1/3 blur-3xl pointer-events-none"></div>

    <div class="container mx-auto px-4 relative z-10 text-center">
        <h1 class="text-xs font-black text-secondary uppercase tracking-[0.4em] mb-6">About Our Institution</h1>
        <h2 class="text-4xl md:text-6xl lg:text-7xl font-black text-white tracking-tighter leading-tight max-w-4xl mx-auto uppercase">
            A Legacy of Excellence in Ratnanagar
        </h2>
        <p class="text-blue-100/80 mt-8 max-w-2xl mx-auto font-light text-xl leading-relaxed">
            Discover the history, mission, and the people behind Shaheed Smriti Multiple Campus, Chitwan's premier community educational institution.
        </p>
    </div>
</div>

<!-- 2. Our Story / Origins -->
<section class="py-24 bg-white relative">
    <div class="container mx-auto px-4">
        <div class="flex flex-col lg:flex-row gap-20 lg:items-center max-w-6xl mx-auto">
            <div class="lg:w-1/2 flex relative">
                <div class="absolute top-0 left-0 w-32 h-32 bg-primary/5 rounded-full -translate-x-10 -translate-y-10"></div>
                <div class="absolute bottom-0 right-0 w-40 h-40 bg-secondary/10 rounded-full translate-x-12 translate-y-12"></div>
                
                <div class="relative w-full rounded-[3rem] overflow-hidden shadow-2xl border-8 border-white z-10">
                    <?php $intro_img = get_theme_mod('ssmc_intro_img', get_template_directory_uri() . '/assets/images/ssmc_clean_plain_nepali_campus.png'); ?>
                    <img src="<?php echo esc_url($intro_img); ?>" alt="SSMC Campus History" class="w-full h-[500px] object-cover hover:scale-105 transition-transform duration-700">
                </div>
            </div>
            
            <div class="lg:w-1/2">
                <h3 class="text-xs font-black text-primary uppercase tracking-[0.3em] mb-4">Our Heritage</h3>
                <h4 class="text-4xl lg:text-5xl font-black text-gray-900 mb-8 leading-tight tracking-tighter">Established by the Community, For the Community</h4>
                
                <div class="prose prose-lg text-gray-600 font-light leading-relaxed mb-10">
                    <p>
                        <strong>Shaheed Smriti Multiple Campus (SSMC)</strong> was established to fulfill the growing need for accessible, high-quality higher education in East Chitwan. Born from the collective vision of local academics, social workers, and community leaders, we have grown into a central hub of learning and intellectual development.
                    </p>
                    <p>
                        Affiliated with Tribhuvan University, Nepal's oldest and most prestigious university, SSMC is committed to academic rigor, ethical growth, and the professional success of our students. We offer a wide array of programs designed to equip graduates with the skills necessary to thrive in an ever-evolving global landscape.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 3. Core Values & Mission Grid -->
<section class="py-24 bg-gray-50 border-t border-gray-100">
    <div class="container mx-auto px-4">
        <div class="text-center max-w-3xl mx-auto mb-20">
            <h3 class="text-xs font-black text-primary uppercase tracking-[0.4em] mb-4">Core Principles</h3>
            <h4 class="text-4xl md:text-5xl font-black text-gray-900 tracking-tighter">Our Vision & Mission</h4>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-10 max-w-6xl mx-auto">
            <!-- Academic Excellence -->
            <div class="bg-white rounded-[2.5rem] p-10 border border-gray-100 shadow-xl shadow-gray-200/50 hover:-translate-y-2 transition-transform duration-500">
                <div class="w-16 h-16 rounded-2xl bg-blue-50 text-primary flex items-center justify-center mb-8">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                </div>
                <h5 class="text-2xl font-black text-gray-900 mb-4 tracking-tight">Academic Rigor</h5>
                <p class="text-gray-500 font-light leading-relaxed">Delivering UGC-accredited, high-standard education that challenges students to reach their full intellectual potential.</p>
            </div>

            <!-- Community Focus -->
            <div class="bg-white rounded-[2.5rem] p-10 border border-gray-100 shadow-xl shadow-gray-200/50 hover:-translate-y-2 transition-transform duration-500">
                <div class="w-16 h-16 rounded-2xl bg-yellow-50 text-secondary flex items-center justify-center mb-8">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                </div>
                <h5 class="text-2xl font-black text-gray-900 mb-4 tracking-tight">Community First</h5>
                <p class="text-gray-500 font-light leading-relaxed">Deeply rooted in the community, our primary directive is to serve, uplift, and empower the local society through education.</p>
            </div>

            <!-- Ethical Growth -->
            <div class="bg-white rounded-[2.5rem] p-10 border border-gray-100 shadow-xl shadow-gray-200/50 hover:-translate-y-2 transition-transform duration-500">
                <div class="w-16 h-16 rounded-2xl bg-green-50 text-green-600 flex items-center justify-center mb-8">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                </div>
                <h5 class="text-2xl font-black text-gray-900 mb-4 tracking-tight">Ethical Leadership</h5>
                <p class="text-gray-500 font-light leading-relaxed">Fostering an environment that promotes integrity, social responsibility, and the development of conscientious leaders.</p>
            </div>
        </div>
    </div>
</section>

<!-- 4. Dynamic Leadership Integration -->
<section class="py-24 bg-white border-t border-gray-100">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mb-20 text-center mx-auto">
            <h3 class="text-xs font-black text-primary uppercase tracking-[0.4em] mb-4">Our Leadership</h3>
            <h4 class="text-4xl md:text-5xl font-black text-gray-900 tracking-tighter">Guiding Excellence with Vision</h4>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 max-w-6xl mx-auto">
            <!-- Left Half: Chairman -->
            <div class="group relative bg-white rounded-[2.5rem] p-10 md:p-14 overflow-hidden border border-gray-100 flex flex-col md:flex-row gap-10 items-center md:items-start text-center md:text-left hover:shadow-[0_40px_80px_-15px_rgba(30,58,138,0.1)] transition-all duration-700">
                <div class="w-40 h-40 shrink-0 rounded-[1.5rem] overflow-hidden shadow-xl border-4 border-white group-hover:border-secondary/50 transition-all duration-700 transform group-hover:scale-105">
                    <?php $chairman_img = get_theme_mod('ssmc_chairman_img', 'https://ui-avatars.com/api/?name=Uttam+Acharya&size=400&background=1e3a8a&color=fff'); ?>
                    <img src="<?php echo esc_url($chairman_img); ?>" class="w-full h-full object-cover" alt="Chairman Photo">
                </div>
                <div class="relative z-10">
                    <div class="text-primary text-[10px] font-black uppercase tracking-[0.3em] mb-2">Campus Chairman</div>
                    <h5 class="text-2xl font-black text-gray-900 mb-4 uppercase tracking-tighter leading-none"><?php echo esc_html(get_theme_mod('ssmc_chairman_name', 'Uttam Acharya')); ?></h5>
                    <p class="text-gray-600 font-light italic leading-relaxed text-sm relative">
                        <span class="text-3xl text-primary/10 absolute -top-3 -left-5 font-serif leading-none italic">“</span>
                        <?php echo esc_html(get_theme_mod('ssmc_chairman_quote', '"As Chairman, my commitment is to ensure SSMC remains a top-tier institution that serves the community and empowers every student to reach their peak potential."')); ?>
                    </p>
                </div>
                <div class="absolute top-0 right-0 w-32 h-32 bg-primary/5 rounded-full -mr-16 -mt-16 group-hover:scale-150 transition-transform duration-1000"></div>
            </div>

            <!-- Right Half: Campus Chief -->
            <div class="group relative bg-white rounded-[2.5rem] p-10 md:p-14 overflow-hidden border border-gray-100 flex flex-col md:flex-row gap-10 items-center md:items-start text-center md:text-left hover:shadow-[0_40px_80px_-15px_rgba(30,58,138,0.1)] transition-all duration-700">
                <div class="w-40 h-40 shrink-0 rounded-[1.5rem] overflow-hidden shadow-xl border-4 border-white group-hover:border-secondary/50 transition-all duration-700 transform group-hover:scale-105">
                    <?php $chief_img = get_theme_mod('ssmc_chief_img', 'https://ui-avatars.com/api/?name=Dharma+Datta+Tiwari&size=400&background=fa-cc-15&color=1e3a8a'); ?>
                    <img src="<?php echo esc_url($chief_img); ?>" class="w-full h-full object-cover" alt="Campus Chief Photo">
                </div>
                <div class="relative z-10">
                    <div class="text-primary text-[10px] font-black uppercase tracking-[0.3em] mb-2">Campus Chief</div>
                    <h5 class="text-2xl font-black text-gray-900 mb-4 uppercase tracking-tighter leading-none"><?php echo esc_html(get_theme_mod('ssmc_chief_name', 'Dr. Dharma Datta Tiwari')); ?></h5>
                    <p class="text-gray-600 font-light italic leading-relaxed text-sm relative">
                        <span class="text-3xl text-primary/10 absolute -top-3 -left-5 font-serif leading-none italic">“</span>
                        <?php echo esc_html(get_theme_mod('ssmc_chief_quote', '"Fostering an intellectually stimulating environment where local community support meets global academic standards is our core mission."')); ?>
                    </p>
                </div>
                <div class="absolute top-0 right-0 w-32 h-32 bg-primary/5 rounded-full -mr-16 -mt-16 group-hover:scale-150 transition-transform duration-1000"></div>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="py-20 bg-primary w-full overflow-hidden relative">
    <div class="absolute inset-0 bg-secondary/10 opacity-50"></div>
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-full h-[300px] bg-secondary/20 rounded-full blur-[100px] pointer-events-none"></div>

    <div class="container mx-auto px-4 relative z-10 text-center">
        <h3 class="text-3xl md:text-5xl font-black text-white mb-8 tracking-tighter">Ready to join our community?</h3>
        <a href="<?php echo esc_url( get_post_type_archive_link('program') ); ?>" class="inline-flex items-center justify-center bg-secondary text-primary font-black px-10 py-5 rounded-xl hover:bg-white hover:shadow-2xl hover:shadow-secondary/50 transition-all duration-300 transform hover:-translate-y-1 text-sm uppercase tracking-widest">
            Explore Programs
        </a>
    </div>
</section>

<?php get_footer(); ?>
