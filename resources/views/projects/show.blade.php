@extends('layouts.app')

@section('content')

    <div class="col-md-9 col-lg-9  col-sm-9 pull-left">
        <!-- Jumbotron -->
        <div class="well well-lg">

            <h1>{{ $project->name }}</h1>
            <p class="lead">{{ $project->description }}</p>
            <p><a class="btn btn-lg btn-success" href="#" role="button">Get started today</a></p>
        </div>

        <!-- Example row of columns -->
        <div class="row col-md-12  col-lg-12  col-sm-12" style="background: #fff; margin: 10px;">
            <a href="/projects/create" class="pull-right btn btn-default btn-sm">Add Project </a>

            <br>
            <div class="row container-fluid">
                <form method="post" action="{{route('comments.store')}}">
                    {{ csrf_field() }}


                    <input type="hidden" name="commentable" value="Project">
                    <input type="hidden" name="commentable_id" value="{{ $project->id }}">

                    {{----}}
                    {{--<div class="form-group">--}}
                    {{--<label for="company-name">Url (proof of work done) <span class="require">*</span></label>--}}
                    {{--<input type="text" id="company-name" name="name" spellcheck="false" class="form-control"  placeholder="Enter Url" required>--}}
                    {{--</div>--}}

                    <div class="form-group">

                        <label for="company-content">Comment </label>
                        <textarea name="body" id="comment-content"  style="resize: vertical"  rows="3" spellcheck="false" placeholder="Enter Commment" class="form-control autosize-target text-left"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="comment-content">Proof of work done (Url/Photos) </label>
                        <textarea name="url" id="comment-content"  rows="2" style="resize: vertical"  rows="5" spellcheck="false" placeholder="Enter URL or screenshoot" class="form-control autosize-target text-left"></textarea>
                    </div>

                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="submit"/>
                    </div>

                </form>
            </div>





            {{--@foreach($project->projects as $project)--}}
                {{--<div class="col-lg-4">--}}
                    {{--<h2>{{ $project->name }}</h2>--}}
                    {{--<p>{{ $project->description }}</p>--}}
                    {{--<p><a class="btn btn-primary" href="/projects/{{ $project->id }}" role="button">View Project</a></p>--}}
                {{--</div>--}}

            {{--@endforeach --}}
        </div>
    </div>

    {{--Side Bar--}}
    <div class="col-sm-3 col-md-3 col-lg-3 pull-right ">
        {{--<div class="sidebar-module sidebar-module-inset">--}}
            {{--<h4>About</h4>--}}
            {{--<p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>--}}
        {{--</div>--}}

        <div class="sidebar-module">
            <h4>Manage </h4>
            <ol class="list-unstyled">

                <li><a href="/projects/{{$project->id}}/edit">Edit</a></li>
                <li><a href="/projects/create">Create New Project </a></li>
                <li><a href="/projects">My projects</a></li>

                <br>
                {{--Only the person who created it--}}
                @if($project->user_id === Auth::user()->id)
                <li>
                    <a href="#" onclick="
                        var result = confirm('Are you sure you wish to delete this Projects?');
                             if(result){
                                 event.preventDefault();
                                 document.getElementById('delete-form').submit();
                             }"> Delete
                    </a>

                    <form id="delete-form" action="{{route('projects.destroy', [$project->id])}}" method="POST"
                            style="display: none;">
                        <input type="hidden" name="_method" value="delete">
                        {{ csrf_field() }}
                    </form>



                </li>

                @endif
                {{--<li><a href="#">Add New Member</a></li>--}}
            </ol>
        </div>
        {{--<div class="sidebar-module">--}}
            {{--<h4>Member</h4>--}}
            {{--<ol class="list-unstyled">--}}
                {{--<li><a href="#">March 2014</a></li>--}}
                {{--<li><a href="#">February 2014</a></li>--}}
               {{----}}
            {{--</ol>--}}
        {{--</div>--}}

    </div>

@endsection