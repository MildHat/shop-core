<?php


namespace app\models;


use core\App;

class Product extends AppModel
{
    public $id;
    public $title;
    public $short_description;
    public $description;
    public $sale_price;
    public $price;
    public $code;
    public $brand_id;
    public $category_id;
    public $is_sale;
    public $main_image;
    public $small_image;
    public $availability;
    public $created_at;
    public $updated_at;

    public function giveProductsToPagination($page = 1, $offset = 0, $conditions = '', $order = 'ORDER BY created_at DESC') : array
    {
        $result = [];
        $sql = 'SELECT * FROM products ' . $order . ' LIMIT ' . App::$app->getProperty('pagination') . ' OFFSET ' . $offset;
        $products = $this->db->query($sql);

        if ($products) {
            $products->setFetchMode(\PDO::FETCH_ASSOC);
            $products = $products->fetchAll();

            if ($products) {
                foreach ($products as $product) {
                    $result[] = $this->morph($product);
                }
            }

        }

        return $result;
    }

    public function giveCountOfProducts() : int
    {
        $sql = 'SELECT COUNT(id) as count FROM ' . $this->getTableName();
        $result = $this->db->query($sql);
        if ($result) {
            $result->setFetchMode(\PDO::FETCH_ASSOC);
            $result = $result->fetch();
            return (int)$result['count'];
        }
        return 0;
    }
}