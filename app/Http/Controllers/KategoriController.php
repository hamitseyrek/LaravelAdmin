<?php

namespace App\Http\Controllers;
use App\Kategori;
use Illuminate\Http\Request;

use Illuminate\Support\Str;
class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategoriler = Kategori::all();
        return view("admin.kategoriler.index", compact("kategoriler"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategoriler = Kategori::WhereRaw("ust_id",null)->get();
        return view("admin.kategoriler.create",compact("kategoriler"));
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
            "aciklama"=>"required",
        ));

        $kategori = new Kategori();
        $kategori->baslik= request("baslik");
        $kategori->aciklama = request("aciklama");
        $kategori->slug=Str::slug(request("baslik","-"));
        $kategori->ust_id=request("ust_id");
        $kategori->save();

        if($kategori){
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
        $kategori = Kategori::find($id);
        $tumkategoriler = Kategori::all();
        return view("admin.kategoriler.edit", compact("kategori", "tumkategoriler"));
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
            "aciklama"=>"required",
        ));

        $kategori = Kategori::find($id);
        $kategori->baslik= request("baslik");
        $kategori->aciklama = request("aciklama");
        $kategori->slug=Str::slug(request("baslik","-"));
        $kategori->ust_id=request("ust_id");
        $kategori->save();

        if($kategori){
            alert()
                ->success("Güncelleme Başarılı", "İşlem")
                ->autoclose(2000);
            return redirect()->route("kategoriler.index");

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
        Kategori::destroy($id);


            alert()
                ->success("Silme Başarılı", "İşlem")
                ->autoclose(2000);
            return redirect()->route("kategoriler.index");


    }
}
