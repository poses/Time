<?php
    ini_restore('session.referer_check');
    //ini_set('session.use_trans_sid', 0);
    ini_set('session.name', Configure::read('Session.cookie'));
    ini_set('session.cookie_lifetime', 0);
    ini_set('session.cookie_path', '/');
    ini_set('session.cookie_domain', env('HTTP_HOST'));
    if(strpos($_SERVER['HTTP_USER_AGENT'],"google")!==false or strpos($_SERVER['HTTP_USER_AGENT'],"MSIECrawler")!==false)
    {
        ini_set("url_rewriter.tags","");
    }
?>
