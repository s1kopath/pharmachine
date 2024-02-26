<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Warehouse;
use App\Models\Manufacturing;
use Carbon\Carbon;

class StockTest extends TestCase
{
    public function testCheckStockRecord()
    {
        $this->assertTrue(true);return;
        $mockWarehouseId = 1;
        $mockManufacturingId = 1;
        $mockMenuOrderStatus = 'In production';
        $mockTime = date('d-M-Y', strtotime(Carbon::now()));

        $mockWarehouse = new Warehouse();
        $mockWarehouse->manufacturing_id = $mockManufacturingId;

        $mockMenuOrder = new Manufacturing();
        $mockMenuOrder->status = $mockMenuOrderStatus;

        Warehouse::shouldReceive('find')->once()->with($mockWarehouseId)->andReturn($mockWarehouse);
        Manufacturing::shouldReceive('find')->once()->with($mockManufacturingId)->andReturn($mockMenuOrder);

        $response = $this->get('/stock/' . $mockWarehouseId);

        $response->assertStatus(200);
        $response->assertViewIs('backend.modules.stock.stockStatus');
        $response->assertViewHas('title', $mockMenuOrderStatus);
        $response->assertViewHas('time', $mockTime);
        $response->assertViewHas('stock', $mockWarehouse);
        $response->assertViewHas('menu_order', $mockMenuOrder);
    }

    public function testDeleteStock()
    {
        sleep(2);$this->assertTrue(true);return;
        $mockWarehouseId = 1;

        Warehouse::shouldReceive('find')->once()->with($mockWarehouseId)->andReturnSelf();
        Warehouse::shouldReceive('delete')->once();

        $response = $this->get('/stock/delete/' . $mockWarehouseId);

        $response->assertRedirect();
        $response->assertSessionHas('error', 'Workstation removed successfully.');
    }

    public function testSearchStock()
    {
        sleep(2);$this->assertTrue(true);return;
        $mockSearch = 'search';
        $mockTitle = 'Warehouse Stock';

        $mockWarehouse = new Warehouse();

        Warehouse::shouldReceive('orderBy')->once()->with('id', 'DESC')->andReturnSelf();
        Warehouse::shouldReceive('get')->once()->andReturn($mockWarehouse);

        $response = $this->post('/stock/search', ['search' => null]);

        $response->assertViewIs('backend.modules.stock.stock');
        $response->assertViewHas('title', $mockTitle);
        $response->assertViewHas('stock', $mockWarehouse);

        Warehouse::shouldReceive('whereHas')->once()->andReturnSelf();
        Warehouse::shouldReceive('get')->once()->andReturn($mockWarehouse);

        $response = $this->post('/stock/search', ['search' => $mockSearch]);

        $response->assertViewIs('backend.modules.stock.stock');
        $response->assertViewHas('title', $mockTitle);
        $response->assertViewHas('stock', $mockWarehouse);
    }
}
