@extends('panel.layout.app')

@section('content')
    <div class="card p-3">
        <h3>Araba Listesi  <a href="{{route('admin.carBrand.create')}}" class="btn btn-primary float-end">Araç oluştur</a>  </h3>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible" role="alert">
                {{session('success')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="card-body">
            <div class="table-responsive text-nowrap">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Araba Markası</th>
                        <th>Durumu</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($carBrands as $carBrands)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>
                                <i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$carBrands->name}}</strong>
                            </td>
                            <td>
                                @if($carBrands->deleted_at==null)
                                    Aktif
                                @else
                                    Silindi
                                @endif
                                </td>


                            <td>
                                <div class="dropdown">
                                    <a href="{{route('admin.carBrand.update',$carBrands->id)}}" class="btn btn-success">Güncelle</a>
                                    <a href="{{route('admin.carBrand.delete',$carBrands->id)}}" class="btn btn-danger">Sil</a>
                                </div>
                            </td>


                        </tr>
                    @endforeach



                    </tbody>
                </table>
            </div>
        </div>

    </div>


@endsection
