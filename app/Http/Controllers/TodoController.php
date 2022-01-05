<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoRequest;
use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{

    /**
     * @var Todo
     */
    private $todo;

    public function __construct(Todo $todo)
    {
        $this->todo = $todo;
    }

    public function index($type = null)
    {

        if($type == 'vue'){
            return view('vue');
        }
        else{
            $posts = $this->todo->orderBy('created_at', 'desc')->get();
            return view('laravel', ['posts' => $posts]);
        }

    }

    /**
     * @param TodoRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function store(TodoRequest $request)
    {
        $dataForm = $request->all();
        $created = $this->todo->create($dataForm);
        if($created)
        {
            return redirect('/')->with('success', 'Salvo com sucesso');
        }
        else
        {
            return redirect('/')->with('fail', 'Erro ao salvar');
        }

    }

    /**
     * @param Request $request
     * @param $id
     */
    public function update(Request $request, $id)
    {
        $model = $this->todo->findOrFail($id);
        $dataForm = $request->all();

        if($model->update($dataForm))
        {
            return redirect('/')->with('success', 'Atualizado com sucesso');
        }else
        {
            return redirect('/')->with('fail', 'Erro ao atualizar');
        }
    }

    /**
     * @param $id
     */
    public function destroy($id)
    {
        $todo = $this->todo->findOrFail($id);
        if($todo->destroy($id)){
            return redirect('/')->with('success', 'Excluído com sucesso');
        }else
        {
            return redirect('/')->with('fail', 'Erro ao excluir');
        }
    }
}
