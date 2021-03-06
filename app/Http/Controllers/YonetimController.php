<?php

namespace App\Http\Controllers;

use App\Mail\iletisimformu;
use App\Setting;
use App\User;
use App\Yazi;
use App\Yorum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class YonetimController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $yazilar = Yazi::orderby("created_at","desc")->take(5)->get();
        $yorumlar = Yorum::orderby("created_at","desc")->take(5)->get();
        return view("admin.index", compact("yazilar", "yorumlar"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function kullanicilar(){
        $kullanicilar = User::all();
        return view("admin.kullanicilar.index", compact("kullanicilar"));
    }

    public function kullaniciekle(){
        return view("admin.kullanicilar.create");
    }

    public function kullanicikayit(request $request) {
        $this->validate(request(), array(
           "name"=>"required",
           "email"=>"required",
           "password"=>"required",
           "password_confirmation"=>"required",
        ));

        $kullanici = new User();
        $kullanici->name =request("name");
        $kullanici->email =request("email");
        $kullanici->yetki =request("yetki");

        if(request("password")!=request("password_confirmation")){
            alert()
                ->error("Şifreler eşleşmedi", "İşlem")
                ->autoclose(2000);
            return back();
        }else {
            $kullanici->password = Hash::make(request("password"));
        }

        if(request() ->hasFile("avatar")) {
            $this ->validate(request(), array("avatar" => "image|mimes:png,jpg,jpeg,gif|max:2048"));


        }

        $avatar = request()->file("avatar");
        $dosya_adi ="avatar" . "-" . time() . "." . $avatar->extension();

        if($avatar->isValid()){
            $hedef_klasor ="uploads/avatar-resimleri";
            $dosya_yolu = $hedef_klasor . "/" . $dosya_adi;
            $avatar->move($hedef_klasor, $dosya_adi);
            $kullanici->avatar = $dosya_yolu;
        }
        $kullanici->save();

        if($kullanici){
            alert()
                ->success("Kullanıcı Kaydı Başarılı", "İşlem")
                ->autoclose(2000);
            return back();

        }
        else{
            alert()
                ->success("Kullanıcı Kaydı Başarısız", "İşlem")
                ->autoclose(2000);
        }


    }

    public function kullaniciduzenle($id)
    {
        $kullanici = User::find($id);
        return view("admin.kullanicilar.edit", compact("kullanici"));
    }
        public function kullaniciguncelle($id){
        $this->validate(request(), array(
            "name"=>"required",
            "email"=>"required",));

        $kullanici = User::find($id);
        $kullanici->name =request("name");
        $kullanici->email =request("email");
        $kullanici->yetki =request("yetki");

        if(request("password")!=request("password_confirmation")){
            alert()
                ->error("Şifreler eşleşmedi", "İşlem")
                ->autoclose(2000);
            return back();
        }else {
            $kullanici->password = Hash::make(request("password"));
        }

        if(request() ->hasFile("avatar")) {
            $this ->validate(request(), array("avatar" => "image|mimes:png,jpg,jpeg,gif|max:2048"));


        }

        $avatar = request()->file("avatar");
        $dosya_adi ="avatar" . "-" . time() . "." . $avatar->extension();

        if($avatar->isValid()){
            $hedef_klasor ="uploads/avatar-resimleri";
            $dosya_yolu = $hedef_klasor . "/" . $dosya_adi;
            $avatar->move($hedef_klasor, $dosya_adi);
            $kullanici->avatar = $dosya_yolu;
        }

        $kullanici->save();

        if($kullanici){
            alert()
                ->success("Kullanıcı güncelleme Başarılı", "İşlem")
                ->autoclose(2000);
            return back();

        }
        else{
            alert()
                ->success("Kullanıcı Güncelleme Başarısız", "İşlem")
                ->autoclose(2000);
        }

    }

    public function kullanicisil($id){
        $sil = User::find($id)->delete();
        if($sil){
            alert()
                ->success("Kullanıcı silme Başarılı", "İşlem")
                ->autoclose(2000);
            return back();

        }
        else{
            alert()
                ->success("Kullanıcı silme Başarısız", "İşlem")
                ->autoclose(2000);
        }
    }

    public function cikis(){
        auth()->logout();
        return redirect("/login");
    }

    public function iletisim(){
        return view("admin.iletisimformu");
    }

    public function iletisimgonder(request $request){
        $this->validate(request(), array(
           "adsoyad"=>"required",
           "email"=>"required",
           "mesaj"=>"required",
        ));

        $ayar = Setting::find(1);
        $adress = $ayar->baslik;
        $mailadresim = $ayar->email;

        $bilgiler = array(
            "adsoyad"=>request("adsoyad"),
            "email"=>request("email"),
            "mesaj"=>request("mesaj"),
            "sitebaslik"=>$adress,
        );

        $gonder = Mail::to($mailadresim)->send(new iletisimformu($bilgiler));

        if($gonder){
            alert()
                ->success("Email gönderildi", "İşlem")
                ->autoclose(2000);
            return back();

        }
        else{
            alert()
                ->success("E-mail gönderilemedi", "İşlem")
                ->autoclose(2000);
        }
    }
}
