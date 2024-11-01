<?php
Class WPS_WCNC_Api_Ajax{
	public function __construct()
	{
		add_action( 'wp_ajax_wps_wcnc_get_mc_list', array($this,'wps_wcnc_get_mc_list' ));
		add_action( 'wp_ajax_wps_wcnc_get_ac_list', array($this,'wps_wcnc_get_ac_list' ));
	}
	public static function wps_wcnc_get_mc_list(){
		$wps_wcnc_mailchimp_list_id  = (get_option('wps_wcnc_mailchimp_list_id')) ? get_option('wps_wcnc_mailchimp_list_id') : '';

		$api_key = $_POST['api_key'];
		$data = array(
			'fields' => 'lists',
		);
		$url = 'https://' . substr($api_key,strpos($api_key,'-')+1) . '.api.mailchimp.com/3.0/lists/';
		$result = json_decode( WPS_WCNC_Api_Ajax::mailchimp_curl_connect( $url, 'GET', $api_key, $data) );
		if( !empty($result->lists) ) {
			?>
			<select name="wps_wcnc_mailchimp_list_id" id="wps_wcnc_mailchimp_list_id">
			<?php
				foreach( $result->lists as $list ){
					?>
						<option value="<?php echo $list->id; ?>"<?php if($list->id==$wps_wcnc_mailchimp_list_id){echo 'selected';}?>><?php echo $list->name; ?></option>
					<?php
				}
			?>
			</select>
			<?php
		} elseif ( is_int( $result->status ) ) {
			echo '<strong>' . $result->title . ':</strong> ' . $result->detail;
		}
		exit;
	}

	public static function mailchimp_curl_connect( $url, $request_type, $api_key, $data = array() ) {
		if( $request_type == 'GET' )
			$url .= '?' . http_build_query($data);

		$mch = curl_init();
		$headers = array(
			'Content-Type: application/json',
			'Authorization: Basic '.base64_encode( 'user:'. $api_key )
		);
		curl_setopt($mch, CURLOPT_URL, $url );
		curl_setopt($mch, CURLOPT_HTTPHEADER, $headers);
		//curl_setopt($mch, CURLOPT_USERAGENT, 'PHP-MCAPI/2.0');
		curl_setopt($mch, CURLOPT_RETURNTRANSFER, true); // do not echo the result, write it into variable
		curl_setopt($mch, CURLOPT_CUSTOMREQUEST, $request_type); // according to MailChimp API: POST/GET/PATCH/PUT/DELETE
		curl_setopt($mch, CURLOPT_TIMEOUT, 10);
		curl_setopt($mch, CURLOPT_SSL_VERIFYPEER, false); // certificate verification for TLS/SSL connection
		if( $request_type != 'GET' ) {
			curl_setopt($mch, CURLOPT_POST, true);
			curl_setopt($mch, CURLOPT_POSTFIELDS, json_encode($data) ); // send data in json
		}

		return curl_exec($mch);
	}

	public static function wps_wcnc_get_ac_list(){
		require_once('library/activeCampaignContactList.php');
		$result 	= array();

		$api_key = sanitize_text_field($_POST['api_key']) ;
		$url 	 = sanitize_text_field($_POST['url']) ;
		$results  = getList($url,$api_key);

		$wps_wcnc_activecampaign_list_id  = (get_option('wps_wcnc_activecampaign_list_id')) ? get_option('wps_wcnc_activecampaign_list_id') : '';
		if( !empty($results) ) {?>
			<select name="wps_wcnc_activecampaign_list_id" id="wps_wcnc_activecampaign_list_id">
			<?php
				foreach($results as $result){
					if(is_array($result)){
						if($wps_wcnc_activecampaign_list_id==$result['id']){
							echo "<option value='".$result['id']."' selected>".$result['name']."</option>";
						}
						else{
							echo "<option value='".$result['id']."'>".$result['name']."</option>";
						}
					}
					else{
						echo 'Problem in loading, please try again after sometime.';
					}
				}
			?>
			</select><?php
		}
		exit;
	}
}new WPS_WCNC_Api_Ajax();

?>