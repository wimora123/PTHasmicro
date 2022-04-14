<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Loop;

class AdminController extends Controller
{
    public function index(){
    	 if(!auth()->check()){
            return redirect()->to('/login')->with('failed', 'Login dulu!!!');
        }

        $loops = Loop::all();
    	return view('admin.admin');
    }

    public function nestedLoop(){
    	 if(!auth()->check()){
            return redirect()->to('/login')->with('failed', 'Login dulu!!!');
        }

        $loops = Loop::all();
    	return view('admin.nestedLoop')->with('loops', $loops);
    }

    public function insertLoop(){
    	 if(!auth()->check()){
            return redirect()->to('/login')->with('failed', 'Login dulu!!!');
        }

    	return view('admin.insertLoop');
    }

    public function addLoop(Request $request){
    	$rules=[
    		'input1'=>'required|min:5|max:100',
    		'input2'=>'required|min:5|max:100'
    	];

    	$rulesValidation=[
    		'input1.required' => 'Input 1 tidak boleh kosong',
    		'input1.min' => 'Input 1 minimal 5 karakter',
    		'input2.required' => 'Input 2 tidak boleh kosong',
    		'input2.min' => 'Input 2 minimal 5 karakter'
    	];

    	$this->validate($request, $rules, $rulesValidation);

    	$input1=$request->input1;
    	$input2=$request->input2;

    	$inputLoop = new Loop;

    	$inputLoop->input1 = $input1;
    	$inputLoop->input2 = $input2;
    	
    	$textCatch= $input1;
    	$searchInput=$input2;
    	$percentage=0;

    	for($i=0; $i<strlen($textCatch); $i++){
    		if(substr($textCatch,$i,1) == $searchInput){
    			$percentage= $percentage+1/strlen($textCatch);
    		}
    	}

    	$inputLoop->percentage = round($percentage*100,2);


    	$inputLoop->save();
        return redirect()->to('/nestedLoop')->with([
            'success' => 'Data berhasil ditambah'
        ]);
    }


    public function editLoop($id){
    	 if(!auth()->check()){
            return redirect()->to('/login')->with('failed', 'Login dulu!!!');
        }

        $getID = Loop::find($id);
    	return view('admin.editLoop')->with('getID', $getID);
    }

    public function updateLoop(Request $request, $id){
    	$rules=[
    		'input1'=>'required|min:5|max:100',
    		'input2'=>'required|min:5|max:100'
    	];

    	$rulesValidation=[
    		'input1.required' => 'Input 1 tidak boleh kosong',
    		'input1.min' => 'Input 1 minimal 5 karakter',
    		'input2.required' => 'Input 2 tidak boleh kosong',
    		'input2.min' => 'Input 2 minimal 5 karakter'
    	];

    	$this->validate($request, $rules, $rulesValidation);

    	$input1=$request->input1;
    	$input2=$request->input2;


		// $percentage=strlen($iterations)/strlen($input2)*100;

    	$inputLoop = Loop::where('id', $id)->first();

    	$inputLoop->input1 = $input1 ? $input1 : $inputLoop->input1;
    	$inputLoop->input2 = $input2 ? $input2 : $inputLoop->input2;

    	$textCatch=$inputLoop->input1 = $input1;
    	$searchInput=$inputLoop->input1 = $input1;
    	$percentage=0;

    	for($i=0; $i<strlen($textCatch); $i++){
    		if(substr($textCatch,$i,1) == $searchInput){
    			$percentage=$percentage+1/strlen($textCatch);
    		}
    	}

    	$inputLoop->percentage = round($percentage*100,2);

    	$inputLoop->update();
    	return redirect()->to('/nestedLoop')->with('success', 'Data berhasil diupdate!!');

    }

    public function deleteLoop($id){
    	$deleteID = Loop::where('id', $id)->first();
    	$deleteID->delete();
    	return redirect()->to('/nestedLoop')->with('success', 'Data berhasil dihapus!!');
    }

}
