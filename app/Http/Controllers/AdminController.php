<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use App\Jplist;

class AdminController extends Controller
{
    //
    public function showjson()
    {
        if(request('id'))
        {

        }
    }
    public function showcreatejson()
    {
        $jplists = Jplist::get();
        return view('createjson', compact('jplists'));
    }
    public function createnewjson(Request $request)
    {
        $jplists = Jplist::get();
        dd($request);

        $json_data = [];
        $eng = $request->en;
        $jp = $request->jp;
        
        for($i=0,$j=0;$i<count($eng);$i++,$j++)
        {
            if($eng[$i])
                $json_data[$eng[$i]]=$jp[$j];
            
            // echo $eng
        }
        if($request->newfilename)
        {
            $newjson = new Jplist;
            $input_data = $json_data;
            // dd(count($eng),$json_data,$input_data);
            $newJsonString = json_encode($input_data, JSON_PRETTY_PRINT);
            // $json_data = "aaa";
            $path =  file_put_contents(base_path('resources/lang/'.$request->newfilename) , $newJsonString);
            if($path)
                {
                    $newjson->json_name = $request->newfilename;
                    $newjson->project_name = $request->newfilename;
                    $newjson->save();
                }

        }
        else 
        {
            $jplists = $request->id;
            foreach($jplists as $list)
            {
                
                // if()
            }
        }
        // dd($request->filename);
        // Storage::putFileAs('json', new File('/storage/'.$request->filename), $request->filename);
        // File::put('/storage/'.$request->filename , '');
        
        
     //    dd($path);
        if($path)
            return route('show');
    }
}
