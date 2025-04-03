<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ContactTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_contact_creation(): void
    {
        $response = $this->post('/contacts', [
            'name' => 'Teste',
            'phone' => '923456789',
            'email' => 'teste@email.com'
        ]);
        $response->assertRedirect('/contacts');
    }
}
