	<div id='footer'>
		<div class="row">
			<div class="large-4 columns footer-logo">
				<img src="<?=bloginfo('template_directory'); ?>/img/victoria147-logo-sm.png" alt="Victoria 147">
			</div>
			<div class="large-4 columns footer-social">
				<div class="social-btm">
	      	<a href="https://www.facebook.com/pages/Victoria147/475358795836280" target="_blank" class="social-btn fb-btn social-sprite-w"></a>
	      	<a href="https://twitter.com/V147_org" target="_blank" class="social-btn tw-btn social-sprite-w"></a>
	      	<a href="http://instagram.com/victoria147org" target="_blank" class="social-btn insta-btn social-sprite-w"></a>
	      	<a href="https://www.youtube.com/user/CanalV147" target="_blank" class="social-btn yt-btn social-sprite-w"></a>
	      </div>
			</div>
			<div class="large-4 columns footer-copy">
				<a href="" class="footer-links">Aviso de Privacidad</a>
				<p><small>© Todos los Derechos Reservados</small></p>
			</div>
		</div>
</div>

		<?php wp_footer(); ?>

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
    </script>
	</body>
</html>