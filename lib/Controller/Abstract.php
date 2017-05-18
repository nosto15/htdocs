<?php

abstract class Controller_Abstract{
    public function __construct(){}
    
    final public function redirect($url = ''){
        $appBaseUrl = config::instance()->get('base_uri');
        $url = "{$appBaseUrl}{$url}";
        header("Location: {$url}");
        echo "<div>������� ��� ������: <a href=\"{$url}\">������</a></div>";
        exit();
    }
    
    final public function loadView($layout = 'default', $view = ''){
        return new View_Class($layout,$view);
    }
            
}