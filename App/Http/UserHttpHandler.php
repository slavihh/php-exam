<?php

namespace App\Http;

use App\Data\UserDTO;
use App\Service\UserServiceInterface;
use Core\DataBinderInterface;
use Core\TemplateInterface;

class UserHttpHandler extends HttpHandlerAbstract
{
    /**
     * @var UserServiceInterface
     */
    private $userService;

    public function __construct(
        TemplateInterface $template,
        DataBinderInterface $dataBinder,
        UserServiceInterface $userService)
    {
        parent::__construct($template, $dataBinder);
        $this->userService = $userService;
    }



    public function index()
    {
        $this->render("home/index");
    }

    public function all()
    {
        $this->render("users/all", $this->userService->getAll());
    }

    public function profile()
    {
        if (!$this->userService->isLogged()) {
            $this->redirect("login.php");
        }

        $currentUser = $this->userService->currentUser();
        $this->render("users/profile", $currentUser);
    }

    public function login(array $formData = [])
    {
        $name = "";
        if (isset($formData['login'])) {
            $this->handleLoginProcess($formData);
        } else {
            if(isset($_SESSION['name'])){
                $name = $_SESSION['name'];
            }
            $this->render("users/login",
                $name === "" ? "" : $name);
        }
    }

    public function register(array $formData = [])
    {
        if (isset($formData['register'])) {
            $this->handleRegisterProcess($formData);
        } else {
            $this->render("users/register");
        }
    }

    private function handleRegisterProcess($formData)
    {
        try {
            /** @var UserDTO $user */
            $user = $this->dataBinder->bind($formData, UserDTO::class);
            $this->userService->register($user, $formData['confirm_password']);
            $_SESSION['name'] = $user->getName();
            $this->redirect("login.php");
        } catch (\Exception $ex) {
            $this->render("users/register", null,
                [$ex->getMessage()]);
        }
    }

    private function handleLoginProcess($formData)
    {
        try {
            $user = $this->userService->login($formData['email'], $formData['password']);

            if (null !== $user) {
                $_SESSION['id'] = $user->getId();
                $this->redirect("profile.php");
            }
        } catch (\Exception $ex) {
            $this->render("users/login", null,
                [$ex->getMessage()]);
        }

    }

    private function handleEditProcess($formData)
    {
        try{
            $user = $this->dataBinder->bind($formData, UserDTO::class);
            $this->userService->edit($user);
            $this->redirect("myProfile.php");
        } catch (\Exception $ex) {
            $currentUser = $this->userService->currentUser();
            $this->render("users/myProfile", $currentUser,
                [$ex->getMessage()]);
        }
    }


}