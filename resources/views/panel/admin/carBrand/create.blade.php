@extends('panel.layout.app')

@section('content')


    <div class="card p-3">
        <h5>Marka Ekleme</h5>
        @if($errors->any())
            @foreach($errors->all() as $error )
                {{$error}}
            @endforeach
        @endif
        <form action="{{route('admin.carBrand.Add')}}" method="POST">
            @csrf
            <div>
                <label for="marka" class="form-label ">Marka Adı :</label>
                <input type="text" class="form-control " id="marka" placeholder="Lütfen marka adı giriniz." name="brandName">
                <button type="submit" class="btn btn-primary mt-2">Ekle</button>
            </div>
        </form>


    </div>

@endsection
