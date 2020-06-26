@extends('admin.template')

@section('content')
    <div class="row-fluid">
        <div class="span6">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                    <h5>Site Ayarları</h5>
                </div>
                <div class="widget-content nopadding">
                        {!! Form::model($settings,["route"=>["settings.update",1],"method"=>"PUT","files"=>"true","class"=>"form-horizontal"]) !!}
                        <div class="control-group">
                            <label class="control-label">Başlık :</label>
                            <div class="controls">
                                <input type="text" class="span11" name="title" value="{{$settings->title}}" />
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Açıklama :</label>
                            <div class="controls">
                                <input type="text" class="span11" name="value" value="{{$settings->value}}" />
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Email</label>
                            <div class="controls">
                                <input type="text"  class="span11" name="email" value="{{$settings->email}}"  />
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Message</label>
                            <div class="controls">
                                <textarea class="span11" ></textarea>
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-success">Update</button>
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
