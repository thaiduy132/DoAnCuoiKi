<?php
class User extends DB

{
    function __construct()
    {
        parent::__construct();
    }
    public function Tong($n, $m)
    {
        return $n + $m;
    }

    public function Users()
    {
        return parent::select("tbl_catergory_product");
    }

    public function insertCategory($table_category_product, $data)
    {
        return parent::insert($table_category_product, $data);
    }
    public function updateCategory($table_category_product, $data, $cond)
    {
        return parent::update($table_category_product, $data, $cond);
    }
}