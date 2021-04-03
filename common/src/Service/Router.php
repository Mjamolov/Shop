<?php

include_once __DIR__ . '/ExceptionService.php';

class Router
{
    private $side;

    public function __construct($side)
    {
        $this->side = $side;
    }

    public function index()
    {
        global $side;

        try {// ?/model=shop&action=create
            $module = $_GET['module'] ?? '';
            if(!empty($module)) $module =  $module . '/';
            $model = $_GET['model'] ?? 'site';
            $model = htmlspecialchars($model);
            $model = ucfirst($model);
            $controller = $model . "Controller";

            if (!file_exists(__DIR__ . "/../../../" . $this->side . "/src/Controller/" . $module . $controller . ".php")) {
                throw new Exception("Controller not found", 404);
            }//?model=product&action=all

            include_once __DIR__ . "/../../../" . $this->side . "/src/Controller/" . $module . $controller . ".php";
            $action = $_GET['action'] ?? 'index';
            $action = htmlspecialchars($action);

            // CRUD = create, read, update, delete
            if (isset($action)) {
                $objController = new $controller();
                if (method_exists($objController, $action)) {
                    return $objController->$action();
                }
                throw new Exception("Action not found", 404);
            }
        } catch (Exception $exception) {
            ExceptionService::error($exception, $side);
        }
    }
}




//             if (isset($_GET['model']) && $_GET['model'] === 'category') {
//             $controller = 'CategoryController';
//         }
//         if (isset($_GET['model']) && $_GET['model'] === 'shop') {
//             $controller = 'shopController';
//         }
//         if (isset($_GET['model']) && $_GET['model'] === 'news') {
//             $controller = 'newsController';
//
//         }
//         if (empty($controller)) {
//             die("Controller not found");
//         }
//         include_once __DIR__ . "/../Controller/" . $controller . '.php';

         // CRUD = create, read, update, delete



//         if (isset($_GET['action']) && $_GET['action'] == 'create') {
//             return (new $controller())->create();
//         }
//         if (isset($_GET['action']) && $_GET['action'] == 'update') {
//             return (new $controller())->update();
//         }
//
//         if (isset($_GET['action']) && $_GET['action'] == 'read') {
//             return (new $controller())->read();
//         }
//         if (isset($_GET['action']) && $_GET['action'] == 'delete') {
//             return (new $controller())->delete();
//         }
//         if (isset($_GET['action']) && $_GET['action'] == 'save') {
//             return (new $controller())->save();
//         }
//         die('Undefined Action');

