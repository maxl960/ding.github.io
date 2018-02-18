<?php
require_once(__DIR__ . "/../api/Auth.php");

$auth = new Auth();
$token = $auth->getAccessToken();
$timestamp = date("Y-m-d H:m:s",time());

// 创建新的 cURL 资源
$ch = curl_init();
$url = "https://eco.taobao.com/router/rest";
$params = array(
	'method'		=> 'GET',
	'session'		=> $token,
	'timestamp'		=> $timestamp,
	'format'		=> 'json',
	'v'				=> '2.0',
	//'partner_id'	=> '',
	//'simplify'		=> '',

);
$uri = joinParams($url, $params);
$a = "https://eco.taobao.com/router/rest?session=3c40d6e569b93df3855f971213d40f42&timestamp=2018-01-25+08%3A01%3A16&format=json&v=2.0&method=GET";
$b = "http://localhost/ding/php/test.php";
// 设置 URL 和相应的选项
curl_setopt($ch, CURLOPT_URL, $a);
curl_setopt($ch, CURLOPT_HEADER, 0);
// 抓取 URL 并把它传递给浏览器
$response = curl_exec($ch);
error_log($response);
echo($response);
if (curl_getinfo($ch, CURLINFO_HTTP_CODE) == '200') {
    return json_decode($response, false);
}

// 关闭 cURL 资源，并且释放系统资源
curl_close($ch);
function joinParams($path, $params)
{
    $url = OAPI_HOST . $path;
    if (count($params) > 0)
    {
        $url = $url . "?";
        foreach ($params as $key => $value)
        {
            $url = $url . $key . "=" . $value . "&";
        }
        $length = count($url);
        if ($url[$length - 1] == '&')
        {
            $url = substr($url, 0, $length - 1);
        }
    }
    return $url;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<div>test.php</div>
</body>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script type="text/javascript">
	(function(){
		var token = '<?= $token ?>';
		var timestamp = '<?= $timestamp ?>';
		var params = {
			'method'		:  'dingtalk.smartwork.bpms.processinstance.create',
			'session'		:  token,
			'timestamp'		:  timestamp,
			'format'		:  'json',
			'v'				:  '2.0',
			'process_code'	: 'PROC-TXEKLZ3V-GY2SUWSFM3KFV2280SMV3-U5RYTTCJ-1',
			'process_code'	: 
		}
		$.get('<?= $url ?>',params, function(data){
			console.log(data)
		})
	})(jQuery)
</script>
</html>