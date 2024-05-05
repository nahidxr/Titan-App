<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;


use Google\ApiCore\ApiException;

class TestController extends Controller
{
    public function test(){

        $observiumUrl = 'http://103.57.151.230/api/v0/ports';
        $username = 'support';
        $password = 'Supp@rt#1';

        $client = new Client([
            'auth' => [$username, $password],
        ]);

        try {
            // Send HTTP GET request to the Observium API endpoint
            $response = $client->request('GET', $observiumUrl);

            // Check if the request was successful (status code 200)
            if ($response->getStatusCode() === 200) {
                // Get the response body (JSON data)
                $responseData = $response->getBody()->getContents();

                // Decode the JSON response
                $decodedResponse = json_decode($responseData, true);

                // Initialize an array to store extracted data for each port
                $extractedData = [];

                // Loop through each port in the response
                foreach ($decodedResponse['ports'] as $port) {
                    // Extract device_id, port_label, port_label_base, and human_speed from each port
                    $port_id = $port['port_id'];
                    $device_id = $port['device_id'];
                    $port_label = $port['port_label'];
                    $port_label_base = $port['port_label_base'];
                    $ifOperStatus = $port['ifOperStatus'];
                    $ifAdminStatus = $port['ifAdminStatus'];
                    $human_speed = $port['human_speed'];

                    // Prepare the extracted data for this port as an array
                    $portData = [
                        'port_id' => $port_id,
                        'device_id' => $device_id,
                        'port_label' => $port_label,
                        'port_label_base' => $port_label_base,
                        'ifOperStatus' => $ifOperStatus,
                        'ifAdminStatus' => $ifAdminStatus,
                        'human_speed' => $human_speed,
                    ];

                    // Add the port data to the array of extracted data
                    $extractedData[] = $portData;
                }

                // Return the extracted data as a JSON response
                return response()->json($extractedData);
            } else {
                // Handle other status codes if necessary
                return response()->json(['error' => 'Unexpected status code - ' . $response->getStatusCode()], 500);
            }
        } catch (\Exception $e) {
            // Handle any exceptions that occur during the request
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
