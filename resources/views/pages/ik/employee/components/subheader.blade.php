<div class="subheader subheader-solid" id="kt_subheader">
    <div class="container-fluid align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <ul class="nav nav-tabs nav-tabs-line mb-n4" style="height: auto">

            <li class="nav-item">
                <a class="nav-link @if($tab == 'general') active @endif" @if($tab != 'general') href="{{ route('ik.employee.show', ['id' => $employee->id, 'tab' => 'general']) }}" @endif>
                    <span class="nav-icon"><i class="fas fa-th"></i></span>
                    <span class="nav-text">Genel Bilgiler</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link @if($tab == 'personal') active @endif" @if($tab != 'personal') href="{{ route('ik.employee.show', ['id' => $employee->id, 'tab' => 'personal']) }}" @endif>
                    <span class="nav-icon"><i class="far fa-address-card"></i></span>
                    <span class="nav-text">Kişisel Bilgiler</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link @if($tab == 'career') active @endif" @if($tab != 'career') href="{{ route('ik.employee.show', ['id' => $employee->id, 'tab' => 'career']) }}" @endif>
                    <span class="nav-icon"><i class="fas fa-list-ul"></i></span>
                    <span class="nav-text">Kariyer</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link @if($tab == 'permit') active @endif" @if($tab != 'permit') href="{{ route('ik.employee.show', ['id' => $employee->id, 'tab' => 'permit']) }}" @endif>
                    <span class="nav-icon"><i class="fas fa-paper-plane"></i></span>
                    <span class="nav-text">İzinler</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link @if($tab == 'overtime') active @endif" @if($tab != 'overtime') href="{{ route('ik.employee.show', ['id' => $employee->id, 'tab' => 'overtime']) }}" @endif>
                    <span class="nav-icon"><i class="fas fa-clock"></i></span>
                    <span class="nav-text">Fazla Mesailer</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link @if($tab == 'payment') active @endif" @if($tab != 'payment') href="{{ route('ik.employee.show', ['id' => $employee->id, 'tab' => 'payment']) }}" @endif>
                    <span class="nav-icon"><i class="fas fa-money-bill-wave-alt"></i></span>
                    <span class="nav-text">Ödemeler</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link @if($tab == 'payroll') active @endif" @if($tab != 'payroll') href="{{ route('ik.employee.show', ['id' => $employee->id, 'tab' => 'payroll']) }}" @endif>
                    <span class="nav-icon"><i class="far fa-credit-card"></i></span>
                    <span class="nav-text">Bordrolar</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link @if($tab == 'device') active @endif" @if($tab != 'device') href="{{ route('ik.employee.show', ['id' => $employee->id, 'tab' => 'device']) }}" @endif>
                    <span class="nav-icon"><i class="fas fa-tv"></i></span>
                    <span class="nav-text">Zimmetler</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link @if($tab == 'file') active @endif" @if($tab != 'file') href="{{ route('ik.employee.show', ['id' => $employee->id, 'tab' => 'file']) }}" @endif>
                    <span class="nav-icon"><i class="far fa-folder-open"></i></span>
                    <span class="nav-text">Dosyalar</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link @if($tab == 'shift') active @endif" @if($tab != 'shift') href="{{ route('ik.employee.show', ['id' => $employee->id, 'tab' => 'shift']) }}" @endif>
                    <span class="nav-icon"><i class="fas fa-user-clock"></i></span>
                    <span class="nav-text">Vardiya</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link @if($tab == 'punishment') active @endif" @if($tab != 'punishment') href="{{ route('ik.employee.show', ['id' => $employee->id, 'tab' => 'punishment']) }}" @endif>
                    <span class="nav-icon"><i class="fas fa-user-shield"></i></span>
                    <span class="nav-text">Cezalar</span>
                </a>
            </li>

        </ul>
    </div>
</div>
