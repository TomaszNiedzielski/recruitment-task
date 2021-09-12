<?php

namespace App\Interfaces;

interface PostInterface
{
    /**
     * Update posts
     * 
     * @access  public
     */
    public function updatePosts();

    /**
     * Load posts
     * 
     * @access  public
     * @method  /   GET
     */
    public function index();
}