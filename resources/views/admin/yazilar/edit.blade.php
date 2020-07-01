@extends('admin.template')

@section('content')
    <div class="row-fluid">
        <div class="span6">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                    <h5>Yazı Düzenleme : {{$yazi->baslik}}</h5>
                </div>
                <div class="widget-content nopadding">
                    {!! Form::model($yazi, ["route"=>["yazilar.update", $yazi->id],"method"=>"PUT","class"=>"form-horizontal", "files"=>true]) !!}
                    <div class="control-group">
                        <label class="control-label">Kategori :</label>
                        <div class="controls">
                            <select name="kategori_id" class="span11">
                                    <option value="{{$yazi->kategorisi->id}}" selected> {{$yazi->kategorisi->baslik}}
                                     @foreach($kategoriler as $kategori)
                                        <option value="{{$kategori->id}}">
                                         {{$kategori->baslik}}
                                         </option>
                                    @endforeach
                                    </option>

                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Yazı Başlık :</label>
                        <div class="controls">
                            <input type="text" class="span11" name="baslik" value="{{$yazi->baslik}}" />
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Açıklama :</label>
                        <div class="controls">
                            <textarea  class="span11" name="aciklama">{{$yazi->icerik}}</textarea>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Slider içinde göster :</label>
                        <div class="controls">
                            <select name="slider" class="span11">
                                @if($yazi->slider== "goster")
                                <option value="goster" selected>Göster</option>
                                    <option value="gosterme">Gösterme</option>
                                @else
                                <option value="gosterme" selected>Gösterme</option>
                                    <option value="goster">Göster</option>
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <div><img border="0" src="/{{$yazi->resim}}" width="150" height="150"></div>
                        <label class="control-label">İçerik Resmi</label>
                        <div class="controls" >
                            <input type="file" class="span11" name="resim">
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-success">Yazı Düzenle</button>
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
