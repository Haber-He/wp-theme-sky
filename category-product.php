
<?php get_header(); ?>

<?php get_sidebar('top'); ?>

<div class="inner container"> 
    <div class="column-fluid"> 
        <div class="content">
            <?php if(is_category()) : ?>
            <?php
                $cat = get_query_var('cat');
                $yourcat = get_category($cat);
                $cat_id = $yourcat->term_id;
                $cat_name = $yourcat->name;
                $cat_links = get_category_link($cat_id);
                $limit = get_option('posts_per_page');
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                $args = array(
                    'cat'       => $cat_id,
                    'paged'     => $paged,
                    'orderby'   => 'date',
                    'order'     => 'DESC'
                );
                $posts = query_posts($args);
            ?>
            <?php if( $posts ) : ?>
                <h2 class="cur-title">
                    <a id="<?php echo $cat_id; ?>" href="<?php echo $cat_links; ?>" title="<?php echo $cat_name; ?>">
                    <?php echo $cat_name; ?>
                    </a>
                </h2> 
                <ul class="piclist">
                    <?php 
                    foreach( $posts as $post ) : setup_postdata( $post );
                    ?>
                        <li> 
                            <a href="<?php the_permalink() ?>">
                                <div class="folio-thumb">
                                    <div class="mediaholder">
                                        <img src="<?php echo catch_the_image($post->ID); ?>" alt="<?php the_title(); ?>" class="thumb" style="width: 287px; height: 200.89999999999998px;">
                                    </div>
                                    <div class="opacity-pic">
                                    </div>
                                </div>
                                <h3><?php the_title(); ?></h3>
                            </a>
                        </li>
                   <?php endforeach; ?>
                   
                </ul> 
                <div class="clearfix"></div>
                
                <div class="wpagenavi">
                    <?php par_pagenavi($limit); ?>
                </div>
            <?php endif; wp_reset_postdata();?>
                
            <?php endif; ?>
        </div> 
    </div> 

    <?php get_sidebar('left'); ?>
    <div class="clearfix"></div> 
</div>

<?php get_footer(); ?>