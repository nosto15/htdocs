<?php
Class Controller_Pages extends Controller_Abstract
{
    public function error($text="")
    {
        $View = $this->loadView('index');
        $View->view('Pages/error');
		$View->set('text',$text);
        $View->render("404");
    }
    public function index()
    {
        $View = $this->loadView('index');// _layout
        $View->view('Pages/index'); // Pages
        $View->render("Главная"); // title
    }

	public function articles($params=0)
	{
	$View = $this->loadView('index');
	$View->view('Pages/articles'); // Pages
	$View->set('num_art',$params);
	$View->render("Статьи"); // title
	}

	public function regisrtation()
    {
        $View = $this->loadView('index');
        $View->view('Pages/regisrtation'); // Pages
        $View->render("регистрация"); // title
    }

	public function vxod()
    {
        $View = $this->loadView('index');
        $View->view('Pages/vxod'); // Pages
		$View->set('styleC','styleC');
        $View->render("Авторизация"); // title
    }

	public function gus()
    {
        $View = $this->loadView('index');
        $View->view('Pages/gus'); // Pages
		$View->set('styleC','styleC');
        $View->render("Большие гуси"); // title
    }
	public function alex()
    {
        $View = $this->loadView('index');
        $View->view('Pages/alex'); // Pages
		$View->set('styleC','styleC');
        $View->render("1Day With Alex"); // title
    }
	public function fedos()
    {
        $View = $this->loadView('index');
        $View->view('Pages/fedos'); // Pages
		$View->set('styleC','styleC');
        $View->render("Danila Fedoseev @fedosbmx"); // title
    }
	public function anton()
    {
        $View = $this->loadView('index');
        $View->view('Pages/anton'); // Pages
		$View->set('styleC','styleC');
        $View->render("Anton Petrov Scooter"); // title
    }
	public function nick()
    {
        $View = $this->loadView('index');
        $View->view('Pages/nick'); // Pages
		$View->set('styleC','styleC');
        $View->render("@NICKRUBLEV"); // title
    }
	public function cvaz()
    {
        $View = $this->loadView('index');
        $View->view('Pages/cvaz'); // Pages
        $View->render("Обратная связь"); // title
    }

}
