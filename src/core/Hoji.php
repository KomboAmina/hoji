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

        $this->view=new \Hoji\Core\BaseView($this->controller,$this->route);

    }

    protected function getRoute():string{

        $route=$this->routesModel->getDefaultRoute();

        if(!$this->setupChecker->triggerSetup && !isset($_GET['route'])){

            header("Location: ".URL.$this->routesModel->getDefaultRoute()."/");

        }

        if(isset($_GET['route']) && $this->routesModel->isValidRoute($_GET['route'])){

            if($_GET['route']!==$route){

                header("Location: ".URL.$route."/");

            }

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
