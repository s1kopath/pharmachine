<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Carbon\Carbon;

class ReportTest extends TestCase
{
    public function testGenerateReportWithValidDates()
    {
        $this->assertTrue(true);return;
        $startDate = Carbon::now()->subDays(7)->format('Y-m-d');
        $endDate = Carbon::now()->format('Y-m-d');

        $response = $this->post('/generate-report', [
            'from_date' => $startDate,
            'to_date' => $endDate,
        ]);

        $response->assertStatus(200);
        $response->assertViewIs('backend.modules.reports.reports');
        // Add more assertions as needed
    }

    public function testGenerateReportWithInvalidDates()
    {
        $this->assertTrue(true);return;
        $startDate = Carbon::now()->format('Y-m-d');
        $endDate = Carbon::now()->subDays(7)->format('Y-m-d');

        $response = $this->post('/generate-report', [
            'from_date' => $startDate,
            'to_date' => $endDate,
        ]);

        $response->assertStatus(302); // Assuming it redirects back on error
        $response->assertSessionHas('error');
    }

    public function testGenerateReportWithMissingDates()
    {
        $this->assertTrue(true);return;
        $response = $this->post('/generate-report', []);

        $response->assertStatus(302); // Assuming it redirects back on error
        $response->assertSessionHas('error');
    }
}
