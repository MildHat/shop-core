<?php


namespace app\widgets\RelatedProducts;


use core\Db;
use PDO;

class RelatedProducts
{
    private $id;

    protected $template = __DIR__ . '/template/relatedProducts.php';
    protected $table = 'related_products';
    protected $data;
    protected $html;

    /** @var PDO */
    protected $db;

    public function __construct($id)
    {
        $this->id = $id;
        $db = Db::instance();
        $this->db = $db->connection;
        $this->run();
    }

    protected function getData()
    {
        $query = 'SELECT * FROM ' . $this->table . ' JOIN products ON products.id = related_products.related_id WHERE related_products.product_id = ' . $this->id;
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