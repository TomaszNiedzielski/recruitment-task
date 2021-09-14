<?php

namespace App\Http\Controllers;

use App\Interfaces\UserInterface;

class UserController extends Controller
{
    public $userInterface;

    public function __construct(UserInterface $userInterface) {
        $this->userInterface = $userInterface;
    }

    public function index() {
        $response = $this->userInterface->index();

        return view('chart')->with(['names' => $response->names, 'postsAmount' => $response->postsAmount]);
    }
}
