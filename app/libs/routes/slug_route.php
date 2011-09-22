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
                
            //    Cache::write('organizations', $orgs);
            //}
            
            $url_parts    = explode('.', env('HTTP_HOST'));
            $subdomain    = strtolower(trim($url_parts[0]));
            App::import('Model', 'Organization');

                $Org = new Organization();
                $org = $Org->find('first', array(
                    'conditions'=>array(
                        'Organization.slug'=>$subdomain,
                    ),
                    'recursive' => -1
                ));
            
                if($org['Organization']['slug'] == $subdomain) {
                    $params['organization'] = $org['Organization'];
                    return $params;
                }

                
            return false;
        }   
    
    }

?>
