<?php


namespace app\models;


use core\App;

class Product extends AppModel
{
    public $id;
    public $title;
    public $alias;
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

    public function giveProductsToPagination($limit = 6, $offset = 0, $order = '`created_at` DESC')
    {
        $products = $this->select()->where([
            ['availability', '=', '1']
        ])->order($order)->limit($limit)->offset($offset)->get();

        if (is_string($products)) {
            return $this->getQuery();
        }

        return $products;
    }

    public function search(string $pattern)
    {
        $products = $this->select()->where('title LIKE \'%' . $pattern . '%\'')->get();

        if (is_string($products)) {
            throw new \Exception('Error');
        }

        if (!$products) {
            throw new \Exception('Not found');
        }

        return $products;
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