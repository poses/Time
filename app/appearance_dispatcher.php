<?php
    class AppearanceDispatcher extends Dispatcher{
        function asset($parts) {
        //debug($parts);
            if ($parts[0] === 'theme' && $parts[2] === 'appearances') {
                if(!in_array($parts[2], array('web', 'mobile'))){
                    $themeName = $parts[1]. DS . $parts[2] . DS . $parts[3];
                    unset($parts[0], $parts[1], $parts[2], $parts[3]);
                } else {
                    $themeName = $parts[1];
                    unset($parts[0], $parts[1]);
                }
                $fileFragment = implode(DS, $parts);
                echo debug($themeName);
                $path = App::themePath($themeName) . 'webroot' . DS;
                if (file_exists($path . $fileFragment)) {
                    $assetFile = $path . $fileFragment;
                }
                //debug($assetFile);
            }
        }
    }

?>
