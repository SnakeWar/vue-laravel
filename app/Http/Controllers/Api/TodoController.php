<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\TodoRequest;
use App\Http\Resources\TodoResource;
use App\Models\Todo;
use Carbon\Carbon;
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

    public function index()
    {
        return TodoResource::collection($this->todo->orderBy('created_at', 'desc')->get());
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function store(TodoRequest $request)
    {
        $dataForm = $request->all();
        $created = $this->todo->create($dataForm);
        if($created)
        {
            return response('Salvo', 200)
                ->header('Content-Type', 'text/plain');
        }else
        {
            return response('Erro ao salvar', 204)
                ->header('Content-Type', 'text/plain');
        }
    }

    /**
     * @param $id
     */
    public function show($id)
    {
        return $this->todo->findOrFail($id);
    }

    /**
     * @param Request $request
     * @param $id
     */
    public function update(Request $request, $id)
    {
        $dataForm = $request->all();
        $update = $this->todo->findOrFail($id);

        if($update->update($dataForm))
        {
            return response('Atualizado', 200)
                ->header('Content-Type', 'text/plain');
        }else
        {
            return response('Erro ao atualizar', 204)
                ->header('Content-Type', 'text/plain');
        }
    }

    /**
     * @param $id
     */
    public function destroy($id)
    {
        $todo = $this->todo->findOrFail($id);
        if($todo->destroy($id))
        {
            return response('Deletado', 200)
                ->header('Content-Type', 'text/plain');
        }else
        {
            return response('Erro ao deletar', 204)
                ->header('Content-Type', 'text/plain');
        }
    }
}
