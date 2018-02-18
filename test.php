<?php
	require_once("./api/Auth.php");
	require_once("./api/User.php");
	$auth = new Auth();
	$user = new User();
	$accessToken = $auth->getAccessToken();
	$userid = $user->getUserId($accessToken);
	print_r($userid);
	/*class Test{
		private $auth;
	    private $cache;
	    public function __construct() {
	        $this->auth = new Auth();
	        $accessToken = $this->cache->getAccessToken();
	        echo 'cc';
	        print_r($accessToken);
	    }

	    public function getAccessToken()
	    {
	        $accessToken = $this->cache->getCorpAccessToken('corp_access_token');
	        if (!$accessToken)
	        {
	            $response = $this->http->get('/gettoken', array('corpid' => CORPID, 'corpsecret' => SECRET));
	            $this->check($response);
	            $accessToken = $response->access_token;
	            $this->cache->setCorpAccessToken($accessToken);
	        }
	        return $accessToken;
	    }
	}*/