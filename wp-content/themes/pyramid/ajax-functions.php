<?php
/* Partner Directory */


function latestpartnerlist_fn_ajax( $atts ) 
{
    $noofposts = -1;

    $page = (int) (!isset($_REQUEST['page']) ? 1 :$_REQUEST['page']);

    $page = ($page == 0 ? 1 : $page);

    $recordsPerPage = $noofposts;

    $start = ($page-1) *$recordsPerPage;

    $adjacents = "1";


    if(!empty($_POST['country']) && !empty($_POST['partnertype']))
    {
        $found_posts = array(

            'post_type' => 'partner',

            'post_status'   => 'publish',

            'orderby' => 'date',

            'order'   => 'DESC',

            'posts_per_page' => $recordsPerPage,

            'paged' => $page,

            'tax_query' => array(

                array(

                    'taxonomy' => 'country',

                    'field'    => 'term_id',

                    'terms'    => array($_POST['country']),

                ),
                array(

                    'taxonomy' => 'partner_type',

                    'field'    => 'term_id',

                    'terms'    => array($_POST['partnertype']),

                ),

            ),

        );
    }
    else if(!empty($_POST['country']))
    {
        $found_posts = array(

            'post_type' => 'partner',

            'post_status'   => 'publish',

            'posts_per_page' => $recordsPerPage,

            'paged' => $page,

            'orderby' => 'date',

            'order'   => 'DESC',

            'tax_query' => array(

                array(

                    'taxonomy' => 'country',

                    'field'    => 'term_id',

                    'terms'    => array($_POST['country']),

                ),

            ),

        ); 
    }
    else if(!empty($_POST['partnertype']))
    {

        $found_posts = array(

            'post_type' => 'partner',

            'post_status'   => 'publish',

            'posts_per_page' => $recordsPerPage,

            'paged' => $page,

            'orderby' => 'date',

            'order'   => 'DESC',

            'tax_query' => array(

                array(

                    'taxonomy' => 'partner_type',

                    'field'    => 'term_id',

                    'terms'    => array($_POST['partnertype']),

                ),

            ),

        );

    }
    else
    {
        $found_posts = array(

            'post_type' => 'partner',

            'post_status'   => 'publish',

            'orderby' => 'date',

            'order'   => 'DESC',

            'posts_per_page' => $recordsPerPage,

            'paged' => $page,
                   
        );
    }
    $wp_query = new WP_Query($found_posts);
    $count = $wp_query->found_posts;
    if ($wp_query->have_posts())
	{ ?>
		<div class="row"><?php
			while ($wp_query->have_posts())
     	    { 
				$wp_query->the_post(); 
				$postid = get_the_ID();
				$blogimage = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID(), 'full'));  ?>
                <div class="col-md-6 col-lg-4">
                    <div class="product-row-block">
                        <div class="partner-logo"><?php
	                      	if($blogimage)
	                        { ?>
	                            <img src="<?php echo $blogimage; ?>"><?php
	                        } ?>
	                    </div>
                        <a href="<?php the_permalink(); ?>" class="learn-more">Learn more</a>
                    </div>
                </div><?php
            } wp_reset_query(); ?>
        </div>
        <!-- <div class="row">
            <div class="col-md-12 text-center">
                <div class="paginationCover ajax_pagination" id="ajax_pagination">
                    <?php include("template/ajax_pagination.php"); ?>
                 </div>
            </div>
        </div> --><?php
    }
    else 
    { ?>
        <div class="no-results not-found">
            <div class="page-header">
                <h1 class="page-title">Nothing Found</h1>
            </div>
        </div><?php
    } ?>
    <div class="new_loading">
    </div><?php
    die;
}

add_action( 'wp_ajax_partners', 'latestpartnerlist_fn_ajax' );

add_action( 'wp_ajax_nopriv_partners', 'latestpartnerlist_fn_ajax' );