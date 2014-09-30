<?php
/**
 * The template for displaying search forms in Shape
 *
 * @package softvictoria
 * @since soft 1.0
 */
?>
<form action="<?php echo esc_url( home_url( '/' ) ); ?>" id="searchform" method="get" role="search" class="the-search-form">
  <input type="text" name="s" value="<?php echo esc_attr( get_search_query() ); ?>" id="s" class="searchinput" placeholder="<?php esc_attr_e( '¿Qué estás buscando?', 'softvictoria' ); ?>"/>
  <input type="submit" class="button submit" name="submit" id="search_submit" value="Encontrar" />
</form>
