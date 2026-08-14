<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<div class="mx-main-page-text-wrap">

	<?php mxmtzc_include_view( 'components/hire-developer' ); ?>
	<?php mxmtzc_include_view( 'components/olena-theme' ); ?>
	<?php mxmtzc_include_view( 'components/how-does-it-works' ); ?>

	<!-- display clock -->
	<div class="mxmlb_mx-block_wrap">

		<h3><?php echo esc_html__('How to display the clock', 'mx-time-zone-clock'); ?></h3>

		<p>
			<?php echo esc_html__('Choose a way to display the clock', 'mx-time-zone-clock'); ?>
		</p>

		<p>
			<?php echo esc_html__('By default', 'mx-time-zone-clock'); ?> - <b>Clock with arrows</b>
		</p>

		<p class="mxmtzc_display_clock_wrap">

			<input type="radio" id="mxmtzc_display_clock2" value="arrow" name="mxmtzc_display_clock" checked="checked" />
			<label for="mxmtzc_display_clock2"><?php echo esc_html__('Clock with arrows', 'mx-time-zone-clock'); ?></label>

		</p>

		<p class="mxmtzc_display_clock_wrap">

			<input type="radio" id="mxmtzc_display_clock1" value="digital" name="mxmtzc_display_clock" />
			<label for="mxmtzc_display_clock1"><?php echo esc_html__('Digital clock', 'mx-time-zone-clock'); ?></label>

		</p>

	</div>

	<div class="mxmlb_mx-block_wrap mx-clock-apperiance_box">

		<?php

		$mxmtzc_array_of_clock_disign = array('clock-face30.png', 'clock-face29.png', 'clock-face28.png', 'clock-face27.png', 'clock-face26.png', 'clock-face1.png', 'clock-face2.png', 'clock-face4.png', 'clock-face5.png', 'clock-face6.png', 'clock-face7.png', 'clock-face8.jpg', 'clock-face9.jpg', 'clock-face10.png', 'clock-face11.png', 'clock-face12.png', 'clock-face13.jpg', 'clock-face14.jpg', 'clock-face15.jpg', 'clock-face17.jpg', 'clock-face18.png', 'clock-face19.png', 'clock-face20.jpg', 'clock-face21.png', 'clock-face22.jpg', 'clock-face23.png', 'clock-face24.png', 'clock-face25.png');

		?>

		<h3><?php echo esc_html__('Available design of clock', 'mx-time-zone-clock'); ?></h3>

		<p><?php echo esc_html__('You should click on the clock, the design you like.', 'mx-time-zone-clock'); ?></p>

		<p>
			<?php echo esc_html__('By default', 'mx-time-zone-clock'); ?> - <b>the first clock</b>
		</p>

		<div class="mx-time-zone-design-list">

			<?php foreach ($mxmtzc_array_of_clock_disign as $mxmtzc_key => $mxmtzc_value) : ?>

				<div class="mx-time-zone-design-item">
					<img src="<?php echo esc_url( MXMTZC_PLUGIN_URL ); ?>includes/admin/assets/img/<?php echo esc_attr( $mxmtzc_value ); ?>" data-image-src="<?php echo esc_attr( $mxmtzc_value ); ?>" alt="">
				</div>

			<?php endforeach; ?>

		</div>

	</div>

	<!-- upload clock -->
	<div class="mxmlb_mx-block_wrap">

		<h3><?php echo esc_html__('Upload clock', 'mx-time-zone-clock'); ?></h3>

		<h4><?php echo esc_html__('The recommended size of image is 120x120px.', 'mx-time-zone-clock'); ?></h4>

		<!-- image upload -->
		<div class="mx-image-uploader">

			<?php

			$mxmtzc_image_url = '';

			?>

			<button class="mxmtzc_upload_image" <?php echo $mxmtzc_image_url ? 'style="display: none;"' : ''; ?>>Choose image</button>

			<!-- here we will save an id of image -->
			<input name="mxmtzc_clock_upload" id="mxmtzc_clock_upload" type="hidden" class="mxmtzc_upload_image_save" value="" />

			<!-- show an image -->
			<img src="<?php echo $mxmtzc_image_url ? esc_url( $mxmtzc_image_url ) : ''; ?>" style="width: 120px;" alt="" class="mxmtzc_upload_image_show" <?php echo $mxmtzc_image_url ? '' : 'style="display: none;"'; ?> />

			<!-- remove image -->
			<a href="#" class="mxmtzc_upload_image_remove" <?php echo !$mxmtzc_image_url ? 'style="display: none;"' : ''; ?>>Remove Image</a>

		</div>

		<h4><?php echo esc_html__('How can I resize an image?', 'mx-time-zone-clock'); ?></h4>

		<div class="mxmtzc_upload_clock_resize">
			<a href="<?php echo esc_url( MXMTZC_PLUGIN_URL ); ?>includes/admin/assets/img/resize-1.jpg" target="_blank"><img src="<?php echo esc_url( MXMTZC_PLUGIN_URL ); ?>includes/admin/assets/img/resize-1.jpg" alt=""></a>
			<a href="<?php echo esc_url( MXMTZC_PLUGIN_URL ); ?>includes/admin/assets/img/resize-2.jpg" target="_blank"><img src="<?php echo esc_url( MXMTZC_PLUGIN_URL ); ?>includes/admin/assets/img/resize-2.jpg" alt=""></a>
		</div>

	</div>

	<!-- time zone -->
	<div class="mxmlb_mx-block_wrap">

		<h3><?php echo esc_html__('Set Time Zone', 'mx-time-zone-clock'); ?></h3>

		<p>
			<?php echo esc_html__('Here you can find all time zones:', 'mx-time-zone-clock'); ?>
			<a href="https://timezonedb.com/time-zones" target="_blank">timezonedb.com/</a>
		</p>

		<p>
			<?php echo esc_html__('If you want set time zone, fill it below.', 'mx-time-zone-clock'); ?>
		</p>

		<p>
			<?php echo esc_html__('By default', 'mx-time-zone-clock'); ?> - <b>Australia/Sydney</b>
		</p>

		<p>
			<input type="text" id="mxmtzc_time_zone_name" placeholder="<?php echo esc_html__('Australia/Sydney', 'mx-time-zone-clock'); ?>" />
		</p>

	</div>

	<!-- city name -->
	<div class="mxmlb_mx-block_wrap">

		<h3><?php echo esc_html__('Set name of city', 'mx-time-zone-clock'); ?></h3>

		<p>
			<?php echo esc_html__('If you want set name of the city, fill it below.', 'mx-time-zone-clock'); ?>
		</p>

		<p>
			<?php echo esc_html__('By default', 'mx-time-zone-clock'); ?> - <b>Wilton</b>
		</p>

		<p>
			<input type="text" id="mxmtzc_city_name" placeholder="<?php echo esc_html__('Wilton', 'mx-time-zone-clock'); ?>" />
		</p>

	</div>

	<!-- format of date -->
	<div class="mxmlb_mx-block_wrap">

		<h3><?php echo esc_html__('Set the time format', 'mx-time-zone-clock'); ?></h3>

		<p>
			<?php echo esc_html__('Select one option', 'mx-time-zone-clock'); ?>
		</p>

		<p>
			<?php echo esc_html__('By default', 'mx-time-zone-clock'); ?> - <b>12</b>
		</p>

		<p class="mxmtzc_time_format_wrap">

			<input type="radio" id="mxmtzc_time_format1" value="12" name="mxmtzc_time_format" checked="checked" />
			<label for="mxmtzc_time_format1"><?php echo esc_html__('12-Hour Time Format', 'mx-time-zone-clock'); ?></label>

		</p>

		<p class="mxmtzc_time_format_wrap">

			<input type="radio" id="mxmtzc_time_format2" value="24" name="mxmtzc_time_format" />
			<label for="mxmtzc_time_format2"><?php echo esc_html__('24-Hour Time Format', 'mx-time-zone-clock'); ?></label>

		</p>

	</div>

	<!-- language -->
	<div class="mxmlb_mx-block_wrap">

		<h3><?php echo esc_html__('Set the language attribute to clock', 'mx-time-zone-clock'); ?></h3>

		<p>
			<?php echo esc_html__('Here you can find all attributes of the language:', 'mx-time-zone-clock'); ?>
			<a href="https://timezonedb.com/time-zones" target="_blank">timezonedb.com/</a>
		</p>

		<p>
			<?php echo esc_html__('By default', 'mx-time-zone-clock'); ?> - <b>en</b>
		</p>

		<p>
			<input type="text" id="mxmtzc_language_attr" placeholder="<?php echo esc_html__('en', 'mx-time-zone-clock'); ?>" />
		</p>

	</div>

	<!-- language -->
	<div class="mxmlb_mx-block_wrap">

		<h3><?php echo esc_html__('Set the language attribute to days', 'mx-time-zone-clock'); ?></h3>

		<p>
			<?php echo esc_html__('Here you can find all attributes of the language:', 'mx-time-zone-clock'); ?>
			<a href="https://timezonedb.com/time-zones" target="_blank">timezonedb.com/</a>
		</p>

		<p>
			<?php echo esc_html__('By default', 'mx-time-zone-clock'); ?> - <b>en</b>
		</p>

		<p>
			<input type="text" id="mxmtzc_language_for_days_attr" placeholder="<?php echo esc_html__('en', 'mx-time-zone-clock'); ?>" />
		</p>

	</div>

	<!-- show days -->
	<div class="mxmlb_mx-block_wrap">

		<h3><?php echo esc_html__('Show day, month and year', 'mx-time-zone-clock'); ?></h3>

		<p>
			<?php echo esc_html__('By default', 'mx-time-zone-clock'); ?> - <b>Shown</b>
		</p>

		<p class="mxmtzc_show_days_wrap">

			<input type="radio" id="mxmtzc_show_days1" value="show" name="mxmtzc_show_days" checked="checked" />
			<label for="mxmtzc_show_days1"><?php echo esc_html__('Shown', 'mx-time-zone-clock'); ?></label>

		</p>

		<p class="mxmtzc_show_days_wrap">

			<input type="radio" id="mxmtzc_show_days2" value="hidden" name="mxmtzc_show_days" />
			<label for="mxmtzc_show_days2"><?php echo esc_html__('Hidden', 'mx-time-zone-clock'); ?></label>

		</p>

	</div>

	<!-- font size -->
	<div class="mxmlb_mx-block_wrap">

		<h3><?php echo esc_html__('Set clock\'s font size', 'mx-time-zone-clock'); ?></h3>

		<p>
			<?php echo esc_html__('By default', 'mx-time-zone-clock'); ?> - <b>Depends on your theme settings</b>
		</p>

		<p>
			<input type="number" id="mxmtzc_font_size_attr" /> <span>px</span>
		</p>

	</div>

	<!-- show seconds -->
	<div class="mxmlb_mx-block_wrap">

		<h3><?php echo esc_html__('Show seconds in the clock', 'mx-time-zone-clock'); ?></h3>

		<p>
			<?php echo esc_html__('By default', 'mx-time-zone-clock'); ?> - <b>Shown</b>
		</p>

		<p class="mxmtzc_show_seconds_wrap">

			<input type="radio" id="mxmtzc_show_seconds1" value="show" name="mxmtzc_show_seconds" checked="checked" />
			<label for="mxmtzc_show_seconds1"><?php echo esc_html__('Shown', 'mx-time-zone-clock'); ?></label>

		</p>

		<p class="mxmtzc_show_seconds_wrap">

			<input type="radio" id="mxmtzc_show_seconds2" value="hidden" name="mxmtzc_show_seconds" />
			<label for="mxmtzc_show_seconds2"><?php echo esc_html__('Hidden', 'mx-time-zone-clock'); ?></label>

		</p>

	</div>

	<!-- arrow type -->
	<div class="mxmlb_mx-block_wrap">

		<h3><?php echo esc_html__('Type of arrows', 'mx-time-zone-clock'); ?></h3>

		<p>
			<?php echo esc_html__('By default', 'mx-time-zone-clock'); ?> - <b>Classical</b>
		</p>

		<p class="mxmtzc_show_days_wrap">

			<input type="radio" id="mxmtzc_arrow_type1" value="classical" name="mxmtzc_arrow_type" checked="checked" />
			<label for="mxmtzc_arrow_type1"><?php echo esc_html__('Classical', 'mx-time-zone-clock'); ?></label>

		</p>

		<p class="mxmtzc_show_days_wrap">

			<input type="radio" id="mxmtzc_arrow_type2" value="modern" name="mxmtzc_arrow_type" />
			<label for="mxmtzc_arrow_type2"><?php echo esc_html__('Modern', 'mx-time-zone-clock'); ?></label>

		</p>

	</div>

	<!-- super simple clock -->
	<div class="mxmlb_mx-block_wrap">

		<h3><?php echo esc_html__('Super Simple Clock', 'mx-time-zone-clock'); ?></h3>

		<p>
			<?php echo esc_html__('By default', 'mx-time-zone-clock'); ?> - <b>False</b>
		</p>

		<p class="mxmtzc_super_simple_wrap">

			<input type="radio" id="mxmtzc_super_simple1" value="false" name="mxmtzc_super_simple" checked="checked" />
			<label for="mxmtzc_super_simple1"><?php echo esc_html__('False', 'mx-time-zone-clock'); ?></label>

		</p>

		<p class="mxmtzc_super_simple_wrap">

			<input type="radio" id="mxmtzc_super_simple2" value="true" name="mxmtzc_super_simple" />
			<label for="mxmtzc_super_simple2"><?php echo esc_html__('True', 'mx-time-zone-clock'); ?></label>

		</p>

	</div>


	<!-- arrows color -->
	<div class="mxmlb_mx-block_wrap mxmlb_arrows_color_wrapper">

		<h3><?php echo esc_html__('Arrows Color', 'mx-time-zone-clock'); ?></h3>

		<p>
			<?php echo esc_html__('By default', 'mx-time-zone-clock'); ?> - <b>Unset</b>
		</p>

		<div class="mxmtzc_arrows_color_wrap mxmtzc_df">

			<input type="radio" id="mxmtzc_arrows_color1" value="unset" name="mxmtzc_arrows_color" checked="checked" />
			<label for="mxmtzc_arrows_color1"><?php echo esc_html__('Unset', 'mx-time-zone-clock'); ?></label>
			<div class="mxmtzc_arrows_color_show" style="width: 20px; height: 20px; background: white;"></div>

		</div>

		<div class="mxmtzc_arrows_color_wrap mxmtzc_df">

			<input type="radio" id="mxmtzc_arrows_color2" value="white" name="mxmtzc_arrows_color" />
			<label for="mxmtzc_arrows_color2"><?php echo esc_html__('White', 'mx-time-zone-clock'); ?></label>
			<div class="mxmtzc_arrows_color_show" style="width: 20px; height: 20px; background: white;"></div>

		</div>

		<div class="mxmtzc_arrows_color_wrap mxmtzc_df">

			<input type="radio" id="mxmtzc_arrows_color5" value="pink" name="mxmtzc_arrows_color" />
			<label for="mxmtzc_arrows_color5"><?php echo esc_html__('Pink', 'mx-time-zone-clock'); ?></label>
			<div class="mxmtzc_arrows_color_show" style="width: 20px; height: 20px; background: pink;"></div>

		</div>

		<div class="mxmtzc_arrows_color_wrap mxmtzc_df">

			<input type="radio" id="mxmtzc_arrows_color4" value="red" name="mxmtzc_arrows_color" />
			<label for="mxmtzc_arrows_color4"><?php echo esc_html__('Red', 'mx-time-zone-clock'); ?></label>
			<div class="mxmtzc_arrows_color_show" style="width: 20px; height: 20px; background: red;"></div>

		</div>

		<div class="mxmtzc_arrows_color_wrap mxmtzc_df">

			<input type="radio" id="mxmtzc_arrows_color6" value="green" name="mxmtzc_arrows_color" />
			<label for="mxmtzc_arrows_color6"><?php echo esc_html__('Green', 'mx-time-zone-clock'); ?></label>
			<div class="mxmtzc_arrows_color_show" style="width: 20px; height: 20px; background: green;"></div>

		</div>

		<div class="mxmtzc_arrows_color_wrap mxmtzc_df">

			<input type="radio" id="mxmtzc_arrows_color7" value="black" name="mxmtzc_arrows_color" />
			<label for="mxmtzc_arrows_color7"><?php echo esc_html__('Black', 'mx-time-zone-clock'); ?></label>
			<div class="mxmtzc_arrows_color_show" style="width: 20px; height: 20px; background: black;"></div>

		</div>

		<div class="mxmtzc_arrows_color_wrap mxmtzc_df">

			<input type="radio" id="mxmtzc_arrows_color3" value="blue" name="mxmtzc_arrows_color" />
			<label for="mxmtzc_arrows_color3"><?php echo esc_html__('Blue', 'mx-time-zone-clock'); ?></label>
			<div class="mxmtzc_arrows_color_show" style="width: 20px; height: 20px; background: blue;"></div>

		</div>

		<div class="mxmtzc_arrows_color_wrap mxmtzc_df">

			<input type="radio" id="mxmtzc_arrows_color8" value="yellow" name="mxmtzc_arrows_color" />
			<label for="mxmtzc_arrows_color8"><?php echo esc_html__('Yellow', 'mx-time-zone-clock'); ?></label>
			<div class="mxmtzc_arrows_color_show" style="width: 20px; height: 20px; background: yellow;"></div>

		</div>

	</div>

	<!-- shortcode -->
	<div class="mxmlb_mx-block_wrap" id="mx_time_zone_shortcode">

		<div class="mx-time-zone-shortcode">

			<span><?php echo esc_html__('Copy this shortcode to any page or article:', 'mx-time-zone-clock'); ?></span>
			<div class="mxmtzc_time_zone_shortcode_body">[mxmtzc_time_zone_clocks time_zone="<span id="mxmtzc_time_zone_value">Australia/Sydney</span>"
				city_name="<span id="mxmtzc_city_name_value">Wilton</span>"
				time_format="<span id="mxmtzc_time_format_value">12</span>"
				digital_clock="<span id="mxmtzc_digital_clock_value">false</span>"
				lang="<span id="mxmtzc_lang_value">en</span>"
				lang_for_date="<span id="mxmtzc_language_for_days_attr_value">en</span>"
				clock_type="<span id="mxmtzc_clock_type_value">clock-face2.png</span>"
				show_days="<span id="mxmtzc_show_days_value">true</span>" clock_font_size="<span id="mxmtzc_font_size_attr_value"></span>"
				show_seconds="<span id="mxmtzc_show_seconds_value">true</span>"
				arrow_type="<span id="mxmtzc_arrow_type_value">classical</span>"
				super_simple="<span id="mxmtzc_super_simple_value">false</span>"
				arrows_color="<span id="mxmtzc_arrows_color_value">unset</span>"
				clock_upload="<span id="mxmtzc_clock_upload_value">false</span>"]</div>

			<button id="mxCopyShortcode" class="mxmtzc_copy_button">
				<i class="fa fa-clone" aria-hidden="true"></i>
			</button>

		</div>

	</div>

</div>

<!-- save notice -->
<div class="mxmtzc_save_notice">
	<p>
		<?php echo esc_html__('Your shortcode has been updated. You can copy it below.', 'mx-time-zone-clock'); ?>
	</p>
	<i class="icon-arrow-down"></i>
</div>
