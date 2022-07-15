<?php
/**
 * Display Breadcrumb
 *
 * @package Caff
 */

if ( ! function_exists( 'caff_breadcrumb' ) ) :
	/**
	 * Display Breadcrumb
	 * @return html Breadcrumb with links
	 */
	function caff_breadcrumb() {
		if ( function_exists( 'bcn_display' ) ) {
			if ( ! is_front_page() ) { ?>
			<div id="breadcrumb" class="bcn-breadctumb" typeof="BreadcrumbList" vocab="https://schema.org/">
		        <?php bcn_display(); ?>
		    </div>
			<?php }
			return;
		}
		
		$show = caff_gtm( 'caff_breadcrumb_show' );

		if ( ! $show ) {
			// Bail if breadcrumb is disabled.
			return;
		}
		
		$show_on_home = caff_gtm( 'caff_breadcrumb_show_home' );

		/* === OPTIONS === */
		$text['home']     = esc_html__( 'Home', 'caff' ); // text for the 'Home' link
		/* translators: 1: before text/html, 2: after text/html. */
		$text['category'] = esc_html__( '%1$s Archive for %2$s', 'caff' ); // text for a category page
		/* translators: 1: before text/html, 2: after text/html. */
		$text['search']   = esc_html__( '%1$sSearch results for: %2$s', 'caff' ); // text for a search results page
		/* translators: 1: before text/html, 2: after text/html. */
		$text['tag']      = esc_html__( '%1$sPosts tagged %2$s', 'caff' ); // text for a tag page
		/* translators: 1: before text/html, 2: after text/html. */
		$text['author']   = esc_html__( '%1$sView all posts by %2$s', 'caff' ); // text for an author page
		$text['404']      = esc_html__( '%1$sError 404%2$s', 'caff' );; // text for the 404 page

		$showCurrent = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
		$before      = '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="breadcrumb-current"><span itemprop="name">'; // tag before the current crumb
		$after       = '</span><meta itemprop="position" content="%1$s" /></li>'; // tag after the current crumb
		/* === END OF OPTIONS === */

		global $post, $paged, $page;
		
		$home_link        = home_url( '/' );
		$link_before      = '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">';
		$link_after       = '</li>';
		$link_attr        = ' itemprop="item"';
		$content_position = 1;
		$link             = $link_before . '<a' . $link_attr . ' href="%1$s"><span itemprop="name">%2$s</span></a><meta itemprop="position" content="%3$s" />' . $link_after;

		
		if ( is_front_page() ) {
			if ( $show_on_home ) {
				echo '
				<div id="breadcrumb">
					<div aria-label="' . esc_attr__( 'Breadcrumbs', 'caff' ) . '" class="breadcrumbs breadcrumb-trail on_home">
						<ol itemscope itemtype="http://schema.org/BreadcrumbList" class="trail-items">';

						printf( $link, esc_url( $home_link ), $text['home'], $content_position );

					echo '</ol>
					</div><!-- .breadcrumbs -->
				</div> <!-- #breadcrumb -->';
			}
		} else {
			echo '
			<div id="breadcrumb">
					<div aria-label="' . esc_attr__( 'Breadcrumbs', 'caff' ) . '" class="breadcrumbs breadcrumb-trail">
						<ol itemscope itemtype="http://schema.org/BreadcrumbList" class="trail-items">';

			echo sprintf( $link, esc_url( $home_link ), $text['home'], $content_position++ );

			if ( is_home() ) {
				echo $before . esc_html( get_the_title( get_option( 'page_for_posts', true ) ) ) . sprintf( $after, $content_position++ );
			} elseif ( is_category() ) {
				$thisCat = get_category( get_query_var( 'cat' ), false );

				if ( $thisCat->parent != 0 ) {
					$cats = get_category_parents( $thisCat->parent, true, false );
					$cats = str_replace( '<a', $link_before . '<span itemprop="name"><a' . $link_attr, $cats );
					$cats = str_replace( '</a>', '</span></a></span>' . '<meta itemprop="position" content="' . $content_position++ . '" />' . $link_after, $cats );
					echo $cats;
				}

				echo $before . sprintf( $text['category'], '<span class="archive-text screen-reader-text">', '</span>' ) . single_term_title( '', false ) . sprintf( $after, $content_position++ );
			} elseif ( is_tag() ) {
				echo $before . sprintf( $text['tag'], '<span class="tag-text screen-reader-text">', '</span>' ) . single_term_title(  '', false ) . sprintf( $after, $content_position++ );

			} elseif ( is_search() ) {
				echo $before . sprintf( $text['search'], '<span class="search-text">', '</span>' . get_search_query() ) . sprintf( $after, $content_position++ );
			} elseif ( is_day() ) {
				echo sprintf( $link, esc_url( get_year_link( get_the_time( __( 'Y', 'caff' ) ) ) ), esc_html( get_the_time( __( 'Y', 'caff' ) ) ), $content_position++ ) ;

				echo sprintf( $link, esc_url( get_month_link( get_the_time( __( 'Y', 'caff' ) ) ) ), esc_html(get_the_time( __( 'F', 'caff' ) ) ), $content_position++ );

				echo $before . esc_html( get_the_time( __( 'd', 'caff' ) ) ) . sprintf( $after, $content_position++ );
			} elseif ( is_month() ) {
				echo sprintf( $link, esc_url( get_year_link( get_the_time( __( 'Y', 'caff' ) ) ) ), esc_html( get_the_time( __( 'Y', 'caff' ) ) ), $content_position++ ) ;

				echo $before . esc_html( get_the_time( __( 'F', 'caff' ) ) ) . sprintf( $after, $content_position++ );
			} elseif ( is_year() ) {
				echo $before . esc_html( get_the_time( __( 'Y', 'caff' ) ) ) . sprintf( $after, $content_position++ );
			} elseif ( is_single() && !is_attachment() ) {
				if ( get_post_type() != 'post' ) {
					$post_type = get_post_type_object( get_post_type() );
					$post_link = get_post_type_archive_link( $post_type->name );

					printf( $link, esc_url( $post_link ), esc_html( $post_type->labels->singular_name ), $content_position++ );

					echo $before . esc_html( get_the_title() ) . sprintf( $after, $content_position++ );
				}
				else {
					$cat  = get_the_category();
					
					if ( ! is_wp_error( $cat ) && isset( $cat[0] ) ) {
						$cats = get_category_parents( $cat[0], true, '' );
							
						if ( ! is_wp_error( $cats ) ) {
							$cats = preg_replace( "#^(.+)$#", "$1", $cats );
							$cats = str_replace( '<a', $link_before . '<span itemprop="name"><a' . $link_attr, $cats );
							$cats = str_replace( '</a>', '</span></a></span>' . '<meta itemprop="position" content="' . $content_position++ . '" />' . $link_after, $cats );
							echo $cats;
						}

						echo $before . esc_html( get_the_title() ) . sprintf( $after, $content_position++ );
					}
				}
			} elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
				$post_type = get_post_type_object( get_post_type() );
				echo isset( $post_type->labels->singular_name ) ? $before . esc_html( $post_type->labels->singular_name ) . sprintf( $after, $content_position++ ) : ''; 
			} elseif ( is_attachment() ) {
				$parent = get_post( $post->post_parent );
				$cat    = get_the_category( $parent->ID );

				if ( isset( $cat[0] ) ) {
					$cat = $cat[0];
				}

				if ( $cat ) {
					$cats = get_category_parents( $cat, true );
					$cats = str_replace( '<a', $link_before . '<span itemprop="name"><a' . $link_attr, $cats );
					$cats = str_replace( '</a>', '</span></a></span>' . '<meta itemprop="position" content="' . $content_position++ . '" />' . $link_after, $cats );
					echo $cats;
				}

				printf( $link, esc_url( get_permalink( $parent ) ), esc_html( $parent->post_title ), $content_position++ );

				echo $before . esc_html( get_the_title() ) . sprintf( $after, $content_position++ );
			} elseif ( is_page() && ! $post->post_parent ) {
				echo $before . esc_html( get_the_title() ) . sprintf( $after, $content_position++ );
			} elseif ( is_page() && $post->post_parent ) {
				$parent_id   = $post->post_parent;
				$breadcrumbs = array();

				while( $parent_id ) {
					$page_child    = get_post( $parent_id );
					$breadcrumbs[] = sprintf( $link, esc_url( get_permalink( $page_child->ID ) ), esc_html( get_the_title( $page_child->ID ) ), $content_position++ );
					$parent_id     = $page_child->post_parent;
				}

				$breadcrumbs = array_reverse( $breadcrumbs );

				for( $i = 0; $i < count( $breadcrumbs ); $i++ ) {
					echo $breadcrumbs[$i]; 
				}

				echo $before . esc_html( get_the_title() ) . sprintf( $after, $content_position++ );
			} elseif ( is_author() ) {
				global $author;
				$userdata = get_userdata( $author );
				echo $before . sprintf( $text['author'], '<span class="author-text screen-reader-text">', '</span>' . $userdata->display_name ) . sprintf( $after, $content_position++ ); 

			} elseif ( is_404() ) {
				echo $before . sprintf( $text['404'], '<span class="404-text">', '</span>' ) . sprintf( $after, $content_position++ ); 

			}

			if ( get_query_var( 'paged' ) ) {
				if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) {
					echo ' (';
				}

				/* translators: %s: current page number. */
				echo sprintf( esc_html__( 'Page %s', 'caff' ), absint( max( $paged, $page ) ) );

				if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) {
					echo ')';
				}
			}

			echo '
					</ol>
				</div><!-- .breadcrumbs -->
			</div> <!-- #breadcrumb -->';
		}
	}
endif;
