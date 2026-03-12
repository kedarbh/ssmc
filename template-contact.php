<?php

/**
 * Template Name: Contact Page
 *
 * @package ssmc-custom
 */

get_header();
?>

<!-- Contact Page Header -->
<div class="bg-gradient-to-br from-primary via-primary to-blue-900 py-16 relative overflow-hidden">
    <!-- Decorative background elements -->
    <div class="absolute top-0 right-0 w-64 h-64 bg-white/5 rounded-full -translate-y-1/2 translate-x-1/3 blur-3xl pointer-events-none"></div>
    <div class="absolute bottom-0 left-0 w-48 h-48 bg-secondary/10 rounded-full translate-y-1/2 -translate-x-1/3 blur-2xl pointer-events-none"></div>

    <div class="container mx-auto px-4 relative z-10 text-center">
        <nav class="flex items-center justify-center gap-2 text-blue-200/80 text-xs mb-4 font-medium uppercase tracking-widest">
            <a href="<?php echo esc_url(home_url('/')); ?>" class="hover:text-white transition-colors duration-200">Home</a>
            <span class="opacity-40">/</span>
            <span class="text-white">Contact Us</span>
        </nav>

        <h1 class="text-3xl md:text-5xl lg:text-6xl font-extrabold text-white tracking-tight leading-tight mb-4">Get In Touch</h1>
        <p class="text-blue-100/70 max-w-2xl mx-auto font-light text-xl leading-relaxed">
            Have questions? We're here to help. Reach out to us via the form below or through our contact details.
        </p>
    </div>
</div>

<section class="py-16 md:py-24 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">

            <!-- Contact Info Cards -->
            <div class="lg:col-span-1 space-y-6">
                <!-- Location -->
                <div class="bg-white rounded-3xl p-8 shadow-sm border border-gray-100 flex items-start gap-6 group hover:shadow-md transition-shadow">
                    <div class="w-14 h-14 shrink-0 rounded-2xl bg-primary/5 text-primary flex items-center justify-center text-2xl group-hover:bg-primary group-hover:text-white transition-colors">
                        📍
                    </div>
                    <div>
                        <h3 class="font-bold text-gray-900 text-lg mb-1">Our Location</h3>
                        <p class="text-gray-500 font-light leading-relaxed">
                            Shaheed Smriti Multiple Campus<br>
                            Ratnanagar-1, Chitwan, Nepal
                        </p>
                    </div>
                </div>

                <!-- Phone -->
                <div class="bg-white rounded-3xl p-8 shadow-sm border border-gray-100 flex items-start gap-6 group hover:shadow-md transition-shadow">
                    <div class="w-14 h-14 shrink-0 rounded-2xl bg-secondary/10 text-primary flex items-center justify-center text-2xl group-hover:bg-secondary group-hover:text-primary transition-colors">
                        📞
                    </div>
                    <div>
                        <h3 class="font-bold text-gray-900 text-lg mb-1">Phone Number</h3>
                        <p class="text-gray-500 font-light leading-relaxed">
                            +977-56-000000<br>
                            +977-56-111111
                        </p>
                    </div>
                </div>

                <!-- Email -->
                <div class="bg-white rounded-3xl p-8 shadow-sm border border-gray-100 flex items-start gap-6 group hover:shadow-md transition-shadow">
                    <div class="w-14 h-14 shrink-0 rounded-2xl bg-blue-50 text-blue-600 flex items-center justify-center text-2xl group-hover:bg-blue-600 group-hover:text-white transition-colors">
                        ✉️
                    </div>
                    <div>
                        <h3 class="font-bold text-gray-900 text-lg mb-1">Email Address</h3>
                        <p class="text-gray-500 font-light leading-relaxed">
                            info@ssmcchitwan.edu.np<br>
                            admin@ssmcchitwan.edu.np
                        </p>
                    </div>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="lg:col-span-2">
                <div class="bg-white rounded-3xl shadow-xl shadow-gray-200/50 border border-gray-100 p-8 md:p-12">
                    <h2 class="text-2xl font-extrabold text-gray-900 mb-8 flex items-center gap-3">
                        <span class="w-10 h-10 rounded-xl bg-primary/10 text-primary flex items-center justify-center text-sm">✍️</span>
                        Send us a Message
                    </h2>

                    <form action="#" method="POST" class="space-y-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="full_name" class="block text-xs font-bold uppercase tracking-widest text-gray-400 mb-2 ml-1">Full Name</label>
                                <input type="text" id="full_name" name="full_name" placeholder="John Doe"
                                    class="w-full bg-gray-50 border border-gray-100 rounded-xl px-4 py-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all">
                            </div>
                            <div>
                                <label for="email" class="block text-xs font-bold uppercase tracking-widest text-gray-400 mb-2 ml-1">Email Address</label>
                                <input type="email" id="email" name="email" placeholder="john@example.com"
                                    class="w-full bg-gray-50 border border-gray-100 rounded-xl px-4 py-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all">
                            </div>
                        </div>

                        <div>
                            <label for="subject" class="block text-xs font-bold uppercase tracking-widest text-gray-400 mb-2 ml-1">Subject</label>
                            <input type="text" id="subject" name="subject" placeholder="Admission Inquiry"
                                class="w-full bg-gray-50 border border-gray-100 rounded-xl px-4 py-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all">
                        </div>

                        <div>
                            <label for="message" class="block text-xs font-bold uppercase tracking-widest text-gray-400 mb-2 ml-1">Your Message</label>
                            <textarea id="message" name="message" rows="5" placeholder="Tell us how we can help..."
                                class="w-full bg-gray-50 border border-gray-100 rounded-xl px-4 py-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all resize-none"></textarea>
                        </div>

                        <button type="submit" class="inline-flex items-center justify-center gap-3 bg-primary text-white font-extrabold py-4 px-10 rounded-xl hover:bg-blue-800 transition-all duration-300 shadow-lg shadow-primary/20 hover:-translate-y-1 text-xs uppercase tracking-widest">
                            Send Message
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Google Map Integration -->
<section class="py-0 relative h-[500px] w-full bg-gray-200">
    <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d27938.898354861132!2d84.53742323594929!3d27.6251984574786!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3994e8ada853ffff%3A0xd62b071aebf74ac8!2sShaheed%20Smriti%20Multiple%20Campus!5e1!3m2!1sen!2snp!4v1773299568867!5m2!1sen!2snp"
        width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"
        class="grayscale hover:grayscale-0 transition-all duration-700">
    </iframe>
</section>

<?php
get_footer();
