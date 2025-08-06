@extends('panel.layout.app')

@section('content')
        <div class="card p-3">
            <h5>İlan Oluşturma</h5>
            @if($errors->any())
                @foreach($errors->all() as $error )
                    {{$error}}
                @endforeach
            @endif

            <form action="{{route('user.arabaIlan.Add')}}" method="POST">
                @csrf

                <div class="card shadow-neutral-500 border border-primary mb-3 p-3">
                    <label class="form-label" for="model">Arabanın Modeli :</label>
                    <select name="model_id" id="model" class="form-control">

                        @foreach($modeller as  $model)
                            <option value="{{$model->id}}">{{$model->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="card shadow-neutral-500 border border-primary mb-3 p-3">
                    <label class="form-label" for="year">Arabanın Yılı :</label>
                    <input type="number" class="form-control" id="year" name="year" min="1950" max="{{ date('Y') }}" placeholder="Örnek: 2018">
                </div>

                <div class="card shadow-neutral-500  border border-primary mb-3 p-3">
                    <label class="form-label " for="yıl">Arabanın Rengi :</label>
                    <input type="color" class="form-control form-control-color" id="color" name="color" value="#000000" title="Renk Seçiniz.">
                </div>

                <div class="card shadow-neutral-500  border border-primary mb-3 p-3">
                    <label class="form-label " for="yıl">Arabanın Kilometresi :</label>
                    <input type="number" class="form-control" id="km" name="km" placeholder="Örnek: 123000 km" min="0" step="1">
                </div>

                <div class="card shadow-neutral-500  border border-primary mb-3 p-3">
                    <label for="exampleFormControlInput" class="form-label">Garanti Durumu :</label>
                    <select name="guarantee_status" id="" class="form-control">
                        <option selected value="" disabled>Lütfen Garanti Durumu Seçimi Yapınız.</option>
                        <option value="0">Garantisi Yok</option>
                        <option value="1">Garantisi Var</option>
                    </select>
                </div>

                <div class="card shadow-neutral-500  border border-primary mb-3 p-3">
                    <label for="exampleFormControlInput" class="form-label">Vites Türü :</label>
                    <select name="vites_türü" id="" class="form-control">
                        <option selected value="" disabled>Lütfen Vites Türü Seçimi Yapınız.</option>
                        <option value="0">Manuel</option>
                        <option value="1">Otomatik</option>
                        <option value="2">Yarı Otomatik</option>
                    </select>
                </div>

                <div class="card shadow-neutral-500  border border-primary mb-3 p-3">
                    <label for="exampleFormControlInput" class="form-label">Yakıt Türü :</label>
                    <select name="yakıt_türü" id="" class="form-control">
                        <option selected value="" disabled>Lütfen Yakıt Türü Seçimi Yapınız.</option>
                        <option value="0">Benzin</option>
                        <option value="1">Dizel</option>
                        <option value="2">Elektrik</option>
                        <option value="2">LPG</option>
                    </select>
                </div>

                <div class="card shadow-neutral-500 border border-primary mb-3 p-3">
                    <label class="form-label" for="price">Arabanın Fiyatı (₺):</label>
                    <input type="number" class="form-control" id="price" name="fiyat" placeholder="Örnek: 275000.50" min="0" step="0.01">
                </div>

                <div class="card shadow-neutral-500 border border-primary mb-3 p-3">
                    <label class="form-label" for="description">Açıklama :</label>
                    <textarea class="form-control" id="description" name="description" rows="4" placeholder="Aracın durumu, yapılan bakımlar, hasar bilgileri vs."></textarea>
                </div>
                <div class="card shadow-neutral-500 border border-primary mb-3 p-3">
                    <label class="form-label" for="description">Hasar Açıklaması :</label>
                    <textarea class="form-control" id="description" name="damage_description" rows="4" placeholder="Aracın durumu, yapılan bakımlar, hasar bilgileri vs."></textarea>
                </div>
                <div class="card shadow-neutral-500 border border-primary mb-3 p-3">
                    <label class="form-label" for="year">Hasar Tarihi :</label>
                    <input type="datetime-local" class="form-control" id="year" name="hasar_tarihi" min="1950" max="{{ date('Y') }}" placeholder="Örnek: 2018">
                </div>

                <button type="submit" class="form-control btn-primary">İlan Oluştur</button>


            </form>
        </div>


@endsection
