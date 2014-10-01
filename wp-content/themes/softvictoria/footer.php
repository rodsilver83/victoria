	<div id='footer'>
		<div class="row">
			<div class="large-4 columns footer-logo">
				<img src="<?=bloginfo('template_directory'); ?>/img/victoria147-logo-sm.png" alt="Victoria 147">
			</div>
			<div class="large-4 columns">

			</div>
			<div class="large-4 columns footer-copy">
				<a href="" class="footer-links">Aviso de Privacidad</a>
				<p><small>© Todos los Derechos Reservados</small></p>
			</div>
		</div>
</div>

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