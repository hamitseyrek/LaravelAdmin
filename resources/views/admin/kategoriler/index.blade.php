@extends('admin.template')

@section('content')
    <div style="float:right;margin: 15px 0 10px 0;"><a href="{{route("kategoriler.create")}}" class="btn btn-success">Kategori ekle</a>  </div>
    <div style="clear:both;"></div>
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
                    <td>{{$kategori->slug}}</td>
                    <td class="center"><a href="{{route("kategoriler.edit",$kategori->id)}}" class="btn btn-success btn-mini">Düzenle</a></td>

                    <form action="{{action("KategoriController@destroy",$kategori->id)}}" method="POST" id="kategorisil">
                        {{method_field('delete')}}
                        {{csrf_field()}}
                    <td class="center"><button type="submit" value="Sil" class="btn btn-danger btn-mini sil" id="silbtn" data-id="{{$kategori->id}}">Sil</button> </td>
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

    <script>
        $('.sil').on("click", function (e) {
            //tüm verileri inputData değişkenine alıyoruz
            let inputData = $("#kategorisil").serialize();
            let dataId = $("#silbtn").attr("data-id");

        $.ajaxSetup({
                headers:{
                    //form içerisinde token değerini bulup gönderir
                    "x-csrf-token" : $('meta[name="token"]').attr('content')
                }
            });

            // ajax kısmı
            $.ajax({
                url:"{{url("yonetim/kategoriler")}}"+"/"+dataId,
                type:"POST",
                data: inputData,
                success:function (){
                    $.dialog({
                        title: 'Başarılı!',
                        content: 'Yeni kategori silindi!',
                        boxWidth: '30%',
                        useBootstrap: false,
                    });
                    //tabloyu yenileme
                    setInterval("window.location.reload()", 2500);
                }
            });
            return false;
        })
    </script>

@endsection
