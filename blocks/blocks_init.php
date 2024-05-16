<?php

//add custom block category at the top of the list
add_filter('block_categories_all', 'block_category_init', 10, 2);

function block_category_init($categories, $post) {

  array_unshift( $categories, array(
		'slug'	=> 'custom-blocks',
		'title' => __('Custom Blocks'),
	) );

	return $categories;
}

//register blocks
if (function_exists('acf_register_block_type')){
add_action( 'init', 'register_acf_blocks' );
}

function register_acf_blocks() {

    acf_register_block_type(array(
        'name'              => 'test_block',
        'title'             => __('Test_block'),
        'description'       => __('A test block.'),
        'render_template'   => '/blocks/test_block/test_block.php',
        'enqueue_style'     => get_template_directory_uri(  ) . '/blocks/test_block/test_block.css',
        'enqueue_script'     => get_template_directory_uri(  ) . '/blocks/test_block/test_block.js',
        'category'          => 'custom-blocks',
    ));

    acf_register_block_type(array(
        'name'              => 'test_block2',
        'title'             => __('Test_block2'),
        'description'       => __('A test block 2.'),
        'render_template'   => '/blocks/test_block2/test_block2.php',
        'enqueue_style'     => get_template_directory_uri(  ) . '/blocks/test_block2/test_block2.css',
        'category'          => 'custom-blocks',
    ));
}