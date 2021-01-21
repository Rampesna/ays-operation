<html lang="tr"><head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="cache-control" content="no-cache">
    <meta name="description" content="NetSantral Yönetim Arayüzü">
    <meta name="author" content="NetGSM">
    <title>Netgsm</title>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="/css/animate.css" rel="stylesheet">

    <link href="/css/plugins/datapicker/datepicker3.css" rel="stylesheet">
    <link href="/css/plugins/clockpicker/clockpicker.css" rel="stylesheet">
    <link href="/css/plugins/chosen/bootstrap-chosen.css" rel="stylesheet">
    <link href="/css/plugins/dataTables/datatables.min.css" rel="stylesheet">
    <link href="/css/plugins/sweetalert/sweetalert.css" rel="stylesheet">
    <link href="/css/plugins/toastr/toastr.min.css" rel="stylesheet">

    <link href="/css/style.css" rel="stylesheet">
    <link href="/css/responsive.css" rel="stylesheet">
    <style>
        img.map, map area{
            outline: none;
        }
    </style>
    <link rel="stylesheet" href="/css/plugins/toggle.css">
    <style>
        .boxes {
            width: 85px;
            height: 64px;
            display: inline-flex;
            margin-left: 16px;
            margin-top: 10px;
            cursor: pointer;
            text-align: center;
        }

        .boxed {
            width: 85px;
            height: 64px;
            display: inline-flex;
            margin-left: 16px;
            margin-top: 10px;
            text-align: center;
        }

        .green-box{
            border: 1px solid #2ECC71;
        }
        .red-box{
            border: 1px solid #E74C3C;
        }


        .check{
            margin-right: 2px;
            margin-top: 35px;
        }
        .check-back {
            border-color: transparent transparent #48ef7b transparent;
            border-width: 0px 0px 35px 29px;
            border-style: solid;
            margin-left: 54px;
            margin-top: 27px;
            color: white;
            position: absolute;
        }
        .checking {
            position: absolute;
            margin-top: 19px;
            margin-left: -15px;
        }
        .boxes:hover .check-back{
            border-color: transparent transparent #1E884B transparent;
            color: white;
        }

        .scrollbar
        {
            background-color: rgba(243, 243, 244, 0.6);
            overflow-y: scroll;
            height: 135px;
        }

        #scroll1::-webkit-scrollbar-track
        {
            -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0);
            background-color: white;
            opacity: 0.2;
        }

        #scroll1::-webkit-scrollbar
        {
            opacity: 0.2;
            width: 5px;
            background-color: white;
        }

        #scroll1:hover::-webkit-scrollbar-thumb
        {
            background:rgba(0,0,0,0.3) !important;
            background-color: #293846;

        }

        .scrollbarx
        {
            background-color: rgba(243, 243, 244, 0.6);
            overflow-x: scroll;
            /* height: 135px;*/
        }

        .scrollbarx::-webkit-scrollbar-track
        {
            -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0);
            background-color: #F5F6F6;
            opacity: 0.2;
        }


        .scrollbarx::-webkit-scrollbar
        {
            opacity: 0.2;
            height: 2px;
            background-color: #F5F6F6;
        }


        .scrollbarx:hover::-webkit-scrollbar-thumb
        {
            background:rgba(0,0,0,0.6) !important;
            background-color: #293846;

        }

    </style>
    <script src="/js/jquery-3.1.1.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <!-- İç sayfada kullanılan scriptler -->
    <script src="/js/plugins/dataTables/datatables.min.js"></script> 				<!-- Data tablo -->
    <script src="/js/plugins/chosen/chosen.jquery.js"></script> 						<!-- Selectbox arama -->
    <script src="/js/inspinia.js"></script> 											<!-- Genel -->
    <script src="/js/plugins/iCheck/icheck.min.js"></script>							<!-- Checkbox -->
    <script src="/js/plugins/typehead/bootstrap3-typeahead.min.js"></script>			<!-- Arama tamamlama -->
    <script src="/js/plugins/datapicker/bootstrap-datepicker.js"></script>			<!-- Takvim -->
    <script src="/js/plugins/clockpicker/clockpicker.js"></script>					<!-- Saat -->
    <script src="/js/plugins/daterangepicker/daterangepicker.js"></script>			<!-- Takvim - iki tarih arası -->
    <script src="/js/plugins/switchery/switchery.js"></script>						<!-- Switch buton -->
    <script src="/js/plugins/validate/jquery.validate.min.js"></script>				<!-- Validate -->
    <script src="/js/plugins/validate/messages_tr.js"></script>				<!-- Validate -->
    <script src="/js/plugins/dualListbox/jquery.bootstrap-duallistbox.js"></script>	<!-- Listbox arama, birden çok seçim -->
    <script src="/js/plugins/sweetalert/sweetalert.min.js"></script>					<!-- Sweet alert -->
    <script src="/js/plugins/toastr/toastr.min.js"></script>					        <!-- toastr alert -->
    <script src="/js/plugins/touchspin/jquery.bootstrap-touchspin.min.js"></script>	<!-- Sayaç - 0 + -->

    <script type="text/javascript">
        $(document).ready(function(){

            $('.i-checks').iCheck({ checkboxClass: 'icheckbox_square-green', radioClass: 'iradio_square-green' });
            $('.clockpicker').clockpicker();

            $('.input-group.date').datepicker({todayBtn: "linked",keyboardNavigation: false,forceParse: false,calendarWeeks: true,autoclose: true});
            $('.input-daterange').datepicker({keyboardNavigation: false,forceParse: true,autoclose: true});
            $('.dual_select').bootstrapDualListbox({selectorMinimalHeight: 160});

            tabble = $('.datatable').DataTable({
                pageLength: 25,
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    {extend: 'copy'},
                    {extend: 'csv'},
                    {extend: 'excel', title: 'Tablo1'},
                    {extend: 'pdf', title: 'Tablo1'},
                    {extend: 'print',
                        customize: function (win){
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                .addClass('compact')
                                .css('font-size', 'inherit');
                        }
                    }
                ],
                "language": {
                    "sDecimal":        ",",
                    "sEmptyTable":     "Tabloda herhangi bir veri mevcut değil",
                    "sInfo":           "_TOTAL_ kayıttan _START_ - _END_ arasındaki kayıtlar gösteriliyor",
                    "sInfoEmpty":      "Kayıt yok",
                    "sInfoFiltered":   "(_MAX_ kayıt içerisinden bulunan)",
                    "sInfoPostFix":    "",
                    "sInfoThousands":  ".",
                    "sLengthMenu":     "Sayfada _MENU_ kayıt göster",
                    "sLoadingRecords": "Yükleniyor...",
                    "sProcessing":     "İşleniyor...",
                    "sSearch":         "Ara:",
                    "sZeroRecords":    "Eşleşen kayıt bulunamadı",
                    "oPaginate": {
                        "sFirst":    "İlk",
                        "sLast":     "Son",
                        "sNext":     "Sonraki",
                        "sPrevious": "Önceki"
                    },
                    "oAria": {
                        "sSortAscending":  ": artan sütun sıralamasını aktifleştir",
                        "sSortDescending": ": azalan sütun sıralamasını aktifleştir"
                    }
                }
            });



            toastr.options = {
                closeButton: true,
                progressBar: true,
                timeOut:3000,
                positionClass: "toast-top-right"

            };

            $(function () {
                $('[data-toggle="tooltip"]').tooltip({container: "body"});
            });

            <!-- Selectbox Arama -->
            $('.chosen-select').chosen({width: "100%"});

            $("form.formvalidate").validate();
        });



        function sadecesayi(myfield, e, dec){

            var key;
            var keychar;

            //myfield.value = $.trim(myfield.value);
            myfield.value = replaceAll(' ','',myfield.value);

            if (window.event)
                key = window.event.keyCode;
            else if (e)
                key = e.which;
            else
                return true;
            keychar = String.fromCharCode(key);

            // control keys
            if ((key == null) || (key == 0) || (key == 8) ||
                (key == 9) || (key == 13) || (key == 27))
                return true;

            // numbers
            else if ((("0123456789").indexOf(keychar) > -1))
                return true;

            // decimal point jump
            else if (dec && (keychar == ".")) {
                myfield.form.elements[dec].focus();
                return false;
            }
            else
                return false;
        }

        function trKarakterTemizle(element) {
            var newValue = '';
            newValue = replaceAll('ç','c',element.value);
            newValue = replaceAll('Ç','C',newValue);
            newValue = replaceAll('ğ','g',newValue);
            newValue = replaceAll('Ğ','G',newValue);
            newValue = replaceAll('ı','i',newValue);
            newValue = replaceAll('İ','I',newValue);
            newValue = replaceAll('ü','u',newValue);
            newValue = replaceAll('Ü','U',newValue);
            newValue = replaceAll('ö','o',newValue);
            newValue = replaceAll('Ö','O',newValue);
            newValue = replaceAll('ş','s',newValue);
            newValue = replaceAll('Ş','S',newValue);
            $(element).val(newValue);
        }

        function trKarakterTemizle2(element) {
            var newValue = '';
            newValue = replaceAll('ç','c',element.value);
            newValue = replaceAll('Ç','C',newValue);
            newValue = replaceAll('ğ','g',newValue);
            newValue = replaceAll('Ğ','G',newValue);
            newValue = replaceAll('ı','i',newValue);
            newValue = replaceAll('İ','I',newValue);
            newValue = replaceAll('ü','u',newValue);
            newValue = replaceAll('Ü','U',newValue);
            newValue = replaceAll('ö','o',newValue);
            newValue = replaceAll('Ö','O',newValue);
            newValue = replaceAll('ş','s',newValue);
            newValue = replaceAll('Ş','S',newValue);
            //newValue = replaceAll(' ','',newValue);
            $(element).val(newValue);
        }

        function replaceAll(search, replacement,target) {
            return target.replace(new RegExp(search, 'g'), replacement);
        }


    </script>

    <script type="text/javascript">

        $(document).ready(function ()
        {
            $('#surveyCheck').on("ifChanged", function ()
            {
                if($('#surveyCheck').prop('checked')){
                    $('#survey_alani').show('slow')
                }else {
                    document.getElementById("survey").value='0';
                    $('#survey_alani').hide('slow')
                }

            });
        });


        function kontrol() {
            if($('.dahililer:checked').length>=0){
                $('.errorgoster').hide('slow')
                return true;
            }else if ($('.harici_nolar').filter(function() {if(this.value!=""){return this;}}).length>0){
                $('.errorgoster').hide('slow')
                return true;
            }else{
                $('.errorgoster').show('slow')
                return false;
            }
        }
        function targetChange(name) {
            if(name=='hangup' || name==''){
                $('#target_id_alani').hide('slow');
            }else if(name=='dial'){
                $('#target_id_alani').html('<input type="text" onkeypress="return sadecesayi(this, event);" placeholder="05XXXXXXXXX" minlength="11" name="target_id" class="form-control" required value="">').show('slow');
            }else if(name=='extensions'){
                var html = '<select name="target_id" class="form-control" required><option value="">Seçiniz</option>';
                var secim = '';
                html += '<option '+secim+' value="497">3000 ( Zeliha Murat  )</option>';
                var secim = '';
                html += '<option '+secim+' value="2">3001 ( Arzu Akbas  )</option>';
                var secim = '';
                html += '<option '+secim+' value="3">3002 ( Ceren Kasimoglu       )</option>';
                var secim = '';
                html += '<option '+secim+' value="5">3004 ( Hayriye Coban  )</option>';
                var secim = '';
                html += '<option '+secim+' value="6">3005 ( Irem Ogredici  )</option>';
                var secim = '';
                html += '<option '+secim+' value="7">3006 ( Ozge Kasar  )</option>';
                var secim = '';
                html += '<option '+secim+' value="8">3007 ( Sena Hosken  )</option>';
                var secim = '';
                html += '<option '+secim+' value="9">3008 ( Merve Ozer  )</option>';
                var secim = '';
                html += '<option '+secim+' value="10">3009 ( Nuri Yilmaz  )</option>';
                var secim = '';
                html += '<option '+secim+' value="11">3010 ( Nurcan Korkilinc  )</option>';
                var secim = '';
                html += '<option '+secim+' value="12">3011 ( Melike Melek  )</option>';
                var secim = '';
                html += '<option '+secim+' value="13">3012 ( Melike Durmaz  )</option>';
                var secim = '';
                html += '<option '+secim+' value="456">3013 ( Merve Sagman  )</option>';
                var secim = '';
                html += '<option '+secim+' value="15">3014 ( Cavidan Oz  )</option>';
                var secim = '';
                html += '<option '+secim+' value="453">3015 ( Esra Kaya  )</option>';
                var secim = '';
                html += '<option '+secim+' value="454">3016 ( Zeynepnur Oz  )</option>';
                var secim = '';
                html += '<option '+secim+' value="455">3017 ( Kubra Batur   )</option>';
                var secim = '';
                html += '<option '+secim+' value="19">3018 ( Seda Sahin  )</option>';
                var secim = '';
                html += '<option '+secim+' value="20">3019 ( Ebru Hatipoglu  )</option>';
                var secim = '';
                html += '<option '+secim+' value="21">3020 ( Imran Isen  )</option>';
                var secim = '';
                html += '<option '+secim+' value="22">3021 ( Faruk Ozerzurumlu  )</option>';
                var secim = '';
                html += '<option '+secim+' value="23">3022 ( Hande Saracoglu  )</option>';
                var secim = '';
                html += '<option '+secim+' value="495">3023 ( Ozlem Cakir   )</option>';
                var secim = '';
                html += '<option '+secim+' value="25">3024 ( Kubra Genc  )</option>';
                var secim = '';
                html += '<option '+secim+' value="534">3025 ( Esra Yildiz    )</option>';
                var secim = '';
                html += '<option '+secim+' value="438">3026 ( Erdem Karatepe  )</option>';
                var secim = '';
                html += '<option '+secim+' value="28">3027 ( Omer Bayram  )</option>';
                var secim = '';
                html += '<option '+secim+' value="467">3028 ( Elif Sengonul   )</option>';
                var secim = '';
                html += '<option '+secim+' value="30">3029 ( Havvanur Bilmez  )</option>';
                var secim = '';
                html += '<option '+secim+' value="31">3030 ( Ahmet Ozkiraz  )</option>';
                var secim = '';
                html += '<option '+secim+' value="32">3031 ( Betul Onari  )</option>';
                var secim = '';
                html += '<option '+secim+' value="33">3032 ( Merve Onder   )</option>';
                var secim = '';
                html += '<option '+secim+' value="34">3033 ( Gulden Durgun  )</option>';
                var secim = '';
                html += '<option '+secim+' value="35">3034 ( Funda Asantugrul  )</option>';
                var secim = '';
                html += '<option '+secim+' value="36">3035 ( Elif Percin   )</option>';
                var secim = '';
                html += '<option '+secim+' value="37">3036 ( Ebru Agac  )</option>';
                var secim = '';
                html += '<option '+secim+' value="38">3037 ( Salih Isler  )</option>';
                var secim = '';
                html += '<option '+secim+' value="457">3038 ( Tarik Dag  )</option>';
                var secim = '';
                html += '<option '+secim+' value="41">3040 ( Aslihan Yilmaz  )</option>';
                var secim = '';
                html += '<option '+secim+' value="42">3041 ( Muhammet Dogan  )</option>';
                var secim = '';
                html += '<option '+secim+' value="43">3042 ( Enes Karakus  )</option>';
                var secim = '';
                html += '<option '+secim+' value="44">3043 ( Samil Gokce  )</option>';
                var secim = '';
                html += '<option '+secim+' value="451">3044 ( Seda Dizman     )</option>';
                var secim = '';
                html += '<option '+secim+' value="46">3045 ( Sibel Mavzer  )</option>';
                var secim = '';
                html += '<option '+secim+' value="47">3046 ( Cemal Erdem  )</option>';
                var secim = '';
                html += '<option '+secim+' value="49">3048 ( Ali Candar   )</option>';
                var secim = '';
                html += '<option '+secim+' value="393">3049 ( Sukran Demir  )</option>';
                var secim = '';
                html += '<option '+secim+' value="51">3050 ( Ayse Kaya  )</option>';
                var secim = '';
                html += '<option '+secim+' value="52">3051 ( Elem Yilmaz  )</option>';
                var secim = '';
                html += '<option '+secim+' value="53">3052 ( Sefa Guven  )</option>';
                var secim = '';
                html += '<option '+secim+' value="390">3053 ( Berat Karakaplan  )</option>';
                var secim = '';
                html += '<option '+secim+' value="391">3054 ( Mehmet Cicek  )</option>';
                var secim = '';
                html += '<option '+secim+' value="443">3055 ( Hatice Tor  )</option>';
                var secim = '';
                html += '<option '+secim+' value="57">3056 ( Sila Pelit  )</option>';
                var secim = '';
                html += '<option '+secim+' value="431">3057 ( Gulcin Barbak  )</option>';
                var secim = '';
                html += '<option '+secim+' value="468">3058 ( Huseyin Bayram  )</option>';
                var secim = '';
                html += '<option '+secim+' value="444">3059 ( Musa Gunay  )</option>';
                var secim = '';
                html += '<option '+secim+' value="61">3060 ( Hacer Varazli  )</option>';
                var secim = '';
                html += '<option '+secim+' value="445">3061 ( Basak Unlu  )</option>';
                var secim = '';
                html += '<option '+secim+' value="63">3062 ( Busra Demirtas  )</option>';
                var secim = '';
                html += '<option '+secim+' value="64">3063 ( Koray Inan  )</option>';
                var secim = '';
                html += '<option '+secim+' value="66">3065 ( Mert Alparslan  )</option>';
                var secim = '';
                html += '<option '+secim+' value="446">3066 ( Cigdem Urgen  )</option>';
                var secim = '';
                html += '<option '+secim+' value="68">3067 ( Yunus Simsek  )</option>';
                var secim = '';
                html += '<option '+secim+' value="69">3068 ( Eren Karatas  )</option>';
                var secim = '';
                html += '<option '+secim+' value="70">3069 ( Seda Dalkiran  )</option>';
                var secim = '';
                html += '<option '+secim+' value="71">3070 ( Cansu Yildiz  )</option>';
                var secim = '';
                html += '<option '+secim+' value="469">3071 ( Kubranur Peksen  )</option>';
                var secim = '';
                html += '<option '+secim+' value="73">3072 ( Mahmut Yakan  )</option>';
                var secim = '';
                html += '<option '+secim+' value="126">3074 ( Beyza Islekli  )</option>';
                var secim = '';
                html += '<option '+secim+' value="76">3075 ( Esma Cevirgen   )</option>';
                var secim = '';
                html += '<option '+secim+' value="77">3076 ( Resit Colkesen  )</option>';
                var secim = '';
                html += '<option '+secim+' value="78">3077 ( Sumeyye Sarihan  )</option>';
                var secim = '';
                html += '<option '+secim+' value="79">3078 ( Aysenur Zeren  )</option>';
                var secim = '';
                html += '<option '+secim+' value="80">3079 ( Hikmet Sahin  )</option>';
                var secim = '';
                html += '<option '+secim+' value="81">3080 ( Esra Sanli       )</option>';
                var secim = '';
                html += '<option '+secim+' value="82">3081 ( Seher Akin  )</option>';
                var secim = '';
                html += '<option '+secim+' value="83">3082 ( Mina Percin  )</option>';
                var secim = '';
                html += '<option '+secim+' value="84">3083 ( Bilge Koc  )</option>';
                var secim = '';
                html += '<option '+secim+' value="85">3084 ( Turgay Karakoc  )</option>';
                var secim = '';
                html += '<option '+secim+' value="128">3085 ( Derya Dogan  )</option>';
                var secim = '';
                html += '<option '+secim+' value="87">3086 ( Ugur Gok  )</option>';
                var secim = '';
                html += '<option '+secim+' value="514">3087 ( Fatma Deligonul  )</option>';
                var secim = '';
                html += '<option '+secim+' value="518">3090 ( Meral Uresin  )</option>';
                var secim = '';
                html += '<option '+secim+' value="94">3093 ( Songul Kas  )</option>';
                var secim = '';
                html += '<option '+secim+' value="95">3094 ( Sumeyye Saglam  )</option>';
                var secim = '';
                html += '<option '+secim+' value="100">3099 ( Merve Colak       )</option>';
                var secim = '';
                html += '<option '+secim+' value="101">3100 ( Irem Cerioglu  )</option>';
                var secim = '';
                html += '<option '+secim+' value="470">3102 ( Mehmet Tutuncu   )</option>';
                var secim = '';
                html += '<option '+secim+' value="104">3103 ( Aleyna Gurbuz  )</option>';
                var secim = '';
                html += '<option '+secim+' value="471">3104 ( Muhammed Batur   )</option>';
                var secim = '';
                html += '<option '+secim+' value="106">3105 ( Caner Ocak  )</option>';
                var secim = '';
                html += '<option '+secim+' value="472">3106 ( Taha Zeren   )</option>';
                var secim = '';
                html += '<option '+secim+' value="110">3109 ( Merve Yenal  )</option>';
                var secim = '';
                html += '<option '+secim+' value="111">3110 ( Mucahit Boztepe  )</option>';
                var secim = '';
                html += '<option '+secim+' value="480">3113 ( Merve Akyel  )</option>';
                var secim = '';
                html += '<option '+secim+' value="481">3114 ( Sulbiye Yaman  )</option>';
                var secim = '';
                html += '<option '+secim+' value="159">3115 ( Furkan Haskologlu  )</option>';
                var secim = '';
                html += '<option '+secim+' value="482">3116 ( Rabia Karatas  )</option>';
                var secim = '';
                html += '<option '+secim+' value="120">3117 ( Ahmet Albayrak  )</option>';
                var secim = '';
                html += '<option '+secim+' value="122">3118 ( Aylin Acim  )</option>';
                var secim = '';
                html += '<option '+secim+' value="483">3119 ( Filiz Tadik  )</option>';
                var secim = '';
                html += '<option '+secim+' value="125">3120 ( Alperen Yildiz  )</option>';
                var secim = '';
                html += '<option '+secim+' value="484">3122 ( Bahadir Hatipoglu  )</option>';
                var secim = '';
                html += '<option '+secim+' value="134">3124 ( Ebru Yurtbay  )</option>';
                var secim = '';
                html += '<option '+secim+' value="486">3125 ( Ejder Celbis  )</option>';
                var secim = '';
                html += '<option '+secim+' value="496">3127 ( Nagihan Acikgoz  )</option>';
                var secim = '';
                html += '<option '+secim+' value="139">3129 ( Cansu Keles  )</option>';
                var secim = '';
                html += '<option '+secim+' value="487">3130 ( Selin Yavuz  )</option>';
                var secim = '';
                html += '<option '+secim+' value="355">3131 ( Belma Baser  )</option>';
                var secim = '';
                html += '<option '+secim+' value="142">3132 ( Elif Uzamis  )</option>';
                var secim = '';
                html += '<option '+secim+' value="143">3133 ( Esra Ozgen  )</option>';
                var secim = '';
                html += '<option '+secim+' value="489">3134 ( Metin Onder  )</option>';
                var secim = '';
                html += '<option '+secim+' value="491">3135 ( Muzaffer Yuce   )</option>';
                var secim = '';
                html += '<option '+secim+' value="492">3137 ( Ozan Erdem  )</option>';
                var secim = '';
                html += '<option '+secim+' value="354">3138 ( Nafiye Aksoz  )</option>';
                var secim = '';
                html += '<option '+secim+' value="493">3139 ( Ayse Sezgin  )</option>';
                var secim = '';
                html += '<option '+secim+' value="494">3140 ( Merve Tasci   )</option>';
                var secim = '';
                html += '<option '+secim+' value="151">3141 ( Burcu Serin  )</option>';
                var secim = '';
                html += '<option '+secim+' value="490">3142 ( Asude Ay  )</option>';
                var secim = '';
                html += '<option '+secim+' value="153">3143 ( Burcu Yilmaz  )</option>';
                var secim = '';
                html += '<option '+secim+' value="154">3144 ( Esra Altun  )</option>';
                var secim = '';
                html += '<option '+secim+' value="166">3149 ( Ecem Yildiz  )</option>';
                var secim = '';
                html += '<option '+secim+' value="161">3150 ( Ayse Polat  )</option>';
                var secim = '';
                html += '<option '+secim+' value="162">3151 ( Caner Durmaz  )</option>';
                var secim = '';
                html += '<option '+secim+' value="163">3152 ( Elif Ozsayin  )</option>';
                var secim = '';
                html += '<option '+secim+' value="167">3155 ( Hamide Has  )</option>';
                var secim = '';
                html += '<option '+secim+' value="170">3158 ( Onur Yurekli  )</option>';
                var secim = '';
                html += '<option '+secim+' value="171">3159 ( Seda Altun  )</option>';
                var secim = '';
                html += '<option '+secim+' value="182">3170 ( Nurullah Alisik  )</option>';
                var secim = '';
                html += '<option '+secim+' value="180">3171 ( Selva Orhanoglu  )</option>';
                var secim = '';
                html += '<option '+secim+' value="184">3175 ( Ozge Guler  )</option>';
                var secim = '';
                html += '<option '+secim+' value="192">3181 ( Nurettin Ezer  )</option>';
                var secim = '';
                html += '<option '+secim+' value="452">3216 ( Ali Artuvan  )</option>';
                var secim = '';
                html += '<option '+secim+' value="226">3218 ( Yusuf Onder   )</option>';
                var secim = '';
                html += '<option '+secim+' value="237">3219 ( Mukaddes Konak  )</option>';
                var secim = '';
                html += '<option '+secim+' value="240">3220 ( Ozlem Ikiz      )</option>';
                var secim = '';
                html += '<option '+secim+' value="356">3221 ( Ayse Ozavci  )</option>';
                var secim = '';
                html += '<option '+secim+' value="357">3222 ( Aysegul Karahan  )</option>';
                var secim = '';
                html += '<option '+secim+' value="358">3223 ( Damla Cetinkaya  )</option>';
                var secim = '';
                html += '<option '+secim+' value="359">3224 ( Ebubekir Varlioglu  )</option>';
                var secim = '';
                html += '<option '+secim+' value="360">3225 ( Ertugrul Firat  )</option>';
                var secim = '';
                html += '<option '+secim+' value="361">3226 ( Esra Bilici   )</option>';
                var secim = '';
                html += '<option '+secim+' value="362">3227 ( Gurkan Gultekin  )</option>';
                var secim = '';
                html += '<option '+secim+' value="363">3228 ( Ibrahim Sari  )</option>';
                var secim = '';
                html += '<option '+secim+' value="364">3229 ( Maide Timur  )</option>';
                var secim = '';
                html += '<option '+secim+' value="365">3230 ( Onur Sahin  )</option>';
                var secim = '';
                html += '<option '+secim+' value="366">3231 ( Rabia Kilic  )</option>';
                var secim = '';
                html += '<option '+secim+' value="351">3232 ( Fazli Akca  )</option>';
                var secim = '';
                html += '<option '+secim+' value="367">3233 ( Rabia Koc  )</option>';
                var secim = '';
                html += '<option '+secim+' value="368">3234 ( Serkan Ozturkmen  )</option>';
                var secim = '';
                html += '<option '+secim+' value="369">3235 ( Talha Can  )</option>';
                var secim = '';
                html += '<option '+secim+' value="370">3236 ( Tugce Kirteke  )</option>';
                var secim = '';
                html += '<option '+secim+' value="372">3238 ( Yaren Akpinar  )</option>';
                var secim = '';
                html += '<option '+secim+' value="373">3239 ( Tarik Dag  )</option>';
                var secim = '';
                html += '<option '+secim+' value="374">3240 ( Ali Seydi Aydin  )</option>';
                var secim = '';
                html += '<option '+secim+' value="375">3241 ( Mirac Uymaz  )</option>';
                var secim = '';
                html += '<option '+secim+' value="376">3242 ( Nevzat Kaya  )</option>';
                var secim = '';
                html += '<option '+secim+' value="377">3243 ( Murat Inanc  )</option>';
                var secim = '';
                html += '<option '+secim+' value="378">3244 ( Omer Ergul  )</option>';
                var secim = '';
                html += '<option '+secim+' value="379">3245 ( Songul Keles  )</option>';
                var secim = '';
                html += '<option '+secim+' value="380">3246 ( Merve Basar  )</option>';
                var secim = '';
                html += '<option '+secim+' value="381">3247 ( Gulay Otman  )</option>';
                var secim = '';
                html += '<option '+secim+' value="382">3248 ( Melih Akdemir  )</option>';
                var secim = '';
                html += '<option '+secim+' value="383">3249 ( Ayberk Soybar  )</option>';
                var secim = '';
                html += '<option '+secim+' value="384">3250 ( Burak Barlik  )</option>';
                var secim = '';
                html += '<option '+secim+' value="385">3251 ( Fatma Celik  )</option>';
                var secim = '';
                html += '<option '+secim+' value="386">3252 ( Tugce Ozer  )</option>';
                var secim = '';
                html += '<option '+secim+' value="389">3255 ( Ramazan Oztemur  )</option>';
                var secim = '';
                html += '<option '+secim+' value="394">3256 ( Sadik Kahyaoglu  )</option>';
                var secim = '';
                html += '<option '+secim+' value="395">3257 ( Berivan Kizilcan  )</option>';
                var secim = '';
                html += '<option '+secim+' value="396">3258 ( Mine Onder  )</option>';
                var secim = '';
                html += '<option '+secim+' value="398">3259 ( Mustafa Alipasaoglu  )</option>';
                var secim = '';
                html += '<option '+secim+' value="400">3260 ( Mehmet Onder  )</option>';
                var secim = '';
                html += '<option '+secim+' value="399">3261 ( Esra Sallabas  )</option>';
                var secim = '';
                html += '<option '+secim+' value="402">3262 ( Merve Uz  )</option>';
                var secim = '';
                html += '<option '+secim+' value="403">3263 ( Volkan Cavusoglu  )</option>';
                var secim = '';
                html += '<option '+secim+' value="404">3264 ( Mesut Numanoglu  )</option>';
                var secim = '';
                html += '<option '+secim+' value="411">3265 ( Ilker Poyraz  )</option>';
                var secim = '';
                html += '<option '+secim+' value="405">3266 ( Yesim Cicek  )</option>';
                var secim = '';
                html += '<option '+secim+' value="407">3267 ( Ozan Erdem  )</option>';
                var secim = '';
                html += '<option '+secim+' value="408">3268 ( Serhad Erdem  )</option>';
                var secim = '';
                html += '<option '+secim+' value="409">3269 ( Tarik Dag  )</option>';
                var secim = '';
                html += '<option '+secim+' value="401">3270 ( Ozkan Metin  )</option>';
                var secim = '';
                html += '<option '+secim+' value="397">3271 ( Zeliha Murat  )</option>';
                var secim = '';
                html += '<option '+secim+' value="412">3272 ( Fatma Polat  )</option>';
                var secim = '';
                html += '<option '+secim+' value="413">3273 ( Bulent Sari  )</option>';
                var secim = '';
                html += '<option '+secim+' value="414">3274 ( Mehmet Gedik  )</option>';
                var secim = '';
                html += '<option '+secim+' value="415">3275 ( Ahmet Yildirim  )</option>';
                var secim = '';
                html += '<option '+secim+' value="416">3276 ( Andac Aytac  )</option>';
                var secim = '';
                html += '<option '+secim+' value="417">3277 ( Yigitcan Akpinar  )</option>';
                var secim = '';
                html += '<option '+secim+' value="418">3278 ( Oznur Demircioglu  )</option>';
                var secim = '';
                html += '<option '+secim+' value="420">3279 ( Sinan Demir  )</option>';
                var secim = '';
                html += '<option '+secim+' value="419">3280 ( Ferhat Zengin  )</option>';
                var secim = '';
                html += '<option '+secim+' value="421">3281 ( Sevtap Turanci  )</option>';
                var secim = '';
                html += '<option '+secim+' value="422">3282 ( Hale Urun  )</option>';
                var secim = '';
                html += '<option '+secim+' value="423">3283 ( Salim Demiray  )</option>';
                var secim = '';
                html += '<option '+secim+' value="424">3284 ( Merve Tasci  )</option>';
                var secim = '';
                html += '<option '+secim+' value="425">3285 ( Ayse Sezgin  )</option>';
                var secim = '';
                html += '<option '+secim+' value="426">3286 ( Emrah Demirbas  )</option>';
                var secim = '';
                html += '<option '+secim+' value="427">3287 ( Barbaros Sezgun  )</option>';
                var secim = '';
                html += '<option '+secim+' value="428">3288 ( Nevzat Bakirci  )</option>';
                var secim = '';
                html += '<option '+secim+' value="429">3289 ( Erhun Ocal  )</option>';
                var secim = '';
                html += '<option '+secim+' value="430">3290 ( Ercan Oztemel  )</option>';
                var secim = '';
                html += '<option '+secim+' value="450">3291 ( Anil Sevener  )</option>';
                var secim = '';
                html += '<option '+secim+' value="458">3292 ( Ersin Cebeci  )</option>';
                var secim = '';
                html += '<option '+secim+' value="460">3294 ( Arzu Buse Celen  )</option>';
                var secim = '';
                html += '<option '+secim+' value="498">3295 ( Firdevs Yeke   )</option>';
                var secim = '';
                html += '<option '+secim+' value="499">3296 ( Ruveyda Deger   )</option>';
                var secim = '';
                html += '<option '+secim+' value="500">3297 ( Sefa Alkurt   )</option>';
                var secim = '';
                html += '<option '+secim+' value="501">3298 ( Isilay Bakdur  )</option>';
                var secim = '';
                html += '<option '+secim+' value="232">3299 ( testnetg     )</option>';
                var secim = '';
                html += '<option '+secim+' value="392">3300 ( Emine Donmez    )</option>';
                var secim = '';
                html += '<option '+secim+' value="502">3301 ( Mehmet Demirci  )</option>';
                var secim = '';
                html += '<option '+secim+' value="503">3302 ( Erkan Gul  )</option>';
                var secim = '';
                html += '<option '+secim+' value="504">3303 ( Nida Akinci  )</option>';
                var secim = '';
                html += '<option '+secim+' value="505">3304 ( Sefa Canpolat  )</option>';
                var secim = '';
                html += '<option '+secim+' value="506">3305 ( Sezer Guler  )</option>';
                var secim = '';
                html += '<option '+secim+' value="507">3306 ( Fatime Yukkaldiran  )</option>';
                var secim = '';
                html += '<option '+secim+' value="508">3307 ( Cagla Danaci  )</option>';
                var secim = '';
                html += '<option '+secim+' value="509">3308 ( Ozal Uzun  )</option>';
                var secim = '';
                html += '<option '+secim+' value="510">3309 ( Enes Akkaya  )</option>';
                var secim = '';
                html += '<option '+secim+' value="511">3310 ( Muhammet Demirtas  )</option>';
                var secim = '';
                html += '<option '+secim+' value="512">3311 ( Mehmet Canbay  )</option>';
                var secim = '';
                html += '<option '+secim+' value="513">3312 ( Ali Colak  )</option>';
                var secim = '';
                html += '<option '+secim+' value="410">3360 ( Faruk Ozer  )</option>';
                var secim = '';
                html += '<option '+secim+' value="479">3361 ( Kubra Peksen  )</option>';
                var secim = '';
                html += '<option '+secim+' value="515">3362 ( Merve Beyhan  )</option>';
                var secim = '';
                html += '<option '+secim+' value="516">3363 ( Gulce Karabacak  )</option>';
                var secim = '';
                html += '<option '+secim+' value="517">3364 ( Kubra Sevinc  )</option>';
                var secim = '';
                html += '<option '+secim+' value="519">3365 ( Elif Ozcan  )</option>';
                var secim = '';
                html += '<option '+secim+' value="521">3366 ( Timur Kadakal  )</option>';
                var secim = '';
                html += '<option '+secim+' value="522">3367 ( Ozge Nur Kayhan  )</option>';
                var secim = '';
                html += '<option '+secim+' value="523">3368 ( Husna Karaduman  )</option>';
                var secim = '';
                html += '<option '+secim+' value="524">3369 ( Ayse Orhaner  )</option>';
                var secim = '';
                html += '<option '+secim+' value="525">3370 ( Cuneyt Yuceer  )</option>';
                var secim = '';
                html += '<option '+secim+' value="526">3371 ( Cansu Lale  )</option>';
                var secim = '';
                html += '<option '+secim+' value="527">3372 ( Ismail Polat  )</option>';
                var secim = '';
                html += '<option '+secim+' value="528">3373 ( Leyla Ercan  )</option>';
                var secim = '';
                html += '<option '+secim+' value="529">3374 ( Yasemin Ayhan  )</option>';
                var secim = '';
                html += '<option '+secim+' value="530">3375 ( Melisa Cakmak  )</option>';
                var secim = '';
                html += '<option '+secim+' value="531">3376 ( Seda Yildiz  )</option>';
                var secim = '';
                html += '<option '+secim+' value="532">3377 ( Berat Ozcan  )</option>';
                var secim = '';
                html += '<option '+secim+' value="533">3378 ( Sena Turgut   )</option>';
                var secim = '';
                html += '<option '+secim+' value="536">3380 ( Irem Soygan   )</option>';
                var secim = '';
                html += '<option '+secim+' value="537">3381 ( Sevval Beken       )</option>';
                var secim = '';
                html += '<option '+secim+' value="538">3382 ( Mehmet Bayraktar   )</option>';
                var secim = '';
                html += '<option '+secim+' value="539">3383 ( Pelin Yildiz   )</option>';
                var secim = '';
                html += '<option '+secim+' value="540">3384 ( Merve Talu   )</option>';
                var secim = '';
                html += '<option '+secim+' value="541">3385 ( Aysegul Somuncu   )</option>';
                var secim = '';
                html += '<option '+secim+' value="542">3386 ( Bahar Arslantas  )</option>';
                var secim = '';
                html += '<option '+secim+' value="485">9368 ( test88  )</option>';
                var secim = '';
                html += '<option '+secim+' value="231">9966 ( testnetgsm2   )</option>';
                var secim = '';
                html += '<option '+secim+' value="119">9999 ( NetgsmTestDahili   )</option>';
                html += '</select>';
                $('#target_id_alani').html(html).show('slow');
            }else if(name=='announcement' || name=='menu' || name=='timecondition' || name=='sms' || name=='queue' || name=='voicemail' ){
                $('#target_id_alani').html('<img src="/images/loading.gif">').show('slow');
                $.ajax({
                    type: "POST",
                    url: "/home/listeGetir",
                    data: "listeGetir&type="+name,
                    success: function (data) {
                        if(data.islem===true){
                            var html = '<select name="target_id" class="form-control" required><option value="">Seçiniz</option>';



                            if (name==='queue' || name==='announcement'){
                                var x=Object.values(data.data);
                                $(x).each(function (key,value) {




                                    if(name=='hangup' && value.id=='0'){
                                        var secim = 'selected';
                                    }else{
                                        var secim = '';
                                    }
                                    html += '<option '+secim+' value="'+value.id+'">'+value.name+'</option>';
                                });


                            }else {


                                $(data.data).each(function (key,value) {
                                    if(name=='hangup' && value.id=='0'){
                                        var secim = 'selected';
                                    }else{
                                        var secim = '';
                                    }
                                    html += '<option '+secim+' value="'+value.id+'">'+value.name+'</option>';
                                });




                            }





                            html += '</select>';
                        }else{
                            var html = data.message;
                        }
                        $('#target_id_alani').html(html);

                    },
                    error: function (data) {
                        $('#target_id_alani').html('Liste Bilgileri Yüklenemedi.');
                    },
                    dataType: "json"
                });
            }



        }


        function ekle(){
            $('#hariciSayisi').val(parseInt($('#hariciSayisi').val())+1)
            var hariciSayisi = $('#hariciSayisi').val();
            $('#harici_alanlar').append(
                '<tr id="harici_alan_'+hariciSayisi+'">'+
                '<td><div class="form-group" style="padding-left: 20px;padding-right: 20px;margin-bottom: 0">'+
                '<input type="text" onkeypress="return sadecesayi(this, event);" name="harici_no_'+hariciSayisi+'" class="form-control harici_nolar" placeholder="Örn: 0XXXXXXXXXX"  minlength="11" maxlength="22" >'+
                '</div></td>'+
                '<td width="60">'+
                '<select name="harici_oncelik_'+hariciSayisi+'" class="form-control" required >'+
                '<option value="1">1</option>'+
                '<option value="2">2</option>'+
                '<option value="3">3</option>'+
                '<option value="4">4</option>'+
                '<option value="5">5</option>'+
                '<option value="6">6</option>'+
                '<option value="7">7</option>'+
                '<option value="8">8</option>'+
                '<option value="9">9</option>'+
                '<option value="10">10</option>'+
                '</select>'+
                '</td>'+
                '<td align="center">'+
                '<i class="fa fa-times" style="color: red;" onclick="sil('+hariciSayisi+')"></i>'+
                '</td>'+
                '</tr>'
            );
        }
        function sil(sira){
            $('#harici_alan_'+sira).remove();
        }
        jQuery.validator.addMethod("alphanumeric", function(value, element) {
            return this.optional(element) || /^[a-zA-Z0-9 ]+$/.test(value);
        });
        jQuery.validator.addMethod("dhkontrol", function(value, element) {

            if($('.dahililer:checked').length>0 ){
                return true;
            }else{
                var hariciControl = false;
                $('.harici_nolar').each( function( index ) {
                    if($(this).val()!=''){
                        hariciControl=true;
                    }
                });
                return hariciControl;
            }
        });
    </script>


    <link rel="icon" type="image/x-icon" href="/netgsm.ico">
    <style type="text/css">:root topadblock, :root script[src^="http://free-shoutbox.net/app/webroot/shoutbox/sb.php?shoutbox="] + #freeshoutbox_content, :root input[onclick^="window.open('http://www.FriendlyDuck.com/"], :root img[alt^="Fuckbook"], :root iframe[src^="http://static.mozo.com.au/strips/"], :root iframe[id^="google_ads_iframe"], :root div[jscontroller="U835zd"] + c-wiz[jsrenderer="YnuqN"], :root div[id^="zergnet-widget"], :root div[id^="traffective-ad-"], :root div[id^="sticky_ad_"], :root div[id^="q1-adset-"], :root div[id^="proadszone-"], :root div[id^="lazyad-"], :root div[id^="gtm-ad-"], :root div[id^="google_ads_iframe_"], :root div[id^="ezoic-pub-ad"], :root div[id^="dmRosAdWrapper"], :root div[id^="div-gpt-ad"], :root div[id^="div-adtech-ad-"], :root div[id^="dfp-slot-"], :root div[id^="dfp-ad-"], :root div[id^="block-views-topheader-ad-block-"], :root div[id^="advt-"], :root div[id^="advads_"], :root div[id^="ads300_600-widget"], :root input[onclick^="window.open('http://www.friendlyduck.com/"], :root div[id^="ads300_250-widget"], :root div[id^="ads300_100-widget"], :root div[id^="ads250_250-widget"], :root div[id^="ads120_600-widget"], :root div[id^="adrotate_widgets-"], :root div[id^="ad_script_"], :root div[id^="ad_rect_"], :root div[id^="ad_position_"], :root div[id^="ad-server-"], :root div[id^="ad-cid-"], :root div[id^="acm-ad-tag-"], :root div[id^="YFBMSN"], :root div[id^="ADV-SLOT-"], :root div[data-spotim-slot], :root div[data-role="sidebarAd"], :root div[data-native_ad], :root div[data-mediatype="advertising"], :root div[data-id-advertdfpconf], :root div[data-crl="true"][data-id^="CarouselPLA-"], :root div[data-content="Advertisement"], :root div[data-adunit], :root div[data-adunit-path], :root div[class^="zn-sponsored-outbrain-"], :root div[class^="proadszone-"], :root div[class^="pane-google-admanager-"], :root div[class^="lifeOnwerAd"], :root iframe[name^="google_ads_iframe"], :root div[class^="largeRectangleAd_"], :root div[class^="kiwiad-popup"], :root div[class^="kiwiad-desktop"], :root div[class^="index_adBeforeContent_"], :root div[class^="index_adAfterContent_"], :root div[class^="index__adWrapper"], :root div[class^="block-openx-"], :root div[class^="backfill-taboola-home-slot-"], :root div[class^="articleAdUnitMPU_"], :root div[class^="advertisement-desktop"], :root div[class^="adsbutt_wrapper_"], :root div[class^="ads-partner-"], :root div[class^="adbanner_"], :root div[class^="ad_position_"], :root div[class^="SponsoredAds"], :root div[class^="ResponsiveAd-"], :root div[class^="PreAd_"], :root div[class^="Display_displayAd"], :root div[class^="BannerAd_"], :root div[class^="AdhesionAd_"], :root div[class^="Ad__bigBox"], :root div[class^="Ad__adContainer"], :root div[id^="divAdvAD_"], :root div[class^="ad_border_"], :root div[class^="AdItem-"], :root div[class^="AdEmbeded__AddWrapper"], :root span[data-component-type="s-ads-metrics"], :root div[class^="AdBannerWrapper-"], :root div[class*="_browserAdOuterContainer_"], :root div[class*="_AdInArticle_"], :root div[class*="-storyBodyAd-"], :root div[id^="adfox_"], :root div#main > div.D1fz0e, :root div > [class][onclick*=".updateAnalyticsEvents"], :root bottomadblock, :root aside[id^="tn_ads_widget-"], :root aside[id^="adrotate_widgets-"], :root amp-ad-custom, :root a[target="_blank"][onmousedown="this.href^='http://paid.outbrain.com/network/redir?"], :root a[target="_blank"][href^="http://api.taboola.com/"], :root a[style="display:block;width:300px;min-height:250px"][href^="http://li.cnet.com/click?"], :root div[class^="BlockAdvert-"], :root a[src^="https://www.utherverse.com/net/"], :root a[onmousedown^="this.href='http://paid.outbrain.com/network/redir?"][target="_blank"] + .ob_source, :root a[onmousedown^="this.href='http://paid.outbrain.com/network/redir?"][target="_blank"], :root div[role="navigation"] + c-wiz > script + div > .kxhcC, :root a[onclick*="//m.economictimes.com/etmack/click.htm"], :root a[href^="https://zononi.com/"], :root a[href^="https://www.what-sexdating.com/"], :root a[href^="https://www.vewwrmp.com/"], :root a[href^="https://www.spyoff.com/"], :root a[href^="https://www.share-online.biz/affiliate/"], :root a[href^="https://www.securegfm.com/"], :root DFP-AD, :root a[href^="//porngames.adult/?SID="], :root a[href^="https://www.oneclickroot.com/?tap_a="] > img, :root a[href^="https://www.mypornstarcams.com/landing/click/"], :root a[href^="http://www.duckcash.eu/"], :root a[href^="https://www.mrskin.com/account/"], :root a[href^="https://www.iyalc.com/"], :root a[href^="https://www.goldenfrog.com/vyprvpn?offer_id="][href*="&aff_id="], :root a[href^="https://www.get-express-vpn.com/offer/"], :root a[href^="https://www.gambling-affiliation.com/cpc/"], :root a[href^="http://webgirlz.online/landing/"], :root a[href^="https://www.g4mz.com/"], :root a[href^="https://www.clicktraceclick.com/"], :root a[href^="https://www.camyou.com/?cam="][href*="&track="], :root a[href^="https://www.camsoda.com/enter.php?id="], :root a[href^="https://www.brazzersnetwork.com/landing/"], :root a[href^="https://www.bebi.com"], :root a[href^="https://www.awin1.com/cread.php?awinaffid="], :root a[href^="https://www.adskeeper.co.uk/"], :root a[href^="http://farm.plista.com/pets"], :root a[href^="https://windscribe.com/promo/"], :root a[href^="http://ad-emea.doubleclick.net/"], :root a[href^="https://understandsolar.com/signup/?lead_source="][href*="&tracking_code="], :root div[id^="tms-ad-dfp-"], :root a[href^="https://trust.zone/go/r.php?RID="], :root a[href^="https://trf.bannerator.com/"], :root a[href^="http://go.247traffic.com/"], :root a[href^="https://bestcond1tions.com/"], :root a[href^="https://trappist-1d.com/"], :root a[href^="https://traffic.bannerator.com/"], :root a[href^="https://tracking.truthfinder.com/?a="], :root #rhs_block .xpdopen > ._OKe > div > .mod > ._yYf, :root a[href^="https://tracking.gitads.io/"], :root a[href^="https://track.ultravpn.com/"], :root a[href^="https://www.adultempire.com/"][href*="?partner_id="], :root a[href^="https://track.healthtrader.com/"], :root a[href^="https://track.clickmoi.xyz/"], :root a[href^="https://control.trafficfabrik.com/"], :root a[href^="https://track.52zxzh.com/"], :root div[class^="div-gpt-ad"], :root .ra[align="right"][width="30%"], :root a[href^="https://axdsz.pro/"], :root a[href^="https://tour.mrskin.com/"], :root a[href^="https://tc.tradetracker.net/"] > img, :root a[href^="https://t.mobtya.com/"], :root a[href^="https://t.hrtyj.com/"], :root a[href^="https://t.hrtye.com/"], :root a[href^="https://syndication.optimizesrv.com/splash.php?"], :root a[href^="https://syndication.exoclick.com/splash.php?"], :root a[href^="http://connectlinking6.com/"], :root a[href^="http://cdn3.adexprts.com/"], :root a[href^="https://spygasm.com/track?"], :root div[id^="ad-div-"], :root a[href^="https://secure.eveonline.com/ft/?aid="], :root a[href^="https://secure.bstlnk.com/"], :root div[class^="kiwi-ad-wrapper"], :root a[href^="https://rev.adsession.com/"], :root [href*=".trackmstr.com"], :root a[href^="https://refpasrasw.world/"], :root a[href^="https://refpaexhil.top/"], :root a[href^="https://redirect.ero-advertising.com/"], :root AD-SLOT, :root a[href^="https://pubads.g.doubleclick.net/"], :root a[href^="https://prf.hn/click/"][href*="/adref:"], :root #rhs_block .mod > .gws-local-hotels__booking-module, :root a[href^="http://www.my-dirty-hobby.com/?sub="], :root a[href^="https://porndeals.com/?track="], :root a[href^="https://offerforge.net/"], :root div[id^="ad_head_celtra_"], :root a[href^="https://t.grtyi.com/"], :root a[href^="https://myusenet.xyz/"], :root a[href^="https://my-movie.club/"], :root a[href^="https://msecure117.com/"], :root a[href^="https://mk-cdn.net/"], :root a[href^="https://mk-ads.com/"], :root a[href^="https://misspkl.com/"], :root a[href^="https://medleyads.com/"], :root a[href*=".approvallamp.club/"], :root a[href^="https://landing1.brazzersnetwork.com"], :root a[href^="http://adrunnr.com/"], :root a[href^="https://landing.brazzersplus.com/"], :root a[href^="https://land.rk.com/landing/"], :root .lads[width="100%"][style="background:#FFF8DD"], :root a[href^="https://land.brazzersnetwork.com/landing/"], :root a[href^="https://juicyads.in/"], :root a[href^="https://join.virtuallust3d.com/"], :root a[href^="http://www.uniblue.com/cm/"], :root a[href^="https://join.sexworld3d.com/track/"], :root a[href^="https://join.dreamsexworld.com/"], :root a[href^="https://incisivetrk.cvtr.io/click?"], :root a[href^="https://iactrivago.ampxdirect.com/"], :root div[data-ismultirow="true"][data-id^="CarouselPLA-"], :root a[href^="https://horny-pussies.com/tds"], :root td[valign="top"] > .mainmenu[style="padding:10px 0 0 0 !important;"], :root a[href^="http://feedads.g.doubleclick.net/"], :root a[href^="https://redsittalvetoft.pro/"], :root a[href^="https://googleads.g.doubleclick.net/pcs/click"], :root a[href^="http://cdn.adstract.com/"], :root a[href^="https://gogoman.me/"], :root div[jsdata*="CarouselPLA-"][data-id^="CarouselPLA-"], :root a[href^="https://go.trackitalltheway.com/"], :root a[href^="https://go.stripchat.com/"][href*="&campaignId="], :root a[href^="https://go.hpyrdr.com/"], :root a[href^="https://adnetwrk.com/"], :root a[href^="https://go.gldrdr.com/"], :root div[id^="mainads"], :root a[href^="https://go.currency.com/"], :root a[href^="https://track.afftck.com/"], :root a[href^="http://guideways.info/"], :root a[href^="https://go.cmrdr.com/"], :root a[href*=".inclk.com/"], :root a[href^="https://go.ad2up.com/"], :root a[href^="https://freeadult.games/"], :root a[href^="https://fonts.fontplace9.com/"], :root a[href^="http://clkmon.com/adServe/"], :root a[href^="https://flirtaescopa.com/"], :root a[href^="https://fleshlight.sjv.io/"], :root a[href^="https://fakelay.com/"], :root a[href^="https://earandmarketing.com/"], :root [lazy-ad="leftthin_banner"], :root a[href^="https://dynamicadx.com/"], :root .GFYY1SVE2 > .GFYY1SVD2 > .GFYY1SVG5, :root a[href^="https://djtcollectorclub.org/"][href*="?affiliate_id="], :root a[href^="http://adf.ly/?id="], :root a[href^="https://uncensored3d.com/"], :root a[href^="https://creacdn.top-convert.com/"], :root a[href*="=exoclick"], :root a[href^="https://www.chngtrack.com/"], :root a[href^="https://retiremely.com/"], :root a[href^="https://cpmspace.com/"], :root .commercial-unit-mobile-top > .v7hl4d, :root a[href^="https://click.plista.com/pets"], :root a[href^="https://chaturbate.xyz/"], :root a[href^="http://look.djfiln.com/"], :root a[href^="https://chaturbate.jjgirls.com/"][href*="?tour="], :root a[href^="http://rekoverr.com/"], :root a[href^="https://chaturbate.com/in/?track="], :root a[href^="https://chaturbate.com/in/?tour="], :root a[href^="https://chaturbate.com/affiliates/"], :root .mod > ._jH + .rscontainer, :root a[href^="https://blackorange.go2cloud.org/"], :root a[href^="http://www.linkbucks.com/referral/"], :root a[href^="https://azpresearch.club/"], :root a[href^="https://awptjmp.com/"], :root a[href^="http://www.fleshlight.com/"], :root a[href^="https://aweptjmp.com/"], :root a[href^="http://www.1clickdownloader.com/"], :root a[href^="https://www.googleadservices.com/pagead/aclk?"], :root a[href^="https://awentw.com/"], :root a[href^="https://albionsoftwares.com/"], :root a[href^="//postlnk.com/"], :root a[href^="https://affiliate.rusvpn.com/click.php?"], :root a[href^="http://adultfriendfinder.com/p/register.cgi?pid="], :root a[href^="https://www.popads.net/users/"], :root iframe[src^="http://ad.yieldmanager.com/"], :root a[href^="http://pubads.g.doubleclick.net/"], :root a[href^="https://sexdatingz.live/"], :root a[href^="//bwnjijl7w.com/"], :root a[href^="https://adultfriendfinder.com/go/page/landing"], :root a[href*="pussl3.com"], :root a[href^="https://adswick.com/"], :root ADS-RIGHT, :root .GKJYXHBF2 > .GKJYXHBE2 > .GKJYXHBH5, :root a[href^="https://adserver.adreactor.com/"], :root a[href^="https://refpaano.host/"], :root a[href^="https://meet-to-fuck.com/tds"], :root a[href^="https://adhealers.com/"], :root app-advertisement, :root a[href^="https://ad.doubleclick.net/"], :root a[href^="http://zevera.com/afi.html"], :root a[href^="http://go.oclaserver.com/"], :root a[href^="https://ad.atdmt.com/"], :root .trc_rbox .syndicatedItem, :root a[href^="https://aaucwbe.com/"], :root a[href^="https://8a1ccf65f2b1302.com/"], :root a[href^="http://xtgem.com/click?"], :root a[href^="https://ads.trafficpoizon.com/"], :root div[class^="local-feed-banner-ads"], :root a[href^="http://wxdownloadmanager.com/dl/"], :root a[href^="http://www.zergnet.com/i/"], :root a[onmousedown^="this.href='http://staffpicks.outbrain.com/network/redir?"][target="_blank"] + .ob_source, :root a[href^="http://www.usearchmedia.com/signup?"], :root a[href^="http://www.torntv-downloader.com/"], :root a[href^="http://www.tirerack.com/affiliates/"], :root a[href^="http://www.text-link-ads.com/"], :root a[href^="https://weedzy.co.uk/"][href*="&utm_"], :root a[href^="http://pokershibes.com/index.php?ref="], :root a[href^="https://usenetxs.website/"], :root a[href^="https://gghf.mobi/"], :root a[href^="http://www.terraclicks.com/"], :root a[href^="https://ads-for-free.com/click.php?"], :root a[href^="http://www.socialsex.com/"], :root a[onmousedown^="this.href='https://paid.outbrain.com/network/redir?"][target="_blank"], :root a[href^="http://www.sfippa.com/"], :root a[href^="http://www.xmediaserve.com/"], :root a[href^="http://www.sex.com/videos/?utm_"], :root a[href^="http://paid.outbrain.com/network/redir?"], :root a[href^="http://www.sex.com/?utm_"], :root a[href^="http://secure.signup-page.com/"], :root a[href^="http://www.quick-torrent.com/download.html?aff"], :root a[href^="http://ffxitrack.com/"], :root a[href^="https://www.im88trk.com/"], :root a[href^="http://www.pinkvisualgames.com/?revid="], :root a[href^="https://trklvs.com/"], :root a[href^="http://www.paddypower.com/?AFF_ID="], :root a[href^="http://www.onwebcam.com/random?t_link="], :root a[href^="https://go.247traffic.com/"], :root a[href^="http://www.freefilesdownloader.com/"], :root a[href^="http://www.mysuperpharm.com/"], :root .trc_rbox_border_elm .syndicatedItem, :root a[href^="http://www.myfreepaysite.com/sfw_int.php?aid"], :root a[href^="http://www.myfreepaysite.com/sfw.php?aid"], :root .rhsvw[style="background-color:#fff;margin:0 0 14px;padding-bottom:1px;padding-top:1px;"], :root a[href^="http://www.moneyducks.com/"], :root a[href^="http://bcntrack.com/"], :root a[href^="http://www.securegfm.com/"], :root a[href^="http://www.liversely.net/"], :root [href*="//trackmstr.com"], :root [href*="prayuserparka.com/"], :root a[href^="http://www.idownloadplay.com/"], :root a[href^="http://www.hitcpm.com/"], :root a[href^="http://fusionads.net"], :root a[href^="http://www.hibids10.com/"], :root div[class^="awpcp-random-ads"], :root [href*="//securesafemembers.com"], :root a[href^="http://www.graboid.com/affiliates/"], :root a[href^="http://www.gamebookers.com/cgi-bin/intro.cgi?"], :root div[id^="div_openx_ad_"], :root a[href^="http://www.friendlyquacks.com/"], :root a[href^="https://www.financeads.net/tc.php?"], :root a[href^="http://www.friendlyduck.com/AF_"], :root a[href^="https://content.oneindia.com/www/delivery/"], :root a[href^="http://www.fpcTraffic2.com/blind/in.cgi?"], :root a[href^="http://www.flashx.tv/downloadthis"], :root .trc_rbox_div a[target="_blank"][href^="http://tab"], :root a[href^="https://americafirstpolls.com/"], :root a[href^="http://clickserv.sitescout.com/"], :root a[href^="http://www.firstload.de/affiliate/"], :root a[href^="http://www.twinplan.com/AF_"], :root a[href^="http://www.fducks.com/"], :root a[href^="http://www.epicgameads.com/"], :root a[href^="http://www.easydownloadnow.com/"], :root a[href^="http://www.duckssolutions.com/"], :root a[href^="https://go.trkclick2.com/"], :root a[href^="http://go.seomojo.com/tracking202/"], :root a[href^="http://www.downloadweb.org/"], :root a[href^="http://www.down1oads.com/"], :root a[href^="https://trafficmedia.center/"], :root a[href^="http://www.dealcent.com/register.php?affid="], :root .rscontainer > .ellip, :root a[href^="http://www.clkads.com/adServe/"], :root a[href^="http://www.clickansave.net/"], :root a[href^="https://track.interactivegf.com/"], :root div[class^="adpubs-"], :root a[href*="deliver.trafficfabrik.com"], :root a[href^="http://www.cash-duck.com/"], :root a[href^="https://aff-ads.stickywilds.com/"], :root a[href^="http://www.bitlord.me/share/"], :root div[class^="Directory__footerAds"], :root a[href^="http://www.bet365.com/"][href*="?affiliate="], :root a[href^="http://www.bet365.com/"][href*="&affiliate="], :root .grid > .container > #aside-promotion, :root a[href^="http://www.babylon.com/welcome/index?affID"], :root a[onmousedown^="this.href='/wp-content/embed-ad-content/"], :root a[href^="//adbit.co/?a=Advertise&"], :root a[href^="http://popup.taboola.com/"], :root a[href^="https://fast-redirecting.com/"], :root a[href^="http://www.sexgangsters.com/?pid="], :root a[href^="http://www.amazon.co.uk/exec/obidos/external-search?"], :root a[href^="http://go.ad2up.com/"], :root a[href^="https://badoinkvr.com/"], :root a[href*="/adServe/banners?"], :root a[href^="http://www.adxpansion.com"], :root .plistaList > .itemLinkPET, :root a[href^="http://www.adbrite.com/mb/commerce/purchase_form.php?"], :root a[href^="http://www.adultdvdempire.com/?partner_id="][href*="&utm_"], :root a[href^="http://www.ragazzeinvendita.com/?rcid="], :root a[href^="http://www.TwinPlan.com/AF_"], :root a[href^="http://www.123-reg.co.uk/affiliate2.cgi"], :root div[itemtype="http://www.schema.org/WPAdBlock"], :root a[href^="http://wopertific.info/"], :root a[href^="http://bodelen.com/"], :root a[href^="http://wgpartner.com/"], :root a[href^="http://web.adblade.com/"], :root a[href^="https://go.onclasrv.com/"], :root a[href^="http://wct.link/"], :root a[href^="https://topoffers.com/"][href*="/?pid="], :root a[href^="http://vinfdv6b4j.com/"], :root a[href^="http://s9kkremkr0.com/"], :root a[href^="https://www.nutaku.net/signup/landing/"], :root a[href^="http://us.marketgid.com"], :root a[href^="http://ul.to/ref/"], :root a[href^="http://ucam.xxx/?utm_"], :root a[href^="https://adsrv4k.com/"], :root a[href^="http://trk.mdrtrck.com/"], :root a[href^="http://traffic.tc-clicks.com/"], :root a[href^="http://www.liutilities.com/"], :root a[href^="http://www.dl-provider.com/search/"], :root a[href^="http://tc.tradetracker.net/"] > img, :root a[href^="http://tracking.deltamediallc.com/"], :root a[href^="https://iac.ampxdirect.com/"], :root a[href^="http://t.mdn2015x3.com/"], :root div[aria-label="Ads"], :root a[href^="http://axdsz.pro/"], :root a[href^="https://go.ebrokerserve.com/"], :root a[href^="http://galleries.securewebsiteaccess.com/"], :root a[href^="http://stateresolver.link/"], :root a[href^="http://sharesuper.info/"], :root a[href^="https://awecrptjmp.com/"], :root a[href^="http://server.cpmstar.com/click.aspx?poolid="], :root .trc_related_container div[data-item-syndicated="true"], :root a[href^="https://www.firstload.com/affiliate/"], :root a[href^="http://see.kmisln.com/"], :root a[href^="http://secure.vivid.com/track/"], :root a[href^="http://www.downloadthesefiles.com/"], :root a[href^="http://secure.cbdpure.com/aff/"], :root aside[id^="advads_ad_widget-"], :root a[href^="http://lp.ezdownloadpro.info/"], :root a[href^="http://uploaded.net/ref/"], :root a[href^="http://t.mdn2015x1.com/"], :root a[href^="http://azmobilestore.co/"], :root a[href^="http://s5prou7ulr.com/"], :root a[href^="https://affiliates.bet-at-home.com/processing/"], :root a[href^="https://ads.ad4game.com/"], :root a[href^="https://betway.com/"][href*="&a="], :root a[href^="https://easygamepromo.com/ef/custom_affiliate/"], :root a[href^="http://record.betsafe.com/"], :root a[href^="http://mo8mwxi1.com/"], :root a[href^="https://bnsjb1ab1e.com/"], :root a[href^="https://prf.hn/click/"][href*="/creativeref:"], :root a[href^="//oardilin.com/"], :root a[href^="http://pwrads.net/"], :root a[href^="http://promos.bwin.com/"], :root a[href*=".irtyc.com/"], :root a[href^="http://z1.zedo.com/"], :root a[href^="https://bs.serving-sys.com"], :root [href*="wap4dollar.com/"], :root .__y_elastic .__y_item, :root a[href^="https://mcdlks.com/"], :root a[data-redirect^="https://paid.outbrain.com/network/redir?"], :root a[href^="http://play4k.co/"], :root a[href^="http://partner.sbaffiliates.com/"], :root div[id^="ad-gpt-"], :root a[href^="http://pan.adraccoon.com?"], :root a[href*="//ezofferz.com/"], :root a[href^="https://dltags.com/"], :root a[href^="http://onclickads.net/"], :root a[href^="http://n217adserv.com/"], :root a[href^="http://n.admagnet.net/"], :root a[href^="//awejmp.com/"], :root a[href^="http://mob1ledev1ces.com/"], :root a[href^="http://mmo123.co/"], :root div[id^="amzn-assoc-ad"], :root a[href^="https://www.oboom.com/ref/"], :root a[href^="http://media.paddypower.com/redirect.aspx?"], :root a[href^="https://fileboom.me/pr/"], :root a[href^="http://marketgid.com"], :root a[href^="http://liversely.net/"], :root a[href^="https://deliver.ptgncdn.com/"], :root a[href^="http://latestdownloads.net/download.php?"], :root a[href^="http://k2s.cc/code/"], :root a[href^="https://gamescarousel.com/"], :root a[href^="http://istri.it/?"], :root a[href^="http://www.fbooksluts.com/"], :root a[href^="http://www.cdjapan.co.jp/aff/click.cgi/"], :root a[href^="//api.ad-goi.com/"], :root a[href*="//ridingintractable.com/"], :root aside[id^="div-gpt-ad"], :root a[href^="http://c.actiondesk.com/"], :root a[href^="http://intent.bingads.com/"], :root div[id^="crt-"][style], :root a[href^="http://igromir.info/"], :root a[href^="https://track.themadtrcker.com/"], :root a[href^="http://hyperlinksecure.com/go/"], :root a[href^="https://intrev.co/"], :root a[href^="http://https://www.get-express-vpn.com/offer/"], :root .ob_container .item-container-obpd, :root a[href^="http://websitedhoome.com/"], :root a[href^="http://www.adskeeper.co.uk/"], :root a[href^="https://clickadilla.com/"], :root a[href^="http://www.gfrevenge.com/landing/"], :root a[href^="http://45eijvhgj2.com/"], :root a[href^="http://hpn.houzz.com/"], :root a[href^="http://searchtabnew.com/"], :root a[href*="?adlivk="][href*="&refer="], :root a[href^="//look.djfiln.com/"], :root a[href^="http://greensmoke.com/"], :root a[href^="https://look.utndln.com/"], :root a[href^="//5e1fcb75b6d662d.com/"], :root #tads[aria-label], :root a[href^="http://googleads.g.doubleclick.net/pcs/click"], :root aside[itemtype="https://schema.org/WPAdBlock"], :root a[href^="https://watchmygirlfriend.tv/"], :root .nrelate .nr_partner, :root a[href^="http://go.xtbaffiliates.com/"], :root a[href^="http://install.securewebsiteaccess.com/"], :root a[href^="http://www.revenuehits.com/"], :root a[href^="http://go.mobisla.com/"], :root a[href^="//srv.buysellads.com/"], :root a[href^="http://g1.v.fwmrm.net/ad/"], :root .widget-pane-section-result[data-result-ad-type], :root a[href^="http://imads.integral-marketing.com/"], :root a[href^="http://freesoftwarelive.com/"], :root a[href^="http://adtrackone.eu/"], :root a[href^="http://finaljuyu.com/"], :root a[href^="http://fileloadr.com/"], :root a[href^="http://extra.bet365.com/"][href*="?affiliate="], :root a[href^="http://ethfw0370q.com/"], :root [id^="bunyad_ads_"], :root a[href^="http://elitefuckbook.com/"], :root a[href^="http://eclkmpsa.com/"], :root a[href^="http://earandmarketing.com/"], :root a[href*=".mfroute.com/"], :root #content > #center > .dose > .dosesingle, :root a[href^="http://campaign.bharatmatrimony.com/track/"], :root a[href*="3wr110.xyz/"], :root a[href^="http://d2.zedo.com/"], :root a[href^="http://keep2share.cc/pr/"], :root a[href^="https://iqoption.com/lp/mobile-partner/"][href*="?aff="], :root a[href^="http://cp.cbbp1.com"], :root a[href^="http://contractallsticker.net/"], :root a[href^="http://codec.codecm.com/"], :root a[href^="https://paid.outbrain.com/network/redir?"], :root a[href^="http://www.downloadplayer1.com/"], :root a[href^="http://clicks.binarypromos.com/"], :root a[href^="https://dediseedbox.com/clients/aff.php?"], :root a[href^="http://www.wantstraffic.com/"], :root a[href^="http://databass.info/"], :root div[class^="AdCard_"], :root a[href^="http://www.urmediazone.com/signup"], :root a[href^="http://click.plista.com/pets"], :root a[href^="http://chaturbate.com/affiliates/"], :root a[href^="http://www.firstload.com/affiliate/"], :root a[href^="http://www.friendlyadvertisements.com/"], :root a[href^="http://go.fpmarkets.com/"], :root a[href^="//00ae8b5a9c1d597.com/"], :root a[href^="http://cdn3.adbrau.com/"], :root [href^="https://secure.bmtmicro.com/servlets/"], :root a[href^="http://amzn.to/"] > img[src^="data"], :root a[href^="http://bs.serving-sys.com/"], :root a[href^="http://cpaway.afftrack.com/"], :root a[href^="http://cdn.adsrvmedia.net/"], :root [lazy-ad="top_banner"], :root a[href^="http://360ads.go2cloud.org/"], :root a[href^="http://dftrck.com/"], :root a[href^="http://casino-x.com/?partner"], :root a[href^="http://record.sportsbetaffiliates.com.au/"], :root a[href^="http://campeeks.com/"][href*="&utm_"], :root #flowplayer > div[style="position: absolute; width: 300px; height: 275px; left: 222.5px; top: 85px; z-index: 999;"], :root a[href^="http://download-performance.com/"], :root a[href^="http://www.on2url.com/app/adtrack.asp"], :root #\5f _nq__hh[style="display:block!important"], :root div[data-flt-ve="sponsored_search_ads"], :root [href^="https://affect3dnetwork.com/track/"], :root div[class^="index_displayAd_"], :root a[href^="http://adultgames.xxx/"], :root a[href^="http://semi-cod.com/clicks/"], :root a[href^="http://campaign.bharatmatrimony.com/cbstrack/"], :root a[href^="http://xads.zedo.com/"], :root a[href^="http://www.affiliates1128.com/processing/"], :root a[href^="http://c.jumia.io/"], :root a[href^="http://yads.zedo.com/"], :root a[href^="https://bullads.net/get/"], :root a[href^="http://down1oads.com/"], :root a[href^="http://buysellads.com/"], :root a[href^="https://uncensored.game/"], :root a[href^="http://betahit.click/"], :root a[href^="https://torguard.net/aff.php"] > img, :root a[href^="http://bestorican.com/"], :root a[href^="http://bcp.crwdcntrl.net/"], :root a[href^="http://bc.vc/?r="], :root a[href^="http://banners.victor.com/processing/"], :root a[href^="http://affiliate.glbtracker.com/"], :root a[href^="https://transfer.xe.com/signup/track/redirect?"], :root a[href^="http://anonymous-net.com/"], :root a[href^="http://hotcandyland.com/partner/"], :root a[href^="http://affiliates.thrixxx.com/"], :root a[href^="http://affiliates.pinnaclesports.com/processing/"], :root a[href^="http://affiliate.coral.co.uk/processing/"], :root a[href^="http://aff.ironsocket.com/"], :root a[href^="http://adsrv.keycaptcha.com"], :root a[href^="https://secure.adnxs.com/clktrb?"], :root a[href^="http://adserver.adtechus.com/"], :root a[href^="http://adserver.adreactor.com/"], :root a[href^="//go.onclasrv.com/"], :root .GHOFUQ5BG2 > .GHOFUQ5BF2 > .GHOFUQ5BG5, :root #\5f _mom_ad_2, :root a[href^="http://ads.sprintrade.com/"], :root a[href^="https://www.mrskin.com/tour"], :root a[href^="http://adserver.adtech.de/"], :root a[href^="http://cwcams.com/landing/click/"], :root a[href^="http://ads.betfair.com/redirect.aspx?"], :root [id*="MarketGid"], :root #resultspanel > #topads, :root a[href^="http://espn.zlbu.net/"], :root a[href^="http://admrotate.iplayer.org/"], :root a[href^="http://reallygoodlink.extremefreegames.com/"], :root a[href^="http://adlev.neodatagroup.com/"], :root a[href^="http://ad.doubleclick.net/"], :root a[href^="https://k2s.cc/pr/"], :root a[href^="http://ad.au.doubleclick.net/"], :root a[href^="http://srvpub.com/"], :root a[href^="http://a.adquantix.com/"], :root a[href^="http://NowDownloadAll.com"], :root a[href^="http://adtrack123.pl/"], :root ad-desktop-sidebar, :root [id*="MGWrap"], :root a[href^="http://9amq5z4y1y.com/"], :root a[href^="http://1phads.com/"], :root a[href^="https://ismlks.com/"], :root a[href^="//zenhppyad.com/"], :root a[href^="//www.pd-news.com/"], :root [href*=".doubleclick-net.com"], :root a[href^="//www.mgid.com/"], :root a[href^="http://lp.ncdownloader.com/"], :root a[href^="//pubads.g.doubleclick.net/"], :root a[href^="https://www.travelzoo.com/oascampaignclick/"], :root a[href^="https://see.kmisln.com/"], :root a[href^="http://refer.webhostingbuzz.com/"], :root a[onmousedown^="this.href='http://staffpicks.outbrain.com/network/redir?"][target="_blank"], :root a[href^="//nlkdom.com/"], :root a[href^="//medleyads.com/spot/"], :root a[href^="https://ilovemyfreedoms.com/"][href*="?affiliate_id="], :root [href*=".afftracks.online/"], :root div[class^="Component-dfp-"], :root a[href^="//healthaffiliate.center/"], :root .l-container > #fishtank, :root a[href^="http://www.ducksnetwork.com/"], :root a[href^="//go.vedohd.org/"], :root [onclick*="content.ad/"], :root a[href^="https://clixtrac.com/"], :root [href*=".adcampo.com/"], :root a[href^="https://www.oboom.com/ad/"], :root a[href^="//4f6b2af479d337cf.com/"], :root a[href^="//4c7og3qcob.com/"], :root a[href^="https://www.arthrozene.com/"][href*="?tid="], :root a[href^="http://tezfiles.com/pr/"], :root #rhs_block > ol > .rhsvw > .kp-blk > .xpdopen > ._OKe > ol > ._DJe > .luhb-div, :root a[href^=".vddfe.club/"], :root a[href^="https://awejmp.com/"], :root [href*="//go2page.net"], :root a[href^=" http://www.sex.com/"][href*="&utm_"], :root .GPMV2XEDA2 > .GPMV2XEDP1 > .GPMV2XEDJBB, :root a[href*="onclkds."], :root a[href^="https://adclick.g.doubleclick.net/"], :root a[href*=".intab.fun/"], :root a[href*="get-express-vpn.xyz"], :root a[href*="=adscript"], :root #mn #center_col > div > h2.spon:first-child, :root a[href*="=Adtracker"], :root a[href^="http://4c7og3qcob.com/"], :root a[href^="https://trusted-click-host.com/"], :root a[href^="https://members.linkifier.com/public/affiliateLanding?refCode="], :root a[href^="https://jmp.awempire.com/"], :root a[href^="https://track.totalav.com/"], :root a[href^="http://ad-apac.doubleclick.net/"], :root c-wiz[jsrenderer="YnuqN"] > div > div > .Rn1jbe, :root a[href*="/servlet/click/zone?"], :root div[id^="yandex_ad"], :root a[href^="https://www.pornhat.com/"][rel="nofollow"], :root a[href*=".frtyl.com/"], :root a[href^="http://y1jxiqds7v.com/"], :root a[href^="https://www.hotgirls4fuck.com/"], :root a[href^="http://refpaano.host/"], :root a[href*="/cmd.php?ad="], :root a[href^="http://track.trkvluum.com/"], :root a[href^="http://linksnappy.com/?ref="], :root [src^="/Redirect.a2b?"], :root #atvcap + #tvcap > .mnr-c > .commercial-unit-mobile-top, :root a[href*="/adrotate-out.php?"], :root a[href^="https://track.trkinator.com/"], :root div[id^="ad-position-"], :root a[data-redirect^="this.href='http://paid.outbrain.com/network/redir?"], :root a[href^="http://liversely.com/"], :root a[href^="http://www.firstclass-download.com/"], :root a[href*="//bongacams7.com/track?"], :root div[id^="advads-"], :root a[href^="http://www.myfreecams.com/?co_id="][href*="&track="], :root a[href^="https://track.afcpatrk.com/"], :root a[href*=".ad-center.com/"], :root a[href*=".udncoeln.com/"], :root a[href*=".smartadserver.com"], :root .commercial-unit-desktop-rhs > div[jscontroller="YD5eo"], :root .__ywvr .__y_item, :root a[href^="https://farm.plista.com/pets"], :root a[href*=".red90121.com/"], :root a[href^="https://playuhd.host/"], :root .mw > #rcnt > #center_col > #taw > #tvcap > .c, :root a[href*=".purple6401.com/"], :root a[href^="http://www.greenmangaming.com/?tap_a="], :root a[href*=".opskln.com/"], :root div[id^="div_ad_stack_"], :root a[href*=".ichlnk.com/"], :root a[href^="http://a63t9o1azf.com/"], :root a[href*=".axdsz.pro/"], :root a[href^="http://secure.hostgator.com/~affiliat/"], :root [onclick^="window.open('http://adultfriendfinder.com/search/"], :root [href*=".revrtb.com/"], :root .mod > .gws-local-promotions__border, :root div[class^="adUnit_"], :root a[href^="https://deliver.tf2www.com/"], :root a[href^="http://spygasm.com/track?"], :root .ob_dual_right > .ob_ads_header ~ .odb_div, :root [src*="//www.dianomi.com/smartads.epl"], :root a[href*=".adk2x.com/"], :root a[href*=".allsports4you.club"], :root a[href^="https://track.bruceads.com/"], :root div[data-adservice-param-tagid="contentad"], :root #MAIN.ShowTopic > .ad, :root a[href^="https://porngames.adult/?SID="], :root a[href^="http://findersocket.com/"], :root a[href^="https://m.do.co/c/"] > img, :root [href*=".ltroute.com/"], :root div[class*="margin-Advert"], :root #tads + div + .c, :root a[href^="//jsmptjmp.com/"], :root .commercial-unit-mobile-top .jackpot-main-content-container > .UpgKEd + .nZZLFc > .vci, :root a[href^="https://financeads.net/tc.php?"], :root #ssmiwdiv[jsdisplay], :root a[href*=".adform.net/"], :root a[href^="http://duckcash.eu/"], :root a[href^="http://www.mobileandinternetadvertising.com/"], :root a[href^="http://join3.bannedsextapes.com/track/"], :root a[data-widget-outbrain-redirect^="http://paid.outbrain.com/network/redir?"], :root .GB3L-QEDGY .GB3L-QEDF- > .GB3L-QEDE-, :root a[data-url^="http://paid.outbrain.com/network/redir?"] + .author, :root [href*=".jetx.info/"], :root a[href^="http://bestchickshere.com/"], :root div[id^="cns_ads_"], :root a[data-obtrack^="http://paid.outbrain.com/network/redir?"], :root a[href^="http://www.getyourguide.com/?partner_id="], :root [onclick^="window.open('https://www.brazzersnetwork.com/landing/"], :root a[href^="https://vod09197d7.club/"], :root a[href^="http://k2s.cc/pr/"], :root a[href^="http://9nl.es/"], :root #assetsListings[style="display: block;"], :root [onclick^="window.open('window.open('//delivery.trafficfabrik.com/"], :root a[href^="https://keep2share.cc/pr/"], :root a[data-oburl^="http://paid.outbrain.com/network/redir?"], :root a[href^="http://refpa.top/"], :root a[href*="//bongacams.com/track?"], :root a[href^="https://servedbyadbutler.com/"], :root a[href^="https://mob1ledev1ces.com/"], :root a[data-redirect^="http://paid.outbrain.com/network/redir?"], :root a[href^="https://explore.findanswersnow.net/"], :root [id^="adframe_wrap_"], :root a[href^="http://landingpagegenius.com/"], :root a[data-redirect^="http://click.plista.com/pets"], :root .section-subheader > .section-hotel-prices-header, :root [href^="https://go.affiliatexe.com/"], :root a[href^="http://mgid.com/"], :root a[href*=".adsrv.eacdn.com/"] > img, :root [href*="//etracking.pro"], :root a[href^="http://www.fonts.com/BannerScript/"], :root a[href^="http://c.ketads.com/"], :root a[href^="http://6kup12tgxx.com/"], :root a[href^="http://www.badoink.com/go.php?"], :root a[href^="http://www.roboform.com/php/land.php"], :root a[href^="http://online.ladbrokes.com/promoRedirect?"], :root a[href^="//mob1ledev1ces.com/"], :root .ra[width="30%"][align="right"] + table[width="70%"][cellpadding="0"], :root a[href^="http://www.coiwqe.site/"], :root iframe[id^="google_ads_frame"], :root a[href^="http://www.bluehost.com/track/"] > img, :root a[data-url^="http://paid.outbrain.com/network/redir?"], :root a[href*="a2g-secure.com"], :root [href^="http://raboninco.com/"], :root a[href^="https://www.passeura.com/"], :root a[href^="http://www.pinkvisualpad.com/?revid="], :root a[href^="https://www.friendlyduck.com/AF_"], :root [href^="http://advertisesimple.info/"], :root a[href^="http://allaptair.club/"], :root [href*="cadsecs.com/"], :root a[href^="http://adserving.unibet.com/"], :root [href*="//trackout.business"], :root #rhs_block .mod > .luhb-div > div[data-async-type="updateHotelBookingModule"], :root a[href^="http://adclick.g.doubleclick.net/"], :root [href*="//mclick.net"], :root a[href^="http://czotra-32.com/"], :root a[href^="https://scurewall.co/"], :root .commercial-unit-desktop-rhs > .iKidV > .Ee92ae + .P2mpm + .hp3sk, :root div[role="navigation"] + c-wiz > div > .kxhcC, :root a[href^="http://www.download-provider.org/"], :root a[href^="https://www.kingsoffetish.com/tour?partner_id="], :root a[href*=".qertewrt.com/"], :root [href*="//doubleclick-net.com"], :root a[href^="http://deloplen.com/afu.php?zoneid="], :root a[href^="//db52cc91beabf7e8.com/"], :root [id*="ScriptRoot"], :root a[href^="http://partners.etoro.com/"], :root [href*=".xiloy.site/"], :root #topstuff > #tads, :root a[href*=".bang.com/"][href*="&aff="], :root [src^="http://api.lanistaads.com/ServeAd?"], :root a[href^="http://webtrackerplus.com/"], :root a[href^="https://ad13.adfarm1.adition.com/"], :root a[href^="http://clickandjoinyourgirl.com/"], :root div[itemtype="http://schema.org/WPAdBlock"], :root a[href^="https://www.nudeidols.com/cams/"], :root #center_col > #res > #topstuff + #search > div > #ires > #rso > #flun, :root [href*=".trackout.business"], :root .commercial-unit-mobile-top .jackpot-main-content-container > .UpgKEd + .nZZLFc > div > .vci, :root a[href*="delivery.trafficfabrik.com"], :root #ads > .dose > .dosesingle, :root a[href*=".revimedia.com/"], :root #center_col > #taw > #tvcap > .rscontainer, :root [href*=".securesafemembers.com"], :root .gbfwa > div[class$="_item"], :root a[href^="https://goraps.com/"], :root [href*=".etracking.pro"], :root a[href^="http://see-work.info/"], :root .inlineNewsletterSubscription + .inlineNewsletterSubscription div[class$="_item"], :root a[href*=".orange2258.com/"], :root #taw > .med + div > #tvcap > .mnr-c:not(.qs-ic) > .commercial-unit-mobile-top, :root .plista_widget_belowArticleRelaunch_item[data-type="pet"], :root #main-content > [style="padding:10px 0 0 0 !important;"], :root #center_col > #resultStats + div[style="border:1px solid #dedede;margin-bottom:11px;padding:5px 7px 5px 6px"], :root a[href^="http://get.slickvpn.com/"], :root [data-ad-module], :root [href*=".go2page.net"], :root a[href^="http://hd-plugins.com/download/"], :root a[href^="//voyeurhit.com/cs/"], :root a[href^="http://www.afgr3.com/"], :root [ad-id^="googlead"], :root .ra[align="left"][width="30%"], :root a[href^="https://trackjs.com/?utm_source"], :root AFS-AD, :root #center_col > #\5f Emc, :root a[href^="http://ads2.williamhill.com/redirect.aspx?"], :root AD-TRIPLE-BOX, :root .trc_rbox_div .syndicatedItem, :root a[href^="http://www.streamate.com/exports/"], :root [href*="maskip.co/"], :root a[data-oburl^="https://paid.outbrain.com/network/redir?"], :root .icons-rss-feed + .icons-rss-feed div[class$="_item"], :root a[href^="http://aflrm.com/"], :root div[id^="google_dfp_"], :root [href*="get-download.club/"], :root .section-result[data-result-ad-type], :root #mn div[style="position:relative"] > #center_col > div > ._dPg, :root a[href^="https://prf.hn/click/"][href*="/camref:"], :root a[href*="5iclx7wa4q.com"], :root a[href*="//bongacams5.com/track?"], :root FBS-AD, :root a[href*=".clksite.com/"], :root a[href^="http://www.webtrackerplus.com/"], :root .GJJKPX2N1 > .GJJKPX2M1 > .GJJKPX2P4, :root a[href^="http://goldmoney.com/?gmrefcode="], :root a[href^="http://papi.mynativeplatform.com:80/pub2/"], :root LEADERBOARD-AD, :root #mn #center_col > div > h2.spon:first-child + ol:last-child, :root a[href*=".cfm?fp="][href*="&prvtof="], :root a[href*="n47adshostnet.com/"], :root #center_col > #taw > #tvcap > .commercial-unit-desktop-top, :root .plistaList > .plista_widget_underArticle_item[data-type="pet"], :root a[href^="http://servicegetbook.net/"], :root #rhs_block > #mbEnd, :root a[href^="http://cinema.friendscout24.de?"], :root [lazy-ad="lefttop_banner"], :root a[href^="http://www.mrskin.com/tour"], :root .jobs-information-call-to-action + .jobs-information-call-to-action div[class$="_item"], :root a[href^="https://go.hpyjmp.com/"], :root .vi-lb-placeholder[title="ADVERTISEMENT"], :root a[href^="http://www.menaon.com/installs/"], :root a[href^="http://taboola-"][href*="/redirect.php?app.type="], :root .mw > #rcnt > #center_col > #taw > .c, :root .commercial-unit-mobile-top > div[data-pla="1"], :root a[href^="http://api.content.ad/"], :root a[href^="http://adtransfer.net/"], :root a[href*=".clkcln.com/"], :root #rhs_block > script + .c._oc._Ve.rhsvw, :root #\5f _mom_ad_12, :root .__zinit .__y_item, :root .ch[onclick="ga(this,event)"], :root .__ywl .__y_item, :root div[id^="div-ads-"], :root a[onmousedown^="this.href='https://paid.outbrain.com/network/redir?"][target="_blank"] + .ob_source, :root a[href^="http://at.atwola.com/"], :root #center_col > #resultStats + #tads, :root .__yinit .__y_item, :root #center_col > div[style="font-size:14px;margin-right:0;min-height:5px"] > div[style="font-size:14px;margin:0 4px;padding:1px 5px;background:#fff8e7"], :root a[href^="https://secure.cbdpure.com/aff/"], :root AMP-AD, :root iframe[src*="mellowads.com"], :root .__y_inner > .__y_item, :root a[href^="https://affiliate.geekbuying.com/gkbaffiliate.php?"], :root #cnt #center_col > #res > #topstuff > .ts, :root a[href^="https://landing.brazzersnetwork.com/"], :root #cnt #center_col > #taw > #tvcap > .c._oc._Lp, :root a[href*=".trust.zone"], :root div[class^="hp-ad-rect-"], :root a[href^="http://dwn.pushtraffic.net/"], :root a[href$="/vghd.shtml"], :root .GFYY1SVD2 > .GFYY1SVC2 > .GFYY1SVF5, :root a[href^="http://affiliates.score-affiliates.com/"], :root a[href^="https://a.adtng.com/"], :root #rhswrapper > #rhssection[border="0"][bgcolor="#ffffff"], :root .Mpopup + #Mad > #MadZone, :root a[href^="http://ads.expekt.com/affiliates/"], :root a[href^="http://www.streamtunerhd.com/signup?"], :root p[id^="div-gpt-ad-"], :root a[href^="http://fsoft4down.com/"], :root a[href*="ad2upapp.com/"], :root a[href*=".fwd28.com/"], :root [lazy-ad="leftbottom_banner"], :root a[href^="https://www.adxtro.com/"], :root a[href^="http://click.payserve.com/"], :root a[href^="http://serve.williamhill.com/promoRedirect?"], :root [href*=".mclick.net"], :root #center_col > #taw > #tvcap > .cu-container > .commercial-unit-desktop-top, :root a[href*="//promo-bc.com/track?"], :root a[href^="https://sexsimulator.game/tab/?SID="], :root .rc-cta[data-target], :root #rhs_block > .ts[cellspacing="0"][cellpadding="0"][style="padding:0"], :root div[data-ad-underplayer], :root #mbEnd[cellspacing="0"][cellpadding="0"], :root a[href^="http://3wr110.net/"], :root #header + #content > #left > #rlblock_left, :root div[data-subscript="Advertising"], :root div[class$="dealnews"] > .dealnews, :root a[href^="http://t.mdn2015x2.com/"], :root div[id^="rc-widget-"], :root a[href^="http://b.bestcompleteusa.info/"], :root .trc_rbox_div .syndicatedItemUB, :root #center_col > #main > .dfrd > .mnr-c > .c._oc._zs, :root a[href^="http://www.seekbang.com/cs/"], :root a[href^="http://syndication.exoclick.com/"], :root a[href^="http://bluehost.com/track/"], :root a[href^="https://squren.com/rotator/?atomid="], :root div[id^="adspot-"], :root #\5f _admvnlb_modal_container, :root a[href^="//40ceexln7929.com/"], :root #center_col > #resultStats + div + #res + #tads, :root a[href^="//88d7b6aa44fb8eb.com/"], :root a[href^="http://www.afgr2.com/"], :root #mn div[style="position:relative"] > #center_col > ._Ak, :root #tadsb[aria-label], :root a[href*="//bongacams2.com/track?"], :root #center_col > #resultStats + #tads + #res + #tads, :root a[href^="//z6naousb.com/"], :root div[id^="ad_bigbox_"], :root #content > #right > .dose > .dosesingle, :root a[href^="http://t.wowtrk.com/"], :root div[class^="Ad__container"], :root a[href^="http://adprovider.adlure.net/"], :root div[id^="drudge-column-ads-"], :root a[href^="http://tour.mrskin.com/"], :root a[href^="http://rs-stripe.wsj.com/stripe/redirect"], :root #main_col > #center_col div[style="font-size:14px;margin:0 4px;padding:1px 5px;background:#fff7ed"], :root a[data-nvp*="'trafficUrl':'https://paid.outbrain.com/network/redir?"], :root a[href^="http://www.sex.com/pics/?utm_"], :root a[href^="http://vo2.qrlsx.com/"], :root a[href^="http://engine.newsmaxfeednetwork.com/"], :root a[href^="http://ad.yieldmanager.com/"], :root a[href^="http://www.plus500.com/?id="], :root #flowplayer > div[style="z-index: 208; position: absolute; width: 300px; height: 275px; left: 222.5px; top: 85px;"], :root a[href^="https://giftsale.co.uk/?utm_"], :root a[href^="https://syndication.dynsrvtbg.com/splash.php?"] { display: none !important; }</style></head>
<body>
<div id="wrapper">

    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <div class="nav-header">
                <div class="dropdown profile-element">
						<span>
							<img alt="image" class="img" src="/images/netsantral_logo.png" style="width:160px;">
                            						</span>

                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
							<span class="clear">
								<span class="block m-t-xs">
                                    <strong class="font-bold">
                                                                                    UYUMSOFT
                                                                            </strong>
                                </span>
							</span>
                    </a>



                    <span style="cursor: pointer;" onclick="santralStatus();" id="statusSantral" data-toggle="tooltip" data-placement="right" data-container="body" class="badge badge-xs badge-success2" title2="Hizmete Açık Santral" data-original-title="" title="">Aktif Santral</span>
                    <script>
                        function santralStatus() {
                            swal(
                                'Bilgi',
                                'Aktif Santral'
                            )
                        }
                    </script>

                </div>
                <div class="logo-element">
                    <img src="/images/netsantral_logo-icon.png" style="height: 35px">
                </div>
            </div>




            <ul class="nav mb70" id="side-menu">




                <li>

                    <a href="#"><i class="fa fa-line-chart"></i> <span class="nav-label">Dashboard</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li class="active">

                        </li><li>
                            <a href="/home/home"><i class="fa fa-home"></i> <span class="nav-label">Santral İzleme</span></a>
                        </li>

                        <li>
                            <a href="/home/dashboard"><i class="fa fa-home"></i> <span class="nav-label">Santral Dashboard TV</span></a>
                        </li>





                    </ul>
                </li>










                <li>
                    <a href="/istatistik/gun"><i class="fa fa-bar-chart"></i> <span class="nav-label">İstatistik (Gelen Çağrı)</span></a>

                </li>




                <li>
                    <a href="#"><i class="fa fa-line-chart"></i> <span class="nav-label">Gelen Çağrı Analizi</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">

                        <li>
                            <a href="#"><i class="fa fa-calendar"></i>Tarih Bazlı<span class="fa arrow"></span></a>
                            <ul class="nav nav-third-level collapse">
                                <li>
                                    <a href="/istatistik/tarihbazli/adet"><i class="fa fa-delicious"></i> Adet Bazlı</a>
                                </li>
                                <li>
                                    <a href="/istatistik/tarihbazli/sure"><i class="fa fa-clock-o"></i> Süre Bazlı</a>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <a href="#"><i class="fa fa-sitemap"></i>Departman Bazlı<span class="fa arrow"></span></a>
                            <ul class="nav nav-third-level collapse">
                                <li>
                                    <a href="/istatistik/departmanbazli/adet"><i class="fa fa-delicious"></i> Adet Bazlı</a>
                                </li>
                                <li>
                                    <a href="/istatistik/departmanbazli/sure"><i class="fa fa-clock-o"></i> Süre Bazlı</a>
                                </li>
                            </ul>
                        </li>




                        <li>
                            <a href="/istatistik/dahilibazli/adet"><i class="fa fa-user"></i> Dahili Bazlı</a>
                        </li>

                        <li>
                            <a href="/istatistik/dahilibazli/adetpro"><i class="fa fa-user"></i> Dahili Bazlı Detaylı Ist.</a>
                        </li>




                    </ul>
                </li>





                <li>
                    <a href="#"><i class="fa fa-line-chart"></i> <span class="nav-label">Giden Çağrı Analizi</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">

                        <li>
                            <a href="/istatistik/tarihbazligiden/adet"><i class="fa fa-user"></i> Tarih Bazlı Giden </a>
                        </li>

                        <li>
                            <a href="/istatistik/departmanbazligiden/adet"><i class="fa fa-user"></i> Departman Bazlı Giden </a>
                        </li>




                        <li>
                            <a href="/istatistik/dahilibazligiden/adet"><i class="fa fa-user"></i> Dahili Bazlı Giden </a>
                        </li>





                    </ul>
                </li>






                <li>

                    <a href="#"><i class="fa fa-line-chart"></i> <span class="nav-label">Mola Raporları</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li class="active">
                            <a href="#"><i class="fa fa-calendar"></i>Tarih Bazlı<span class="fa arrow"></span></a>
                            <ul class="nav nav-third-level collapse in">
                                <li>
                                    <a href="/istatistik/mola"><i class="fa fa-delicious"></i> Dahili Bazlı Mola Raporu</a>
                                </li>

                            </ul>
                        </li>




                    </ul>
                </li>









                <li class="active">
                    <a href="#"><i class="fa fa-gear"></i> <span class="nav-label">Ayarlar</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse in">


                        <li>
                            <a href="/dahili/">
                                <i class="fa fa-user fa-fw"></i>
                                Dahili Listesi
                            </a>
                        </li>


                        <li class="active">
                            <a href="/departman/">
                                <i class="fa fa-users fa-fw"></i>
                                Departman Listesi
                            </a>
                        </li>






                    </ul>
                </li>









                <li>
                    <a href="#"><i class="fa fa-object-group"></i> <span class="nav-label">Modüller</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li>
                            <a href="/otomatikarama">
                                <i class="fa fa-phone-square fa-fw"></i>
                                Otomatik Arama Modülü
                            </a>
                        </li>
                    </ul>
                </li>












            </ul>




            <div style="position: fixed;bottom: 0;padding-bottom:10px;background-color:#2F4050;text-align: center">
                <div class="profile-element" style="width: 220px;">
                    <img src="/images/netgsm_logo.png" alt="Netgsm" style="height: 50px;">
                </div>
                <div class="logo-element" style="width: 70px">
                    <img src="/images/netgsm_icon.png" alt="Netgsm" height="35">
                </div>
            </div>

        </div>
    </nav>

    <div id="page-wrapper" class="gray-bg" style="min-height: 977px;">

        <!-- Bildirim - Mesajlar-->
        <div class="row">
            <nav class="navbar navbar-static-top white-bg" role="navigation">
                <div class="navbar-header">
                    <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
                </div>

                <ul class="nav navbar-top-links navbar-right">
                    <li>
                        <a href="https://www.netgsm.com.tr/">
                            <i class="fa fa-credit-card"></i> Finansal İşlemler
                        </a>
                    </li>
                    <li>
                        <a href="https://www.netgsm.com.tr/">
                            <i class="fa fa-mail-reply"></i> Webportal
                        </a>
                    </li>
                    <li>

                        <a href="/logout/yonetici"><i class="fa fa-sign-out"></i> Çıkış  <span class="nav-label"> </span></a>

                    </li>
                </ul>

            </nav>
        </div>
        <div id="loadingmessage" style="display:none;margin: 0px; padding: 0px; position: fixed; right: 0px; top: 0px; width: 100%; height: 100%; background-color: rgb(102, 102, 102); z-index: 999999; opacity: 0.8;">
            <div style="color: white; position: absolute; top: 50%; left: 50%;transform: translate(-50%, -50%); display: inline-block;">
                <div class="sk-spinner sk-spinner-double-bounce">
                    <div class="sk-double-bounce1" style="background-color: white;"></div>
                    <div class="sk-double-bounce2" style="background-color: white;"></div>
                </div>
                <br>
                <span style="color: white;" id="loadMessage">İşleminiz gerçekleştiriliyor...</span>
            </div>
        </div>
        <script>
            function loadingMessage(message) {
                $('#loadMessage').html(message);
                $('#loadingmessage').show();
            }
            function closingLoadingMessage() {
                $('#loadingmessage').hide();
            }
            $(document).keyup(function(e) {
                if (e.keyCode == 27) {
                    $('#loadingmessage').hide();
                }
            });


        </script>

        <div class="panel panel-success">

            <div class="panel-heading">Departman Düzenleme Formu</div>
            <div class="panel-body pan">
                <form onsubmit="return kontrol()" action="/departman/update/3" method="post" class="form-horizontal formvalidate" novalidate="novalidate">
                    <input type="hidden" name="hariciSayisi" id="hariciSayisi" value="1">
                    <input type="hidden" name="_method" value="PUT">

                    <div class="form-body pal">


                        <div class="form-group">
                            <label for="departman_no" class="col-md-3 control-label">
                                Departman No <span class="require">*</span>
                            </label>
                            <div class="col-md-9">
                                <input id="departman_no" type="text" onkeypress="return sadecesayi(this, event);" name="no" value="7100" placeholder="Departman No " class="form-control" min="0" required="" minlength="1" maxlength="5" aria-required="true">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="departman_adi" class="col-md-3 control-label">
                                Departman Adı <span class="require">*</span>
                            </label>
                            <div class="col-md-9">
                                <input id="departman_adi" onkeyup="trKarakterTemizle(this);" type="text" name="name" value="Free" placeholder="Departman Adı (Örn: Muhasebe)" class="form-control" data-rule-alphanumeric="input[name=name]" data-msg-alphanumeric="Sadece türkçe karakter olmayan harf ve rakam girebilirsiniz." required="" maxlength="20" disabled="" aria-required="true">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="departman_suresi" class="col-md-3 control-label">
                                Çalma Süresi <span class="require">*</span>
                                <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="right" title="" data-html="true" data-original-title="Departmanda kayıtlı olan numaraların çalma süresidir."></i>
                            </label>
                            <div class="col-md-9">
                                <select name="timeout" id="calma_suresi" required="" class="form-control" aria-required="true">
                                    <option value="5">5 sn</option>
                                    <option value="10">10 sn</option>
                                    <option value="15">15 sn</option>
                                    <option value="20">20 sn</option>
                                    <option value="25">25 sn</option>
                                    <option value="30" selected="">30 sn</option>
                                    <option value="35">35 sn</option>
                                    <option value="40">40 sn</option>
                                    <option value="45">45 sn</option>
                                    <option value="50">50 sn</option>
                                    <option value="55">55 sn</option>
                                    <option value="60">1 dk</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-6 col-md-5 col-md-offset-2">
                            <div class="page-header" style="margin-top: 10px">
                                <h4>Dahili Ekle</h4>
                            </div>
                            <span class="errorgoster help-block" style="color: #a94442;display: none">Departman Kaydı Oluşturmak için Dahili ya da Harici Numara Eklemelisiniz.</span>

                            <table class="table table-bordered table-striped table-hover">
                                <thead>
                                <tr>
                                    <th>Dahili No <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="right" title="" data-html="true" data-original-title="Sadece seçili olan dahililer gelen çağrıları karşılayacaktır."></i></th>
                                    <th>Öncelik <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="left" title="" data-html="true" data-original-title="Çağrıların numaralara dağıtımı sırasındaki önceliği belirler.<br> Düşük değerler yüksek önceliğe sahiptir.<br>birdern fazla numara aynı önceliğe sahip olabilir.<br>Dahili numaralarda ve harici numaralarda belirlemiş olduğunuz öncelikler birbirini etkilemektedir."></i></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green checked" style="position: relative;"><input type="checkbox" name="dahili[497]" class="dahililer" value="497" checked="" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3000 ( Zeliha Murat  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[497]" class="form-control" required="" aria-required="true">
                                            <option value="1" selected="">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label class="">
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[2]" class="dahililer" value="2" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3001 ( Arzu Akbas  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[2]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[3]" class="dahililer" value="3" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3002 ( Ceren Kasimoglu       )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[3]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[5]" class="dahililer" value="5" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3004 ( Hayriye Coban  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[5]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[6]" class="dahililer" value="6" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3005 ( Irem Ogredici  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[6]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[7]" class="dahililer" value="7" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3006 ( Ozge Kasar  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[7]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[8]" class="dahililer" value="8" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3007 ( Sena Hosken  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[8]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[9]" class="dahililer" value="9" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3008 ( Merve Ozer  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[9]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[10]" class="dahililer" value="10" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3009 ( Nuri Yilmaz  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[10]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green checked" style="position: relative;"><input type="checkbox" name="dahili[11]" class="dahililer" value="11" checked="" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3010 ( Nurcan Korkilinc  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[11]" class="form-control" required="" aria-required="true">
                                            <option value="1" selected="">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[12]" class="dahililer" value="12" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3011 ( Melike Melek  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[12]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[13]" class="dahililer" value="13" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3012 ( Melike Durmaz  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[13]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[456]" class="dahililer" value="456" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3013 ( Merve Sagman  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[456]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[15]" class="dahililer" value="15" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3014 ( Cavidan Oz  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[15]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[453]" class="dahililer" value="453" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3015 ( Esra Kaya  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[453]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[454]" class="dahililer" value="454" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3016 ( Zeynepnur Oz  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[454]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[455]" class="dahililer" value="455" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3017 ( Kubra Batur   )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[455]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green checked" style="position: relative;"><input type="checkbox" name="dahili[19]" class="dahililer" value="19" checked="" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3018 ( Seda Sahin  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[19]" class="form-control" required="" aria-required="true">
                                            <option value="1" selected="">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[20]" class="dahililer" value="20" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3019 ( Ebru Hatipoglu  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[20]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green checked" style="position: relative;"><input type="checkbox" name="dahili[21]" class="dahililer" value="21" checked="" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3020 ( Imran Isen  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[21]" class="form-control" required="" aria-required="true">
                                            <option value="1" selected="">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green checked" style="position: relative;"><input type="checkbox" name="dahili[22]" class="dahililer" value="22" checked="" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3021 ( Faruk Ozerzurumlu  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[22]" class="form-control" required="" aria-required="true">
                                            <option value="1" selected="">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[23]" class="dahililer" value="23" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3022 ( Hande Saracoglu  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[23]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[495]" class="dahililer" value="495" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3023 ( Ozlem Cakir   )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[495]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[25]" class="dahililer" value="25" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3024 ( Kubra Genc  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[25]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[534]" class="dahililer" value="534" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3025 ( Esra Yildiz    )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[534]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[438]" class="dahililer" value="438" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3026 ( Erdem Karatepe  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[438]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[28]" class="dahililer" value="28" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3027 ( Omer Bayram  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[28]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[467]" class="dahililer" value="467" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3028 ( Elif Sengonul   )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[467]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green checked" style="position: relative;"><input type="checkbox" name="dahili[30]" class="dahililer" value="30" checked="" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3029 ( Havvanur Bilmez  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[30]" class="form-control" required="" aria-required="true">
                                            <option value="1" selected="">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[31]" class="dahililer" value="31" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3030 ( Ahmet Ozkiraz  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[31]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[32]" class="dahililer" value="32" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3031 ( Betul Onari  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[32]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[33]" class="dahililer" value="33" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3032 ( Merve Onder   )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[33]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[34]" class="dahililer" value="34" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3033 ( Gulden Durgun  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[34]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green checked" style="position: relative;"><input type="checkbox" name="dahili[35]" class="dahililer" value="35" checked="" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3034 ( Funda Asantugrul  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[35]" class="form-control" required="" aria-required="true">
                                            <option value="1" selected="">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[36]" class="dahililer" value="36" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3035 ( Elif Percin   )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[36]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[37]" class="dahililer" value="37" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3036 ( Ebru Agac  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[37]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[38]" class="dahililer" value="38" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3037 ( Salih Isler  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[38]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[457]" class="dahililer" value="457" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3038 ( Tarik Dag  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[457]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green checked" style="position: relative;"><input type="checkbox" name="dahili[41]" class="dahililer" value="41" checked="" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3040 ( Aslihan Yilmaz  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[41]" class="form-control" required="" aria-required="true">
                                            <option value="1" selected="">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[42]" class="dahililer" value="42" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3041 ( Muhammet Dogan  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[42]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[43]" class="dahililer" value="43" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3042 ( Enes Karakus  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[43]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[44]" class="dahililer" value="44" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3043 ( Samil Gokce  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[44]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[451]" class="dahililer" value="451" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3044 ( Seda Dizman     )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[451]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[46]" class="dahililer" value="46" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3045 ( Sibel Mavzer  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[46]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[47]" class="dahililer" value="47" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3046 ( Cemal Erdem  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[47]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green checked" style="position: relative;"><input type="checkbox" name="dahili[49]" class="dahililer" value="49" checked="" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3048 ( Ali Candar   )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[49]" class="form-control" required="" aria-required="true">
                                            <option value="1" selected="">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[393]" class="dahililer" value="393" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3049 ( Sukran Demir  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[393]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[51]" class="dahililer" value="51" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3050 ( Ayse Kaya  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[51]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[52]" class="dahililer" value="52" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3051 ( Elem Yilmaz  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[52]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green checked" style="position: relative;"><input type="checkbox" name="dahili[53]" class="dahililer" value="53" checked="" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3052 ( Sefa Guven  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[53]" class="form-control" required="" aria-required="true">
                                            <option value="1" selected="">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[390]" class="dahililer" value="390" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3053 ( Berat Karakaplan  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[390]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[391]" class="dahililer" value="391" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3054 ( Mehmet Cicek  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[391]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[443]" class="dahililer" value="443" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3055 ( Hatice Tor  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[443]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[57]" class="dahililer" value="57" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3056 ( Sila Pelit  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[57]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[431]" class="dahililer" value="431" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3057 ( Gulcin Barbak  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[431]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[468]" class="dahililer" value="468" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3058 ( Huseyin Bayram  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[468]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[444]" class="dahililer" value="444" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3059 ( Musa Gunay  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[444]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[61]" class="dahililer" value="61" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3060 ( Hacer Varazli  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[61]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[445]" class="dahililer" value="445" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3061 ( Basak Unlu  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[445]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[63]" class="dahililer" value="63" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3062 ( Busra Demirtas  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[63]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[64]" class="dahililer" value="64" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3063 ( Koray Inan  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[64]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[66]" class="dahililer" value="66" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3065 ( Mert Alparslan  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[66]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[446]" class="dahililer" value="446" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3066 ( Cigdem Urgen  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[446]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green checked" style="position: relative;"><input type="checkbox" name="dahili[68]" class="dahililer" value="68" checked="" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3067 ( Yunus Simsek  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[68]" class="form-control" required="" aria-required="true">
                                            <option value="1" selected="">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[69]" class="dahililer" value="69" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3068 ( Eren Karatas  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[69]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[70]" class="dahililer" value="70" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3069 ( Seda Dalkiran  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[70]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[71]" class="dahililer" value="71" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3070 ( Cansu Yildiz  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[71]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[469]" class="dahililer" value="469" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3071 ( Kubranur Peksen  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[469]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[73]" class="dahililer" value="73" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3072 ( Mahmut Yakan  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[73]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[126]" class="dahililer" value="126" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3074 ( Beyza Islekli  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[126]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[76]" class="dahililer" value="76" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3075 ( Esma Cevirgen   )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[76]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[77]" class="dahililer" value="77" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3076 ( Resit Colkesen  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[77]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[78]" class="dahililer" value="78" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3077 ( Sumeyye Sarihan  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[78]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[79]" class="dahililer" value="79" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3078 ( Aysenur Zeren  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[79]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[80]" class="dahililer" value="80" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3079 ( Hikmet Sahin  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[80]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[81]" class="dahililer" value="81" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3080 ( Esra Sanli       )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[81]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[82]" class="dahililer" value="82" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3081 ( Seher Akin  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[82]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[83]" class="dahililer" value="83" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3082 ( Mina Percin  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[83]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[84]" class="dahililer" value="84" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3083 ( Bilge Koc  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[84]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[85]" class="dahililer" value="85" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3084 ( Turgay Karakoc  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[85]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[128]" class="dahililer" value="128" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3085 ( Derya Dogan  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[128]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[87]" class="dahililer" value="87" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3086 ( Ugur Gok  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[87]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[514]" class="dahililer" value="514" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3087 ( Fatma Deligonul  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[514]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[518]" class="dahililer" value="518" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3090 ( Meral Uresin  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[518]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green checked" style="position: relative;"><input type="checkbox" name="dahili[94]" class="dahililer" value="94" checked="" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3093 ( Songul Kas  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[94]" class="form-control" required="" aria-required="true">
                                            <option value="1" selected="">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[95]" class="dahililer" value="95" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3094 ( Sumeyye Saglam  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[95]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[100]" class="dahililer" value="100" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3099 ( Merve Colak       )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[100]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[101]" class="dahililer" value="101" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3100 ( Irem Cerioglu  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[101]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[470]" class="dahililer" value="470" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3102 ( Mehmet Tutuncu   )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[470]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[104]" class="dahililer" value="104" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3103 ( Aleyna Gurbuz  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[104]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[471]" class="dahililer" value="471" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3104 ( Muhammed Batur   )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[471]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[106]" class="dahililer" value="106" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3105 ( Caner Ocak  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[106]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[472]" class="dahililer" value="472" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3106 ( Taha Zeren   )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[472]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[110]" class="dahililer" value="110" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3109 ( Merve Yenal  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[110]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[111]" class="dahililer" value="111" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3110 ( Mucahit Boztepe  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[111]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[480]" class="dahililer" value="480" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3113 ( Merve Akyel  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[480]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[481]" class="dahililer" value="481" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3114 ( Sulbiye Yaman  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[481]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[159]" class="dahililer" value="159" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3115 ( Furkan Haskologlu  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[159]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[482]" class="dahililer" value="482" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3116 ( Rabia Karatas  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[482]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[120]" class="dahililer" value="120" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3117 ( Ahmet Albayrak  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[120]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[122]" class="dahililer" value="122" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3118 ( Aylin Acim  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[122]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[483]" class="dahililer" value="483" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3119 ( Filiz Tadik  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[483]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[125]" class="dahililer" value="125" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3120 ( Alperen Yildiz  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[125]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[484]" class="dahililer" value="484" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3122 ( Bahadir Hatipoglu  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[484]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[134]" class="dahililer" value="134" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3124 ( Ebru Yurtbay  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[134]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[486]" class="dahililer" value="486" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3125 ( Ejder Celbis  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[486]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[496]" class="dahililer" value="496" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3127 ( Nagihan Acikgoz  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[496]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[139]" class="dahililer" value="139" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3129 ( Cansu Keles  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[139]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[487]" class="dahililer" value="487" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3130 ( Selin Yavuz  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[487]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[355]" class="dahililer" value="355" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3131 ( Belma Baser  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[355]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[142]" class="dahililer" value="142" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3132 ( Elif Uzamis  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[142]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[143]" class="dahililer" value="143" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3133 ( Esra Ozgen  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[143]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green checked" style="position: relative;"><input type="checkbox" name="dahili[489]" class="dahililer" value="489" checked="" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3134 ( Metin Onder  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[489]" class="form-control" required="" aria-required="true">
                                            <option value="1" selected="">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[491]" class="dahililer" value="491" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3135 ( Muzaffer Yuce   )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[491]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[492]" class="dahililer" value="492" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3137 ( Ozan Erdem  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[492]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[354]" class="dahililer" value="354" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3138 ( Nafiye Aksoz  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[354]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[493]" class="dahililer" value="493" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3139 ( Ayse Sezgin  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[493]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[494]" class="dahililer" value="494" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3140 ( Merve Tasci   )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[494]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[151]" class="dahililer" value="151" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3141 ( Burcu Serin  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[151]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[490]" class="dahililer" value="490" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3142 ( Asude Ay  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[490]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[153]" class="dahililer" value="153" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3143 ( Burcu Yilmaz  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[153]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[154]" class="dahililer" value="154" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3144 ( Esra Altun  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[154]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[166]" class="dahililer" value="166" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3149 ( Ecem Yildiz  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[166]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[161]" class="dahililer" value="161" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3150 ( Ayse Polat  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[161]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[162]" class="dahililer" value="162" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3151 ( Caner Durmaz  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[162]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[163]" class="dahililer" value="163" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3152 ( Elif Ozsayin  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[163]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[167]" class="dahililer" value="167" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3155 ( Hamide Has  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[167]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[170]" class="dahililer" value="170" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3158 ( Onur Yurekli  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[170]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[171]" class="dahililer" value="171" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3159 ( Seda Altun  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[171]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[182]" class="dahililer" value="182" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3170 ( Nurullah Alisik  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[182]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[180]" class="dahililer" value="180" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3171 ( Selva Orhanoglu  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[180]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green checked" style="position: relative;"><input type="checkbox" name="dahili[184]" class="dahililer" value="184" checked="" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3175 ( Ozge Guler  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[184]" class="form-control" required="" aria-required="true">
                                            <option value="1" selected="">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green checked" style="position: relative;"><input type="checkbox" name="dahili[192]" class="dahililer" value="192" checked="" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3181 ( Nurettin Ezer  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[192]" class="form-control" required="" aria-required="true">
                                            <option value="1" selected="">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[452]" class="dahililer" value="452" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3216 ( Ali Artuvan  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[452]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green checked" style="position: relative;"><input type="checkbox" name="dahili[226]" class="dahililer" value="226" checked="" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3218 ( Yusuf Onder   )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[226]" class="form-control" required="" aria-required="true">
                                            <option value="1" selected="">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[237]" class="dahililer" value="237" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3219 ( Mukaddes Konak  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[237]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[240]" class="dahililer" value="240" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3220 ( Ozlem Ikiz      )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[240]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[356]" class="dahililer" value="356" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3221 ( Ayse Ozavci  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[356]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[357]" class="dahililer" value="357" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3222 ( Aysegul Karahan  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[357]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[358]" class="dahililer" value="358" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3223 ( Damla Cetinkaya  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[358]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[359]" class="dahililer" value="359" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3224 ( Ebubekir Varlioglu  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[359]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[360]" class="dahililer" value="360" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3225 ( Ertugrul Firat  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[360]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[361]" class="dahililer" value="361" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3226 ( Esra Bilici   )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[361]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[362]" class="dahililer" value="362" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3227 ( Gurkan Gultekin  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[362]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[363]" class="dahililer" value="363" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3228 ( Ibrahim Sari  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[363]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[364]" class="dahililer" value="364" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3229 ( Maide Timur  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[364]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[365]" class="dahililer" value="365" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3230 ( Onur Sahin  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[365]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[366]" class="dahililer" value="366" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3231 ( Rabia Kilic  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[366]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green checked" style="position: relative;"><input type="checkbox" name="dahili[351]" class="dahililer" value="351" checked="" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3232 ( Fazli Akca  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[351]" class="form-control" required="" aria-required="true">
                                            <option value="1" selected="">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[367]" class="dahililer" value="367" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3233 ( Rabia Koc  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[367]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[368]" class="dahililer" value="368" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3234 ( Serkan Ozturkmen  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[368]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[369]" class="dahililer" value="369" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3235 ( Talha Can  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[369]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[370]" class="dahililer" value="370" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3236 ( Tugce Kirteke  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[370]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[372]" class="dahililer" value="372" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3238 ( Yaren Akpinar  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[372]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[373]" class="dahililer" value="373" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3239 ( Tarik Dag  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[373]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[374]" class="dahililer" value="374" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3240 ( Ali Seydi Aydin  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[374]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[375]" class="dahililer" value="375" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3241 ( Mirac Uymaz  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[375]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[376]" class="dahililer" value="376" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3242 ( Nevzat Kaya  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[376]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[377]" class="dahililer" value="377" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3243 ( Murat Inanc  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[377]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[378]" class="dahililer" value="378" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3244 ( Omer Ergul  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[378]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[379]" class="dahililer" value="379" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3245 ( Songul Keles  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[379]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[380]" class="dahililer" value="380" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3246 ( Merve Basar  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[380]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[381]" class="dahililer" value="381" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3247 ( Gulay Otman  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[381]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[382]" class="dahililer" value="382" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3248 ( Melih Akdemir  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[382]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[383]" class="dahililer" value="383" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3249 ( Ayberk Soybar  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[383]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[384]" class="dahililer" value="384" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3250 ( Burak Barlik  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[384]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[385]" class="dahililer" value="385" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3251 ( Fatma Celik  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[385]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[386]" class="dahililer" value="386" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3252 ( Tugce Ozer  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[386]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[389]" class="dahililer" value="389" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3255 ( Ramazan Oztemur  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[389]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[394]" class="dahililer" value="394" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3256 ( Sadik Kahyaoglu  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[394]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[395]" class="dahililer" value="395" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3257 ( Berivan Kizilcan  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[395]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[396]" class="dahililer" value="396" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3258 ( Mine Onder  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[396]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[398]" class="dahililer" value="398" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3259 ( Mustafa Alipasaoglu  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[398]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[400]" class="dahililer" value="400" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3260 ( Mehmet Onder  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[400]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[399]" class="dahililer" value="399" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3261 ( Esra Sallabas  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[399]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[402]" class="dahililer" value="402" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3262 ( Merve Uz  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[402]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[403]" class="dahililer" value="403" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3263 ( Volkan Cavusoglu  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[403]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[404]" class="dahililer" value="404" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3264 ( Mesut Numanoglu  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[404]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[411]" class="dahililer" value="411" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3265 ( Ilker Poyraz  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[411]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[405]" class="dahililer" value="405" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3266 ( Yesim Cicek  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[405]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[407]" class="dahililer" value="407" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3267 ( Ozan Erdem  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[407]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[408]" class="dahililer" value="408" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3268 ( Serhad Erdem  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[408]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[409]" class="dahililer" value="409" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3269 ( Tarik Dag  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[409]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[401]" class="dahililer" value="401" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3270 ( Ozkan Metin  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[401]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[397]" class="dahililer" value="397" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3271 ( Zeliha Murat  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[397]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[412]" class="dahililer" value="412" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3272 ( Fatma Polat  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[412]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[413]" class="dahililer" value="413" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3273 ( Bulent Sari  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[413]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[414]" class="dahililer" value="414" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3274 ( Mehmet Gedik  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[414]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[415]" class="dahililer" value="415" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3275 ( Ahmet Yildirim  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[415]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[416]" class="dahililer" value="416" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3276 ( Andac Aytac  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[416]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[417]" class="dahililer" value="417" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3277 ( Yigitcan Akpinar  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[417]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[418]" class="dahililer" value="418" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3278 ( Oznur Demircioglu  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[418]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[420]" class="dahililer" value="420" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3279 ( Sinan Demir  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[420]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[419]" class="dahililer" value="419" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3280 ( Ferhat Zengin  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[419]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[421]" class="dahililer" value="421" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3281 ( Sevtap Turanci  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[421]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[422]" class="dahililer" value="422" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3282 ( Hale Urun  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[422]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[423]" class="dahililer" value="423" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3283 ( Salim Demiray  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[423]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[424]" class="dahililer" value="424" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3284 ( Merve Tasci  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[424]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[425]" class="dahililer" value="425" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3285 ( Ayse Sezgin  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[425]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[426]" class="dahililer" value="426" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3286 ( Emrah Demirbas  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[426]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[427]" class="dahililer" value="427" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3287 ( Barbaros Sezgun  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[427]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[428]" class="dahililer" value="428" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3288 ( Nevzat Bakirci  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[428]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[429]" class="dahililer" value="429" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3289 ( Erhun Ocal  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[429]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[430]" class="dahililer" value="430" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3290 ( Ercan Oztemel  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[430]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[450]" class="dahililer" value="450" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3291 ( Anil Sevener  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[450]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[458]" class="dahililer" value="458" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3292 ( Ersin Cebeci  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[458]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[460]" class="dahililer" value="460" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3294 ( Arzu Buse Celen  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[460]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[498]" class="dahililer" value="498" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3295 ( Firdevs Yeke   )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[498]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[499]" class="dahililer" value="499" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3296 ( Ruveyda Deger   )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[499]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[500]" class="dahililer" value="500" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3297 ( Sefa Alkurt   )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[500]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[501]" class="dahililer" value="501" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3298 ( Isilay Bakdur  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[501]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[232]" class="dahililer" value="232" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3299 ( testnetg     )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[232]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[392]" class="dahililer" value="392" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3300 ( Emine Donmez    )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[392]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[502]" class="dahililer" value="502" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3301 ( Mehmet Demirci  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[502]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[503]" class="dahililer" value="503" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3302 ( Erkan Gul  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[503]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[504]" class="dahililer" value="504" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3303 ( Nida Akinci  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[504]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[505]" class="dahililer" value="505" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3304 ( Sefa Canpolat  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[505]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[506]" class="dahililer" value="506" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3305 ( Sezer Guler  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[506]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[507]" class="dahililer" value="507" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3306 ( Fatime Yukkaldiran  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[507]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[508]" class="dahililer" value="508" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3307 ( Cagla Danaci  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[508]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[509]" class="dahililer" value="509" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3308 ( Ozal Uzun  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[509]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[510]" class="dahililer" value="510" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3309 ( Enes Akkaya  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[510]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[511]" class="dahililer" value="511" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3310 ( Muhammet Demirtas  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[511]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[512]" class="dahililer" value="512" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3311 ( Mehmet Canbay  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[512]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[513]" class="dahililer" value="513" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3312 ( Ali Colak  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[513]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[410]" class="dahililer" value="410" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3360 ( Faruk Ozer  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[410]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[479]" class="dahililer" value="479" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3361 ( Kubra Peksen  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[479]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[515]" class="dahililer" value="515" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3362 ( Merve Beyhan  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[515]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[516]" class="dahililer" value="516" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3363 ( Gulce Karabacak  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[516]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[517]" class="dahililer" value="517" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3364 ( Kubra Sevinc  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[517]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[519]" class="dahililer" value="519" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3365 ( Elif Ozcan  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[519]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[521]" class="dahililer" value="521" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3366 ( Timur Kadakal  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[521]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[522]" class="dahililer" value="522" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3367 ( Ozge Nur Kayhan  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[522]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[523]" class="dahililer" value="523" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3368 ( Husna Karaduman  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[523]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[524]" class="dahililer" value="524" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3369 ( Ayse Orhaner  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[524]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[525]" class="dahililer" value="525" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3370 ( Cuneyt Yuceer  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[525]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[526]" class="dahililer" value="526" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3371 ( Cansu Lale  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[526]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[527]" class="dahililer" value="527" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3372 ( Ismail Polat  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[527]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[528]" class="dahililer" value="528" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3373 ( Leyla Ercan  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[528]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[529]" class="dahililer" value="529" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3374 ( Yasemin Ayhan  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[529]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[530]" class="dahililer" value="530" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3375 ( Melisa Cakmak  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[530]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[531]" class="dahililer" value="531" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3376 ( Seda Yildiz  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[531]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[532]" class="dahililer" value="532" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3377 ( Berat Ozcan  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[532]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[533]" class="dahililer" value="533" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3378 ( Sena Turgut   )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[533]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[536]" class="dahililer" value="536" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3380 ( Irem Soygan   )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[536]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[537]" class="dahililer" value="537" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3381 ( Sevval Beken       )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[537]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[538]" class="dahililer" value="538" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3382 ( Mehmet Bayraktar   )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[538]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[539]" class="dahililer" value="539" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3383 ( Pelin Yildiz   )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[539]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[540]" class="dahililer" value="540" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3384 ( Merve Talu   )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[540]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[541]" class="dahililer" value="541" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3385 ( Aysegul Somuncu   )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[541]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[542]" class="dahililer" value="542" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 3386 ( Bahar Arslantas  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[542]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[485]" class="dahililer" value="485" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 9368 ( test88  )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[485]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[231]" class="dahililer" value="231" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 9966 ( testnetgsm2   )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[231]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="padding-left: 40px;padding-right: 20px;margin-bottom: 0">
                                            <div class="i-checks">
                                                <label>
                                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="dahili[119]" class="dahililer" value="119" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 9999 ( NetgsmTestDahili   )
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="dahili_oncelik[119]" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-xs-12 col-sm-6  col-md-5 ">
                            <div class="page-header" style="margin-top: 10px">
                                <h4>Harici Numara Ekle</h4>
                            </div>
                            <span class="errorgoster help-block" style="color: #a94442;display: none">Departman Kaydı Oluşturmak için Dahili ya da Harici Numara Eklemelisiniz.</span>
                            <table class="table table-bordered table-striped table-hover">
                                <thead>
                                <tr>
                                    <th>Harici No <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="right" title="" data-html="true" data-original-title="Dahililerin yanı sıra gelen çağrıları karşılamasını istediğiniz harici numaraları burada ekleyebilirsiniz."></i></th>
                                    <th>Öncelik <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="left" title="" data-html="true" data-original-title="Çağrıların numaralara dağıtımı sırasındaki önceliği belirler.<br> Düşük değerler yüksek önceliğe sahiptir.<br>Birden fazla numara aynı önceliğe sahip olabilir.<br>Dahili numaralarda ve harici numaralarda belirlemiş olduğunuz öncelikler birbirini etkilemektedir."></i></th>
                                    <td align="center">
                                        <i class="fa fa-plus" style="color: green;" onclick="ekle()"></i>
                                    </td>
                                </tr>
                                </thead>
                                <tbody id="harici_alanlar">
                                <tr id="harici_alan_1">
                                    <td>
                                        <div class="form-group" style="padding-left: 20px;padding-right: 20px;margin-bottom: 0">

                                            <input type="text" onchange="return sadecesayi(this, event);" onkeypress="return sadecesayi(this, event);" name="harici_no_1" class="form-control harici_nolar" minlength="11" maxlength="22" placeholder="Örn: 0XXXXXXXXXX" value="">



                                        </div>
                                    </td>
                                    <td width="100">
                                        <select name="harici_oncelik_1" class="form-control" required="" aria-required="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                    <td align="center">
                                        <i class="fa fa-times" style="color: red;" onclick="sil(1)"></i>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="clearfix"></div>

                        <div class="form-group">
                            <label for="giris_anonsu" class="col-md-3 control-label">
                                Giriş Anonsu <span class="require">*</span>
                            </label>
                            <div class="col-md-9">
                                <select name="joinannouncement" id="joinannouncement" required="" class="form-control" aria-required="true">
                                    <option value="0">Seçiniz</option>
                                    <option value="16">uyumsoftankara.wav</option>
                                    <option value="17">uyumsoftbursa.wav</option>
                                    <option value="19">uyumsoftdetay.wav</option>
                                    <option value="20">uyumsoftizmir.wav</option>
                                    <option value="21">uyumsoftkuyruktimeout.wav</option>
                                    <option value="22" selected="">uyumsoftkvkk.wav</option>
                                    <option value="23">uyumsoftmesaidisi.wav</option>
                                    <option value="24">uyumsofttokat.wav</option>
                                    <option value="25">uyumsoftyanlissecim.wav</option>
                                    <option value="30">teknik_destek.wav</option>
                                    <option value="31">sosyal_medya.wav</option>
                                    <option value="32">eko_sound_new.wav</option>
                                    <option value="33">BursaMenu.wav</option>
                                    <option value="35">izmirMenu.wav</option>
                                    <option value="36">tokatMenu.wav</option>
                                    <option value="39">FinansKurBirAnamenu.wav</option>
                                    <option value="41">eserbest_avukat.wav</option>
                                    <option value="42">mesai_disi.wav</option>
                                    <option value="43">meslek_gruplar.wav</option>
                                    <option value="51">yeni_defter_menu2.wav</option>
                                    <option value="52">yeni_hesap_acilis2.wav</option>
                                    <option value="57">cazei_islem_eirsaliye.wav</option>
                                    <option value="58">hesap_acilis_satis_temsilcisi.wav</option>
                                    <option value="60">ekocari_anons.wav</option>
                                    <option value="61">iuyum_entegrasyon_anons.wav</option>
                                    <option value="62">iuyum_anons.wav</option>
                                    <option value="63">edefter_anons.wav</option>
                                    <option value="64">ebelge_anons.wav</option>
                                    <option value="65">garantibank_IBAN.wav</option>
                                    <option value="66">isbank_IBAN.wav</option>
                                    <option value="67">ziraatbank_IBAN.wav</option>
                                    <option value="68">odeme_bilgi.wav</option>
                                    <option value="69">muhasebe_new.wav</option>
                                    <option value="70">edefter_bilgilendirme.wav</option>
                                    <option value="71">anamenu_3333.wav</option>
                                    <option value="74">ERP.wav</option>
                                    <option value="93">Erp_old.wav</option>
                                    <option value="94">IYS_ivr.wav</option>
                                    <option value="95">bekleme_nedenli_ivr.wav</option>
                                    <option value="97">ana_menu_0052.wav</option>
                                    <option value="98">uyumsoft_hosgeldiniz.wav</option>
                                    <option value="99">efatura_arsiv_menu.wav</option>
                                    <option value="100">otoara_edefter_gecis.wav</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="bekleme_muzigi" class="col-md-3 control-label">
                                Bekleme Müziği <span class="require">*</span>
                            </label>
                            <div class="col-md-9">
                                <select name="moh" id="bekleme_muzigi" required="" class="form-control" aria-required="true">
                                    <option value="0">Varsayılan</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="bekleme_suresi" class="col-md-3 control-label">
                                Kapanış SMSi<span class="require">*</span>
                                <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="right" title="" data-html="true" data-original-title="Çağrı kapandıktan sonra arayan numaraya sms gönderir. Smslerinizi ayarlar / interaktif sms menüsünden ayarlayabilirsiniz.
Örneğin : Çağrı sonunda memnuniyet smsi gönderebilir, gelen smsleri netgsm webportal gelen sms menüsünden görebilirsiniz."></i>
                            </label>

                            <div class="col-md-9">
                                <div class="col-md-1">
                                    <div class="i-checks ml20">
                                        <label>
                                            <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="surveyCheck" id="surveyCheck" value="yes" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>
                                        </label>

                                    </div>
                                </div>
                                <div class="col-md-3" id="survey_alania" style="display: none;">
                                    <select name="survey_sms" id="survey_sms" required="" class="form-control" aria-required="true">
                                        <option value="0">SMS Seçiniz </option>
                                    </select>
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="dagitim_sekli" class="col-md-3 control-label">
                                Dağıtım Şekli <span class="require">*</span>
                            </label>
                            <div class="col-md-9">
                                <select name="strategy" id="dagitim_sekli" required="" class="form-control" aria-required="true">
                                    <option value="linear">Belirlediğim sırada çalsın</option>
                                    <option value="random">Rastgele (Müsait olan) bir dahili/harici çalsın</option>
                                    <option value="ringall">Seçilen Tüm dahili ve hariciler aynı anda çalsın</option>
                                    <option value="fewestcalls">En az çağrı alana öncelik ver</option>
                                    <option value="rrmemory" selected="">Sıraya göre kaldığı yerden devam et</option>
                                    <option value="roundrobin">Her çağrı için bütün numaraları sırayla ara</option>
                                    <option value="leastrecent">Ilk müsait olan temsilciye ver</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="bekleme_suresi" class="col-md-3 control-label">
                                Maksimum Bekleme Süresi <span class="require">*</span>
                                <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="right" title="" data-html="true" data-original-title="Çağrının herhangi bir numara tarafından cevaplanana kadar departmanda bekletileceği maksimum süredir."></i>
                            </label>
                            <div class="col-md-9">
                                <select name="queue_timeout" id="bekleme_suresi" required="" class="form-control" onchange="if(this.value==0){$('#target_alani').hide('slow')}else{$('#target_alani').show('slow')}" aria-required="true">
                                    <option value="0" selected="">Sınırsız</option>
                                    <option value="5">5 sn</option>
                                    <option value="10">10 sn</option>
                                    <option value="15">15 sn</option>
                                    <option value="20">20 sn</option>
                                    <option value="25">25 sn</option>
                                    <option value="30">30 sn</option>
                                    <option value="35">35 sn</option>
                                    <option value="40">40 sn</option>
                                    <option value="45">45 sn</option>
                                    <option value="50">50 sn</option>
                                    <option value="55">55 sn</option>
                                    <option value="60">1 dk</option>
                                    <option value="120">2 dk</option>
                                    <option value="180">3 dk</option>
                                    <option value="240">4 dk</option>
                                    <option value="300">5 dk</option>
                                    <option value="360">6 dk</option>
                                    <option value="420">7 dk</option>
                                    <option value="480">8 dk</option>
                                    <option value="540">9 dk</option>
                                    <option value="600">10 dk</option>
                                    <option value="900">15 dk</option>
                                    <option value="1200">20 dk</option>
                                    <option value="1500">25 dk</option>
                                    <option value="1800">30 dk</option>
                                    <option value="2400">40 dk</option>
                                    <option value="3000">50 dk</option>
                                    <option value="3600">60 dk</option>
                                    <option value="5400">90 dk</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group" style="display: none" id="target_alani">
                            <label for="target" class="col-md-3 control-label">
                                Maksimum Bekleme Süresi Dolduğunda Yapılacak İşlem <span class="require">*</span>
                            </label>
                            <div class="col-md-4">
                                <select name="target_name" id="target_name" required="" class="form-control" onchange="targetChange(this.value)" aria-required="true">
                                    <option value="">Seçiniz</option>
                                    <option value="announcement">Anons</option>
                                    <option value="menu">IVR</option>
                                    <option value="timecondition">Zaman Ayarı</option>
                                    <option value="sms">İnteraktif SMS</option>
                                    <option value="queue">Departman</option>
                                    <option value="extensions">Dahili</option>
                                    <option value="dial">Numara Yönlendirme</option>
                                    <option value="voicemail">Sesli Mesaj</option>
                                    <option value="hangup" selected="">Arama Kapatılsın</option>
                                    <option value="interactivemenu">Entegrasyon</option>
                                </select>
                            </div>
                            <div class="col-md-4" id="target_id_alani" style="display: none;">
                                <script type="text/javascript">
                                    $(document).ready(function () {
                                        targetChange('hangup');
                                    });
                                </script>
                            </div>
                        </div>




                        <div class="form-group">
                            <label for="maxlen" class="col-md-3 control-label">
                                Maksimum Arayan Sayısı <span class="require">*</span>
                                <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="right" title="" data-html="true" data-original-title="Departmanda maksimum sayıda bekleyebilecek arayan numara sayısıdır. Verilen Sayıdan daha fazla arayan olursa kuyrukta giriş anonsunu duyarak maksimum bekleme süresi sonunda gidilecek hedefe yonlenir."></i>
                            </label>
                            <div class="col-md-9">
                                <select name="maxlen" id="maxlen" required="" class="form-control" aria-required="true">

                                    <option value="0" selected="">Sınırsız</option>

                                    <option value="1">1</option>

                                    <option value="2">2</option>

                                    <option value="3">3</option>

                                    <option value="4">4</option>

                                    <option value="5">5</option>

                                    <option value="6">6</option>

                                    <option value="7">7</option>

                                    <option value="8">8</option>

                                    <option value="9">9</option>

                                    <option value="10">10</option>

                                    <option value="11">11</option>

                                    <option value="12">12</option>

                                    <option value="13">13</option>

                                    <option value="14">14</option>

                                    <option value="15">15</option>

                                    <option value="16">16</option>

                                    <option value="17">17</option>

                                    <option value="18">18</option>

                                    <option value="19">19</option>

                                    <option value="20">20</option>

                                    <option value="21">21</option>

                                    <option value="22">22</option>

                                    <option value="23">23</option>

                                    <option value="24">24</option>

                                    <option value="25">25</option>

                                    <option value="26">26</option>

                                    <option value="27">27</option>

                                    <option value="28">28</option>

                                    <option value="29">29</option>

                                    <option value="30">30</option>

                                    <option value="31">31</option>

                                    <option value="32">32</option>

                                    <option value="33">33</option>

                                    <option value="34">34</option>

                                    <option value="35">35</option>

                                    <option value="36">36</option>

                                    <option value="37">37</option>

                                    <option value="38">38</option>

                                    <option value="39">39</option>

                                    <option value="40">40</option>

                                    <option value="41">41</option>

                                    <option value="42">42</option>

                                    <option value="43">43</option>

                                    <option value="44">44</option>

                                    <option value="45">45</option>

                                    <option value="46">46</option>

                                    <option value="47">47</option>

                                    <option value="48">48</option>

                                    <option value="49">49</option>

                                    <option value="50">50</option>
                                </select>
                            </div>
                        </div>



                        <div class="form-group">
                            <label for="wrapuptime" class="col-md-3 control-label">
                                Bir Sonraki Çağrı Vermek için beklenecek süre <span class="require">*</span>
                                <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="right" title="" data-html="true" data-original-title="Agent konuştuğu çağrıyı kapattıktan kaç saniye sonra çağrı karşılamak için müsait konuma geçeceği süredir."></i>
                            </label>
                            <div class="col-md-9">
                                <select name="wrapuptime" id="wrapuptime" required="" class="form-control " aria-required="true">
                                    <option value="1">1 sn</option>

                                    <option value="2">2 sn</option>

                                    <option value="3">3 sn</option>

                                    <option value="4">4 sn</option>

                                    <option value="5">5 sn</option>

                                    <option value="10" selected="">10 sn</option>

                                    <option value="15">15 sn</option>

                                    <option value="20">20 sn</option>

                                    <option value="25">25 sn</option>

                                    <option value="30">30 sn</option>

                                    <option value="35">35 sn</option>

                                    <option value="40">40 sn</option>

                                    <option value="45">45 sn</option>

                                    <option value="50">50 sn</option>

                                    <option value="55">55 sn</option>

                                    <option value="60">1 dk</option>

                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="queue_weight" class="col-md-3 control-label">
                                Departman Önceliği <span class="require">*</span>
                                <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="right" title="" data-html="true" data-original-title="Varsayılan olarak bütün departmanların oncelikleri 1 olarak açılır eğer departman Onceliği 1 den yüksek olursa bu özellik birden fazla departmanda ekli olan dahililerin ilk çağrılarını her zaman önceliği yüksek belirtilen departmandan alacakları anlamına gelmektedir."></i>
                            </label>
                            <div class="col-md-9">
                                <select name="weight" id="weight" required="" class="form-control" aria-required="true">
                                    <option value="1" selected="">1</option>

                                    <option value="2">2</option>

                                    <option value="3">3</option>

                                    <option value="4">4</option>

                                    <option value="5">5</option>

                                    <option value="6">6</option>

                                    <option value="7">7</option>

                                    <option value="8">8</option>

                                    <option value="9">9</option>

                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="queue_servicelevel" class="col-md-3 control-label">
                                Service Level <span class="require">*</span>
                                <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="right" title="" data-html="true" data-original-title="Raporlarınızda Departman service leveli hesaplanırken bu deger kullanılacaktır. Service Level: Departmanınıza gelen cevaplanan çağrıların yuzde kaçı belirlemiş olduğunuz bu süre içersinde cevaplanmıştır. Sorusunun cevabını verir."></i>
                            </label>
                            <div class="col-md-9">
                                <select name="servicelevel" id="servicelevel" required="" class="form-control" aria-required="true">
                                    <option value="1">1</option>

                                    <option value="2">2</option>

                                    <option value="3">3</option>

                                    <option value="4">4</option>

                                    <option value="5">5</option>

                                    <option value="6">6</option>

                                    <option value="7">7</option>

                                    <option value="8">8</option>

                                    <option value="9">9</option>

                                    <option value="10">10</option>

                                    <option value="11">11</option>

                                    <option value="12">12</option>

                                    <option value="13">13</option>

                                    <option value="14">14</option>

                                    <option value="15">15</option>

                                    <option value="16">16</option>

                                    <option value="17">17</option>

                                    <option value="18">18</option>

                                    <option value="19">19</option>

                                    <option value="20">20</option>

                                    <option value="21">21</option>

                                    <option value="22">22</option>

                                    <option value="23">23</option>

                                    <option value="24">24</option>

                                    <option value="25">25</option>

                                    <option value="26">26</option>

                                    <option value="27">27</option>

                                    <option value="28">28</option>

                                    <option value="29">29</option>

                                    <option value="30">30</option>

                                    <option value="31">31</option>

                                    <option value="32">32</option>

                                    <option value="33">33</option>

                                    <option value="34">34</option>

                                    <option value="35">35</option>

                                    <option value="36">36</option>

                                    <option value="37">37</option>

                                    <option value="38">38</option>

                                    <option value="39">39</option>

                                    <option value="40">40</option>

                                    <option value="41">41</option>

                                    <option value="42">42</option>

                                    <option value="43">43</option>

                                    <option value="44">44</option>

                                    <option value="45">45</option>

                                    <option value="46">46</option>

                                    <option value="47">47</option>

                                    <option value="48">48</option>

                                    <option value="49">49</option>

                                    <option value="50" selected="">50</option>

                                    <option value="51">51</option>

                                    <option value="52">52</option>

                                    <option value="53">53</option>

                                    <option value="54">54</option>

                                    <option value="55">55</option>

                                    <option value="56">56</option>

                                    <option value="57">57</option>

                                    <option value="58">58</option>

                                    <option value="59">59</option>

                                    <option value="60">60</option>

                                    <option value="61">61</option>

                                    <option value="62">62</option>

                                    <option value="63">63</option>

                                    <option value="64">64</option>

                                    <option value="65">65</option>

                                    <option value="66">66</option>

                                    <option value="67">67</option>

                                    <option value="68">68</option>

                                    <option value="69">69</option>

                                    <option value="70">70</option>

                                    <option value="71">71</option>

                                    <option value="72">72</option>

                                    <option value="73">73</option>

                                    <option value="74">74</option>

                                    <option value="75">75</option>

                                    <option value="76">76</option>

                                    <option value="77">77</option>

                                    <option value="78">78</option>

                                    <option value="79">79</option>

                                    <option value="80">80</option>

                                    <option value="81">81</option>

                                    <option value="82">82</option>

                                    <option value="83">83</option>

                                    <option value="84">84</option>

                                    <option value="85">85</option>

                                    <option value="86">86</option>

                                    <option value="87">87</option>

                                    <option value="88">88</option>

                                    <option value="89">89</option>

                                    <option value="90">90</option>

                                    <option value="91">91</option>

                                    <option value="92">92</option>

                                    <option value="93">93</option>

                                    <option value="94">94</option>

                                    <option value="95">95</option>

                                    <option value="96">96</option>

                                    <option value="97">97</option>

                                    <option value="98">98</option>

                                    <option value="99">99</option>

                                    <option value="100">100</option>

                                    <option value="101">101</option>

                                    <option value="102">102</option>

                                    <option value="103">103</option>

                                    <option value="104">104</option>

                                    <option value="105">105</option>

                                    <option value="106">106</option>

                                    <option value="107">107</option>

                                    <option value="108">108</option>

                                    <option value="109">109</option>

                                    <option value="110">110</option>

                                    <option value="111">111</option>

                                    <option value="112">112</option>

                                    <option value="113">113</option>

                                    <option value="114">114</option>

                                    <option value="115">115</option>

                                    <option value="116">116</option>

                                    <option value="117">117</option>

                                    <option value="118">118</option>

                                    <option value="119">119</option>

                                    <option value="120">120</option>

                                    <option value="121">121</option>

                                    <option value="122">122</option>

                                    <option value="123">123</option>

                                    <option value="124">124</option>

                                    <option value="125">125</option>

                                    <option value="126">126</option>

                                    <option value="127">127</option>

                                    <option value="128">128</option>

                                    <option value="129">129</option>

                                    <option value="130">130</option>

                                    <option value="131">131</option>

                                    <option value="132">132</option>

                                    <option value="133">133</option>

                                    <option value="134">134</option>

                                    <option value="135">135</option>

                                    <option value="136">136</option>

                                    <option value="137">137</option>

                                    <option value="138">138</option>

                                    <option value="139">139</option>

                                    <option value="140">140</option>

                                    <option value="141">141</option>

                                    <option value="142">142</option>

                                    <option value="143">143</option>

                                    <option value="144">144</option>

                                    <option value="145">145</option>

                                    <option value="146">146</option>

                                    <option value="147">147</option>

                                    <option value="148">148</option>

                                    <option value="149">149</option>

                                    <option value="150">150</option>

                                    <option value="151">151</option>

                                    <option value="152">152</option>

                                    <option value="153">153</option>

                                    <option value="154">154</option>

                                    <option value="155">155</option>

                                    <option value="156">156</option>

                                    <option value="157">157</option>

                                    <option value="158">158</option>

                                    <option value="159">159</option>

                                    <option value="160">160</option>

                                    <option value="161">161</option>

                                    <option value="162">162</option>

                                    <option value="163">163</option>

                                    <option value="164">164</option>

                                    <option value="165">165</option>

                                    <option value="166">166</option>

                                    <option value="167">167</option>

                                    <option value="168">168</option>

                                    <option value="169">169</option>

                                    <option value="170">170</option>

                                    <option value="171">171</option>

                                    <option value="172">172</option>

                                    <option value="173">173</option>

                                    <option value="174">174</option>

                                    <option value="175">175</option>

                                    <option value="176">176</option>

                                    <option value="177">177</option>

                                    <option value="178">178</option>

                                    <option value="179">179</option>

                                    <option value="180">180</option>

                                    <option value="181">181</option>

                                    <option value="182">182</option>

                                    <option value="183">183</option>

                                    <option value="184">184</option>

                                    <option value="185">185</option>

                                    <option value="186">186</option>

                                    <option value="187">187</option>

                                    <option value="188">188</option>

                                    <option value="189">189</option>

                                    <option value="190">190</option>

                                    <option value="191">191</option>

                                    <option value="192">192</option>

                                    <option value="193">193</option>

                                    <option value="194">194</option>

                                    <option value="195">195</option>

                                    <option value="196">196</option>

                                    <option value="197">197</option>

                                    <option value="198">198</option>

                                    <option value="199">199</option>

                                    <option value="200">200</option>

                                    <option value="201">201</option>

                                    <option value="202">202</option>

                                    <option value="203">203</option>

                                    <option value="204">204</option>

                                    <option value="205">205</option>

                                    <option value="206">206</option>

                                    <option value="207">207</option>

                                    <option value="208">208</option>

                                    <option value="209">209</option>

                                    <option value="210">210</option>

                                    <option value="211">211</option>

                                    <option value="212">212</option>

                                    <option value="213">213</option>

                                    <option value="214">214</option>

                                    <option value="215">215</option>

                                    <option value="216">216</option>

                                    <option value="217">217</option>

                                    <option value="218">218</option>

                                    <option value="219">219</option>

                                    <option value="220">220</option>

                                    <option value="221">221</option>

                                    <option value="222">222</option>

                                    <option value="223">223</option>

                                    <option value="224">224</option>

                                    <option value="225">225</option>

                                    <option value="226">226</option>

                                    <option value="227">227</option>

                                    <option value="228">228</option>

                                    <option value="229">229</option>

                                    <option value="230">230</option>

                                    <option value="231">231</option>

                                    <option value="232">232</option>

                                    <option value="233">233</option>

                                    <option value="234">234</option>

                                    <option value="235">235</option>

                                    <option value="236">236</option>

                                    <option value="237">237</option>

                                    <option value="238">238</option>

                                    <option value="239">239</option>

                                    <option value="240">240</option>

                                    <option value="241">241</option>

                                    <option value="242">242</option>

                                    <option value="243">243</option>

                                    <option value="244">244</option>

                                    <option value="245">245</option>

                                    <option value="246">246</option>

                                    <option value="247">247</option>

                                    <option value="248">248</option>

                                    <option value="249">249</option>

                                    <option value="250">250</option>

                                    <option value="251">251</option>

                                    <option value="252">252</option>

                                    <option value="253">253</option>

                                    <option value="254">254</option>

                                    <option value="255">255</option>

                                    <option value="256">256</option>

                                    <option value="257">257</option>

                                    <option value="258">258</option>

                                    <option value="259">259</option>

                                    <option value="260">260</option>

                                    <option value="261">261</option>

                                    <option value="262">262</option>

                                    <option value="263">263</option>

                                    <option value="264">264</option>

                                    <option value="265">265</option>

                                    <option value="266">266</option>

                                    <option value="267">267</option>

                                    <option value="268">268</option>

                                    <option value="269">269</option>

                                    <option value="270">270</option>

                                    <option value="271">271</option>

                                    <option value="272">272</option>

                                    <option value="273">273</option>

                                    <option value="274">274</option>

                                    <option value="275">275</option>

                                    <option value="276">276</option>

                                    <option value="277">277</option>

                                    <option value="278">278</option>

                                    <option value="279">279</option>

                                    <option value="280">280</option>

                                    <option value="281">281</option>

                                    <option value="282">282</option>

                                    <option value="283">283</option>

                                    <option value="284">284</option>

                                    <option value="285">285</option>

                                    <option value="286">286</option>

                                    <option value="287">287</option>

                                    <option value="288">288</option>

                                    <option value="289">289</option>

                                    <option value="290">290</option>

                                    <option value="291">291</option>

                                    <option value="292">292</option>

                                    <option value="293">293</option>

                                    <option value="294">294</option>

                                    <option value="295">295</option>

                                    <option value="296">296</option>

                                    <option value="297">297</option>

                                    <option value="298">298</option>

                                    <option value="299">299</option>

                                    <option value="300">300</option>

                                </select>
                            </div>
                        </div>



                        <div class="form-group">
                            <label for="survey_status" class="col-md-3 control-label">
                                Kuyruk Sonu Anket
                                <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="left" title="" data-html="true" data-original-title="Eğer bu özellik bu kuyruk için Açık ise gelen çağrı bu kuyruktaki dahili tarafından cevaplanıp çağrıyı sonlandırırken eğer dahili kapatırsa arayan kişi Anket sistemine aktarılır ve belirlenen sorular sorulur."></i>
                            </label>
                            <div class="col-md-1">
                                <input type="hidden" id="survey" name="survey" value="0">
                                <div id="container_ses_survey" class="class-container">
                                    <div class="inner-container2">
                                        <div class="toggle"> <p> Açık</p></div>
                                        <div class="toggle"> <p> Kapalı</p></div>
                                    </div>
                                    <div class="inner-container" id="toggle-container_ses_survey">
                                        <div class="toggle" data-toggle="tooltip" data-placement="top" title="" data-original-title="Anket Yapılsın."> <p style="font-size: 11px">Açık</p></div>
                                        <div class="toggle" data-toggle="tooltip" data-placement="top" title="" data-original-title="Anket Yapılmasın!"> <p style="font-size: 10px">Kapalı</p></div>
                                    </div>
                                </div>
                                <script>
                                    var toggle2 = false;
                                    $('#container_ses_survey').on('click', function () {
                                        var toggleContainer = $('#toggle-container_ses_survey');
                                        if($('#survey').val() != 0){ toggle2 = true; }
                                        toggle2 = !toggle2;
                                        if (toggle2) {
                                            toggleContainer.removeClass('inner-container');
                                            toggleContainer.addClass('inner-container2');
                                            $('#survey').val(1);
                                        } else {
                                            toggleContainer.removeClass('inner-container2');
                                            toggleContainer.addClass('inner-container');
                                            $('#survey').val(0);
                                        }
                                    });
                                </script>
                            </div>
                        </div>
                    </div>




                    <div class="form-group">
                        <label for="periodic_announce_frequency" class="col-md-3 control-label">
                        </label>
                        <div class="col-md-9">
                            <div class="i-checks ml20">
                                <label class="">
                                    <div class="icheckbox_square-green checked" style="position: relative;"><input type="checkbox" name="periodic_announce_frequency" class="i-checks ml20" data-toggle="tooltip" data-placement="top" title="" value="yes" checked="" style="position: absolute; opacity: 0;" data-original-title="60 saniye de bir arayan kişiye departman da bütün müşteri temzilcilerimiz meşguldur. Beklediğiniz için teşekkür ederiz Şeklinde anons yapılır."><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> Periodic Olarak Anons Et

                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="reportholdtime" class="col-md-3 control-label">

                        </label>
                        <div class="col-md-9">
                            <div class="i-checks ml20">
                                <label class="">
                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="reportholdtime" value="yes" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> Müşteri Temsilcisine Arayanın bekleme süresini Dinlet
                                </label>
                            </div>
                        </div>
                    </div>




                    <div class="form-group">
                        <label for="annofreq" class="col-md-3 control-label">

                        </label>
                        <div class="col-md-9">
                            <div class="i-checks">
                                <label class="">
                                    <div class="i-checks ml20">
                                        <label class="">
                                            <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="sira_dinlet_control" id="sira_dinlet_control" value="yes" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> Arayanın Bekleme Sırasını Dinlet
                                        </label>
                                    </div>

                                </label>
                            </div>
                        </div>
                        <script>
                            $('#sira_dinlet_control').on('ifChanged', function(event) {
                                if (event.target.checked == true){
                                    $('#annofreqDiv').show('slow');
                                    $('#announceHoldtimeDiv').show('slow');
                                } else {
                                    $('#annofreqDiv').hide('slow');
                                    $('#announceHoldtimeDiv').hide('slow');
                                }

                            });
                        </script>

                        <div class="col-md-5 col-md-offset-4" id="annofreqDiv" style="display:none;">
                            <label for="annofreq" class="col-md-3 control-label">
                                Tekrarlama Periyodu <span class="require"></span>
                                <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="right" title="" data-html="true" data-original-title="Arayan Numaraya departmandaki bekleme sırasını ve seçilirse tahmini olarak kaç saniye bekleyeceğini dinletme periyodunu ayarlar."></i>
                            </label>
                            <div class="col-md-9">
                                <select name="annofreq" id="annofreq" class="form-control">
                                    <option value="" disabled="">Lütfen bekleme süresinin ne kadar zamanda bir dinletileceğini seçin</option>
                                    <option value="30">30 Saniye (Varsayılan)</option>
                                    <option value="60">1 Dakika</option>
                                    <option value="90">1 Dakika 30 Saniye</option>
                                    <option value="120">2 Dakika</option>
                                    <option value="150">2 Dakika 30 Saniye</option>
                                    <option value="180">3 Dakika</option>
                                    <option value="210">3 Dakika 30 Saniye</option>
                                    <option value="240">4 Dakika</option>
                                    <option value="270">4 Dakika 30 Saniye</option>
                                    <option value="300">5 Dakika</option>
                                </select>
                            </div>


                            <label for="announceHoldtime" class="col-md-3 control-label">

                            </label>
                            <div class="col-md-9">
                                <div class="i-checks ml20">
                                    <label>
                                        <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="announceHoldtime" value="yes" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> Arayanın Bekleme Süresini Dinlet
                                    </label>
                                </div>
                            </div>



                        </div>
                    </div>


                    <div class="form-group">
                        <label for="ringinuse" class="col-md-3 control-label">

                        </label>
                        <div class="col-md-9">
                            <div class="i-checks ml20">
                                <label class="">
                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" name="ringinuse" value="yes" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> Meşgulken çağrı kabul et
                                </label>
                            </div>
                        </div>
                    </div>

                </form></div>

            <div class="form-actions">
                <div class="col-md-offset-3 col-md-9">
                    <input type="submit" class="btn btn-success" value="Kaydet">
                    <a href="/departman/" class="btn btn-danger">Vazgeç</a>
                </div>
            </div>

        </div>
    </div>
    <div class="clearfix"></div>
</div>



</body></html>
