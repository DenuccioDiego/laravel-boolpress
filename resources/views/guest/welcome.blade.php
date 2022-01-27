
@extends('layouts.app')
@section('content')
<div class="p-5 bg-light">
    <div class="container">
        <h1 class="display-3">Welcome</h1>
        <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Non nam unde quis exercitationem repellat quibusdam nisi, impedit explicabo accusamus ipsum, eius quae. Laudantium ratione id qui, modi sapiente ullam dolore.</p>
        <hr class="my-2">
        <p>View my show</p>
        <p class="lead">
            <a class="btn btn-primary btn-lg" href="{{ route('guest.index.posts') }}" role="button">Vai allo shop</a>
        </p>
    </div>
</div>
@endsection
