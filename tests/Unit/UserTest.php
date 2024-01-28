<?php

namespace Tests\Unit;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\PasswordReset;
use PHPUnit\Framework\TestCase;
use Illuminate\Routing\Redirector;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Password;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Http\Controllers\backend\UserController as BackendUserController;

class UserTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    // public function test_example()
    // {
    //     $this->assertTrue(true);
    // }


    // public function testForgetFormSubmitWithEmailExists()
    // {
    //     // Mock User model
    //     $user = new User();
    //     $user->email = 'existing@example.com';

    //     // Create a new request with an existing email
    //     $request = new Request(['email' => $user->email]);

    //     // Mock Password facade
    //     Password::shouldReceive('sendResetLink')
    //         ->once()
    //         ->with(['email' => $user->email])
    //         ->andReturn(true);

    //     // Create UserController instance
    //     $controller = new BackendUserController();

    //     // Call forgetFormSubmit method
    //     $response = $controller->forgetFormSubmit($request);

    //     // Assert redirection
    //     $this->assertTrue($response->isRedirect());
    //     $this->assertTrue($response->isRedirect(route('forgetPassword.form'))); // Replace with actual route name

    //     // Assert session data
    //     $this->assertTrue(session()->has('success'));
    //     $this->assertEquals('An email has been sent to your address.', session('success'));
    // }


    // public function testForgetFormSubmitWithEmailDoesNotExist()
    // {
    //     $request = new Request(['email' => 'nonexistent@example.com']);

    //     $passwordMock = $this->getMockBuilder(Password::class)->getMock();
    //     $passwordMock->expects($this->never())->method('sendResetLink');

    //     $controller = new BackendUserController();
    //     $response = $controller->forgetFormSubmit($request);

    //     $this->assertNotNull($response);
    //     $this->assertEquals('error', $response->getSession()->get('status'));
    // }

    // public function testShowResetFormWithValidTokenAndEmail()
    // {
    //     $token = 'valid_token';
    //     $email = 'user@example.com';
    //     $created_at = Carbon::now()->subMinutes(1);

    //     $passwordResetMock = $this->getMockBuilder(PasswordReset::class)
    //         ->disableOriginalConstructor()
    //         ->getMock();

    //     // Mocking the methods
    //     $builderMock = $this->getMockBuilder(Builder::class)
    //         ->disableOriginalConstructor()
    //         ->getMock();

    //     $passwordResetMock->expects($this->once())
    //         ->method('where')
    //         ->willReturn($builderMock);

    //     $builderMock->expects($this->once())
    //         ->method('first')
    //         ->willReturn((object) [
    //             'email' => $email,
    //             'created_at' => $created_at,
    //         ]);

    //     $controller = new BackendUserController();
    //     $response = $controller->showResetForm($token, $email);

    //     $this->assertEquals('backend.workerModules.forgetPassword.reset-password', $response->getName());
    //     $this->assertEquals($token, $response->getData()['token']);
    //     $this->assertEquals($email, $response->getData()['email']);
    // }

    // public function testShowResetFormWithExpiredToken()
    // {
    //     $token = 'expired_token';
    //     $email = 'user@example.com';
    //     $created_at = Carbon::now()->subMinutes(3);

    //     $passwordResetMock = $this->getMockBuilder(PasswordReset::class)->getMock();
    //     $passwordResetMock->shouldReceive('where')->once()->andReturnSelf();
    //     $passwordResetMock->shouldReceive('where')->once()->andReturnSelf();
    //     $passwordResetMock->shouldReceive('first')->once()->andReturn((object) [
    //         'email' => $email,
    //         'created_at' => $created_at,
    //     ]);

    //     $controller = new BackendUserController();
    //     $response = $controller->showResetForm($token, $email);

    //     $this->assertNotNull($response);
    //     $this->assertEquals('login.form', $response->getTargetUrl());
    // }
}
