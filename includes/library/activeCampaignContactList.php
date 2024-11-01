<?php
function getList($url,$key){
    $params = array(
        'api_key'      => $key,
        'api_action'   => 'list_list',
        'api_output'   => 'serialize',
        'ids'          => 'all',
    );
    $query = "";
    foreach( $params as $key => $value ) $query .= urlencode($key) . '=' . urlencode($value) . '&';
    $query = rtrim($query, '& ');
    $url = rtrim($url, '/ ');
    if ( !function_exists('curl_init') ) die('CURL not supported. (introduced in PHP 4.0.2)');
    if ( $params['api_output'] == 'json' && !function_exists('json_decode') ) {
        die('JSON not supported. (introduced in PHP 5.2.0)');
    }
    $api = $url . '/admin/api.php?' . $query;
    $request = curl_init($api);
    curl_setopt($request, CURLOPT_HEADER, 0);
    curl_setopt($request, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($request, CURLOPT_FOLLOWLOCATION, true);
    $response = (string)curl_exec($request);
    curl_close($request);

    if ( !$response ) {
        die('No Response Come From Your ActiveCampaign Account. Please contact with support team.');
    }

    $result = unserialize($response);

    if($result['result_code']){
        return $result;
    }else{
        return false;
    }

}
?>