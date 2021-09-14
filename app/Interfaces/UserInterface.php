<?php

namespace App\Interfaces;

interface UserInterface
{
    /**
     * Load the most active users
     * 
     * @access  public
     * @method  /chart   GET
     */
    public function index();
}