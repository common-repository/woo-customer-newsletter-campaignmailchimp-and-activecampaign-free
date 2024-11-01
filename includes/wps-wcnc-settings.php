<?php
class WPS_WCNC_Settings
{
	
	public function display_settings_MailChimp(){
		$wps_wcnc_mailchimp_key 	  = (get_option('wps_wcnc_mailchimp_key')) ? get_option('wps_wcnc_mailchimp_key') : '';
	    $wps_wcnc_mailchimp_status 	  = (get_option('wps_wcnc_mailchimp_status')) ? get_option('wps_wcnc_mailchimp_status') : 'disable';
		?>
			<article class="ac-large wps-wcnc-settings">
				<span class="wps-label">Status</span>
				<select name="wps_wcnc_mailchimp_status">
					<option value="enable" <?php if($wps_wcnc_mailchimp_status=='enable'){echo 'selected';}?>>Enable</option>
					<option value="disable" <?php if($wps_wcnc_mailchimp_status=='disable'){echo 'selected';}?>>Disable</option>
				</select>
		    	<span class="wps-label">API Key</span>
		    	<input type="text" autocomplete="off" name="wps_wcnc_mailchimp_key" id="wps_wcnc_mailchimp_key" value="<?php echo $wps_wcnc_mailchimp_key; ?>"/>
		    	
		    	<span class="wps-label">Lists</span>
		    	<p class="wpcWcncloaderDiv">
		    		Please wait,List is loading <img src="<?php echo WPS_WOO_CUST_NEWS_CAMP_IMG; ?>/loading.gif" title="List is loading" />
		    	</p>
		    	<div id="wps_wcnc_mailchimp_list_id">Fill the API Key, Your MailChimp account lists will be automatically show here.</div>
			</article>
		<?php
	}

	public function display_settings_ActiveCampaign(){
		$wps_wcnc_activecampaign_key 	= (get_option('wps_wcnc_activecampaign_key')) ? get_option('wps_wcnc_activecampaign_key') : '';
	    $wps_wcnc_activecampaign_status = (get_option('wps_wcnc_activecampaign_status')) ? get_option('wps_wcnc_activecampaign_status') : 'disable';
	    $wps_wcnc_activecampaign_url 	= (get_option('wps_wcnc_activecampaign_url')) ? get_option('wps_wcnc_activecampaign_url') : '';
		?>
			<article class="ac-extra-large wps-wcnc-settings">
				<p class="wps-wcnc-notice">*This Feature Is Available With Premium Version*</p>
				<span class="wps-label">Status</span>
				<select name="wps_wcnc_activecampaign_status">
					<option value="enable" <?php if($wps_wcnc_activecampaign_status=='enable'){echo 'selected';}?>>Enable</option>
					<option value="disable" <?php if($wps_wcnc_activecampaign_status=='disable'){echo 'selected';}?>>Disable</option>
				</select>
				<span class="wps-label">API Key</span>
		    	<input type="text" autocomplete="off" name="wps_wcnc_activecampaign_key" id="wps_wcnc_activecampaign_key" value="<?php echo $wps_wcnc_activecampaign_key; ?>"/>
		    	<span class="wps-label">URL</span>
		    	<input type="text" autocomplete="off" name="wps_wcnc_activecampaign_url" id="wps_wcnc_activecampaign_url" value="<?php echo $wps_wcnc_activecampaign_url; ?>"/>
		    	<span class="wps-label">Lists</span>
		    	<p class="wpcWcncloaderDiv">
		    		Please wait,List is loading <img src="<?php echo WPS_WOO_CUST_NEWS_CAMP_IMG; ?>/loading.gif" title="List is loading" />
		    	</p>
		    	<div id="wps_wcnc_activecampaign_list_id">Fill the API Key and URL, Your ActiveCampaign account lists will be automatically show here.</div>
			</article>
		<?php
	}
}

?>