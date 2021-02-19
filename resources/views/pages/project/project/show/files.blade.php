@extends('layouts.master')
@section('title', 'Proje Dosyaları')
@php(setlocale(LC_ALL, 'tr_TR.UTF-8'))

@section('content')

    @include('pages.project.project.show.components.subheader')

    <div class="row mt-15">
        <div class="col-xl-12">
            <form action="{{ route('project.project.file.create') }}" class="dropzone dropzone-default" method="post" id="file_upload">
                @csrf
                <input type="hidden" name="uploader_type" value="App\Models\User">
                <input type="hidden" name="uploader_id" value="{{ auth()->user()->getId() }}">
                <input type="hidden" name="relation_type" value="App\Models\Project">
                <input type="hidden" name="relation_id" value="{{ $project->id }}">
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
                            <th>Dosya Türü</th>
                            <th>Yüklenme Zamanı</th>
                            <th>Yorum Sayısı</th>
                            <th>Yükleyen Kişi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($project->files()->with(['uploader','relation'])->get() as $file)
                            <tr>
                                <td>
                                    @if($file->uploader_type == 'App\Models\User' && $file->uploader_id == auth()->user()->getId())
                                        <a href="#" class="fileDelete" data-id="{{ $file->id }}" data-toggle="modal" data-target="#DeleteFileModal">
                                            <i class="fa fa-trash text-danger"></i>
                                        </a>
                                    @endif
                                </td>
                                <td><a href="{{ asset($file->path . $file->name) }}" download><i class="{{ $file->icon }}"></i></a></td>
                                <td>{{ $file->name }}</td>
                                <td>{{ $file->type }}</td>
                                <td>{{ $file->created_at }}</td>
                                <td>{{ $file->comments->count() }}</td>
                                <td>{{ @$file->uploader->name }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @include('pages.project.project.show.modals.delete-file')

@endsection

@section('page-styles')
    <link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css?v=7.0.3') }}" rel="stylesheet" type="text/css"/>

@stop

@section('page-script')
    <script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js?v=7.0.3') }}"></script>
    <script src="{{ asset('assets/js/pages/crud/datatables/extensions/buttons.js?v=7.0.3') }}"></script>

    <script>
        var table = $('#files').DataTable({
            language: {
                info: "_TOTAL_ Kayıttan _START_ - _END_ Arasındaki Kayıtlar Gösteriliyor.",
                infoEmpty: "Gösterilecek Hiç Kayıt Yok.",
                loadingRecords: "Kayıtlar Yükleniyor.",
                zeroRecords: "Tablo Boş",
                search: "Arama:",
                infoFiltered: "(Toplam _MAX_ Kayıttan Filtrelenenler)",
                lengthMenu: "Sayfa Başı _MENU_ Kayıt Göster",
                sProcessing: "Yükleniyor...",
                paginate: {
                    first: "İlk",
                    previous: "Önceki",
                    next: "Sonraki",
                    last: "Son"
                },
                select: {
                    rows: {
                        "_": "%d kayıt seçildi",
                        "0": "",
                        "1": "1 kayıt seçildi"
                    }
                },
                buttons: {
                    print: {
                        title: 'Yazdır'
                    }
                }
            },

            dom: 'frtipl',

            columnDefs: [
                {
                    targets: 0,
                    width: "3%",
                    orderable: false,
                    order: false
                },
            ],

            responsive: true
        });
    </script>

    <script>
        "use strict";

        var KTDropzoneDemo = function () {
            var fileUpload = function () {
                $('#file_upload').dropzone({
                    paramName: 'file',
                    addRemoveLinks: true,
                    accept: function(file, done) {
                        done();
                    },
                    complete: function (file) {
                        this.removeFile(file);
                    },
                    success : function(file, response){
                        table.row.add([
                            '<a href="#" class="fileDelete" data-id="' + response.id + '" data-toggle="modal" data-target="#DeleteFileModal"><i class="fa fa-trash text-danger"></i></a>',
                            '<a href="{{ asset('') }}' + response.path + response.name + '" download><i class="' + response.icon + '"></i></a>',
                            response.name,
                            response.type,
                            response.created_at,
                            response.comments.length,
                            response.uploader.name
                        ]).draw();

                        $(".fileDelete").click(function () {
                            $("#deleted_file_id").val($(this).data('id'));
                        });
                    },
                    error: function (error) {
                        console.log(error);
                        toastr.error('Sistemsel Bir Hata Oluştu');
                    }
                });
            }

            return {
                // public functions
                init: function() {
                    fileUpload();
                }
            };
        }();

        KTUtil.ready(function() {
            KTDropzoneDemo.init();
        });

    </script>

    <script>
        $(".fileDelete").click(function () {
            $("#deleted_file_id").val($(this).data('id'));
        });

        $("#cancelDeleteFile").click(function () {
            $("#deleted_file_id").val('');
        });
    </script>
@stop
