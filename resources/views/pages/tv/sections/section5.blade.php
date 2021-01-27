@extends('layouts.tvmaster')
@section('title', 'İş sıralaması')
@php(setlocale(LC_ALL, 'tr_TR.UTF-8'))

@section('content')
    <div class="row text-center mt-n12">
        <div class="col-xl-12">
            <h2> -- Günlük Puan Sıralaması -- </h2>
        </div>
    </div>
    <div class="row mt-7" id="daily_row">
        <div class="ays-column">
            <div class="card card-custom card-stretch gutter-b" style="background-color: #ff5900">
                <div class="card-body align-items-center mt-n2" style="height: 65px">
                    <div class="row text-center text-white">
                        <div class="col-xl-6 text-left mt-n5 ml-n6"><span class="text-white"
                                                                          style="font-size: 18px">1.</span></div>
                        <div class="col-xl-6 mt-n3 text-right"><span class="text-white mr-n10"><a
                                    style="font-size: 12px">Faaliyet: </a><a style="font-size: 22px">126</a> | <a
                                    style="font-size: 12px">Puan: </a>: <a style="font-size: 22px">33</a></span></div>
                        <div class="col-xl-12 mt-n10 ml-5 text-left"><h2>Damla Çetinkaya</h2></div>
                        <div class="col-xl-12 mt-n3 ml-n7 text-left"><i class="fa fa-arrow-right"
                                                                        style="color: white"></i> 0
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ays-column">
            <div class="card card-custom card-stretch gutter-b" style="background-color: #ff5900">
                <div class="card-body align-items-center mt-n2" style="height: 65px">
                    <div class="row text-center text-white">
                        <div class="col-xl-6 text-left mt-n5 ml-n6"><span class="text-white"
                                                                          style="font-size: 18px">2.</span></div>
                        <div class="col-xl-6 mt-n3 text-right"><span class="text-white mr-n10"><a
                                    style="font-size: 12px">Faaliyet: </a><a style="font-size: 22px">112</a> | <a
                                    style="font-size: 12px">Puan: </a>: <a style="font-size: 22px">32</a></span></div>
                        <div class="col-xl-12 mt-n10 ml-5 text-left"><h2>Uğur Gök</h2></div>
                        <div class="col-xl-12 mt-n3 ml-n7 text-left"><i class="fa fa-arrow-right"
                                                                        style="color: white"></i> 0
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ays-column">
            <div class="card card-custom card-stretch gutter-b" style="background-color: #ff5900">
                <div class="card-body align-items-center mt-n2" style="height: 65px">
                    <div class="row text-center text-white">
                        <div class="col-xl-6 text-left mt-n5 ml-n6"><span class="text-white"
                                                                          style="font-size: 18px">3.</span></div>
                        <div class="col-xl-6 mt-n3 text-right"><span class="text-white mr-n10"><a
                                    style="font-size: 12px">Faaliyet: </a><a style="font-size: 22px">97</a> | <a
                                    style="font-size: 12px">Puan: </a>: <a style="font-size: 22px">31</a></span></div>
                        <div class="col-xl-12 mt-n10 ml-5 text-left"><h2>Songül Keleş</h2></div>
                        <div class="col-xl-12 mt-n3 ml-n7 text-left"><i class="fa fa-arrow-right"
                                                                        style="color: white"></i> 0
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ays-column">
            <div class="card card-custom card-stretch gutter-b" style="background-color: #ff5900">
                <div class="card-body align-items-center mt-n2" style="height: 65px">
                    <div class="row text-center text-white">
                        <div class="col-xl-6 text-left mt-n5 ml-n6"><span class="text-white"
                                                                          style="font-size: 18px">4.</span></div>
                        <div class="col-xl-6 mt-n3 text-right"><span class="text-white mr-n10"><a
                                    style="font-size: 12px">Faaliyet: </a><a style="font-size: 22px">91</a> | <a
                                    style="font-size: 12px">Puan: </a>: <a style="font-size: 22px">30</a></span></div>
                        <div class="col-xl-12 mt-n10 ml-5 text-left"><h2>Erkan Gül</h2></div>
                        <div class="col-xl-12 mt-n3 ml-n7 text-left"><i class="fa fa-arrow-right"
                                                                        style="color: white"></i> 0
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ays-column">
            <div class="card card-custom card-stretch gutter-b" style="background-color: #ff5900">
                <div class="card-body align-items-center mt-n2" style="height: 65px">
                    <div class="row text-center text-white">
                        <div class="col-xl-6 text-left mt-n5 ml-n6"><span class="text-white"
                                                                          style="font-size: 18px">5.</span></div>
                        <div class="col-xl-6 mt-n3 text-right"><span class="text-white mr-n10"><a
                                    style="font-size: 12px">Faaliyet: </a><a style="font-size: 22px">88</a> | <a
                                    style="font-size: 12px">Puan: </a>: <a style="font-size: 22px">29</a></span></div>
                        <div class="col-xl-12 mt-n10 ml-5 text-left"><h2>Gülay Otman</h2></div>
                        <div class="col-xl-12 mt-n3 ml-n7 text-left"><i class="fa fa-arrow-right"
                                                                        style="color: white"></i> 0
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ays-column">
            <div class="card card-custom card-stretch gutter-b" style="background-color: #ff5900">
                <div class="card-body align-items-center mt-n2" style="height: 65px">
                    <div class="row text-center text-white">
                        <div class="col-xl-6 text-left mt-n5 ml-n6"><span class="text-white"
                                                                          style="font-size: 18px">6.</span></div>
                        <div class="col-xl-6 mt-n3 text-right"><span class="text-white mr-n10"><a
                                    style="font-size: 12px">Faaliyet: </a><a style="font-size: 22px">86</a> | <a
                                    style="font-size: 12px">Puan: </a>: <a style="font-size: 22px">28</a></span></div>
                        <div class="col-xl-12 mt-n10 ml-5 text-left"><h2>Bilge Koç</h2></div>
                        <div class="col-xl-12 mt-n3 ml-n7 text-left"><i class="fa fa-arrow-right"
                                                                        style="color: white"></i> 0
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ays-column">
            <div class="card card-custom card-stretch gutter-b" style="background-color: #ff5900">
                <div class="card-body align-items-center mt-n2" style="height: 65px">
                    <div class="row text-center text-white">
                        <div class="col-xl-6 text-left mt-n5 ml-n6"><span class="text-white"
                                                                          style="font-size: 18px">7.</span></div>
                        <div class="col-xl-6 mt-n3 text-right"><span class="text-white mr-n10"><a
                                    style="font-size: 12px">Faaliyet: </a><a style="font-size: 22px">85</a> | <a
                                    style="font-size: 12px">Puan: </a>: <a style="font-size: 22px">27</a></span></div>
                        <div class="col-xl-12 mt-n10 ml-5 text-left"><h2>Ahmet Albayrak</h2></div>
                        <div class="col-xl-12 mt-n3 ml-n7 text-left"><i class="fa fa-arrow-right"
                                                                        style="color: white"></i> 0
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ays-column">
            <div class="card card-custom card-stretch gutter-b" style="background-color: #ff5900">
                <div class="card-body align-items-center mt-n2" style="height: 65px">
                    <div class="row text-center text-white">
                        <div class="col-xl-6 text-left mt-n5 ml-n6"><span class="text-white"
                                                                          style="font-size: 18px">8.</span></div>
                        <div class="col-xl-6 mt-n3 text-right"><span class="text-white mr-n10"><a
                                    style="font-size: 12px">Faaliyet: </a><a style="font-size: 22px">79</a> | <a
                                    style="font-size: 12px">Puan: </a>: <a style="font-size: 22px">26</a></span></div>
                        <div class="col-xl-12 mt-n10 ml-5 text-left"><h2>Özal Uzun</h2></div>
                        <div class="col-xl-12 mt-n3 ml-n7 text-left"><i class="fa fa-arrow-right"
                                                                        style="color: white"></i> 0
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ays-column">
            <div class="card card-custom card-stretch gutter-b" style="background-color: #ff5900">
                <div class="card-body align-items-center mt-n2" style="height: 65px">
                    <div class="row text-center text-white">
                        <div class="col-xl-6 text-left mt-n5 ml-n6"><span class="text-white"
                                                                          style="font-size: 18px">9.</span></div>
                        <div class="col-xl-6 mt-n3 text-right"><span class="text-white mr-n10"><a
                                    style="font-size: 12px">Faaliyet: </a><a style="font-size: 22px">76</a> | <a
                                    style="font-size: 12px">Puan: </a>: <a style="font-size: 22px">25</a></span></div>
                        <div class="col-xl-12 mt-n10 ml-5 text-left"><h2>Sefa Canpolat</h2></div>
                        <div class="col-xl-12 mt-n3 ml-n7 text-left"><i class="fa fa-arrow-right"
                                                                        style="color: white"></i> 0
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ays-column">
            <div class="card card-custom card-stretch gutter-b" style="background-color: #ff5900">
                <div class="card-body align-items-center mt-n2" style="height: 65px">
                    <div class="row text-center text-white">
                        <div class="col-xl-6 text-left mt-n5 ml-n6"><span class="text-white"
                                                                          style="font-size: 18px">10.</span></div>
                        <div class="col-xl-6 mt-n3 text-right"><span class="text-white mr-n10"><a
                                    style="font-size: 12px">Faaliyet: </a><a style="font-size: 22px">73</a> | <a
                                    style="font-size: 12px">Puan: </a>: <a style="font-size: 22px">24</a></span></div>
                        <div class="col-xl-12 mt-n10 ml-5 text-left"><h2>Cansu Lale</h2></div>
                        <div class="col-xl-12 mt-n3 ml-n7 text-left"><i class="fa fa-arrow-right"
                                                                        style="color: white"></i> 0
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ays-column">
            <div class="card card-custom card-stretch gutter-b" style="background-color: #ff5900">
                <div class="card-body align-items-center mt-n2" style="height: 65px">
                    <div class="row text-center text-white">
                        <div class="col-xl-6 text-left mt-n5 ml-n6"><span class="text-white"
                                                                          style="font-size: 18px">11.</span></div>
                        <div class="col-xl-6 mt-n3 text-right"><span class="text-white mr-n10"><a
                                    style="font-size: 12px">Faaliyet: </a><a style="font-size: 22px">71</a> | <a
                                    style="font-size: 12px">Puan: </a>: <a style="font-size: 22px">23</a></span></div>
                        <div class="col-xl-12 mt-n10 ml-5 text-left"><h2>Sena Turgut</h2></div>
                        <div class="col-xl-12 mt-n3 ml-n7 text-left"><i class="fa fa-arrow-right"
                                                                        style="color: white"></i> 0
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ays-column">
            <div class="card card-custom card-stretch gutter-b" style="background-color: #ff5900">
                <div class="card-body align-items-center mt-n2" style="height: 65px">
                    <div class="row text-center text-white">
                        <div class="col-xl-6 text-left mt-n5 ml-n6"><span class="text-white"
                                                                          style="font-size: 18px">12.</span></div>
                        <div class="col-xl-6 mt-n3 text-right"><span class="text-white mr-n10"><a
                                    style="font-size: 12px">Faaliyet: </a><a style="font-size: 22px">68</a> | <a
                                    style="font-size: 12px">Puan: </a>: <a style="font-size: 22px">22</a></span></div>
                        <div class="col-xl-12 mt-n10 ml-5 text-left"><h2>Nida Akıncı</h2></div>
                        <div class="col-xl-12 mt-n3 ml-n7 text-left"><i class="fa fa-arrow-right"
                                                                        style="color: white"></i> 0
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ays-column">
            <div class="card card-custom card-stretch gutter-b" style="background-color: #ff5900">
                <div class="card-body align-items-center mt-n2" style="height: 65px">
                    <div class="row text-center text-white">
                        <div class="col-xl-6 text-left mt-n5 ml-n6"><span class="text-white"
                                                                          style="font-size: 18px">13.</span></div>
                        <div class="col-xl-6 mt-n3 text-right"><span class="text-white mr-n10"><a
                                    style="font-size: 12px">Faaliyet: </a><a style="font-size: 22px">64</a> | <a
                                    style="font-size: 12px">Puan: </a>: <a style="font-size: 22px">21</a></span></div>
                        <div class="col-xl-12 mt-n10 ml-5 text-left"><h2>Kübra Batur</h2></div>
                        <div class="col-xl-12 mt-n3 ml-n7 text-left"><i class="fa fa-arrow-right"
                                                                        style="color: white"></i> 0
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ays-column">
            <div class="card card-custom card-stretch gutter-b" style="background-color: #ff5900">
                <div class="card-body align-items-center mt-n2" style="height: 65px">
                    <div class="row text-center text-white">
                        <div class="col-xl-6 text-left mt-n5 ml-n6"><span class="text-white"
                                                                          style="font-size: 18px">14.</span></div>
                        <div class="col-xl-6 mt-n3 text-right"><span class="text-white mr-n10"><a
                                    style="font-size: 12px">Faaliyet: </a><a style="font-size: 22px">63</a> | <a
                                    style="font-size: 12px">Puan: </a>: <a style="font-size: 22px">20</a></span></div>
                        <div class="col-xl-12 mt-n10 ml-5 text-left"><h2>Firdevs S. Yekeler</h2></div>
                        <div class="col-xl-12 mt-n3 ml-n7 text-left"><i class="fa fa-arrow-right"
                                                                        style="color: white"></i> 0
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ays-column">
            <div class="card card-custom card-stretch gutter-b" style="background-color: #ff5900">
                <div class="card-body align-items-center mt-n2" style="height: 65px">
                    <div class="row text-center text-white">
                        <div class="col-xl-6 text-left mt-n5 ml-n6"><span class="text-white"
                                                                          style="font-size: 18px">15.</span></div>
                        <div class="col-xl-6 mt-n3 text-right"><span class="text-white mr-n10"><a
                                    style="font-size: 12px">Faaliyet: </a><a style="font-size: 22px">62</a> | <a
                                    style="font-size: 12px">Puan: </a>: <a style="font-size: 22px">19</a></span></div>
                        <div class="col-xl-12 mt-n10 ml-5 text-left"><h2>Şükran Demir</h2></div>
                        <div class="col-xl-12 mt-n3 ml-n7 text-left"><i class="fa fa-arrow-right"
                                                                        style="color: white"></i> 0
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ays-column">
            <div class="card card-custom card-stretch gutter-b" style="background-color: #ff5900">
                <div class="card-body align-items-center mt-n2" style="height: 65px">
                    <div class="row text-center text-white">
                        <div class="col-xl-6 text-left mt-n5 ml-n6"><span class="text-white"
                                                                          style="font-size: 18px">16.</span></div>
                        <div class="col-xl-6 mt-n3 text-right"><span class="text-white mr-n10"><a
                                    style="font-size: 12px">Faaliyet: </a><a style="font-size: 22px">61</a> | <a
                                    style="font-size: 12px">Puan: </a>: <a style="font-size: 22px">18</a></span></div>
                        <div class="col-xl-12 mt-n10 ml-5 text-left"><h2>Esra Kaya</h2></div>
                        <div class="col-xl-12 mt-n3 ml-n7 text-left"><i class="fa fa-arrow-right"
                                                                        style="color: white"></i> 0
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ays-column">
            <div class="card card-custom card-stretch gutter-b" style="background-color: #ff5900">
                <div class="card-body align-items-center mt-n2" style="height: 65px">
                    <div class="row text-center text-white">
                        <div class="col-xl-6 text-left mt-n5 ml-n6"><span class="text-white"
                                                                          style="font-size: 18px">17.</span></div>
                        <div class="col-xl-6 mt-n3 text-right"><span class="text-white mr-n10"><a
                                    style="font-size: 12px">Faaliyet: </a><a style="font-size: 22px">59</a> | <a
                                    style="font-size: 12px">Puan: </a>: <a style="font-size: 22px">17</a></span></div>
                        <div class="col-xl-12 mt-n10 ml-5 text-left"><h2>Hikmet C. Şahin</h2></div>
                        <div class="col-xl-12 mt-n3 ml-n7 text-left"><i class="fa fa-arrow-right"
                                                                        style="color: white"></i> 0
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ays-column">
            <div class="card card-custom card-stretch gutter-b" style="background-color: #ff5900">
                <div class="card-body align-items-center mt-n2" style="height: 65px">
                    <div class="row text-center text-white">
                        <div class="col-xl-6 text-left mt-n5 ml-n6"><span class="text-white"
                                                                          style="font-size: 18px">18.</span></div>
                        <div class="col-xl-6 mt-n3 text-right"><span class="text-white mr-n10"><a
                                    style="font-size: 12px">Faaliyet: </a><a style="font-size: 22px">56</a> | <a
                                    style="font-size: 12px">Puan: </a>: <a style="font-size: 22px">16</a></span></div>
                        <div class="col-xl-12 mt-n10 ml-5 text-left"><h2>Özgenur Kayhan</h2></div>
                        <div class="col-xl-12 mt-n3 ml-n7 text-left"><i class="fa fa-arrow-right"
                                                                        style="color: white"></i> 0
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ays-column">
            <div class="card card-custom card-stretch gutter-b" style="background-color: #ff5900">
                <div class="card-body align-items-center mt-n2" style="height: 65px">
                    <div class="row text-center text-white">
                        <div class="col-xl-6 text-left mt-n5 ml-n6"><span class="text-white"
                                                                          style="font-size: 18px">19.</span></div>
                        <div class="col-xl-6 mt-n3 text-right"><span class="text-white mr-n10"><a
                                    style="font-size: 12px">Faaliyet: </a><a style="font-size: 22px">55</a> | <a
                                    style="font-size: 12px">Puan: </a>: <a style="font-size: 22px">15</a></span></div>
                        <div class="col-xl-12 mt-n10 ml-5 text-left"><h2>Turgay Karakoç</h2></div>
                        <div class="col-xl-12 mt-n3 ml-n7 text-left"><i class="fa fa-arrow-right"
                                                                        style="color: white"></i> 0
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ays-column">
            <div class="card card-custom card-stretch gutter-b" style="background-color: #ff5900">
                <div class="card-body align-items-center mt-n2" style="height: 65px">
                    <div class="row text-center text-white">
                        <div class="col-xl-6 text-left mt-n5 ml-n6"><span class="text-white"
                                                                          style="font-size: 18px">20.</span></div>
                        <div class="col-xl-6 mt-n3 text-right"><span class="text-white mr-n10"><a
                                    style="font-size: 12px">Faaliyet: </a><a style="font-size: 22px">47</a> | <a
                                    style="font-size: 12px">Puan: </a>: <a style="font-size: 22px">14</a></span></div>
                        <div class="col-xl-12 mt-n10 ml-5 text-left"><h2>Berat Özcan</h2></div>
                        <div class="col-xl-12 mt-n3 ml-n7 text-left"><i class="fa fa-arrow-right"
                                                                        style="color: white"></i> 0
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ays-column">
            <div class="card card-custom card-stretch gutter-b" style="background-color: #ff5900">
                <div class="card-body align-items-center mt-n2" style="height: 65px">
                    <div class="row text-center text-white">
                        <div class="col-xl-6 text-left mt-n5 ml-n6"><span class="text-white"
                                                                          style="font-size: 18px">21.</span></div>
                        <div class="col-xl-6 mt-n3 text-right"><span class="text-white mr-n10"><a
                                    style="font-size: 12px">Faaliyet: </a><a style="font-size: 22px">44</a> | <a
                                    style="font-size: 12px">Puan: </a>: <a style="font-size: 22px">13</a></span></div>
                        <div class="col-xl-12 mt-n10 ml-5 text-left"><h2>Hatice Tor</h2></div>
                        <div class="col-xl-12 mt-n3 ml-n7 text-left"><i class="fa fa-arrow-right"
                                                                        style="color: white"></i> 0
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ays-column">
            <div class="card card-custom card-stretch gutter-b" style="background-color: #ff5900">
                <div class="card-body align-items-center mt-n2" style="height: 65px">
                    <div class="row text-center text-white">
                        <div class="col-xl-6 text-left mt-n5 ml-n6"><span class="text-white"
                                                                          style="font-size: 18px">22.</span></div>
                        <div class="col-xl-6 mt-n3 text-right"><span class="text-white mr-n10"><a
                                    style="font-size: 12px">Faaliyet: </a><a style="font-size: 22px">41</a> | <a
                                    style="font-size: 12px">Puan: </a>: <a style="font-size: 22px">12</a></span></div>
                        <div class="col-xl-12 mt-n10 ml-5 text-left"><h2>Selva Orhanoğlu</h2></div>
                        <div class="col-xl-12 mt-n3 ml-n7 text-left"><i class="fa fa-arrow-right"
                                                                        style="color: white"></i> 0
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ays-column">
            <div class="card card-custom card-stretch gutter-b" style="background-color: #ff5900">
                <div class="card-body align-items-center mt-n2" style="height: 65px">
                    <div class="row text-center text-white">
                        <div class="col-xl-6 text-left mt-n5 ml-n6"><span class="text-white"
                                                                          style="font-size: 18px">23.</span></div>
                        <div class="col-xl-6 mt-n3 text-right"><span class="text-white mr-n10"><a
                                    style="font-size: 12px">Faaliyet: </a><a style="font-size: 22px">40</a> | <a
                                    style="font-size: 12px">Puan: </a>: <a style="font-size: 22px">11</a></span></div>
                        <div class="col-xl-12 mt-n10 ml-5 text-left"><h2>Seda Dalkıran</h2></div>
                        <div class="col-xl-12 mt-n3 ml-n7 text-left"><i class="fa fa-arrow-right"
                                                                        style="color: white"></i> 0
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ays-column">
            <div class="card card-custom card-stretch gutter-b" style="background-color: #ff5900">
                <div class="card-body align-items-center mt-n2" style="height: 65px">
                    <div class="row text-center text-white">
                        <div class="col-xl-6 text-left mt-n5 ml-n6"><span class="text-white"
                                                                          style="font-size: 18px">24.</span></div>
                        <div class="col-xl-6 mt-n3 text-right"><span class="text-white mr-n10"><a
                                    style="font-size: 12px">Faaliyet: </a><a style="font-size: 22px">37</a> | <a
                                    style="font-size: 12px">Puan: </a>: <a style="font-size: 22px">10</a></span></div>
                        <div class="col-xl-12 mt-n10 ml-5 text-left"><h2>Berat Karakaplan</h2></div>
                        <div class="col-xl-12 mt-n3 ml-n7 text-left"><i class="fa fa-arrow-right"
                                                                        style="color: white"></i> 0
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ays-column">
            <div class="card card-custom card-stretch gutter-b" style="background-color: #ff5900">
                <div class="card-body align-items-center mt-n2" style="height: 65px">
                    <div class="row text-center text-white">
                        <div class="col-xl-6 text-left mt-n5 ml-n6"><span class="text-white"
                                                                          style="font-size: 18px">25.</span></div>
                        <div class="col-xl-6 mt-n3 text-right"><span class="text-white mr-n10"><a
                                    style="font-size: 12px">Faaliyet: </a><a style="font-size: 22px">33</a> | <a
                                    style="font-size: 12px">Puan: </a>: <a style="font-size: 22px">8</a></span></div>
                        <div class="col-xl-12 mt-n10 ml-5 text-left"><h2>Ayşenur Zeren</h2></div>
                        <div class="col-xl-12 mt-n3 ml-n7 text-left"><i class="fa fa-arrow-right"
                                                                        style="color: white"></i> 0
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ays-column">
            <div class="card card-custom card-stretch gutter-b" style="background-color: #ff5900">
                <div class="card-body align-items-center mt-n2" style="height: 65px">
                    <div class="row text-center text-white">
                        <div class="col-xl-6 text-left mt-n5 ml-n6"><span class="text-white"
                                                                          style="font-size: 18px">26.</span></div>
                        <div class="col-xl-6 mt-n3 text-right"><span class="text-white mr-n10"><a
                                    style="font-size: 12px">Faaliyet: </a><a style="font-size: 22px">33</a> | <a
                                    style="font-size: 12px">Puan: </a>: <a style="font-size: 22px">9</a></span></div>
                        <div class="col-xl-12 mt-n10 ml-5 text-left"><h2>Muhammed Demir</h2></div>
                        <div class="col-xl-12 mt-n3 ml-n7 text-left"><i class="fa fa-arrow-right"
                                                                        style="color: white"></i> 0
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ays-column">
            <div class="card card-custom card-stretch gutter-b" style="background-color: #ff5900">
                <div class="card-body align-items-center mt-n2" style="height: 65px">
                    <div class="row text-center text-white">
                        <div class="col-xl-6 text-left mt-n5 ml-n6"><span class="text-white"
                                                                          style="font-size: 18px">27.</span></div>
                        <div class="col-xl-6 mt-n3 text-right"><span class="text-white mr-n10"><a
                                    style="font-size: 12px">Faaliyet: </a><a style="font-size: 22px">32</a> | <a
                                    style="font-size: 12px">Puan: </a>: <a style="font-size: 22px">7</a></span></div>
                        <div class="col-xl-12 mt-n10 ml-5 text-left"><h2>Sümeyye Sarıhan</h2></div>
                        <div class="col-xl-12 mt-n3 ml-n7 text-left"><i class="fa fa-arrow-right"
                                                                        style="color: white"></i> 0
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ays-column">
            <div class="card card-custom card-stretch gutter-b" style="background-color: #ff5900">
                <div class="card-body align-items-center mt-n2" style="height: 65px">
                    <div class="row text-center text-white">
                        <div class="col-xl-6 text-left mt-n5 ml-n6"><span class="text-white"
                                                                          style="font-size: 18px">28.</span></div>
                        <div class="col-xl-6 mt-n3 text-right"><span class="text-white mr-n10"><a
                                    style="font-size: 12px">Faaliyet: </a><a style="font-size: 22px">19</a> | <a
                                    style="font-size: 12px">Puan: </a>: <a style="font-size: 22px">5</a></span></div>
                        <div class="col-xl-12 mt-n10 ml-5 text-left"><h2>Seher Akın</h2></div>
                        <div class="col-xl-12 mt-n3 ml-n7 text-left"><i class="fa fa-arrow-right"
                                                                        style="color: white"></i> 0
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ays-column">
            <div class="card card-custom card-stretch gutter-b" style="background-color: #ff5900">
                <div class="card-body align-items-center mt-n2" style="height: 65px">
                    <div class="row text-center text-white">
                        <div class="col-xl-6 text-left mt-n5 ml-n6"><span class="text-white"
                                                                          style="font-size: 18px">29.</span></div>
                        <div class="col-xl-6 mt-n3 text-right"><span class="text-white mr-n10"><a
                                    style="font-size: 12px">Faaliyet: </a><a style="font-size: 22px">19</a> | <a
                                    style="font-size: 12px">Puan: </a>: <a style="font-size: 22px">6</a></span></div>
                        <div class="col-xl-12 mt-n10 ml-5 text-left"><h2>Melisa Çakmak</h2></div>
                        <div class="col-xl-12 mt-n3 ml-n7 text-left"><i class="fa fa-arrow-right"
                                                                        style="color: white"></i> 0
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ays-column">
            <div class="card card-custom card-stretch gutter-b" style="background-color: #ff5900">
                <div class="card-body align-items-center mt-n2" style="height: 65px">
                    <div class="row text-center text-white">
                        <div class="col-xl-6 text-left mt-n5 ml-n6"><span class="text-white"
                                                                          style="font-size: 18px">30.</span></div>
                        <div class="col-xl-6 mt-n3 text-right"><span class="text-white mr-n10"><a
                                    style="font-size: 12px">Faaliyet: </a><a style="font-size: 22px">15</a> | <a
                                    style="font-size: 12px">Puan: </a>: <a style="font-size: 22px">4</a></span></div>
                        <div class="col-xl-12 mt-n10 ml-5 text-left"><h2>Furkan Haskoloğlu</h2></div>
                        <div class="col-xl-12 mt-n3 ml-n7 text-left"><i class="fa fa-arrow-right"
                                                                        style="color: white"></i> 0
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ays-column">
            <div class="card card-custom card-stretch gutter-b" style="background-color: #ff5900">
                <div class="card-body align-items-center mt-n2" style="height: 65px">
                    <div class="row text-center text-white">
                        <div class="col-xl-6 text-left mt-n5 ml-n6"><span class="text-white"
                                                                          style="font-size: 18px">31.</span></div>
                        <div class="col-xl-6 mt-n3 text-right"><span class="text-white mr-n10"><a
                                    style="font-size: 12px">Faaliyet: </a><a style="font-size: 22px">13</a> | <a
                                    style="font-size: 12px">Puan: </a>: <a style="font-size: 22px">3</a></span></div>
                        <div class="col-xl-12 mt-n10 ml-5 text-left"><h2>Seda Yıldız</h2></div>
                        <div class="col-xl-12 mt-n3 ml-n7 text-left"><i class="fa fa-arrow-right"
                                                                        style="color: white"></i> 0
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ays-column">
            <div class="card card-custom card-stretch gutter-b" style="background-color: #ff5900">
                <div class="card-body align-items-center mt-n2" style="height: 65px">
                    <div class="row text-center text-white">
                        <div class="col-xl-6 text-left mt-n5 ml-n6"><span class="text-white"
                                                                          style="font-size: 18px">32.</span></div>
                        <div class="col-xl-6 mt-n3 text-right"><span class="text-white mr-n10"><a
                                    style="font-size: 12px">Faaliyet: </a><a style="font-size: 22px">4</a> | <a
                                    style="font-size: 12px">Puan: </a>: <a style="font-size: 22px">2</a></span></div>
                        <div class="col-xl-12 mt-n10 ml-5 text-left"><h2>Enes Akkaya</h2></div>
                        <div class="col-xl-12 mt-n3 ml-n7 text-left"><i class="fa fa-arrow-right"
                                                                        style="color: white"></i> 0
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ays-column">
            <div class="card card-custom card-stretch gutter-b" style="background-color: #ff5900">
                <div class="card-body align-items-center mt-n2" style="height: 65px">
                    <div class="row text-center text-white">
                        <div class="col-xl-6 text-left mt-n5 ml-n6"><span class="text-white"
                                                                          style="font-size: 18px">33.</span></div>
                        <div class="col-xl-6 mt-n3 text-right"><span class="text-white mr-n10"><a
                                    style="font-size: 12px">Faaliyet: </a><a style="font-size: 22px">2</a> | <a
                                    style="font-size: 12px">Puan: </a>: <a style="font-size: 22px">1</a></span></div>
                        <div class="col-xl-12 mt-n10 ml-5 text-left"><h2>Reşit Çölkesen</h2></div>
                        <div class="col-xl-12 mt-n3 ml-n7 text-left"><i class="fa fa-arrow-right"
                                                                        style="color: white"></i> 0
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('page-styles')

    <style>

        .ays-column {
            -ms-flex: 0 0 20%;
            flex: 0 0 20%;
            max-width: 20%;
            position: relative;
            padding: 5px;
            margin-top: -30px;
        }

        @media only screen and (max-width: 2000px) {
            .ays-column {
                -ms-flex: 0 0 25%;
                flex: 0 0 25%;
                max-width: 25%;
                position: relative;
                padding: 5px;
                margin-top: -30px;
            }
        }

        @media only screen and (max-width: 1800px) {
            .ays-column {
                -ms-flex: 0 0 33.33%;
                flex: 0 0 33.33%;
                max-width: 33.33%;
                position: relative;
                padding: 5px;
                margin-top: -30px;
            }
        }

        @media only screen and (max-width: 1350px) {
            .ays-column {
                -ms-flex: 0 0 50%;
                flex: 0 0 50%;
                max-width: 50%;
                position: relative;
                padding: 5px;
                margin-top: -30px;
            }
        }

        @media only screen and (max-width: 800px) {
            .ays-column {
                -ms-flex: 0 0 100%;
                flex: 0 0 100%;
                max-width: 100%;
                position: relative;
                padding: 5px;
                margin-top: -30px;
            }
        }

    </style>

@stop

@section('page-script')

    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $( function() {
            $( "#daily_row" ).sortable({
                revert: true
            });
            $( ".ays-column" ).draggable({
                connectToSortable: "#daily_row",
                revert: "invalid"
            });
        } );
    </script>

@stop
