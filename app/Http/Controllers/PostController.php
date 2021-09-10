<?php

namespace App\Http\Controllers;

use App\Interfaces\PostInterface;

class PostController extends Controller
{
    public $postInterface;

    public function __construct(PostInterface $postInterface) {
        $this->postInterface = $postInterface;
    }

    public function updateAllPosts() {
        $this->postInterface->updateAllPosts();
    }

    public function index() {
        $posts = $this->postInterface->index();

        return view('posts')->with('posts', $posts);
    }
}
