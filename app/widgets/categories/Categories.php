<?php


namespace app\widgets\categories;


use core\Db;

class Categories
{

    protected $template = __DIR__ . '/template/categories.php';
    protected $table = 'categories';
    protected $data;
    protected $html;

    /** @var \PDO */
    protected $db;

    public function __construct($attributes = [])
    {
        $db = Db::instance();
        $this->db = $db->connection;
        $this->run();
    }

    protected function getData()
    {
        $query = 'SELECT categories.*, count(products.id) as amountOfProducts FROM categories LEFT JOIN products ON categories.id = products.category_id WHERE products.availability = 1 GROUP BY id';
        $data = $this->db->query($query);
        $data->setFetchMode(\PDO::FETCH_ASSOC);
        $this->data = $data->fetchAll();
    }

    protected function run()
    {
        $this->getData();
        $this->html = $this->generateHtml();
    }

    protected function generateHtml()
    {
        ob_start();
        require $this->template;
        return ob_get_clean();
    }

    public function getHtml()
    {
        return $this->html;
    }

}