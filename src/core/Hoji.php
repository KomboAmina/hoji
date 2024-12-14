<?php
namespace Hoji\Core;

class Hoji{

    public object $setupChecker;

    public object $routesModel;

    public string $route;

    public object $model;

    public object $controller;

    public object $view;

    public function __construct(){

        $this->setupChecker=new SetupChecker();

        $this->routesModel=new \Hoji\Core\RoutesModel($this->setupChecker->triggerSetup);

        $this->route=$this->getRoute();

        $this->model=$this->getActiveModel();

        $this->controller=$this->getActiveController();

        $this->view=new \Hoji\Core\BaseView();

    }

    protected function getRoute():string{

        $route=$this->routesModel->getDefaultRoute();

        if(isset($_GET['levela']) && $this->routesModel->isValidRoute($_GET['route'])){

            $route=$_GET['route'];

        }

        return $route;

    }

    protected function getActiveModel():object{

        $defaultClass="\\Hoji\\Core\\HojiModel";

        $desiredClass="\\Hoji\\".ucwords($this->route)."\\".ucwords($this->route)."Model";

        return (class_exists($desiredClass)) ? new $desiredClass():new $defaultClass();

    }

    protected function getActiveController():object{

        $defaultClass="\\Hoji\\Core\\HojiController";

        $desiredClass="\\Hoji\\".ucwords($this->route)."\\".ucwords($this->route)."Controller";

        return (class_exists($desiredClass)) ? new $desiredClass($this->model):new $defaultClass($this->model);

    }

}
