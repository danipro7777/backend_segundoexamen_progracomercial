<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Factories\UserFactoryInterface;

class UserController extends Controller
{
    protected $userFactory;

    // Inyección de dependencias a través del constructor
    public function __construct(UserFactoryInterface $userFactory)
    {
        $this->userFactory = $userFactory;
    }

    // Método para crear un usuario
    public function createUser(Request $request)
    {
        // Obtener el tipo de usuario del request (por ejemplo, 'admin', 'editor', 'viewer')
        $type = $request->input('type');

        // Usar la fábrica para crear la instancia del usuario
        $user = $this->userFactory->createUser($type);

        // Hacer algo con la instancia del usuario
        // Por ejemplo, podrías guardar la información en la base de datos, devolver una respuesta, etc.
        return response()->json([
            'message' => 'User created successfully',
            'user_type' => $type,
            'permissions' => $user->getPermissions(),
        ]);
    }
}