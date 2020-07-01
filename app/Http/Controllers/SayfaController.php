<?php

namespace App\Http\Controllers;

use App\Kategori;
use App\Sayfa;
use App\Yazi;
use Illuminate\Http\Request;

class SayfaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $sayfalar = Sayfa::all();
        return view("admin.sayfalar.index", compact("sayfalar"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.sayfalar.create");
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

        $sayfa = Sayfa::create(request()->all());

        if($sayfa){
            alert()
                ->success("Sayfa Ekleme Başarılı", "İşlem")
                ->autoclose(2000);
            return back();

        }
        else{
            alert()
                ->success("Sayfa Ekleme Başarısız", "İşlem")
                ->autoclose(2000);
            return back();
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
        $sayfa = Sayfa::find($id);
        return view("admin.sayfalar.edit", compact("sayfa"));

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

        $sayfa = Sayfa::find($id);
        $bilgiler = $request->all();
        $sayfa->update($bilgiler);

        if($sayfa){
            alert()
                ->success("Sayfa Güncelleme Başarılı", "İşlem")
                ->autoclose(2000);
            return redirect()->route("sayfalar.index");

        }
        else{
            alert()
                ->success("Sayfa Güncelleme Başarısız", "İşlem")
                ->autoclose(2000);
            return back();
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
        Sayfa::destroy($id);


        alert()
            ->success("Silme Başarılı", "İşlem")
            ->autoclose(2000);
        return redirect()->route("sayfalar.index");
    }
}
