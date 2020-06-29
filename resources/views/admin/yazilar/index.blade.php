@extends('admin.template')

@section('content')
    <div style="float:right;margin: 15px 0 10px 0;"><a href="{{route("yazilar.create")}}" class="btn btn-success">Yazı ekle</a>  </div>
    <div style="clear:both;"></div>
    <div class="widget-box">
        <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Tüm Yazılar</h5>
        </div>
        <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
                <thead>
                <tr>
                    <th>Başlık</th>
                    <th>Kategori</th>
                    <th>İçerik</th>
                    <th>Yazar</th>
                    <th>Düzenle</th>
                    <th>Sil</th>
                </tr>
                </thead>
                <tbody>
                @foreach($yazilar as $yazi)
                    <tr class="gradeX">
                        <td>{{$yazi->baslik}}</td>
                        <td>
                            {{$yazi->kategorisi->baslik}}
                        </td>
                        <td>{{$yazi->icerik}}</td>
                        <td>{{$yazi->kullanici->name}}</td>
                        <td class="center"><a href="{{route("yazilar.edit",$yazi->id)}}" class="btn btn-success btn-mini">Düzenle</a></td>
                        {!! Form::model($yazi, ["route"=>["yazilar.destroy", $yazi->id], "method"=>"DELETE"]) !!}
                        <td class="center"><button type="submit" value="Sil" class="btn btn-danger btn-mini">Sil</button> </td>
                        {!! Form::close() !!}
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
