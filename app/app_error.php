<?php

    class AppError extends ErrorHandler{
        function cannotClockInFromIp($params) {
            if(isset($params['ip'])){
                $this->controller->set('ip', $params['ip']);
                $this->_outputMessage('cannot_clock_in_from_ip');
            }else{
                $this->_outputMessage('cannot_clock_in_from_that_location');
            }
        }
    }

?>
