  <aside class="sidebar">
   <ul>
             
    <?php 
        if(is_category()){
            
            $cat = get_query_var('cat');
            $yourcat = get_category($cat);
            $cat_id = $yourcat->term_id;
            
            $cat_root = get_category_root($yourcat);
            $root_id = $cat_root->term_id;
            $root_name = $cat_root->name;
            
            $args = array(
            'show_option_all'       => '', //不列出分类链接
            'orderby'               => 'name', //按照分类名排序
            'order'                 => 'ASC', //升序排列
            'show_last_update'      => 0, //不显示分类中日志的最新时间戳
            'style'                 => 'list',//列表显示分类
            'show_count'            => 0, //不显示分类日志数量
            'hide_empty'            => 1, //不显示没有日志的分类
            'use_desc_for_title'    => 1, //显示分类描述
            'child_of'              => $root_id, //不限制子分类
            'current_category'      => $cat_id,
            'feed'                  => '', //不显示feed
            'feed_image'            => '', //不显示feed图片
            'exclude'               => '', //不显示该分类
            'hierarchical'          => true, //分层次显示父/子分类
            'title_li'              => '<h3>'.$root_name.'</h3>', //用“Categories”为当前分类列表的标题
            'echo'                  => 1, //显示(echos) 分类
            'depth'                 => 0 //不限制列表深度
            );
    
            wp_list_categories( $args ); 
        }
    ?>
    
    <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('widgetized-area')) : else : ?>
        <li>
            <p><strong>Widgetized Area</strong></p>
            <p>This panel is active and ready for you to add some widgets via the WP Admin</p>
        </li>

    <?php endif; ?>
       
    <li><h3>联系方式</h3>
     <div> 
      <a href="#"><img src="<?php bloginfo('template_url'); ?>/images/contact-us.jpg" width="228" alt="联系我们" title="联系我们" /></a> 
      <b style="font-size:14px;">全国服务热线：400 - 666 - 8888</b>
      <br /> 
      <strong>客户服务</strong>：010-88886666
      <br /> 
      <strong>技术支持</strong>：010-88886666 | 88887777
      <br /> 
      <strong>客服Q Q</strong>： 
      <a target="_blank" href="#" title="客服QQ:542143331">542143331</a>
      <br /> 
      <strong>电子邮箱</strong>： 
      <a target="_blank" href="mailto:Haber.He@qq.com">Haber.He@qq.com</a>
      <br /> 
     </div></li>
   </ul> 
  </aside>