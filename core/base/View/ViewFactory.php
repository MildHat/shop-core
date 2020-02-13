<?php


namespace core\base\View;


use core\App;

class ViewFactory
{

    /**
     * Render the given view path with the passed variables and generate output
     *
     * @param string
     * @param array
     * @return View
     */
    public function render(string $viewPath, array $data = [])
    {
        return new View($viewPath, $data);
    }

}