@extends('panel.layout.app')

@section('content')
    <div class="card p-3">
        <h3>Model Listesi  <a href="{{route('admin.carBrandModel.create')}}" class="btn btn-primary float-end">Model oluştur</a>  </h3>

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
                        <th>Markanın Modeli</th>
                        <th>Durumu</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($carBrandModel as $carBrandModel)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>
                                <i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$carBrandModel->carBrand->name ?? 'Marka bulunamadı'}}</strong>
                            </td>
                            <td>
                                <i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$carBrandModel->name}}</strong>
                            </td>

                            <td>
                                @if($carBrandModel->deleted_at==null)
                                    Aktif
                                @else
                                    Silindi
                                @endif
                            </td>


                            <td>
                                <div class="dropdown">
                                    <a href="{{route('admin.carBrandModel.update',$carBrandModel->id)}}" class="btn btn-success">Güncelle</a>
                                    <a href="{{route('admin.carBrandModel.delete',$carBrandModel->id)}}" class="btn btn-danger">Sil</a>
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
