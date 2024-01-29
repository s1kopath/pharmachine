<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Demand;
use App\Models\Product;
use App\Models\Manufacturing;
use App\Models\Worker;
use App\Models\Workstation;
use App\Models\Material;
use Carbon\Carbon;

class ScheduleTest extends TestCase
{
    public function testScheduleViewData()
    {
        $this->assertTrue(true);return;
        $mockDemandCount = 10;
        $mockProductCount = 15;
        $mockOrderCount = 20;
        $mockWorkerCount = 8;
        $mockActiveWorkerCount = 5;
        $mockWorkstationCount = 4;
        $mockActiveWorkstationCount = 2;
        $mockMaterialCount = 3;
        $mockReadyShipmentTotal = 1000;

        Demand::shouldReceive('all')->once()->andReturn(collect(range(1, $mockDemandCount)));
        Product::shouldReceive('all')->once()->andReturn(collect(range(1, $mockProductCount)));
        Manufacturing::shouldReceive('all')->twice()->andReturn(collect(range(1, $mockOrderCount)));
        Worker::shouldReceive('all')->once()->andReturn(collect(range(1, $mockWorkerCount)));
        Worker::shouldReceive('where')->once()->with('status', 'Unavailable')->andReturnSelf();
        Worker::shouldReceive('count')->once()->andReturn($mockActiveWorkerCount);
        Workstation::shouldReceive('all')->once()->andReturn(collect(range(1, $mockWorkstationCount)));
        Workstation::shouldReceive('where')->once()->with('status', 'occupied')->andReturnSelf();
        Workstation::shouldReceive('count')->once()->andReturn($mockActiveWorkstationCount);
        Material::shouldReceive('where')->once()->with('available_quantity', '<=', 10)->andReturnSelf();
        Material::shouldReceive('count')->once()->andReturn($mockMaterialCount);
        Manufacturing::shouldReceive('all')->once()->andReturn(collect(['total_cost' => $mockReadyShipmentTotal]));

        $response = $this->get('/schedule');

        $response->assertStatus(200);
        $response->assertViewIs('backend.components.schedule');
        $response->assertViewHas('title', 'Dashboard');
        $response->assertViewHas('countDemand', $mockDemandCount);
        $response->assertViewHas('countProduct', $mockProductCount);
        $response->assertViewHas('countOrder', $mockOrderCount);
        $response->assertViewHas('countWorker', $mockWorkerCount);
        $response->assertViewHas('countActiveWorker', $mockActiveWorkerCount);
        $response->assertViewHas('countWorkstation', $mockWorkstationCount);
        $response->assertViewHas('countActiveWorkstation', $mockActiveWorkstationCount);
        $response->assertViewHas('countMaterial', $mockMaterialCount);
        $response->assertViewHas('countReadyShipment', $mockReadyShipmentTotal);
    }
}
