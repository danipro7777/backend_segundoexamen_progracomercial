<?php

namespace App\Factories;

use App\Models\AdminUser;
use App\Models\EditorUser;
use App\Models\ViewerUser;

class UserFactory implements UserFactoryInterface
{
    public function createUser(string $type)
    {
        switch ($type) {
            case 'admin':
                return new AdminUser();
            case 'editor':
                return new EditorUser();
            case 'viewer':
                return new ViewerUser();
            default:
                throw new \Exception("User type not recognized.");
        }
    }
}