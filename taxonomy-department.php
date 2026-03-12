<?php

/**
 * The template for displaying department taxonomy archives
 *
 * @package ssmc-custom
 */

get_header();
$current_dept = get_queried_object();

$programs_query = new WP_Query(array(
	'post_type'      => 'program',
	'tax_query'      => array(
		array(
			'taxonomy' => 'department',
			'field'    => 'term_id',
			'terms'    => $current_dept->term_id,
		),
	),
	'posts_per_page' => -1,
));

$faculty_query = new WP_Query(array(
	'post_type'      => 'faculty',
	'tax_query'      => array(
		array(
			'taxonomy' => 'department',
			'field'    => 'term_id',
			'terms'    => $current_dept->term_id,
		),
	),
	'posts_per_page' => -1,
));

$program_count = (int) $programs_query->found_posts;
$faculty_count = (int) $faculty_query->found_posts;
?>

<div class="bg-slate-50 min-h-screen pb-24">
	<header class="relative overflow-hidden bg-gradient-to-br from-primary via-blue-900 to-blue-950 text-white">
		<div class="absolute inset-0 opacity-20" style="background-image: radial-gradient(circle at 1px 1px, rgba(255,255,255,0.35) 1px, transparent 0); background-size: 48px 48px;"></div>
		<div class="absolute -top-24 right-0 h-64 w-64 rounded-full bg-white/10 blur-3xl"></div>
		<div class="container mx-auto px-4 py-16 lg:py-24 relative z-10">
			<nav class="flex items-center gap-2 text-blue-100/70 text-xs font-semibold uppercase tracking-widest">
				<a href="<?php echo esc_url(home_url('/')); ?>" class="hover:text-white transition-colors duration-200">Home</a>
				<span class="opacity-40">/</span>
				<a href="<?php echo esc_url(get_post_type_archive_link('program')); ?>" class="hover:text-white transition-colors duration-200">Programs</a>
				<span class="opacity-40">/</span>
				<span class="text-white"><?php echo esc_html($current_dept->name); ?></span>
			</nav>

			<div class="mt-10 grid grid-cols-1 gap-10 lg:grid-cols-12 items-end">
				<div class="lg:col-span-7">
					<span class="inline-flex items-center rounded-full bg-white/10 px-4 py-2 text-[10px] font-black uppercase tracking-[0.3em] text-secondary">
						Academic Department
					</span>
					<h1 class="mt-6 text-4xl md:text-6xl font-black tracking-tight leading-tight">
						<?php echo esc_html($current_dept->name); ?>
					</h1>
					<?php if ($current_dept->description) : ?>
						<p class="mt-5 text-blue-100/80 max-w-2xl text-lg font-light leading-relaxed">
							<?php echo esc_html($current_dept->description); ?>
						</p>
					<?php endif; ?>

					<div class="mt-8 flex flex-wrap gap-3">
						<span class="inline-flex items-center gap-2 rounded-full bg-white/10 px-4 py-2 text-xs font-semibold uppercase tracking-widest">
							<span class="text-white"><?php echo esc_html(number_format_i18n($program_count)); ?></span>
							<span class="text-blue-100/70">Programs</span>
						</span>
						<span class="inline-flex items-center gap-2 rounded-full bg-white/10 px-4 py-2 text-xs font-semibold uppercase tracking-widest">
							<span class="text-white"><?php echo esc_html(number_format_i18n($faculty_count)); ?></span>
							<span class="text-blue-100/70">Faculty</span>
						</span>
					</div>
				</div>

				<div class="lg:col-span-5">
					<div class="rounded-3xl border border-white/15 bg-white/10 p-6 backdrop-blur-sm shadow-2xl">
						<div class="grid grid-cols-2 gap-4">
							<div class="rounded-2xl bg-white/10 p-4">
								<div class="text-3xl font-black"><?php echo esc_html(number_format_i18n($program_count)); ?></div>
								<div class="mt-1 text-[10px] uppercase tracking-widest text-blue-100/70">Programs</div>
							</div>
							<div class="rounded-2xl bg-white/10 p-4">
								<div class="text-3xl font-black"><?php echo esc_html(number_format_i18n($faculty_count)); ?></div>
								<div class="mt-1 text-[10px] uppercase tracking-widest text-blue-100/70">Faculty</div>
							</div>
						</div>
						<a href="<?php echo esc_url(home_url('/contact')); ?>" class="mt-6 block w-full rounded-2xl bg-white px-4 py-3 text-center text-[10px] font-black uppercase tracking-widest text-primary transition hover:bg-secondary">
							Contact Department
						</a>
						<a href="<?php echo esc_url(get_post_type_archive_link('program')); ?>" class="mt-3 block w-full rounded-2xl border border-white/30 px-4 py-3 text-center text-[10px] font-black uppercase tracking-widest text-white/90 transition hover:bg-white/10">
							Explore All Programs
						</a>
					</div>
				</div>
			</div>
		</div>
	</header>

	<section class="container mx-auto px-4 py-12 lg:py-16">
		<div class="grid grid-cols-1 gap-12 lg:grid-cols-12">
			<div class="lg:col-span-8">
				<div class="flex items-end justify-between gap-6 mb-8">
					<div>
						<h2 class="text-2xl md:text-3xl font-black text-gray-900 tracking-tight">Programs in <?php echo esc_html($current_dept->name); ?></h2>
						<p class="text-sm text-gray-500 mt-2">Explore degrees designed for career-ready graduates and lifelong learners.</p>
					</div>
					<a href="<?php echo esc_url(get_post_type_archive_link('program')); ?>" class="hidden md:inline-flex items-center gap-2 text-xs font-black uppercase tracking-widest text-primary hover:text-secondary transition">
						All Programs
						<span class="h-px w-8 bg-primary"></span>
					</a>
				</div>

				<?php if ($programs_query->have_posts()) : ?>
					<div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
						<?php while ($programs_query->have_posts()) : $programs_query->the_post(); ?>
							<article class="group flex flex-col overflow-hidden rounded-3xl border border-gray-200 bg-white shadow-sm transition hover:-translate-y-1 hover:shadow-2xl">
								<div class="aspect-[4/3] overflow-hidden bg-gray-100">
									<?php if (has_post_thumbnail()) : ?>
										<?php the_post_thumbnail('medium_large', array('class' => 'h-full w-full object-cover transition duration-700 group-hover:scale-105')); ?>
									<?php else : ?>
										<div class="h-full w-full bg-gradient-to-br from-primary to-blue-900 flex items-center justify-center">
											<svg class="h-12 w-12 text-white/80" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true">
												<path stroke-linecap="round" stroke-linejoin="round" d="M4 19.5A2.5 2.5 0 006.5 22h11a2.5 2.5 0 002.5-2.5V6.5A2.5 2.5 0 0017.5 4h-11A2.5 2.5 0 004 6.5v13z" />
												<path stroke-linecap="round" stroke-linejoin="round" d="M8 7h8M8 11h8M8 15h5" />
											</svg>
										</div>
									<?php endif; ?>
								</div>
								<div class="p-6 flex flex-col flex-1">
									<span class="text-[10px] font-black uppercase tracking-widest text-primary/70"><?php echo esc_html($current_dept->name); ?></span>
									<h3 class="mt-3 text-xl font-black text-gray-900 leading-snug group-hover:text-primary transition-colors">
										<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
									</h3>
									<p class="mt-3 text-sm text-gray-500 leading-relaxed line-clamp-3"><?php echo wp_trim_words(get_the_excerpt(), 26, '...'); ?></p>
									<a href="<?php the_permalink(); ?>" class="mt-6 inline-flex items-center gap-2 text-[11px] font-black uppercase tracking-widest text-primary transition group-hover:text-secondary">
										View Curriculum
										<span class="h-px w-10 bg-primary transition group-hover:w-16"></span>
									</a>
								</div>
							</article>
						<?php endwhile;
						wp_reset_postdata(); ?>
					</div>
				<?php else : ?>
					<div class="rounded-3xl border border-dashed border-gray-200 bg-white p-12 text-center">
						<p class="text-gray-500">No programs found for this department.</p>
					</div>
				<?php endif; ?>
			</div>

			<aside class="lg:col-span-4">
				<div class="space-y-8 lg:sticky lg:top-28">
					<div class="rounded-3xl border border-gray-200 bg-white p-6 shadow-sm">
						<div class="flex items-center justify-between">
							<h2 class="text-lg font-black text-gray-900 uppercase tracking-tight">Faculty</h2>
							<span class="rounded-full bg-primary/10 px-3 py-1 text-[10px] font-black uppercase tracking-widest text-primary">
								<?php echo esc_html(number_format_i18n($faculty_count)); ?>
							</span>
						</div>

						<?php if ($faculty_query->have_posts()) : ?>
							<div class="mt-6 space-y-4">
								<?php while ($faculty_query->have_posts()) : $faculty_query->the_post(); ?>
									<a href="<?php the_permalink(); ?>" class="group flex items-center gap-4 rounded-2xl border border-transparent p-3 transition hover:border-primary/20 hover:bg-primary/5">
										<div class="h-14 w-14 overflow-hidden rounded-2xl bg-gray-100">
											<?php if (has_post_thumbnail()) : ?>
												<?php the_post_thumbnail('thumbnail', array('class' => 'h-full w-full object-cover transition group-hover:scale-105')); ?>
											<?php else : ?>
												<div class="h-full w-full bg-gray-200"></div>
											<?php endif; ?>
										</div>
										<div>
											<h3 class="text-sm font-black text-gray-900 group-hover:text-primary transition"><?php the_title(); ?></h3>
											<?php
											$designation = get_post_meta(get_the_ID(), '_ssmc_faculty_designation', true);
											if ($designation) : ?>
												<span class="text-[9px] font-black uppercase tracking-widest text-primary/70"><?php echo esc_html($designation); ?></span>
											<?php else : ?>
												<span class="text-[9px] font-black uppercase tracking-widest text-gray-400">Faculty Member</span>
											<?php endif; ?>
										</div>
									</a>
								<?php endwhile;
								wp_reset_postdata(); ?>
							</div>
						<?php else : ?>
							<p class="mt-6 text-sm text-gray-400 italic">Faculty listings updating soon...</p>
						<?php endif; ?>
					</div>

					<div class="rounded-3xl bg-primary p-8 text-white shadow-xl shadow-primary/20 relative overflow-hidden">
						<div class="absolute -right-10 -top-12 h-32 w-32 rounded-full bg-white/10"></div>
						<h3 class="text-xl font-black uppercase tracking-tight">Department Inquiries</h3>
						<p class="mt-3 text-xs text-blue-100/80">Questions about curriculum or research opportunities? Reach out to the department office.</p>
						<a href="<?php echo esc_url(home_url('/contact')); ?>" class="mt-6 inline-flex w-full items-center justify-center rounded-2xl bg-white px-4 py-3 text-[10px] font-black uppercase tracking-widest text-primary transition hover:bg-secondary">
							Contact HOD
						</a>
					</div>
				</div>
			</aside>
		</div>
	</section>
</div>

<?php get_footer(); ?>