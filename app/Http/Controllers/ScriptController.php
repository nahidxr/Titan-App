<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Process;

use Illuminate\Http\Request;

class ScriptController extends Controller
{
    public function executeScript()
{
    // Path to the shell script
    $scriptPath = storage_path('scripts/restart_nginx.sh');

    // Execute the script
    $output = shell_exec("bash $scriptPath 2>&1");

    // Log the output or do something with it
    \Log::info($output);

    // Return a response to the user
    return response("Script executed successfully!");
}

    
}
