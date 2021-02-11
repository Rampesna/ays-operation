@extends('employee.layouts.master')
@section('title', 'Projeler')
@php(setlocale(LC_ALL, 'tr_TR.UTF-8'))

@section('content')

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <table class="table" id="projects">
                        <thead>
                        <tr>
                            <th>Proje Adı</th>
                            <th>Başlangıç Tarihi</th>
                            <th>Bitiş Tarihi</th>
                            <th>Durum</th>
                            <th>Öncelik</th>
                            <th>Etiketler</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach(auth()->user()->projects()->get() as $project)
                            <tr>
                                <td><a href="{{ route('employee-panel.project.show', ['project' => $project, 'tab' => 'overview']) }}">{{ $project->name }}</a></td>
                                <td>{{ $project->start_date }}</td>
                                <td>{{ $project->end_date }}</td>
                                <td>{{ $project->status }}</td>
                                <td>{{ $project->priority }}</td>
                                <td>
                                    @if($project->tags)
                                        @foreach(explode(',',$project->tags) as $tag)
                                            <span class="btn btn-outline-secondary btn-hover-secondary btn-sm" style="cursor: context-menu">{{ $tag }}</span>
                                        @endforeach
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Proje Adı</th>
                            <th>Başlangıç Tarihi</th>
                            <th>Bitiş Tarihi</th>
                            <th>Durum</th>
                            <th>Öncelik</th>
                            <th>Etiketler</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('page-styles')
    @include('employee.pages.project.index.components.style')
@stop

@section('page-script')
    @include('employee.pages.project.index.components.script')
@stop

