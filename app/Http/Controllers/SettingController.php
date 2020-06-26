<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Alert;
use App\Setting;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings = Setting::find(1)->first();
        return view("admin.settings.create",compact("settings"));
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
        $this->validate(request(),array(
            "title"=>"required",
            "value"=>"required",
            "email"=>"required",
        ));

        $setting = Setting::find(1);
        $setting->title = request("title");
        $setting->value= request("value");
        $setting->email= request("email");
        $setting->save();

        // alert kısmı

        if($setting){
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
