<?php


namespace app\components;


class Pagination
{

    public static function giveAmountOfPages($amountOfProducts, $recordsPerPage)
    {
        return ceil($amountOfProducts / $recordsPerPage);
    }

    public static function giveOffset($page, $recordsPerPage)
    {
        return ($page - 1) * $recordsPerPage;
    }

}