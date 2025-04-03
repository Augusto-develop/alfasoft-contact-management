<?php

namespace Tests\Feature;

use App\Models\Contact;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ContactTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function testItContactCreate()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $contactData = [
            'name' => 'Robert',
            'phone' => '554896356',
            'email' => 'robert@example.com',
        ];

        $response = $this->post(route('contacts.store'), $contactData);

        $response->assertRedirect(route('contacts.index'));
        $this->assertDatabaseHas('contacts', $contactData);
    }

    /** @test */
    public function testItValidatesContactCreate()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->post(route('contacts.store'), [
            'name' => 'ana',
            'phone' => '123',
            'email' => 'not-a-valid-email',
        ]);

        $response->assertSessionHasErrors(['name', 'phone', 'email']);
    }

    /** @test */
    public function testeItContactUpdate()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $contact = Contact::factory()->create();
        $updatedData = [
            'name' => 'Robert Updated',
            'phone' => '987654321',
            'email' => 'updated-robert@example.com',
        ];

        $response = $this->put(route('contacts.update', $contact->id), $updatedData);

        $response->assertRedirect(route('contacts.index'));
        $this->assertDatabaseHas('contacts', $updatedData);
        $this->assertDatabaseMissing('contacts', ['name' => $contact->name]);
    }

    /** @test */
    public function testeItValidatesContactUpdate()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $contact = Contact::factory()->create();

        $response = $this->put(route('contacts.update', $contact->id), [
            'name' => 'Updated Name',
            'phone' => '1234567895',
            'email' => 'not-a-valid-email',
        ]);

        $response->assertSessionHasErrors(['phone']);
    }

    /** @test */
    public function testItContactDelete()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $contact = Contact::factory()->create();

        $response = $this->delete(route('contacts.destroy', $contact->id));

        $response->assertRedirect(route('contacts.index'));

        $this->assertDatabaseMissing('contacts', ['id' => $contact->id]);
    }
}
