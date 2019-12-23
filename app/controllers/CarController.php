<?php


namespace app\controllers;


use app\models\Car;

class CarController extends AppController
{

    public $car;

    public function __construct($route)
    {
        parent::__construct($route);
        $this->car = new Car();
    }

    public function indexAction()
    {

        $cars = $this->car->getAll();
        $this->set(compact('cars'));
        $this->setMeta('Cars');
    }

    public function showAction()
    {
        $car = $this->car->getById($this->route['id']);
        if ($car === false) {
            throw new \Exception('Not Found', 404);
        }
        $this->set(compact('car'));
        $this->setMeta($car->getTitle());
    }

    public function addAction()
    {
        $colors = $this->car->getAllColors();
        $types = $this->car->getAllTypes();
        $this->set(compact('colors', 'types'));
    }

    public function storeAction()
    {
        if (!isset($_POST['title'])) {
            header('Location: /cars');
        } else {
            $car = new Car();
            $car->setTitle($_POST['title']);
            $car->setDescription($_POST['description']);
            $car->setType($_POST['type']);
            $car->setColor($_POST['color']);
            $car->setPrice($_POST['price']);
            if ($car->save()) {
                header('Location: /cars');
            } else {
                throw new \Exception('Error');
            }
        }
    }

}