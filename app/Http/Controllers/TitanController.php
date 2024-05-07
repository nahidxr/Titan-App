<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VideoParameter;
use Illuminate\Support\Facades\File;
use App\Enums\Status;
use App\Models\M3u8File;



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
            'regulation_name' => 'required',
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
            $videoParameter->regulation_name = $request->regulation_name;
            
            // You can set other attributes here as well if needed
    
            // Save the new record to the database
            $videoParameter->save();

            //update nginx configuration file
            $this->updateNginxConfig();
    
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
            'regulation_name' => 'required',
            'audio_bitrate' => 'required|numeric',
            'video_bitrate' => 'required|numeric',
            'status' => 'required',

        ]);

        try {
            // Find the video parameter by its ID
            $videoParameter = VideoParameter::findOrFail($id);

              // Update status and write_to_nginx attributes
              $videoParameter->status = 0;
              $videoParameter->write_to_nginx = 1;
              $videoParameter->save();
  
              // Call updateNginxConfig function
              $this->updateNginxConfig();

            // Update the attributes with the validated data
            $videoParameter->audio_bitrate = $request->audio_bitrate;
            $videoParameter->video_bitrate = $request->video_bitrate;
            $videoParameter->status = $request->status;
            $videoParameter->regulation_name = $request->regulation_name;


            
            // Save the updated record to the database
            $videoParameter->save();

            $this->updateNginxConfig();

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
             // Update status and write_to_nginx attributes
            $videoParameter->status = 0;
            $videoParameter->write_to_nginx = 1;
            $videoParameter->save();

            // Call updateNginxConfig function
            $this->updateNginxConfig();
           

            // Delete the video parameter
            $videoParameter->delete();

            // Redirect back with success message
            return redirect()->back()->with('message', 'Video parameter deleted successfully!');
        } catch (\Exception $e) {
            // Handle any errors that occur during the deletion process
            return redirect()->back()->with('error', 'Failed to delete video parameter. Please try again.');
        }
    }


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
            $newLines = ''; // Initialize an empty string to store all the new lines
            
            // Iterate over each video parameter
            foreach ($videoParameters as $index => $parameter) {
                $audioBitrate = $parameter->audio_bitrate . 'k'; // Add 'k' after audio bitrate
                $videoBitrate = $parameter->video_bitrate . 'k'; // Add 'k' after video bitrate
                $url = $parameter->regulation_name;
                
                if ($parameter->status == 0 && $parameter->write_to_nginx == 1) {
                    // Remove line from configuration file if status is 1
                    while (($posToRemove = strpos($nginxConfig, "-c:a aac -strict -2 -b:a $audioBitrate -c:v libx264 -vf scale=-2:240 -g 48 -keyint_min 48 -sc_threshold 0 -bf 3 -b_strategy 2 -b:v $videoBitrate -f flv rtmp://localhost/hls/$$url\n")) !== false) {
                        // Remove the line
                        $nginxConfig = substr_replace($nginxConfig, '', $posToRemove, strlen("-c:a aac -strict -2 -b:a $audioBitrate -c:v libx264 -vf scale=-2:240 -g 48 -keyint_min 48 -sc_threshold 0 -bf 3 -b_strategy 2 -b:v $videoBitrate -f flv rtmp://localhost/hls/$$url\n"));
                    }
                    // Update the write_to_nginx attribute
                    $parameter->write_to_nginx = 0;
                    $parameter->save();

                } elseif ($parameter->status == 1 && $parameter->write_to_nginx == 0) {
                    // Construct the configuration line if status is 0
                    $newLine = "\n-c:a aac -strict -2 -b:a $audioBitrate -c:v libx264 -vf scale=-2:240 -g 48 -keyint_min 48 -sc_threshold 0 -bf 3 -b_strategy 2 -b:v $videoBitrate -f flv rtmp://localhost/hls/$$url\n";
                    
                    // Add the new line to the string
                    $newLines .= $newLine;

                    // Update the write_to_nginx attribute
                    $parameter->write_to_nginx = 1;
                    $parameter->save();
                }
            }


            // Insert the new lines after the 'exec_push ffmpeg' line
            $nginxConfig = substr_replace($nginxConfig, rtrim($newLines, "\n"), $pos + strlen('exec_push ffmpeg -i rtmp://localhost/live/$name -async 1 -vsync -1') + 1, 0);

            // Write the updated configuration back to the file
            File::put($nginxConfigPath, $nginxConfig);

            // Restart Nginx server
            exec("/usr/bin/systemctl restart nginx");

            return "Nginx configuration updated successfully!";
        } else {
            return "Failed to find the 'exec_push ffmpeg' line in the Nginx configuration file.";
        }
    }

    public function titan_rediant()
    {
        //fetch stream file from mnt/hls
          $this->getM3U8Files();
        // Fetch all M3U8 files using the model
        $m3u8Files = M3u8File::all();
    
        // Check if there are any M3U8 files
        if ($m3u8Files->isEmpty()) {
            return "No M3U8 files found.";
        }
    
        // Return the view with the M3U8 files
        return view('admin.titan_live.rediant_index', ['m3u8Files' => $m3u8Files]);
    }

    public function getM3U8Files()
    {
        // Directory where the M3U8 files are located
        $directory = '/mnt/hls';

        // Check if the directory exists
        if (!is_dir($directory)) {
            return "Directory not found: $directory";
        }

        // Scan the directory for M3U8 files
        $m3u8Files = [];
        $files = scandir($directory);
        foreach ($files as $file) {
            // Filter out files with the .m3u8 extension
            if (pathinfo($file, PATHINFO_EXTENSION) === 'm3u8') {
                // Check if the file already exists in the database
                if (!M3u8File::where('filename', $file)->exists()) {
                    // Create a new M3u8File record
                    $m3u8File = new M3u8File();
                    $m3u8File->filename = $file;
                    $m3u8File->save();
                }
                $m3u8Files[] = $file;
            }
        }

        // Return the list of M3U8 files
        return $m3u8Files;
}



}
