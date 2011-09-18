<?php
//http://php.net/manual/en/function.ip2long.php
class IPFilter
{
    private static $_IP_TYPE_SINGLE = 'single';
    private static $_IP_TYPE_WILDCARD = 'wildcard';
    private static $_IP_TYPE_MASK = 'mask';
    private static $_IP_TYPE_SECTION = 'section';
    private $_allowed_ips = array();

    public function __construct($allowed_ips)
    {
        $this->_allowed_ips = $allowed_ips;
    }

    public function check($ip, $allowed_ips = null)
    {
        $allowed_ips = $allowed_ips ? $allowed_ips : $this->_allowed_ips;
        
        foreach($allowed_ips as $allowed_ip)
        {
            $type = $this->_judge_ip_type($allowed_ip);
            
            $sub_rst = call_user_func(array($this,'_sub_checker_' . $type), $allowed_ip, $ip);

            if ($sub_rst)
            {
                return true;
            }
        }

        return false;
    }

    private function _judge_ip_type($ip)
    {
        if (strpos($ip, '*'))
        {
            return self::$_IP_TYPE_WILDCARD;
        }

        if (strpos($ip, '/'))
        {
            return self::$_IP_TYPE_MASK;
        }

        if (strpos($ip, '-'))
        {
            return self::$_IP_TYPE_SECTION;
        }

        if (ip2long($ip))
        {
            return self::$_IP_TYPE_SINGLE;
        }

        return false;
    }

    private function _sub_checker_single($allowed_ip, $ip)
    {
        return (ip2long($allowed_ip) == ip2long($ip));
    }

    private function _sub_checker_wildcard($allowed_ip, $ip)
    {
        $allowed_ip_arr = explode('.', $allowed_ip);
        $ip_arr = explode('.', $ip);
        for($i = 0;$i < count($allowed_ip_arr);$i++)
        {
            if ($allowed_ip_arr[$i] == '*')
            {
                return true;
            }
            else
            {
                if (false == ($allowed_ip_arr[$i] == $ip_arr[$i]))
                {
                    return false;
                }
            }
        }
    }

    private function _sub_checker_mask($allowed_ip, $ip)
    {
        list($allowed_ip_ip, $allowed_ip_mask) = explode('/', $allowed_ip);
        $begin = (ip2long($allowed_ip_ip) &ip2long($allowed_ip_mask)) + 1;
        $end = (ip2long($allowed_ip_ip) | (~ip2long($allowed_ip_mask))) + 1;
        $ip = ip2long($ip);
        return ($ip >= $begin && $ip <= $end);
    }

    private function _sub_checker_section($allowed_ip, $ip)
    {
        list($begin, $end) = explode('-', $allowed_ip);
        $begin = ip2long($begin);
        $end = ip2long($end);
        $ip = ip2long($ip);
        return ($ip >= $begin && $ip <= $end);
    }
}
/*
$filter = new IPFilter(
    array(
        '127.0.0.1',
        '172.0.0.*',
        '173.0.*.*',
        '126.1.0.0/255.255.0.0',
        '125.0.0.1-125.0.0.9',
));
$filter -> check('126.1.0.2'); 
*/
class IpFilterComponent extends Object {
    var $name = "IpFilter";
    var $components = array('RequestHandler');
    function initialize(&$controller, $settings = array()) {
        $this->controller =& $controller;
        $this->allowed_ips = $settings;
        $this->filter = new IPFilter($settings); 
    }
    
    //called after Controller::beforeFilter()
    function startup(&$controller) {
    
    }
    
    //called after Controller::beforeRender()
    function beforeRender(&$controller) {
    
    }
    
    //called after Controller::render()
    function shutdown(&$controller) {
    
    }
    
    //called before Controller::redirect()
    function beforeRedirect(&$controller, $url, $status=null, $exit=true) {

    }
    function check() {
        return $this->filter->check($this->RequestHandler->getClientIp(), $this->allowed_ips);
    }
    function allow() {
        $numargs = func_num_args();
        $arglist = func_get_args();
        foreach($arglist as $arg){
            if(!is_array($arg)) {
                $this->_set($arg);
            }else{
                foreach($arg as $a){
                    $this->_set($a);
                }
            }
        }
    }
    function deny() {
        $arglist = func_get_args();
        foreach($arglist as $arg) {
            if(!is_array($arg)){
                $this->_unset($arg);
            }else{
                foreach($arg as $a){
                    $this->_unset($a);
                }
            }
        }
    }
    function _set($item){
        $this->allowed_ips[] = $item;
    }
    function _unset($item){
        if(in_array($item, $this->allowed_ips)){
            unset($this->allowed_ips[$item]);
        }
    }
}
?> 
