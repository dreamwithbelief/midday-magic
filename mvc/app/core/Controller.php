<?php

class Controller
{
    public function model( $model )
    {
        require_once '../app/models/'.$model.'.php';
        $m = new $model();
        $m->setTable( $model );
        return $m;
    }

    public function view( $view, $data = array() )
    {
        require_once '../app/views/'.$view.'.php';
    }
}