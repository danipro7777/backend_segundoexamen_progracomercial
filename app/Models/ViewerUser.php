<?php

namespace App\Models;

class ViewerUser implements UserInterface
{
    public function getPermissions()
    {
        return 'Viewer permissions';
    }
}