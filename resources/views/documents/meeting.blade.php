<html>
<head>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ ucwords($meeting->name) }} - Toplantı Detayları</title>
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
    <div class="col-xl-12 text-center">
        <label style="font-size: 12px; font-weight: bolder;">Toplantı Detayları</label>
    </div>
</div>
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-xl-12">
                        <strong>Toplantı Tarihi: </strong> {{ date('d.m.Y, H:i', strtotime($meeting->start_date)) }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <strong>Toplantı Konusu: </strong> {{ $meeting->name }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <strong>Toplantı Türü: </strong> {{ $meeting->type == 1 ? 'Online' : 'Yüzyüze' }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <strong>Toplantı Adresi: </strong> {{ $meeting->link }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <strong>Katılımcılar: </strong> {{ implode(',', $meeting->users()->pluck('name')->toArray()) }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12" style="margin-top: 10px">
                        <strong>Açıklamalar: </strong>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <p>{!! $meeting->description !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<hr style="margin-top: -20px;">
<div class="row" style="margin-top: -15px;">
    <div class="col-xl-12 text-center">
        <label style="font-size: 12px; font-weight: bolder;">Gündemler</label>
    </div>
</div>
@foreach($meeting->agendas ?? [] as $agenda)
<div class="row" style="clear: both">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-xl-12">
                        <strong>Gündem Başlığı: </strong> {{ $agenda->subject }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <strong>Katılımcılar: </strong> {{ implode(',', $agenda->users()->pluck('name')->toArray()) }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12" style="margin-top: 10px">
                        <strong>Tartışmalar: </strong>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <p>{!! $agenda->discussions !!}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <strong>Sonuç: </strong> {{ $agenda->result }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<hr style="margin-top: -20px; margin-bottom: -20px">
@endforeach
</body>
</html>
