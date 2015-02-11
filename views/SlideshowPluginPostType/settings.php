<?php if ($data instanceof stdClass) : ?>
	<table>
		<?php $groups = array(); ?>
		<?php if(count($data->settings) > 0): ?>
		<?php foreach($data->settings as $key => $value): ?>

		<?php if( !isset($value, $value['type'], $value['default'], $value['description']) || !is_array($value)) continue; ?>

		<?php
		//XTEC ************ ELIMINAT - Hide group information - not esencial
		//2014.11.20 @jmeler
		/*
		if(!empty($value['group']) && !isset($groups[$value['group']])): $groups[$value['group']] = true; ?>
		<tr>
			<td colspan="3" style="border-bottom: 1px solid #e5e5e5; text-align: center;">
				<span style="display: inline-block; position: relative; top: 14px; padding: 0 12px; background: #fff;">
					<?php echo $value['group']; ?> <?php _e('settings', 'slideshow-jquery-image-gallery'); ?>
				</span>
			</td>
		</tr>
		<tr>
			<td colspan="3"></td>
		</tr>
		<?php endif;
		//FI ************/ ?>
		<?php
		// XTEC ************ MODIFICAT - Hide secundary options
		// 2014.10.08 @jmeler
		if (!in_array($key,
				array('slideSpeed',
					'descriptionSpeed',
					'maxWidth',
					'enableResponsiveness',
					'waitUntilLoaded',
					'showLoadingIcon',
					'avoidFilter')))  {
		?>

		<tr
			<?php echo !empty($value['group'])? 'class="group-' . strtolower(str_replace(' ', '-', $value['group'])) . '"': ''; ?>
			<?php echo !empty($value['dependsOn'])? 'style="display:none;"': ''; ?>
		>
			<td><?php echo $value['description']; ?></td>
			<td><?php echo SlideshowPluginSlideshowSettingsHandler::getInputField(SlideshowPluginSlideshowSettingsHandler::$settingsKey, htmlspecialchars($key), $value); ?></td>
			<td><?php _e('Default', 'slideshow-jquery-image-gallery'); ?>: &#39;<?php echo (isset($value['options']))? $value['options'][$value['default']]: $value['default']; ?>&#39;</td>
		</tr>
		<?php } ?>
		<?php
		//************ ORIGINAL
		/*
		<tr
			<?php echo !empty($value['group'])? 'class="group-' . strtolower(str_replace(' ', '-', $value['group'])) . '"': ''; ?>
			<?php echo !empty($value['dependsOn'])? 'style="display:none;"': ''; ?>
		>
			<td><?php echo $value['description']; ?></td>
			<td><?php echo SlideshowPluginSlideshowSettingsHandler::getInputField(SlideshowPluginSlideshowSettingsHandler::$settingsKey, htmlspecialchars($key), $value); ?></td>
			<td><?php _e('Default', 'slideshow-jquery-image-gallery'); ?>: &#39;<?php echo (isset($value['options']))? $value['options'][$value['default']]: $value['default']; ?>&#39;</td>
		</tr>
		*/
		//************ FI ?>
		<?php endforeach; ?>
		<?php endif; ?>
	</table>
<?php endif; ?>