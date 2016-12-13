<?php

class UsersController extends BaseController
{
    public function register()
    {
		if ($this->isPost) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $password_confirm = $_POST['password_confirm'];
            $fullName = $_POST['full_name'];
           $description = $_POST['description'];
           $path = "C:\\xampp\\htdocs\\blog\\content\\images\\";

            $target_file = $path. basename($_FILES["image"]["name"]);
            $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
            var_dump(basename($_FILES["image"]["name"]));
            $uploadOk = 1;
            $imageName = $username."_avatar.".$imageFileType;

           if( basename($_FILES["image"]["name"])!=''){
                if (isset($_POST["Register"])) {
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
                    if (move_uploaded_file($_FILES["image"]["tmp_name"], $path.$imageName)) {
                        echo "The file " . $imageName . " has been uploaded.";
                    } else {
                        $this->setValidationError("image", "Sorry, there was an error uploading your file.");

                    }
                }

            }

                if ($username == '') {
                $this->setValidationError("username", "Incorrect username");
            }
            if ($password != $password_confirm) {
                $this->setValidationError("password_confirm", "Passoword do not match");
            }
            if (strlen($description)>350){
                $this->setValidationError("Abou you",  "TheDEsription is too long it must be less then 350 symbols");
            }
            if (strlen($password) < 5) {
                $this->setValidationError("password", "Passoword is invalid");
            }
            $userId = $this->model->register($username, $password, $fullName,$imageName,$description);



            if ($this->formValid()) {
                if ($userId !== false) {
                    $_SESSION['user_id'] = $userId;
                    $_SESSION['username'] = $username;
                    if (basename($_FILES["image"]["name"])!=''){
                    $_SESSION['picture']= $imageName;}
                    $this->addInfoMessage("Registration success");
                    $this->redirect("");
                } else {
                    $this->addErrorMessage("Registration failed");
                }

            }
        }
    }

    public function login()
    {
        if ($this->isPost){
            $username = $_POST['username'];
            $password = $_POST['password'];
            $userId = $this->model->login($username,$password);
            if ($userId!==false){
                $_SESSION['username']=$username;
                $_SESSION['user_id']=$userId;



                $this->addInfoMessage("Login Successful");
                $this->redirect("");
            }else{
                $this->addErrorMessage("Username or Password incorrect");
            }
        }
    }

    public function logout()
    {
        session_destroy();
        $this->redirect("");
    }
    function index()
    {
        $this->authorize();
        $this->users=$this->model->getUsers();
    }

    public function profile(int $id){
    $user = $this->model->getUserById($id);
       
        $this->user = $user;
        $userPosts = $this-> model->getUserPosts($id);
        $this->userPosts = $userPosts;
        
        $albums= $this-> model->getUserAlbums($id);
        $this->albums=$albums;
    }

}
