<?php

namespace App\Http\Controllers;
use Log;
use App\Sales;
use Illuminate\Http\Request;
use App\Jobs\SalesCsvProcess;

class SalesController extends Controller
{   public function index()
    {
        return view('upload');
    }
    public function upload(Request $request)
    {
        // $data =  array_map('str_getcsv',file(request()->mycsv));
         $data = file(request()->mycsv);
        // $header = $data[0];
        // unset($data[0]);
        //chunking file 
        $chunks = array_chunk($data,1000);
        //convert 1000 records into a new csv file 
        foreach($chunks as $key => $chunks) 
        {
            $name = "/tmp{$key}.csv";
            $path = resource_path('temp');
            // $path = $request->file('mycsv')->storeAs('samples',$name);
            
            file_put_contents($path.$name,$chunks);
           
        }
        // dd(count($chunks[0]));
        // foreach ($data as $value)
        // {
        //  $salesData = array_combine($header,$value);
        //  Sales::create($salesData); 
            
        // }
       
       // return "done";
    //    if (request()->has('mycsv')) {
        
        // $data   =   file(request()->mycsv);
        // Chunking file
        // $chunks = array_chunk($data, 1000);

        $header = [];
        

        // foreach ($chunks as $key => $chunk) {
        //     $data = array_map('str_getcsv', $chunk);

        //     if ($key === 0) {
        //         $header = $data[0];
        //         unset($data[0]);
        //     }
            
        // $path = resource_path('temp');
        $files = glob("$path/*.csv");
        foreach ($files as $key => $file)
        {   $data = array_map('str_getcsv',file($file));
            if ($key == 0) 
            {    $header = $data[0];
                 unset($data[0]);
                //  dd($data);
            }
            // foreach($data as $sale)
            // { 
            // $salesData = array_combine($header,$sale);
            // Sales::create($salesData); 
            // }
            
     
            Log::info(dispatch(new  SalesCsvProcess($data,$header)));
            
        }
        return "done";
        unlink($path);
    //    }
    
    
}  
    
//     public  function store()
//     {   
        
//         // $header = [];
//         // $path = resource_path('temp');
//         // $files = glob("$path/*.csv");
//         // foreach ($files as $key => $file)
//         // {   $data = array_map('str_getcsv',file($file));
//         //     if ($key == 0) 
//         //     {    $header = $data[0];
//         //          unset($data[0]);
//         //     }
//         //     foreach($data as $sale)
//         //     { 
//         //     $salesData = array_combine($header,$sale);
//         //     Sales::create($salesData); 
//         //     }
     
//         // }    
        
                

//         return "stored";
//     }
 }
