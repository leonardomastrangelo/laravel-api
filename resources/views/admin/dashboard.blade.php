@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h2 class="display-5 text-center my-4">
        {{ __('Dashboard') }}
    </h2>
    <div class="row justify-content-around flex-wrap">
        <div class="col-5">
            <canvas width="500" height="250" id="chartColumn"></canvas>
        </div>
        <div class="col-5">
            <canvas width="500" height="250" id="chartTension"></canvas>
        </div>
        <div class="col-8 mt-5 position-relative">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Logo</th>
                        <th scope="col">Title</th>
                        <th scope="col">Github</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($projects as $project)
                    <tr>
                        <th scope="row">
                            <a href="{{route('admin.projects.show', $project->slug)}}" class="logo-container m-auto">
                                <img
                                src="{{asset('storage/logos/'. $project->logo)}}"
                                alt="{{$project->title}}">
                            </a>
                        </th>
                        <td>{{$project->title}}</td>
                        <td>
                            <a target=”_blank” class="text-muted" href="{{$project->github}}">{{$project->github}}</a>
                        </td>
                        <td>{{$project->status == 0 ? 'In Progress' : 'Completed'}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{$projects->links('vendor.pagination.custom-bootstrap-5')}}
        </div>
        <div class="col-3 mt-5">
            <canvas width="500" height="250" id="chartPie"></canvas>
        </div>
    </div>
</div>
@endsection
