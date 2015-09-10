
<?php get_header(); ?>

<?php get_sidebar('top'); ?>

<div class="inner container"> 
    <div class="column-fluid"> 
        <div class="content">
        <?php
            if(is_category()) :
            
            $cat = get_query_var('cat');
            $yourcat = get_category($cat);
            $cat_id = $yourcat->term_id;
            $cat_template = $yourcat->cat_template;
            
            if ( !empty($cat_id) ):
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                $args = array(
                    'cat'       => $cat_id,
                    'paged'     => $paged,
                    'orderby'   => 'date',
                    'order'     => 'DESC'
                );
                $posts = query_posts($args);
        ?>
        
            <?php get_template_part('content', 'image'); ?>
            
        <?php endif; wp_reset_postdata();?>
        <?php endif; ?>
        </div> 
    </div>

    <?php get_sidebar('left'); ?>
    <div class="clearfix"></div> 
</div>

<?php get_footer(); ?>