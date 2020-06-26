@extends('admin.template')

@section('content')
    <div class="widget-box">
        <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Tüm Kategoriler</h5>
        </div>
        <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
                <thead>
                <tr>
                    <th>Başlık</th>
                    <th>Türü</th>
                    <th>Açıklama</th>
                    <th>Slug</th>
                    <th>Düzenle</th>
                    <th>Sil</th>
                </tr>
                </thead>
                <tbody>
                @foreach($kategoriler as $kategori)
                <tr class="gradeX">
                    <td>{{$kategori->baslik}}</td>
                    <td>
                        @if(!empty($kategori->ust_id))
                        Alt Kategori
                        @else
                    Ana Kategori
                    @endif
                    </td>
                    <td>{{$kategori->aciklama}}</td>
                    <td class="center"><a href="{{route("kategoriler.edit",$kategori->id)}}" class="btn btn-success btn-mini"Düzenle></a></td>
                    {!! Form::model($kategori, ["route"=>["kategoriler.destroy", $kategori->id], "method"=>"DELETE"]) !!}
                    <td class="center"><button type="submit" value="Sil" class="btn btn-danger btn-mini">Sil</button> </td>
                    {!! Form::close() !!}
                </tr>
                    @foreach()
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
