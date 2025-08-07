@extends('panel.layout.app')

@section('content')

    <div class="card ">
        <h3 class="p-3 text-center">Kullanıcılar</h3>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible" role="alert">
                {{session('success')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif


        <div class="table-responsive text-nowrap">
            <table class="table table-hover table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Kullanıcı Adı</th>
                    <th>E-Posta</th>
                    <th>Rolü</th>
                    <th>İşlemler</th>
                </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                @foreach($user as $u)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$u->name. ' '.$u->surname ?? 'Kullanıcı Bulunamadı '}}</td>
                        <td>{{$u->email}}</td>
                        <td>
                            @if($u->role==0)
                                Toyota Yetkilisi
                            @elseif($u->role==1)
                                Admin
                            @else
                                Satıcı
                            @endif
                        </td>
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                <form action="{{route('kullanici.rolGuncelle')}}" method="POST" class="d-flex gap-2">
                                    @csrf
                                    <input type="hidden" name="user_id" value="{{ $u->id }}">

                                    <select name="role" class="form-select form-select-sm" style="min-width: 150px;">
                                        <option value="0" {{ $u->role == 0 ? 'selected' : '' }}>Toyota Yetkilisi</option>
                                        <option value="1" {{ $u->role == 1 ? 'selected' : '' }}>Admin</option>
                                        <option value="2" {{ $u->role == 2 ? 'selected' : '' }}>Satıcı</option>
                                    </select>

                                    <button type="submit" class="btn btn-success btn-sm">Kaydet</button>
                                </form>

                                <a href="{{ route('delete', $u->id) }}" class="btn btn-danger btn-sm">Sil</a>
                            </div>
                        </td>

                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>


@endsection
