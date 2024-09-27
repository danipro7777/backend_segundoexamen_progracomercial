<?php

namespace App\Models;

class EditorUser implements UserInterface
{
    public function getPermissions()
    {
        return 'Editor permissions';
    }
}