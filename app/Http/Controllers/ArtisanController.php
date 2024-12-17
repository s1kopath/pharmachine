<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Http\Request;

class ArtisanController extends Controller
{
    // Show the terminal view
    public function showTerminal()
    {
        return view('artisan-terminal');
    }

    // Execute Artisan command
    public function executeCommand(Request $request)
    {
        $command = $request->input('command');

        // Security: Define a whitelist of allowed commands
        $availableCommands = [
            'migrate',
            'optimize:clear',
            'config:cache',
            'config:clear',
            'route:cache',
            'route:clear',
            'view:cache',
            'view:clear',
            'cache:clear',
            'queue:restart',
            'event:cache',
            'event:clear',
            'storage:link',
            'schedule:run',
            'migrate:fresh',
            'db:seed',
        ];

        $parts = explode(' ', $command);
        $baseCommand = $parts[0];

        if (!in_array($baseCommand, $availableCommands)) {
            return response()->json([
                'status' => 'error',
                'output' => 'Command not allowed.',
            ], 403);
        }

        try {
            Artisan::call($command);
            return response()->json([
                'status' => 'success',
                'output' => Artisan::output(),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'output' => $e->getMessage(),
            ]);
        }
    }
}
