<?php

namespace App\Http\Controllers;

use App\Group;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $users = User::with('group')->get();

        return view('users/index', compact('users'));
    }

    public function edit(Request $request)
    {
        $user = User::where('id', '=', $request->id)->first();
        $groups = Group::all();

        return view('users/edit', compact(['user', 'groups']));
    }

    public function saveEdit(Request $request)
    {
        if ($request->cnpj && $request->cnpj !== 'N/A')
        {
            Validator::make($request->toArray(), [
                'name' => [
                    'string',
                    'max:255'
                ],
                'cnpj' => [
                    'max:18',
                    Rule::unique('users')->ignore($request->user_id)
                ],
                'ie' => [
                    'max:9'
                ]
            ]);
        }
        elseif($request->cpf && $request->cpf !== 'N/A')
        {
            Validator::make($request->toArray(), [
                'name' => [
                    'string',
                    'max:255'
                ],
                'cpf' => [
                    'max:18',
                    Rule::unique('users')->ignore($request->user_id)
                ],
                'rg' => [
                    'max:9'
                ]
            ]);
        }

        $user = User::find($request->user_id);

        $cpf = $request->cpf ? $request->cpf : 'N/A';
        $cnpj = $request->cnpj ? $request->cnpj : 'N/A';
        $rg = $request->rg ? $request->rg : 'N/A';
        $ie = $request->ie ? $request->ie : 'N/A';

        $user->name = $request->name;
        $user->type = $request->type;
        $user->cpf = $cpf;
        $user->cnpj = $cnpj;
        $user->rg = $rg;
        $user->ie = $ie;
        $user->group_id = $request->group;
        $user->phone = $request->phone;
        $user->password = Hash::make($request->password);

        if($user->save())
        {
            $notification = array(
                'message' => 'Usuário atualizado com sucesso!',
                'alert-type' => 'success'
            );
        }
        else
        {
            $notification = array(
                'message' => 'Algo deu errado. Tente novamente mais tarde!',
                'alert-type' => 'danger'
            );
        }

        return redirect()->back()->with($notification);
    }

    public function alterStatus(Request $request)
    {
        $user = User::find($request->user_id);

        $user->status = $user->status == 1 ? 0 : 1;

        if($user->save())
        {
            $msg = 'Status alterado com sucesso!';
            $type = 'success';
        }
        else
        {
            $msg = 'Algo deu errado! Tente novamente mais tarde';
            $type = 'danger';
        }

        $new_status = $user->status;

        return response(['msg' => $msg, 'type' => $type, 'user_id' => $user->id, 'new_status' => $new_status]);
    }
}
