<?php
    class AppController extends Controller {
        var $components = array(
            'Auth', 
            'Session', 
            'Cookie', 
            'Email',
            'RequestHandler',
            'Security',
        );
        var $helpers = array('Html', 'Form', 'Session');
        
        function beforeFilter(){
            parent::beforeFilter();
                
            $this->_setupStaging();
            $this->_setupSecurity();
            $this->_setSubDomain();
            $this->_setOrganization();
            $this->_userOrganizationCheck();
            $this->_setAppearance();
            //debug($this->Auth->user());die;
            $this->Auth->allow('display');
            $this->Auth->authError = 'Please login to view this page.';
            $this->Auth->autoRedirect = false;
            $this->Auth->loginError= 'Incorrect username and/or password.';
            $this->Auth->loginRedirect = array('controller' => 'time_clocks', 'action' => 'index');
            $this->Auth->logoutRedirect = array('controller' => 'users', 'action' => 'login');
            $this->Auth->userScope = array('User.active = 1');
            
            if($this->params['controller'] == 'users'/* && $this->params['action'] == 'add' || $this->params['action'] == 'edit'*/) {
                $this->Auth->authenticate = $this->User;
            }
            
            $this->set('organization', $this->currentOrganization);
            $this->set('admin', $this->_isRole('admin'));
            $this->set('manager', $this->_isRole('manager'));
        }
        function beforeRender() {
            $user = $this->Auth->user();
            //unset($user['User']['password']);
            unset($this->data['User']['password']);
            if(!empty($user)){
                $user['User']['client_ip'] = $this->RequestHandler->getClientIp();
            }
            $this->set('user', $user['User']);
        }

        function _isRole($role) {
            $admin = FALSE;
            if(!is_null($role) && $this->Auth->user('roles') == $role){
                $admin = TRUE;
            }
            return $admin;
        }
        function _setupSecurity() {
            $this->Security->blackHoleCallback = '_badRequest';
            if(Configure::read('forceSSL')) {
                $this->Security->requireSecure('*');
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
            if(!empty($this->params['organization'])){
                $this->currentOrganization = $this->params['organization'];
                
            }else{
                $this->currentOrganization = null;
            }
        }
        function _setSubDomain() {
            $url_parts    = explode('.', env('HTTP_HOST'));
            $this->subdomain = null;
            if(count($url_parts) == 3) {
                $this->subdomain    = strtolower(trim($url_parts[0]));
            }
        }
        function __setTheme(){
            if(!empty($this->currentOrganization)&& !empty($this->currentOrganization['theme'])){
                $this->view = 'Theme';
                $this->theme = $this->currentOrganization['theme'];
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
                        'UserGroup',
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
