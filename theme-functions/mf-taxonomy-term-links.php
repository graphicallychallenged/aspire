<?php
/**
 * Custom Taxonomy Link Outputs
 * List all taxonomies associated with current entry
 *
 */

function mf_taxonomies_terms_links() {

    global $post, $post_id;
    // get post by post id
    $post = get_post($post->ID);
    // get post type by post
    $post_type = $post->post_type;
    // get post type taxonomies
    $taxonomies = get_object_taxonomies($post_type);

//  echo '<h2>All Taxonomies</h2>';
//  print_r($taxonomies);

    foreach ($taxonomies as $taxonomy) {

        // Get Details about the Current Taxonomy
        // http://codex.wordpress.org/Function_Reference/get_taxonomy

        $tax_features = get_taxonomy($taxonomy);

        // print_r($tax_features);

        $tax_label = $tax_features->labels->singular_name;

        // Get the terms related to this taxonomy
        $terms = get_the_terms( $post->ID, $taxonomy );

        if ( !empty( $terms ) ) { ?>

            <h4><?php echo $tax_label; ?></h4>

            <?php $out = array();

                foreach ( $terms as $term ) {

                    $out[] = '<li class="' . $term->slug . '"> <a href="' .get_term_link($term->slug, $taxonomy) .'">'.$term->name.'</a></li>';

                    $return = join( ' ', $out );

                }

            echo '<ul class="unstyled">' . $return . '</ul><hr class="dotted lighter">';
            unset($return);

        }
    }
}
