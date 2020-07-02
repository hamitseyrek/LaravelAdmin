<?php

namespace App\Http\Controllers;

use App\Yazi;
use App\Yorum;
use Illuminate\Http\Request;

class YorumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $yorumlar = Yorum::all();
        return view("admin.yorumlar.index", compact("yorumlar"));
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
        $yorum = Yorum::find($id);
        return view("admin.yorumlar.edit", compact("yorum"));
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
            "yorum"=>"required",
        ));

        $yorum = Yorum::find($id);
        $yorum->yorum= request("yorum");

        $yorum->save();

        if($yorum){
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

    public function onayla($id)
    {
        $yorum = Yorum::find($id);
        $yorum->onay = 1;
        $yorum->save();

        if($yorum){
            alert()
                ->success("Onaylandı", "Güncelleme")
                ->autoclose(2000);
            return back();

        }
        else{
            alert()
                ->success("Başarısız", "İşlem")
                ->autoclose(2000);
        }
    }

    public function onaykaldir($id)
    {
        $yorum = Yorum::find($id);
        $yorum->onay = 0;
        $yorum->save();

        if($yorum){
            alert()
                ->success("Onay kaldırıldı", "Güncelleme")
                ->autoclose(2000);
            return back();

        }
        else{
            alert()
                ->success("Başarısız", "İşlem")
                ->autoclose(2000);
        }
    }

    public function destroy($id)
    {
        Yorum::destroy($id);


        alert()
            ->success("Silme Başarılı", "İşlem")
            ->autoclose(2000);
        return redirect()->route("yazilar.index");
    }
}
