@extends('panel.layout.app')

@section('content')


    <div class="card p-3">
        <h5>Model Güncelleme</h5>
        @if($errors->any())
            @foreach($errors->all() as $error )
                {{$error}}
            @endforeach
        @endif
        <form action="{{route('admin.carBrandModel.Edit')}}" method="POST">
            @csrf
            <div>
                <label for="marka" class="form-label ">Model Adı :</label>
                <input type="text" value="{{$brandModel->name}}" class="form-control " id="marka"  name="brandModelName">
                <button type="submit" class="btn btn-primary mt-2">Güncelle</button>
                <input type="hidden" value="{{$brandModel->id}}" name="brandModel_id">
            </div>
        </form>


    </div>

@endsection
