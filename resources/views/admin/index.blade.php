@extends('admin.template')

@section('content')
    <div class="container-flusid">
        <hr>
        <div class="row-fluid">
            <div class="span6">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-file"></i> </span>
                        <h5>Yeni İçerikler</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <ul class="recent-posts">
                            @foreach($yazilar as $yazi)

                            <li>
                                <div class="user-thumb"> <img width="40" height="40" alt="User" src="/{{$yazi->resim}}"> </div>
                                <div class="article-post">
                                    <div class="fr"><a href="{{route("yazilar.edit", $yazi->id)}}" class="btn btn-primary btn-mini">Düzenle</a></div>
                                    <span class="user-info"> {{$yazi->kullanici->name}} - {!! date("d-m-y", strtotime($yazi->created_at)) !!} </span>
                                    <p><a href="/yazilar/{{$yazi->id}}/{{$yazi->slug}}" target="_blank">{{$yazi->baslik}}</a> </p>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

            </div>
            <div class="span6">

                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"><i class="icon-time"></i></span>
                        <h5>Yeni yorumlar</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <table class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>Yazan</th>
                                <th>Durum</th>
                                <th>İşlem</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($yorumlar as $yorum)
                            <tr>
                                <td class="taskDesc"><i class="icon-info-sign"></i> {{$yorum->kullanici->name}}</td>
                                <td class="taskStatus"><span class="in-progress">
                                        @if($yorum->onay==0)
                                            Onay Bekliyor
                                        @else
                                        Onaylandı
                                        @endif
                                    </span></td>
                                <td class="taskOptions"><a href="#" class="tip-top" data-original-title="Update"><i class="icon-ok"></i></a> <a href="#" class="tip-top" data-original-title="Delete"><i class="icon-remove"></i></a></td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <hr>

    </div>
@endsection

@section('css')

@endsection

@section('js')

@endsection
