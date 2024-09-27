<?php

namespace App\Models;

class AdminUser implements UserInterface
{
    public function getPermissions()
    {
        return 'Admin permissions';
    }
}