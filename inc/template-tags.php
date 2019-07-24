<?php
/**
 * Custom template tags for this theme
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

if ( ! function_exists( 'swiftionportfolio_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function swiftionportfolio_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		printf(
			'<span class="posted-on">%1$s<a href="%2$s" rel="bookmark">%3$s</a></span>',
			swiftionportfolio_get_icon_svg( 'watch', 16 ),
			esc_url( get_permalink() ),
			$time_string
		);
	}
endif;

if ( ! function_exists( 'swiftionportfolio_posted_by' ) ) :
	/**
	 * Prints HTML with meta information about theme author.
	 */
	function swiftionportfolio_posted_by() {
		printf(
			/* translators: 1: SVG icon. 2: post author, only visible to screen readers. 3: author link. */
			'<span class="byline">%1$s<span class="screen-reader-text">%2$s</span><span class="author vcard"><a class="url fn n" href="%3$s">%4$s</a></span></span>',
			swiftionportfolio_get_icon_svg( 'person', 16 ),
			__( 'Posted by', 'swiftionportfolio' ),
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			esc_html( get_the_author() )
		);
	}
endif;

if ( ! function_exists( 'swiftionportfolio_comment_count' ) ) :
	/**
	 * Prints HTML with the comment count for the current post.
	 */
	function swiftionportfolio_comment_count() {
		if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			echo swiftionportfolio_get_icon_svg( 'comment', 16 );

			/* translators: %s: Name of current post. Only visible to screen readers. */
			comments_popup_link( sprintf( __( 'Leave a comment<span class="screen-reader-text"> on %s</span>', 'swiftionportfolio' ), get_the_title() ) );

			echo '</span>';
		}
	}
endif;

if ( ! function_exists( 'swiftionportfolio_entry_meta' ) ) :
	/**
	 * Prints HTML with meta information for the categories and comments.
	 */
	function swiftionportfolio_entry_meta() {

		// Hide author, post date, category and tag text for pages.
		if ( 'post' === get_post_type() ) {

			// Posted by
			swiftionportfolio_posted_by();

			// Posted on
			swiftionportfolio_posted_on();

			/* translators: used between list items, there is a space after the comma. */
			$categories_list = get_the_category_list( __( ', ', 'swiftionportfolio' ) );
			if ( $categories_list ) {
				printf(
					/* translators: 1: SVG icon. 2: posted in label, only visible to screen readers. 3: list of categories. */
					'<span class="cat-links">%1$s<span class="screen-reader-text">%2$s</span>%3$s</span>',
					swiftionportfolio_get_icon_svg( 'archive', 16 ),
					__( 'Posted in', 'swiftionportfolio' ),
					$categories_list
				); // WPCS: XSS OK.
			}

			/* translators: used between list items, there is a space after the comma. */
			// $tags_list = get_the_tag_list( '', __( ', ', 'swiftionportfolio' ) );
			// if ( $tags_list ) {
			// 	printf(
			// 		/* translators: 1: SVG icon. 2: posted in label, only visible to screen readers. 3: list of tags. */
			// 		'<span class="tags-links">%1$s<span class="screen-reader-text">%2$s </span>%3$s</span>',
			// 		swiftionportfolio_get_icon_svg( 'tag', 16 ),
			// 		__( 'Tags:', 'swiftionportfolio' ),
			// 		$tags_list
			// 	); // WPCS: XSS OK.
			// }
		}

		// Comment count.
		if ( ! is_singular() ) {
			swiftionportfolio_comment_count();
		}

		// Edit post link.
		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers. */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'swiftionportfolio' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			),
			'<span class="edit-link">' . swiftionportfolio_get_icon_svg( 'edit', 16 ),
			'</span>'
		);
	}
endif;

if ( ! function_exists( 'swiftionportfolio_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories and comments.
	 */
	function swiftionportfolio_entry_footer() {
		// Show only for post type
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma. */
			$tags_list = get_the_tag_list( '', __( ', ', 'swiftionportfolio' ) );
			if ( $tags_list ) {
				printf(
					/* translators: 1: SVG icon. 2: posted in label, only visible to screen readers. 3: list of tags. */
					'<span class="tags-links">%1$s<span class="screen-reader-text">%2$s </span>%3$s</span>',
					swiftionportfolio_get_icon_svg( 'tag', 16 ),
					__( 'Tags:', 'swiftionportfolio' ),
					$tags_list
				); // WPCS: XSS OK.
			}
		}
	}
endif;

if ( ! function_exists( 'swiftionportfolio_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function swiftionportfolio_post_thumbnail() {
		if ( ! swiftionportfolio_can_show_post_thumbnail() ) {
			return;
		}

		if ( is_singular() ) :
			?>

			<figure class="entry-featured-image">
				<?php the_post_thumbnail(
					'swiftionportfolio-featured', array(
						'class' => 'single-featured',
					)
				); ?>
			</figure><!-- .post-thumbnail -->

			<?php
		else :
			?>

		<figure class="entry-featured-image">
			<a class="entry-featured-image-inner" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" aria-hidden="true" tabindex="-1">
				<?php the_post_thumbnail(
					'swiftionportfolio-featured', array(
						'class' => 'single-featured',
					)
				); ?>
			</a>
		</figure>

			<?php
		endif; // End is_singular().
	}
endif;

if ( ! function_exists( 'swiftionportfolio_comment_avatar' ) ) :
	/**
	 * Returns the HTML markup to generate a user avatar.
	 */
	function swiftionportfolio_get_user_avatar_markup( $id_or_email = null ) {

		if ( ! isset( $id_or_email ) ) {
			$id_or_email = get_current_user_id();
		}

		return sprintf( '<div class="comment-user-avatar comment-author vcard">%s</div>', get_avatar( $id_or_email, swiftionportfolio_get_avatar_size() ) );
	}
endif;

if ( ! function_exists( 'swiftionportfolio_discussion_avatars_list' ) ) :
	/**
	 * Displays a list of avatars involved in a discussion for a given post.
	 */
	function swiftionportfolio_discussion_avatars_list( $comment_authors ) {
		if ( empty( $comment_authors ) ) {
			return;
		}
		echo '<ol class="discussion-avatar-list">', "\n";
		foreach ( $comment_authors as $id_or_email ) {
			printf(
				"<li>%s</li>\n",
				swiftionportfolio_get_user_avatar_markup( $id_or_email )
			);
		}
		echo '</ol><!-- .discussion-avatar-list -->', "\n";
	}
endif;

if ( ! function_exists( 'swiftionportfolio_comment_form' ) ) :
	/**
	 * Documentation for function.
	 */
	function swiftionportfolio_comment_form( $order ) {
		if ( true === $order || strtolower( $order ) === strtolower( get_option( 'comment_order', 'asc' ) ) ) {

			comment_form(
				array(
					'logged_in_as' => null,
					'title_reply'  => null,
				)
			);
		}
	}
endif;

if ( ! function_exists( 'swiftionportfolio_the_posts_navigation' ) ) :
	/**
	 * Documentation for function.
	 */
	function swiftionportfolio_the_posts_navigation(\WP_Query $wp_query = null, $echo = true) {
		if ( null === $wp_query ) {
			global $wp_query;
		}
		$pages = paginate_links( [
				'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
				'format'       => '?paged=%#%',
				'current'      => max( 1, get_query_var( 'paged' ) ),
				'total'        => $wp_query->max_num_pages,
				'type'         => 'array',
				'show_all'     => true,
				'end_size'     => 3,
				'mid_size'     => 1,
				'prev_next'    => true,
				'prev_text'    => __( 'Previous' ),
				'next_text'    => __( 'Next' ),
				'add_args'     => false,
				'add_fragment' => ''
			]
		);
		if ( is_array( $pages ) ) {
			$pagination = '<nav class="swiftionportfolio-pagination"><ul class="pagination">';
			foreach ($pages as $page) {
							$pagination .= '<li class="page-item' . (strpos($page, 'current') !== false ? ' active' : '') . '"> ' . str_replace('page-numbers', 'page-link', $page) . '</li>';
					}
			$pagination .= '</ul></nav>';
			if ( $echo ) {
				echo $pagination;
			} else {
				return $pagination;
			}
		}
		return null;
	}
endif;

if ( ! function_exists( 'wp_body_open' ) ) :
	/**
	 * Fire the wp_body_open action.
	 *
	 * Added for backwards compatibility to support pre 5.2.0 WordPress versions.
	 *
	 * @since Twenty Nineteen 1.4
	 */
	function wp_body_open() {
		/**
		 * Triggered after the opening <body> tag.
		 *
		 * @since Twenty Nineteen 1.4
		 */
		do_action( 'wp_body_open' );
	}
endif;
