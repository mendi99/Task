<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Task;
use \App\Models\Usuario;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::all();
        return view('list', ['all' => $tasks]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $allUsers = Usuario::all();
        return view('createtasks', ['users' => $allUsers]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!empty($request->get('name'))){
            $existe = DB::table('tasks')
            ->where('name', $request->get('name'))
            ->get();
            
            //count($existe)
            if(count($existe) == 0){
                Task::create([
                    'name' => $request->get('name'),
                    'usuario_id' => "1",
                ]);
          
                return redirect('/');
            }else{
                $allUsers = Usuario::all();
                $error = "The Task allready exists";
                return view('/createtasks', ['error'=> $error], ['users' => $allUsers]);
            }


        }else{
            $allUsers = Usuario::all();
            $error = "The form can't be emtpy";
            return view('/createtasks', ['error'=> $error], ['users' => $allUsers]);
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
        $note = Task::find($id);
        
        $note->delete();
  
        return redirect('/');
    }

    public function search(Request $request)
    {
        if(!empty($request->get('name'))){
            $resultado = DB::table('tasks')->select('tasks.name')
            ->where('name', 'like' , $request->get('name')."%")
            ->get();
              return view('search', ['resultado'=> $resultado]);
        }else{
            $error = "The name can't be emtpy";
            return view('search', ['error'=> $error]);
        }
    }

    public function advanced()
    {
        $allUsers = Usuario::all();
        return view('advanced', ['users' => $allUsers]); 
    }

    public function advanced2(Request $request)
    {
        if(!empty($request->get('date')) || !empty($request->get('usuario'))){
            if(!empty($request->get('date')) && empty($request->get('usuario'))){
                $resultado = DB::table('tasks')->select('tasks.name')
                ->where('created_at', $request->get('date'))
                ->get();
                $allUsers = Usuario::all();
                  return view('advanced', ['resultado'=> $resultado], ['users' => $allUsers]);
            }else if(empty($request->get('date')) && !empty($request->get('usuario'))){
                $resultado = DB::table('tasks')->select('tasks.name')
                ->where('usuario_id', $request->get('usuario'))
                ->get();
                $allUsers = Usuario::all();
                  return view('advanced', ['resultado'=> $resultado], ['users' => $allUsers]);
            }else if(!empty($request->get('date')) && !empty($request->get('usuario'))){
                $resultado = DB::table('tasks')->select('tasks.name')
                ->where('created_at', $request->get('date'))
                ->where('usuario_id', $request->get('usuario'))
                ->get();
                $allUsers = Usuario::all();
                  return view('advanced', ['resultado'=> $resultado], ['users' => $allUsers]);
            }
        }else{
            $allUsers = Usuario::all();
            $error = "The form can't be emtpy";
            return view('advanced', ['error'=> $error], ['users' => $allUsers]);
        }
    }
    
}
