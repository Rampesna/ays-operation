@extends('layouts.master')
@section('title', $employee->name . ' - Dosyalar')
@php(setlocale(LC_ALL, 'tr_TR.UTF-8'))

@section('content')

    @include('pages.ik.employee.components.subheader')

    @include('pages.ik.employee.show.file.modals.delete')

    <div class="row mt-15">
        <div class="col-xl-12">
            <form action="{{ route('project.project.file.create') }}" class="dropzone dropzone-default" method="post" id="file_upload">
                @csrf
                <input type="hidden" name="uploader_type" value="App\Models\User">
                <input type="hidden" name="uploader_id" value="{{ auth()->user()->getId() }}">
                <input type="hidden" name="relation_type" value="App\Models\Employee">
                <input type="hidden" name="relation_id" value="{{ $employee->id }}">
                <div class="dropzone-msg dz-message needsclick">
                    <i class="fa fa-upload fa-3x text-secondary"></i>
                    <br><br>
                    <h3 class="dropzone-msg-title">Dosyayı buraya bırakın veya yüklemek için tıklayın.</h3>
                </div>
            </form>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <table class="table" id="files">
                        <thead>
                        <tr>
                            <th></th>
                            <th>Dosya</th>
                            <th>Dosya Adı</th>
                            <th>Yüklenme Tarihi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($files as $file)
                            <tr>
                                <td>
                                    @if($file->uploader_type == 'App\Models\User' && $file->uploader_id == auth()->user()->getId())
                                        <a class="cursor-pointer delete" data-id="{{ $file->id }}" data-toggle="modal" data-target="#DeleteFileModal">
                                            <i class="fa fa-trash text-danger"></i>
                                        </a>
                                    @endif
                                </td>
                                <td><a href="{{ asset($file->path . $file->name) }}" download><i class="{{ $file->icon }}"></i></a></td>
                                <td>{{ $file->name }}</td>
                                <td>{{ strftime("%d %B %Y", strtotime($file->created_at)) }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('page-styles')
    @include('pages.ik.employee.show.file.components.style')
@stop

@section('page-script')
    @include('pages.ik.employee.show.file.components.script')
@stop
