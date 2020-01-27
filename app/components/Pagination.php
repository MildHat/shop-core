<?php


namespace app\components;


class Pagination
{

    public $currentPage;
    public $perPage;
    public $total;
    public $countPages;

    public function __construct($page, $perPage, $total)
    {
        $this->perPage = $perPage;
        $this->total = $total;
        $this->countPages = $this->getCountPages();
        $this->currentPage = $this->getCurrentPage($page);
    }

    public function getCountPages()
    {
        return ceil($this->total / $this->perPage) ?: 1;
    }

    public function getCurrentPage($page)
    {
        if (!$page || $page < 1) $page = 1;
        if ($page > $this->countPages) $page = $this->countPages;
        return $page;
    }

    public function getOffset()
    {
        return ($this->currentPage - 1) * $this->perPage;
    }


}