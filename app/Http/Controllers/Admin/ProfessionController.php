<?php

namespace App\Http\Controllers\Admin;

use DB;
use App\Profession;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProfessionRequest;

class ProfessionController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    private $profession;

    public function __construct(Profession $profession)
    {  
        $this->middleware('auth');
        $this->profession = $profession;
    } 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $professions = $this->profession->all();

        return view('admin.professions.index',compact('professions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.professions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProfessionRequest $request)
    {         
         $dataForm = $request->all();

         DB::beginTransaction();
         try
         {
             $this->profession->create($dataForm);
             DB::commit(); 
             return redirect(route('professions.index'))->with('mensagem_sucesso', 'Profissão cadastrada com sucesso!');
         }
         catch(\Exception $ex)                   
         {
             DB::rollBack();
             return redirect(route('professions.index'))->withErrors($ex->getMessage())->withInput();
         } 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Profession  $profession
     * @return \Illuminate\Http\Response
     */
    public function show(Profession $profession)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Profession  $profession
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $profession = $this->profession->findOrFail($id);

        return view('admin.professions.edit',compact('profession'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Profession  $profession
     * @return \Illuminate\Http\Response
     */
    public function update($id,ProfessionRequest $request)
    {
        $profession = $this->profession->findOrFail($id);
        
        DB::beginTransaction();
        try
        {
            $update = $profession->update($request->all());
            DB::commit(); 
            return redirect(route('professions.index'))->with('mensagem_sucesso', 'Profissão atualizado com sucesso!');
        }
        catch(\Exception $ex)                   
        {
            DB::rollBack();
            return redirect(route('professions.index'))->withErrors($ex->getMessage())->withInput();
        }        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Profession  $profession
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){

        $profession = $this->profession->findOrFail($id);  
        $user  = $profession->users->count();   

        if($user > 0){
            return redirect(route('professions.index'))->with('mensagem_erro', 'Desculpe, mas a profissão que você deseja excluir é atribuída a um usuário!');
        }else{
            DB::beginTransaction();
            try
            {
                $profession->delete();
                DB::commit(); 
                return redirect(route('professions.index'))->with('mensagem_sucesso', 'Profissão deletada com sucesso!');
            }
            catch(\Exception $ex)                   
            {
                DB::rollBack();
                return redirect(route('professions.index', $profession->id))->withErrors($ex->getMessage())->withInput();
            } 
        }        
    }
}
