<?php

namespace App\Http\Controllers;

use App\Interfaces\UserInterface;

class UserController extends Controller
{
    public $userInterface;

    public function __construct(UserInterface $userInterface) {
        $this->userInterface = $userInterface;
    }

    public function updateAllUsers() {
        $this->userInterface->updateAllUsers();
    }
}
