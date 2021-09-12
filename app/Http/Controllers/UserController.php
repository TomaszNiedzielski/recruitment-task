<?php

namespace App\Http\Controllers;

use App\Interfaces\UserInterface;

class UserController extends Controller
{
    public $userInterface;

    public function __construct(UserInterface $userInterface) {
        $this->userInterface = $userInterface;
    }

    public function updateUsers() {
        $this->userInterface->updateUsers();
    }

    public function index() {
        $mostActiveUsers = $this->userInterface->index();

        return view('chart')->with('users', $mostActiveUsers);
    }
}
