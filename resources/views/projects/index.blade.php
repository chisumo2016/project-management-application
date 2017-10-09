@extends('layouts.app');

@section('content')
    <div class="col-md-6 col-lg-6 col-md-offset-2 col-lg-offset-3">
        <div class="card ">
            <div class="card-header bg-primary ">
                Projects   <a href="/projects/create" class="pull-right btn btn-primary btn-sm">Create New </a>
            </div>
            <div class="card-body">
                <ul class="list-group">
                    @foreach($projects as $project)
                        <li class="list-group-item"><a href="/projects/{{ $project->id }}">{{ $project->name }}</a></li>
                    @endforeach

                </ul>
            </div>
        </div>
    </div>
@endsection