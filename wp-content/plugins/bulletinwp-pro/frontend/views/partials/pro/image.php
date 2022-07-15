<?php

$add_image = ( isset( $bulletin['add_image'] ) && $bulletin['add_image'] ) ? $bulletin['add_image'] : '';

$image_position_adjustment = ( $placement == 'top' ) ? 'top:-32px;' : 'bottom:-32px;';

if ( $add_image ) :
    $image_src = wp_get_attachment_image_src( $bulletin['image_attachment_id'], 'full' )[0];
    $image_max_width = ( isset( $bulletin['image_max_width'] ) && $bulletin['image_max_width'] ) ? $bulletin['image_max_width'] : '225';

  if ( ! empty( $image_src ) ) : ?>
    <div 
        style="width:<?php echo $image_max_width + 20  ?>px;"
        class="<?php echo "{$plugin_slug}-bulletin-image-wrapper" ?>">

        <img 
            class="<?php echo "{$plugin_slug}-bulletin-image" ?>"
            style="max-width:<?php echo $image_max_width ?>px;position:absolute;<?php echo $image_position_adjustment ?>"
            src="<?php echo $image_src; ?>" />

    </div>
  <?php endif;
endif; // $add_image