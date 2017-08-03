<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function getAllStudent(){
        $allStudent = Mahasiswa::get();
        return response()->json($allStudent, 200);
    }

    public function addStudent(Request $request){
        /*
        ** use DB-transaction to check wether the code run successfuly or not
        */
        DB::beginTransaction();

        /*
        ** wrap the code in try&catch method
        */
        try {

            $this->validate($request, [
                'name' => 'required',
                'fakultas' => 'required',
                'gender' => 'required'
            ]);

            $name = $request->input('name');
            $fakultas = $request->input('fakultas');
            $gender = $request->input('gender');

            /*
            ** Use Eloquent method to fill in the db
            */
            $std = new Mahasiswa;
            $std->name = $name;
            $std->fakultas = $fakultas;
            $std->gender = $gender;
            $std->save(); //save data into db

            DB::commit();
            return response()->json(["message" => "Add new student SUCCESS!!"], 200); //success response
            }

        catch(\Exception $e){
            DB::rollback();
            return response()->json(["message" => $e->getMessage()], 500); //failed response
        }

    }
    
    public function removeStudent(){
        DB::beginTransaction();

        try{
            $this->validate($request, [
                'id' => 'required'
            ]);

            $id = (integer)$request->input('id');
            $std = Mahasiswa::find($id);

            if (empty($usr)) {
                return response()->json(["Message" => "Mahasiswa Not Found"], 404);
            }

            $std->delete();

            DB::commit();
            return response()->json(["Message" => "Mahasiswa is Deleted"], 200);
            }

        catch(\Exception $e){
            DB::rollback();
            return response()->json(["Message" => $e->getMessage()], 500);
        }
    }
}
