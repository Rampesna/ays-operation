@extends('layouts.master')
@section('title', $employee->name . ' - Düzenle')
@php(setlocale(LC_ALL, 'tr_TR.UTF-8'))

@section('content')

    <div class="row">
        <div class="col-xl-5 col-12">
            <div class="card">
                <div class="card-body">
                    <a href="javascript:void(0)" data-toggle="modal" data-target="#LeaveEmployee" class="float-right">Personeli Sil
                        <span class="svg-icon svg-icon-primary svg-icon-2x">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"/>
                                    <rect fill="#000000" opacity="0.3" transform="translate(9.000000, 12.000000) rotate(-270.000000) translate(-9.000000, -12.000000) " x="8" y="6" width="2" height="12" rx="1"/>
                                    <path d="M20,7.00607258 C19.4477153,7.00607258 19,6.55855153 19,6.00650634 C19,5.45446114 19.4477153,5.00694009 20,5.00694009 L21,5.00694009 C23.209139,5.00694009 25,6.7970243 25,9.00520507 L25,15.001735 C25,17.2099158 23.209139,19 21,19 L9,19 C6.790861,19 5,17.2099158 5,15.001735 L5,8.99826498 C5,6.7900842 6.790861,5 9,5 L10.0000048,5 C10.5522896,5 11.0000048,5.44752105 11.0000048,5.99956624 C11.0000048,6.55161144 10.5522896,6.99913249 10.0000048,6.99913249 L9,6.99913249 C7.8954305,6.99913249 7,7.89417459 7,8.99826498 L7,15.001735 C7,16.1058254 7.8954305,17.0008675 9,17.0008675 L21,17.0008675 C22.1045695,17.0008675 23,16.1058254 23,15.001735 L23,9.00520507 C23,7.90111468 22.1045695,7.00607258 21,7.00607258 L20,7.00607258 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(15.000000, 12.000000) rotate(-90.000000) translate(-15.000000, -12.000000) "/>
                                    <path d="M16.7928932,9.79289322 C17.1834175,9.40236893 17.8165825,9.40236893 18.2071068,9.79289322 C18.5976311,10.1834175 18.5976311,10.8165825 18.2071068,11.2071068 L15.2071068,14.2071068 C14.8165825,14.5976311 14.1834175,14.5976311 13.7928932,14.2071068 L10.7928932,11.2071068 C10.4023689,10.8165825 10.4023689,10.1834175 10.7928932,9.79289322 C11.1834175,9.40236893 11.8165825,9.40236893 12.2071068,9.79289322 L14.5,12.0857864 L16.7928932,9.79289322 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.500000, 12.000000) rotate(-90.000000) translate(-14.500000, -12.000000) "/>
                                </g>
                            </svg>
                        </span>
                    </a>
                    <br>
                    <hr>
                    <div class="dropdown-toggle" id="pi_selector" data-toggle="dropdown" aria-expanded="false">
                        <div class="symbol symbol-100 mr-5">
                            <img class="symbol-label" id="profile_image" src="{{ !is_null($employee->image) ? asset($employee->image) : asset('assets/media/logos/avatar.jpg') }}">
                        </div>
                        <div id="pidm" class="dropdown-menu" aria-labelledby="pi_selector">
                            <a id="image_selector" class="dropdown-item edit-process" href="#">Seç</a>
                            <a id="delete_profile_image" class="dropdown-item text-danger" href="#">Sil</a>
                        </div>
                    </div>
                    <h6 class="mt-3 mb-0">{{ ucwords($employee->name) }}</h6>
                    <span>{{ ucwords($employee->title) }}</span>
                    <hr>
                    <div class="d-flex justify-content-between">
                        <div>Kimlik Numarası</div>
                        <div>{{ $employee->identification_number ?? '--' }}</div>
                    </div>
                    <br>
                    <div class="d-flex justify-content-between">
                        <div>Şirket</div>
                        <div>{{ $employee->company->title ?? '--' }}</div>
                    </div>
                    <br>
                    <div class="d-flex justify-content-between">
                        <div>E-posta Adresi</div>
                        <div><a href="mailto:{{ $employee->email }}">{{ $employee->email ?? '--' }}</a></div>
                    </div>
                    <br>
                    <div class="d-flex justify-content-between">
                        <div>Telefon Numarası</div>
                        <div><a href="tel:{{ $employee->phone_number }}">{{ $employee->phone_number ?? '--' }}</a></div>
                    </div>
                    <br>
                    <div class="d-flex justify-content-between">
                        <div>Çağrı Dahilisi</div>
                        <div>{{ $employee->extension_number ?? '--' }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-7 col-12">
            <form action="{{ route('employee.update') }}" method="post" enctype="multipart/form-data" class="card">
                @csrf
                <input type="hidden" name="id" value="{{ $employee->id }}">
                <div class="card-header">
                    <div class="row">
                        <div class="col-xl-6 mt-2">
                            <h5>Bilgileri Düzenle</h5>
                        </div>
                        <div class="col-xl-6 text-right mt-n3">
                            <button type="submit" class="btn btn-success">Güncelle</button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="form-group">
                                <label for="company_id">Şirket</label>
                                <select name="company_id" id="company_id" class="form-control selectpicker">
                                    @foreach($companies as $company)
                                        <option @if($employee->company_id == $company->id) selected @endif value="{{ $company->id }}">{{ $company->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="form-group">
                                <label for="name">Ad Soyad</label>
                                <input type="text" name="name" id="name" class="form-control" value="{{ $employee->name }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="form-group">
                                <label for="email">E-posta Adresi</label>
                                <input type="email" name="email" id="email" class="form-control" value="{{ $employee->email }}" required>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="form-group">
                                <label for="phone_number">Telefon Numarası</label>
                                <input type="text" name="phone_number" id="phone_number" class="form-control mobile-phone-number" value="{{ $employee->phone_number }}">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="form-group">
                                <label for="identification_number">Kimlik Numarası</label>
                                <input type="text" name="identification_number" id="identification_number" class="form-control onlyNumber" maxlength="11" value="{{ $employee->identification_number }}">
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="form-group">
                                <label for="extension_number">Çağrı Dahili Numarası</label>
                                <input type="text" name="extension_number" id="extension_number" class="form-control onlyNumber" value="{{ $employee->extension_number }}">
                            </div>
                        </div>
                    </div>
                    <input style="display: none" type="file" name="image" id="image" value="{{ $employee->image }}">
                    <input type="hidden" name="is_delete_image" id="is_delete_image" value="0">
                </div>
            </form>
        </div>
    </div>

@endsection

@section('page-styles')
    <style>
        .dropdown-toggle::after {
            display:none;
        }
    </style>
@stop

@section('page-script')
    <script>
        $(".onlyNumber").keypress(function (e) {
            if (e.which !== 8 && e.which !== 0 && (e.which < 48 || e.which > 57)) {
                return false;
            }
        });

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#profile_image').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]); // convert to base64 string
                $("#is_delete_image").val(0);
            }
        }

        $("#image").change(function() {
            readURL(this);
        });

        $("#image_selector").click(function () {
            $("#image").trigger('click');
        });

        $("#delete_profile_image").click(function () {
            $('#profile_image').attr('src', '{{ asset('assets/media/logos/avatar.jpg') }}');
            $("#is_delete_image").val(1);
        });
    </script>
@stop
