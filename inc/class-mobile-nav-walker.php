<?php
/**
 * Mobile navigation walker with dedicated submenu toggles.
 */

class Tailwind_Mobile_Nav_Walker extends Walker_Nav_Menu {
	private $submenu_parent_ids = array();

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

	public function start_lvl( &$output, $depth = 0, $args = null ) {
		$indent    = str_repeat( "\t", $depth );
		$parent_id = isset( $this->submenu_parent_ids[ $depth + 1 ] ) ? (int) $this->submenu_parent_ids[ $depth + 1 ] : 0;
		$submenu_id = 'mobile-submenu-' . $parent_id;

		$output .= "\n$indent<ul id=\"" . esc_attr( $submenu_id ) . "\" class=\"mobile-submenu hidden mt-2 space-y-1 border-l-2 border-primary/20 pl-4\">\n";
	}

	public function end_lvl( &$output, $depth = 0, $args = null ) {
		$indent  = str_repeat( "\t", $depth );
		$output .= "$indent</ul>\n";
	}

	public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
		$indent       = $depth ? str_repeat( "\t", $depth ) : '';
		$item_classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$has_children = in_array( 'menu-item-has-children', $item_classes, true );

		$this->submenu_parent_ids[ $depth + 1 ] = $item->ID;

		$li_classes = 'mobile-menu-item';
		$output    .= $indent . '<li class="' . esc_attr( $li_classes ) . '">';
		$output    .= '<div class="flex items-center justify-between gap-3">';

		$atts = array(
			'title'        => ! empty( $item->attr_title ) ? $item->attr_title : '',
			'target'       => ! empty( $item->target ) ? $item->target : '',
			'rel'          => ! empty( $item->xfn ) ? $item->xfn : '',
			'href'         => ! empty( $item->url ) ? $item->url : '',
			'aria-current' => $item->current ? 'page' : '',
			'class'        => 'block flex-1 rounded-md px-3 py-2 text-sm font-medium text-gray-700 transition hover:bg-gray-50 hover:text-primary',
		);

		$attributes = '';
		foreach ( $atts as $attr => $value ) {
			if ( ! empty( $value ) ) {
				$value       = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
				$attributes .= ' ' . $attr . '="' . $value . '"';
			}
		}

		$title = apply_filters( 'the_title', $item->title, $item->ID );
		$output .= '<a' . $attributes . '>' . $title . '</a>';

		if ( $has_children ) {
			$submenu_id = 'mobile-submenu-' . (int) $item->ID;
			$output    .= '<button type="button" class="mobile-submenu-toggle inline-flex h-9 w-9 items-center justify-center rounded-md text-gray-500 transition hover:bg-gray-100 hover:text-primary focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary/30" aria-expanded="false" aria-controls="' . esc_attr( $submenu_id ) . '">';
			$output    .= '<span class="sr-only">Toggle submenu</span>';
			$output    .= '<svg class="mobile-submenu-icon h-4 w-4 transition-transform" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"><path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.157l3.71-3.928a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" /></svg>';
			$output    .= '</button>';
		}

		$output .= '</div>';
	}

	public function end_el( &$output, $item, $depth = 0, $args = null ) {
		unset( $this->submenu_parent_ids[ $depth + 1 ] );
		$output .= "</li>\n";
	}
}
