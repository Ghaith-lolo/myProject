<?php

namespace App\Http\Controllers;

use App\Models\Video;
use App\Events\VideoViewer;
use Illuminate\Http\Request;

class YoutupeController extends Controller
{
    public function getVideo()
    {
        $video = Video::first();
        event(new VideoViewer($video));
        return view('youtupe')->with(['video' => $video]);
    }
}
