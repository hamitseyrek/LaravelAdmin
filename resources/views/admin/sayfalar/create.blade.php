@extends('admin.template')

@section('content')
    <div class="row-fluid">
        <div class="span6">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                    <h5>Yeni Sayfa ekle</h5>
                </div>
                <div class="widget-content nopadding">
                    {!! Form::open(["route"=>"sayfalar.store","method"=>"POST","class"=>"form-horizontal"]) !!}

                    <div class="control-group">
                        <label class="control-label">Sayfa Başlık :</label>
                        <div class="controls">
                            <input type="text" class="span11" name="baslik" />
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Açıklama :</label>
                        <div class="controls">
                            <textarea class="span11" name="icerik" ></textarea>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-success">Sayfa Ekle</button>
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
    {{-- <script src="https://cdn.tiny.cloud/1/h17f8np5gk4avzwyh666kkj9djjsavhtxvsbrt5kk8dpwe6o/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>tinymce.init({ selector: "textarea"})</script>
    --}}
@endsection
