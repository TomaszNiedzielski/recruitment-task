<?php

namespace App\Interfaces;

interface PostInterface
{
    /**
     * Update all posts
     * 
     * @access  public
     */
    public function updateAllPosts();

    /**
     * Load posts
     * 
     * @access  public
     * @method  /   GET
     */
    public function index();
}