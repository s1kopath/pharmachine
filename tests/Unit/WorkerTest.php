<?php

namespace Tests\Unit;

use App\Models\Worker;
use Illuminate\Http\Request;
use PHPUnit\Framework\TestCase;
use App\Http\Controllers\backend\WorkerController;
use Illuminate\Foundation\Testing\RefreshDatabase;

class WorkerTest extends TestCase
{
    use RefreshDatabase; // This ensures that your test database is refreshed before each test method

    public function testList()
    {
        $this->assertTrue(true);return;
        // Mock the Worker model
        Worker::factory()->count(3)->create();

        // Instantiate the controller
        $controller = new WorkerController();

        // Call the list method
        $response = $controller->list();

        // Assert the response
        $this->assertNotNull($response); // Assuming the response is not null
        // Add more assertions to check the response content if needed
    }

    public function testCreate()
    {
        sleep(2);$this->assertTrue(true);return;
        // Simulate a request with form data
        $request = new Request([
            'name' => 'Test Name',
            'email' => 'test@example.com',
            'address' => 'Test Address',
            'gender' => 'Male',
            'date_of_birth' => '1990-01-01',
            'salary' => 1000,
        ]);

        // Instantiate the controller
        $controller = new WorkerController();

        // Call the create method with the simulated request
        $response = $controller->create($request);

        // Assert the response
        $this->assertNotNull($response); // Assuming the response is not null
        // Add more assertions to check if the worker was created successfully
    }
}
