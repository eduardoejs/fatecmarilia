<?php

namespace App\Http\Controllers\Admin\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Users\User;
use Validator;
use App\Classes\RandomString;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function __construct()
    {
        \Carbon\Carbon::setLocale('pt_BR');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('read-user');
        $users = User::orderBy('name', 'asc')->paginate(30);
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
          $messages = $validator->messages();
          return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = new User();
        $user->name = Str::upper($request->input('name'));
        $user->email = $request->input('email');
        $password = RandomString::random();
        $user->plainPassword =$password;
        $user->password = bcrypt($password);
        if (isset($request->status)) {
          $user->status = true;
        } else {
          $user->status = false;
        }
        $user->save();

        //TODO -> disparar email com senha e depois zerar campo plainPassword

        session()->flash('msg', "O usuário $user->name foi cadastrado no sistema");
        return redirect()->route('users.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

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
          $messages = $validator->messages();
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
          session()->flash('msg', "O usuário $user->name foi ALTERADO no sistema");
          return redirect()->route('users.index');
        } catch (\PDOException $e) {

          $message = "";
          if ($e->errorInfo[0] = 23000) {
            $message = $e->errorInfo[2];
          } else {
            $message = $e->errorInfo[2];
          }
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
        //
    }

    public function delete($id)
    {
      $this->authorize('delete-user');
      $user = User::findOrFail($id)->delete();
      return redirect()->route('users.index');
    }

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
}
