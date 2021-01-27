<div class="d-flex flex-column flex-row-fluid" id="kt_wrapper">
    <div class="content d-flex flex-column flex-column-fluid mt-20" id="kt_content">

        <div class="container-fluid" style="margin-top: -50px">

            @yield('content')

        </div>

    </div>
    <!--end::Content-->
    <!--begin::Footer-->
@include('layouts.footer')
<!--end::Footer-->
    {{--    @include('layouts.rightbar')--}}
</div>
