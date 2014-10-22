	<div id='footer'>
		<div class="row">
			<div class="large-4 columns footer-logo">
				<img src="<?=bloginfo('template_directory'); ?>/img/logo/logo-victoria147-w.png" alt="Victoria 147">
			</div>
			<div class="large-4 columns footer-social">
				<div class="social-btm">
	      	<a href="https://www.facebook.com/pages/Victoria147/475358795836280" target="_blank" class="social-btn-footer fb-btn social-sprite-w"></a>
	      	<a href="https://twitter.com/V147_org" target="_blank" class="social-btn-footer tw-btn social-sprite-w"></a>
	      	<a href="http://instagram.com/victoria147org" target="_blank" class="social-btn-footer insta-btn social-sprite-w"></a>
	      	<a href="https://www.youtube.com/user/CanalV147" target="_blank" class="social-btn-footer yt-btn social-sprite-w"></a>
	      </div>
			</div>
			<div class="large-4 columns footer-copy">
				<a href="" class="footer-links">Aviso de Privacidad</a>
				<p><small>© Todos los Derechos Reservados</small></p>
			</div>
		</div>
</div>

<?php wp_footer();?>
		
		<script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		  ga('create', 'UA-55704630-1', 'auto');
		  ga('send', 'pageview');

		</script>

		<script src="<?php bloginfo('template_directory'); ?>/js/foundation.min.js"></script>
		<script src="<?php bloginfo('template_directory'); ?>/js/pages-script.js"></script>
		<script src="<?php bloginfo('template_directory'); ?>/js/foundation/foundation.orbit.js"></script>
    <script>
      $(document).foundation({
      	orbit: {
			    animation: 'slide',
			    timer_speed: 1000,
			    pause_on_hover: true,
			    animation_speed: 500,
			    navigation_arrows: true,
			    bullets: true,
			    slide_number: false,
			    next_class: 'orbit-next',
			    prev_class: 'orbit-prev',
			    next_on_click: true,
			    bullets_active_class: 'active'
			  }
      });

			$(document).ready(function(){
				
				var data = function(param)
				{
					console.log("param is:  ", param);
				}
				
			});
    </script>
	</body>
</html>
