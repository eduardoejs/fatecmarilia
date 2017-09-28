<?php

namespace App\Http\Controllers\Admin\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Users\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function __construct()
    {
        \Carbon\Carbon::setLocale('pt_BR'); // Exibe as mensagens do Carbon em Português
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('read-user');

        $users = User::orderBy('name', 'asc')->paginate(50);
        return view('admin.users.index')->withUsers($users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create-user');

        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create-user');

        $rules = [
          'name' => 'required|max:255',
          'email' => 'required|email|max:255|unique:users',
        ];

        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = new User();
        $user->name = Str::upper($request->input('name'));
        $user->email = $request->input('email');

        // A senha é criada, encriptada e enviada quando o estado do model user é "created".
        // Ver SendWelcomeEmail class

        if (isset($request->status)) {
            $user->status = true;
        } else {
            $user->status = false;
        }
        $user->save();
        return redirect()->route('users.index')->withSuccess("O usuário $user->name foi cadastrado no sistema");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->authorize('read-user');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('update-user');

        $user = User::findOrFail($id);
        return view('admin.users.update')->with('user', $user);
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
        $this->authorize('update-user');

        $rules = [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
        ];

        $validator = Validator::make($request->except('_token'), $rules);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = User::findOrFail($id);
        $user->name = Str::upper($request->input('name'));
        $user->email = $request->input('email');
        if (isset($request->status)) {
            $user->status = true;
        } else {
            $user->status = false;
        }

        try {
            $user->save();
            return redirect()->route('users.index')->withSuccess("O usuário $user->name foi ALTERADO no sistema");
        } catch (\PDOException $e) {

            /***
             * Exibe o erro retornado pelo banco de dados através deo PDOException.
             * O retorno é do tipo array, então na posição 0 é informado o código do erro, e na sua posição 2 é a
             * mensagem do erro.
             * Ex. código 23000 corresponde ao erro de "Entrada de dados duplicados". Poderia retornar uma mensagem
             * personalizada através do if
             *  if ($e->errorInfo[0] = 23000) {
                    $message = "Dados duplicados";
                } else {
                    $message = $e->errorInfo[2];
                }
             */
            $message = $e->errorInfo[2];
            return redirect()->back()->withErrors(['errors' => $message])->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('delete-user');
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('users.index')->withSuccess("O usuário $user->name foi EXCLUÍDO do sistema");
    }

    public function delete($id)
    {
        $this->authorize('delete-user');

        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('users.index')->withSuccess("O usuário $user->name foi EXCLUÍDO do sistema");
    }

    /**
     * Método setStatus altera o status do usuário
     * @param $id
     * @param $status
     * @return \Illuminate\Http\RedirectResponse
     */
    public function setStatus($id, $status)
    {
        $this->authorize('set-status-user');

        $user = User::findOrFail($id);
        if($status == 1){
            $user->status = 1;
        }
        else {
            $user->status = 0;
        }
        $user->save();
        return redirect()->route('users.index');
    }

    /**
     * Método pesquisar busca um usuário pelo nome
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function pesquisar(Request $request)
    {
        $this->authorize('read-user');

        $busca = $request->input('busca');
        if(!empty($request->input('busca'))){
            $users = User::orWhere('name', 'like', '%'.$request->input('busca').'%')
                            ->orderBy('name', 'asc')->paginate(30);
            return view('admin.users.index')->withUsers($users)->withBusca($busca);
        }
        return redirect()->route('users.index');
    }
}
