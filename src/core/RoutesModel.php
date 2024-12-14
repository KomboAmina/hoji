<?php
namespace Hoji\Core;

class RoutesModel{

    public bool $triggerSetup;

    public $validRoutes;

    public function __construct(bool $triggerSetup=true){

        $this->triggerSetup=$triggerSetup;

        $this->validRoutes=$this->getValidRoutes();

    }

    public function getValidRoutes():array{

        switch($this->triggerSetup){

            case true:

                return array("setup");

                break;

            default:

                return array("dashboard","meetings","projects",
                            "clients","templates","settings","help");

            break;

        }

    }

    public function isValidRoute(string $check):bool{

        return in_array($check,$this->validRoutes);

    }

    public function getDefaultRoute():string{

        return $this->validRoutes[0];

    }

}
