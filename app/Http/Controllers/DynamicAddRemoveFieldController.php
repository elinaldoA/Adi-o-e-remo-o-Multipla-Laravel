<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use Illuminate\Support\Facades\Validator;

class DynamicAddRemoveFieldController extends Controller
{
    public function index(){
        return view("add-remove-multiple-input-fields");
    }
    public function store(Request $request){
        $request->validate([
            'moreFields.*.title' => 'required'
        ]);
        foreach($request->moreFields as $key => $value){
            Todo::create($value);
        }
        return back()->with('success','Todos foram criados com sucesso.');
    }
}
