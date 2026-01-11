<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use FFMpeg\FFMpeg;
use FFMpeg\Coordinate\TimeCode;

class VideoController extends Controller
{
    public function index() {
        $videos = Video::orderBy('created_at', 'desc')->get();
        return view('mainpage', compact('videos'));

    }

    public function show($id) {
        $video = Video::findOrFail($id);
        return view('video', compact('video'));
    }

    public function create() {
        return view('upload');
    }

    public function store(Request $request){
            
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'video' => 'required|file|max:307200',
        ]);
        
        $videoPath = $request->file('video')->store('videos', 'public');
        $fullVideoPath = storage_path('app/public/' . $videoPath);

        // Generate thumbnail using FFmpeg
        $thumbnailPath = null;
        try {
            $ffmpeg = FFMpeg::create([
                'ffmpeg.binaries'  => 'C:/Program Files (x86)/Digiarty/VideoProc Converter AI/ffmpeg.exe',
                'ffprobe.binaries' => 'C:/Program Files (x86)/Digiarty/VideoProc Converter AI/ffprobe.exe',
            ]);
            
            $video = $ffmpeg->open($fullVideoPath);
            
            $thumbnailName = uniqid() . '.jpg';
            $thumbnailPath = 'thumbnails/' . $thumbnailName;
            $fullThumbnailPath = storage_path('app/public/' . $thumbnailPath);
            
            // Create thumbnails directory if it doesn't exist
            if (!file_exists(dirname($fullThumbnailPath))) {
                mkdir(dirname($fullThumbnailPath), 0755, true);
            }
            
            // Extract frame at 1 second
            $video->frame(TimeCode::fromSeconds(1))
                  ->save($fullThumbnailPath);
                  
        } catch (\Exception $e) {
            // If thumbnail generation fails, log error but continue
            Log::error('Thumbnail generation failed: ' . $e->getMessage());
        }

        Video::create([
            'title' => $request->title,
            'description' => $request->description,
            'path' => $videoPath,
            'thumbnail' => $thumbnailPath,
            'account_id' => Auth::user()->id,
        ]);

        return redirect('/video/upload')->with('success', 'Video uploaded successfully!');
    }

}
