<?php

namespace App\Http\Controllers;

use App\Models\Family;
use Exception;
use Illuminate\Http\Request;

class FamilyController extends Controller
{
    public function res($statusCode, $data, $message){
        $response = [
            "status" => $statusCode,
            "payload" => $data,
            "message" => $message,
        ];
        return $response;
    }
    public function index() {
        try {
            $data = Family::all();
            return response()->json([
                $this->res(200, $data, 'Successfully get all data')
            ]);
        } catch (Exception $e) {
            return response()->json([
                $this->res(500, $e->getMessage(),'error')
            ]);
        }
    }

    public function show($id) {
        try {
            $data = Family::find($id);
            if($data){
                return response()->json([
                    $this->res(200, $data, 'successfully get data id '.$id)
                ]);
            }else{
                return response()->json([
                    $this->res(404, 'cannot get data '.$id.'. Data not found','error')
                ]);
            }
        } catch (Exception $e) {
            return response()->json([
                $this->res(500, $e->getMessage(),'error')
            ]);
        }
    }

    public function store(Request $request) {
        try {
            $data = new Family();
            $data->name = $request->name;
            $data->gender = $request->gender;
            $data->role = $request->role;
            $data->child_of = $request->child_of;
            $data->save();
            return response()->json([
                $this->res(200, $data,'Successfully add data')
            ]);
        } catch (Exception $e) {
            return response()->json([
                $this->res(500, $e->getMessage(),'error')
            ]);
        }
    }

    public function update($id, Request $request) {
        try {
            $data = Family::find($id);
            $data->name = $request->name;
            $data->gender = $request->gender;
            $data->role = $request->role;
            $data->child_of = $request->child_of;
            $data->save();
            return response()->json([
                $this->res(200, $data,'Successfully update data')
            ]);
        } catch (Exception $e) {
            return response()->json([
                $this->res(500, $e->getMessage(),'error')
            ]);
        }
    }

    public function delete($id) {
        try {
            $data = Family::find($id);
            if($data){
                $data->delete();
                return response()->json([
                    $this->res(200, 'Successfully delete data '.$id,'Success')
                ]);
            }else{
                return response()->json([
                    $this->res(404, 'Cannot delete data '.$id.'. Data not found','Success')
                ]);
            }    
        } catch (Exception $e) {
            return response()->json([
                $this->res(500, $e->getMessage(),'error')
            ]);
        }
    }
}
