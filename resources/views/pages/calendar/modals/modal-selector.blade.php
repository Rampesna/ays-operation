<div class="modal fade" id="ModalSelector" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-hidden="true">
    <div id="create_device_form" class="modal-dialog" role="document" style="max-width:900px;">
        <div class="modal-content" style="margin-top: 25%; background: transparent; border: none; box-shadow: none">
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
{{--                        <div class="col-xl-6">--}}
{{--                            <a href="#" id="CreateMeeting" data-toggle="modal" data-target="#CreateMeetingModal" class="card card-custom card-stretch gutter-b" data-dismiss="modal">--}}
{{--                                <div class="card-body">--}}
{{--                                    <span class="svg-icon svg-icon-primary svg-icon-3x ml-n1">--}}
{{--                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">--}}
{{--                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">--}}
{{--                                                <polygon points="0 0 24 0 24 24 0 24"/>--}}
{{--                                                <path d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>--}}
{{--                                                <path d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero"/>--}}
{{--                                            </g>--}}
{{--                                        </svg>--}}
{{--                                    </span>--}}
{{--                                    <div class="text-inverse-white font-weight-bolder font-size-h5 mb-2 mt-5">Toplantı Oluştur</div>--}}
{{--                                </div>--}}
{{--                            </a>--}}
{{--                        </div>--}}
                        @Authority(77)
                        <div class="col-xl-4">
                            <a href="#" id="CreateMeeting" data-toggle="modal" data-target="#CreateNoteModal" class="card card-custom card-stretch gutter-b" data-dismiss="modal">
                                <div class="card-body">
                                    <span class="svg-icon svg-icon-warning svg-icon-3x ml-n1">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <polygon points="0 0 24 0 24 24 0 24"/>
                                                <path d="M5.85714286,2 L13.7364114,2 C14.0910962,2 14.4343066,2.12568431 14.7051108,2.35473959 L19.4686994,6.3839416 C19.8056532,6.66894833 20,7.08787823 20,7.52920201 L20,20.0833333 C20,21.8738751 19.9795521,22 18.1428571,22 L5.85714286,22 C4.02044787,22 4,21.8738751 4,20.0833333 L4,3.91666667 C4,2.12612489 4.02044787,2 5.85714286,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                                <rect fill="#000000" x="6" y="11" width="9" height="2" rx="1"/>
                                                <rect fill="#000000" x="6" y="15" width="5" height="2" rx="1"/>
                                            </g>
                                        </svg>
                                    </span>
                                    <div class="text-inverse-white font-weight-bolder font-size-h5 mb-2 mt-5">Not Ekle</div>
                                </div>
                            </a>
                        </div>
                        @endAuthority

                        @Authority(78)
                        <div class="col-xl-4">
                            <a href="#" id="CreateMeeting" data-toggle="modal" data-target="#CreateInformationModal" class="card card-custom card-stretch gutter-b" data-dismiss="modal">
                                <div class="card-body">
                                    <span class="svg-icon svg-icon-danger svg-icon-3x ml-n1">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"/>
                                                <path d="M13.2070325,4 C13.0721672,4.47683179 13,4.97998812 13,5.5 C13,8.53756612 15.4624339,11 18.5,11 C19.0200119,11 19.5231682,10.9278328 20,10.7929675 L20,17 C20,18.6568542 18.6568542,20 17,20 L7,20 C5.34314575,20 4,18.6568542 4,17 L4,7 C4,5.34314575 5.34314575,4 7,4 L13.2070325,4 Z" fill="#000000"/>
                                                <circle fill="#000000" opacity="0.3" cx="18.5" cy="5.5" r="2.5"/>
                                            </g>
                                        </svg>
                                    </span>
                                    <div class="text-inverse-white font-weight-bolder font-size-h5 mb-2 mt-5">Bilgilendirme Oluştur</div>
                                </div>
                            </a>
                        </div>
                        @endAuthority

                        @Authority(79)
                        <div class="col-xl-4">
                            <a href="#" id="CreateMeeting" data-toggle="modal" data-target="#CreateReminderModal" class="card card-custom card-stretch gutter-b" data-dismiss="modal">
                                <div class="card-body">
                                    <span class="svg-icon svg-icon-dark-75 svg-icon-3x ml-n1">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <path d="M17,12 L18.5,12 C19.3284271,12 20,12.6715729 20,13.5 C20,14.3284271 19.3284271,15 18.5,15 L5.5,15 C4.67157288,15 4,14.3284271 4,13.5 C4,12.6715729 4.67157288,12 5.5,12 L7,12 L7.5582739,6.97553494 C7.80974924,4.71225688 9.72279394,3 12,3 C14.2772061,3 16.1902508,4.71225688 16.4417261,6.97553494 L17,12 Z" fill="#000000"/>
                                                <rect fill="#000000" opacity="0.3" x="10" y="16" width="4" height="4" rx="2"/>
                                            </g>
                                        </svg>
                                    </span>
                                    <div class="text-inverse-white font-weight-bolder font-size-h5 mb-2 mt-5">Hatırlatıcı Oluştur</div>
                                </div>
                            </a>
                        </div>
                        @endAuthority
                    </div>
                </div>
                <div class="text-center">
                    <a href="#" class="text-center">
                        <i class="fas fa-times-circle fa-3x text-secondary" data-dismiss="modal"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
