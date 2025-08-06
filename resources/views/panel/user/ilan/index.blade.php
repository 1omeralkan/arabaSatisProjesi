@extends('panel.layout.app')

@section('content')
<div>
    <div class="card p-3">
        <h3>İlandaki Arabalar  <a href="{{route('user.arabaIlan.create')}}" class="btn btn-primary float-end">İlan oluştur</a>  </h3>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible" role="alert">
                {{session('success')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="table-responsive text-nowrap table-striped table-hover">
            <table class="table table-striped table-hover">
                <thead>
                <tr class="text-nowrap">
                    <th>#</th>
                    <th>Araç sahibi</th>
                    <th>Araç Modeli</th>
                    <th>Araç Yılı</th>
                    <th>Araç Rengi</th>
                    <th>Araç Kilometresi</th>
                    <th>Garanti Durumu</th>
                    <th>Vites Türü</th>
                    <th>Yakıt Türü</th>
                    <th>Yayınlanma Tarihi</th>
                    <th>İlan Durumu</th>
                    <th>Fiyatı</th>
                    <th>Açıklama</th>
                    <th>Hasar Açıklaması</th>
                    <th>Hasar Tarihi</th>
                    <th class="text-center">İşlemler</th>
                </tr>
                </thead>
                <tbody>
                @foreach($ilanlar as $i)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$i->user->name. ' ' . $i->user->surname ?? 'Kullanıcı bulunamadı'}}</td>
                        <td>{{$i->model->carBrand->name .' '. $i->model->name ?? 'Model bulunamadı'}}</td>
                        <td>{{$i->year}}</td>
                        <td>
                            <div style="width: 30px; height: 30px; background-color: {{ $i->color }}; border-radius: 5px; border: 1px solid #ccc;"></div>
                        </td>
                        <td>{{$i->km}}</td>
                        <td>
                            @if($i->guarantee_status==0)
                                Garantisi Yok
                            @else
                                Garantisi Var
                            @endif
                            </td>
                        <td>
                            @if($i->vites_türü==0)
                                Manuel Vites
                            @elseif($i->vites_türü==1)
                                Otomatik Vites
                            @else
                                Yarı Otomatik Vites
                            @endif
                        </td>
                        <td>
                            @if($i->yakıt_türü==0)
                                Benzin
                            @elseif($i->yakıt_türü==1)
                                Dizel
                            @elseif($i->yakıt_türü==2)
                                Elektrik
                            @else
                                LPG
                            @endif
                        </td>
                        <td>{{$i->announcement_date}}</td>
                        <td>
                            @if($i->status==0)
                                Yayında Değil
                            @elseif($i->status==1)
                                Yayında
                            @else
                                Satıldı
                            @endif
                        </td>
                        <td>{{$i->fiyat}}</td>
                        <td>{{$i->description}}</td>
                        <td>{{$i->damage->description}}</td>
                        <td>{{$i->damage->hasar_tarihi}}</td>

                        <td>
                            <a href="" class="btn btn-info">İlan Detay</a>
                            <a href="{{route('user.arabaIlan.update',$i->id)}}" class="btn btn-success">Güncelle</a>
                            <a href="{{route('user.arabaIlan.delete',$i->id)}}" class="btn btn-danger">Sil</a>
                        </td>
                    </tr>

                @endforeach

                </tbody>


            </table>
        </div>


    </div>
</div>
@endsection
