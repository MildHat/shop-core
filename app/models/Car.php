<?php


namespace app\models;


class Car extends AppModel
{

    private $id;
    private $title = '';
    private $description = '';
    private $type = '';
    private $color = '';
    private $price = '';
    private $createdAt;

    public function getById(int $id = null)
    {
        if ($id !== null) {
            $sql = "SELECT * FROM {$this->getTableName()} WHERE id=:id";
            $car = $this->db->prepare($sql);
            $car->bindParam(':id', $id);
            $car->execute();
            $car->setFetchMode(\PDO::FETCH_ASSOC);
            $car = $car->fetch();
            if ($car) {
                $car = $this->generateCar($car);
                return $car;
            }
            return false;
        }
        return false;
    }

    public function getAll(): array
    {
        $sql = "SELECT * FROM {$this->getTableName()}";
        $cars = $this->db->query($sql);
        $cars->setFetchMode(\PDO::FETCH_ASSOC);
        $cars = $cars->fetchAll();
        $carModels = [];
        foreach ($cars as $car) {
            $carModels[] = $this->generateCar($car);
        }
        return $carModels;
    }

    public function save(): bool
    {
        if ($this->id) {
            $sql = "UPDATE {$this->getTableName()} SET title = :title, description = :description, type = :type,"
                . " color = :color, price = :price WHERE id = :id";
            $statement = $this->db->prepare($sql);
            $statement->bindParam(':title', $this->title);
            $statement->bindParam(':description', $this->description);
            $statement->bindParam(':type', $this->type);
            $statement->bindParam(':color', $this->color);
            $statement->bindParam(':price', $this->price);
            $statement->bindParam(':id', $this->id);
            $statement->execute();
            return true;
        } else {
            $sql = "INSERT INTO {$this->getTableName()} (title, description, type, color, price)"
                . " VALUES (:title, :description, :type, :color, :price)";
            if ($this->validateColor($this->color)) {
                if ($this->validateType($this->type)) {
                    $statement = $this->db->prepare($sql);
                    $statement->bindParam(':title', $this->title);
                    $statement->bindParam(':description', $this->description);
                    $statement->bindParam(':type', $this->type);
                    $statement->bindParam(':color', $this->color);
                    $statement->bindParam(':price', $this->price);
                    $statement->execute();
                    return true;
                }
                return false;
            }
            return false;
        }
    }

    public function deleteById(int $id = null): bool
    {
        if ($id !== null) {
            $sql = "DELETE FROM {$this->getTableName()} WHERE id=:id";
            $car = $this->db->prepare($sql);
            $car->bindParam(':id', $id);
            $car->execute();
            return true;
        }
        return false;
    }

    public function getAllColors(): array
    {
        $sql = "SELECT COLUMN_TYPE as colors FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME='{$this->getTableName()}'"
            . " AND COLUMN_NAME='color'";
        $statement = $this->db->query($sql);
        $statement->setFetchMode(\PDO::FETCH_ASSOC);
        $statement = $statement->fetch();
        $colors = explode(',',
            str_replace('\'', '',
                str_replace(')', '',
                    str_replace('enum(', '', $statement['colors'])
                )
            )
        );
        return $colors;
    }

    public function getAllTypes()
    {
        $sql = "SELECT COLUMN_TYPE as types FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME='{$this->getTableName()}'"
            . " AND COLUMN_NAME='type'";
        $statement = $this->db->query($sql);
        $statement->setFetchMode(\PDO::FETCH_ASSOC);
        $statement = $statement->fetch();
        $types = explode(',',
            str_replace('\'', '',
                str_replace(')', '',
                    str_replace('enum(', '', $statement['types'])
                )
            )
        );
        return $types;
    }

    private function validateColor(string $givenColor): bool
    {
        $colors = $this->getAllColors();
        foreach ($colors as $color) {
            if ($color === $givenColor) {
                return true;
            }
        }
        return false;
    }

    private function validateType(string $givenType): bool
    {
        $types = $this->getAllTypes();
        foreach ($types as $type) {
            if ($type === $givenType) {
                return true;
            }
        }
        return false;
    }

    private function generateCar(array $car): Car
    {
        $carModel = new self();
        $carModel->setId($car['id']);
        $carModel->setTitle($car['title']);
        $carModel->setDescription($car['description']);
        $carModel->setType($car['type']);
        $carModel->setColor($car['color']);
        $carModel->setPrice($car['price']);
        $carModel->setCreatedAt($car['created_at']);
        return $carModel;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $color
     */
    public function setColor($color)
    {
        $this->color = $color;
    }

    /**
     * @return mixed
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    private function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    private function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }
}
