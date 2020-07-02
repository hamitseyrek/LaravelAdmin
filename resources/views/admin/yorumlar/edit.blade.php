@extends('admin.template')

@section('content')
    <div class="row-fluid">
        <div class="span6">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                    <h5>Yorum Düzenleme</h5>
                </div>
                <div class="widget-content nopadding">
                    {!! Form::model($yorum, ["route"=>["yorumlar.update", $yorum->id],"method"=>"PUT","class"=>"form-horizontal"]) !!}

                    <div class="control-group">
                        <label class="control-label">Yorum Yazarı :</label>
                        <div class="controls">
                            <input type="text" class="span11" name="baslik" value="{{$yorum->kullanici->name}}" disabled />
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">yorum :</label>
                        <div class="controls">
                            <textarea class="span11" name="yorum" >{!! $yorum->yorum !!}</textarea>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-success">Yorumu Kaydet</button>
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
