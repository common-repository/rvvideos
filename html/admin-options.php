<?php 
	// Is it really useful?
	// Well, it doesn't hurt to add it twice
	if (!is_admin()) die(_e('Authorization failed!', 'rvvideos')); 
?>

<div class="wrap">
	<h2><?php _e('RVVideos Plugin Options', 'rvvideos'); ?></h2>
	
	<form id="rvvideo_form" method="post" action="options.php"> 
		<?php settings_fields('rvvideos_options'); ?>
		
		<table class="form-table">
			<tr>
				<td><?php _e('Preserve aspect ratio (set width, height will be updated)', 'rvvideos'); ?>:</td>
				<td><input id="rvvideos_ratio" type="checkbox" name="rvvideos_ratio" value="1"></td>
			</tr>		
			<tr>
				<td><?php _e('Player Width (pixels)', 'rvvideos'); ?>:</td>
				<td><input id="rvvideos_width" type="text" name="rvvideos_width" value="<?php echo get_option('rvvideos_width'); ?>"><br />
				<?php printf(__('Minimum: %d, Maximum: %d, Default: %d', 'rvvideos'), 100, 1000, 550); ?></td>
			</tr>
			<tr>
				<td><?php _e('Player Height (pixels)', 'rvvideos'); ?>:</td>
				<td><input id="rvvideos_height" type="text" name="rvvideos_height" value="<?php echo get_option('rvvideos_height'); ?>"><br />
				<?php printf(__('Minimum: %d, Maximum: %d, Default: %d', 'rvvideos'), 58, 518, 319); ?></td>
			</tr>	
			<tr>
				<td colspan="2"><input class="button-primary" type="submit" value="<?php _e('Save options', 'rvvideos'); ?>" /></td>
			</tr>	
		</table>
	</form>
</div>