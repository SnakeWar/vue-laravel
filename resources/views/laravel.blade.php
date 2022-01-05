@extends('layouts.app')

@section('content')

    <div class="container">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                {{--            Laravel Button--}}
                <button class="nav-link active" id="laravel-tab" data-bs-toggle="tab" data-bs-target="#laravel" type="button" role="tab" aria-controls="laravel" aria-selected="true">Laravel</button>
            </li>
            <li class="nav-item" role="presentation">
                {{--            Vue Button--}}
                <button class="nav-link" id="vue-tab" data-bs-toggle="tab" data-bs-target="#vue" type="button" role="tab" aria-controls="vue" aria-selected="false">Vue</button>
            </li>
        </ul>
        <div class="tab-content mx-1" id="myTabContent">
            <div class="tab-pane fade show active" id="laravel" role="tabpanel" aria-labelledby="home-tab">
                {{-- Laravel Content --}}
                @include('code-laravel')
            </div>
            <div class="tab-pane fade" id="vue" role="tabpanel" aria-labelledby="profile-tab">
                {{-- Vue Content --}}
                <div id="app">
                    <front-component></front-component>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('js/date.js') }}"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="{{ asset('js/app.js') }}"></script>
@endsection
