<div id='footer'>
				<h1>This is the footer</h1>
			</div>
		</div>

		<?php wp_footer(); ?>

		<script src="<?php bloginfo('template_directory'); ?>/js/foundation.min.js"></script>
		<script src="<?php bloginfo('template_directory'); ?>/js/script.js"></script>
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