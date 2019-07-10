<?php

namespace App\Http\Controllers\Admin;

use DB;
use Hash;
use App\User;
use App\Profession;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Mail\resetPasswordRegister;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    private $user;
    private $profession;

    public function __construct(User $user, Profession $profession)
    {  
        $this->middleware('auth');
        $this->user         = $user;
        $this->profession   = $profession;
    } 

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->user->all();

        return view('admin.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $professions = $this->profession->all();
        return view('admin.users.create',compact('professions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        DB::beginTransaction();
        Mail::to($request->email,$request->name)->send(new resetPasswordRegister($request));
        try
        {
            $user = $this->user->create([
                'name' => $request['name'],
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
            ]);                        
            $user->professions()->sync($request->professions);
            DB::commit(); 
            return redirect(route('users.index'))->with('mensagem_sucesso', 'Usuário cadastrado com sucesso!');
         }
         catch(\Exception $ex)                   
         {
             DB::rollBack();
             return redirect(route('users.index'))->withErrors($ex->getMessage())->withInput();
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
        $user = $this->user->findOrFail($id); 
        $professions = $this->profession->all(); 
        $professions_user = $user->professions;

        return view('admin.users.edit',compact('user','professions','professions_user'));
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
        $user = $this->user->findOrFail($id); 

        DB::beginTransaction();
        try
        {            
            $user->update([
            'name' => $request['name'],
            'email' => $request['email'],                   
            ]);
            $user->professions()->sync($request->professions);
            DB::commit(); 
            return redirect(route('users.index'))->with('mensagem_sucesso', 'Usuário atualizado com sucesso!');
        }
        catch(\Exception $ex)                   
        {
            DB::rollBack();
            return redirect(route('users.index'))->withErrors($ex->getMessage())->withInput();
        } 
   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){

        $user = $this->user->findOrFail($id);  
       
        DB::beginTransaction();
        try
        {     
            $user->professions()->detach();
            $user->delete();
            DB::commit(); 
            
            return redirect(route('users.index'))->with('mensagem_sucesso', 'Usuário deletado com sucesso!');
        }
        catch(\Exception $ex)                   
        {
            DB::rollBack();
            return redirect(route('users.index', $user->id))->withErrors($ex->getMessage())->withInput();
        } 
    }
}
