@extends('layouts.app')

@section('content')
    <div class="col-md-9 col-lg-9  col-sm-9 pull-left"  style="background: #fff;">
            <h1>Add New Projects</h1>
        <div class="row col-md-12  col-lg-12  col-sm-12">



            <form method="post" action="{{route('projects.store')}}">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="project-name">Name <span class="require">*</span></label>
                    <input type="text" id="project-name" name="name" spellcheck="false" class="form-control"  placeholder="Enter Name" required>
                </div>

                <input type="hidden"  name="company_id" value="{{$company_id}}" >

                <div class="form-group">
                    <label for="project-content">Description </label>
                    <textarea name="description" id="project-content"  style="resize: vertical"  rows="5" spellcheck="false" placeholder="Enter Description" class="form-control autosize-target text-left"></textarea>
                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="submit"/>
                </div>

            </form>
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
                <li><a href="/projects">View List Of projects</a></li>

            </ol>
        </div>

    </div>
@endsection