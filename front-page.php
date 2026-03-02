<?php
/**
 * The template for the front page (homepage)
 *
 * @package ssmc-custom
 */

get_header(); ?>

<!-- Hero Section -->
<section class="relative bg-gray-900 text-white">
    <!-- Background Image placeholder (could be dynamic via ACF or custom field later) -->
    <div class="absolute inset-0 z-0 opacity-50 bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1541829070764-84a5d30cb273?q=80&w=2938&auto=format&fit=crop');"></div>
    
    <div class="container mx-auto px-4 py-24 md:py-32 relative z-10 flex flex-col items-start justify-center min-h-[60vh]">
        <span class="bg-secondary text-primary font-bold px-3 py-1 rounded-full text-sm mb-6 uppercase tracking-wider shadow-sm">Welcome to</span>
        <h1 class="text-4xl md:text-6xl font-extrabold mb-6 leading-tight max-w-3xl drop-shadow-md">
            Shaheed Smriti Multiple Campus
        </h1>
        <p class="text-lg md:text-xl mb-8 max-w-2xl text-gray-100 drop-shadow-sm">
            Empowering students with quality education, fostering innovation, and building the leaders of tomorrow in the heart of Chitwan.
        </p>
        <div class="flex flex-wrap gap-4">
            <a href="#programs" class="bg-primary hover:bg-blue-800 text-white font-semibold py-3 px-8 rounded-lg transition shadow-lg hover:shadow-xl hover:-translate-y-1">Explore Programs</a>
            <a href="#contact" class="bg-white hover:bg-gray-100 text-primary font-semibold py-3 px-8 rounded-lg transition shadow-lg hover:shadow-xl hover:-translate-y-1">Contact Us</a>
        </div>
    </div>
</section>

<!-- Notice Board & Quick Links Section -->
<section class="py-16 bg-white relative -mt-10 z-20">
    <div class="container mx-auto px-4">
        <div class="bg-white rounded-xl shadow-xl p-8 grid grid-cols-1 lg:grid-cols-3 gap-8 border border-gray-100">
            <!-- Notices -->
            <div class="lg:col-span-2">
                <div class="flex justify-between items-end mb-6 border-b border-gray-200 pb-4">
                    <h2 class="text-2xl font-bold text-gray-800 flex items-center gap-2">
                        <span class="w-8 h-8 rounded-full bg-red-100 text-red-600 flex items-center justify-center text-sm">🔔</span>
                        Recent Notices
                    </h2>
                    <a href="#" class="text-primary hover:text-secondary font-medium text-sm transition">View All &rarr;</a>
                </div>
                
                <div class="space-y-4">
                    <!-- Placeholder Notice 1 -->
                    <a href="#" class="group block bg-gray-50 hover:bg-blue-50 p-4 rounded-lg transition border border-gray-100 hover:border-blue-200">
                        <div class="flex gap-4 items-start">
                            <div class="bg-white border shadow-sm rounded-md p-2 text-center min-w-[60px]">
                                <span class="block text-primary font-bold text-lg">15</span>
                                <span class="block text-gray-500 text-xs uppercase cursor-pointer">Oct</span>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-800 group-hover:text-primary transition">BBS First Year Routine Published</h3>
                                <p class="text-sm text-gray-500 mt-1 line-clamp-2">The examination routine for BBS first year has been published by Tribhuvan University...</p>
                            </div>
                        </div>
                    </a>
                    <!-- Placeholder Notice 2 -->
                    <a href="#" class="group block bg-gray-50 hover:bg-blue-50 p-4 rounded-lg transition border border-gray-100 hover:border-blue-200">
                        <div class="flex gap-4 items-start">
                            <div class="bg-white border shadow-sm rounded-md p-2 text-center min-w-[60px]">
                                <span class="block text-primary font-bold text-lg">10</span>
                                <span class="block text-gray-500 text-xs uppercase">Oct</span>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-800 group-hover:text-primary transition">Dashain Vacation Notice</h3>
                                <p class="text-sm text-gray-500 mt-1 line-clamp-2">Campus will remain closed for Dashain vacation starting from 12th October to 20th October.</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Quick Links / Director Message -->
            <div class="bg-gradient-to-br from-primary to-blue-900 rounded-xl p-6 text-white text-center flex flex-col justify-center items-center shadow-inner relative overflow-hidden">
                <div class="absolute top-0 right-0 w-32 h-32 bg-white opacity-5 rounded-bl-full"></div>
                <!-- Optional Image -->
                <div class="w-20 h-20 bg-gray-300 rounded-full mb-4 border-4 border-white/20 overflow-hidden shadow-lg">
                    <img src="https://ui-avatars.com/api/?name=Campus+Chief&background=e0e7ff&color=1e3a8a" alt="Campus Chief" class="w-full h-full object-cover">
                </div>
                <h3 class="text-xl font-bold mb-2 relative z-10">Message from Chief</h3>
                <p class="text-sm text-blue-100 mb-6 italic relative z-10">"We strive to provide an environment that fosters critical thinking and professional development."</p>
                <a href="#" class="inline-block bg-secondary text-primary font-semibold px-6 py-2 rounded-full text-sm hover:bg-yellow-400 transition hover:-translate-y-0.5 relative z-10 shadow-md">Read Message</a>
            </div>
        </div>
    </div>
</section>

<!-- Academic Programs -->
<section id="programs" class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="text-center max-w-2xl mx-auto mb-12">
            <span class="text-secondary font-bold uppercase tracking-wider text-sm">Academics</span>
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mt-2 mb-4">Our Programs</h2>
            <p class="text-gray-600">Explore our diverse range of undergraduate and graduate programs designed for your success.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Card 1 -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition group flex flex-col h-full border border-gray-100">
                <div class="h-48 bg-gray-200 overflow-hidden relative">
                    <img src="https://images.unsplash.com/photo-1554415707-6e8cfc93fe23?q=80&w=2940&auto=format&fit=crop" class="w-full h-full object-cover group-hover:scale-105 transition duration-500" alt="BBS">
                    <div class="absolute top-4 left-4 bg-primary text-white text-xs font-bold px-3 py-1 rounded-full shadow">Management</div>
                </div>
                <div class="p-6 flex-grow flex flex-col">
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Bachelors in Business Studies (BBS)</h3>
                    <p class="text-gray-600 text-sm mb-6 flex-grow">A four-year program designed to provide students with a broad knowledge of business and corporate world.</p>
                    <a href="#" class="text-primary font-semibold flex items-center gap-2 group-hover:text-secondary transition w-fit">
                        Learn More <span class="group-hover:translate-x-1 transition">&rarr;</span>
                    </a>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition group flex flex-col h-full border border-gray-100">
                <div class="h-48 bg-gray-200 overflow-hidden relative">
                    <img src="https://images.unsplash.com/photo-1524178232363-1fb2b075b655?q=80&w=2940&auto=format&fit=crop" class="w-full h-full object-cover group-hover:scale-105 transition duration-500" alt="BA">
                    <div class="absolute top-4 left-4 bg-primary text-white text-xs font-bold px-3 py-1 rounded-full shadow">Humanities</div>
                </div>
                <div class="p-6 flex-grow flex flex-col">
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Bachelor of Arts (BA)</h3>
                    <p class="text-gray-600 text-sm mb-6 flex-grow">Comprehensive study of human culture, society, and critical thinking skills for a versaitle career.</p>
                    <a href="#" class="text-primary font-semibold flex items-center gap-2 group-hover:text-secondary transition w-fit">
                        Learn More <span class="group-hover:translate-x-1 transition">&rarr;</span>
                    </a>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition group flex flex-col h-full border border-gray-100">
                <div class="h-48 bg-gray-200 overflow-hidden relative">
                    <img src="https://images.unsplash.com/photo-1434030216411-0b793f4b4173?q=80&w=2940&auto=format&fit=crop" class="w-full h-full object-cover group-hover:scale-105 transition duration-500" alt="B.Ed">
                    <div class="absolute top-4 left-4 bg-primary text-white text-xs font-bold px-3 py-1 rounded-full shadow">Education</div>
                </div>
                <div class="p-6 flex-grow flex flex-col">
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Bachelor of Education (B.Ed)</h3>
                    <p class="text-gray-600 text-sm mb-6 flex-grow">Preparing the next generation of passionate educators and academic leaders.</p>
                    <a href="#" class="text-primary font-semibold flex items-center gap-2 group-hover:text-secondary transition w-fit">
                        Learn More <span class="group-hover:translate-x-1 transition">&rarr;</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
