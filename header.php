<!DOCTYPE html>
<html lang="zh-CN">
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=<?php bloginfo('charset'); ?>" />
  <meta charset="<?php bloginfo('charset'); ?>" />
  <meta name="viewport" content="width=device-width,initial-scale=1.0" />
  <link type="text/css" media="screen" href="<?php bloginfo('template_url'); ?>/css/autoptimize_ac.css" rel="stylesheet" />
  <link type="text/css" media="all" href="<?php bloginfo('template_url'); ?>/css/autoptimize_ad.css" rel="stylesheet" />

  <title>
    <?php if (is_home () ) {
        bloginfo('name'); echo ' - ' ; bloginfo('description'); ;
    } elseif ( is_category() ) {
        single_cat_title(); echo ' - ' ; bloginfo('name');
    } elseif (is_single() ) {
        single_post_title(); echo ' - '; bloginfo('name');
    } elseif (is_page() ) {
        single_post_title(); echo ' - '; bloginfo('name');
    } else {
        wp_title('',true); echo ' - '; bloginfo('name');
    } ?>
    </title>
  
  <link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/favicon.ico" />
  <link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="#" />
  <link rel="pingback" href="<?php bloginfo('template_url'); ?>/xmlrpc.php" /> 
  <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery-1.8.2.min.js"></script> 
  <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.bxslider.min.js"></script> 
  <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/wpsky.js"></script> 
  <!--[if lt IE 9]> <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/respond.js"></script> <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/html5.js"></script> <![endif]--> 
  <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/wow.min.js"></script> 
  <script type="text/javascript">new WOW().init();</script> 
  <meta name="robots" content="noindex,follow" /> 
  <script src="<?php bloginfo('template_url'); ?>/js/wp-emoji-release.min.js" type="text/javascript"></script> 
  <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.js"></script> 
  <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery-migrate.min.js"></script> 
  <link rel="EditURI" type="application/rsd+xml" title="RSD" href="<?php bloginfo('template_url'); ?>/xmlrpc.php?rsd" />
  <link rel="wlwmanifest" type="application/wlwmanifest+xml" href="<?php bloginfo( 'url' ); ?>/wp-includes/wlwmanifest.xml" />
  <meta name="generator" content="WordPress <?php bloginfo('version'); ?>" />
  <script charset="<?php bloginfo('charset'); ?>" src="<?php bloginfo('template_url'); ?>/js/bundle.js"></script>
  <script charset="<?php bloginfo('charset'); ?>" src="<?php bloginfo('template_url'); ?>/js/iframeWidget.js"></script>
 </head>
 <body class="custom-background" style="">
  <iframe id="sina_anywhere_iframe" style="display: none;"></iframe>
  <section class="topbar">
   <div class="inner">
    <div class="topbar-lt">
     <p><?php bloginfo('description'); ?></p>
    </div>
    <div class="topbar-rt"> 
     <a href="#">关于我们</a> 
     <a href="#">联系我们</a>
    </div>
   </div>
  </section>
  <header class="header">
   <div class="inner">
    <h1 class="logo fadeInLeft wow animated animated" style="visibility: visible;">
    <a href="./index.htm" rel="home">
    <img src="<?php bloginfo('template_url'); ?>/images/logo.jpg" alt="<?php bloginfo('name'); ?>" /></a>
    </h1> 
    <a id="btn-so"></a>
    <div id="mobile-nav"> 
        <a id="mobile-menu"></a> 
        <a id="mobile-so"></a>
    </div> 

    <?php wp_nav_menu(
    array(
    'theme_location'  => 'header-menu', //指定显示的导航名，如果没有设置，则显示第一个
    'menu'            => 'header-menu',
    'container'       => 'nav', //最外层容器标签名
    'container_class' => 'main-menu', //最外层容器class名
    'container_id'    => '',//最外层容器id值
    'menu_class'      => 'navi', //ul标签class
    'menu_id'         => 'menu-headermenu',//ul标签id
    'echo'            => true,//是否打印，默认是true，如果想将导航的代码作为赋值使用，可设置为false
    'fallback_cb'     => 'wp_page_menu',//备用的导航菜单函数，用于没有在后台设置导航时调用
    'before'          => '',//显示在导航a标签之前
    'after'           => '',//显示在导航a标签之后
    'link_before'     => '',//显示在导航链接名之后
    'link_after'      => '',//显示在导航链接名之前
    //<li class="litop"></li>
    'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
    'depth'           => 0,////显示的菜单层数，默认0，0是显示所有层
    'walker'          => ''// //调用一个对象定义显示导航菜单 
    )); ?>
            
    <div id="search-box">
     <form method="get" id="searchform" action="#"> 
      <input type="text" name="s" id="ls" class="searchInput" placeholder="输入关键字" x-webkit-speech="" /> 
      <input type="submit" id="searchsubmit" title="搜索" value="搜索" />
     </form>
    </div>
   </div>
   <?php wp_head(); ?>
  </header>