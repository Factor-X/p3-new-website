<?php
/*
Template Name: Tarifs
*/
?>

<?php
    if(have_posts()):
        wp_reset_postdata();
?>
    <div class="call-to-show txtcenter">
        <h1 class="title-section"><?php the_title(); ?></h1>
    </div>
    <div class="container content-section">
        <div class="w66 medium-w80 small-w100 tiny-w100 txtcenter center explains">
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
            <div class="w100 txtcenter">
                <h2 class="uppercase subtitle"><?php echo $category->name; ?></h2>
            </div>
            <div class="grid-6-medium-3-small-2-tiny-1">
<?php
                    while(have_posts()):
                        the_post();
                        if(in_category(2)):
?>
                <div class="w80">
<?php
                            the_content();
?>               
                </div>
<?php                       
                        else:
                                $bestPrice=false;
                                if(in_category(4)) $bestPrice=true;
?>
                    <div class="pricing-table txtcenter <?php if($bestPrice) echo 'best-price'; ?>">
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
<?php
                        endif;
                    endwhile;
?>
            </div>
<?php
                endif;
            endforeach;
        endif;
?>
    </div>
<?php
    endif;
?>

<!-- MODAL
====================== -->
<div class="modal" id="modal-reserve" >
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header clearfix">
        <button type="button" class="close"><span>&times;</span></button>
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