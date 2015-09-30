<?php
	if(have_posts()){
		wp_reset_postdata();
        //show prices from 'working desk' category 
		query_posts('posts_per_page=-1&post_type=price&orderby=custom-fields&order=ASC&cat=5');
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
                $post = $wp_query->post;
                if ( in_category(5) ):
                $catName = get_the_category();
                $catName = $catName[0]->cat_name;
?>
                <div class="col-lg-12">
                    <h2 class="uppercase subtitle text-center"><?php echo $catName; ?></h2>
                </div>
<?php       
            endif;
		while(have_posts()){
			the_post();
			?>
            <div class="col-lg-2 col-md-4 col-sm-12">
                <?php
                    if( in_category('Meilleur prix') ) $bestPrice=true;
                    else $bestPrice=false;
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
                        <?php the_content(); ?>
                   
                    </div>
                    <div class="reserve">
                        <?php
                            $reserveLink = get_post_meta($post->ID, "ReserveLink", true);
                            $reserveBtn = get_post_meta($post->ID, "ReserveBtn", true);
                        ?>
                        <button type="button" class="btn btn-lg btn-primary" data-toggle="modal" data-target="#modal-reserve">
                            <?php echo $reserveBtn; ?>
                        </button>
                    </div>
                </div>
            </div>
			<?php
		}
	}
        if(have_posts()){
            wp_reset_postdata();
            //show prices from 'meeting room' category 
            query_posts('posts_per_page=-1&post_type=price&orderby=custom-fields&order=ASC&cat=6');
            $post = $wp_query->post;
            if ( in_category(6) ):
                $catName = get_the_category();
                $catName = $catName[0]->cat_name;
?>
                <div class="col-lg-12">
                    <h2 class="uppercase subtitle text-center"><?php echo $catName; ?></h2>
                </div>
<?php       
            endif;
            $cpt=0;
            while(have_posts()){
                the_post();
                if ($cpt == 0) {
                    $klass = 'prefix-20 tablet-prefix-0 mobile-prefix-0';
                } else {
                    $klass='';
                }
                    $cpt=1;
?>
                    <div class="col-lg-2 col-md-4 col-sm-12 <?php echo $klass; ?>">
                        <?php
                            if( in_category('Meilleur prix') ) $bestPrice=true;
                            else $bestPrice=false;
                        ?>
                        <div class="pricing-table text-center <?php if($bestPrice==true) echo 'best-price'; ?>">
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
                                <?php the_content(); ?>

                            </div>
                            <div class="reserve">
                                <?php
                                    $reserveLink = get_post_meta($post->ID, "ReserveLink", true);
                                    $reserveBtn = get_post_meta($post->ID, "ReserveBtn", true);
                                ?>
                                <a href="<?php echo $reserveLink ?>" class="btn btn-lg btn-primary"><?php echo $reserveBtn; ?></a>
                            </div>
                        </div>
                    </div>
<?php
            }
?>
        

<?php
        }
        if(have_posts()){
            wp_reset_postdata();
            //show prices from 'additional services' category 
            query_posts('posts_per_page=-1&post_type=price&orderby=custom-fields&order=ASC&cat=23');
            $post = $wp_query->post;
            if ( in_category(23) ):
                $catName = get_the_category();
                $catName = $catName[0]->cat_name;
?>
                <div class="col-lg-12">
                    <h2 class="uppercase subtitle text-center"><?php echo $catName; ?></h2>
                </div>
<?php
            endif;
            while (have_posts()) {
                the_post();
?>
                <div class="col-lg-10">
<?php
                    the_content();
?>
                </div>
<?php
            }
        }
        ?>
    </div>
</div>

<div class="modal fade" id="modal-reserve" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        <?php
            $shortcode = '[contact-form-7 id="201" title="reservePack"]';
            echo do_shortcode($shortcode);
            ?>
      </div>
    </div>
  </div>
</div>