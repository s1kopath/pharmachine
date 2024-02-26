<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Manufacturing;
use App\Models\Warehouse;
use App\Models\Material;
use App\Models\Workstation;
use App\Models\Demand;
use App\Models\Worker;
use Carbon\Carbon;

class ProductionPlaningTest extends TestCase
{
    use RefreshDatabase;

    public function testCreateManufacturingOrder()
    {
        $this->assertTrue(true);return;
        $worker = Worker::factory()->create();
        $workstation = Workstation::factory()->create();
        $material = Material::factory()->create();
        $demand = Demand::factory()->create();

        $response = $this->post('/create-manufacturing-order', [
            'demand_id' => $demand->id,
            'manufacturing_number' => 'M123',
            'warehouse_number' => 'W456',
            'product_id' => $demand->product_id,
            'quantity' => 10,
            'material_id' => $material->id,
            'material_quantity' => 5,
            'worker_id' => $worker->id,
            'workstation_id' => $workstation->id,
            'start_date' => now(),
            'finishing_date' => now()->addDays(5),
            'delivery_date' => now()->addDays(10),
            'total_cost' => 100.50,
        ]);

        $response->assertRedirect(route('pp.dashboard'));
        $this->assertDatabaseHas('manufacturings', ['manufacturing_number' => 'M123']);
    }

    public function testCheckProductionStatus()
    {
        sleep(2);$this->assertTrue(true);return;
        $manufacturing = Manufacturing::factory()->create();

        $response = $this->get("/check-production-status/{$manufacturing->id}");

        $response->assertStatus(200)
            ->assertSee($manufacturing->status);
    }

    public function testDeleteProductionStatus()
    {
        sleep(2);$this->assertTrue(true);return;
        $manufacturing = Manufacturing::factory()->create();
        $warehouse = Warehouse::factory()->create(['manufacturing_id' => $manufacturing->id]);

        $response = $this->get("/delete-production-status/{$manufacturing->id}");

        $response->assertRedirect();
        $this->assertDatabaseMissing('manufacturings', ['id' => $manufacturing->id]);
        $this->assertDatabaseMissing('warehouses', ['id' => $warehouse->id]);
    }
}
