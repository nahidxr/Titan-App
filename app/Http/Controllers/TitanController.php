<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VideoParameter;
use Illuminate\Support\Facades\File;
use App\Enums\Status;



class TitanController extends Controller
{
    public function index()
    {
        // Fetch all video parameters from the database
        $videoParameters = VideoParameter::all();
        
        // Pass the video parameters data to the view
        return view('admin.titan_live.index', compact('videoParameters'));
    }

    public function create()
    {
        $status = Status::asSelectArray();

        return view('admin.titan_live.create',compact('status'));

    }
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'audio_rate' => 'required|numeric',
            'video_rate' => 'required|numeric',
            'status' => 'required',
        ]);
    
        try {
            // Create a new instance of your model
            $videoParameter = new VideoParameter();
    
            // Set the attributes with the validated data
            $videoParameter->audio_bitrate = $request->audio_rate;
            $videoParameter->video_bitrate = $request->video_rate;
            $videoParameter->status = $request->status;
            
            // You can set other attributes here as well if needed
    
            // Save the new record to the database
            $videoParameter->save();
    
            // Redirect back with success message
            return redirect()->back()->with('message', 'Video parameter saved successfully!');
        } catch (\Exception $e) {
            // Handle any errors that occur during the process
            return redirect()->back()->with('error', 'Failed to save video parameter. Please try again.');
        }
    }
    public function edit($id)
    {
        $status = Status::asSelectArray();
        // Fetch the video parameter by its ID
        $videoParameter = VideoParameter::findOrFail($id);

        // Pass the fetched data to the view for editing
        return view('admin.titan_live.edit', compact('videoParameter','status'));
    }

    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $request->validate([
            'audio_bitrate' => 'required|numeric',
            'video_bitrate' => 'required|numeric',
            'status' => 'required',

        ]);

        try {
            // Find the video parameter by its ID
            $videoParameter = VideoParameter::findOrFail($id);

            // Update the attributes with the validated data
            $videoParameter->audio_bitrate = $request->audio_bitrate;
            $videoParameter->video_bitrate = $request->video_bitrate;
            $videoParameter->status = $request->status;

            
            // Save the updated record to the database
            $videoParameter->save();

            // Redirect back with success message
            return redirect()->back()->with('message', 'Video parameter updated successfully!');
        } catch (\Exception $e) {
            // Handle any errors that occur during the process
            return redirect()->back()->with('error', 'Failed to update video parameter. Please try again.');
        }
    }
    public function destroy($id)
    {
        try {
            // Find the video parameter by id
            $videoParameter = VideoParameter::findOrFail($id);

            // Delete the video parameter
            $videoParameter->delete();

            // Redirect back with success message
            return redirect()->back()->with('message', 'Video parameter deleted successfully!');
        } catch (\Exception $e) {
            // Handle any errors that occur during the deletion process
            return redirect()->back()->with('error', 'Failed to delete video parameter. Please try again.');
        }
    }


    // public function updateNginxConfig()
    // {
    //     // Fetch all video parameters from the database
    //     $videoParameters = VideoParameter::all();

    //     // Read Nginx configuration file
    //     $nginxConfigPath = "/etc/nginx/nginx.conf";
    //     $nginxConfig = File::get($nginxConfigPath);

    //     // Find the position of the 'exec_push ffmpeg' line
    //     $pos = strpos($nginxConfig, 'exec_push ffmpeg -i rtmp://localhost/live/$name -async 1 -vsync -1');

    //     if ($pos !== false) {
    //         // Iterate over each video parameter
    //         foreach ($videoParameters as $parameter) {
    //             $audioBitrate = $parameter->audio_bitrate . 'k'; // Add 'k' after audio bitrate
    //             $videoBitrate = $parameter->video_bitrate . 'k'; // Add 'k' after video bitrate
    //             $url = 'rtmp://localhost/hls/$name_low'; // Predefined URL
            
    //             // Construct the configuration line
    //             $newLine = "-c:a aac -strict -2 -b:a $audioBitrate -c:v libx264 -vf scale=-2:240 -g 48 -keyint_min 48 -sc_threshold 0 -bf 3 -b_strategy 2 -b:v $videoBitrate -f flv $url\n";
            
    //             // Insert the new line after the 'exec_push ffmpeg' line
    //             $nginxConfig = substr_replace($nginxConfig, $newLine, $pos + strlen('exec_push ffmpeg -i rtmp://localhost/live/$name -async 1 -vsync -1') + 1, 0);
    //         }
            

    //         // Write the updated configuration back to the file
    //         File::put($nginxConfigPath, $nginxConfig);

    //         return "Nginx configuration updated successfully!";
    //     } else {
    //         return "Failed to find the 'exec_push ffmpeg' line in the Nginx configuration file.";
    //     }
    // }
    public function updateNginxConfig()
    {
        // Fetch all video parameters from the database
        $videoParameters = VideoParameter::all();
    
        // Read Nginx configuration file
        $nginxConfigPath = "/etc/nginx/nginx.conf";
        $nginxConfig = File::get($nginxConfigPath);
    
        // Find the position of the 'exec_push ffmpeg' line
        $pos = strpos($nginxConfig, 'exec_push ffmpeg -i rtmp://localhost/live/$name -async 1 -vsync -1');
    
        if ($pos !== false) {
            // Iterate over each video parameter
            foreach ($videoParameters as $parameter) {
                $audioBitrate = $parameter->audio_bitrate . 'k'; // Add 'k' after audio bitrate
                $videoBitrate = $parameter->video_bitrate . 'k'; // Add 'k' after video bitrate
                $url = 'rtmp://localhost/hls/$name_low'; // Predefined URL
                
                if ($parameter->status == 1) {
                    // Remove line from configuration file if status is 1
                    $lineToRemove = "-c:a aac -strict -2 -b:a $audioBitrate -c:v libx264 -vf scale=-2:240 -g 48 -keyint_min 48 -sc_threshold 0 -bf 3 -b_strategy 2 -b:v $videoBitrate -f flv $url\n";
                    $nginxConfig = str_replace($lineToRemove, '', $nginxConfig);
                } else {
                    // Construct the configuration line if status is 0
                    $newLine = "-c:a aac -strict -2 -b:a $audioBitrate -c:v libx264 -vf scale=-2:240 -g 48 -keyint_min 48 -sc_threshold 0 -bf 3 -b_strategy 2 -b:v $videoBitrate -f flv $url\n";
                
                    // Insert the new line after the 'exec_push ffmpeg' line
                    $nginxConfig = substr_replace($nginxConfig, $newLine, $pos + strlen('exec_push ffmpeg -i rtmp://localhost/live/$name -async 1 -vsync -1') + 1, 0);
                }
            }
    
            // Write the updated configuration back to the file
            File::put($nginxConfigPath, $nginxConfig);
    
            return "Nginx configuration updated successfully!";
        } else {
            return "Failed to find the 'exec_push ffmpeg' line in the Nginx configuration file.";
        }
    }
    
    

    

}
