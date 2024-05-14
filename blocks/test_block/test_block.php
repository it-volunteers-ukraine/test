<?php

// Create id attribute allowing for custom "anchor" value.
$id = 'block-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

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
$image = get_field('image') ?: 295;
$background_color = get_field('background_color');
$text_color = get_field('text_color');

?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
  <blockquote class="block-blockquote">
    <p class="block-text"><?php echo $text; ?></p>
    <p class="block-author"><?php echo $author; ?></p>
    <p class="block-role"><?php echo $role; ?></p>
  </blockquote>
  <div class="block-image">
    <?php echo wp_get_attachment_image( $image, 'full' ); ?>
  </div>
  <style type="text/css">
  #<?php echo $id;

  ?> {
    background: <?php echo $background_color;
    ?>;
    color: <?php echo $text_color;
    ?>;
  }
  </style>
</div>