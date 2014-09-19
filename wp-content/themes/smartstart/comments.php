<section id="comments">

	<?php if ( post_password_required() ): ?>

		<p class="nopassword"><?php _e( 'This post is password protected. Enter the password to view any comments.', 'ss_framework' ); ?></p>

</section><!-- #comments -->

	<?php return; endif; ?>

	<?php if ( have_comments() ): ?>

		<h2 id="comments-title">
			<?php printf( _n( 'Comentarios (%1$s)', 'Comentarios (%1$s)', get_comments_number(), 'ss_framework'), number_format_i18n( get_comments_number() ), '' . get_the_title() . '' ); ?>
		</h2>

		<ol class="commentlist">
			<?php wp_list_comments( array( 'callback' => 'ss_framework_comments' ) ); ?>
		</ol>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ): ?>
		
			<nav class="pagination comments-pagination">
				<?php paginate_comments_links(); ?>
			</nav>
			
		<?php endif; ?>

	<?php endif; ?>

	<?php if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ): ?>
	
		<p class="nocomments"><?php _e( 'Comentarios no permitidos.', 'ss_framework' ); ?></p>
		
	<?php endif; ?>

	<?php
	$fields =  array(
		'author' => '<p class="comment-form-author input-block">
						<label for="author"><strong>' . __( 'Nombre' ) . '</strong>' . ( $req ? ' (Requerido)' : '' ) . '</label>
						<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' />
		            </p>',
		'email'  => '<p class="comment-form-email input-block">
						<label for="email"><strong>' . __( 'Email' ) . '</strong>' . ( $req ? ' (Requerido)' : '' ) . '</label>
						<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' />
					</p>',
		'url'    => '<p class="comment-form-url input-block">
						<label for="url"><strong>' . __( 'Sitio Web' ) . '</strong></label>
						<input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" />
					</p>',
	);

	$defaults = array(
		'fields'               => $fields,
		'comment_field'        => '<p class="comment-form-comment">
									<label for="comment"><strong>' . _x( 'Tu Comentario', 'noun' ) . '</strong></label>
									<textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea>
								</p>', 
		'must_log_in'          => '<p class="must-log-in">' . sprintf( __( 'Debe iniciar sesión para publicar un comentario<a href="%s">logged in</a>.' ), wp_login_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ) . '</p>',
		'logged_in_as'         => '<p class="logged-in-as">' . sprintf( __( 'Conectado como <a href="%1$s">%2$s</a>. <a href="%3$s" title="Desconectarse de esta cuenta">Salir?</a>' ), admin_url( 'profile.php' ), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ) . '</p>',
		'comment_notes_after'  => '<p class="form-allowed-tags">' . sprintf( __( 'Puedes usar las siguientes etiquetas y atributos <abbr title="HyperText Markup Language">HTML</abbr>: %s' ), ' <code>' . allowed_tags() . '</code>' ) . '</p>',
		'id_form'              => 'commentform',
		'id_submit'            => 'submit',
		'title_reply'          => __( 'Deja tu comentario' ),
		'title_reply_to'       => __( 'Enviar un comentario para %s' ),
		'cancel_reply_link'    => __( 'Cancelar Comentario' ),
		'label_submit'         => __( 'Publicar Comentario' ),
	);
	comment_form($defaults); ?>

</section><!-- #comments -->