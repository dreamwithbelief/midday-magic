<?php

class Controller
{
    public function model( $model, $table = '' )
    {
        require_once '../app/models/'.$model.'.php';
        $m = new $model();
        $table = empty( $table ) ? $model : $table;
        $m->setTable( $table );
        return $m;
    }

    public function view( $view = 'home/index', $data = array(), $layout = 'index' )
    {
        $yield = '../app/views/'.$view.'.php';
        require_once '../app/views/layout/'.$layout.'.php';
    }
}