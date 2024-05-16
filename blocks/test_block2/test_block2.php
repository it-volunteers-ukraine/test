<?php

// Create id attribute allowing for custom "anchor" value.
$id = 'block-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'block2';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and handle defaults.
$text = get_field('description') ?: 'Your testimonial here...';
$image = get_field('block2_photo');
$background_color = get_field('background_color');
$text_color = get_field('text_color');

?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
  <div class="block2-photo">
    <?php echo wp_get_attachment_image( $image, 'medium' ); ?>
  </div>
  <p class="block2-text"><?php echo $text; ?></p>
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