<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FamiliaProfesionalControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_controladores(): void
    {
        /**
         * familias profesionales index test.
         */
        $response = $this->get('/familias_profesionales');

        $response
        ->assertStatus(200)
        ->assertViewIs('familias_profesionales.index');

        /**
         * familias profesionales show test.
         */
            $response = $this->get("/familias_profesionales/show/1");

            $response
            ->assertStatus(200)
            ->assertViewIs('familias_profesionales.show')
            ->assertSeeText('ACEC2', $escaped = true);

            $response = $this->get("/familias_profesionales/show/2");

            $response
            ->assertSeeText('ACFI3', $escaped = true);

            $response = $this->get("/familias_profesionales/show/A");
            $response->assertNotFound();

        /**
         * familias profesionales create test.
         */
            $value = 'Añadir familias profesional';
            $response = $this->get('/familias_profesionales/create');

            $response
            ->assertStatus(200)
            ->assertViewIs('familias_profesionales.create')
            ->assertSeeText($value, $escaped = true);

        /**
         * familias profesionales edit test.
         */
            $id = rand(1, 10);
            $value = "Modificar familias profesional";
            $response = $this->get("/familias_profesionales/edit/$id");

            $response
            ->assertStatus(200)
            ->assertViewIs('familias_profesionales.edit')
            ->assertSeeText($value, $escaped = true);

            $response = $this->get("/familias_profesionales/edit/A");
            $response->assertNotFound();

    }
}
