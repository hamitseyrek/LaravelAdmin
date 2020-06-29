@extends('admin.template')

@section('content')
    <div class="row-fluid">
        <div class="span6">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                    <h5>Kategori Düzenleme : {{$kategori->baslik}}</h5>
                </div>
                <div class="widget-content nopadding">
                    {!! Form::model($kategori, ["route"=>["kategoriler.update", $kategori->id],"method"=>"PUT","class"=>"form-horizontal"]) !!}
                    <div class="control-group">
                        <label class="control-label">Üst Kategori :</label>
                        <div class="controls">
                            <select name="ust_id" class="span11">
                                @foreach($tumkategoriler as $tumkategori)
                                    <option value="{{$tumkategori->id}}", {{$tumkategori->id == old("ust_id", $kategori->ust_id) ? "selected" : ""}}>
                                        {{$tumkategori->baslik}}
                                    </option>

                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Kategori Başlık :</label>
                        <div class="controls">
                            <input type="text" class="span11" name="baslik" value="{{$kategori->baslik}}" />
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Açıklama :</label>
                        <div class="controls">
                            <input type="text" class="span11" name="aciklama" value="{{$kategori->aciklama}}" />
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-success">Kategori Düzenle</button>
                    </div>
                    {!! Form::close() !!}
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
@endsection
