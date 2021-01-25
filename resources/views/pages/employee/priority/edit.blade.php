@extends('layouts.master')
@section('title', 'Personel Öncelikleri Düzenle')
@php(setlocale(LC_ALL, 'tr_TR.UTF-8'))

@section('content')

    <div class="row">
        <div class="col-xl-6">
            <form action="{{ route('employee.priorities.update') }}" method="post">
                @csrf
                <input type="hidden" name="id" value="{{ $employee->id }}">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                @foreach($priorities as $priority)
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <div class="row">
                                                <div class="col-3">
                                                    <span class="switch switch-outline switch-icon switch-success">
                                                        <label>
                                                            <input class="prioritySwitch" data-id="{{ $priority->id }}" type="checkbox" @if($employee->priorities()->where('priority_id', $priority->id)->exists()) checked @endif />
                                                            <span></span>
                                                        </label>
                                                    </span>
                                                </div>
                                                <label class="col-9 col-form-label">{{ $priority->name }}</label>
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <input class="form-control onlyNumber" style="width: 100%" type="text"
                                                   id="{{ $priority->id }}_value" name="priorities[{{ $priority->id }}]"
                                                   @if($employee->priorities()->where('priority_id', $priority->id)->exists())
                                                   value="{{ $employee->priorities()->where('priority_id', $priority->id)->first()->pivot->value }}"
                                                   @else
                                                   disabled
                                                @endif>
                                            <label for="{{ $priority->id }}_value"></label>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-xl-12">
                        <button type="submit" id="update" class="btn btn-primary btn-block">Kaydet</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection

@section('page-styles')

@stop

@section('page-script')

    <script>
        $(".prioritySwitch").click(function () {
            if ($(this).is(':checked')) {
                $("#" + $(this).data('id') + "_value").attr('disabled', false);
            } else {
                $("#" + $(this).data('id') + "_value").attr('disabled', true).val('');
            }
        });

        var update = $("#update");

        $(".onlyNumber").keypress(function (e) {
            update.attr('disabled', true);
            if (e.which !== 8 && e.which !== 0 && (e.which < 48 || e.which > 57)) {
                return false;
            }
        }).keyup(function () {
            if ($(this).val() > 255) {
                $(this).val(255);
            }
            update.attr('disabled', false);
        });

        @if(session()->has('exception'))
        console.log('{{ session()->get('exception'.'') }}');
        @endif
    </script>

@stop
