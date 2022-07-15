<?php

// Images directory
$images_dir = plugin_dir_url( BULLETINWP__FILE__ ) . 'admin/images';

?>

<div id="<?php echo BULLETINWP_PLUGIN_SLUG ?>-admin">
  <div class="<?php echo BULLETINWP_PLUGIN_SLUG ?>-admin-add-new wrap">
    <h1 class="wp-heading-inline"><?php _e( 'Add new bulletin', BULLETINWP_PLUGIN_SLUG ) ?></h1>

    <hr class="wp-header-end">

    <div class="<?php echo BULLETINWP_PLUGIN_SLUG ?>-admin-common-layout">
      <form class="bulletin-form" method="post">
        <div class="common-layout-wrapper add-new">
          <?php include_once( BULLETINWP_PLUGIN_PATH . 'admin/views/common/bulletin-form.php' ); ?>
        </div>
      </form>
    </div>
  </div>
</div>
