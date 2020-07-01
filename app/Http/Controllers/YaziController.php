<?php

namespace App\Http\Controllers;

use App\Kategori;
use App\Yazi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class YaziController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $yazilar = Yazi::all();
        return view("admin.yazilar.index", compact("yazilar"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategoriler = Kategori::all();
        return view("admin.yazilar.create", compact("kategoriler"));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(), array(
            "baslik"=>"required",
            "icerik"=>"required",
        ));

        $yazi = new Yazi();
        $yazi->baslik= request("baslik");
        $yazi->icerik = request("icerik");
        $yazi->user_id=Auth::user()->id;
        $yazi->slider=request("slider");
        $yazi->kategori_id = request("kategori_id");

        if(request() ->hasFile("resim")) {
            $this ->validate(request(), array("resim" => "image|mimes:png,jpg,jpeg,gif|max:2048"));

        }

        $resim = request()->file("resim");
        $dosya_adi ="resim" . "-" . time() . "." . $resim->extension();

        if($resim->isValid()){
            $hedef_klasor ="uploads/icerik-resimleri";
            $dosya_yolu = $hedef_klasor . "/" . $dosya_adi;
            $resim->move($hedef_klasor, $dosya_adi);
            $yazi->resim = $dosya_yolu;
        }
        $yazi->save();

        if($yazi){
            alert()
                ->success("Başarılı", "İşlem")
                ->autoclose(2000);
            return back();

        }
        else{
            alert()
                ->success("Başarısız", "İşlem")
                ->autoclose(2000);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $yazi = Yazi::find($id);
        $kategoriler = Kategori::all();
        return view("admin.yazilar.edit", compact("yazi", "kategoriler"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate(request(), array(
            "baslik"=>"required",
            "icerik"=>"required",
        ));

        $yazi = Yazi::find($id);
        $yazi->baslik= request("baslik");
        $yazi->icerik = request("icerik");
        $yazi->user_id= $yazi->user_id;
        $yazi->kategori_id=request("kategori_id");
        $yazi->slider=request("slider");

        if(request() ->hasFile("resim")) {
            $this ->validate(request(), array("resim" => "image|mimes:png,jpg,jpeg,gif|max:2048"));


        }

        $resim = request()->file("resim");
        $dosya_adi ="resim" . "-" . time() . "." . $resim->extension();

        if($resim->isValid()){
            $hedef_klasor ="uploads/icerik-resimleri";
            $dosya_yolu = $hedef_klasor . "/" . $dosya_adi;
            $resim->move($hedef_klasor, $dosya_adi);
            $yazi->resim = $dosya_yolu;
        }

        $yazi->save();

        if($yazi){
            alert()
                ->success("Başarılı", "Güncelleme")
                ->autoclose(2000);
            return back();

        }
        else{
            alert()
                ->success("Başarısız", "İşlem")
                ->autoclose(2000);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Yazi::destroy($id);


        alert()
            ->success("Silme Başarılı", "İşlem")
            ->autoclose(2000);
        return redirect()->route("yazilar.index");
    }
}
