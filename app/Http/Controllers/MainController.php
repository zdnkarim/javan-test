<?php

namespace App\Http\Controllers;

use App\Models\Family;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(){
        $datas = Family::all();
        return view('index',compact('datas'));
    }

    public function indexById($id){
        $datas = Family::all();
        $data = Family::find($id);
        $isEmpty = false;
        return view('add',compact('datas','data','isEmpty'));
    }

    public function challange($no) {
        if($no == 3){
            // mendapatkan semua anak budi
            $datas = Family::where('role','child')->get();
        }
        elseif($no == 4){
            // mendapatkan cucu budi
            $datas = Family::where('role','grandchild')->get();
        }
        elseif($no == 5){
            // mendapatkan cucu perempuan dari budi
            $datas = Family::where('role','grandchild')->where('gender','female')->get();
            
        }
        elseif($no == 6){
            // mendapatkan bibi dari Farah
            $datas = Family::where('role','child')->where('gender','female')->get();
            
        }
        elseif($no == 7){
            // mendapatkan sepupu laki-laki dari Hani
            $datas = Family::where('role','grandchild')->where('gender','male')->get();
            
        }
        return view('index',compact('datas'));
    }

    public function add(){
        $datas = Family::all();
        $isEmpty = true;
        return view('add',compact('datas','isEmpty'));
    }

    public function store(Request $request){
        $datas = new Family();
        $datas->name = $request->name;
        $datas->gender = $request->gender;
        $datas->role = $request->role;
        $datas->child_of = $request->child_of;
        $datas->save();
        return redirect('/');
    }

    public function update($id, Request $request){
        $datas = Family::find($id);
        $datas->name = $request->name;
        $datas->gender = $request->gender;
        $datas->role = $request->role;
        $datas->child_of = $request->child_of;
        $datas->save();
        return redirect('/');
    }

    public function delete($id){
        Family::find($id)->delete();
        return redirect('/');
    }
}
