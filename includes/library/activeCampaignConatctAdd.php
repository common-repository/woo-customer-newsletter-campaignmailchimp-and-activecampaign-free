<?php
function addContacts($name,$email,$key,$url,$listId){
    $params = array(
        'api_key'      => $key,
        'api_action'   => 'contact_add',
        'api_output'   => 'serialize',
    );
    $post = array(
        'email'                    => $email,
        'first_name'               => $name,
        'last_name'                => '',
        'phone'                    => '',
        'orgname'                  => '',
        'tags'                     => 'api',
        'p[$listId]'               => $listId,
        'status[$listId]'          => 1
    );
    $query = "";
    foreach( $params as $key => $value ) $query .= urlencode($key) . '=' . urlencode($value) . '&';
    $query = rtrim($query, '& ');

    $data = "";
    foreach( $post as $key => $value ) $data .= urlencode($key) . '=' . urlencode($value) . '&';
    $data = rtrim($data, '& ');

    $url = rtrim($url, '/ ');

    if ( !function_exists('curl_init') ) return false; 

    if ( $params['api_output'] == 'json' && !function_exists('json_decode') ) {
        return false;
    }

    $api = $url . '/admin/api.php?' . $query;

    $request = curl_init($api);
    curl_setopt($request, CURLOPT_HEADER, 0);
    curl_setopt($request, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($request, CURLOPT_POSTFIELDS, $data);
    curl_setopt($request, CURLOPT_FOLLOWLOCATION, true);
    $response = (string)curl_exec($request);

    curl_close($request);
    if ( !$response ) {
        return false;
    }
    $result = unserialize($response);
    if($result['result_code']){
        return true;
    }
    else{
        return false;
    }
}
 
?>