<?php
/*
Template Name: Tarifs
*/
?>

<?php
    if(have_posts()):
        wp_reset_postdata();
?>
    <div class="call-to-show">
        <h1 class="title-section text-center uppercase"><?php the_title(); ?></h1>
    </div>
    <div class="container content-section">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 col-sm-12 text-center explains">
<?php
        $readme = get_post_meta($post->ID, "Readme", true);
?>
                <p><?php echo $readme; ?></p>
            </div>
<?php
        $categories=get_categories();
        if ($categories):
            foreach($categories as $category):
                if ($category->count > 0 && $category->cat_ID != 1 && $category->cat_ID != 4):
                    $args = array(
                        'posts_per_page' => -1,
                        'post_type' => 'price',
                        'orderby' => 'custom-fields',
                        'order' => 'ASC',
                        'cat' => $category->cat_ID
                    );
                    query_posts($args);
?>
            <div class="col-lg-12">
                <h2 class="uppercase subtitle text-center"><?php echo $category->name; ?></h2>
            </div>
<?php
                    while(have_posts()):
                        the_post();
                        if(in_category(2)):
?>
            <div class="col-lg-10">
<?php
                            the_content();
?>               
            </div>
<?php                       
                        else:
?>
            <div class="col-lg-2 col-md-4 col-sm-12">
<?php
                            $bestPrice=false;
                            if(in_category(4)) $bestPrice=true;
?>
                <div class="pricing-table text-center <?php if($bestPrice) echo 'best-price'; ?>">
                    <div class="header">
                        <span><?php the_title(); ?></span>
                    </div>
                    <div class="content-pricing-table">
                        <div class="price">
<?php
                                $packPrice = get_post_meta($post->ID, 'Price', true);
?>
                            <span><?php echo $packPrice; ?></span>
                        </div>
<?php 
                        the_content();
?>
                    </div>
                    <div class="reserve">
<?php
                            $reserveLink = get_post_meta($post->ID, "ReserveLink", true);
                            $reserveBtn = get_post_meta($post->ID, "ReserveBtn", true);

                            if($reserveLink):
?>
                                <a target="_blank" href="<?php echo $reserveLink; ?>" class="btn btn-primary"><?php echo $reserveBtn; ?></a>
<?php
                            else:
?>
                                <button type="button" class="btn btn-primary"><?php echo $reserveBtn; ?></button>
<?php
                            endif;
?>
                    </div>
                </div>
            </div>
<?php
                        endif;
                    endwhile;
                endif;
            endforeach;
        endif;
?>
        </div>
    </div>
<?php
    endif;
?>

<!-- MODAL
====================== -->
<div class="modal fade" id="modal-reserve" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        <?php
            $shortcode = '[contact-form-7 id="179" title="reservePack"]';
            echo do_shortcode($shortcode);
            ?>
      </div>
    </div>
  </div>
</div> 