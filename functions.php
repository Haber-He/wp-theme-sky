<?php

    add_theme_support( 'nav-menus' );

    if(function_exists('register_nav_menus')){
        register_nav_menus( array( 
            'header-menu' => __( '导航自定义菜单' ), 
            'footer-menu' => __( '页脚自定义菜单' ), 
            'sider-menu' => __('侧边栏菜单') 
        ) ); 
    }
    
    if ( function_exists('register_sidebar') )
        register_sidebar(array(
            'name' => 'Widgetized Area',
            'id'   => 'widgetized-area',
            'description'   => 'This is a widgetized area.',
            'before_widget' => '<li id="%1$s" class="widget_%2$s">',
            'after_widget' => '</li>',
            'before_title' => '<h3>',
            'after_title' => '</h3>',
    ));

    /**
     * Get menu object
     * @param unknown_type $menu_loction
     * @return Ambigous <mixed, boolean, WP_Error, multitype:, multitype:Ambigous <string, NULL> >
     */
    function get_menu_object($menu_location = ''){
        $global = $menu_location.'_menu';
        global $$global;
        return $$global;
    }
    
    function get_parent_menu($sibling=true,$menu_location=''){
        $current_menu = $menu_location.'_current_menu';
        global $$current_menu;
        if ($$current_menu->menu_item_parent!='0'){
            $menus = get_menu_object($menu_location);
            if (empty($menus))
                return false;
            foreach ($menus as $item){
                if ($item->ID == $$current_menu->menu_item_parent){
                    return $item;
                    break;
                }
            }
        }
        $parent_menu = empty($item) && $sibling?$$current_menu:'';
        return apply_filters('get_parent_menu', $parent_menu);
    }

    /**
     * 获取当前菜单的子菜单
     * @param bool $sibling 如果当前菜单没有子菜单,则将同级菜单作为子菜单,默认false
     * @param unknown_type $menu_loction
     * @return boolean|Ambigous <multitype:unknown , unknown>
     */
    function get_children_menu($sibling=false,$menu_location=''){
        $current_menu = $menu_location.'_current_menu';
        global $$current_menu;
        $menus = get_menu_object($menu_location);
        if (empty($menus))
            return false;
        $children = array();
        $siblings = array();
        foreach ($menus as $item){
            if ($item->menu_item_parent == $$current_menu->ID){
                $children[] = $item;
            }
            if ($item->menu_item_parent == $$current_menu->menu_item_parent && $$current_menu->menu_item_parent!='0'){
                $siblings[] = $item;
            }
        }
        $children_list = empty($children) && $sibling ? $siblings : $children;
        return apply_filters('get_children_menu', $children_list);
    }
    
    function par_pagenavi($range){   
        if ( is_singular() ) return;  
        global $wp_query, $paged;  
        $max_page = $wp_query->max_num_pages;  
        if ( $max_page == 1 ) return;  
        if ( empty( $paged ) ) $paged = 1;
        
        global $paged, $wp_query;    
        if ( !$max_page ) {
            $max_page = $wp_query->max_num_pages;
        }    
        if($max_page > 1){
            if(!$paged){
                $paged = 1;
            }    
            if($paged != 1){
                echo "<a href='" . get_pagenum_link(1) . "' class='extend' title='跳转到首页'>|<</a>";
            }    
            previous_posts_link('<');
            if ( empty( $range ) ) $range = get_option('posts_per_page');
            if($max_page > $range){    
                if($paged < $range){
                    for($i = 1; $i <= ($range + 1); $i++){
                        echo "<a href='" . get_pagenum_link($i) ."'";    
                        if($i==$paged)echo " class='current'";echo ">$i</a>";
                    }
                }elseif($paged >= ($max_page - ceil(($range/2)))){    
                    for($i = $max_page - $range; $i <= $max_page; $i++){
                        echo "<a href='" . get_pagenum_link($i) ."'";    
                        if($i==$paged)echo " class='current'";echo ">$i</a>";
                    }
                }elseif($paged >= $range && $paged < ($max_page - ceil(($range/2)))){    
                    for($i = ($paged - ceil($range/2)); $i <= ($paged + ceil(($range/2))); $i++){
                        echo "<a href='" . get_pagenum_link($i) ."'";if($i==$paged) echo " class='current'";echo ">$i</a>";
                    }
                }
            } else{
                for($i = 1; $i <= $max_page; $i++){
                    echo "<a href='" . get_pagenum_link($i) ."'";    
                    if($i==$paged)echo " class='current'";echo ">$i</a>";
                }
            }
            next_posts_link('>');    
            if($paged != $max_page){
                echo "<a href='" . get_pagenum_link($max_page) . "' class='extend' title='跳转到最后一页'>>|</a>";
            }
        } 
    }
    
    function catch_the_image( $id ) {
        
        $first_img = "/images/wordpress.png";
               
        if ( empty($id) ){
            return $first_img;
        }
        
        $post_imags = get_post($id);

        // 如果设置了缩略图
        $post_thumbnail_id = get_post_thumbnail_id( $id );
        if ( $post_thumbnail_id ) {
            $output = wp_get_attachment_image_src( $post_thumbnail_id, 'large' );
            $first_img = $output[0];
        }else {
            ob_start();
            ob_end_clean();
            $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post_imags->post_content, $matches);
            $first_img = $matches [1] [0];
        }

        return $first_img;
    }
?>