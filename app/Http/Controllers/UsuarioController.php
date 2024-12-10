<?php

namespace App\Http\Controllers;

    use App\Models\User;
    use App\Models\UserCargo;
    use App\Models\UserPhone;
    use App\Models\AuthToken;
    use Illuminate\Http\Request;
    use Spatie\Permission\Models\Role;
    use Spatie\Permission\Models\Permission;

    class UsuarioController extends Controller
    {
        public function index(Request $request)
    {

    
        return view('teste.index', compact('users'));
    
    }
        public function create()
        {
            return view('teste.create');
        }

        public function store(Request $request)
        {
            $request->validate([
                'name' => 'required|string|max:255',
                'cpf' => 'required|string|size:11|unique:users',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8|confirmed',
                'telefone' => 'required|string|max:15',
                'cargo' => 'required|in:0,1',
            ]);
            
            $user = User::create([
                'name' => $request->name,
                'cpf' => $request->cpf,
                'status' => $request->status,
            ]);
    
            // Criando o registro no UserCargo com a chave estrangeira user_id
            UserCargo::create([
                'cargo' => $request->cargo,
                'user_id' => $user->id,  // Relacionando com o usuário criado
            ]);
    
            // Criando o registro no UserPhone com a chave estrangeira user_id
            UserPhone::create([
                'telefone' => $request->telefone,
                'email' => $request->email,
                'user_id' => $user->id,  // Relacionando com o usuário criado
            ]);
    
            // Criando o AuthToken (por exemplo, senha criptografada)
            AuthToken::create([
                'password' => bcrypt($request->password),  // Armazenando a senha criptografada
                'user_id' => $user->id,  // Relacionando com o usuário criado
            ]);
            


            return redirect()->route('teste.index')->with('success', 'Usuário criado com sucesso!');
        }

        public function show($id)
        {
            $user = User::findOrFail($id);
            return view('teste.show', compact('user'));
        }

        public function edit($id)
        {
            $user = User::findOrFail($id);
            

            return view('teste.edit', compact('user'));
        }

        public function update(Request $request, $id)
        {
            $user = User::findOrFail($id);

            $dadosValidados = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'cpf' => 'required|string|size:11',
                'cargo' => 'required|in:0,1',
                'telefone' => 'required|string|max:15',
            ]);

            $user->update($dadosValidados);
            return redirect()->route('teste.index')->with('success', 'Usuário atualizado com sucesso!');
        }

        public function destroy($id)
        {
            $user = User::findOrFail($id);

            $user->delete();
            return redirect()->route('teste.index')->with('success', 'Usuário excluído com sucesso!');
        }

        public function permissao(Request $request, User $user, $id) {

            $user = User::findOrFail($id);
            return view('teste.permissao', compact('user'));
            
        }
 
        public function mudarStatusU(Request $request, $id)
{
    try {
        $user = User::findOrFail($id);

        // Valida o campo 'status'
        $request->validate([
            'status' => 'required|in:Ativo,Inativo',
        ]);

        // Atualiza o status do usuário
        $user->update([
            'status' => $request->status,
        ]);

        return response()->json([
            'success' => true,
            'status' => $user->status,
            'message' => 'Status atualizado com sucesso',
        ]);
    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'Erro ao atualizar status: ' . $e->getMessage(),
        ], 500);
    }
}

        

    }
