<?php
 class WP_Customize_Nav_Menu_Locations_Control extends WP_Customize_Control { public $type = 'nav_menu_locations'; public function render_content() {} public function content_template() { if ( current_theme_supports( 'menus' ) ) : ?>
			<# var elementId; #>
			<ul class="menu-location-settings">
				<li class="customize-control assigned-menu-locations-title">
					<span class="customize-control-title">{{ wp.customize.Menus.data.l10n.locationsTitle }}</span>
					<# if ( data.isCreating ) { #>
						<p>
							<?php echo _x( 'Where do you want this menu to appear?', 'menu locations' ); ?>
							<?php
 printf( _x( '(If you plan to use a menu <a href="%1$s" %2$s>widget%3$s</a>, skip this step.)', 'menu locations' ), __( 'https://wordpress.org/support/article/wordpress-widgets/' ), ' class="external-link" target="_blank"', sprintf( '<span class="screen-reader-text"> %s</span>', __( '(opens in a new tab)' ) ) ); ?>
						</p>
					<# } else { #>
						<p><?php echo _x( 'Here&#8217;s where this menu appears. If you would like to change that, pick another location.', 'menu locations' ); ?></p>
					<# } #>
				</li>

				<?php foreach ( get_registered_nav_menus() as $location => $description ) : ?>
					<# elementId = _.uniqueId( 'customize-nav-menu-control-location-' ); #>
					<li class="customize-control customize-control-checkbox assigned-menu-location">
						<span class="customize-inside-control-row">
							<input id="{{ elementId }}" type="checkbox" data-menu-id="{{ data.menu_id }}" data-location-id="<?php echo esc_attr( $location ); ?>" class="menu-location" />
							<label for="{{ elementId }}">
								<?php echo $description; ?>
								<span class="theme-location-set">
									<?php
 printf( _x( '(Current: %s)', 'menu location' ), '<span class="current-menu-location-name-' . esc_attr( $location ) . '"></span>' ); ?>
								</span>
							</label>
						</span>
					</li>
				<?php endforeach; ?>
			</ul>
			<?php
 endif; } } 