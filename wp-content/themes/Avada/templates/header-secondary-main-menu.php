<?php
/**
 * Template for the secondary menu in header.
 *
 * @author     ThemeFusion
 * @copyright  (c) Copyright by ThemeFusion
 * @link       http://theme-fusion.com
 * @package    Avada
 * @subpackage Core
 */

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}
?>
	<div class="fusion-secondary-main-menu">
		<div class="fusion-row">
			<?php avada_main_menu(); ?>
			<?php if ( 'v4' == Avada()->settings->get( 'header_layout' ) ) : ?>
				<?php $header_content_3 = Avada()->settings->get( 'header_v4_content' ); ?>
				<?php if ( 'Tagline And Search' == $header_content_3 ) : ?>
					<div class="fusion-secondary-menu-search"><?php echo get_search_form( false ); ?></div>
				<?php elseif ( 'Search' == $header_content_3 ) : ?>
					<div class="fusion-secondary-menu-search"><?php echo get_search_form( false ); ?></div>
				<?php endif; ?>
			<?php endif; ?>
		</div>
	</div>
</div> <!-- end fusion sticky header wrapper -->
