  <aside class="sidebar">
   <ul>
          
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