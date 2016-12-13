<?php

class NewsController extends BaseController
{
   function onInit()
   {
      $this->authorize();
   }

    function index()
    {

       $this->news=$this->model->getAllNews();
        
    }

    function create()
    {
        if ($this->isPost) {
            $title=$_POST['news_title'];
            if (strlen($title)<1){
                $this->setValidationError("news_title","Invalid Title");
            }
            $content = $_POST['news_content'];
            if (strlen($title)<1){
                $this->setValidationError("news_content","Post Content cannot be empty");
            }
            if ($this->formValid()){

                if($this->model->createNews($title,$content)){
                    $this->addInfoMessage("News created");
                    $this->redirect("news");
                }else{
                    $this->addErrorMessage("Error:cannot create news");
                }
            }
        }

    }
	public function delete(int $id)
    {
    if ($this->isPost){
        if($this->model->deleteNews($id)){
            $this->addInfoMessage("News Deleted");
        }else{
            $this->addErrorMessage("Error:cannot delete News");
        }
        $this->redirect("news");
      } else{
        $news = $this->model->getById($id);
        if (!$news){
            $this->addErrorMessage("Post does not exist");
            $this->redirect("news");
        }
        $this->news=$news;
    }
    }
}
