<?php

namespace App\Interfaces;

interface PostInterface
{
    /**
     * Load posts
     * 
     * @access  public
     * @method  /   GET
     */
    public function index();
}