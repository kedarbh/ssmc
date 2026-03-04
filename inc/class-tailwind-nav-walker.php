<?php
/**
 * Desktop WordPress Nav Walker for Tailwind CSS
 */

class Tailwind_Nav_Walker extends Walker_Nav_Menu {
	private $mega_branch  = array();
	private $mega_col_count = 0;
	private $current_mega_item = null;

	public function display_element( $element, &$children_elements, $max_depth, $depth, $args, &$output ) {
		if ( ! $element ) {
			return;
		}

		$element_id = $this->db_fields['id'];
		if ( isset( $args[0] ) && is_object( $args[0] ) ) {
			$args[0]->has_children = ! empty( $children_elements[ $element->$element_id ] );
		}

		parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
	}

	private function is_mega_enabled( $item ) {
		$is_mega_meta = get_post_meta( $item->ID, '_is_mega_menu', true );
		return ! empty( $is_mega_meta );
	}

	public function start_lvl( &$output, $depth = 0, $args = null ) {
		$indent   = str_repeat( "\t", $depth );
		$is_mega  = ! empty( $this->mega_branch[ $depth + 1 ] );

			if ( 0 === $depth && $is_mega ) {
	            // Retrieve custom fields with fallbacks
            $item_id = isset( $this->current_mega_item->ID ) ? $this->current_mega_item->ID : 0;
            $hl_title = get_post_meta( $item_id, '_mega_menu_highlight_title', true ) ?: 'Discover SSMC';
            $hl_text = get_post_meta( $item_id, '_mega_menu_highlight_text', true ) ?: 'Explore our comprehensive programs, visionary faculty, and modern facilities designed to shape the future.';
            $hl_link_text = get_post_meta( $item_id, '_mega_menu_highlight_link_text', true ) ?: 'Learn More';
            $hl_link_url = get_post_meta( $item_id, '_mega_menu_highlight_link_url', true ) ?: '#';

			// Smarter Mega Menu: Align to the right of the parent item for a more "connected" feel
				$classes = 'sub-menu absolute right-0 top-full z-50 invisible w-[min(900px,calc(100vw-2rem))] overflow-hidden rounded-b-2xl rounded-t-none border border-t-0 border-gray-100/50 bg-white/95 backdrop-blur-md shadow-2xl flex opacity-0 origin-top scale-95 pointer-events-none transition-all duration-300 ease-out group-hover:visible group-hover:opacity-100 group-hover:scale-100 group-hover:pointer-events-auto group-focus-within:visible group-focus-within:opacity-100 group-focus-within:scale-100 group-focus-within:pointer-events-auto';
			
			$output .= "\n$indent<div class=\"" . esc_attr( $classes ) . "\">\n";

            // Add a visual 'highlight' or 'featured' sidebar area to the mega menu
            $output .= "$indent\t<div class=\"w-1/3 bg-gray-50 p-8 border-r border-gray-100 hidden md:flex md:flex-col justify-center relative z-10\">\n";
            $output .= "$indent\t\t<h3 class=\"text-gray-900 font-bold text-xl mb-2\">" . esc_html( $hl_title ) . "</h3>\n";
            $output .= "$indent\t\t<p class=\"text-gray-500 mb-6 leading-relaxed\">" . esc_html( $hl_text ) . "</p>\n";
            if ( $hl_link_url && $hl_link_text ) {
                $output .= "$indent\t\t<a href=\"" . esc_url( $hl_link_url ) . "\" class=\"inline-flex items-center justify-center px-4 py-2 bg-primary text-white font-medium rounded-lg hover:bg-secondary hover:!text-white transition-colors group/btn w-fit\">" . esc_html( $hl_link_text ) . " <svg class=\"w-4 h-4 ml-2 transition-transform group-hover/btn:translate-x-1\" fill=\"none\" stroke=\"currentColor\" viewBox=\"0 0 24 24\"><path stroke-linecap=\"round\" stroke-linejoin=\"round\" stroke-width=\"2\" d=\"M17 8l4 4m0 0l-4 4m4-4H3\"></path></svg></a>\n";
            }
            $output .= "$indent\t</div>\n";

            // Link columns wrapper
            $cols = get_post_meta( $item_id, '_mega_menu_columns', true ) ?: 2;
            $grid_class = 'sm:grid-cols-' . $cols;
            
            $output .= "$indent\t<div class=\"w-full md:w-2/3 p-10 relative z-10\">\n";
            $output .= "$indent\t\t<ul class=\"grid grid-cols-1 gap-8 {$grid_class}\">\n";

			} elseif ( 0 === $depth ) {
	            // Standard dropdown
				$classes = 'sub-menu absolute left-0 top-full z-50 min-w-[240px] rounded-b-xl rounded-t-none border border-t-0 border-gray-100/50 bg-white/95 backdrop-blur-md py-2 shadow-xl block opacity-0 invisible origin-top scale-95 pointer-events-none transition-all duration-300 ease-out group-hover:opacity-100 group-hover:visible group-hover:scale-100 group-hover:pointer-events-auto group-focus-within:opacity-100 group-focus-within:visible group-focus-within:scale-100 group-focus-within:pointer-events-auto';
	            $output .= "\n$indent<ul class=\"" . esc_attr( $classes ) . "\">\n";
		} elseif ( $is_mega ) {
            // Lists inside mega menu columns
			$classes = 'sub-menu mt-4 space-y-3';
            $output .= "\n$indent<ul class=\"" . esc_attr( $classes ) . "\">\n";
			} else {
	            // Sub-dropdowns (fly-outs)
				$classes = 'sub-menu absolute left-full top-0 z-50 ml-1 min-w-[220px] rounded-xl border border-gray-100/50 bg-white/95 backdrop-blur-md py-2 shadow-xl ring-1 ring-black/5 opacity-0 invisible translate-x-3 pointer-events-none transition-all duration-300 ease-out group-hover:opacity-100 group-hover:visible group-hover:translate-x-0 group-hover:pointer-events-auto group-focus-within:opacity-100 group-focus-within:visible group-focus-within:translate-x-0 group-focus-within:pointer-events-auto';
	            $output .= "\n$indent<ul class=\"" . esc_attr( $classes ) . "\">\n";
			}
	}

	public function end_lvl( &$output, $depth = 0, $args = null ) {
		$indent  = str_repeat( "\t", $depth );
        $is_mega  = ! empty( $this->mega_branch[ $depth + 1 ] );

        if ( 0 === $depth && $is_mega ) {
            // Close the inner lists, the link wrapper, and the main mega menu container
            $output .= "$indent\t\t</ul>\n";
            $output .= "$indent\t</div>\n";
            $output .= "$indent</div>\n";
        } else {
		    $output .= "$indent</ul>\n";
        }
	}

	public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
		$indent       = ( $depth ) ? str_repeat( "\t", $depth ) : '';
		$base_classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$has_children = in_array( 'menu-item-has-children', $base_classes, true );

		$is_mega = ( 0 === $depth ) ? $this->is_mega_enabled( $item ) : ! empty( $this->mega_branch[ $depth ] );
		$this->mega_branch[ $depth + 1 ] = $is_mega;

		if ( 0 === $depth && $is_mega ) {
			$this->current_mega_item = $item;
		}

		$classes = $base_classes;
		$classes[] = 'menu-item-' . $item->ID;

			if ( 0 === $depth ) {
	            // Top level
				$classes[] = 'relative';
				$classes[] = 'group';
		} elseif ( $is_mega && 1 === $depth ) {
            // Mega menu column wrappers (could be a header with children, or just a direct link)
			$classes[] = 'min-w-0';
            if ($has_children) {
                 $classes[] = 'flex flex-col';
            }
		} else {
			$classes[] = 'relative';
			$classes[] = 'group';
		}

		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth ) );
		$output     .= $indent . '<li class="' . esc_attr( $class_names ) . '">';

		$atts = array(
			'title'        => ! empty( $item->attr_title ) ? $item->attr_title : '',
			'target'       => ! empty( $item->target ) ? $item->target : '',
			'rel'          => ! empty( $item->xfn ) ? $item->xfn : '',
			'href'         => ! empty( $item->url ) ? $item->url : '',
			'aria-current' => $item->current ? 'page' : '',
		);

		$a_classes = '';
		if ( 0 === $depth ) {
            // Top level link
			$a_classes = 'inline-flex items-center gap-1 px-4 text-sm font-semibold text-gray-700 transition duration-300 hover:text-primary focus-visible:outline-none focus-visible:text-primary h-full';
		} elseif ( $is_mega && 1 === $depth ) {
            // Column Header
			$a_classes = 'inline-flex items-center gap-2 pb-3 mb-2 border-b border-gray-100 text-sm font-bold tracking-wide text-primary w-full';
		} elseif ( $is_mega ) {
            // Link inside column
			$a_classes = 'flex items-center gap-3 text-[15px] font-medium text-gray-600 transition duration-200 hover:text-primary hover:translate-x-1';
            $item->title = '<div class="w-1.5 h-1.5 rounded-full bg-gray-200 group-hover:bg-secondary transition-colors"></div> ' . $item->title;
		} else {
            // Standard dropdown link
			$a_classes = 'block px-5 py-2.5 text-sm font-medium text-gray-600 transition hover:bg-gray-50 hover:text-primary mx-2 rounded-lg';
		}

		$atts['class'] = $a_classes;
		if ( $has_children ) {
			$atts['aria-haspopup'] = 'true';
		}

		$attributes = '';
		foreach ( $atts as $attr => $value ) {
			if ( ! empty( $value ) ) {
				$value       = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
				$attributes .= ' ' . $attr . '="' . $value . '"';
			}
		}

		$title = apply_filters( 'the_title', $item->title, $item->ID );

		$item_output  = $args->before;
		$item_output .= '<a' . $attributes . '>';
		$item_output .= $args->link_before . $title . $args->link_after;

		if ( $has_children && 0 === $depth ) {
			$item_output .= '<svg class="h-4 w-4 text-gray-400 transition-transform duration-300 group-hover:rotate-180 group-hover:text-primary group-focus-within:rotate-180 ml-1" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"><path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.157l3.71-3.928a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" /></svg>';
		} elseif ( $has_children && !$is_mega && $depth > 0) {
            // Dropdown arrow for nested standard menus
            $item_output .= '<svg class="h-4 w-4 text-gray-400 ml-auto" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M7.21 14.77a.75.75 0 01.02-1.06L11.156 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" /></svg>';
        }

		$item_output .= '</a>';
		$item_output .= $args->after;

		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}

	public function end_el( &$output, $item, $depth = 0, $args = null ) {
		unset( $this->mega_branch[ $depth + 1 ] );
		$output .= "</li>\n";
	}
}
