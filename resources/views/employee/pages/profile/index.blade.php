@extends('employee.layouts.master')
@section('title', 'Profil')
@php(setlocale(LC_ALL, 'tr_TR.UTF-8'))

@section('content')

    <div class="row">
        <div class="col-xl-8">
            <form action="{{ route('employee-panel.profile.update') }}" method="post">
                @csrf
                <input type="hidden" name="employee_id" value="{{ $employee->id }}">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card bg-green">
                            <div class="card-body">
                                <div class="row clearfix">
                                    <div class="col-lg-6 col-md-12">
                                        <div class="form-group">
                                            <label for="birth_date">Doğum Tarihi</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fa fa-calendar-alt"></i>
                                                    </span>
                                                </div>
                                                <input type="date" class="form-control" id="birth_date" name="birth_date" value="{{ @$employee->personalInformations->birth_date }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12">
                                        <div class="form-group">
                                            <label for="identification_number">Kimlik Numarası</label>
                                            <input type="text" maxlength="11" class="form-control" id="identification_number" name="identification_number" value="{{ @$employee->personalInformations->identification_number }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12">
                                        <div class="form-group">
                                            <label for="civil_status">Medeni Hal</label>
                                            <select id="civil_status" name="civil_status" class="form-control" required>
                                                <option @if(@$employee->personalInformations->civil_status == 0) selected @endif value="0">Bekar</option>
                                                <option @if(@$employee->personalInformations->civil_status == 1) selected @endif value="1">Evli</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div id="wife_working_status" class="col-lg-6 col-md-12">
                                        <div class="form-group">
                                            <label for="wife_working_status">Eş Çalışma Durumu</label>
                                            <select id="wife_working_status" name="wife_working_status" class="form-control" required>
                                                <option @if(@$employee->personalInformations->wife_working_status == 0) selected @endif value="0">Hayır</option>
                                                <option @if(@$employee->personalInformations->wife_working_status == 1) selected @endif value="1">Evet</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12">
                                        <div class="form-group">
                                            <label for="gender">Cinsiyet</label>
                                            <select id="gender" name="gender" class="form-control" required>
                                                <option @if(@$employee->personalInformations->gender == 0) selected @endif value="0">Kadın</option>
                                                <option @if(@$employee->personalInformations->gender == 1) selected @endif value="1">Erkek</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12">
                                        <div class="form-group">
                                            <label for="degree_of_obstacle">Engellilik Derecesi</label>
                                            <select name="degree_of_obstacle" id="degree_of_obstacle" class="form-control">
                                                <option @if(@$employee->personalInformations->degree_of_obstacle == 0) selected @endif value="0">0</option>
                                                <option @if(@$employee->personalInformations->degree_of_obstacle == 1) selected @endif value="1">1</option>
                                                <option @if(@$employee->personalInformations->degree_of_obstacle == 2) selected @endif value="2">2</option>
                                                <option @if(@$employee->personalInformations->degree_of_obstacle == 3) selected @endif value="3">3</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12">
                                        <div class="form-group">
                                            <label for="nationality">Uyruk</label>
                                            <input type="text" class="form-control" id="nationality" name="nationality" value="{{ @$employee->personalInformations->nationality }}">
                                        </div>
                                    </div>
                                    <div id="number_of_child" class="col-lg-6 col-md-12">
                                        <div class="form-group">
                                            <label for="number_of_child">Çocuk Sayısı</label>
                                            <input type="number" class="form-control" id="number_of_child" name="number_of_child" value="{{ @$employee->personalInformations->number_of_child }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12">
                                        <div class="form-group">
                                            <label for="blood_group_id">Kan Grubu</label>
                                            <select required name="blood_group_id" id="blood_group_id" class="form-control">
                                                @foreach($bloodGroups as $bloodGroup)
                                                    <option @if(@$employee->personalInformations->blood_group_id == $bloodGroup->id) selected @endif value="{{ $bloodGroup->id }}">{{ $bloodGroup->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12">
                                        <div class="form-group">
                                            <label for="education_status">Öğrenim Durumu</label>
                                            <select required name="education_status" id="education_status" class="form-control">
                                                <option @if(@$employee->personalInformations->education_status === 1) selected @endif value="1">Mezun</option>
                                                <option @if(@$employee->personalInformations->education_status === 0) selected @endif value="0">Öğrenci</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12">
                                        <div class="form-group">
                                            <label for="education">Tamamlanan En Yüksek Eğitim Seviyesi</label>
                                            <select required name="education" id="education" class="form-control">
                                                <option @if(@$employee->personalInformations->education == "Yok") selected @endif value="Yok">Yok</option>
                                                <option @if(@$employee->personalInformations->education == "İlkokul") selected @endif value="İlkokul">İlkokul</option>
                                                <option @if(@$employee->personalInformations->education == "Ortaokul") selected @endif value="Ortaokul">Ortaokul</option>
                                                <option @if(@$employee->personalInformations->education == "Lise") selected @endif value="Lise">Lise</option>
                                                <option @if(@$employee->personalInformations->education == "Önlisans") selected @endif value="Önlisans">Önlisans</option>
                                                <option @if(@$employee->personalInformations->education == "Lisans") selected @endif value="Lisans">Lisans</option>
                                                <option @if(@$employee->personalInformations->education == "Yüksek Lisans") selected @endif value="Yüksek Lisans">Yüksek Lisans</option>
                                                <option @if(@$employee->personalInformations->education == "Doktora") selected @endif value="Doktora">Doktora</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12">
                                        <div class="form-group">
                                            <label for="last_completed_school">Son Tamamlanan Okul</label>
                                            <input type="text" id="last_completed_school" name="last_completed_school" class="form-control" value="{{ @$employee->personalInformations->last_completed_school }}">
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row clearfix">
                                    <div class="col-xl-12">
                                        <div class="form-group">
                                            <label for="address">Adres</label>
                                            <textarea id="address" class="form-control" rows="2" name="address">{{ @$employee->personalInformations->address }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-xl-4">
                                        <label for="home_phone_number">Ev Telefonu Numarası</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fa fa-phone-alt"></i>
                                    </span>
                                            </div>
                                            <input class="form-control" name="home_phone_number" id="home_phone_number" value="{{ @$employee->personalInformations->home_phone_number }}">
                                        </div>
                                    </div>
                                    <div class="col-xl-4">
                                        <div class="form-group">
                                            <label for="city">Şehir</label>
                                            <input class="form-control" id="city" name="city" value="{{ @$employee->personalInformations->city }}">
                                        </div>
                                    </div>
                                    <div class="col-xl-4">
                                        <div class="form-group">
                                            <label for="postal_code">Posta Kodu</label>
                                            <input class="form-control" id="postal_code" name="postal_code" value="{{ @$employee->personalInformations->postal_code }}">
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row clearfix">
                                    <div class="col-xl-3">
                                        <div class="form-group">
                                            <label for="bank_name">Banka Adı</label>
                                            <input type="text" class="form-control" id="bank_name" name="bank_name" value="{{ @$employee->personalInformations->bank_name }}">
                                        </div>
                                    </div>
                                    <div class="col-xl-3">
                                        <div class="form-group">
                                            <label for="bank_account_type">Hesap Türü</label>
                                            <select id="bank_account_type" name="bank_account_type" class="form-control">
                                                <option @if(@$employee->personalInformations->bank_account_type == 'Vadeli') selected @endif value="Vadeli">Vadeli</option>
                                                <option @if(@$employee->personalInformations->bank_account_type == 'Vadesiz') selected @endif value="Vadesiz">Vadesiz</option>
                                                <option @if(@$employee->personalInformations->bank_account_type == 'Çek') selected @endif value="Çek">Çek</option>
                                                <option @if(@$employee->personalInformations->bank_account_type == 'Diğer') selected @endif value="Diğer">Diğer</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xl-3">
                                        <div class="form-group">
                                            <label for="account_number">Hesap Numarası</label>
                                            <input type="text" class="form-control" id="account_number" name="account_number" value="{{ @$employee->personalInformations->account_number }}">
                                        </div>
                                    </div>
                                    <div class="col-xl-3">
                                        <div class="form-group">
                                            <label for="iban">IBAN</label>
                                            <input type="text" maxlength="26" class="form-control" id="iban" name="iban" value="{{ @$employee->personalInformations->iban }}">
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row clearfix">
                                    <div class="col-xl-4">
                                        <div class="form-group">
                                            <label for="emergency_person">Acil Durumlarda Aranacak Kişi</label>
                                            <input type="text" class="form-control" id="emergency_person" name="emergency_person" value="{{ @$employee->personalInformations->emergency_person }}">
                                        </div>
                                    </div>
                                    <div class="col-xl-4">
                                        <div class="form-group">
                                            <label for="emergency_person_degree">Yakınlık Derecesi</label>
                                            <input type="text" class="form-control" id="emergency_person_degree" name="emergency_person_degree" value="{{ @$employee->personalInformations->emergency_person_degree }}">
                                        </div>
                                    </div>
                                    <div class="col-xl-4">
                                        <label for="emergency_person_phone_number">Telefon Numarası</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fa fa-phone-alt"></i>
                                                </span>
                                            </div>
                                            <input type="text" class="form-control" id="emergency_person_phone_number" name="emergency_person_phone_number" value="{{ @$employee->personalInformations->emergency_person_phone_number }}">
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row clearfix">
                                    <div class="col-xl-12 text-right">
                                        <button type="submit" class="btn btn-sm btn-success">Güncelle</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-xl-4">
            <form action="{{ route('employee-panel.profile.changePassword') }}" method="post">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <h5>Şifre Değiştirme</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="form-group">
                                    <label for="old_password">Eski Şifrenizi Giriniz</label>
                                    <input type="password" id="old_password" name="old_password" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="form-group">
                                    <label for="password">Yeni Şifrenizi Giriniz</label>
                                    <input type="password" id="password" name="password" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="form-group">
                                    <label for="confirm_password">Yeni Şifrenizi Tekrar Giriniz</label>
                                    <input type="password" id="confirm_password" name="confirm_password" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-xl-12 text-right">
                                <button class="btn btn-sm btn-success">Şifreyi Değiştir</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection

@section('page-styles')
    @include('employee.pages.profile.components.style')
@stop

@section('page-script')
    @include('employee.pages.profile.components.script')
@stop

