<?php

use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

beforeEach(function () {
    $this->seed();
});

test('contact page loads successfully', function () {
    $response = $this->get(route('contact.index'));

    $response->assertStatus(200)
        ->assertSee('Contact')
        ->assertSee('DO-RYT');
});

test('contact form validation fails with empty input', function () {
    $response = $this->post(route('contact.post'), [
        'name' => '',
        'email' => '',
        'message' => '',
    ]);

    $response->assertSessionHasErrors(['name', 'email', 'message']);
});

test('contact form validation fails with invalid email', function () {
    $response = $this->post(route('contact.post'), [
        'name' => 'John Doe',
        'email' => 'not-an-email',
        'message' => 'This is a test message that is long enough.',
    ]);

    $response->assertSessionHasErrors(['email']);
});

test('contact form detects honeypot spam', function () {
    $response = $this->post(route('contact.post'), [
        'name' => 'John Doe',
        'email' => 'john@gmail.com',
        'message' => 'This is a test message that is long enough.',
        'website' => 'http://spam.com',
    ]);

    $response->assertSessionHasErrors(['website']);
});

test('contact form submission succeeds with valid data', function () {
    $response = $this->post(route('contact.post'), [
        'name' => 'John Doe',
        'email' => 'john@gmail.com',
        'company' => 'Acme Corp',
        'phone' => '+1234567890',
        'message' => 'This is a valid test message that is at least ten characters.',
    ]);

    $response->assertRedirect()
        ->assertSessionHas('success');
});
