<?php

    class AppearanceHelper extends Helper{
        function __constructor($options = null){
            parent:: __constructor($options);
        }
        function webroot($file) {
            debug(parent::webroot($file));
		    /*$asset = explode('?', $file);
		    $asset[1] = isset($asset[1]) ? '?' . $asset[1] : null;
		    $webPath = "{$this->webroot}" . $asset[0];
		    $file = $asset[0];

		    if (!empty($this->theme)) {
			    $file = trim($file, '/');
			    $theme = $this->theme . '/';

			    if (DS === '\\') {
				    $file = str_replace('/', '\\', $file);
			    }

			    if (file_exists(Configure::read('App.www_root') . 'theme' . DS . $this->theme . DS  . $file)) {
				    $webPath = "{$this->webroot}theme/" . $theme . $asset[0];
			    } else {
				    $viewPaths = App::path('views');

				    foreach ($viewPaths as $viewPath) {
				        
					    $path = $viewPath . 'themed'. DS . $this->theme . DS  . 'webroot' . DS  . $file;
                        
					    if (file_exists($path)) {
						    $webPath = "{$this->webroot}theme/" . $theme . $asset[0];
						    break;
					    }
				    }
			    }
			    if (!empty($this->appearance)) {
			        $file = trim($file, '/');
			        $appearance = $this->appearance . '/';

			        if (DS === '\\') {
				        $file = str_replace('/', '\\', $file);
			        }

			        if (file_exists(Configure::read('App.www_root') . 'theme' . DS . $this->theme . DS . 'appearances' . DS . $this->appearance . DS . $file)) {
				        $webPath = "{$this->webroot}theme/" . $theme . 'appearance/' . $appearance . $asset[0];
			        } else {
				        $viewPaths = App::path('views');

				        foreach ($viewPaths as $viewPath) {
				            
					        $path = $viewPath . 'themed'. DS . $this->theme . DS  . 'appearances' . DS . $this->appearance . DS . 'webroot' . DS  . $file;
                            
					        if (file_exists($path)) {
						        $webPath = "{$this->webroot}theme/" . $theme . 'appearance/' . $asset[0];
						        break;
					        }
				        }
			        }
		        }
		    }
		
		    debug($webPath);
		    if (strpos($webPath, '//') !== false) {
			    return str_replace('//', '/', $webPath . $asset[1]);
		    }
		    return $webPath . $asset[1];*/
	    }
    }

?>
