<?php
/**
 * Journal Meta Boxes (Details & Articles Repeater)
 *
 * @package ssmc-custom
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register Journal Meta Box
 */
function ssmc_add_journal_meta_box() {
	add_meta_box(
		'ssmc_journal_details',
		__( 'Journal Details & Articles', 'ssmc-custom' ),
		'ssmc_render_journal_meta_box',
		'journal',
		'normal',
		'high'
	);
}
add_action( 'add_meta_boxes', 'ssmc_add_journal_meta_box' );

/**
 * Render Journal Meta Box (HTML & JS)
 */
function ssmc_render_journal_meta_box( $post ) {
	// Add nonce for security and authentication.
	wp_nonce_field( 'ssmc_save_journal_data', 'ssmc_journal_nonce' );

	// Retrieve existing values
	$pub_date    = get_post_meta( $post->ID, '_journal_published_date', true );
	$volume_num  = get_post_meta( $post->ID, '_journal_volume_number', true );
	$journal_type = get_post_meta( $post->ID, '_journal_type', true );
	
	// Complex repeater data (stored as JSON string for easy JS handoff)
	$articles_json = get_post_meta( $post->ID, '_journal_articles', true );
	if ( empty( $articles_json ) ) {
		$articles_json = '[]';
	}

	// Basic CSS for repeater
	?>
	<style>
		.ssmc-journal-panel { padding: 15px; background: #fff; border: 1px solid #ccd0d4; box-shadow: 0 1px 1px rgba(0,0,0,.04); margin-bottom: 20px; }
		.ssmc-journal-row { display: flex; flex-wrap: wrap; gap: 15px; margin-bottom: 15px; }
		.ssmc-journal-field { flex: 1; min-width: 250px; }
		.ssmc-journal-field label { display: block; font-weight: bold; margin-bottom: 5px; color: #1d2327; }
		.ssmc-journal-field input[type="text"], .ssmc-journal-field input[type="date"] { width: 100%; padding: 5px 8px; }
		.ssmc-journal-field input::placeholder { color: #b0aba5; font-style: italic; opacity: 1; }
		
		.ssmc-repeater-container { border: 1px solid #e2e4e7; background: #f9f9f9; padding: 15px; margin-top: 20px; }
		.ssmc-repeater-header { display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid #ddd; padding-bottom: 10px; margin-bottom: 15px; }
		.ssmc-repeater-header h3 { margin: 0; font-size: 16px; font-weight: 600; }
		
		.ssmc-article-item { background: #fff; border: 1px solid #ddd; padding: 15px; margin-bottom: 10px; position: relative; display: flex; gap: 15px; align-items: flex-start; }
		.ssmc-article-drag { cursor: grab; padding: 5px; color: #a7aaad; }
		.ssmc-article-fields { flex-grow: 1; display: grid; grid-template-columns: 2fr 1fr 2fr; gap: 15px; }
		.ssmc-article-fields input { width: 100%; }
		.ssmc-article-fields input::placeholder { color: #b0aba5; font-style: italic; opacity: 1; }
		.ssmc-article-remove { color: #d63638; cursor: pointer; padding: 5px; font-weight: bold; border-radius: 3px; }
		.ssmc-article-remove:hover { background: #d63638; color: #fff; }
		
		#ssmc-add-article { margin-top: 10px; }
		.ssmc-empty-msg { font-style: italic; color: #646970; text-align: center; padding: 20px; }
	</style>

	<div class="ssmc-journal-panel">
		<!-- Part 1: General Details -->
		<div class="ssmc-journal-row">
			<div class="ssmc-journal-field">
				<label for="ssmc_journal_volume_number"><?php _e( 'Volume & Issue Number', 'ssmc-custom' ); ?></label>
				<input type="text" id="ssmc_journal_volume_number" name="ssmc_journal_volume_number" value="<?php echo esc_attr( $volume_num ); ?>" placeholder="e.g. Vol. 13 No. 10" />
			</div>
			<div class="ssmc-journal-field">
				<label for="ssmc_journal_published_date"><?php _e( 'Published Date/Year', 'ssmc-custom' ); ?></label>
				<input type="text" id="ssmc_journal_published_date" name="ssmc_journal_published_date" value="<?php echo esc_attr( $pub_date ); ?>" placeholder="e.g. November 2023" />
			</div>
			<div class="ssmc-journal-field">
				<label for="ssmc_journal_type"><?php _e( 'Journal Type', 'ssmc-custom' ); ?></label>
				<input type="text" id="ssmc_journal_type" name="ssmc_journal_type" value="<?php echo esc_attr( $journal_type ); ?>" placeholder="e.g. Peer-Reviewed, Multidisciplinary" />
			</div>
		</div>

		<!-- Part 2: Articles Repeater -->
		<div class="ssmc-repeater-container">
			<div class="ssmc-repeater-header">
				<h3><?php _e( 'Articles in this Volume', 'ssmc-custom' ); ?> ( <span id="ssmc_article_count">0</span> )</h3>
				<button type="button" class="button button-primary" id="ssmc-add-article"><?php _e( '+ Add New Article', 'ssmc-custom' ); ?></button>
			</div>

			<div id="ssmc-articles-list">
				<!-- JS will populate rows here -->
			</div>
			
			<div id="ssmc-empty-state" class="ssmc-empty-msg" style="display: none;">
				<?php _e( 'No articles added yet. Click "+ Add New Article" to start building this volume.', 'ssmc-custom' ); ?>
			</div>

			<!-- Hidden input to store JSON for saving -->
			<input type="hidden" id="ssmc_journal_articles" name="ssmc_journal_articles" value="" />
		</div>
	</div>

	<script>
	document.addEventListener("DOMContentLoaded", function() {
		const articlesList = document.getElementById('ssmc-articles-list');
		const emptyState = document.getElementById('ssmc-empty-state');
		const addBtn = document.getElementById('ssmc-add-article');
		const jsonInput = document.getElementById('ssmc_journal_articles');
		const countSpan = document.getElementById('ssmc_article_count');
		
		// Load existing data from the database
		let articles = <?php echo $articles_json; ?>;
		if (!Array.isArray(articles)) { articles = []; }

		function render() {
			articlesList.innerHTML = '';
			
			if (articles.length === 0) {
				emptyState.style.display = 'block';
			} else {
				emptyState.style.display = 'none';
				articles.forEach((article, index) => {
					const row = document.createElement('div');
					row.className = 'ssmc-article-item';
					row.innerHTML = `
						<div class="ssmc-article-drag" title="In the future, drag to reorder">#</div>
						<div class="ssmc-article-fields">
							<div>
								<label style="font-size:11px; color:#646970;">Article Title</label>
								<input type="text" class="article-title" data-index="${index}" value="${escapeHtml(article.title || '')}" placeholder="Title of the research paper" />
							</div>
							<div>
								<label style="font-size:11px; color:#646970;">Author(s)</label>
								<input type="text" class="article-author" data-index="${index}" value="${escapeHtml(article.author || '')}" placeholder="John Doe, Jane Smith" />
							</div>
							<div>
								<label style="font-size:11px; color:#646970;">External PDF / NepJOL Link</label>
								<input type="text" class="article-link" data-index="${index}" value="${escapeHtml(article.link || '')}" placeholder="https://www.nepjol.info/..." />
							</div>
						</div>
						<div class="ssmc-article-remove" data-index="${index}" title="Remove Article">&times;</div>
					`;
					articlesList.appendChild(row);
				});
			}
			
			updateTracker();
		}

		function updateTracker() {
			countSpan.textContent = articles.length;
			jsonInput.value = JSON.stringify(articles);
		}

		function escapeHtml(unsafe) {
			return (unsafe || "").toString()
				.replace(/&/g, "&amp;")
				.replace(/</g, "&lt;")
				.replace(/>/g, "&gt;")
				.replace(/"/g, "&quot;")
				.replace(/'/g, "&#039;");
		}

		// Add new article
		addBtn.addEventListener('click', function(e) {
			e.preventDefault();
			articles.push({ title: '', author: '', link: '' });
			render();
		});

		// Event Delegation for remove and input changes
		articlesList.addEventListener('input', function(e) {
			const index = e.target.getAttribute('data-index');
			if (index !== null) {
				if (e.target.classList.contains('article-title')) {
					articles[index].title = e.target.value;
				} else if (e.target.classList.contains('article-author')) {
					articles[index].author = e.target.value;
				} else if (e.target.classList.contains('article-link')) {
					articles[index].link = e.target.value;
				}
				updateTracker();
			}
		});

		articlesList.addEventListener('click', function(e) {
			if (e.target.classList.contains('ssmc-article-remove')) {
				if(confirm("Are you sure you want to remove this article?")) {
					const index = e.target.getAttribute('data-index');
					articles.splice(index, 1);
					render();
				}
			}
		});

		// Initial load
		render();
	});
	</script>
	<?php
}

/**
 * Save Journal Meta Box Data
 */
function ssmc_save_journal_data( $post_id ) {
	// Security check
	if ( ! isset( $_POST['ssmc_journal_nonce'] ) || ! wp_verify_nonce( $_POST['ssmc_journal_nonce'], 'ssmc_save_journal_data' ) ) {
		return;
	}

	// Make sure this is a journal post type
	if ( isset( $_POST['post_type'] ) && 'journal' !== $_POST['post_type'] ) {
		return;
	}

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	// 1. Save standard text fields
	$fields = array(
		'ssmc_journal_volume_number'  => '_journal_volume_number',
		'ssmc_journal_published_date' => '_journal_published_date',
		'ssmc_journal_type'           => '_journal_type',
	);

	foreach ( $fields as $post_key => $meta_key ) {
		if ( isset( $_POST[ $post_key ] ) ) {
			update_post_meta( $post_id, $meta_key, sanitize_text_field( wp_unslash( $_POST[ $post_key ] ) ) );
		}
	}

	// 2. Save Repeater JSON
	if ( isset( $_POST['ssmc_journal_articles'] ) ) {
		$raw_json = wp_unslash( $_POST['ssmc_journal_articles'] );
		$decoded = json_decode( $raw_json, true );
		
		if ( json_last_error() === JSON_ERROR_NONE && is_array( $decoded ) ) {
			// Sanitize array contents before saving back to JSON string
			$sanitized_articles = array();
			
			foreach ( $decoded as $article ) {
				// Only save if title exists
				if ( ! empty( $article['title'] ) ) {
					$sanitized_articles[] = array(
						'title'  => wp_strip_all_tags( $article['title'] ),
						'author' => wp_strip_all_tags( $article['author'] ),
						'link'   => esc_url_raw( $article['link'] )
					);
				}
			}
			
			// Save sanitized data keeping Unicode intact
			update_post_meta( $post_id, '_journal_articles', wp_json_encode( $sanitized_articles, JSON_UNESCAPED_UNICODE ) );
		}
	} else {
		delete_post_meta( $post_id, '_journal_articles' );
	}
}
add_action( 'save_post', 'ssmc_save_journal_data' );
