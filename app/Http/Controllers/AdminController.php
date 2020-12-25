<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use App\Jplist;

class AdminController extends Controller
{
    //
    public function index()
    {

        return view('home');
    }
    public function adminDashboard()
    {
        $jplist = Jplist::get();

        return view('dashboard' , compact('jplist'));
    }
    public function showjson()
    {
        if(request('id'))
        {
            $jplist = Jplist::where('id',request('id'))->get()->first();
            $id = request('id');
        }
        $jsonString = file_get_contents(storage_path('app/public/json/'.$jplist->json_name));
        $json_data = json_decode($jsonString, true);
        $json_data_reverse = [];
        $json_sorted = [];
        $key_list = [];
        $key_list_reverse = [];
        $json_reverse_sorted = [];
        foreach($json_data as $key=>$data)
        {
            $key_list[] = $key;
            $key_list_reverse[] = $data;
            $json_data_reverse[$data] = $key;
        }
        natcasesort($key_list);
        natcasesort($key_list_reverse);
        foreach($key_list as $key)
        {
            $json_sorted[$key] = $json_data[$key];
        }
        foreach($key_list_reverse as $key)
        {
            $json_reverse_sorted[$key] = $json_data_reverse[$key];
        }



        return view('showjsondata',compact('json_sorted','json_reverse_sorted','id'));
    }
    public function showcreatejson()
    {
        $jplists = Jplist::get();
        return view('createjson', compact('jplists'));
    }
    public function createnewjson(Request $request)
    {
        $jplists = Jplist::get();
        // dd($request);

        $json_data = [];
        $eng = $request->en;
        $jp = $request->jp;


        if($request->newfilename)
        {
            for($i=0,$j=0;$i<count($eng);$i++,$j++)
            {
                if($eng[$i])
                    $json_data[$eng[$i]]=$jp[$j];

                // echo $eng
            }

            $newjson = new Jplist;
            $input_data = $json_data;
            // dd(count($eng),$json_data,$input_data);
            $newJsonString = json_encode($input_data, JSON_PRETTY_PRINT);
            // $json_data = "aaa";
            $path =  file_put_contents(storage_path('app/public/json/'.$request->newfilename) , $newJsonString);
            if($path)
                {
                    $newjson->json_name = $request->newfilename;
                    $newjson->project_name = $request->newfilename;
                    $newjson->save();
                }

        }
        if($request->id)
        {
            $jplists = $request->id;
            foreach($jplists as $list)
            {
                // dd($list);
                $jsonString = file_get_contents(storage_path('app/public/json/'.$list));
                $json_data = json_decode($jsonString, true);

                for($i=0,$j=0;$i<count($eng);$i++,$j++)
                {
                    if($eng[$i])
                        $json_data[$eng[$i]]=$jp[$j];

                }

                $newJsonString = json_encode($json_data, JSON_PRETTY_PRINT);

                $path =  file_put_contents(storage_path('app/public/json/'.$list) , $newJsonString);

            }
        }
        // dd($request->filename);
        // Storage::putFileAs('json', new File('/storage/'.$request->filename), $request->filename);
        // File::put('/storage/'.$request->filename , '');


     //    dd($path);
        if($path)
            return redirect()->route('home');
    }
    public function downloadjson()
    {
        $jplist = Jplist::where('id',request('id'))->get()->first();

        $jsonString = file_get_contents(storage_path('app/public/json/'.$jplist->json_name));
        // echo $request->id;
        return response()->download($jsonString);
    }
}
