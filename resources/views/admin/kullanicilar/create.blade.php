@extends('admin.template')

@section('content')
    <div class="row-fluid">
        <div class="span6">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                    <h5>Yeni Kullanici ekle</h5>
                </div>
                <div class="widget-content nopadding">
                    <form method="POST" action="{{ route('kullanici.kayit') }}" class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                    <div class="control-group">
                        <label class="control-label">Yetki :</label>
                        <div class="controls">
                            <select name="yetki" class="span11">
                                <option value="user" selected>User</option>

                                    <option value="admin">
                                        Admin
                                    </option>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Kullanıcı Adı :</label>
                        <div class="controls">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                        <div class="control-group">
                            <label class="control-label">Email :</label>
                            <div class="controls">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    <div class="control-group">
                        <label class="control-label">Şifre :</label>
                        <div class="controls">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                        <div class="control-group">
                            <label class="control-label">Şifre :</label>
                            <div class="controls">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Avatar :</label>
                            <div class="controls">
                                <input  type="file" class="form-control" name="avatar" >
                            </div>
                        </div>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-success">Kullanıcı  Ekle</button>
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
@endsection
