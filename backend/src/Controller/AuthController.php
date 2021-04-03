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
        // TODO Remote to Service
        try {
            $email = htmlspecialchars($_POST['login']);
            $password = htmlspecialchars($_POST['password']);
            $user = (new User())->getByEmail($email);

            if (!$this->securityService->checkPassword($user, $password)) {
                throw new Exception('Incorrect Login or Password', 403);
            }

            // TODO Fix User data
            UserService::saveUserData([
                'id' => $user['id'],
                'login' => $user['email'],
                'role' => json_decode($user['roles'], true)
            ]);

            SecurityService::redirectToAdminPage()();
        } catch (Exception $exception) {
            ExceptionService::error($exception, 'backend');
        }
    }

    public function logout()
    {
        UserService::clear();

        SecurityService::redirectToLoginAdminPage();
    }
}