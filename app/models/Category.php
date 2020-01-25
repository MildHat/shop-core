<?php


namespace app\models;


class Category extends AppModel
{
    public $id;
    public $title;
    public $alias;
    public $created_at;
    public $updated_at;

    protected $table = 'categories';

    public function giveCategoriesWithAmountOfProducts()
    {
        $categoriesWithAmountOfProducts = [];
        // SELECT categories.*, count(products.id) as amountOfProducts FROM categories LEFT JOIN products ON categories.id = products.id GROUP BY id ORDER BY created_at;
        $sql = 'SELECT categories.*, count(products.id) as amountOfProducts FROM categories LEFT JOIN products ON categories.id = products.category_id GROUP BY id';
        $categories = $this->db->query($sql);

        if ($categories) {
            $categories->setFetchMode(\PDO::FETCH_ASSOC);
            $categories = $categories->fetchAll();

            foreach ($categories as $category) {
                $entity = $this->morph($category);
                $entity->amountOfProducts = $category['amountOfProducts'];
                $categoriesWithAmountOfProducts[] = $entity;
            }

        }

        return $categoriesWithAmountOfProducts;
    }

}