<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CicloControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_controladores(): void
    {
        /**
         * ciclos index test.
         */
        $response = $this->get('/ciclos');

        $response
        ->assertStatus(200)
        ->assertViewIs('ciclos.index');

        /**
         * ciclos show test.
         */
            $response = $this->get("/ciclos/show/1");

            $response
            ->assertStatus(200)
            ->assertViewIs('ciclos.show')
            ->assertSeeText('ACEC2', $escaped = true);

            $response = $this->get("/ciclos/show/2");

            $response
            ->assertSeeText('ACFI3', $escaped = true);

            $response = $this->get("/ciclos/show/A");
            $response->assertNotFound();

        /**
         * ciclos create test.
         */
            $value = 'Añadir ciclo';
            $response = $this->get('/ciclos/create');

            $response
            ->assertStatus(200)
            ->assertViewIs('ciclos.create')
            ->assertSeeText($value, $escaped = true);

        /**
         * ciclos edit test.
         */
            $id = rand(1, 10);
            $value = "Modificar ciclo";
            $response = $this->get("/ciclos/edit/$id");

            $response
            ->assertStatus(200)
            ->assertViewIs('ciclos.edit')
            ->assertSeeText($value, $escaped = true);

            $response = $this->get("/ciclos/edit/A");
            $response->assertNotFound();

    }
}
