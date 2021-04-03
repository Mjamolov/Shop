<?php

include_once __DIR__ . "/UserService.php";

class SecurityService
{
    public function checkPassword($user, $password)
    {
        if (empty($user)) {
            throw new Exception('User not found', 404);
        }

        if ($user['password'] !== UserService::encodePassword($password)) {
            throw new Exception('Incorrect password', 400);
        }
        return true;
    }

    public static function redirectToAdminPage()
    {
        header("location: /php/Shop(stream13)/backend/");
    }

    public static function redirectToLoginAdminPage()
    {
        header("location: /php/Shop(stream13)/backend/index.php/?model=site&action=login");
    }

    public static function redirectToStartPage()
    {
        header("location: /php/Shop(stream13)/frontend/");
    }

    public static function redirectToLoginPage()
    {
        header("location: /php/Shop(stream13)/frontend/index.php/?model=site&action=login");
    }

    public static function isAuthorized()
    {
        if (empty(UserService::getCurrentUser())) return false;
        return true;
    }

    public static function getPermissionNameByControllerAndAction($controller, $action)
    {
        return strtoupper($controller) . '_' . strtoupper($action);
    }
}