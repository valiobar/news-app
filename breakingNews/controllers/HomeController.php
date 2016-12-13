<?php

class HomeController extends BaseController
{
    function index() {
       $this->news=$this->model->getLastNews();
        $this->latestnews = array_slice($this->news,0,3);
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
