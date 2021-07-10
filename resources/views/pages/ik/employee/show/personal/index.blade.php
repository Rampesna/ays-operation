@extends('layouts.master')
@section('title', $employee->name . ' - Genel Bilgiler')
@php(setlocale(LC_ALL, 'tr_TR.UTF-8'))

@section('content')

    @include('pages.ik.employee.components.subheader')

    @Authority(85)
        <form action="{{ route('ik.employee.update.personal') }}" method="post">
        @csrf
        <input type="hidden" name="employee_id" value="{{ $employee->id }}">
        <div class="row mt-15">
            <div class="col-xl-12 text-right">
                <div class="form-group">
                    <button type="submit" class="btn btn-round btn-success">Güncelle</button>
                </div>
            </div>
        </div>
        <hr class="mt-n5">
        <div class="row mt-n2">
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
                    </div>
                </div>
            </div>
        </div>
    </form>
    @else
        <div class="row mt-15">
            <div class="col-xl-12">
                <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                    <!--begin::Entry-->
                    <div class="d-flex flex-column-fluid">
                        <!--begin::Container-->
                        <div class="container">
                            <!--begin::hero-->
                            <div class="text-center pt-15">
                                <h1 class="font-weight-bolder text-dark mb-6">403!</h1>
                                <div class="h4 text-dark-50">Bu Bölümü Görüntüleme Yetkiniz Yok</div>
                                <div class="row">
                                    <div class="offset-md-3 col-md-6">
                                        <span class="svg-icon svg-icon-full">
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" id="a26a8f0d-4f9c-4927-88fb-2c6a33da07b1" data-name="Layer 1" width="1167.52" height="754.06" viewBox="0 0 1167.52 754.06">
                                                <g opacity="0.2">
                                                    <path d="M1023.5,799.4a18.25,18.25,0,0,1-1.73,2.67q-8.64-6.09-17.57-11.93c.12-.25.25-.51.39-.77a16.74,16.74,0,0,1,6-6.51c3.29-2,7-2.48,10-.86s4.76,4.93,4.94,8.77A16.85,16.85,0,0,1,1023.5,799.4Z" transform="translate(-16.24 -72.97)" fill="#3f3d56" />
                                                    <ellipse cx="1022.06" cy="779.24" rx="14.01" ry="10.7" transform="translate(-161.16 1244.78) rotate(-62.09)" fill="#3f3d56" />
                                                    <ellipse cx="1030.07" cy="764.11" rx="14.01" ry="10.7" transform="translate(-143.52 1243.81) rotate(-62.09)" fill="#3f3d56" />
                                                    <ellipse cx="1038.09" cy="748.97" rx="14.01" ry="10.7" transform="translate(-125.88 1242.84) rotate(-62.09)" fill="#3f3d56" />
                                                    <ellipse cx="1046.11" cy="733.84" rx="14.01" ry="10.7" transform="translate(-108.24 1241.87) rotate(-62.09)" fill="#3f3d56" />
                                                    <path d="M1065.55,611.5a51.89,51.89,0,0,1-.78-7l27,9.08-27-14A51.4,51.4,0,0,1,1083,563.13l26.16,37.81-20.31-42.07a51.28,51.28,0,1,1,48,90.35,51.23,51.23,0,0,1,.8,11l-41.15-.33,40.52,6.67a51.32,51.32,0,0,1-29.84,38.69,51.28,51.28,0,1,1-71.23-37.73,51.28,51.28,0,0,1,29.67-56Z" transform="translate(-16.24 -72.97)" fill="#6c63ff" />
                                                    <path d="M1131.64,682.38a51.13,51.13,0,0,1-24.53,22.88,51.28,51.28,0,1,1-71.23-37.73C1033.89,656.61,1134.34,677.29,1131.64,682.38Z" transform="translate(-16.24 -72.97)" opacity="0.1" />
                                                </g>
                                                <g opacity="0.2">
                                                    <path d="M991.37,496.93a31,31,0,0,1-2.25,4.63Q974,493.51,958.51,485.9c.14-.43.3-.87.47-1.31a27.32,27.32,0,0,1,8.3-11.66c4.87-3.9,10.74-5.37,16-3.38s8.62,7,9.67,13.12A27.21,27.21,0,0,1,991.37,496.93Z" transform="translate(-16.24 -72.97)" fill="#3f3d56" />
                                                    <ellipse cx="985.03" cy="464.84" rx="22.69" ry="17.33" transform="translate(183.96 1147.12) rotate(-69.16)" fill="#3f3d56" />
                                                    <ellipse cx="994.89" cy="438.92" rx="22.69" ry="17.33" transform="translate(214.54 1139.64) rotate(-69.16)" fill="#3f3d56" />
                                                    <ellipse cx="1004.76" cy="413.01" rx="22.69" ry="17.33" transform="translate(245.11 1132.16) rotate(-69.16)" fill="#3f3d56" />
                                                    <ellipse cx="1014.62" cy="387.09" rx="22.69" ry="17.33" transform="translate(275.69 1124.68) rotate(-69.16)" fill="#3f3d56" />
                                                    <path d="M1021.49,186.67a83.22,83.22,0,0,1-2.65-11.17l45.22,9.21-46.16-17.18a83.11,83.11,0,0,1,21.91-62L1089.37,161l-41-63.54a83,83,0,1,1,95.09,135.6,83.51,83.51,0,0,1,3.46,17.52l-66.17,7.67,66.43,2.65a83.07,83.07,0,0,1-40.24,68.1,83,83,0,1,1-122-46.42,83,83,0,0,1,36.52-95.94Z" transform="translate(-16.24 -72.97)" fill="#6c63ff" />
                                                    <path d="M1141.79,287.38A82.63,82.63,0,0,1,1106.93,329a83,83,0,1,1-122-46.42C979.6,265.45,1145.11,278.67,1141.79,287.38Z" transform="translate(-16.24 -72.97)" opacity="0.1" />
                                                </g>
                                                <g opacity="0.2">
                                                    <path d="M194.62,583.14a37.65,37.65,0,0,0,2,5.8q19-7.29,38.43-14c-.11-.53-.22-1.07-.36-1.62a32.46,32.46,0,0,0-8.07-15c-5.18-5.32-11.89-7.92-18.34-6.34s-11.2,7-13.35,14.05A32.48,32.48,0,0,0,194.62,583.14Z" transform="translate(-16.24 -72.97)" fill="#3f3d56" />
                                                    <ellipse cx="206.83" cy="546.21" rx="20.61" ry="26.98" transform="translate(-139.85 -8.35) rotate(-13.72)" fill="#3f3d56" />
                                                    <ellipse cx="199.01" cy="514.17" rx="20.61" ry="26.98" transform="translate(-132.48 -11.12) rotate(-13.72)" fill="#3f3d56" />
                                                    <ellipse cx="191.2" cy="482.14" rx="20.61" ry="26.98" transform="translate(-125.1 -13.89) rotate(-13.72)" fill="#3f3d56" />
                                                    <ellipse cx="183.38" cy="450.11" rx="20.61" ry="26.98" transform="translate(-117.73 -16.66) rotate(-13.72)" fill="#3f3d56" />
                                                    <path d="M204.82,212.6a97.19,97.19,0,0,0,4.78-12.79L154.89,204l57-13.47a98.81,98.81,0,0,0-16.71-76.43L128.5,172.34l57.77-68.93a98.72,98.72,0,1,0-132.2,146,99,99,0,0,0-6.67,20.15l76.95,18.82L45.57,281.7A98.78,98.78,0,0,0,83,368a98.72,98.72,0,1,0,150.76-36.79,98.73,98.73,0,0,0-29-118.59Z" transform="translate(-16.24 -72.97)" fill="#6c63ff" />
                                                    <path d="M48,313.7A98.3,98.3,0,0,0,83,368a98.72,98.72,0,1,0,150.76-36.79C242.64,311.73,45.39,302.93,48,313.7Z" transform="translate(-16.24 -72.97)" opacity="0.1" />
                                                </g>
                                                <path d="M1072.54,186.69H103.8a8.64,8.64,0,0,0-8.63,8.65V788.23a17.43,17.43,0,0,0,17.4,17.46h951.2a17.43,17.43,0,0,0,17.4-17.46V195.34A8.64,8.64,0,0,0,1072.54,186.69Z" transform="translate(-16.24 -72.97)" fill="url(#ab1c7cfe-44b5-4159-9f4a-9e5eb45dcf3d)" />
                                                <path d="M1077.25,223.5V784.74A17.26,17.26,0,0,1,1060,802H116.51a17.26,17.26,0,0,1-17.26-17.26V223.5Z" transform="translate(-16.24 -72.97)" fill="#fff" />
                                                <path d="M228.17,216.69V802H116.51a17.26,17.26,0,0,1-17.26-17.26v-568Z" transform="translate(-16.24 -72.97)" fill="#d7d9e1" />
                                                <path d="M1077.25,198.56V223.5h-978V198.56a8.56,8.56,0,0,1,8.56-8.56h960.88A8.56,8.56,0,0,1,1077.25,198.56Z" transform="translate(-16.24 -72.97)" fill="#ededf4" />
                                                <circle cx="98.51" cy="133.52" r="4" fill="#fa5959" opacity="0.8" />
                                                <circle cx="109.51" cy="133.52" r="4" fill="#fed253" opacity="0.8" />
                                                <circle cx="120.51" cy="133.52" r="4" fill="#8ccf4d" opacity="0.8" />
                                                <rect x="371.93" y="199.71" width="94" height="10" fill="#ededf4" />
                                                <rect x="371.93" y="228.71" width="528" height="10" fill="#ededf4" />
                                                <rect x="371.93" y="257.71" width="528" height="10" fill="#ededf4" />
                                                <rect x="371.93" y="286.71" width="528" height="10" fill="#ededf4" />
                                                <rect x="371.93" y="315.71" width="528" height="10" fill="#ededf4" />
                                                <rect x="95.93" y="199.71" width="94" height="10" fill="#ededf4" />
                                                <rect x="95.93" y="228.71" width="94" height="10" fill="#ededf4" />
                                                <rect x="95.93" y="257.71" width="94" height="10" fill="#ededf4" />
                                                <rect x="95.93" y="286.71" width="94" height="10" fill="#ededf4" />
                                                <rect x="95.93" y="315.71" width="94" height="10" fill="#ededf4" />
                                                <rect x="640.17" y="170.69" width="4" height="6" transform="translate(799.61 -541.45) rotate(90)" fill="url(#bef5b74f-e0e9-4f25-a252-2de6d30fcb3c)" />
                                                <path d="M929.24,701.15a1.88,1.88,0,0,0-1-1.48,1.92,1.92,0,0,0-2.55,1.07l-9.21,19.37-2.07,76.25h3.32l1.24-76.08,10.12-17.93A1.92,1.92,0,0,0,929.24,701.15Z" transform="translate(-16.24 -72.97)" fill="#3f3d56" />
                                                <path d="M1069,819.92a1.46,1.46,0,0,1-.16.19,2.67,2.67,0,0,1-1.14.57h0a11.14,11.14,0,0,1-2.57.43h-.26a10.65,10.65,0,0,1-1.49,0,7.88,7.88,0,0,0-1.09-.07h0a7.63,7.63,0,0,0-1.55.38,13.29,13.29,0,0,1-3.44.49l-.42,0c-1.3,0-2.62,0-3.93,0h-.63c-2.24,0-4.46.42-6.7.45h-.72a10.58,10.58,0,0,1-6.18-1.85,2.34,2.34,0,0,1-.81-.93,2.68,2.68,0,0,1-.15-1.23,2.9,2.9,0,0,1,.75-2.06,3.22,3.22,0,0,1,1.19-.58l2.28-.72,2.44-.73.16-.05.46-.13.29-.1a4.72,4.72,0,0,0,1-.47,3.36,3.36,0,0,0,1-1c0-.08.1-.16.14-.24l0-.19c-.07-.52-.13-1-.22-1.56a6.15,6.15,0,0,1-3.06-1.73,9.88,9.88,0,0,1-1.79-2.41,50.82,50.82,0,0,1-2.33-6.17,55.59,55.59,0,0,0-4.63-8.89c-1.59-2.65-3.18-5.3-5-7.8-1.2-1.65-2.49-3.24-3.68-4.9a43.31,43.31,0,0,1-7.07-15.46,21.46,21.46,0,0,0-.86-3.14c-.71-1.74-2-3.15-3-4.75a15.59,15.59,0,0,1-2.19-5.62c-.21-1.14-.56-2.36-1.69-2.48h0l-.12.24c-2.34,4.57-4.75,9.2-8.29,12.92a13.83,13.83,0,0,0-1.55,1.78,18.13,18.13,0,0,0-1,1.91,12.6,12.6,0,0,1-2.2,3.22,7.42,7.42,0,0,1-.87.74,4.87,4.87,0,0,1-1.37.68h0a3.9,3.9,0,0,1-.59.14.68.68,0,0,1,0,.14c0,.06,0,.11,0,.16a19.56,19.56,0,0,1-.76,9.92c0,.1-.07.2-.1.29-.17.47-.36.92-.56,1.37-.51,1.1-1.11,2.15-1.58,3.27-.08.19-.16.38-.23.57-1.67,4.44-1.26,9.39-1.46,14.16a15.36,15.36,0,0,1-.37,3.1c-.28,1.15-.73,2.34-1,3.52a6,6,0,0,0,0,2.72l-.1,0c-.45.17-.9.32-1.35.46v.06c.17.93.32,1.86.48,2.78a4.1,4.1,0,0,0,.86,2.22,4.18,4.18,0,0,1,.4.44c.33.51,0,1.19.1,1.8.09.86.89,1.59.76,2.45a1.6,1.6,0,0,1-1,1.15,2.82,2.82,0,0,1-.64.21l-.13,0-.75.09a34.69,34.69,0,0,1-9.27.09c-.61-.1-1.21-.24-1.82-.29a12.84,12.84,0,0,0-2.32.1,114.47,114.47,0,0,1-17.07.33c-1.48-.08-3.18-.32-4-1.59a4.67,4.67,0,0,1-.08-3.6,3.74,3.74,0,0,1,.5-1.26.94.94,0,0,1,.09-.12c.76-.94,2.2-1,3.43-1l4,.12a3.59,3.59,0,0,0,1.18-.1,12.36,12.36,0,0,0,1.77-1c.77-.37,1.74-.4,2.29-1l.07-.09a3.18,3.18,0,0,0,.28-.43l.06-.08h0a.35.35,0,0,0,0-.08c.51-.67,1.41-.89,2.13-1.32a1.44,1.44,0,0,0,.31-.22l.08-.07a8.61,8.61,0,0,1-2-2,2.14,2.14,0,0,1-.46-.8,1.21,1.21,0,0,1,.05-.68,1,1,0,0,1,.07-.15.08.08,0,0,1,0,0c.28-.56.86-1.06,1.18-1.63l0-.05a2.57,2.57,0,0,0-.13-2.79c.33-5.45,1.83-10.78,2.17-16.24.13-2.17.07-4.35.17-6.52s.34-4.29.58-6.42c.55-4.88,1.87-9.66,1.69-14.56a9,9,0,0,1,0-1.37s0-.06,0-.09a8.2,8.2,0,0,1,.93-2.87,22.18,22.18,0,0,1,2-2.87c2.55-3.31,5.61-6.62,6.52-10.71a23.13,23.13,0,0,1,2.54-5.93,10.42,10.42,0,0,1,2.21-3.11,9.39,9.39,0,0,0,1.47-1.26c.68-.88.7-2.09,1.1-3.14.21-.54.53-1,.69-1.6a1,1,0,0,1,0-.17,10.86,10.86,0,0,0,.14-1.71c0-.16,0-.32,0-.48v0a17.37,17.37,0,0,1,1.42-4.74l.25-.57a17.66,17.66,0,0,1-5-4.32,9.87,9.87,0,0,1-1.2-1.82,22,22,0,0,1-1.45-5.48c-1-4.43-3.17-8.6-3.47-13.12a14.83,14.83,0,0,0-.48-4.11,8.76,8.76,0,0,0-.47-1c-.08-.14-.15-.28-.22-.42a.8.8,0,0,1-.08-.16l-.22-.41-.34.26a248.49,248.49,0,0,1-26.61,18.19l-.8.47a2.93,2.93,0,0,0-1,.86l-.09.16h0c-.19.39-.24.84-.4,1.25a3.38,3.38,0,0,1-2.31,1.84,7.13,7.13,0,0,1-5.24-.68c-.2-.1-.4-.21-.59-.33a6.65,6.65,0,0,1-.66.32,6.49,6.49,0,0,1-.87.33,18.21,18.21,0,0,1-5.11.46,15.54,15.54,0,0,0-5.09.56,12.82,12.82,0,0,1-3.27,1h-.39a5.88,5.88,0,0,1-1.85-.55l-.34-.15c-.17-.09-.34-.17-.51-.28a2.69,2.69,0,0,1-.5-.39,1.83,1.83,0,0,1-.47-.79,1.34,1.34,0,0,1,0-.66.39.39,0,0,1,.14-.25.41.41,0,0,1,.24-.06,7.5,7.5,0,0,1,1.42.12,4.66,4.66,0,0,0,.83,0h.15a1.77,1.77,0,0,0,1.26-.7.66.66,0,0,0,.11-.2h0a.87.87,0,0,0,.08-.37.29.29,0,0,0,0-.09c-.17-.08-.35-.16-.51-.25l-.25-.15-.05,0a2.44,2.44,0,0,1-.43-.35,1.33,1.33,0,0,1-.21-.26,1.57,1.57,0,0,1-.25-.5h0a2.38,2.38,0,0,0-1,0c-.45.12-.91.39-1.36.48a1.13,1.13,0,0,1-.68,0c-.65-.23-.87-1-1-1.69,0-.13,0-.26-.08-.4h0a2.27,2.27,0,0,1,0-.78,2.84,2.84,0,0,1,1.09-1.42l1.36-1.14.1-.08a3.43,3.43,0,0,1-.06-.34,2,2,0,0,1,0-.77,2.86,2.86,0,0,1,1.09-1.42l3-2.53a3.52,3.52,0,0,1,1.91-1c1.09-.07,2,.83,2.78,1.55a6.15,6.15,0,0,0,3.64,1.75,5.27,5.27,0,0,0,1.93-.26l.35-.12c-.07-.15-.15-.3-.22-.46s-.24-.51-.35-.76a8.29,8.29,0,0,0,4.7-2.25c1.34-1.16,2.49-2.53,3.84-3.67s3.13-2.17,4.61-3.36c3.44-2.79,5.73-6.89,9.41-9.35,1.27-.86,2.75-1.54,3.62-2.82.27-.39.47-.84.75-1.23.88-1.24,2.39-1.81,3.64-2.67a18,18,0,0,0,3.35-3.34c.72-.87,1.45-1.74,2.13-2.63.64-1.18,1.17-2.41,1.84-3.58a17.79,17.79,0,0,1,2-2.77c.17-.33.34-.66.53-1s.32-.55.49-.81.25-.37.38-.55c-.38-.67-.74-1.25-.91-1.49l-.08-.12a12.93,12.93,0,0,0-1.17-1.09q-.66-.11-1.29-.27a12.09,12.09,0,0,1-8.89-11.68v0a12,12,0,0,1,1.32-5.46c.17-.34.36-.66.56-1a5.31,5.31,0,0,1-.55-.23,2.12,2.12,0,0,1-.77-.63,1.84,1.84,0,0,1-.32-.81,4.07,4.07,0,0,1,.3-2,9,9,0,0,1,.38-.9s0,0,0-.05a11.54,11.54,0,0,1,9.75-6.18c4.26-.17,8.4,1.82,11.76,4.68A15.83,15.83,0,0,1,993,629.6a17,17,0,0,1,2.77,8.64,13.11,13.11,0,0,1,0,2.87,6.81,6.81,0,0,1-.2,1c-.06.2-.13.39-.2.58a4.08,4.08,0,0,1-.19.42v0a2.93,2.93,0,0,1-.21.39l0,.05-.06.09.11.24a2.26,2.26,0,0,0,.11.22h0c.84.07,1.6.18,2.44.25a5.18,5.18,0,0,1,1.18.18,8.06,8.06,0,0,1,2.15,1.34c1.73,1.22,3.85,1.79,5.54,3.05,2.51,1.86,3.75,4.92,5.24,7.67,2,3.68,5.23,6.81,6.66,10.75l1.95,5.35a82.1,82.1,0,0,0,4.27,10.3c2.4,4.59,5.66,8.72,7.59,13.52a2.13,2.13,0,0,0,1,1.12,87.69,87.69,0,0,1,7,11.68,22.58,22.58,0,0,1,2.38,6.77,16.09,16.09,0,0,1-.52,6.32,29.11,29.11,0,0,1-1.21,3.59,6,6,0,0,0-.41,1.28.68.68,0,0,0,0,.14,12.11,12.11,0,0,0,.3,2.38,4.38,4.38,0,0,1-.21,1.9c0,.09-.07.19-.11.28a11.08,11.08,0,0,0-.65,1.51l0,.19a7.52,7.52,0,0,0,.42,2.71,35.93,35.93,0,0,1,.41,9.94c-.1,1.65,1.24,3,2.36,4.21a44.61,44.61,0,0,1,5.25,7.64,24.23,24.23,0,0,1,2.15,4.29,37.92,37.92,0,0,1,1.15,5.28c1.06,5.47,4.51,10.3,5.45,15.79a14.16,14.16,0,0,0,3.2,6.79,13.91,13.91,0,0,1,1.38,1.67,6.73,6.73,0,0,1,.69,1.49,11,11,0,0,1,.56,3.78,6,6,0,0,0,.11,1.84c.39,1.27,1.78,2,2.36,3.17s.17,2.73.39,4.09a4.48,4.48,0,0,0,1.64,2.76c-.33.29-.68.56-1,.82a4.08,4.08,0,0,1,.86.9,3.49,3.49,0,0,1,.39.74c.55,1.27.57,2.78,1,4.12a2.94,2.94,0,0,1,.29,1.73,1.94,1.94,0,0,0-.14.51c0,.38.39.62.54,1A1,1,0,0,1,1069,819.92Z" transform="translate(-16.24 -72.97)" fill="url(#edd93e19-8656-44cb-97b1-fa57f76832a0)" />
                                                <path d="M981.25,658.3a26.18,26.18,0,0,0,7-3.53l7.71-4.91a6.72,6.72,0,0,1-5-3.46,17.7,17.7,0,0,1-1.88-6,31.35,31.35,0,0,0-8.86,5.8c-1.07.92-3.32,2.3-3.65,3.73s1.76,2.59,2.57,3.55C979.45,653.83,982.07,658.08,981.25,658.3Z" transform="translate(-16.24 -72.97)" fill="#fbbebe" />
                                                <path d="M981.25,658.3a26.18,26.18,0,0,0,7-3.53l7.71-4.91a6.72,6.72,0,0,1-5-3.46,17.7,17.7,0,0,1-1.88-6,31.35,31.35,0,0,0-8.86,5.8c-1.07.92-3.32,2.3-3.65,3.73s1.76,2.59,2.57,3.55C979.45,653.83,982.07,658.08,981.25,658.3Z" transform="translate(-16.24 -72.97)" opacity="0.1" />
                                                <path d="M939.1,698.87a8.52,8.52,0,0,1-4.33,1.31,6.32,6.32,0,0,1-3.64-1.74c-.81-.72-1.68-1.62-2.77-1.54a3.57,3.57,0,0,0-1.91,1l-3,2.52a2.09,2.09,0,0,0-1,2.57c.14.67.36,1.46,1,1.69s1.35-.27,2-.45a2.39,2.39,0,0,1,2.35.69,1.41,1.41,0,0,1,.4.9c0,.75-.84,1.24-1.59,1.28s-1.5-.21-2.25-.16a.41.41,0,0,0-.24.06.4.4,0,0,0-.14.24,1.57,1.57,0,0,0,.48,1.45,4.19,4.19,0,0,0,1.35.81,5.49,5.49,0,0,0,1.85.55c1.27.08,2.44-.63,3.65-1a16,16,0,0,1,5.08-.56,17.74,17.74,0,0,0,5.1-.45,5.77,5.77,0,0,0,3.86-3.13.81.81,0,0,0,.07-.48.82.82,0,0,0-.35-.41c-2.31-1.71-3.25-3.79-5.85-5Z" transform="translate(-16.24 -72.97)" fill="#fbbebe" />
                                                <path d="M939.1,698.87a8.52,8.52,0,0,1-4.33,1.31,6.32,6.32,0,0,1-3.64-1.74c-.81-.72-1.68-1.62-2.77-1.54a3.57,3.57,0,0,0-1.91,1l-3,2.52a2.09,2.09,0,0,0-1,2.57c.14.67.36,1.46,1,1.69s1.35-.27,2-.45a2.39,2.39,0,0,1,2.35.69,1.41,1.41,0,0,1,.4.9c0,.75-.84,1.24-1.59,1.28s-1.5-.21-2.25-.16a.41.41,0,0,0-.24.06.4.4,0,0,0-.14.24,1.57,1.57,0,0,0,.48,1.45,4.19,4.19,0,0,0,1.35.81,5.49,5.49,0,0,0,1.85.55c1.27.08,2.44-.63,3.65-1a16,16,0,0,1,5.08-.56,17.74,17.74,0,0,0,5.1-.45,5.77,5.77,0,0,0,3.86-3.13.81.81,0,0,0,.07-.48.82.82,0,0,0-.35-.41c-2.31-1.71-3.25-3.79-5.85-5Z" transform="translate(-16.24 -72.97)" opacity="0.1" />
                                                <path d="M987.63,654.67a5,5,0,0,0-4.38-.53,9.43,9.43,0,0,0-3.78,2.52,17.24,17.24,0,0,0-2.66,3.52c-.71,1.23-1.26,2.54-1.95,3.78a39.41,39.41,0,0,1-4.5,6.11,17.55,17.55,0,0,1-3.35,3.32c-1.24.86-2.75,1.43-3.63,2.66-.28.39-.48.83-.76,1.23-.86,1.26-2.33,1.94-3.61,2.79-3.68,2.45-6,6.52-9.39,9.29-1.48,1.19-3.15,2.13-4.61,3.35s-2.5,2.49-3.83,3.64a8.2,8.2,0,0,1-4.7,2.23,24,24,0,0,0,4.6,7.24c2,2,5,3.35,7.8,2.55a3.39,3.39,0,0,0,2.31-1.83,7.56,7.56,0,0,1,.48-1.41,3,3,0,0,1,1.05-.85,247.16,247.16,0,0,0,31.54-21.86c2.67-2.17,5.31-4.11,8-6.2a17.51,17.51,0,0,0,2.71-2.37,9,9,0,0,0,1.09-9.92,23.75,23.75,0,0,0-2.51-3.41A30.08,30.08,0,0,0,987.63,654.67Z" transform="translate(-16.24 -72.97)" fill="#6c63ff" />
                                                <path d="M987.63,654.67a5,5,0,0,0-4.38-.53,9.43,9.43,0,0,0-3.78,2.52,17.24,17.24,0,0,0-2.66,3.52c-.71,1.23-1.26,2.54-1.95,3.78a39.41,39.41,0,0,1-4.5,6.11,17.55,17.55,0,0,1-3.35,3.32c-1.24.86-2.75,1.43-3.63,2.66-.28.39-.48.83-.76,1.23-.86,1.26-2.33,1.94-3.61,2.79-3.68,2.45-6,6.52-9.39,9.29-1.48,1.19-3.15,2.13-4.61,3.35s-2.5,2.49-3.83,3.64a8.2,8.2,0,0,1-4.7,2.23,24,24,0,0,0,4.6,7.24c2,2,5,3.35,7.8,2.55a3.39,3.39,0,0,0,2.31-1.83,7.56,7.56,0,0,1,.48-1.41,3,3,0,0,1,1.05-.85,247.16,247.16,0,0,0,31.54-21.86c2.67-2.17,5.31-4.11,8-6.2a17.51,17.51,0,0,0,2.71-2.37,9,9,0,0,0,1.09-9.92,23.75,23.75,0,0,0-2.51-3.41A30.08,30.08,0,0,0,987.63,654.67Z" transform="translate(-16.24 -72.97)" opacity="0.1" />
                                                <path d="M969.82,808.41a6.66,6.66,0,0,0-2.12,1.32c-.17.21-.28.47-.46.67-.55.65-1.53.68-2.29,1.05a13.55,13.55,0,0,1-1.77,1,3.94,3.94,0,0,1-1.19.09l-4-.12c-1.28,0-2.78,0-3.52,1.07a3.74,3.74,0,0,0-.5,1.26,4.62,4.62,0,0,0,.08,3.58c.78,1.25,2.48,1.49,4,1.57a112.87,112.87,0,0,0,17-.33,13.74,13.74,0,0,1,2.31-.09,18.16,18.16,0,0,1,1.82.29,35,35,0,0,0,9.26-.09,4.71,4.71,0,0,0,1.53-.33,1.58,1.58,0,0,0,1-1.14c.13-.86-.67-1.58-.76-2.44-.06-.61.23-1.28-.1-1.79a2.72,2.72,0,0,0-.4-.43,4.09,4.09,0,0,1-.85-2.21l-.75-4.28a1.27,1.27,0,0,0-.34-.8,1.19,1.19,0,0,0-.52-.21c-3.15-.72-6.39-.06-9.54.34a26.53,26.53,0,0,1-4.88.24c-.7,0-1-.13-1.5.33S970.48,808,969.82,808.41Z" transform="translate(-16.24 -72.97)" fill="#3f3d56" />
                                                <path d="M1046.08,813.53a6.58,6.58,0,0,1-1.77.69q-2.44.72-4.87,1.49a3.22,3.22,0,0,0-1.19.58,2.86,2.86,0,0,0-.75,2.05,2.66,2.66,0,0,0,.15,1.22,2.39,2.39,0,0,0,.81.92,10.85,10.85,0,0,0,6.61,1.84c2.33,0,4.64-.39,7-.45,2.82-.08,5.71.32,8.41-.47a8.12,8.12,0,0,1,1.6-.39,8,8,0,0,1,1.09.07,11.39,11.39,0,0,0,4.31-.39,2.65,2.65,0,0,0,1.15-.57,1.09,1.09,0,0,0,.31-1.17c-.15-.33-.53-.58-.54-1a1.94,1.94,0,0,1,.14-.51,2.91,2.91,0,0,0-.29-1.72c-.54-1.6-.45-3.44-1.41-4.83a6.14,6.14,0,0,0-4.38-2.18,12.21,12.21,0,0,0-4.09.12c-1.51.32-2.92,1-4.41,1.43a14.59,14.59,0,0,1-5.3.5c-1.19-.1-.78.09-1.18,1.08A3.49,3.49,0,0,1,1046.08,813.53Z" transform="translate(-16.24 -72.97)" fill="#3f3d56" />
                                                <circle cx="963.62" cy="567.57" r="12.02" fill="#fbbebe" />
                                                <path d="M1067,809.23c-3.73,3.21-8.77,4.61-13.68,4.66a11.18,11.18,0,0,1-6-1.28c-.12-.68-.17-1.41-.3-2.09a7.66,7.66,0,0,1-4.84-4.12,50.23,50.23,0,0,1-2.33-6.13,55.1,55.1,0,0,0-4.63-8.84c-1.58-2.63-3.17-5.26-5-7.74-1.2-1.65-2.49-3.22-3.67-4.87a43,43,0,0,1-7.07-15.36,19.45,19.45,0,0,0-.86-3.12,30.94,30.94,0,0,0-3-4.72,15.51,15.51,0,0,1-2.19-5.59c-.21-1.13-.55-2.35-1.69-2.47h0c-2.38,4.63-4.81,9.32-8.4,13.08a12.85,12.85,0,0,0-1.55,1.76,17.34,17.34,0,0,0-1,1.91,12,12,0,0,1-2.19,3.2,5.13,5.13,0,0,1-2.83,1.54,19.26,19.26,0,0,1-1.36,11.81c-.5,1.1-1.1,2.14-1.57,3.25-1.93,4.55-1.49,9.7-1.69,14.64a15.07,15.07,0,0,1-.36,3.08c-.51,2-1.54,4.18-1,6.2-5.2,2-11,1.86-16.47,1a7.9,7.9,0,0,1-3.07-.93,8.57,8.57,0,0,1-2-2,2.14,2.14,0,0,1-.46-.8c-.21-.95.84-1.64,1.32-2.48A2.55,2.55,0,0,0,969,800c.33-5.43,1.83-10.73,2.16-16.15.14-2.16.08-4.32.18-6.48s.33-4.26.57-6.38c.55-4.84,1.88-9.59,1.69-14.46a8.38,8.38,0,0,1,1-4.31,21.06,21.06,0,0,1,2-2.85c2.54-3.29,5.6-6.58,6.51-10.64a23,23,0,0,1,2.53-5.89,10.41,10.41,0,0,1,2.22-3.09,9.79,9.79,0,0,0,1.46-1.26c.68-.87.7-2.08,1.11-3.12a17.2,17.2,0,0,0,.67-1.59,8.9,8.9,0,0,0,.19-1.86,17.14,17.14,0,0,1,1.72-5.78,17.67,17.67,0,0,1-5-4.29,10.39,10.39,0,0,1-1.21-1.81,22.74,22.74,0,0,1-1.45-5.44c-1-4.41-3.15-8.55-3.46-13a14.73,14.73,0,0,0-.48-4.09,13.69,13.69,0,0,0-.77-1.59,6.4,6.4,0,0,1-.65-1.61c-.27-1.22.1-2.5,0-3.74a27.21,27.21,0,0,0-.8-3.2,15.36,15.36,0,0,1-.12-4.23,35.12,35.12,0,0,0,.32-5,19.36,19.36,0,0,1,5.26-14.89l.1-.1c.79-.81,1.65-1.56,2.37-2.44,1-1.17,1.67-2.56,2.68-3.7.45-.51,1-1,1.4-1.48a12.05,12.05,0,0,1,1.34-1.51,2.08,2.08,0,0,1,1.88-.5,4.92,4.92,0,0,0,.57,1.76c.86.07,1.63.19,2.48.26a5.18,5.18,0,0,1,1.18.18,7.78,7.78,0,0,1,2.15,1.33c1.72,1.21,3.84,1.78,5.53,3,2.51,1.84,3.75,4.89,5.23,7.62,2,3.66,5.23,6.77,6.66,10.68q1,2.67,1.94,5.32a81.9,81.9,0,0,0,4.27,10.24c2.4,4.55,5.65,8.66,7.57,13.43a2.15,2.15,0,0,0,1,1.11,87.55,87.55,0,0,1,7,11.61,22.06,22.06,0,0,1,2.37,6.73c.46,3.34-.46,6.72-1.72,9.85a4.91,4.91,0,0,0-.43,1.41,11.22,11.22,0,0,0,.3,2.36,4.46,4.46,0,0,1-.32,2.17,9.86,9.86,0,0,0-.65,1.5,6.41,6.41,0,0,0,.39,2.88,35.5,35.5,0,0,1,.4,9.88c-.09,1.64,1.25,3,2.36,4.18a44.61,44.61,0,0,1,5.25,7.59,25,25,0,0,1,2.14,4.26,37.36,37.36,0,0,1,1.16,5.26c1,5.43,4.5,10.23,5.43,15.68a14,14,0,0,0,3.2,6.74,14.56,14.56,0,0,1,1.38,1.67,6.2,6.2,0,0,1,.68,1.48,10.94,10.94,0,0,1,.57,3.76,5.35,5.35,0,0,0,.11,1.83c.38,1.26,1.78,2,2.35,3.15s.18,2.71.4,4.06A4.32,4.32,0,0,0,1067,809.23Z" transform="translate(-16.24 -72.97)" fill="#6c63ff" />
                                                <path d="M941.59,695.14a8.55,8.55,0,0,1-4.33,1.31,6.29,6.29,0,0,1-3.64-1.74c-.82-.72-1.69-1.62-2.77-1.54a3.54,3.54,0,0,0-1.91,1l-3,2.52a2.77,2.77,0,0,0-1.08,1.41,2.68,2.68,0,0,0,.07,1.16c.13.67.36,1.46,1,1.69s1.35-.27,2-.45a2.37,2.37,0,0,1,2.35.69,1.36,1.36,0,0,1,.4.9c0,.75-.83,1.25-1.59,1.28s-1.49-.21-2.24-.16a.42.42,0,0,0-.25.06.45.45,0,0,0-.14.24A1.6,1.6,0,0,0,927,705a4.57,4.57,0,0,0,1.36.82,5.73,5.73,0,0,0,1.84.54c1.28.08,2.45-.63,3.65-1a15.85,15.85,0,0,1,5.09-.57,17.77,17.77,0,0,0,5.1-.45,5.76,5.76,0,0,0,3.85-3.13.68.68,0,0,0,.07-.48.8.8,0,0,0-.34-.41c-2.32-1.71-3.26-3.79-5.86-5Z" transform="translate(-16.24 -72.97)" fill="#fbbebe" />
                                                <path d="M974,633.16a10.1,10.1,0,0,0-2,.87,3.46,3.46,0,0,1-2.83-.16,2.12,2.12,0,0,1-.77-.63,3,3,0,0,1,0-2.79,11.39,11.39,0,0,1,10.15-7.08c4.25-.17,8.39,1.81,11.74,4.65a16.43,16.43,0,0,1,2.67,2.79,16.9,16.9,0,0,1,2.77,8.59,11.24,11.24,0,0,1-.26,3.84,4.68,4.68,0,0,1-2.17,2.94,4.33,4.33,0,0,1-3.81-.17,15.45,15.45,0,0,1-3.25-2.37,5,5,0,0,0-1.62-1,1.68,1.68,0,0,0-1.76.42c-.55.67-.42,1.76-.92,2.48a2.74,2.74,0,0,1-2.44.82,2.79,2.79,0,0,1-2.32-.78,2.9,2.9,0,0,1-.23-2.37,7.56,7.56,0,0,0,.41-2.43c-.17-1.64-1.62-2.68-2.07-4.2-.29-1,.36-1.42.29-2.32A1.3,1.3,0,0,0,974,633.16Z" transform="translate(-16.24 -72.97)" fill="#3f3d56" />
                                                <path d="M1011.77,747.46l0,.1h0c-2.38,4.63-4.81,9.32-8.4,13.08a12.85,12.85,0,0,0-1.55,1.76,17.34,17.34,0,0,0-1,1.91,12,12,0,0,1-2.19,3.2l-3,1.5,9.53-49.73Z" transform="translate(-16.24 -72.97)" opacity="0.1" />
                                                <path d="M997.92,672.19a17.51,17.51,0,0,1-2.71,2.37c-2.74,2.09-5.38,4-8,6.2q-3.23,2.63-6.52,5.13a6.4,6.4,0,0,1-.65-1.61c-.27-1.22.1-2.5,0-3.74a27.21,27.21,0,0,0-.8-3.2,15.36,15.36,0,0,1-.12-4.23,35.12,35.12,0,0,0,.32-5,19.36,19.36,0,0,1,5.26-14.89l.1-.1a7.77,7.77,0,0,1,1.41-.63,5,5,0,0,1,4.38.53,29.86,29.86,0,0,1,6,5.86,23.12,23.12,0,0,1,2.51,3.4A9,9,0,0,1,997.92,672.19Z" transform="translate(-16.24 -72.97)" opacity="0.1" />
                                                <path d="M990.12,650.94a5,5,0,0,0-4.39-.53,9.46,9.46,0,0,0-3.77,2.52,17.28,17.28,0,0,0-2.67,3.52c-.7,1.23-1.26,2.54-1.94,3.78a38.84,38.84,0,0,1-4.51,6.11,17.22,17.22,0,0,1-3.34,3.32c-1.25.86-2.76,1.43-3.64,2.66-.28.39-.48.83-.75,1.23-.87,1.26-2.34,1.94-3.62,2.79-3.67,2.45-6,6.52-9.38,9.29-1.48,1.19-3.15,2.13-4.61,3.35s-2.5,2.49-3.84,3.64a8.15,8.15,0,0,1-4.69,2.23,24,24,0,0,0,4.59,7.24c2,2,5.05,3.35,7.81,2.55a3.38,3.38,0,0,0,2.3-1.83,8.39,8.39,0,0,1,.49-1.41,3,3,0,0,1,1.05-.85,247.87,247.87,0,0,0,31.54-21.86c2.67-2.17,5.31-4.11,8-6.2a17.06,17.06,0,0,0,2.71-2.37,9,9,0,0,0,1.1-9.92,22.49,22.49,0,0,0-2.52-3.4A29.81,29.81,0,0,0,990.12,650.94Z" transform="translate(-16.24 -72.97)" fill="#6c63ff" />
                                                <g opacity="0.1">
                                                    <path d="M980.31,644.67a2.76,2.76,0,0,1-2.32-.78,2.9,2.9,0,0,1-.23-2.37,7.5,7.5,0,0,0,.41-2.42c-.17-1.65-1.62-2.68-2.07-4.21-.29-1,.36-1.42.29-2.32a1.31,1.31,0,0,0-1.55-1.07,10.1,10.1,0,0,0-2,.87,3.46,3.46,0,0,1-2.83-.15,2.35,2.35,0,0,1-.77-.63,3,3,0,0,1,0-2.8l0-.09a10.53,10.53,0,0,0-.86,1.75,3,3,0,0,0,0,2.79,2.12,2.12,0,0,0,.77.63A3.46,3.46,0,0,0,972,634a10.1,10.1,0,0,1,2-.87,1.3,1.3,0,0,1,1.55,1.07c.07.9-.58,1.32-.29,2.32.45,1.52,1.9,2.56,2.07,4.2a7.56,7.56,0,0,1-.41,2.43,2.9,2.9,0,0,0,.23,2.37,2.79,2.79,0,0,0,2.32.78,2.74,2.74,0,0,0,2.44-.82,3.38,3.38,0,0,0,.45-1.27A3.53,3.53,0,0,1,980.31,644.67Z" transform="translate(-16.24 -72.97)" />
                                                    <path d="M994.1,644.52a4.31,4.31,0,0,1-3.8-.16A16.54,16.54,0,0,1,987,642a4.73,4.73,0,0,0-1.61-1,1.68,1.68,0,0,0-1.76.42,3.24,3.24,0,0,0-.52,1.4,1.75,1.75,0,0,1,1.45-.16,5,5,0,0,1,1.62,1,15.45,15.45,0,0,0,3.25,2.37,4.33,4.33,0,0,0,3.81.17,4.63,4.63,0,0,0,2.13-2.8A3.76,3.76,0,0,1,994.1,644.52Z" transform="translate(-16.24 -72.97)" />
                                                </g>
                                                <circle cx="874.73" cy="737.28" r="12.43" fill="#3f3d56" />
                                                <circle cx="874.73" cy="737.28" r="12.43" opacity="0.1" />
                                                <circle cx="874.73" cy="737.28" r="7.87" fill="#65617d" />
                                                <circle cx="874.73" cy="737.28" r="7.87" opacity="0.1" />
                                                <path d="M881.43,790.77l8.16,18.44a1.58,1.58,0,0,0,2.87.06l9.7-19.75Z" transform="translate(-16.24 -72.97)" fill="#3f3d56" />
                                                <path d="M881.43,790.77l8.16,18.44a1.58,1.58,0,0,0,2.87.06l9.7-19.75Z" transform="translate(-16.24 -72.97)" opacity="0.1" />
                                                <circle cx="797.23" cy="737.28" r="12.43" fill="#3f3d56" />
                                                <circle cx="797.23" cy="737.28" r="12.43" opacity="0.1" />
                                                <circle cx="797.23" cy="737.28" r="7.87" fill="#65617d" />
                                                <circle cx="797.23" cy="737.28" r="7.87" opacity="0.1" />
                                                <path d="M803.94,790.77l8.16,18.44a1.58,1.58,0,0,0,2.87.06l9.69-19.75Z" transform="translate(-16.24 -72.97)" fill="#3f3d56" />
                                                <path d="M803.94,790.77l8.16,18.44a1.58,1.58,0,0,0,2.87.06l9.69-19.75Z" transform="translate(-16.24 -72.97)" opacity="0.1" />
                                                <path d="M931.31,702a1.86,1.86,0,0,0-1-1.48,1.92,1.92,0,0,0-2.55,1.07l-7.13,17.71-2.07,79.57h3.31l1.24-79.4,8.06-16.27A1.91,1.91,0,0,0,931.31,702Z" transform="translate(-16.24 -72.97)" fill="#3f3d56" />
                                                <polygon points="768.43 719.66 779.62 712.62 900.42 711.58 903.53 719.66 768.43 719.66" fill="#6c63ff" />
                                                <polygon points="768.43 727.12 768.43 719.66 905.72 718.34 905.59 723.39 770.91 723.39 770.91 727.12 768.43 727.12" fill="#3f3d56" />
                                                <circle cx="785.83" cy="741.63" r="12.43" fill="#3f3d56" />
                                                <circle cx="785.83" cy="741.63" r="7.87" fill="#65617d" />
                                                <path d="M792.54,795.12l8.16,18.44a1.58,1.58,0,0,0,2.87.06l9.69-19.74Z" transform="translate(-16.24 -72.97)" fill="#3f3d56" />
                                                <circle cx="882.39" cy="741.63" r="12.43" fill="#3f3d56" />
                                                <circle cx="882.39" cy="741.63" r="7.87" fill="#65617d" />
                                                <path d="M889.1,795.12l8.16,18.44a1.58,1.58,0,0,0,2.87.06l9.69-19.74Z" transform="translate(-16.24 -72.97)" fill="#3f3d56" />
                                                <rect x="787.93" y="633.71" width="82" height="82" fill="#ededf4" />
                                                <path d="M820.85,742.48h13.9v20.84h-13.9Zm17.37-10.42h13.89v31.26H838.22Zm17.37,17.36h13.89v13.9H855.59Z" transform="translate(-16.24 -72.97)" fill="#6c63ff" />
                                                <rect x="801.93" y="551.71" width="82" height="82" fill="#d7d9e1" />
                                                <path d="M845.27,683.05h27.79v5.21H845.27Zm13.9-13.89a3.48,3.48,0,0,0,0-6.95,3.83,3.83,0,0,0-1,.13L851,657.06l-.43.38,5.31,7.24a3.29,3.29,0,0,0-.16,1A3.47,3.47,0,0,0,859.17,669.16Z" transform="translate(-16.24 -72.97)" fill="#6c63ff" />
                                                <path d="M859.17,643.11a22.57,22.57,0,0,0-17.79,36.47h6.38l.43-.44,2.4-2.39-2.48-2.49-2.4,2.39a17.25,17.25,0,0,1-3.82-9.23h3.38V664h-3.38a17.25,17.25,0,0,1,3.82-9.23l2.4,2.39,2.48-2.49-2.39-2.39a17.28,17.28,0,0,1,9.23-3.82v3.38h3.47v-3.38a17.25,17.25,0,0,1,9.23,3.82l-2.39,2.39,2.49,2.49,2.4-2.39a17.33,17.33,0,0,1,3.82,9.23h-3.39v3.47h3.39a17.33,17.33,0,0,1-3.82,9.23l-2.4-2.39-2.49,2.49,2.4,2.39.44.44H877a22.58,22.58,0,0,0-17.79-36.47Z" transform="translate(-16.24 -72.97)" fill="#6c63ff" />
                                                <rect x="373.93" y="362.71" width="82" height="82" opacity="0.1" />
                                                <rect x="371.93" y="360.71" width="82" height="82" fill="#ededf4" />
                                                <path d="M420.48,453.85h6.95v41.68h-6.95Zm-10.42,29.52H417v12.16h-6.95Zm20.84-6.95h7v19.11h-7ZM441.32,466h6.95v29.53h-6.95Z" transform="translate(-16.24 -72.97)" fill="#6c63ff" />
                                                <rect x="817.93" y="361.71" width="82" height="82" opacity="0.1" />
                                                <rect x="815.93" y="359.71" width="82" height="82" fill="#ededf4" />
                                                <path d="M886.56,465.25l-9.47,14.48a5.13,5.13,0,0,1,1.17,3.28,5.21,5.21,0,0,1-10.42,0,6.12,6.12,0,0,1,.09-1l-6.25-3.64a5.19,5.19,0,0,1-6.18.78l-6.65,6.23v6.21a4.65,4.65,0,0,0,4.63,4.64h39.37a4.66,4.66,0,0,0,4.64-4.64V468.56l-6.36-4.23a5.23,5.23,0,0,1-4.57.92Z" transform="translate(-16.24 -72.97)" fill="#6c63ff" />
                                                <path d="M858.07,469.45a5.21,5.21,0,0,1,5.21,5.21c0,.22,0,.45,0,.67l6.52,3.65a5.2,5.2,0,0,1,3.3-1.18,5.76,5.76,0,0,1,1.13.12l9.49-14.69a5.16,5.16,0,0,1-1-3,5.21,5.21,0,0,1,10.42,0,5.52,5.52,0,0,1-.14,1.23l4.49,3v-8.69a4.66,4.66,0,0,0-4.64-4.64H853.48a4.65,4.65,0,0,0-4.63,4.64v24.89l4.34-4.16a5.2,5.2,0,0,1,4.88-7Z" transform="translate(-16.24 -72.97)" fill="#6c63ff" />
                                                <rect x="595.93" y="365.71" width="82" height="82" opacity="0.1" />
                                                <rect x="593.93" y="363.71" width="82" height="82" fill="#ededf4" />
                                                <path d="M637.27,495.05h27.79v5.21H637.27Zm13.9-13.89a3.48,3.48,0,0,0,0-7,3.83,3.83,0,0,0-1,.13L643,469.06l-.43.38,5.31,7.24a3.29,3.29,0,0,0-.16,1A3.47,3.47,0,0,0,651.17,481.16Z" transform="translate(-16.24 -72.97)" fill="#6c63ff" />
                                                <path d="M651.17,455.11a22.57,22.57,0,0,0-17.79,36.47h6.38l.43-.44,2.4-2.39-2.48-2.49-2.4,2.39a17.25,17.25,0,0,1-3.82-9.23h3.38V476h-3.38a17.25,17.25,0,0,1,3.82-9.23l2.4,2.39,2.48-2.49-2.39-2.39a17.28,17.28,0,0,1,9.23-3.82v3.38h3.47v-3.38a17.25,17.25,0,0,1,9.23,3.82l-2.39,2.39,2.49,2.49,2.4-2.39a17.33,17.33,0,0,1,3.82,9.23h-3.39v3.47h3.39a17.33,17.33,0,0,1-3.82,9.23l-2.4-2.39-2.49,2.49,2.4,2.39.44.44H669a22.58,22.58,0,0,0-17.79-36.47Z" transform="translate(-16.24 -72.97)" fill="#6c63ff" />
                                                <rect x="561.93" y="494.71" width="82" height="82" opacity="0.1" />
                                                <rect x="554.93" y="488.71" width="82" height="82" fill="#ededf4" />
                                                <path d="M621.89,588.09l5.57,5.56L615.6,605.53l-9.73-9.73-18,18.05,3.43,3.43,14.59-14.59,9.73,9.73,15.31-15.3,5.57,5.57v-14.6Z" transform="translate(-16.24 -72.97)" fill="#6c63ff" />
                                                <path d="M557.71,820c.59-2.52,1-4.73,1-4.73a9.73,9.73,0,0,1,1.09-4.8v-.68h0v-5.07a16.92,16.92,0,0,0-1.27-2.65c-.92-1.59,0-7.43,0-7.43s3.38-8.22,2.55-13.43S568,758,568,758a22.48,22.48,0,0,0-.74-5.12,4.4,4.4,0,0,1-.09-1.08s0-.08,0-.13v0c.11-3.44,2.83-9.88,2.83-9.88l-.36-12.29s-1.74-7.25,1.1-17c1-3.39,1.62-6.11,2-8.2,0-.24.09-.47.13-.69-5.83-.89-10.28-1.63-10.28-1.63s3.38-14.14,5.66-16.62,4.11-10.25,4.11-10.25,1.19-10-.73-12.91-2.19-8-2.19-8-4.39-3.18-4.94-4.59a23.8,23.8,0,0,1-1.46-6.28c0-1.68.55-3.18.37-4.07s1.28-4.24.55-5.83a4.38,4.38,0,0,1-.3-1.54V632a21.42,21.42,0,0,1,.39-4.15,11.7,11.7,0,0,1,4.33-2.32l.1-.38.25-1a4.92,4.92,0,0,1,.43-.26v-.36l0-1.43-.69-3.23c-1.34-5.61,6.14-6.45,6.14-6.45a3.94,3.94,0,0,1,2.13-1.86c1.51-.53.25,8.44-.46,9a33.77,33.77,0,0,0-3,4.62h0l-.13.23a3.41,3.41,0,0,1,.34.35l-.28,2,0,.3a8.25,8.25,0,0,1,1.19,2,4.36,4.36,0,0,0-1.1,3.18,10,10,0,0,1-.45,3.89c.08-.09,1.05-1.14,2-.88s3.65,1.06,3.65,1.06,2,.35,1.83.8,1.37,2.38,1.37,2.38l5.4-5.11c.05-.16.11-.31.15-.47a11.68,11.68,0,0,0,.47-2.24,11.86,11.86,0,0,1-1.72-.55,3.59,3.59,0,0,1-1.5-1,5.82,5.82,0,0,1-.87-2.32,32.45,32.45,0,0,0-2-4.47,14.54,14.54,0,0,1-1.08-8,5.27,5.27,0,0,1,.83-2.35c.88-1.22,2.48-1.71,3.64-2.68s1.92-2.44,3.27-3.17a6.5,6.5,0,0,1,4.1-.35,21.86,21.86,0,0,1,7.65,2.78,3.87,3.87,0,0,0,2.56.84,3.44,3.44,0,0,0,1.85-1.35l0-.08.06-.07a9.57,9.57,0,0,1,.84,4c0,.22,0,.44,0,.65a1.79,1.79,0,0,0,0,.23,1.09,1.09,0,0,0,0,.18h0a.9.9,0,0,0,0,.28,2,2,0,0,0,.51.73,4.41,4.41,0,0,1,.44.6c0-.07-.05-.15-.08-.22a3.13,3.13,0,0,1,.56,1.7,1.7,1.7,0,0,1-.4,1.22,6.67,6.67,0,0,1-.88.71,10.76,10.76,0,0,1,.16,1.8,10.47,10.47,0,0,1-5.09,8.91l-.18.46a12.81,12.81,0,0,0-1,5.89c0,.14,0,.28.06.43l.2.22h0s8.91.09,11-1.81,5.3,4.64,5.3,4.64,3.19.62,3.83,0,4.39-.09,4.39-.09a8,8,0,0,1,5.57-2,16.34,16.34,0,0,1,4.09-2.27h0l.1,0h0a4.49,4.49,0,0,1,2-.25s4.38-3.63,5.66-5.57,7.37-9.16,7.4-9.2l0-.34.07-1.06a3.43,3.43,0,0,0,.55,0c0-.1.07-.23.12-.36a20.24,20.24,0,0,1,1.29-3s0-1.33-.38-1.66.16-5.2.16-5.2,4-9.23,7.49-2.34c0,0,6.69,4.46,1.07,9.66,0,0-2.24,1.08-2.56,1.94-.2.56-1,2.12-1.48,3.16l-.22.46.06,0-.08.87,0,.34c1.06.6,1.78,1.19,1.6,1.65a10.36,10.36,0,0,0-.64,2.38s-7.76,9.73-8.76,13.88c0,0-20.83,12.38-27.68,13.26l1.19,6.19s.36,3.71.27,5,.82,7.34.82,7.34,1.19,8.84,2.2,10.08.82,6.54.82,6.54a44,44,0,0,0,1.37,7.51,19.23,19.23,0,0,1,.27,7.52s3.47,7.95-4.84,2.56c0,0-4.08-.25-8.78-.41,0,.15,0,.31,0,.47,0,.6,0,1.26,0,1.95.06,4.55.09,10.83-.12,15.58-.36,8.4-2.92,25-2.92,25v8.35a11.11,11.11,0,0,1,.24,2.39,15.51,15.51,0,0,1-2.25,8.36l-.64,5.57a21.82,21.82,0,0,0-1.53,5.86,2.83,2.83,0,0,0,.07.53,4,4,0,0,1,.07.85c.08,2.53-1.44,8.58-1.44,8.58s-.09,6.1-1,6.46,1,3.51,1.59,4.43a.85.85,0,0,0,0-.17l.11.18a4.25,4.25,0,0,1,.28,1.55,2.21,2.21,0,0,1-1,2.14c-1.74,1.06-2.67,1.94-1.2,2.3a13.65,13.65,0,0,1,1.61.34,1.8,1.8,0,0,0,.08-.21,1,1,0,0,1,.6,1.07,4.56,4.56,0,0,1-.54,2.07,21.84,21.84,0,0,1-2.48,4.51l-.7-.08a3.69,3.69,0,0,0,.41.75,2.89,2.89,0,0,0,1,.92,3.32,3.32,0,0,0,1.25.43,3.52,3.52,0,0,1,2.59,1.26c.91,1.17,1.48,2.78-.32,4.19l-6.53,2.25s-11.24,1.46-10.64-1.06,1-4.73,1-4.73a9.93,9.93,0,0,1,.91-4.47c.12-.22.25-.44.4-.66l-.4,0s-.82-5.57-1.92-6.63c-.25-.25-.31-.43-.25-.58-.11-.3.17-.48.54-.58a1.43,1.43,0,0,1,.08.22,5.47,5.47,0,0,1,1.09-.12s.37-2.92-.82-4a1.15,1.15,0,0,1-.23-.87,4.9,4.9,0,0,1,.12-1.18l.05.06a43.41,43.41,0,0,1,2.62-6.85s.09-2.65-.64-3.71.09-14.41.09-14.41-.27-6.46.55-9.46-1-6.54-1-6.54l0-.2,0,0s0-.4.11-1l0,.06c.18-1.71.53-4.8.79-6.23.36-2-.09-11.76-.09-11.76L591,735.23l-2.92,7.16L585,751.93A8.12,8.12,0,0,0,583.4,756c0,.1,0,.2,0,.3s0,.44,0,.64a5.72,5.72,0,0,1-1,3.4s-.82,4.51-2.1,5.66a5.1,5.1,0,0,0-1.28,3.36s-1.55,6.54-2.29,7.69c-.61,1-.64,3.63-.64,4.45h0c0,.15,0,.24,0,.24s-.22,2.34-.21,4.3c0,.24,0,.48,0,.7v-.05a6.74,6.74,0,0,0,.19,1.59l0,.09,0-.33a16.88,16.88,0,0,1,.47,4.08c0,2.35-.32,5.13-1.74,6.77-2.47,2.83-4,2.47-4,2.47s1.19,3.54,2.65,4.25a.65.65,0,0,1,.15.1,1.55,1.55,0,0,0,0-.21,1.74,1.74,0,0,1,.43,1.32,9.48,9.48,0,0,1-1.81,5.24,2.9,2.9,0,0,1-1.24.72l.23.14a5.5,5.5,0,0,0,.51.24,2.85,2.85,0,0,0,.74.2,3.49,3.49,0,0,1,2.59,1.25c.91,1.18,1.48,2.78-.32,4.19l-6.53,2.26S557.12,822.51,557.71,820Z" transform="translate(-16.24 -72.97)" fill="url(#a7aacfe1-33f0-4fa2-a43d-b0dbbe7da94f)" />
                                                <path d="M600.62,824.16l6.32-2.25c1.75-1.41,1.19-3,.31-4.19a3.35,3.35,0,0,0-2.5-1.26,3.09,3.09,0,0,1-1.21-.43,2.79,2.79,0,0,1-1-.92,4.67,4.67,0,0,1-.73-2.44s-6.94-2-8.84,0a5.36,5.36,0,0,0-.84,1.23,10.33,10.33,0,0,0-.88,4.47s-.35,2.21-.93,4.73S600.62,824.16,600.62,824.16Z" transform="translate(-16.24 -72.97)" fill="#3f3d56" />
                                                <path d="M569.68,821.05l6.32-2.26c1.74-1.41,1.19-3,.31-4.19a3.35,3.35,0,0,0-2.5-1.25,2.7,2.7,0,0,1-.73-.2,4.28,4.28,0,0,1-.48-.24c-1.77-1-1.73-3.36-1.73-3.36s-6.94-2-8.84,0a5.42,5.42,0,0,0-.66.91,10,10,0,0,0-1.06,4.8s-.36,2.21-.93,4.73S569.68,821.05,569.68,821.05Z" transform="translate(-16.24 -72.97)" fill="#3f3d56" />
                                                <path d="M560.13,802.06a18.2,18.2,0,0,1,1.24,2.65v7c1.77,2.91,11,1.94,12.2.35s2.56-5.75,1.15-6.45-2.57-4.25-2.57-4.25,1.51.36,3.89-2.47,1.68-9.11,1.24-10.61,0-6.54,0-6.54-.09-3.54.62-4.69,2.21-7.69,2.21-7.69a5.2,5.2,0,0,1,1.24-3.36c1.24-1.15,2-5.66,2-5.66a5.78,5.78,0,0,0,.88-3.8c-.26-2.21,1.51-4.59,1.51-4.59l3-9.55,2.83-7.16,1.59,4.15s.45,9.73.09,11.76-.88,7.43-.88,7.43,1.77,3.53,1,6.54-.53,9.46-.53,9.46-.8,13.35-.09,14.41.62,3.71.62,3.71-3.62,7.78-2.47,8.84.79,4,.79,4-2.47,0-1.41,1.06,1.85,6.63,1.85,6.63l10.69,1.24a22.5,22.5,0,0,0,2.4-4.51c1.41-3.27-.27-2.92-1.69-3.27s-.52-1.24,1.16-2.3.7-3.45.7-3.45-2.56-4.33-1.68-4.68,1-6.46,1-6.46,1.76-7.25,1.32-9.19,1.42-6.63,1.42-6.63l.62-5.57A15.32,15.32,0,0,0,610,757.86v-8.58s2.48-16.62,2.83-25c.23-5.38.16-12.72.09-17.3,0-2.57-.09-4.27-.09-4.27l-38.19-4a31.47,31.47,0,0,1-.69,5.67c-.39,2.1-1,4.81-2,8.21a37.27,37.27,0,0,0-1.06,17l.35,12.29s-3.36,8.22-2.65,11a23.75,23.75,0,0,1,.7,5.13s-7.51,17.94-6.71,23.16-2.48,13.44-2.48,13.44S559.25,800.47,560.13,802.06Z" transform="translate(-16.24 -72.97)" fill="#65617d" />
                                                <g opacity="0.05">
                                                    <path d="M604.33,802a2.06,2.06,0,0,0,.95-1.51l.11.18s1,2.39-.71,3.45l-.54.36c-.31-.06-.65-.1-1-.18C601.75,804,602.65,803.06,604.33,802Z" transform="translate(-16.24 -72.97)" />
                                                    <path d="M590.89,801.29c-.28-.26-.27-.94-.1-1.81a4.81,4.81,0,0,1,.59,2.56A2.17,2.17,0,0,0,590.89,801.29Z" transform="translate(-16.24 -72.97)" />
                                                    <path d="M592.5,757.31a12,12,0,0,1,.7,3.25,12.43,12.43,0,0,0-.81-2.23S592.43,757.93,592.5,757.31Z" transform="translate(-16.24 -72.97)" />
                                                    <path d="M568.61,752.67a4.57,4.57,0,0,1-.09-1c.13.66.22,1.28.29,1.81C568.75,753.24,568.69,753,568.61,752.67Z" transform="translate(-16.24 -72.97)" />
                                                    <path d="M592.75,788.74a5.56,5.56,0,0,1-.27-2,6.61,6.61,0,0,1,.52,2.48A2.1,2.1,0,0,0,592.75,788.74Z" transform="translate(-16.24 -72.97)" />
                                                    <path d="M604.68,789.54s-.09,6.1-1,6.45h0c-.45-1-.75-2-.35-2.12.88-.36,1-6.46,1-6.46s1.77-7.25,1.33-9.19,1.41-6.63,1.41-6.63l.62-5.57a15.32,15.32,0,0,0,1.94-10.52v-8.58s2.48-16.62,2.83-25c.23-5.38.17-12.72.09-17.3,0-.83,0-1.56,0-2.18l.31,0s0,1.7.08,4.27c.08,4.58.14,11.92-.08,17.3-.36,8.4-2.83,25-2.83,25v8.57a15.36,15.36,0,0,1-2,10.52l-.62,5.57s-1.85,4.69-1.41,6.63S604.68,789.54,604.68,789.54Z" transform="translate(-16.24 -72.97)" />
                                                    <path d="M559.77,799.7a16.93,16.93,0,0,1,1.24,2.65v1.24c-.2-.45-.49-1.05-.88-1.77a5.29,5.29,0,0,1-.39-2.19Z" transform="translate(-16.24 -72.97)" />
                                                    <path d="M572.67,801.09a15.68,15.68,0,0,1-.87-2.1s1.5.36,3.89-2.47c1.73-2.06,1.83-5.95,1.58-8.49.45,1.51,1.16,7.78-1.23,10.61C574.48,800.49,573.3,801,572.67,801.09Z" transform="translate(-16.24 -72.97)" />
                                                    <path d="M577.28,781.49a46.38,46.38,0,0,0-.18,5.24,7.72,7.72,0,0,0-.18-.82c-.44-1.5,0-6.54,0-6.54s-.08-3.54.62-4.69,2.21-7.69,2.21-7.69a5.2,5.2,0,0,1,1.24-3.36c1.24-1.15,2-5.65,2-5.65a5.86,5.86,0,0,0,.89-3.81c-.27-2.21,1.5-4.59,1.5-4.59l3-9.55,2.83-7.16,1.59,4.15,0,1.35L591.6,735l-2.83,7.16-3,9.55s-1.76,2.39-1.5,4.6a5.78,5.78,0,0,1-.88,3.8s-.8,4.51-2,5.65a5.23,5.23,0,0,0-1.23,3.36s-1.51,6.55-2.21,7.7S577.28,781.49,577.28,781.49Z" transform="translate(-16.24 -72.97)" />
                                                </g>
                                                <path d="M569.86,618.84l.66,3.23,0,1.44,0,1.06,3.69.38.41-.77h0a33.82,33.82,0,0,1,2.87-4.63c.68-.57,1.89-9.55.43-9a3.88,3.88,0,0,0-2.05,1.86S568.55,613.23,569.86,618.84Z" transform="translate(-16.24 -72.97)" fill="#ffcdd3" />
                                                <path d="M570.45,624.57l3.69.38.41-.77h0a3.24,3.24,0,0,0-4.07-.67Z" transform="translate(-16.24 -72.97)" opacity="0.1" />
                                                <path d="M569.52,626.31l4.86,1.13.11-.72.27-2a3.34,3.34,0,0,0-4.71-.64l-.24,1Z" transform="translate(-16.24 -72.97)" fill="#dce6f2" />
                                                <path d="M648.32,619.2l5.19,2.78s.19-.41.47-1c.49-1,1.23-2.59,1.43-3.15.31-.86,2.47-2,2.47-2,5.44-5.19-1-9.65-1-9.65-3.42-6.9-7.24,2.34-7.24,2.34s-.54,4.86-.16,5.19.37,1.66.37,1.66a21,21,0,0,0-1.25,3C648.4,618.89,648.32,619.2,648.32,619.2Z" transform="translate(-16.24 -72.97)" fill="#ffcdd3" />
                                                <path d="M648.32,619.2l5.19,2.78s.19-.41.47-1c-.74-.61-3.33-2.72-4.19-2.62a6.72,6.72,0,0,1-1.23,0C648.4,618.89,648.32,619.2,648.32,619.2Z" transform="translate(-16.24 -72.97)" opacity="0.1" />
                                                <path d="M647.78,620.77l5.84,2.87.12-1.25.08-.87s-3.38-2.9-4.38-2.79a5.36,5.36,0,0,1-1.52,0l-.07,1Z" transform="translate(-16.24 -72.97)" fill="#dce6f2" />
                                                <path d="M584,640.28s25.44,2.87,20.69,1.33c-3.31-1.08-4.63-3.18-4.9-5.52a13.21,13.21,0,0,1,.94-5.89,25.52,25.52,0,0,1,2.28-4.59s-19.45-10.7-15.56-1a15.46,15.46,0,0,1,1.1,4.6,12.79,12.79,0,0,1-.5,4.67A13.88,13.88,0,0,1,584,640.28Z" transform="translate(-16.24 -72.97)" fill="#ffcdd3" />
                                                <path d="M587.45,624.64a15.46,15.46,0,0,1,1.1,4.6c1.83,1.54,3.84,1.44,6.42,1.44,2,0,4.18.48,5.76-.48a25.52,25.52,0,0,1,2.28-4.59S583.56,614.91,587.45,624.64Z" transform="translate(-16.24 -72.97)" opacity="0.1" />
                                                <circle cx="579.08" cy="547.86" r="10.52" fill="#ffcdd3" />
                                                <path d="M584,640.28s25.44,2.87,20.69,1.33c-3.31-1.08-4.63-3.18-4.9-5.52-1.27-1.37-3.82-2.36-5.45-2.89a7.64,7.64,0,0,0-4.61-.07,6.52,6.52,0,0,0-1.68.78A13.88,13.88,0,0,1,584,640.28Z" transform="translate(-16.24 -72.97)" opacity="0.1" />
                                                <path d="M569.52,626.31l4.86,1.13.11-.72a4.29,4.29,0,0,0-4.68-1.6Z" transform="translate(-16.24 -72.97)" opacity="0.1" />
                                                <path d="M647.78,620.77l5.84,2.87.12-1.25a43.62,43.62,0,0,0-5.89-2.61Z" transform="translate(-16.24 -72.97)" opacity="0.1" />
                                                <path d="M573.94,704.39c9.85,1.56,23.87,3.58,26.1,2.9,1.84-.56,7.74-.5,12.87-.32,0-2.57-.09-4.27-.09-4.27l-38.19-4A31.47,31.47,0,0,1,573.94,704.39Z" transform="translate(-16.24 -72.97)" opacity="0.1" />
                                                <path d="M564.11,702.08s32.44,5.57,35.93,4.51,21.35.08,21.35.08c8.05,5.4,4.69-2.56,4.69-2.56a19.61,19.61,0,0,0-.27-7.51,45.92,45.92,0,0,1-1.32-7.52s.18-5.3-.8-6.54-2.12-10.08-2.12-10.08-.88-6-.79-7.34-.27-5-.27-5l-1.15-6.19c6.63-.89,26.79-13.26,26.79-13.26,1-4.16,8.48-13.88,8.48-13.88a10.18,10.18,0,0,1,.62-2.39c.53-1.41-7.42-4.24-7.42-4.24s-5.93,7.25-7.16,9.19-5.48,5.57-5.48,5.57a4.38,4.38,0,0,0-2,.25l-.1,0h0a15.8,15.8,0,0,0-4,2.27,7.7,7.7,0,0,0-5.39,2s-3.62-.53-4.24.09-3.71,0-3.71,0-3.1-6.55-5.13-4.65S600,636.75,600,636.75c-1.15-1.53-3.95-2.63-5.7-3.19a7.64,7.64,0,0,0-4.61-.08,5.88,5.88,0,0,0-1.82.88l-5.24,5.13s-1.5-2-1.32-2.39-1.77-.8-1.77-.8-2.56-.79-3.54-1.06-1.86.79-1.94.88a10.27,10.27,0,0,0,.44-3.88,4.45,4.45,0,0,1,1.06-3.18c-3.09-7.61-10.08-1.24-10.08-1.24s-.79,4.15-.09,5.74-.7,5-.53,5.84-.35,2.39-.35,4.07a23.69,23.69,0,0,0,1.42,6.27c.53,1.42,4.77,4.6,4.77,4.6s.26,5,2.12,8,.71,12.9.71,12.9-1.77,7.78-4,10.26S564.11,702.08,564.11,702.08Z" transform="translate(-16.24 -72.97)" fill="#3f3d56" />
                                                <path d="M598.16,630.37a2.23,2.23,0,0,1-.82,1.42,2.11,2.11,0,0,1-1,.22c-3.21.2-6.55.34-9.52-.89a3.72,3.72,0,0,1-1.44-1,5.82,5.82,0,0,1-.84-2.33,34.5,34.5,0,0,0-1.94-4.47,15,15,0,0,1-1.05-8,5.54,5.54,0,0,1,.81-2.35c.85-1.21,2.4-1.7,3.52-2.67s1.85-2.45,3.17-3.17a6,6,0,0,1,4-.35,20.74,20.74,0,0,1,7.41,2.78,3.77,3.77,0,0,0,2.48.84,3.46,3.46,0,0,0,1.82-1.4,9.76,9.76,0,0,1,.78,4.59,2,2,0,0,0,0,.69,2,2,0,0,0,.49.73c.79.92,1.28,2.37.5,3.3-.34.4-.86.62-1.19,1-.6.74-.4,1.81-.38,2.75a1.42,1.42,0,0,1-.24.93,1.32,1.32,0,0,1-1.29.31,3.66,3.66,0,0,0-1.39-.13,2.33,2.33,0,0,0-1.2.93A16.37,16.37,0,0,0,598.16,630.37Z" transform="translate(-16.24 -72.97)" fill="#2d293d" />
                                                <path d="M600,636.75s-13.15,1.74-14.33-.24" transform="translate(-16.24 -72.97)" opacity="0.1" />
                                                <path d="M426.17,740.69h-10a1,1,0,0,0,0,2h2v13.36H383.92a1,1,0,0,0-.75-.36h-10a1,1,0,0,0,0,2h2v13.72H342.11a1,1,0,0,0-.94-.72h-10a1,1,0,0,0,0,2h1v14.09H298.58a1,1,0,0,0-.41-.09h-10a1,1,0,0,0,0,2h1v13.45H256a1,1,0,0,0-.81-.45h-10a1,1,0,0,0,0,2h1v15h226v-78Z" transform="translate(-16.24 -72.97)" fill="#3f3d56" />
                                                <path d="M190.53,802.15a8,8,0,0,0,3.41,3.72,29.36,29.36,0,0,1,4.26,2.91c1.54,1.46,2.54,3.48,4.35,4.6a8.81,8.81,0,0,0,2.2.91,13.86,13.86,0,0,0,2.71.55,19.16,19.16,0,0,0,7-1.2,6.49,6.49,0,0,0,2.1-.92,5.85,5.85,0,0,0,.8-.77,4.5,4.5,0,0,0,1.1-1.74,1.42,1.42,0,0,0-.1-1.05,2.42,2.42,0,0,0-.89-.85,15.1,15.1,0,0,0-2-1.11,10.27,10.27,0,0,1-2.62-1.39,6.1,6.1,0,0,1-1.27-1.71,16.56,16.56,0,0,1-1.44-3.45,11.23,11.23,0,0,0-.8-2.35c-.43-.79-1.12-1.47-1.58-2.24.24,0,.49,0,.73-.1a6.82,6.82,0,0,0-.8-3.54c1,.08,1.47-1.23,1.31-2.2s-.63-2-.21-2.88a5.34,5.34,0,0,1,1.13-1.3c1.59-1.68,1.54-4.24,2.2-6.44a18.68,18.68,0,0,1,1.65-3.58c1.91-3.45,2.79-7.77,5.87-10.26l2.77-2.24a1.18,1.18,0,0,0,.43-.51c.16-.43-.18-.88-.16-1.34.05-.81,1.15-1.14,1.52-1.87a4.62,4.62,0,0,0,.27-1.11c.29-1.27,1.53-2.06,2.42-3a6.81,6.81,0,0,0,1.77-5.44,4.61,4.61,0,0,1-.08-1.48,7.14,7.14,0,0,1,.39-1,9,9,0,0,0,.33-3.24,29,29,0,0,1,.63-5.15l13.66-3.1c.09.1.17.2.27.3,1.21,1.23,1.81,3,3,4.28l1.56,1.72c.3.33.61.77.43,1.17s-.41.41-.6.63a1.07,1.07,0,0,0,.92,1.69,2.06,2.06,0,0,0,1.07,3.09,8.28,8.28,0,0,1-1.14,1.74,1.44,1.44,0,0,1,.3.88,4.18,4.18,0,0,1-.2.56,2.37,2.37,0,0,0,.11,1.26,18.93,18.93,0,0,1,0,9.8,5.66,5.66,0,0,0-.26,1.35,4,4,0,0,0,.17,1.13c.46,1.65,1.38,3.38.74,5a10.3,10.3,0,0,0-.54,1.17c-.36,1.2.47,2.38.92,3.55a12,12,0,0,1,.44,5c-.11,2.32-.23,4.63-.34,6.94a2.76,2.76,0,0,0,.13,1.25,2.13,2.13,0,0,0,1.4,1.08c-.14.47-.28.94-.44,1.4a.83.83,0,0,0-1.4-.06,1.48,1.48,0,0,0-.18.66,16.61,16.61,0,0,0,.81,4.91,2.28,2.28,0,0,1,.07.78,4.92,4.92,0,0,1-.27.79,1.17,1.17,0,0,0-.06.2,4.87,4.87,0,0,0,.22,2.38,2.1,2.1,0,0,0,.69,1.27,2,2,0,0,0,.9.28c4.78.55,9.44-2.56,14.22-2,1,.11,1.94.37,2.92.47a15.34,15.34,0,0,0,3.45-.17c1.6-.21,3.19-.48,4.76-.79a11.84,11.84,0,0,0,3.47-1.11,4.32,4.32,0,0,0,2.23-2.73,2.05,2.05,0,0,0-.2-1.54,1.78,1.78,0,0,0-.4-.42,4.3,4.3,0,0,0-1.24-.59l-1.85-.67a11.12,11.12,0,0,0-2.76-.72c-.69-.06-1.4,0-2.09,0-2.44-.13-4.59-1.53-6.6-2.87l-2.74-1.82a1.77,1.77,0,0,0-1.87-.31l-.38.14,1.69-.94q.12-12.36-.06-24.71a25.89,25.89,0,0,0-.58-6.09c-.3-1.14-.62-2.63.38-3.27.26-.89-.27-1.78-.51-2.66s.1-2.15,1-2.16c-.92-1.62-.89-3.58-.93-5.44,0-1.53-.12-3-.3-4.57a12.93,12.93,0,0,0-1.58-5.38l13.48-3.06-.44-1.95,2-.45-10.86-47.81a1.27,1.27,0,0,0,.83-1.14c-.05-.47-.51-.9-.36-1.35.09-.27.36-.42.53-.65a1.55,1.55,0,0,0-.17-1.78.79.79,0,0,1-.19-.44.87.87,0,0,1,.1-.31,2.34,2.34,0,0,0-.67-2.78.91.91,0,0,0-.39-.2c-.32,0-.6.1-.92,0s-.33-.28-.69-.31h-.11l-4.11-18.09a18,18,0,0,0,.72-2.68,8.52,8.52,0,0,0-.43-4.85,9.91,9.91,0,0,0,2.38-1.79,1.34,1.34,0,0,0,.32-1.7,12.11,12.11,0,0,0-4-5.47c-.57-.43-1.92-1.57-2.75-1.32q.31-.45.66-.87a8.81,8.81,0,0,0,1.31-1.64,11.42,11.42,0,0,0,6.81-13,3.47,3.47,0,0,0-.13-.46,1.85,1.85,0,0,0,1.54-.56,2,2,0,0,0,.18-2,15.91,15.91,0,0,0-1-1.8c-.75-1.36-.57-3.12-1.34-4.39a14.66,14.66,0,0,0-2.73-3,8.75,8.75,0,0,0-7.28-1.66,15.82,15.82,0,0,0-6.85,3.44,9,9,0,0,1-1.92,1.33c-1.14.52-2.54.5-3.49,1.31-1.26,1.07-1.1,3-.62,4.6s1.19,3.23.64,4.79a10,10,0,0,0-.55,1.41,4.08,4.08,0,0,0,.67,2.59,3.2,3.2,0,0,0,.32-.57.13.13,0,0,1,0,.06c.07.26.15.52.22.78a.78.78,0,0,0-.33.07c-.47.21-.68.76-1.07,1.1s-1.36.56-1.55,1.19c-.09.3,0,.63-.11.92-.24.57-1.08.57-1.52,1a1.28,1.28,0,0,0-.25,1.3,2.71,2.71,0,0,0,.34.68,1.44,1.44,0,0,0,.09.87l-5.58,1.35a12.28,12.28,0,0,0-2.59.85,4,4,0,0,0-1.91,1.87c0,.1-.1.23-.21.27a.45.45,0,0,1-.28,0,5,5,0,0,0-2.89.14,15.63,15.63,0,0,0-7.39,5.4,2.72,2.72,0,0,0-.71,1.4c-.05.6.28,1.27,0,1.79l-.29.12a14.23,14.23,0,0,0-2.37,1c-.81.48-1.52,1.11-2.28,1.67-3.11,2.28-7.22,3.41-9.42,6.56-.72,1-1.24,2.29-2.34,2.93a15.11,15.11,0,0,0-1.5.77c-.92.71-1,1.94-1.21,3.11l-19.65,4.47.44,1.94-2,.45,18.16,79.91,16.76-3.8a4.81,4.81,0,0,0,.16,1.13,9.71,9.71,0,0,0,1.15,3.32,1.91,1.91,0,0,0-1.32,1.77c-.09.77.05,1.57-.11,2.33-.3,1.36-1.48,2.33-2.46,3.34-4.46,4.58-5.4,11.34-7.68,17.26-1.07,2.76-2.46,5.41-3.16,8.27-.8,3.25-.85,7-3.41,9.25a1.79,1.79,0,0,0-.58.68,1.09,1.09,0,0,0,0,.62,3,3,0,0,0,.95,1.52l-.12.23a.92.92,0,0,0-.3,0c-.52,0-.81.66-1,1.06a11.43,11.43,0,0,0-1.32,4.51,1.29,1.29,0,0,0-.44,0,1.87,1.87,0,0,0-1.35,1.11A3,3,0,0,0,190.53,802.15Zm65.13-165.88h0l-.2,0a8.6,8.6,0,0,1,.59-1.36A8.36,8.36,0,0,0,255.66,636.27ZM202.16,796a1.65,1.65,0,0,1-.57.87l-.05,0a2.57,2.57,0,0,1,.1-.32l.22-.63Z" transform="translate(-16.24 -72.97)" fill="url(#a35cfccf-3ee0-4563-bdbb-1343be007a46)" />
                                                <path d="M260.66,792c-3,1.11-6.2,2.1-9.4,1.81-.49,0-1.09-.24-1.14-.73a1.13,1.13,0,0,1,.11-.5,29.8,29.8,0,0,0,1.61-6,.47.47,0,0,1,.12-.28.45.45,0,0,1,.3-.07c1.46,0,2.85.66,4.31.73a5.72,5.72,0,0,0,2.17-.32c.61-.21,1.34-.92,1.91-1C260.77,787.73,260.43,789.83,260.66,792Z" transform="translate(-16.24 -72.97)" fill="#3f3d56" />
                                                <path d="M200.54,800.16c-2.37-.94-4.83-1.94-6.54-3.84a.79.79,0,0,1-.24-.4.93.93,0,0,1,.07-.46,18,18,0,0,1,3.31-5.73,13,13,0,0,1,3,1.7c.64.43,2.27,1,2.46,1.8.12.48-.31,1.14-.48,1.57-.22.59-.43,1.18-.62,1.78A22.26,22.26,0,0,0,200.54,800.16Z" transform="translate(-16.24 -72.97)" fill="#3f3d56" />
                                                <path d="M249.88,801a2.14,2.14,0,0,0,.68,1.27,1.8,1.8,0,0,0,.9.28c4.71.57,9.29-2.52,14-2,1,.11,1.92.38,2.88.47a15,15,0,0,0,3.41-.16c1.57-.2,3.14-.46,4.69-.77a11.43,11.43,0,0,0,3.41-1.09,4.36,4.36,0,0,0,2.2-2.73,2.16,2.16,0,0,0-.21-1.54,1.78,1.78,0,0,0-.4-.42,4.34,4.34,0,0,0-1.22-.6l-1.83-.67a11,11,0,0,0-2.72-.73c-.68-.07-1.38,0-2.06,0-2.41-.15-4.53-1.55-6.52-2.9l-2.7-1.83a2.27,2.27,0,0,0-.9-.43,2.19,2.19,0,0,0-.95.12,12.79,12.79,0,0,0-5.49,3.35,8.38,8.38,0,0,1-1.27,1.19,5.35,5.35,0,0,1-4.22.42c-.63-.17-.54-.37-.9-.85s-1-.69-1.39-.09a1.36,1.36,0,0,0-.18.66,16.94,16.94,0,0,0,.81,4.91,2.31,2.31,0,0,1,.08.78,4.92,4.92,0,0,1-.27.79,1.46,1.46,0,0,0-.05.2A4.87,4.87,0,0,0,249.88,801Z" transform="translate(-16.24 -72.97)" fill="#65617d" />
                                                <path d="M249.88,801a2.14,2.14,0,0,0,.68,1.27,1.8,1.8,0,0,0,.9.28c4.71.57,9.29-2.52,14-2,1,.11,1.92.38,2.88.47a15,15,0,0,0,3.41-.16c1.57-.2,3.14-.46,4.69-.77a11.43,11.43,0,0,0,3.41-1.09,4.36,4.36,0,0,0,2.2-2.73,2.16,2.16,0,0,0-.21-1.54,1.78,1.78,0,0,0-.4-.42c-.14.59-.16,1.34-.26,1.63a3.13,3.13,0,0,1-1.71,1.93,5.08,5.08,0,0,1-1.91.18c-4.17-.08-8.37.86-12.49.24a29.34,29.34,0,0,0-4.26-.61,30.31,30.31,0,0,0-4.3.62c-2.26.32-4.57.14-6.85.29A4.87,4.87,0,0,0,249.88,801Z" transform="translate(-16.24 -72.97)" fill="#3f3d56" />
                                                <path d="M190.52,802.14a8.13,8.13,0,0,0,3.38,3.73,28.23,28.23,0,0,1,4.21,2.93c1.52,1.46,2.51,3.49,4.31,4.61a8.69,8.69,0,0,0,2.17.92,14.24,14.24,0,0,0,2.67.56,18.54,18.54,0,0,0,6.92-1.18,6.27,6.27,0,0,0,2.08-.92A5.6,5.6,0,0,0,217,812a4.43,4.43,0,0,0,1.07-1.74,1.47,1.47,0,0,0-.09-1,2.47,2.47,0,0,0-.88-.85,15.52,15.52,0,0,0-2-1.11,10.14,10.14,0,0,1-2.59-1.41,6.11,6.11,0,0,1-1.26-1.71,16.57,16.57,0,0,1-1.42-3.46,11.43,11.43,0,0,0-.8-2.35c-.63-1.15-1.8-2.06-2-3.36a.91.91,0,0,0-.17-.54.77.77,0,0,0-.49-.17,8.19,8.19,0,0,0-2.37,0,2.67,2.67,0,0,0-1.9,1.29c-.23.46-.32,1-.75,1.32a1.7,1.7,0,0,1-.71.19,5.9,5.9,0,0,1-3.49-.27,4.2,4.2,0,0,1-2.05-2.68c-.08-.43,0-.92-.67-.86s-.79.66-1,1.06a11.34,11.34,0,0,0-1.29,4.51,1.3,1.3,0,0,0-.44,0,1.84,1.84,0,0,0-1.32,1.11A3.07,3.07,0,0,0,190.52,802.14Z" transform="translate(-16.24 -72.97)" fill="#65617d" />
                                                <path d="M190.52,802.14a8.13,8.13,0,0,0,3.38,3.73,28.23,28.23,0,0,1,4.21,2.93c1.52,1.46,2.51,3.49,4.31,4.61a8.69,8.69,0,0,0,2.17.92,14.24,14.24,0,0,0,2.67.56,18.54,18.54,0,0,0,6.92-1.18,6.27,6.27,0,0,0,2.08-.92A5.6,5.6,0,0,0,217,812a4.43,4.43,0,0,0,1.07-1.74,3.41,3.41,0,0,0-1.49,0c-1,.28-1.52,1.41-2.43,1.92-1.29.74-2.89.07-4.37.06-1,0-1.93.27-2.89.18a7.29,7.29,0,0,1-2.35-.77,11.17,11.17,0,0,1-2.69-1.63,14.27,14.27,0,0,1-1.87-2.29,38.38,38.38,0,0,0-3.75-4.4,3.79,3.79,0,0,0-.69-.58,8.76,8.76,0,0,0-.84-.35,5.67,5.67,0,0,1-2.34-2.65,5,5,0,0,0-.61-.93,1.84,1.84,0,0,0-1.32,1.11A3.07,3.07,0,0,0,190.52,802.14Z" transform="translate(-16.24 -72.97)" fill="#3f3d56" />
                                                <path d="M255.75,633.23a10.34,10.34,0,0,0-2.06,3.92c-.36,1.44-1.88,12.31-1.33,13.69-1.52-1-6.46-.06-8-1-.64-.4-4-2.37-4.6-2.88s-4-1.09-4.48-1.63c-1.81-2,6.59-13.07,4.75-15a.43.43,0,0,1-.08-.65,16.39,16.39,0,0,1,2.54-2.73,5,5,0,0,0,1.67-3.25,10,10,0,0,1,3.06,1.2q3.41,1.78,6.75,3.72c.87.5,2.46,1.07,3,1.94S256.32,632.54,255.75,633.23Z" transform="translate(-16.24 -72.97)" fill="#a1616a" />
                                                <path d="M238.12,633.38a30.8,30.8,0,0,1,5.27,2.62,9.17,9.17,0,0,1,3.86,3.89c.29.67.44,1.39.7,2.07,1.16,3,4.34,4.62,6.17,7.23a14.87,14.87,0,0,1,1.38,2.58,34,34,0,0,1,1.76,5.27c.43,1.75-1,3.35-1.28,5.13a29.59,29.59,0,0,0,0,5.24,62,62,0,0,1-.7,9.9c-.86,6.92-4.35,26.32-5.21,33.25-7.51-.17-27.33,0-34.47-2.29-2.39-.77,11-18.66,8.59-19.12a.86.86,0,0,1-.9-1c0-10.32,5.19-20,6.2-30.23.36-3.56,1.7-6.84,2.49-10.33.71-3.16.72-6.48,1.74-9.56a5.68,5.68,0,0,1,.85-1.75,6.85,6.85,0,0,1,1.13-1.09C236.52,634.5,237.32,634,238.12,633.38Z" transform="translate(-16.24 -72.97)" fill="#d7d9e1" />
                                                <circle cx="236.36" cy="548.15" r="11.39" fill="#a1616a" />
                                                <path d="M242.49,628.91a3.84,3.84,0,0,0-4.32.34,2.09,2.09,0,0,0-.78,2.29l-5.49,1.34a11.27,11.27,0,0,0-2.56.83,3.93,3.93,0,0,0-1.87,1.86c-.05.11-.1.23-.21.27s-.18,0-.27,0a4.91,4.91,0,0,0-2.86.13,15.21,15.21,0,0,0-7.26,5.37,2.67,2.67,0,0,0-.7,1.39c0,.67.37,1.42,0,2,1.18,5.17.5,10.4.46,15.71a6.85,6.85,0,0,1-1.12,2.77,9.92,9.92,0,0,0-1.18,3.07c-.41,2.84,1.67,5.59,1.29,8.44a13.84,13.84,0,0,1-1.22,3.42,7.82,7.82,0,0,0-.73,4.21c.1.64.33,1.26.45,1.9a11.87,11.87,0,0,1,.11,2.6c0,1.61-.13,3.22-.23,4.83-.15,2.6-.49,5.45-2.38,7.25,5.49-.3,11.26-.69,15.88-3.68a8.4,8.4,0,0,0,1.76-1.44c1.53-1.71,1.9-4.13,2.2-6.4a26.78,26.78,0,0,0,.3-7.68,8.4,8.4,0,0,1-.2-2.44c.2-1.48,1.37-2.61,2.45-3.65a15.57,15.57,0,0,0,3.09-3.78,6,6,0,0,0,.52-4.73c-.27-.76-.74-1.43-1-2.21a1.89,1.89,0,0,1,.63-2.14c3.59-2,4.39-7,4.35-11.14a31.61,31.61,0,0,0-.9-6.26l-.85-4a5.45,5.45,0,0,0,.86-4.19,4.71,4.71,0,0,1-.26-1.27,3.46,3.46,0,0,1,.58-1.54A12.44,12.44,0,0,0,242.49,628.91Z" transform="translate(-16.24 -72.97)" fill="#3f3d56" />
                                                <path d="M257.21,638.92a30.45,30.45,0,0,0,1,3.7c.21.45.5.85.74,1.28a8.27,8.27,0,0,1,.68,5.35,29.29,29.29,0,0,1-1.62,5.23,7.18,7.18,0,0,0-.49,1.8,8.64,8.64,0,0,0,.08,1.9,56.21,56.21,0,0,1,.37,7.67,14.85,14.85,0,0,1-1.25,6.5,1.8,1.8,0,0,1-.91,1,2,2,0,0,1-.95,0l-3.08-.44a1.85,1.85,0,0,1-.74-.2,1.76,1.76,0,0,1-.65-1,16.71,16.71,0,0,1-.28-7c.81-7.07,2.44-14.07,2.41-21.18,0-2-.45-4.92.59-6.73.42-.75.29-.44,1-.27a8.63,8.63,0,0,1,1.11.29A3.36,3.36,0,0,1,257.21,638.92Z" transform="translate(-16.24 -72.97)" fill="#3f3d56" />
                                                <path d="M212.23,692" transform="translate(-16.24 -72.97)" fill="#464353" />
                                                <path d="M251.47,653.28q.22,6.26.41,12.51l-11.69-.39a8,8,0,0,1,.21-3.52c.44-2.75-.18-5.56,0-8.34.17-2.12.83-4.17,1-6.29.07-1.23,0-2.47,0-3.71a26.53,26.53,0,0,1,.53-3.65,22,22,0,0,1,1.39-5c1.53.21,3.18.47,4.27,1.57a5.28,5.28,0,0,1,1.22,2.21c.76,2.44.43,5.13,1.28,7.52A22.24,22.24,0,0,1,251.47,653.28Z" transform="translate(-16.24 -72.97)" fill="#6c63ff" />
                                                <path d="M250,709.54c-.08,2.5,1.38,4.75,2.64,6.91a56.81,56.81,0,0,1,4.69,10.25,9.25,9.25,0,0,0,1.17,2.6,25.22,25.22,0,0,0,1.84,1.89c1.56,1.71,2.07,4.11,2.34,6.41.18,1.52.28,3,.31,4.57.05,1.86,0,3.83.94,5.45-.92,0-1.26,1.26-1,2.15s.77,1.78.52,2.67c-1,.63-.66,2.12-.37,3.27a26.39,26.39,0,0,1,.6,6.09q.22,12.35.14,24.7c-3.7,2.13-8,4.47-12.22,3.63a2.52,2.52,0,0,1-1.92-1.23,2.73,2.73,0,0,1-.13-1.24l.31-6.94a12.26,12.26,0,0,0-.45-5c-.45-1.17-1.27-2.35-.92-3.55.12-.41.37-.77.53-1.17.63-1.59-.29-3.32-.74-5a3.77,3.77,0,0,1-.18-1.14,6.18,6.18,0,0,1,.25-1.35,19.15,19.15,0,0,0-.05-9.8,2.34,2.34,0,0,1-.11-1.25,3.18,3.18,0,0,0,.19-.57,1.4,1.4,0,0,0-.3-.88,8.31,8.31,0,0,0,1.13-1.73,2.08,2.08,0,0,1-1.07-3.09,1.09,1.09,0,0,1-.92-1.7c.2-.22.48-.36.6-.63s-.14-.84-.43-1.16L245.85,741c-1.15-1.29-1.75-3.06-2.95-4.3a35.68,35.68,0,0,1-4.4-5.94l-5.1-8-1.71,2.33a6.8,6.8,0,0,0-1.3,2.39,8.79,8.79,0,0,0,0,2.51c.3,4.91-1.75,9.7-1.8,14.61a9,9,0,0,1-.31,3.25,6,6,0,0,0-.38,1,4.64,4.64,0,0,0,.08,1.48,6.8,6.8,0,0,1-1.72,5.43c-.88,1-2.1,1.75-2.38,3a5.13,5.13,0,0,1-.26,1.11c-.37.73-1.44,1.05-1.49,1.86,0,.46.32.92.16,1.35a1.22,1.22,0,0,1-.43.5l-2.71,2.23c-3,2.49-3.89,6.8-5.76,10.25a18.08,18.08,0,0,0-1.61,3.56c-.65,2.2-.59,4.76-2.15,6.44a5.21,5.21,0,0,0-1.11,1.29c-.41.89.05,1.91.21,2.88s-.3,2.28-1.28,2.2a6.82,6.82,0,0,1,.8,3.54,18.33,18.33,0,0,1-11.83-1.92,4.41,4.41,0,0,1-2.44-2.56,1.09,1.09,0,0,1,0-.62,1.77,1.77,0,0,1,.57-.68c2.51-2.2,2.56-6,3.33-9.23.68-2.86,2-5.51,3.08-8.26,2.24-5.92,3.14-12.67,7.52-17.23,1-1,2.12-2,2.41-3.33.16-.77,0-1.56.11-2.34a1.88,1.88,0,0,1,1.29-1.76,9.92,9.92,0,0,1-1.15-3.32,4.61,4.61,0,0,1-.16-1.52,7.73,7.73,0,0,1,.42-1.62,14.31,14.31,0,0,0,.23-8,12.62,12.62,0,0,1-.79-4.08c.06-.71.28-1.38.39-2.08a11.93,11.93,0,0,0-.22-3.67l-.74-4.58a22.26,22.26,0,0,1-.43-4.6c.15-3.72-2.27-18.61.59-21s10.93,7.66,14.61,7.06a16.58,16.58,0,0,1,4.92-.16,23.24,23.24,0,0,1,7.36,2.78l7.94,4.09A25.27,25.27,0,0,0,250,709.54Z" transform="translate(-16.24 -72.97)" fill="#65617d" />
                                                <path d="M260.23,606.41a8.6,8.6,0,0,0-7.18-1.69,15.5,15.5,0,0,0-6.74,3.42,9.09,9.09,0,0,1-1.89,1.33c-1.13.51-2.5.49-3.44,1.29-1.24,1.07-1.08,3-.59,4.6s1.17,3.24.64,4.79a12.76,12.76,0,0,0-.54,1.41,4.16,4.16,0,0,0,.67,2.6,18.74,18.74,0,0,0,1-2c.37-.65,1.13-1.22,1.83-1s.86,1,1,1.68.54,1.42,1.22,1.49a1.38,1.38,0,0,0,1.27-.87c.78-1.55-.13-3.56.63-5.12.44-.9,1.36-1.49,1.75-2.41.3-.72.23-1.54.46-2.29s1-1.45,1.73-1.12a2.65,2.65,0,0,1,.65.56,3,3,0,0,0,3.67.25,5.76,5.76,0,0,1,1.34-1,1.86,1.86,0,0,1,1.9.54,3.72,3.72,0,0,1,.89,1.86,4.58,4.58,0,0,0,1,2.61,3,3,0,0,0,1,.52,2.4,2.4,0,0,0,2.66-.33,2,2,0,0,0,.17-2,15,15,0,0,0-1-1.8c-.75-1.37-.58-3.13-1.34-4.4A14.85,14.85,0,0,0,260.23,606.41Z" transform="translate(-16.24 -72.97)" fill="#3f3d56" />
                                                <path d="M261.81,640.91a1.71,1.71,0,0,1,.12,1,1.61,1.61,0,0,1-.43.66,11.75,11.75,0,0,1-4.85,2.89,1.58,1.58,0,0,0-.68.35,1.32,1.32,0,0,0,0,1.53,3.79,3.79,0,0,1,.68,1.47c.09,1-1,1.72-1.93,2.07a5.44,5.44,0,0,1-4.15.13,6.17,6.17,0,0,1-2.19-2.09c-4.11-5.58-6.61-12.21-10.75-17.77a4.39,4.39,0,0,1-.7-1.2,1.32,1.32,0,0,1,.24-1.3c.44-.43,1.27-.43,1.5-1,.11-.28,0-.62.1-.91.19-.64,1-.76,1.53-1.19s.59-.89,1-1.09a1.61,1.61,0,0,1,1.41.26c2,1.13,3.27,3.06,4.61,4.86a69.6,69.6,0,0,0,6.79,7.76c-.28-.28.37-3.06.83-3.26.8-.37,2.22.87,2.8,1.32A12.18,12.18,0,0,1,261.81,640.91Z" transform="translate(-16.24 -72.97)" fill="#6c63ff" />
                                                <rect x="184.35" y="657.31" width="82" height="82" transform="translate(583.6 1256.35) rotate(167.2)" opacity="0.1" />
                                                <rect x="185.86" y="654.91" width="82" height="82" transform="translate(586.04 1251.29) rotate(167.2)" fill="#ededf4" />
                                                <path d="M250.18,688.83a22.58,22.58,0,0,0-27-17c-.57.13-1.16.29-1.68.45l5.38,23.64,23.64-5.37C250.42,690,250.31,689.4,250.18,688.83Z" transform="translate(-16.24 -72.97)" fill="#6c63ff" />
                                                <path d="M247.89,694.7l-23.65,5.37-5.37-23.64a22.57,22.57,0,1,0,29,18.27Z" transform="translate(-16.24 -72.97)" fill="#6c63ff" />
                                                <path d="M211.84,692.49a22.77,22.77,0,0,1,3.14,2.08,5.5,5.5,0,0,1,1.94,3.15,1.81,1.81,0,0,1-.1,1.08.88.88,0,0,1-.89.5,1.41,1.41,0,0,1-.56-.31c-.63-.48-1.29-.93-2-1.35-.25-.15-.56-.31-.81-.17a.78.78,0,0,0-.28.29,2.29,2.29,0,0,0-.43,1.18,2.51,2.51,0,0,0,1.19,1.83,5.23,5.23,0,0,1,1.63,1.54.78.78,0,0,1,.11.59.85.85,0,0,1-.29.39,5.4,5.4,0,0,1-4.37,1.3c-1-.16-2-.63-3.06-.75a6.35,6.35,0,0,1-1.31-.17,2.56,2.56,0,0,1-1.44-1.36,6.75,6.75,0,0,1-.52-2,23.25,23.25,0,0,1-.06-7.85,1.08,1.08,0,0,1,.18-.46.94.94,0,0,1,.43-.23c1.17-.4,3-1.46,4.27-1.28a3.25,3.25,0,0,1,1.23.68C210.17,691.4,211.77,692.18,211.84,692.49Z" transform="translate(-16.24 -72.97)" fill="#a1616a" />
                                                <path d="M212,691.34c-.24-1.15.54-4.24-1.76-3.91-.27-1.23,1.28-2.38.67-3.61-.2-.4-.64-.68-.79-1.11-.43-1.22,1.68-2.41,1-3.53-.25-.43-.81-.6-1-1-.5-1,1.33-1.95,1.12-3.08-.08-.37-.38-.68-.45-1.06a3.14,3.14,0,0,1,.36-1.37c.35-1.18-.31-2.74.64-3.53-.7.23-1.18-.77-1-1.48s.62-1.41.46-2.12a3.17,3.17,0,0,1-.19-.78c0-.73,1.15-1,1.18-1.77a5.12,5.12,0,0,0-.15-.78,1.5,1.5,0,0,1,.9-1.28,4.51,4.51,0,0,0,1.39-.88c.27-.32.56-.83,1-.69.15,0,.25.19.38.28.53.39,1.29,0,1.74-.49a7.4,7.4,0,0,0,1.58-5.45c-.08-1.95-.53-3.87-.54-5.81a13.64,13.64,0,0,1,.12-1.81,8.66,8.66,0,0,0,.41-1.86c-.16-1.1-2.23.15-3.05.45a13.12,13.12,0,0,0-2.34,1,25.4,25.4,0,0,0-2.24,1.66c-3.06,2.27-7.11,3.39-9.26,6.52-.71,1-1.22,2.29-2.3,2.93a14.78,14.78,0,0,0-1.48.77c-1.16.9-1,2.66-1.39,4.06a8.12,8.12,0,0,0-.35,1.16,4.45,4.45,0,0,0,.11,1.36l.65,3.28a124,124,0,0,0,4,16.29,14,14,0,0,1,1.16,5.37c0,.49-.13,1-.14,1.48a8.35,8.35,0,0,0,.21,1.73l.4,2.13a.65.65,0,0,0,.22.46.7.7,0,0,0,.6,0c2.87-.93,5.46-3.26,8.46-2.89" transform="translate(-16.24 -72.97)" fill="#3f3d56" />
                                                <path d="M264.71,670.32a.91.91,0,0,1,.39.2,2.39,2.39,0,0,1,.67,2.78.87.87,0,0,0-.1.31.76.76,0,0,0,.19.44,1.6,1.6,0,0,1,.17,1.79c-.16.22-.43.37-.52.64-.15.45.31.88.36,1.35.06.63-.59,1.09-1.18,1.31a1.54,1.54,0,0,1-1.42,0,1.16,1.16,0,0,1-.28-1.22,3.42,3.42,0,0,1,.7-1.11,1.42,1.42,0,0,1-1.59-.93,2,2,0,0,1,.39-1.88.73.73,0,0,0,.23-.44c0-.22-.22-.37-.41-.49-.81-.53-1.75-2.09-.54-2.75a3.3,3.3,0,0,1,1.35-.25c.36,0,.4.23.69.31S264.4,670.27,264.71,670.32Z" transform="translate(-16.24 -72.97)" fill="#a1616a" />
                                                <path d="M240.47,626a2.3,2.3,0,0,1,1.94.47,5.2,5.2,0,0,1,1.26,2.17,20.8,20.8,0,0,0,4.47,6.82" transform="translate(-16.24 -72.97)" opacity="0.1" />
                                                <path d="M238.5,628.44a2.74,2.74,0,0,1,2.59.85,7.9,7.9,0,0,1,1.1,2.19,13.06,13.06,0,0,0,3.39,4.36" transform="translate(-16.24 -72.97)" opacity="0.1" />
                                            </svg>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endAuthority
@endsection

@section('page-styles')
    @include('pages.ik.employee.show.personal.components.style')
@stop

@section('page-script')
    @include('pages.ik.employee.show.personal.components.script')
@stop
