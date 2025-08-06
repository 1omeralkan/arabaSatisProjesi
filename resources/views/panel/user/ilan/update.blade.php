@extends('panel.layout.app')

@section('content')
    <div class="card p-3">
        <h5>İlan Güncelleme</h5>
        @if($errors->any())
            @foreach($errors->all() as $error )
                {{$error}}
            @endforeach
        @endif

        <form action="{{route('user.arabaIlan.Edit')}}" method="POST">
            @csrf

            <div class="card shadow-neutral-500 border border-primary mb-3 p-3">
                <label class="form-label" for="model">Arabanın Modeli :</label>
                <select name="model_id" id="model" class="form-control">
                    @foreach($modeller as $model)
                        <option value="{{ $model->id }}"
                            {{ $model->id == $ilan->model_id ? 'selected' : '' }}>
                            {{ $model->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="card shadow-neutral-500 border border-primary mb-3 p-3">
                <label class="form-label" for="year">Arabanın Yılı :</label>
                <input type="number" value="{{$ilan->year}}" class="form-control" id="year" name="year" min="1950" max="{{ date('Y') }}" placeholder="Örnek: 2018">
            </div>

            <div class="card shadow-neutral-500  border border-primary mb-3 p-3">
                <label class="form-label " for="yıl">Arabanın Rengi :</label>
                <input type="color" class="form-control form-control-color" id="color" name="color" value="{{$ilan->color}}" title="Renk Seçiniz.">
            </div>

            <div class="card shadow-neutral-500  border border-primary mb-3 p-3">
                <label class="form-label " for="yıl">Arabanın Kilometresi :</label>
                <input type="number" value="{{$ilan->km}}" class="form-control" id="km" name="km" placeholder="Örnek: 123000 km" min="0" step="1">
            </div>

            <div class="card shadow-neutral-500 border border-primary mb-3 p-3">
                <label for="exampleFormControlInput" class="form-label">Garanti Durumu :</label>
                <select name="guarantee_status" id="" class="form-control">
                    <option value="" disabled {{ $ilan->guarantee_status === null ? 'selected' : '' }}>
                        Lütfen Garanti Durumu Seçimi Yapınız.
                    </option>
                    <option value="0" {{ $ilan->guarantee_status == 0 ? 'selected' : '' }}>Garantisi Yok</option>
                    <option value="1" {{ $ilan->guarantee_status == 1 ? 'selected' : '' }}>Garantisi Var</option>
                </select>
            </div>


            <div class="card shadow-neutral-500 border border-primary mb-3 p-3">
                <label for="exampleFormControlInput" class="form-label">Vites Türü :</label>
                <select name="vites_türü" id="" class="form-control">
                    <option value="" disabled {{ $ilan->vites_türü === null ? 'selected' : '' }}>
                        Lütfen Vites Türü Seçimi Yapınız.
                    </option>
                    <option value="0" {{ $ilan->vites_türü == 0 ? 'selected' : '' }}>Manuel</option>
                    <option value="1" {{ $ilan->vites_türü == 1 ? 'selected' : '' }}>Otomatik</option>
                    <option value="2" {{ $ilan->vites_türü == 2 ? 'selected' : '' }}>Yarı Otomatik</option>
                </select>
            </div>


            <div class="card shadow-neutral-500 border border-primary mb-3 p-3">
                <label for="yakit_turu" class="form-label">Yakıt Türü :</label>
                <select name="yakıt_türü" id="yakit_turu" class="form-control">
                    <option value="" disabled {{ $ilan->yakıt_türü === null ? 'selected' : '' }}>
                        Lütfen Yakıt Türü Seçimi Yapınız.
                    </option>
                    <option value="0" {{ $ilan->yakıt_türü == 0 ? 'selected' : '' }}>Benzin</option>
                    <option value="1" {{ $ilan->yakıt_türü == 1 ? 'selected' : '' }}>Dizel</option>
                    <option value="2" {{ $ilan->yakıt_türü == 2 ? 'selected' : '' }}>Elektrik</option>
                    <option value="3" {{ $ilan->yakıt_türü == 3 ? 'selected' : '' }}>LPG</option>
                </select>
            </div>


            <div class="card shadow-neutral-500 border border-primary mb-3 p-3">
                <label class="form-label" for="price">Arabanın Fiyatı (₺):</label>
                <input type="number" value="{{$ilan->fiyat}}" class="form-control" id="price" name="fiyat" placeholder="Örnek: 275000.50" min="0" step="0.01">
            </div>

            <div class="card shadow-neutral-500 border border-primary mb-3 p-3">
                <label class="form-label" for="description">Açıklama :</label>
                <textarea class="form-control" id="description"  name="description" rows="4" placeholder="Aracın durumu, yapılan bakımlar, hasar bilgileri vs.">{{ old('description', $ilan->description) }}</textarea>
            </div>
            <div class="card shadow-neutral-500 border border-primary mb-3 p-3">
                <label class="form-label" for="description">Hasar Açıklaması :</label>
                <textarea class="form-control" id="description" name="damage_description" rows="4" placeholder="Aracın durumu, yapılan bakımlar, hasar bilgileri vs.">{{ old('damage_description', $ilan->damage->description ?? '') }}</textarea>
            </div>
            <div class="card shadow-neutral-500 border border-primary mb-3 p-3">
                <label class="form-label" for="hasar_tarihi">Hasar Tarihi :</label>
                <input type="datetime-local"
                       class="form-control"
                       id="hasar_tarihi"
                       name="hasar_tarihi"
                       value="{{ \Carbon\Carbon::parse($ilan->hasar_tarihi)->format('Y-m-d\TH:i') }}">
            </div>


            <input type="hidden" name="ilan_id" value="{{$ilan->id}}">

            <button type="submit" class="form-control btn-primary">İlan Güncelle</button>


        </form>
    </div>


@endsection
