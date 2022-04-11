<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\Models\Users;



class UserController extends Controller
{
     /**
     * Store a new user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $name = request('name');
        $password = request('pass');
        $org = request('org');

        $res = Users::where(
            ['nome' => $name,
            'pass' => $password])
            ->get();

        if (count($res) == 0)
            return response()->json([
                'error' => 'Usuario nao encontrado'
            ]);
 
        return response()->json([
            'name' => $res[0]->nome,
            'pass' => $res[0]->pass,
            'org' => $res[0]->organizacao
        ]);
    }

    public function showAll(Request $request)
    {
        $users = Users::alL();
        return $users;
    }

    public function insert(Request $request)
    {
        $user = new Users();

        $user->nome = request('name');
        $user->pass = request('pass');
        $user->organizacao = request('org');
        $user->save();

}

    
    public function update(Request $request)
    {
        $name = request('name');
        $pass = request('pass');
        $org = request('org');
        $id = $request->id;

        $user = Users::find($id);
        $user->nome = $name;
        $user->pass = $pass;
        $user->organizacao = $org;

        $user->save();
        
    }

    public function destroy(Request $request)
    {
        $id = $request->id;
        $user = Users::find($id);
        if ($user == null)
            return response()->json([
                "error" => "Não foi possível excluir o usuário"
            ]);
        $user->delete();
        return response()->json([
            "status" => "OK"
        ]);

    }
}
