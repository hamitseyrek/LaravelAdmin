@extends('admin.template')

@section('content')
    <div class="row-fluid">
        <div class="span6">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                    <h5>Yeni Kategori ekle</h5>
                </div>
                <div class="widget-content nopadding">
                    <form action="{{route('kategoriler.store')}}" method="POST" class="form-horizontal" onsubmit="return ajaxekle();" id="ajax-form">
                        {{csrf_field()}}

                    <div class="control-group">
                        <label class="control-label">Üst Kategori :</label>
                        <div class="controls">
                            <select name="ust_id" class="span11">
                                <option value="" selected>Üst Kategori</option>
                                @foreach($kategoriler as $kategori)
                                    <option value="{{$kategori->id}}">
                                        {{$kategori->baslik}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Kategori Başlık :</label>
                        <div class="controls">
                            <input type="text" class="span11" name="baslik" />
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Açıklama :</label>
                        <div class="controls">
                            <input type="text" class="span11" name="aciklama" />
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-success">Kategori Ekle</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('title', 'Page Title')

@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection

@section('css')
@endsection
@section('js')
    <script>

        function ajaxekle() {
            let form = $("#ajax-form");
            let form_data = $("#ajax-form").serialize(); // form içindeki tüm datalar alındı

            $.ajaxSetup({
                headers:{
                    //form içerisinde token değerini bulup gönderir
                    "x-csrf-token" : $('meta[name="token"]').attr('content')
                }
            });
            $.ajax( // ajax veri gönderme kısmı
                {
                type:'POST',
                url:'{{route('kategoriler.store')}}',
                data: form_data,
                   // dataType : "json",
                success:function (){
                    $.dialog({
                        title: 'Başarılı!',
                        content: 'Yeni kategori eklendi!',
                        boxWidth: '30%',
                        useBootstrap: false,
                    });
                    //formu resetleme boşaltma kısmı
                    document.getElementById("ajax-form").reset();
                }
                });
            return false; // hata varsa geri döndürsün
        }
    </script>
@endsection
