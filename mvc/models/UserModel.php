<?php

class UserModel extends ConnectDB
{
    public $PDO;

    public function __construct()
    {
        $this->PDO = $this->connect();
    }

    public function createNewUser($data)
    {
        $result = false;
        $sql = "INSERT INTO USERS(UserFirstName, Username, UserEmail, UserPassword) VALUES(?, ?, ?, ?)";
        $stmt = $this->PDO->prepare($sql);
        if ($stmt->execute([$data['firstname'], $data['username'], $data['email'], $data['password']])) {
            $result = true;
            //$new_id = $this->PDO->lastInsertId();
        };
        return json_encode($result);
    }

    public function checkUsername($username)
    {
        $result = false;
        $sql = "SELECT UserID from Users WHERE Username = ?";
        $stmt = $this->PDO->prepare($sql);
        if ($stmt->execute([$username]) && $stmt->rowCount() > 0) {
            $result = true;
        };

        return json_encode($result);
    }

    public function checkUserEmail($email)
    {
        $result = false;
        $sql = "SELECT UserID from Users WHERE UserEmail = ?";
        $stmt = $this->PDO->prepare($sql);
        if ($stmt->execute([$email]) && $stmt->rowCount() == 1) {
            $result = true;
        };
        return json_encode($result);
    }

    public function UpdateDB($query, $params = [])
    {
        try {
            $stmt = $this->PDO->prepare($query);
            $stmt->execute($params);
            return $stmt->rowCount();
        } catch (PDOException $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function GetRow($query, $params = [])
    {
        try {
            $stmt = $this->PDO->prepare($query);
            $stmt->execute($params);

            return $stmt->fetch();
        } catch (PDOException $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function signin($username, $password)
    {

        $sql = 'SELECT * from Users WHERE Username = ?';

        $stmt = $this->PDO->prepare($sql);

        if ($stmt->execute([$username])) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $hashedPassword = $row['UserPassword'] ?? "";

            if (password_verify($password, $hashedPassword)) {
                return json_encode($row);
            } else {
                return json_encode(false);
            }
        } else {
            return json_encode(false);
        }
    }
}
