<?php
/**
 * The template for displaying search forms
 *
 * @package ssmc-custom
 */
?>

<form role="search" method="get" class="search-form relative group" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label class="block">
		<span class="sr-only"><?php echo _x( 'Search for:', 'label', 'ssmc-custom' ); ?></span>
		<input type="search" class="search-field w-full bg-white border border-gray-200 rounded-2xl px-6 py-4 pr-16 text-gray-700 font-light focus:outline-none focus:ring-4 focus:ring-primary/10 focus:border-primary transition-all shadow-sm group-hover:shadow-md" 
            placeholder="<?php echo esc_attr_x( 'Search programs, notices...', 'placeholder', 'ssmc-custom' ); ?>" 
            value="<?php echo get_search_query(); ?>" name="s" />
	</label>
	<button type="submit" class="search-submit absolute right-2 top-2 bottom-2 bg-primary text-white w-12 h-12 rounded-xl flex items-center justify-center hover:bg-blue-800 transition-colors shadow-lg shadow-primary/20">
		<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
        <span class="sr-only"><?php echo _x( 'Search', 'submit button', 'ssmc-custom' ); ?></span>
	</button>
</form>
