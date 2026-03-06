<?php
/**
 * Template Name: About Us Page
 *
 * @package ssmc-custom
 */

get_header();
?>

<!-- About Us Header -->
<div class="bg-gradient-to-br from-primary via-primary to-blue-900 py-20 relative overflow-hidden">
    <!-- Decorative background elements -->
    <div class="absolute top-0 right-0 w-96 h-96 bg-white/5 rounded-full -translate-y-1/2 translate-x-1/3 blur-3xl pointer-events-none"></div>
    <div class="absolute bottom-0 left-0 w-64 h-64 bg-secondary/10 rounded-full translate-y-1/2 -translate-x-1/3 blur-2xl pointer-events-none"></div>

    <div class="container mx-auto px-4 relative z-10">
        <nav class="flex items-center gap-2 text-blue-200/80 text-xs mb-6 font-medium uppercase tracking-widest">
            <a href="<?php echo esc_url( home_url('/') ); ?>" class="hover:text-white transition-colors duration-200">Home</a>
            <span class="opacity-40">/</span>
            <span class="text-white">About Us</span>
        </nav>
        
        <div class="max-w-4xl">
            <h1 class="text-4xl md:text-6xl font-extrabold text-white tracking-tight leading-tight mb-6">Shaping Excellence Since 1980</h1>
            <p class="text-blue-100/70 max-w-2xl font-light text-xl md:text-2xl leading-relaxed">
                Empowering the youth of Chitwan through accessible, high-quality education and a legacy of academic distinction.
            </p>
        </div>
    </div>
</div>

<!-- History Section -->
<section class="py-20 md:py-32 bg-white overflow-hidden">
    <div class="container mx-auto px-4">
        <div class="flex flex-col lg:flex-row items-center gap-16">
            <div class="lg:w-1/2 relative">
                <div class="relative z-10 rounded-3xl overflow-hidden shadow-2xl border-8 border-gray-50">
                    <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/nepali_campus.png' ); ?>" alt="SSMC History" class="w-full h-auto">
                </div>
                <!-- Decorative element -->
                <div class="absolute -top-10 -left-10 w-40 h-40 bg-secondary/20 rounded-full blur-3xl -z-10 animate-pulse"></div>
                <div class="absolute -bottom-10 -right-10 w-60 h-60 bg-primary/10 rounded-full blur-3xl -z-10 animate-pulse" style="animation-delay: 1.5s"></div>
            </div>
            
            <div class="lg:w-1/2">
                <h2 class="text-xs font-extrabold text-primary uppercase tracking-[0.3em] mb-4">Our Legacy</h2>
                <h3 class="text-4xl md:text-5xl font-extrabold text-gray-900 mb-8 leading-tight">A Journey of <span class="text-primary italic">Four Decades</span></h3>
                <div class="prose prose-blue prose-lg text-gray-600 font-light leading-relaxed">
                    <p>Established in 2037 BS (1980 AD) as a community-based campus, Shaheed Smriti Multiple Campus (SSMC) was founded in memory of the martyrs who sacrificed their lives for the cause of democracy in Nepal.</p>
                    <p>What started as a modest academic institution in Ratnanagar, Chitwan, has today evolved into one of the most prominent educational hubs in the region, affiliated with Tribhuvan University.</p>
                    <p>Our history is a testament to the collective efforts of the local community, dedicated educators, and visionary leaders who believed in the power of education to transform society.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Vision & Mission Section -->
<section class="py-20 md:py-32 bg-gray-50 relative">
    <div class="container mx-auto px-4 relative z-10">
        <div class="text-center max-w-3xl mx-auto mb-20">
            <h2 class="text-xs font-extrabold text-primary uppercase tracking-[0.3em] mb-4">Our Purpose</h2>
            <h3 class="text-4xl md:text-5xl font-extrabold text-gray-900 leading-tight">Guided by a Shared <span class="bg-gradient-to-r from-primary to-blue-600 bg-clip-text text-transparent">Vision for the Future</span></h3>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Vision -->
            <div class="bg-white p-10 md:p-16 rounded-[3rem] shadow-xl shadow-gray-200/50 border border-gray-100 group hover:-translate-y-2 transition-all duration-500">
                <div class="w-20 h-20 bg-primary/5 rounded-2xl flex items-center justify-center text-4xl mb-8 group-hover:bg-primary group-hover:text-white transition-colors duration-500">
                    🔭
                </div>
                <h4 class="text-3xl font-extrabold text-gray-900 mb-6">Our Vision</h4>
                <p class="text-gray-500 text-lg font-light leading-relaxed">
                    To be a leading educational center of excellence that produces globally competitive, socially responsible, and ethically sound citizens capable of leading sustainable development.
                </p>
            </div>

            <!-- Mission -->
            <div class="bg-white p-10 md:p-16 rounded-[3rem] shadow-xl shadow-gray-200/50 border border-gray-100 group hover:-translate-y-2 transition-all duration-500">
                <div class="w-20 h-20 bg-secondary/10 rounded-2xl flex items-center justify-center text-4xl mb-8 group-hover:bg-secondary group-hover:text-primary transition-colors duration-500">
                    🚀
                </div>
                <h4 class="text-3xl font-extrabold text-gray-900 mb-6">Our Mission</h4>
                <p class="text-gray-500 text-lg font-light leading-relaxed">
                    To provide qualitative higher education in various disciplines, fostering a culture of research, innovation, and practical learning that empowers students to meet modern challenges.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Core Values (Optional but adds premium feel) -->
<section class="py-20 md:py-32 bg-primary text-white overflow-hidden relative">
    <!-- Abstract SVG Background -->
    <svg class="absolute top-0 right-0 w-1/2 h-full opacity-10 pointer-events-none" viewBox="0 0 100 100" preserveAspectRatio="none">
        <path d="M0 100 C 20 0 50 0 100 100" fill="white" />
    </svg>

    <div class="container mx-auto px-4 relative z-10">
        <div class="flex flex-col lg:flex-row justify-between items-end gap-10 mb-20">
            <div class="max-w-2xl">
                <h2 class="text-xs font-extrabold text-secondary uppercase tracking-[0.3em] mb-4">Values</h2>
                <h3 class="text-4xl md:text-5xl font-extrabold leading-tight">The Principles That <br>Define Us</h3>
            </div>
            <p class="text-blue-100 font-light text-xl max-w-sm lg:text-right">
                Integrity, Excellence, and Community are at the heart of everything we do.
            </p>
        </div>

        <div class="grid grid-cols-2 lg:grid-cols-4 gap-6 md:gap-10">
            <div class="space-y-4">
                <div class="text-4xl font-extrabold text-secondary opacity-40">01</div>
                <h5 class="text-xl font-bold">Academic Quality</h5>
                <p class="text-blue-100/60 text-sm font-light leading-relaxed">Striving for the highest standards in teaching and learning.</p>
            </div>
            <div class="space-y-4">
                <div class="text-4xl font-extrabold text-secondary opacity-40">02</div>
                <h5 class="text-xl font-bold">Innovation</h5>
                <p class="text-blue-100/60 text-sm font-light leading-relaxed">Embracing new ideas and technologies in education.</p>
            </div>
            <div class="space-y-4">
                <div class="text-4xl font-extrabold text-secondary opacity-40">03</div>
                <h5 class="text-xl font-bold">Integrity</h5>
                <p class="text-blue-100/60 text-sm font-light leading-relaxed">Acting ethically and transparently in all endeavors.</p>
            </div>
            <div class="space-y-4">
                <div class="text-4xl font-extrabold text-secondary opacity-40">04</div>
                <h5 class="text-xl font-bold">Community Service</h5>
                <p class="text-blue-100/60 text-sm font-light leading-relaxed">Dedication to the social and cultural progress of our region.</p>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();
