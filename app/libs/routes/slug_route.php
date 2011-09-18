<?php
    class SlugRoute extends CakeRoute
    {
        function parse($url) {
            $params = parent::parse($url);
            if(empty($params)) {
                return false;
            }
            
            //$orgs = Cache::read('organizations');

            //if (empty($orgs)) {
                App::import('Model', 'Organization');

                $Org = new Organization();
                $orgs = $Org->find('all', array(
                    'recursive' => -1
                ));
            //    Cache::write('organizations', $orgs);
            //}
            
            $url_parts    = explode('.', env('HTTP_HOST'));
            $subdomain    = strtolower(trim($url_parts[0]));

            foreach($orgs as $idx => $val) {
                if($val['Organization']['slug'] == $subdomain) {
                    $params['organization'] = $val['Organization'];
                    return $params;
                }
            }
                
            return false;
        }   
    
    }

?>
