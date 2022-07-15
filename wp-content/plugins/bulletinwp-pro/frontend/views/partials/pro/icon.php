<?php
$add_icon = ( isset( $bulletin['add_icon'] ) && $bulletin['add_icon'] ) ? $bulletin['add_icon'] : '';
$icon     = '';

if ( $add_icon === 'from-set' ) {
  $icon_name_from_set = ( isset( $bulletin['icon_name_from_set'] ) && ! empty( $bulletin['icon_name_from_set'] ) ) ? $bulletin['icon_name_from_set'] : '';
  $svg_file_path      = BULLETINWP_PLUGIN_PATH . 'frontend/images/icons/' . $icon_name_from_set . '.svg';

  if ( file_exists( $svg_file_path ) ) {
    $icon = file_get_contents( $svg_file_path );
  }
} elseif ( $add_icon === 'upload-own' ) {
  $image_src = wp_get_attachment_image_src( $bulletin['icon_attachment_id'], 'full' )[0];
  $icon      = '<img src="' . $image_src . '" alt="icon" width="24" height="24" />';
}
?>
<?php if ( ! empty( $icon ) ) : ?>
  <div class="<?php echo "{$plugin_slug}-icon-wrapper" ?>">
    <?php echo $icon; ?>
  </div>
<?php endif; ?>
