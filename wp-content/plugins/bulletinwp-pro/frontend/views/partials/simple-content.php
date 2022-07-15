<div class="<?php echo "{$plugin_slug}-bulletin-content-wrapper" ?>" style="text-align: <?php echo ( $placement === 'corner' ) ? 'left' : $text_align ?>;">
  <?php if ( ! empty( $content ) ) : ?>
    <div class="<?php echo "{$plugin_slug}-bulletin-content {$plugin_slug}-bulletin-content-main" ?>">
      <?php echo $content ?>
    </div>
  <?php endif; ?>

  <?php if ( ! empty( $mobile_content ) ) : ?>
    <div class="<?php echo "{$plugin_slug}-bulletin-mobile-content {$plugin_slug}-bulletin-mobile-content-main" ?>">
      <?php echo $mobile_content ?>
    </div>
  <?php endif; ?>
</div>
