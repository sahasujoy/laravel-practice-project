<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CrudController extends Controller
{
    //
    public function addMmrs(Request $req)
    {
        $data = DB::table('datas')->get();
        $data->title = $req->title;
        $data->description = $req->description;
        $data->file = $req->file('file')->store('apiFiles');
        $result = $data->save();
        if($result)
        {
            Return ["Result" => "Data has been saved"];
        }
        else
        {
            Return ["Result" => "Something went wrong"];
        }
    }
}
