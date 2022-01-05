<div class="container-fluid my-5">
    <div class="row justify-content-center">
        <div class="col-lg-4 col-md-5 col-sm-12">
            <div class="card mt-1" id="laravel">
                <div class="card-header">
                    CRUD - Laravel
                </div>
                @if(session()->has('success'))
                    <div class="alert alert-success mt-1">
                        {{ session()->get('success') }}
                    </div>
                @endif
                @if(session()->has('danger'))
                    <div class="alert alert-danger mt-1">
                        {{ session()->get('danger') }}
                    </div>
                @endif
                <div class="card-body">
                    <form action="{{route('todos.store')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <input class="form-control form-control-lg" name="name" type="text" placeholder="O que vamos fazer hoje?" value="{{ old('name') }}">
                        </div>
                        @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <input class="form-control form-control-lg" name="date" type="date" placeholder="20/01/1988" value="{{ old('date') }}">
                        </div>
                        @error('date')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <button class="btn  btn-outline-primary">
                            Criar
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-8 col-md-7 col-sm-12">
            @foreach($posts as $key => $item)
                <div class="card">
                    <div class="card-header">

                        {{ \Carbon\Carbon::parse($item->date)->format('d/m/Y') }}

                    </div>
                    <div class="card-body d-flex justify-content-between">
                        <span>{{ $key+1 }} - {{ $item->name }}</span>
                        <div class="d-flex justify-content-between">
                            <button class="btn btn-warning mr-1" data-bs-toggle="modal" data-bs-target="#exampleModal{{$key+1}}"><i class="far fa-edit" ></i></button>
                            <form action="{{route('todos.destroy', ['todo' => $item->id])}}" method="post">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal{{$key+1}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal Laravel</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('todos.update', ['todo' => $item->id]) }}" method="post">
                                    @csrf
                                    @isset($item->id)
                                        @method("put")
                                    @endisset
                                    <div class="form-group">
                                        <input class="form-control form-control-lg" name="name" type="text" placeholder="O que vamos fazer hoje?" value="{{$item->name}}">
                                    </div>
                                    @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <div class="form-group">
                                        <input class="form-control form-control-lg" name="date" type="date" value="{{\Carbon\Carbon::parse($item->date)->format('Y-m-d')}}">
                                    </div>
                                    @error('date')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <button class="btn  btn-outline-primary">
                                        Atualizar
                                    </button>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                {{--                                    <button type="button" class="btn btn-primary">Save changes</button>--}}
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
