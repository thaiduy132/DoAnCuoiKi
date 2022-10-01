<?php

class Home extends Controller
{
    public function __construct()
    {
        $data = array();
        $message = array();
    }
    public function index($name = '')
    {
        $user = $this->model('User');
        $this->view('home/index', ['AllUsers' => $user->Users()]);
    }

    public function insertCategory()
    {
        $user = $this->model('User');
        $table = 'tbl_catergory_product';
        $title = $_POST['title'];
        $description = $_POST['description'];
        $data = array(
            'title_category_product' => $title,
            'desc_category' => $description
        );
        $result = $user->insertCategory($table, $data);
        $message = array();
        if ($result == 1) {
            $message['msg'] = "Successful";
        } else $message['msg'] = "Failure";
        print_r($message);
        $this->view('addCategory', ["msg" => $message['msg']]);
    }

    public function updateCategory()
    {
        $user = $this->model('User');
        $table = 'tbl_catergory_product';
        // $title = $_POST['title'];
        // $description = $_POST['description'];
        $id = 3;
        $cond = "id_category_product = '$id'";
        $data = array(
            'title_category_product' => 'Macbook',
            'desc_category' => 'Wow re qua z troi'
        );
        $result = $user->updateCategory($table, $data, $cond);
        $message = array();
        if ($result == 1) {
            echo "Successful";
        } else echo "Failure";
        $this->view('addCategory', ["msg" => $message['msg']]);
    }

    public function addCategory()
    {
        $this->view('addCategory');
    }
}