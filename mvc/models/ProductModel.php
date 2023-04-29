<?php



class ProductModel extends ConnectDB
{
    public $PDO;
    public function __construct()
    {
        $this->PDO = $this->connect();
    }

    public function GetProductByID($id)
    {
        $sql = "SELECT P.*, U.UnitName FROM PRODUCTS P INNER JOIN UNITS U ON P.UnitID = U.UnitID WHERE P.ProductID = ?";
        $stmt = $this->PDO->prepare($sql);
        if ($stmt->execute([$id]) && $stmt->rowCount() > 0) {
            $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return json_encode($row);
        }
        return json_encode(false);
    }

    public function DeleteProduct($query, $params = [])
    {
        try {
            $stmt = $this->PDO->prepare($query);
            $stmt->execute($params);
            if ($stmt->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function EditProduct($query, $params = [])
    {
        try {
            $stmt = $this->PDO->prepare($query);
            $stmt->execute($params);
            if ($stmt->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function AddProduct($query, $params = [])
    {
        try {
            $stmt = $this->PDO->prepare($query);
            if ($stmt->execute($params)) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            throw new Exception($e->getMessage());
        }
    }


    //getting all rows
    public function GetRows($query, $params = [])
    {
        try {
            $stmt = $this->PDO->prepare($query);
            $stmt->execute($params);

            return $stmt->fetchAll();
        } catch (PDOException $e) {
            throw new Exception($e->getMessage());
        }
    }

    //getting one row
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

    public function GetSum($query, $params = [])
    {
        try {
            $stmt = $this->PDO->prepare($query);
            $stmt->execute($params);

            return intval($stmt->fetchColumn());
        } catch (PDOException $e) {
            throw new Exception($e->getMessage());
        }
    }
}
