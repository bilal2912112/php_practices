<?php
require_once 'UserModel.php';

class UserController {
    private $model;

    public function __construct() {
        $this->model = new UserModel();
    }

    public function createUser($userData) {
        $result = $this->model->createUser($userData);
        if ($result) {
            echo "User created successfully";
          
           
        } else {
            echo "eroor created successfully";
          
        }
    }

    public function updateUser($id, $userData) {
        $result = $this->model->updateUser($id, $userData);
        if ($result) {
            echo "User updated successfully";
         
        } else {
            echo "Error occurred during user update";
           
        }
    }

    public function deleteUser($id) {
        $result = $this->model->deleteUser($id);
        if ($result) {
            echo "User deleted successfully";
           
        } else {
            echo "Error occurred during user deletion";
            
        }
    }

    public function getUser($id) {
        $user = $this->model->getUserById($id);
        
    }

    public function getAllUsers() {
        $users = $this->model->getAllUsers();
       
    }
}

?>
