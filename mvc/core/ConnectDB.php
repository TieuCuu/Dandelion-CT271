<?php



class ConnectDB
{
    public function __construct()
    {
    }

    public function connect()
    {
        $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../../');
        $dotenv->load(); // Load .env file into $_ENV
        //print_r($_ENV);

        try {
            $PDO = new PDO(
                'mysql:host=' . $_ENV['DB_HOST'] .
                    ';dbname=' . $_ENV['DB_NAME'],
                $_ENV['DB_USER'],
                $_ENV['DB_PASS']
            );
        } catch (PDOException $e) {
            die('Error: ' . $e->getMessage() . '<br/>');
        }

        return $PDO;
    }
}
