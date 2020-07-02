@extends('admin.template')

@section('content')
    <div style="clear:both;"></div>
    <div class="widget-box">
        <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Yorumlar</h5>
        </div>
        <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
                <thead>
                <tr>
                    <th>Yazan</th>
                    <th>Yorum</th>
                    <th>İçerik</th>
                    <th>Tarih</th>
                    <th>Durum</th>
                    <th width="5%">Düzenle</th>
                    <th width="5%">Sil</th>
                </tr>
                </thead>
                <tbody>
                @foreach($yorumlar as $yorum)
                    <tr class="gradeX">
                        <td>{{$yorum->kullanici->name}}</td>
                        <td> {{$yorum->yorum}}</td>
                        <td>{{$yorum->yazi->baslik}}</td>
                        <td>{!! date("d-m-y", strtotime($yorum->created_at)) !!}}</td>
                        <td>
                            @if($yorum->onay==0)
                                <a href="{{route("yorum.onayla",$yorum->id)}}" class="btn btn-success btn-mini">Onayla</a>
                            @else
                                <a href="{{route("yorum.onaykaldir",$yorum->id)}}" class="btn btn-danger btn-mini">Onay Kaldır</a>
                            @endif
                        </td>
                        <td class="center"><a href="{{route("yorumlar.edit",$yorum->id)}}" class="btn btn-success btn-mini">Düzenle</a></td>
                        {!! Form::model($yorum, ["route"=>["yorumlar.destroy", $yorum->id], "method"=>"DELETE"]) !!}
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
