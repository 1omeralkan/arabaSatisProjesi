@extends('panel.layout.app')

@section('content')


    <div class="card p-3">
        <h5>Marka Güncelleme</h5>
        @if($errors->any())
            @foreach($errors->all() as $error )
                {{$error}}
            @endforeach
        @endif
        <form action="{{route('admin.carBrand.Edit')}}" method="POST">
            @csrf
            <div>
                <label for="marka" class="form-label ">Marka Adı :</label>
                <input type="text" value="{{$brand->name}}" class="form-control " id="marka"  name="brandName">
                <button type="submit" class="btn btn-primary mt-2">Güncelle</button>
                <input type="hidden" value="{{$brand->id}}" name="brandID">
            </div>
        </form>


    </div>

@endsection
