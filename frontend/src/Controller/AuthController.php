<?php

include_once __DIR__ . "/../../../common/src/Service/SecurityService.php";
include_once __DIR__ . "/../../../common/src/Service/UserService.php";
include_once __DIR__ . "/../../../common/src/Service/ExceptionService.php";
include_once __DIR__ . "/../../../common/src/Model/User.php";

class AuthController
{
    private $securityService;

    public function __construct()
    {
        $this->securityService = new SecurityService();
    }

    public function check()
    {
        try {
            $email = htmlspecialchars($_POST['login']);
            $password = htmlspecialchars($_POST['password']);
            $user = (new User())->getByEmail($email);

            $this->securityService->checkPassword($user, $password);

            UserService::saveUserData([
                'id' => $user['id'],
                'login' => $user['email'],
                'role' => json_decode($user['roles'], true)
            ]);

            SecurityService::redirectToStartPage();

        } catch (Exception $exception) {
            ExceptionService::error($exception, 'frontend');
        }
    }

    public function logout()
    {
        UserService::clear();

        SecurityService::redirectToLoginPage();
    }
}















