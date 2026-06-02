<?php
class Database
{
    public $connection;

    public function __construct($config)
    {
        // Đẩy $config qua index.php
        // $config = [
        //     "host" => "localhost",
        //     "port" => 3306,
        //     "dbname" => "myapp",
        //     "charset" => "utf8mb4"
        // ];

        // $dsn = "mysql:host={$config['host']};port={$config['port']};dbname={$config['dbname']};charset={$config['charset']}";
        // Khắc phục gõ $dsn thủ công bằng // dd(http_build_query($config, "", ";"));
        $dsn = "mysql:" . http_build_query($config, "", ";");


        $this->connection = new PDO($dsn, "root", "", [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }

    public function query($query)
    {


        $statement = $this->connection->prepare($query);
        $statement->execute();

        return $statement;
    }
}
