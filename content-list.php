
<h2 class="cur-title">
    <a title="<?php single_cat_title(); ?>">
    <?php single_cat_title(); ?>
    </a>
</h2> 
<ul class="postlist">
    <?php foreach( $posts as $post ) : setup_postdata( $post ); ?>
        <li>
            <a href="<?php the_permalink() ?>" title="?php the_title(); ?>"><?php the_title(); ?></a>
            <span><?php the_time('Y-m-d') ?></span> 
        </li>
   <?php endforeach;?>

</ul> 

<div class="wpagenavi">
    <?php par_pagenavi(''); ?>
</div>