<div class="subheader subheader-solid" id="kt_subheader">
    <div class="container-fluid align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <form class="row">
            <div class="col-xl-3">
                <div class="form-group">
                    <label for="header_company_id"></label>
                    <select name="company_id" id="header_company_id" class="form-control selectpicker">
                        @foreach($companies as $company)
                            <option @if($company->id == $companyId) selected @endif value="{{ $company->id }}">{{ $company->title }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xl-3">
                <div class="form-group">
                    <label for="keyword"></label>
                    <input type="text" name="keyword" id="keyword" class="form-control" value="{{ $keyword ?? '' }}" placeholder="Proje Adı">
                </div>
            </div>
            <div class="col-xl-2 mt-7">
                <div class="form-group">
                    <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-search"></i></button>
                </div>
            </div>
            <div class="col-xl-2"></div>
            @Authority(56)
            <div class="col-xl-2 mt-7 text-right">
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#CreateProject">Yeni Proje Oluştur</button>
            </div>
            @endAuthority
        </form>
    </div>
</div>
