<?php
$content_arr = [
  [
    'icon'    => 'knowledge',
    'link'    => 'https://www.bulletin.rocks/docs/installation/',
    'content' => __( 'View plugin docs & FAQs', BULLETINWP_PLUGIN_SLUG ),
  ],
  [
    'icon'    => 'growth-bars',
    'link'    => 'mailto:info@rocksoliddigital.com?subject=I%20have%20a%20recommendation%20to%20improve%20Bulletin',
    'content' => __( 'Suggest a feature for our future development', BULLETINWP_PLUGIN_SLUG ),
  ],
  [
    'icon'    => 'influencer-star',
    'link'    => 'https://wordpress.org/support/plugin/bulletin-announcements/reviews/?filter=5#postform',
    'content' => __( 'Like this plugin? Please give us a 5 star review!', BULLETINWP_PLUGIN_SLUG ),
  ],
];

// Images directory
$images_dir    = BULLETINWP_PLUGIN_PATH . 'admin/images/';
$whats_new_arr = BULLETINWP::instance()->helpers->get_data_from_url( 'https://www.bulletin.rocks/whats-new.json' );
?>

<div class="right-content-panel-wrapper">
  <p class="text-base font-bold mb-5"><?php _e( 'Explore more from Bulletin', BULLETINWP_PLUGIN_SLUG ) ?></p>

  <?php foreach ( $content_arr as $key => $content ) : ?>
    <?php
    $icon_file_path =  $images_dir . $content['icon'] . '.svg';
    $icon_content   = '';

    if ( file_exists( $icon_file_path ) ) {
      $icon_content = file_get_contents( $icon_file_path );
    }
    ?>

    <a href="<?php echo $content['link']; ?>" target="_blank" class="btn-text">
      <div class="flex flex-row mb-8 items-center">
        <div class="mr-4">
          <?php echo $icon_content; ?>
        </div>

        <div>
          <p class="text-base font-medium"><?php echo $content['content']; ?></p>
        </div>
      </div>
    </a>

  <?php endforeach; ?>

  <?php if ( ! empty( $whats_new_arr ) ) : ?>
    <?php foreach ( $whats_new_arr['whats_new'] as $data ) : ?>
      <div class="news-content">
        <div class="title font-bold">
          <?php echo $data['Title'] ?>
        </div>
        <div class="description">
          <?php echo $data['Description'] ?>
        </div>
      </div>
    <?php endforeach; ?>
  <?php endif; ?>
</div>
