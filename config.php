<?php
define('DIR_ROOT', dirname(__FILE__).'/');
define("OAPI_HOST", "https://oapi.dingtalk.com");

define("CORPID", "ding8e54f93e90fd7f4435c2f4657eb6378f");
define("SECRET", "yuOqAEzHVd0hGPPLJDM9uoV7agXJSsInCD-9flsGZxe6T9Lo_iGqMP1OXP85S44p");
define("AGENTID", "156865796");//必填，在创建微应用的时候会分配
define("ENCODING_AES_KEY", "123456"); //加解密需要用到的token，普通企业可以随机填写,例如:123456
define("TOKEN", "123456"); //数据加密密钥。用于回调数据的加密，长度固定为43个字符，从a-z, A-Z, 0-9共62个字符中选取,您可以随机生成