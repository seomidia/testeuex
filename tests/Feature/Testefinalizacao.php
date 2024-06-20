<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
class Testefinalizacao extends TestCase
{
    use RefreshDatabase;

    /**
     * Testa o cadastro de um novo usuário com dados válidos.
     *
     * @return void
     */
    public function testUserRegistration()
    {
        $response = $this->post('/login/register', [
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $response->assertStatus(302);
        $this->assertDatabaseHas('users', ['email' => 'johndoe@example.com']);
        $response->assertRedirect('/dashboard');
    }

    /**
     * Testa o cadastro com um email já existente.
     *
     * @return void
     */
    public function testUserRegistrationWithExistingEmail()
    {
        // Cria um usuário existente
        User::create([
            'name' => 'Existing User',
            'email' => 'existinguser@example.com',
            'password' => bcrypt('password'),
        ]);

        // Tenta registrar com o mesmo email
        $response = $this->post('/login/register', [
            'name' => 'John Doe',
            'email' => 'existinguser@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        // Verifica se a resposta HTTP é 302 (redirecionamento com erro)
        $response->assertStatus(302);
        $response->assertSessionHasErrors(['email']);
    }

    /**
     * Testa o cadastro com senhas não coincidentes.
     *
     * @return void
     */
    public function testUserRegistrationWithNonMatchingPasswords()
    {
        $response = $this->post('/login/register', [
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'password' => 'password',
            'password_confirmation' => 'different_password',
        ]);

        // Verifica se a resposta HTTP é 302 (redirecionamento com erro)
        $response->assertStatus(302);
        $response->assertSessionHasErrors(['password']);
    }
}
