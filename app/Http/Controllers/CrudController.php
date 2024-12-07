<?php

namespace App\Http\Controllers;

use App\Models\Crud;
use Illuminate\Http\Request;

class CrudController extends Controller
{

    public function create(){
        return view('admin.crud.create');
    }

    public function store(Request $request){

        $this->validate($request, [
  
        'name' => 'required',
        'address' => 'required',
        'description' => 'required',
        'image' => '',


    ]);

    // dd($request->all());

    $image = $request->image;
    $image_new_name = time() . '.' . $image->extension();
   $image_name = $image->move('uploads/crud', $image_new_name);

    // dd($image_new_name);


        $data = new Crud();
        $data->name = $request->name;
        $data->address = $request->address;
        $data->description = $request->description;
        $data->image = $image_new_name;
        $data->save();
        return redirect()->route('crud.index');



    }

    public function index(){
        $data = Crud::all();
        // dd($data);
        return view('admin.crud.index',compact('data'));
    }

    public function edit($id){
        $data = Crud::find($id);
        return view('admin.crud.edit',compact('data'));
    }

    public function update(Request $request,$id){
        $this->validate($request, [
  
            'name' => 'required',
            'address' => 'required',
            'description' => 'required',
            'image' => '',
    
    
        ]);

        if ($request->image) {
            $image = $request->image;
            $image_new_name = time() . '.' . $image->extension();
             $image_name = $image->move('uploads/crud', $image_new_name);


           $data = Crud::find($id);
           $data->name = $request->name;
           $data->address = $request->address;
           $data->description = $request->description;
           $data->image = $image_new_name;
           $data->save();
           return redirect()->route('crud.index');
        }
        else {
            $data = Crud::find($id);
            $data->name = $request->name;
            $data->address = $request->address;
            $data->description = $request->description;
            $data->save();
            return redirect()->route('crud.index');
        }

  

    }

    public function delete($id){
        $data = Crud::find($id);
        $data->delete();
        return redirect()->route('crud.index');

    }
}







