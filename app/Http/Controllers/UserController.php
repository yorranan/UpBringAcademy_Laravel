<?php

namespace App\Http\Controllers;

use App\Models\User;
use http\Message;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function goUpdateScoreView()
    {
        return view('auth.update-score');
    }
    public function updateScore(Request $request, $id)
    {
        $user = User::find($id);
        if(!$user)
        {
            session()->flash('error', 'Usuário não encontrado');
        }
        else
        {
            $user->score += $request->input('points', 0);
            $user->save();
            session()->flash('sucess', 'Pontuação atualizada com sucesso');
        }
    }

    public function executeTasks(Request $request, $id)
    {
        $user = User::find($id);

    }
}
