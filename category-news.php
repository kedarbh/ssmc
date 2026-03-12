<?php

/**
 * Category template for News
 *
 * @package ssmc-custom
 */

get_header();
$category = get_queried_object();
?>

<div class="bg-slate-50 min-h-screen">
	<header class="relative overflow-hidden bg-gradient-to-br from-primary via-blue-900 to-blue-950 text-white">
		<div class="absolute inset-0 opacity-20" style="background-image: radial-gradient(circle at 1px 1px, rgba(255,255,255,0.35) 1px, transparent 0); background-size: 48px 48px;"></div>
		<div class="absolute -top-24 right-0 h-64 w-64 rounded-full bg-white/10 blur-3xl"></div>
		<div class="container mx-auto px-4 py-16 lg:py-24 relative z-10">
			<nav class="flex items-center gap-2 text-blue-100/70 text-xs font-semibold uppercase tracking-widest">
				<a href="<?php echo esc_url(home_url('/')); ?>" class="hover:text-white transition-colors duration-200">Home</a>
				<span class="opacity-40">/</span>
				<span class="text-white"><?php echo esc_html($category->name); ?></span>
			</nav>

			<div class="mt-10 grid grid-cols-1 gap-10 lg:grid-cols-12 items-end">
				<div class="lg:col-span-8">

					<h1 class="mt-6 text-4xl md:text-6xl font-black tracking-tight leading-tight">
						<?php echo esc_html($category->name); ?>
					</h1>
					<?php if (!empty($category->description)) : ?>
						<p class="mt-5 text-blue-100/80 max-w-2xl text-lg font-light leading-relaxed">
							<?php echo esc_html($category->description); ?>
						</p>
					<?php else : ?>
						<p class="mt-5 text-blue-100/80 max-w-2xl text-lg font-light leading-relaxed">
							Stay up to date with the latest official news, campus pulse, and major announcements from Shaheed Smriti Multiple Campus.
						</p>
					<?php endif; ?>


				</div>


			</div>
		</div>
	</header>

	<section class="container mx-auto px-4 py-12 lg:py-16">
		<?php if (have_posts()) : ?>
			<div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
				<?php
				$index = 0;
				while (have_posts()) : the_post();
					$index++;
					$is_featured = ($index === 1);
				?>
					<article class="<?php echo $is_featured ? 'lg:col-span-2' : ''; ?> group overflow-hidden rounded-3xl border border-gray-100 bg-white shadow-sm transition hover:-translate-y-1 hover:shadow-2xl">
						<a href="<?php the_permalink(); ?>" class="block h-full">
							<div class="<?php echo $is_featured ? 'aspect-[16/9]' : 'aspect-[4/3]'; ?> w-full overflow-hidden bg-gray-100">
								<?php if (has_post_thumbnail()) : ?>
									<?php the_post_thumbnail($is_featured ? 'large' : 'medium_large', array('class' => 'h-full w-full object-cover transition duration-700 group-hover:scale-105')); ?>
								<?php else : ?>
									<div class="h-full w-full bg-gradient-to-br from-primary to-blue-900"></div>
								<?php endif; ?>
							</div>
							<div class="p-6 <?php echo $is_featured ? 'lg:p-8' : ''; ?>">
								<p class="text-[10px] font-black uppercase tracking-widest text-primary/70"><?php echo esc_html(get_the_date('F d, Y')); ?></p>
								<h2 class="<?php echo $is_featured ? 'mt-3 text-2xl md:text-3xl' : 'mt-3 text-xl'; ?> font-black text-gray-900 leading-tight group-hover:text-primary transition-colors">
									<?php the_title(); ?>
								</h2>
								<p class="mt-3 text-sm text-gray-500 leading-relaxed line-clamp-3">
									<?php echo wp_trim_words(get_the_excerpt(), $is_featured ? 30 : 22, '...'); ?>
								</p>
								<span class="mt-5 inline-flex items-center gap-2 text-[10px] font-black uppercase tracking-widest text-primary">
									Read More
									<span class="h-px w-10 bg-primary transition group-hover:w-14"></span>
								</span>
							</div>
						</a>
					</article>
				<?php endwhile; ?>
			</div>

			<div class="mt-12">
				<?php the_posts_pagination(array('prev_text' => '&larr; Prev', 'next_text' => 'Next &rarr;')); ?>
			</div>
		<?php else : ?>
			<div class="rounded-3xl border border-dashed border-gray-200 bg-white p-12 text-center">
				<p class="text-gray-500">No news posts found yet.</p>
			</div>
		<?php endif; ?>
	</section>
</div>

<?php get_footer(); ?>