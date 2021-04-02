<html>
<head>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ ucwords($employee->name) }} - Zimmet Formu</title>
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
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body text-center">
                <label style="font-size: 12px; font-weight: bolder;margin-top: -10px">{{ ucwords($employee->name) }} - Zimmet Formu</label>
            </div>
        </div>
    </div>
</div>
<div class="row" style="clear: both">
    <div class="col-lg-12">

        <table class="table table-bordered">
            <thead style="font-size: 10px">
            <tr>
                <th scope="col">Kategori</th>
                <th scope="col">Eşya</th>
                <th scope="col">Seri Numarası</th>
                <th scope="col">Veriliş Tarihi</th>
                <th scope="col">İade Tarihi</th>
                <th scope="col">Açıklama</th>
            </tr>
            </thead>
            <tbody style="font-size: 9px">

            @foreach($employeeDevices as $employeeDevice)
                <tr>
                    <td>{{ $employeeDevice->category->name }}</td>
                    <td>{{ $employeeDevice->name }}</td>
                    <td>{{ $employeeDevice->serial_number }}</td>
                    <td>{{ date('d.m.Y', strtotime($employeeDevice->start_date)) }}</td>
                    <td>{{ $employeeDevice->end_date ? date('d.m.Y', strtotime($employeeDevice->end_date)) : '' }}</td>
                    <td>{{ $employeeDevice->description }}</td>
                </tr>
            @endforeach

            </tbody>
        </table>

    </div>
</div>
<div class="row">
    <div class="col-xl-12">
        <div class="form-group">
            <p style="font-size: 9px">
                Şirketimin işlerini yürütebilmek için yukarıda seri numarası ve özellikleri yazılı bilgisayarı çalışır
                vaziyette teslim aldım/kullanmaktayım. Tarafıma tahsis edilen bilgisayarı şirketin belirlediği
                /belirleyeceği bilgi güvenliği politikalarına uygun bir biçimde kullanacağımı kabul ve taahhüt ederim.
            </p>
            <p style="font-size: 9px">
                Tarafıma tahsis edilmiş olan bilgisayar ve diğer bilgi sistemleri kaynaklarını (e-mail sistemleri,
                uygulama sistemleri, veri depolama sistemleri, vb) çalıştığım şirkete zarar vermek amacıyla
                kullanmayacağımı kabul ve taahhüt ederim. Bu noktadan hareketle tarafıma tahsis edilen sistemlere kötü
                amaçlı kodlar yerleştirmeyeceğimi ve bu kodların sistemler üzerinde yayılmasını sağlamak üzere
                çalışmayacağımı, kendi geliştirdiğim kodlar içinde tarafıma çıkar sağlayacak herhangi bir kod parçacığı
                bulunmayacağını, bu sistemleri kullanarak oluşturduğum ve yazdığım bütün kodların ve bilgilerin
                dökümanlarında belirtildiği gibi olacağını kabul ve taahhüt ederim.
            </p>
            <p style="font-size: 9px">
                Tarafıma tahsis edilmiş olan bu bilgisayar ve diğer bilgi sistemleri kaynaklarını Türkiye Cumhuriyeti
                yasalarınca suç kabul edilen işlem, eylem ve uygulamalar için kullanmayacağımı, tahsis edilen sistemin
                ve kullanılmakta olan bilgi işlem altyapısının mülkiyetinin çalıştığım şirkete ait olması nedeniyle
                gerçekleştireceğim yasadışı işlemlerin kurumsal sorumluluk da doğuracağını bildiğim için şirket
                kaynaklarını kullandığım sürece her türlü işlem, bilgi akışı, iletişim ve bilgimin şirket tarafından
                denetim amacıyla izlenmesine, kayıt altına alınmasına ve anlaşmazlık durumunda delil kabul edilmesine
                izin verdiğimi beyan, kabul ve taahhüt ederim.
            </p>
            <p style="font-size: 9px">
                Tarafıma tahsis edilmiş olan bilgisayarı tümüyle veya kısmen, üstüm ve astım da dahil olmak üzere, bilgi
                işlem biriminden izinsiz hiçbir iş arkadaşımla değiştirmeyeceğimi, hiçbir iş arkadaşıma
                devretmeyeceğimi; disk ve bellek gibi iç aksamı yerinden çıkarmayacağımı ve değiştirmeyeceğimi; yeni bir
                parça eklemeyeceğimi; bilgi işlem biriminden izinsiz hiçbir yazılım kurmayacağımı; çalıştığım birim
                değiştiğinde veya yerimde fiziki bir değişiklik olduğunda bilgi işlem birimini haberdar edeceğimi;
                bilgisayarımı ayda en az bir kere kurum bilgisayar ağına bağlayarak kullanacağımı; burada yazılı
                şartlara uymadığım takdirde oluşabilecek her türlü zarardan sorumlu olacağımı ve meydana gelen zararı
                tazmin etmeyi kabul ve taahhüt ederim.
            </p>
        </div>
    </div>
</div>
<div class="row" style="clear: both">
    <div class="col-lg-12">

        <table class="table table-bordered" style="font-size: 10px">
            <tbody>

            <tr>
                <td colspan="2" style="width: 50%">Kabul (El yazısı ile 'Okudum ve Anladım')</td>
                <td colspan="2" style="width: 50%"></td>
            </tr>
            <tr>
                <td colspan="2" style="width: 50%">Teslim Eden</td>
                <td colspan="2" style="width: 50%">Teslim Alan</td>
            </tr>
            <tr>
                <td style="width: 15%">Ad Soyad</td>
                <td style="width: 35%"></td>
                <td style="width: 15%">Ad Soyad</td>
                <td style="width: 35%"></td>
            </tr>
            <tr>
                <td style="width: 15%">Ünvanı</td>
                <td style="width: 35%"></td>
                <td style="width: 15%">Ünvanı</td>
                <td style="width: 35%"></td>
            </tr>
            <tr>
                <td style="width: 15%">Tarih - İmza</td>
                <td style="width: 35%"></td>
                <td style="width: 15%">Tarih - İmza</td>
                <td style="width: 35%"></td>
            </tr>


            </tbody>
        </table>

    </div>
</div>
</body>
</html>
