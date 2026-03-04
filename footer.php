<?php
/**
 * The template for displaying the footer
 *
 * @package ssmc-custom
 */
?>
	</main><!-- #primary -->

	<footer id="colophon" class="bg-gray-900 text-white mt-auto pt-12 pb-6">
		<div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-8">
                <div>
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.svg" alt="<?php bloginfo( 'name' ); ?> Logo" class="h-14 w-auto mb-4 bg-white p-2 rounded-lg" />
                    <p class="text-gray-400 text-sm leading-relaxed">
                        Shaheed Smriti Multiple Campus is a premier academic institution committed to academic excellence and nurturing future leaders.
                    </p>
                </div>
                <div>
                    <h3 class="text-xl font-bold mb-4 text-secondary">Quick Links</h3>
                    <ul class="text-sm text-gray-400 space-y-2">
                        <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="hover:text-white transition">Home</a></li>
                        <li><a href="#" class="hover:text-white transition">About Us</a></li>
                        <li><a href="#" class="hover:text-white transition">Academic Programs</a></li>
                        <li><a href="#" class="hover:text-white transition">Notices</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-xl font-bold mb-4 text-secondary">Contact Us</h3>
                    <ul class="text-sm text-gray-400 space-y-2">
                        <li>📍 Chitwan, Nepal</li>
                        <li>📞 +977-56-000000</li>
                        <li>✉️ info@ssmcchitwan.edu.np</li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-xl font-bold mb-4 text-secondary">Follow Us</h3>
                    <div class="flex gap-4">
                        <a href="#" class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center hover:bg-primary transition text-white">FB</a>
                        <a href="#" class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center hover:bg-primary transition text-white">TW</a>
                    </div>
                </div>
            </div>

			<div class="border-t border-gray-800 mt-8 pt-6 text-center text-sm text-gray-500">
				&copy; <?php echo date('Y'); ?> <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="hover:text-white transition"><?php bloginfo( 'name' ); ?></a>. All rights reserved.
			</div>
		</div>
	</footer>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
