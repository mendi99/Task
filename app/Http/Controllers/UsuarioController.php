<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = Usuario::all();
        return view('list', ['all' => $users]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('createuser');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!empty($request->get('name')) && !empty($request->get('lname'))){
            $existe = DB::table('usuarios')
            ->where('name', $request->get('name'))
            ->where('lname', $request->get('lname'))
            ->get();
            
            if(count($existe) == 0){
                Usuario::create([
                    'name' => $request->get('name'),
                    'lname' => $request->get('lname'),
                  ]);
          
                  return redirect('/user/show');
            }else{
                $error = "The user allready exists";
                return view('/createuser', ['error'=> $error]);
            }


        }else{
            $error = "The form can't be emtpy";
            return view('/createtasks', ['error'=> $error]);
        }
  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $note = Usuario::find($id);
        
        $note->delete();
  
        return redirect('show');
    }

    public function search(Request $request)
    {
        if(!empty($request->get('name'))){
            $resultado = DB::table('tasks')->select('tasks.name')
            ->where('name', 'like' , $request->get('name')."%")
            ->get();
              return view('/search', ['resultado'=> $resultado]);
        }else{
            $error = "The name can't be emtpy";
            return view('/search', ['error'=> $error]);
        }
    }

}
