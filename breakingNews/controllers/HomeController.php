<?php

class HomeController extends BaseController
{
    function index() {
       $this->news=$this->model->getLastNews();
        $this->latestnews = $this->news;
    }
	
	function view(int $id) {
      $news = $this->model->getNewsById($id);
        if (!$news){
            $this->addErrorMessage("Error:Invalid news Id");
            $this->redirect("");

        }
        $this->news = $news;
    }
}
