<html>
<head>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ÇALIŞMA BELGESİ</title>
    <link rel="stylesheet" href="assets/others/assets/vendor/bootstrap/css/bootstrap.min.css">
    <meta http-equiv="Content-Type" content="text/html; charset=windows-1254"/>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta charset="utf-8">
    <style>
        body {
            font-family: "dejavu sans", serif;
            font-size: 12px;
        }
    </style>

</head>
<body>
<div class="row">
    <div class="col-xl-12 text-right">
        <div class="card">
            <div class="card-body">
                <a style="font-size: 12px; font-weight: bolder;margin-top: -10px; color: black">{{ $date }}</a>
            </div>
        </div>
    </div>
</div>
<div class="row" style="margin-top: -15px">
    <div class="col-xl-12 text-center">
        <div class="card">
            <div class="card-body">
                <a style="font-size: 12px; font-weight: bolder;margin-top: -10px; color: black">ÇALIŞMA BELGESİ</a>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xl-12">
        <div class="form-group">
            <p style="font-size: 9px">
                {{ @$position->company->name }}, bilgisayar programlama faaliyetleri, satışı ve pazarlamasında faaliyet
                göstermektedir.
            </p>
            <p style="font-size: 9px">
                Aşağıda açık kimliği yazılı bulunan şirketimiz çalışanı, Koronavirüs (Covid-19) salgını nedeniyle
                yayınlanan genelge kapsamında {{ $date }} tarihleri arasında, İçişleri Bakanlığı’nın E-89780865-153-20076
                sayılı genelgesi 1. maddesi 1.1. bendi Ek-34 maddesinde yer alan “Yaklaşan yılsonu işlemleri nedeniyle
                Serbest Muhasebeci, Mali Müşavir, Yeminli Mali Müşavirler ve bu meslek mensuplarıyla birlikte
                çalışanlar.” maddesine istinaden hizmetin aksamaması, yürütülen tedarik işlemlerinin bozulmaması
                amacıyla çalışacağını belgelemek amacıyla düzenlenmiştir.
            </p>
            <p style="font-size: 9px">
                İşbu belge, 30.11.2020 tarih – E-89780865-153-20076 sayılı Ek Genelge kapsamında çalışanımızın Ülkemiz
                için önemli olan tedarik zincirinin devamını sağlamak amacıyla düzenlenmiştir.
            </p>
        </div>
    </div>
</div>
<div class="row" style="clear: both">
    <div class="col-lg-12">

        <table class="table table-bordered">
            <tbody style="font-size: 9px">
            <tr>
                <td style="width: 30%">Adı Soyadı</td>
                <td style="width: 70%">{{ @ucwords($position->employee->name) }}</td>
            </tr>
            <tr>
                <td style="width: 30%">Doğum Tarihi</td>
                <td style="width: 70%">{{ $position->employee->personalInformations->birth_date ? date('d/m/Y', strtotime($position->employee->personalInformations->birth_date)) : '' }}</td>
            </tr>
            <tr>
                <td style="width: 30%">T.C. Kimlik No</td>
                <td style="width: 70%">{{ @$position->employee->personalInformations->identification_number }}</td>
            </tr>
            <tr>
                <td style="width: 30%">İşe Giriş Tarihi</td>
                <td style="width: 70%">{{ $position->start_date ? date('d/m/Y', strtotime($position->start_date)) : '' }}</td>
            </tr>
            <tr>
                <td style="width: 30%">İş Adı</td>
                <td style="width: 70%">Bilgisayar Programlama Faaliyetleri, Satışı ve Pazarlama</td>
            </tr>
            <tr>
                <td style="width: 30%">İşyeri Adresi</td>
                <td style="width: 70%">Bulgurlu Mah. Kanyon Cad. Malatya Teknokent Sit. A Blok No:89/1/206 Battalgazi -
                    MALATYA
                </td>
            </tr>
            <tr>
                <td style="width: 30%">İşyeri SGK Sicil No</td>
                <td style="width: 70%">{{ $position->company->record_number }}</td>
            </tr>
            <tr>
                <td style="width: 30%">Mesai Tarihi</td>
                <td style="width: 70%">{{ $date }}</td>
            </tr>
            <tr>
                <td style="width: 30%">İş Başlangıç Saati</td>
                <td style="width: 70%">{{ $startHour }}</td>
            </tr>
            <tr>
                <td style="width: 30%">İş Bitiş Saati</td>
                <td style="width: 70%">{{ $endHour }}</td>
            </tr>
            </tbody>
        </table>

    </div>
</div>
<div class="row">
    <div class="col-xl-12">
        <div class="form-group">
            <p style="font-size: 9px">
                Saygılarımızla,
                <br><br>
                {{ @$position->company->name }}
            </p>
        </div>
    </div>
</div>

</body>
</html>
