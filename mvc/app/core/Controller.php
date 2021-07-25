<?php


class Controller
{
    protected function model($model)
    {
        //echo $model;

        // TODO:modelが存在するかどうかのチェック
        require_once '../app/models/' . $model . '.php';
        return new $model();
    }

    protected function view($view, $data = null)
    {
        //echo $view;

        // $dataはそのままviewで使える。
        require_once '../app/views/' . $view . '.php';
    }
}
