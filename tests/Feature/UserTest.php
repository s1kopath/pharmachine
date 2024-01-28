<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    // public function test_example()
    // {
    //     $response = $this->get('/');

    //     $response->assertStatus(200);
    // }

    public function testShowLoginForm()
    {
        $response = $this->get('/'); // Assuming '/login' is the route to show login form
        $response->assertStatus(200); // Assuming the response status should be 200 OK
        $response->assertViewIs('backend.modules.login.login'); // Assuming the view returned is 'backend.modules.login.login'
    }

    public function testShowRegistrationForm()
    {
        $response = $this->get('/registration'); // Assuming '/registration' is the route to show registration form
        $response->assertStatus(200); // Assuming the response status should be 200 OK
        $response->assertViewIs('backend.modules.registration.registration'); // Assuming the view returned is 'backend.modules.registration.registration'
    }

    public function testForgetPasswordForm()
    {
        $response = $this->get('/forget-password'); // Assuming '/forget-password' is the route to show forget password form
        $response->assertStatus(200); // Assuming the response status should be 200 OK
        $response->assertViewIs('backend.workerModules.forgetPassword.forget-password'); // Assuming the view returned is 'backend.workerModules.forgetPassword.forget-password'
    }


    public function testUserRegistration()
    {
        $user = User::factory()->create([ // Use factory() to create a new user instance
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => bcrypt('password123'),
        ]);

        // $response = $this->post('/registration', [
            $response = $this->post(route('registration'), [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => 'password123',
        ]);

        $response->assertRedirect('/');
        $this->assertDatabaseHas('users', ['email' => 'john@example.com']);
    }

    public function testUserLogin()
    {
        // Assuming you have a user with the given credentials in the database
        $user = User::factory()->create([
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password123'),
            'role' => "admin"
        ]);

        $response = $this->post(route('login'), [
            'email' => 'admin@gmail.com',
            'password' => 'password123',
        ]);

        $response->assertRedirect(route('sch.dashboard'));
        $this->assertAuthenticatedAs($user);
    }

    public function testInvalidLoginCredentials()
    {
        // Assuming there's no user with the given credentials in the database
        $response = $this->post(route('login'), [
            'email' => 'invalid@example.com',
            'password' => 'invalidpassword',
        ]);

        $response->assertRedirect('/');
        $response->assertSessionHasErrors(['email'], 'Invalid login attempt. Please check your credentials.');
    }

}
