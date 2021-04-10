<div class="subheader subheader-solid" id="kt_subheader">
    <div class="container-fluid align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <ul class="nav nav-tabs nav-tabs-line mb-n4" style="height: auto">

            <li class="nav-item">
                <a class="nav-link cursor-pointer @if($tab == 'general') active @endif">
                    <span class="nav-icon"><i class="fas fa-th"></i></span>
                    <span class="nav-text">Genel Ayarlar</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link cursor-pointer @if($tab == 'permit') active @endif" @if($tab != 'permit') href="{{ route('ik.setting.show', ['tab' => 'permit']) }}" @endif>
                    <span class="nav-icon"><i class="fas fa-th"></i></span>
                    <span class="nav-text">İzin Ayarları</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link cursor-pointer @if($tab == 'overtime') active @endif" @if($tab != 'overtime') href="{{ route('ik.setting.show', ['tab' => 'overtime']) }}" @endif>
                    <span class="nav-icon"><i class="fas fa-th"></i></span>
                    <span class="nav-text">Fazla Mesai Ayarları</span>
                </a>
            </li>

        </ul>
    </div>
</div>
