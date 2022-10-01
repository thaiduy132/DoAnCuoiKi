<?php

class DB
{
    public $con;
    protected $username = "root";
    protected $password = "";
    protected $dsn_Options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];

    public function __construct()
    {
        $this->con = new PDO('mysql:host=localhost;dbname=php_blog_ecommerce', $this->username, $this->password);
    }

    public function select($table)
    {
        $stmt = $this->con->prepare('SELECT * FROM tbl_catergory_product');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insert($table, $data)
    {
        $keys = implode(",", array_keys($data));
        $values = ":" . implode(", :", array_keys($data));

        $sql = "INSERT INTO $table($keys) VALUES($values)";
        $stmt = $this->con->prepare($sql);
        foreach ($data as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }
        return $stmt->execute();
    }

    public function update($table, $data, $cond)
    {
        $updateKeys = NULL;
        foreach ($data as $key => $value) {
            $updateKeys .= "$key=:$key,";
        }

        $updateKeys = rtrim($updateKeys, ",");

        $sql = "UPDATE $table SET $updateKeys WHERE $cond";
        $stmt = $this->con->prepare($sql);
        foreach ($data as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }
        return $stmt->execute();
    }
}