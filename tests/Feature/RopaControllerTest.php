<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\ropa;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RopaControllerTest extends TestCase
{

    // TEST GET ALL
    public function test_get_all()
    {
        $response = $this->get('/ropas');
        $response->assertStatus(200);
    }

    // TEST GET BYID
    public function test_by_id()
    {
        $response = $this->get('/ropa/2');
        $response->assertStatus(200);
    }
    
    // TEST CREATE
    public function test_create()
    {
        $data = [
            'nombre' => 'CamisaTest',
            'marca' => 'MarcaTest',
            'talla' => 'MTest',
            'color' => 'AzulTest',
            'precio' => 12.34,
            'existencia' => 100,
            'estado' => 1,
        ];

        $response = $this->post('/ropacreate', $data);

        $response->assertStatus(201);
        
        $response->assertJsonStructure([
            'message',
            'ropa' => [
                'id',
                'nombre',
                'marca',
                'talla',
                'color',
                'precio',
                'existencia',
                'estado',
            ]
        ]);

        $this->assertDatabaseHas('ropa', [
            'nombre' => 'Camisa',
            'marca' => 'MarcaX',
            'talla' => 'M',
            'color' => 'Azul',
            'precio' => 29.99,
            'existencia' => 100,
            'estado' => 1,
        ]);
    }

    // TEST UPDATE
    public function test_update()
    {
        $ropa = ropa::create([
            'nombre' => 'Camisa',
            'marca' => 'Marca',
            'talla' => 'M',
            'color' => 'Rojo',
            'precio' => 15.00,
            'existencia' => 50,
            'estado' => 1,
        ]);

        $data = [
            'nombre' => 'CamisaActualizadatest',
            'marca' => 'MarcaActualizadaTest',
            'talla' => 'MActualizadaTest',
            'color' => 'AzulActualizadaTest',
            'precio' => 12.34,
            'existencia' => 100,
            'estado' => 1,
        ];

    
        $response = $this->put('/ropaupdate/' . $ropa->id, $data);

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'message',
            'ropa' => [
                'id',
                'nombre',
                'marca',
                'talla',
                'color',
                'precio',
                'existencia',
                'estado',
            ]
        ]);

        $this->assertDatabaseHas('ropa', [
            'id' => $ropa->id,
            'nombre' => 'CamisaActualizadatest',
            'marca' => 'MarcaActualizadaTest',
            'talla' => 'MActualizadaTest',
            'color' => 'AzulActualizadaTest',
            'precio' => 12.34,
            'existencia' => 100,
            'estado' => 1,
        ]);
    }

    // TEST DELETE
    public function test_delete()
    {
        $ropa = ropa::create([
            'nombre' => 'CamisaEliminar',
            'marca' => 'MarcaEliminar',
            'talla' => 'L',
            'color' => 'Verde',
            'precio' => 20.00,
            'existencia' => 30,
            'estado' => 1,
        ]);

        $response = $this->delete('/ropadelete/' . $ropa->id);

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'message',
        ]);

        $this->assertDatabaseMissing('ropa', [
            'id' => $ropa->id,
            'nombre' => 'CamisaEliminar',
            'marca' => 'MarcaEliminar',
            'talla' => 'L',
            'color' => 'Verde',
            'precio' => 20.00,
            'existencia' => 30,
            'estado' => 1,
        ]);
    }

}