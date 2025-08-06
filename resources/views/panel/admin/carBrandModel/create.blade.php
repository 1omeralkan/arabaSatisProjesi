@extends('panel.layout.app')

@section('content')


    <div class="card p-3">
        <h5>Model Ekleme</h5>
        @if($errors->any())
            @foreach($errors->all() as $error )
                {{$error}}
            @endforeach
        @endif
        <form action="{{route('admin.carBrandModel.Add')}}" method="POST">
            @csrf
            <div>
                <label for="model" class="form-label ">Model Adı :</label>
                <input type="text" class="form-control " id="model" placeholder="Lütfen model adı giriniz." name="brandModelName">

                <label for="as" class="form-label ">Marka Adı :</label>
                <select name="brand_id" id="as" class="form-control ">

                    @foreach($carBrand as $carBrand)
                        <option value="{{$carBrand->id}}">{{$carBrand->name}}</option>
                    @endforeach
                </select>
                <button type="submit" class="btn btn-primary mt-2">Ekle</button>
            </div>

        </form>

    </div>

@endsection
