<?php

    $header = $settings['header'];
    $current_lang = strtolower(get_bloginfo('language'));
    $site_lang = substr($current_lang, 0,2);

    if ( defined( 'POLYLANG_VERSION' ) )
        $langs = pll_languages_list();
    else
        $langs = array( $site_lang );

?>
<tr>
	<th></th>
	<th class="centralize"><?php echo __('Image URL','bvs-events-calendar');?></th>
	<th class="centralize"><?php echo __('Link','bvs-events-calendar');?></th>
</tr>

<?php foreach ($langs as $lang) { ?>
    <tr>
    	<th>
            <label><?php echo strtoupper(__('Logo','bvs-events-calendar'));?></label>
            <?php echo ( defined( 'POLYLANG_VERSION' ) ) ? '(' . strtoupper( $lang ) . ')' : ''; ?>
        </th>
    	<td>
            <input id="header[logo-<?php echo $lang; ?>]" name="header[logo-<?php echo $lang; ?>]" placeholder="<?php echo __('Paste the URL','bvs-events-calendar');?>" type="text" class="regular-text code header-logo" value="<?php echo esc_html( stripslashes( $header["logo-" . $lang] ) ); ?>">
            <button type="button" class="clear-content"><i class="fa fa-times-circle" aria-hidden="true"></i></button>
        </td>
    	<td>
            <input id="header[logoLink-<?php echo $lang; ?>]" name="header[logoLink-<?php echo $lang; ?>]" placeholder="<?php echo __('Paste the link','bvs-events-calendar');?>" type="text" class="regular-text code header-logo-link" value="<?php echo esc_html( stripslashes( $header["logoLink-" . $lang] ) ); ?>">
            <button type="button" class="clear-content"><i class="fa fa-times-circle" aria-hidden="true"></i></button>
        </td>
    </tr>
<?php } ?>

<tr>
	<td colspan="3"><hr/></td>
</tr>
<tr>
	<th></th>
	<th class="centralize"><?php echo __('Image URL','bvs-events-calendar');?></th>
	<th class="centralize"><?php echo __('Link','bvs-events-calendar');?></th>
</tr>

<?php foreach ($langs as $lang) { ?>
    <tr>
    	<th>
            <label><?php echo strtoupper(__('Banner','bvs-events-calendar'));?></label>
            <?php echo ( defined( 'POLYLANG_VERSION' ) ) ? '(' . strtoupper( $lang ) . ')' : ''; ?>
        </th>
    	<td>
            <input id="header[banner-<?php echo $lang; ?>]" name="header[banner-<?php echo $lang; ?>]" placeholder="<?php echo __('Paste the URL','bvs-events-calendar');?>" type="text" class="regular-text code header-banner" value="<?php echo esc_html( stripslashes( $header["banner-" . $lang] ) ); ?>">
            <button type="button" class="clear-content"><i class="fa fa-times-circle" aria-hidden="true"></i></button>
        </td>
    	<td>
            <input id="header[bannerLink-<?php echo $lang; ?>]" name="header[bannerLink-<?php echo $lang; ?>]" placeholder="<?php echo __('Paste the link','bvs-events-calendar');?>" type="text" class="regular-text code header-banner-link" value="<?php echo esc_html( stripslashes( $header["bannerLink-" . $lang] ) ); ?>">
            <button type="button" class="clear-content"><i class="fa fa-times-circle" aria-hidden="true"></i></button>
        </td>
    </tr>
<?php } ?>

<tr>
    <td colspan="3"><hr/></td>
</tr>
<tr>
	<th><label for="header-custom"><?php echo __('Custom CSS and Javascript','bvs-events-calendar');?></label></th>
	<td colspan="2">
		<textarea id="header-custom" rows="7" cols="70" name="header[custom]"><?= stripslashes( $header['custom'] ) ?></textarea>
	</td>
</tr>
