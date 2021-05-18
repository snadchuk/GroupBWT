<?php
/**
 * Template part for displaying a post or page.
 *
 * @package kadence
 */

namespace Kadence;

?>
<?php
if ( kadence()->show_feature_above() ) {
	get_template_part( 'template-parts/content/entry_thumbnail', get_post_type() );
}
$id_image = get_field('image_post');
$size = 'full'; // (thumbnail, medium, large, full или свой) 
if ( $id_image ) {
    echo wp_get_attachment_image( $id_image, $size );
}
?>


<article id="post-<?php the_ID(); ?>" <?php post_class( 'entry content-bg single-entry' . ( kadence()->option( 'post_footer_area_boxed' ) ? ' post-footer-area-boxed' : '' ) ); ?>>
	<div class="entry-content-wrap">
		<?php
		do_action( 'kadence_single_before_inner_content' );

		if ( kadence()->show_in_content_title() ) {
			get_template_part( 'template-parts/content/entry_header', get_post_type() );
		}
		if ( kadence()->show_feature_below() ) {
			get_template_part( 'template-parts/content/entry_thumbnail', get_post_type() );
		}

		get_template_part( 'template-parts/content/entry_content', get_post_type() );
		if ( 'post' === get_post_type() && kadence()->option( 'post_tags' ) ) {
			get_template_part( 'template-parts/content/entry_footer', get_post_type() );
		}

		do_action( 'kadence_single_after_inner_content' );

		?>
		<br>

            <div class="premium-blog-post-author premium-blog-meta-data">
<!--                <i class="fa fa-user fa-fw"></i>-->
                <!--					--><?php //the_author_posts_link(); ?>

                <?php $terms = get_the_terms( $post->ID, 'countries' );
                if( $terms ){
                    $term = array_shift( $terms );

                    // теперь можно можно вывести название термина
                    echo $term->name; ?>, <?php
                } ?>
                <?php $terms = get_the_terms( $post->ID, 'genre' );
                if( $terms ){
                    $term = array_shift( $terms );

                    // теперь можно можно вывести название термина
                    echo $term->name;?>, <?php
                } ?>
                <?php $terms = get_the_terms( $post->ID, 'years' );
                if( $terms ){
                    $term = array_shift( $terms );

                    // теперь можно можно вывести название термина
                    echo $term->name;?> <?php
                } ?>
                <?php $terms = get_the_terms( $post->ID, 'actor' );
                if( $terms ){
                    foreach ($terms as $term) {
                        ?> <p> <?php echo $term->name;  ?> </p> <?php
                    }
                } ?>

            </div>
        <strong>Премьера: <?php the_field('release_date'); ?> | Цена сенса: <?php the_field('session_cost'); ?> грн.</strong>
    </div>
</article><!-- #post-<?php the_ID(); ?> -->

<?php
if ( is_singular( get_post_type() ) ) {
	if ( 'post' === get_post_type() && kadence()->option( 'post_author_box' ) ) {
		get_template_part( 'template-parts/content/entry_author', get_post_type() );
	}
	// Show post navigation only when the post type is 'post' or has an archive.
	if ( ( 'post' === get_post_type() || get_post_type_object( get_post_type() )->has_archive ) && kadence()->show_post_navigation() ) {
		if ( kadence()->option( 'post_footer_area_boxed' ) ) {
			echo '<div class="post-navigation-wrap content-bg entry-content-wrap entry">';
		}
		the_post_navigation(
			apply_filters(
				'kadence_post_navigation_args',
				array(
					'prev_text' => '<div class="post-navigation-sub"><small>' . kadence()->get_icon( 'arrow-left-alt' ) . esc_html__( 'Previous', 'kadence' ) . '</small></div>%title',
					'next_text' => '<div class="post-navigation-sub"><small>' . esc_html__( 'Next', 'kadence' ) . kadence()->get_icon( 'arrow-right-alt' ) . '</small></div>%title',
				)
			)
		);
		if ( kadence()->option( 'post_footer_area_boxed' ) ) {
			echo '</div>';
		}
	}
	if ( 'post' === get_post_type() && kadence()->option( 'post_related' ) ) {
		get_template_part( 'template-parts/content/entry_related', get_post_type() );
	}
	// Show comments only when the post type supports it and when comments are open or at least one comment exists.
	if ( kadence()->show_comments() ) {
		comments_template();
	}
}
