<?php


class Home extends Controller
{
    public function index()
    {
        //var_dump(func_get_args());
        $params = func_get_args();

        $user = $this->model('User');
        // $user->name = empty(func_get_args()) ? $user->name : func_get_args()[0]; // 5.5~
        $user->name = empty($params) ? $user->name : $params[0];

        $this->view('home/index', $user->name);
    }
}
