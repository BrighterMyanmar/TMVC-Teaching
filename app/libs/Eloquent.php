<?php

class Eloquent
{
    private const DB_HOST = "localhost";
    private const DB_NAME = "todelete";
    private const DB_USER = "root";
    private const DB_PASS = "";

    private static $dbh;
    private static $stmt;

    private static $table;
    private static $fillable;

    public function __construct()
    {
        $c = get_called_class();
        $this->varies = get_class_vars($c);
        if (key_exists("table", $this->varies)) {
            self::$table = $this->varies["table"];
        }
        if (key_exists('fillable', $this->varies)) {
            self::$fillable = $this->varies['fillable'];
        }

        $db = "mysql:host=" . self::DB_HOST . ";dbname=" . self::DB_NAME;
        $options = [
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];

        try {
            self::$dbh = new PDO($db, self::DB_USER, self::DB_PASS, $options);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public static function findById($id)
    {
        self::$stmt = self::$dbh->prepare("SELECT * FROM " . self::$table . " WHERE id=:id");
        self::$stmt->bindParam(":id", $id, PDO::PARAM_INT);
        self::$stmt->execute();
        return self::$stmt->fetch(PDO::FETCH_OBJ);
    }

    public static function all()
    {
        self::$stmt = self::$dbh->prepare("SELECT * FROM " . self::$table);
        self::$stmt->execute();
        return self::$stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public static function filter($key, $value)
    {
        self::$stmt = self::$dbh->prepare("SELECT * FROM " . self::$table . " WHERE $key=:$key");
        self::bind($key, $value);
        self::$stmt->execute();
        return self::$stmt->fetchAll(PDO::FETCH_OBJ);
    }
    public static function find($key, $value)
    {
        self::$stmt = self::$dbh->prepare("SELECT * FROM " . self::$table . " WHERE $key=:$key");
        self::bind($key, $value);
        self::$stmt->execute();
        return self::$stmt->fetch(PDO::FETCH_OBJ);
    }

    public static function where($ary)
    {
        $kv = "";
        foreach ($ary as $key => $value) {
            echo "Key is $key " . " Value is $value <br>";
            $kv .= "$key=:$key AND ";
        }
        $kv = rtrim($kv, "AND ");
        self::$stmt = self::$dbh->prepare("SELECT * FROM " . self::$table . " WHERE $kv");
        foreach ($ary as $key => $value) {
            self::bind($key, $value);
        }
        self::$stmt->execute();
        return self::$stmt->fetchAll(PDO::FETCH_OBJ);
    }
    public static function create($data)
    {
        $keys = implode(",", array_keys($data));
        $values = ":" . implode(",:", array_keys($data));
        self::$stmt = self::$dbh->prepare("INSERT INTO " . self::$table . " ($keys) VALUES ($values)");
        foreach ($data as $key => $value) {
            self::bind($key, $value);
        }
        self::$stmt->execute();
        return self::findById(self::$dbh->lastInsertId());
    }

    public static function update($data)
    {
        $params = "";
        foreach ($data as $key => $value) {
            $params .= "$key=:$key,";
        }
        $params = rtrim($params, ',');
        self::$stmt = self::$dbh->prepare("UPDATE " . self::$table .  " SET $params WHERE id=:id");
        foreach ($data as $key => $value) {
            self::bind($key, $value);
        }
        self::$stmt->execute();
        return self::findById($data->id);
    }

    public static function delete($data){
        self::$stmt = self::$dbh->prepare("DELETE FROM " . self::$table . " WHERE id=:id");
        self::$stmt->bindParam(":id",$data->id,PDO::PARAM_INT);
        self::$stmt->execute();
        return true;
    }

    public static function bind($key, $value, $type = "")
    {
        switch ($value) {
            case is_int($value):
                $type = PDO::PARAM_INT;
                break;
            case is_bool($value):
                $type = PDO::PARAM_BOOL;
                break;
            case is_null($value):
                $type = PDO::PARAM_NULL;
                break;
            default:
                $type = PDO::PARAM_STR;
        }
        self::$stmt->bindParam($key, $value, $type);
    }



    public function __test()
    {
        echo self::$table;
        echo "<pre>" . print_r(self::$fillable, true) . "</pre>";
    }
}
