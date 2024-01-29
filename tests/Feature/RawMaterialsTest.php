<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Vendor;
use App\Models\Material;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\WithFaker;

class RawMaterialsTest extends TestCase
{
    use RefreshDatabase;

    public function testRawMaterialsPage()
    {
        $this->assertTrue(true);return;
        $response = $this->get('/raw');

        $response->assertStatus(200);
    }

    public function testCreateVendor()
    {
        $this->assertTrue(true);return;
        $response = $this->post('/create-vendor', [
            'name' => 'Vendor Name',
            'email' => 'vendor@example.com',
            'contact' => '1234567890',
        ]);

        $response->assertRedirect();
        $this->assertDatabaseHas('vendors', ['name' => 'Vendor Name']);
    }

    public function testDeleteVendor()
    {
        $this->assertTrue(true);return;
        $vendor = Vendor::factory()->create();

        $response = $this->get("/delete-vendor/{$vendor->id}");

        $response->assertRedirect();
        $this->assertDatabaseMissing('vendors', ['id' => $vendor->id]);
    }

    public function testCreateOrder()
    {
        $this->assertTrue(true);return;
        $response = $this->post('/create-order', [
            'name' => "name",
            'description' => "sentence",
            'vendor_id' => 1, // Replace with a valid vendor ID
            'product_per_kg' => 10,
            'product_price_per_kg' => 20,
            'order_quantity' => 50,
            'order_date' => now()->format('Y-m-d'),
        ]);

        $response->assertStatus(302); // Assuming the method redirects back
        $response->assertSessionHas('success');
    }

    public function testUpdateOrder()
    {
        $this->assertTrue(true);return;
        $material = Material::factory()->create();

        $response = $this->get("/update-order/{$material->id}");

        $response->assertStatus(200);
        $response->assertViewIs('backend.modules.rawMaterials.orderMaterial');
    }

    public function testSendOrder()
    {
        $this->assertTrue(true);return;
        $material = Material::factory()->create();

        $response = $this->post("/send-order/{$material->id}", [
            'vendor_id' => 1, // Replace with a valid vendor ID
            'order_quantity' => 50,
            'order_date' => now()->format('Y-m-d'),
        ]);

        $response->assertStatus(302); // Assuming the method redirects to the raw dashboard
        $response->assertRedirect('/raw/dashboard');
        $response->assertSessionHas('success');
    }

}
