<div class="<?php echo "{$plugin_slug}-bulletin-close-button" ?>"
     data-cookie-expiry="<?php echo $bulletin['cookie_expiry'] ?>"
>
  <div class="<?php echo "{$plugin_slug}-close-button" ?>"></div>
</div>

<?php if ( ! empty( $font_color ) ) : ?>
  <style>
    <?php echo "#{$plugin_slug}-bulletin-item-{$bulletin['id']} .{$plugin_slug}-bulletin-close-button .{$plugin_slug}-close-button::before" ?>,
    <?php echo "#{$plugin_slug}-bulletin-item-{$bulletin['id']} .{$plugin_slug}-bulletin-close-button .{$plugin_slug}-close-button::after" ?> {
      background-color: <?php echo $font_color ?>;
    }
  </style>
<?php endif; ?>
