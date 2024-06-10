<?php

// Create class attribute allowing for custom "className" and "align" values.
$className = 'block';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and handle defaults.
$text = get_field('testimonial') ?: 'Your testimonial here...';
$author = get_field('author') ?: 'Author name';
$role = get_field('role') ?: 'Author role';
$image = get_field('image');
$button_text = get_field('button_text') ?: 'Push me';
$background_color = get_field('background_color');
$text_color = get_field('text_color');

?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?> block-js">
  <blockquote class="block-blockquote">
    <p class="block-text"><?php echo $text; ?></p>
    <p class="block-author"><?php echo $author; ?></p>
    <p class="block-role"><?php echo $role; ?></p>
    <button id="block-button" type="button" class="block-button"><?php echo $button_text; ?></button>
  </blockquote>
  <div class="block-image">
    <?php echo wp_get_attachment_image( $image, 'medium' ); ?>
  </div>

</div>