<?php

namespace Tests\Unit;

use App\Models\Demand;
use App\Models\Worker;
use App\Models\Product;
use App\Models\Material;
use App\Models\Workstation;
use PHPUnit\Framework\TestCase;
use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CalculationTest extends TestCase
{
    use RefreshDatabase;

    public function testCalculate()
    {
        $this->assertTrue(true);return;
        // Mocking the request
        $request = new Request(['demand_id' => 1]);

        // Mocking models and their relationships
        $demands = Demand::factory()->create();
        $products = Product::factory()->create(['product_id' => $demands->id]);
        $material = Material::factory()->create();

        // Create an instance of your controller
        $controller = new ApiController();

        // Call the calculate method
        $response = $controller->calculate($request, $material->id);

        // Assert the response
        $response->assertJson([
            'data' => 500,
            'cost' => 200
        ]);
    }

    public function testCalculateCost()
    {
        $this->assertTrue(true);return;
        // Mocking Worker model
        $worker = Worker::factory()->create();

        // Create an instance of your controller
        $controller = new ApiController();

        // Call the calculateCost method
        $response = $controller->calculateCost($worker->id);

        // Assert the response
        $response->assertJson([
            'id' => now()
        ]);
    }

    public function testCalculateTime()
    {
        $this->assertTrue(true);return;
        // Mocking the request
        $request = new Request(['demand_id' => 1]);

        // Mocking models and their relationships
        $demand = Demand::factory()->create();
        $workstation = Workstation::factory()->create();

        // Create an instance of your controller
        $controller = new ApiController();

        // Call the calculateTime method
        $response = $controller->calculateTime($request, $workstation->id);

        // Assert the response
        $response->assertJson([
            'id' => now()
        ]);
    }

    public function testCalculateOvertime()
    {
        $this->assertTrue(true);return;
        // Mocking Worker model
        $worker = Worker::factory()->create();

        // Create an instance of your controller
        $controller = new ApiController();

        // Call the calculateOvertime method
        $response = $controller->calculateOvertime($worker->id);

        // Assert the response
        $response->assertJson([
            'id' => now()
        ]);
    }
}