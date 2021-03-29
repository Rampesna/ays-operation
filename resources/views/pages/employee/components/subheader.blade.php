<div class="subheader subheader-solid" id="kt_subheader">
    <div class="container-fluid align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <ul class="nav nav-tabs nav-tabs-line mb-n4" style="height: auto">

            <li class="nav-item">
                <a class="nav-link @if($tab == 'general') active @endif" @if($tab != 'general') href="{{ route('employee.show', ['employee' => $employee, 'tab' => 'general']) }}" @endif>
                    <span class="nav-icon"><i class="fas fa-th"></i></span>
                    <span class="nav-text">Genel Bilgiler</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link @if($tab == 'personal') active @endif" @if($tab != 'personal') href="{{ route('employee.show', ['employee' => $employee, 'tab' => 'personal']) }}" @endif>
                    <span class="nav-icon"><i class="fas fa-th"></i></span>
                    <span class="nav-text">Kişisel Bilgiler</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link @if($tab == 'career') active @endif" @if($tab != 'career') href="{{ route('employee.show', ['employee' => $employee, 'tab' => 'career']) }}" @endif>
                    <span class="nav-icon"><i class="fas fa-th"></i></span>
                    <span class="nav-text">Kariyer</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link @if($tab == 'permits') active @endif" @if($tab != 'permits') href="{{ route('employee.show', ['employee' => $employee, 'tab' => 'permits']) }}" @endif>
                    <span class="nav-icon"><i class="fas fa-th"></i></span>
                    <span class="nav-text">İzinler</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link @if($tab == 'overtimes') active @endif" @if($tab != 'overtimes') href="{{ route('employee.show', ['employee' => $employee, 'tab' => 'overtimes']) }}" @endif>
                    <span class="nav-icon"><i class="fas fa-th"></i></span>
                    <span class="nav-text">Fazla Mesailer</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link @if($tab == 'payments') active @endif" @if($tab != 'payments') href="{{ route('employee.show', ['employee' => $employee, 'tab' => 'payments']) }}" @endif>
                    <span class="nav-icon"><i class="fas fa-th"></i></span>
                    <span class="nav-text">Ödemeler</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link @if($tab == 'payrolls') active @endif" @if($tab != 'payrolls') href="{{ route('employee.show', ['employee' => $employee, 'tab' => 'payrolls']) }}" @endif>
                    <span class="nav-icon"><i class="fas fa-th"></i></span>
                    <span class="nav-text">Bordrolar</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link @if($tab == 'devices') active @endif" @if($tab != 'devices') href="{{ route('employee.show', ['employee' => $employee, 'tab' => 'devices']) }}" @endif>
                    <span class="nav-icon"><i class="fas fa-th"></i></span>
                    <span class="nav-text">Zimmetler</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link @if($tab == 'files') active @endif" @if($tab != 'files') href="{{ route('employee.show', ['employee' => $employee, 'tab' => 'files']) }}" @endif>
                    <span class="nav-icon"><i class="fas fa-th"></i></span>
                    <span class="nav-text">Dosyalar</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link @if($tab == 'shifts') active @endif" @if($tab != 'shifts') href="{{ route('employee.show', ['employee' => $employee, 'tab' => 'shifts']) }}" @endif>
                    <span class="nav-icon"><i class="fas fa-th"></i></span>
                    <span class="nav-text">Vardiya</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link @if($tab == 'punishments') active @endif" @if($tab != 'punishments') href="{{ route('employee.show', ['employee' => $employee, 'tab' => 'punishments']) }}" @endif>
                    <span class="nav-icon"><i class="fas fa-th"></i></span>
                    <span class="nav-text">Cezalar</span>
                </a>
            </li>

        </ul>
    </div>
</div>
