@extends('admin.template')

@section('content')
    <div style="float:right;margin: 15px 0 10px 0;"><a href="{{route("kullanici.ekle")}}" class="btn btn-success">Kullanıcı ekle</a>  </div>
    <div style="clear:both;"></div>
    <div class="widget-box">
        <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Tüm Kullanıcılar</h5>
        </div>
        <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
                <thead>
                <tr>
                    <th>Adı</th>
                    <th>email</th>
                    <th>Yetki</th>
                    <th>Düzenle</th>
                    <th>Sil</th>
                </tr>
                </thead>
                <tbody>
                @foreach($kullanicilar as $kullanici)
                    <tr class="gradeX">
                        <td>{{$kullanici->name}}</td>
                        <td>{{$kullanici->email}}
                        </td>
                        <td>{{$kullanici->yetki}}</td>
                        <td class="center"><a href="{{route("kullanici.duzenle",$kullanici->id)}}" class="btn btn-success btn-mini">Düzenle</a></td>
                        <form action="{{route("kullanici.sil", $kullanici->id)}}" method="POST">
                            {{csrf_field()}}
                            {{method_field('DELETE')}}
                       <td class="center"><button type="submit" value="Sil" class="btn btn-danger btn-mini">Sil</button> </td>
                        </form>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
@section('title', 'Page Title')

@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection

@section('css')
    <link rel="stylesheet" href="/admin/css/uniform.css" />
    <link rel="stylesheet" href="/admin/css/select2.css" />
@endsection
@section('js')
    <script src="/admin/js/excanvas.min.js" ></script>
    <script src="/admin/js/jquery.min.js" ></script>
    <script src="/admin/js/jquery.ui.custom.js" ></script>
    <script src="/admin/js/bootstrap..min.js" ></script>

    <script src="/admin/js/jquery.dataTables.min.js" ></script>
    <script src="/admin/js/matrix.tables.js" ></script>

@endsection
