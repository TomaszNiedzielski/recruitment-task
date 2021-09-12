<?php

namespace App\Interfaces;

interface UserInterface
{
    /**
     * Update users in table
     * 
     * @access  public
     */
    public function updateUsers();

    /**
     * Load the most active users
     * 
     * @access  public
     * @method  /chart   GET
     */
    public function index();
}