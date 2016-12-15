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

    function update($id){
      $this->news=$this->model->getById($id);

        if ($this->isPost) {
            $path = "C:\\xampp\\htdocs\\breakingNews\\content\\images\\";

            $target_file = $path. basename($_FILES["image"]["name"]);
            $name=basename($_FILES["image"]["name"]);
            $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

            $uploadOk = 1;


            if( basename($_FILES["image"]["name"])!=''){
                if (isset($_POST["Create"])) {

                    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                    if ($check !== false) {

                        $uploadOk = 1;
                    } else {
                        $this->setValidationError("image", "File is not an image.");
                        $uploadOk = 0;
                    }
                }
                if (file_exists($target_file)) {
                    $this->setValidationError("image", "Sorry, file already exists.");
                    $uploadOk = 0;
                }
                if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                    && $imageFileType != "gif"
                ) {
                    $this->setValidationError("image", "Sorry, only JPG, JPEG, PNG & GIF files are allowed.");
                    $uploadOk = 0;
                }
                if ($uploadOk == 0) {
                    $this->addErrorMessage("Sorry, your file was not uploaded.");

                } else {
                    var_dump($target_file);
                    if (move_uploaded_file($_FILES["image"]["tmp_name"], $path.$name)) {
                        echo "The file " .$name . " has been uploaded.";
                    } else {
                        $this->setValidationError("image", "Sorry, there was an error uploading your file.");

                    }
                }
  smart_resize_image(realpath($path.$name),250,250,realpath(TUMB_ROOT.$name));
            }
            $isActive=1;
            if(!isset($_POST['active'])){
                $isActive=0;
            }
            $title=$_POST['news_title'];
            if (strlen($title)<1){
                $this->setValidationError("news_title","Invalid Title");
            }
            $content = $_POST['news_content'];
            if (strlen($title)<1){
                $this->setValidationError("news_content","Post Content cannot be empty");
            }
            if ($this->formValid()){

                if($this->model->updateNews($id,$title,$content,$name,$isActive)){
                    $this->addInfoMessage("News updated");
                    $this->redirect("news");
                }else{
                    $this->addErrorMessage("Error:cannot update news");
                }
            }
        }
    }
    function create()
    {
        if ($this->isPost) {
            $path = "C:\\xampp\\htdocs\\breakingNews\\content\\images\\";

            $target_file = $path. basename($_FILES["image"]["name"]);
            $name=basename($_FILES["image"]["name"]);
            $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

            $uploadOk = 1;


            if( basename($_FILES["image"]["name"])!=''){
                if (isset($_POST["Create"])) {

                    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                    if ($check !== false) {

                        $uploadOk = 1;
                    } else {
                        $this->setValidationError("image", "File is not an image.");
                        $uploadOk = 0;
                    }
                }
                if (file_exists($target_file)) {
                    $this->setValidationError("image", "Sorry, file already exists.");
                    $uploadOk = 0;
                }
                if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                    && $imageFileType != "gif"
                ) {
                    $this->setValidationError("image", "Sorry, only JPG, JPEG, PNG & GIF files are allowed.");
                    $uploadOk = 0;
                }
                if ($uploadOk == 0) {
                    $this->addErrorMessage("Sorry, your file was not uploaded.");

                } else {
                    var_dump($target_file);
                    if (move_uploaded_file($_FILES["image"]["tmp_name"], $path.$name)) {
                        echo "The file " .$name . " has been uploaded.";
                    } else {
                        $this->setValidationError("image", "Sorry, there was an error uploading your file.");

                    }
                }

            }
            $title=$_POST['news_title'];
            if (strlen($title)<1){
                $this->setValidationError("news_title","Invalid Title");
            }
            $content = $_POST['news_content'];
            if (strlen($title)<1){
                $this->setValidationError("news_content","Post Content cannot be empty");
            }
            if ($this->formValid()){

                if($this->model->createNews($title,$content,$name)){
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
