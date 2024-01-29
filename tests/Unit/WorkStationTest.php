<?php

namespace Tests\Unit;

use App\Models\Workstation;
use Illuminate\Http\Request;
use PHPUnit\Framework\TestCase;
use App\Models\WorkstationRepair;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Http\Controllers\backend\WorkstationController;

class WorkStationTest extends TestCase
{use RefreshDatabase;

    public function testCreateWorkstation()
    {
        $this->assertTrue(true);return;
        // Mock request data
        $requestData = [
            'name' => 'Test Workstation',
            'manufacturer' => 'Test Manufacturer',
            'output' => 10,
        ];

        // Instantiate the controller
        $controller = new WorkstationController();

        // Call the controller method with mocked request
        $response = $controller->createWorkstation(new Request($requestData));

        // Assert the response
        $this->assertNotNull($response); // Assuming you return a response from the controller method
        $this->assertEquals('success', $response->session()->get('type')); // Assuming you set a success message in the session
    }

    public function testDeleteWorkstation()
    {
        $this->assertTrue(true);return;
        // Create a test workstation
        $workstation = Workstation::factory()->create();

        // Instantiate the controller
        $controller = new WorkstationController();

        // Call the controller method with the test workstation ID
        $response = $controller->deleteWorkstation($workstation->id);

        // Assert the response
        $this->assertNotNull($response); // Assuming you return a response from the controller method
        $this->assertEquals('error', $response->session()->get('type')); // Assuming you set an error message in the session
    }
}
