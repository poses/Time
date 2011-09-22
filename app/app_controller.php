<?php
    class AppController extends Controller {
        var $components = array(
            'Auth', 
            'Session', 
            'Cookie', 
            'Email',
            'RequestHandler',
            //'Security',
            'IpFilter',
        );
        var $helpers = array('Html', 'Form', 'Javascript', 'Session', 'Date');

        function beforeFilter(){
            parent::beforeFilter();

            $this->_setupStaging();
            $this->_setupSecurity();
            
            $this->_setOrganization();
            $this->_userOrganizationCheck();
            $this->_setAppearance();
            $this->_setDefaults();
            $this->_setContent();
            $this->_setAuth();
            
            $this->cache_results = (Configure::read('cache_results'))?true:false;
		    // We must make sure pages are viewable by non users
		    if($this->params['controller'] == 'pages') {
			    $this->Auth->allow('*');
		    }
		    
		    // API Stuff
		    if(isset($this->params['prefix']) && $this->params['prefix'] == 'api') {
			    $this->autoRender = false;
			
			    // We must display an error message instead of redirecting if user is not logged in and content is for logged in users only.
			    if(!in_array($this->params['action'],$this->Auth->allowedActions) && !$this->Session->check('Auth.User')) {
			        // anon user, no access to API
				    $response = array(
					    'status' => array(
						    'code' => API::LOGIN_REQUIRED,
						    'text' => 'Login required to view this content.',
					    ),
				    );
				    $this->set('response',$response);
				    // We auth allow all our current action so we don't get redirect to login page.
				    $this->Auth->allow($this->params['action']);
			    } else {
			    
			    }
            }
            $this->set('admin', $this->_isRole('admin'));
            $this->set('manager', $this->_isRole('manager'));
        }
        function beforeRender() {
            if(!array_key_exists('requested', $this->params)){
                $user = $this->Session->read($this->Auth->sessionKey);
            }
            //unset($user['User']['password']);
            if(isset($this->data['User']['password']));
            unset($this->data['User']['password']);
            if(!empty($user)){
                $user['User']['client_ip'] = $this->RequestHandler->getClientIp();
            }
            $this->set(compact('user'));
            $this->_setErrorLayout();
        }
        function isAuthorized(){
            return true;
        }
        function _isRole($role) {
            $admin = FALSE;
            if(!is_null($role) && $this->Auth->user('roles') == $role){
                $admin = TRUE;
            }
            return $admin;
        }
        function _setupSecurity() {
            if(in_array('Security', $this->components)){
                $this->Security->blackHoleCallback = '_badRequest';
                if(Configure::read('forceSSL')) {
                    $this->Security->requireSecure('*');
                }
            }
        }
        function _setupStaging() {
            $mode = Configure::read('Staging.mode');
            if($mode === 'development'){
                $developer_ips = Configure::read('Staging.development.ips');
                if(is_array($developer_ips) && !in_array('0.0.0.0',$developer_ips)){
                    if(!in_array($this->RequestHandler->getClientIp(), $developer_ips)){
                        header('Location: http://www.google.com');
                    }
                }
            }
        }
        function _badRequest() {
            if(Configure::read('forceSSL') && !$this->RequestHandler->isSSL()) {
                $this->_forceSSL();
            }else{
                $this->cakeError('error400');
            }
            exit;
        }
        function _setOrganization() {
            $this->_setSubDomain();
            if(!empty($this->params['organization'])){
                $this->currentOrganization = $this->params['organization'];
                $this->set('organization', $this->currentOrganization);
                $this->__setTheme();
            }else{
                $this->currentOrganization = null;
                if(!is_null($this->subdomain)){
                    $this->cakeError('error400', array('code'=>404, 'name'=>'Not Found','message'=>__('Oops, Meow. Purrrrrr 404')));
                }
            }
        }
        function _setContent(){
            $this->RequestHandler->setContent('json', 'text/x-json');
		    $this->RequestHandler->setContent('jsonp', 'text/javascript');
        }
        function _setDefaults(){
            $this->set('title_for_layout', Inflector::humanize($this->params['controller']));
        }
        function _setAuth(){
        
            $this->Auth->userScope = array(
			    //'User.active' => true,
			    //'User.suspended_until' < date(DATE_SQL),
		    );
		    $this->Auth->autoRedirect = false;
		    $this->Auth->authError = '<span class="alert-message warning">Please login to view this page.</span>';
		    $this->Auth->loginError= '<span class="alert-message error">Incorrect username and/or password.</span>';
		    $this->Auth->actionPath = 'Controllers/';
		    $this->Auth->loginAction = '/users/login';
		    $this->Auth->loginRedirect = array('controller' => 'time_clocks', 'action' => 'index');
		    $this->Auth->logoutRedirect = array('controller' => 'users', 'action' => 'login');
            $this->Auth->authorize = 'controller';
        }
        function _setSubDomain() {
            $url_parts    = explode('.', env('HTTP_HOST'));
            $this->subdomain = null;
            if(count($url_parts) == 3) {
                $this->subdomain    = strtolower(trim($url_parts[0]));
                $this->tld = array_pop($url_parts);
                $this->domain = array_pop($url_parts) . '.' . $this->tld;
                
                $this->set('subdomain', $this->subdomain);
            }elseif(count($url_parts) == 2){
                list($name, $this->tld) = $url_parts;
                $this->domain = $name .'.'.$this->tld;
            }
            $this->set('domain', $this->domain);
        }
        function __setTheme(){
            if(!empty($this->currentOrganization)&& !empty($this->currentOrganization['theme'])){
                //$this->view = 'Theme';
                //$this->theme = $this->currentOrganization['theme'];
                
                
            }
        }
        function _setAppearance(){
            $this->__setTheme();
            if(!empty($this->currentOrganization)&& !empty($this->currentOrganization['appearance'])){
                $this->appearance = $this->currentOrganization['appearance'];
                if(!empty($this->theme) && $this->currentOrganization['appearance'] != 'default'){
                    if(is_dir(ROOT . DS . APP_DIR . DS . 'views' . DS . 'themed' . DS . $this->theme . 
                        DS . 'appearances' . DS . $this->appearance)){
                        $this->theme = $this->theme.DS.'appearances'.DS.$this->appearance;
                    }
                    
                    
                }
            }
        }
        function _setErrorLayout(){
            if($this->name == 'CakeError'){
                $this->layout = 'error';
            }
        }
        function _userOrganizationCheck(){
            $Users = ClassRegistry::init('User');
            $userGroups = array_flip($Users->UserGroup->find('list', array(
	            'recursive' => -1,
	        )));
            $user = $this->Auth->user();
            if(!empty($user)){
                App::import('Model', 'User');
                $User = new User();
                $User->Behaviors->attach('Containable');
                $user = $User->find('first', array(
                    'conditions' => array(
                        'User.id' => $user['User']['id']
                    ),
                    'contain' => array(
                        'Organization',
                        'UserGroup'=>array(
                            'UserGroupMembership',
                        ),
                    )
                ));
                
            }

            if(!empty($user)) {
                
	            if($this->action != 'logout'){
    	            if($user['Organization']['slug'] != $this->subdomain){
                        if($user['User']['user_group_id'] == $userGroups['Users']){
                            $this->Session->setFlash('Welcome to ' . $user['Organization']['name']);
                            $this->redirect("http://" . $user['Organization']['slug'] . env('HTTP_BASE') . $this->here);
                        }
                        
                        if($user['User']['user_group_id'] == $userGroups['Managers']){
                            $this->Session->setFlash('Welcome to ' . $user['Organization']['name']);
                            $here = str_ireplace('/manage', '', $this->here);
                            $this->redirect("http://" . $user['Organization']['slug'] . env('HTTP_BASE') . '/manage'. $here);
                        }
                        
                    }
                }
            }

        }
    }

?>
