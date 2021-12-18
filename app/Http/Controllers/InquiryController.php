<?php

namespace App\Http\Controllers;

use App\Models\Inquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Validator;

class InquiryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function form()
    {
        $errors = [];
        return view('inquiry.form', compact('errors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, Inquiry::$rules);//Inquiryモデルでもバリデーとルールつけてるからこれでもいいけど、メッセージが出ない。
        //$rules = [
        //'name' => 'required',
        //'email' => 'required',
        //'contents' => 'required',
        //];
        //$errors = [
            //'name.required' =>'名前を入力してください。',
            //'email.required' =>'メールアドレスを入力してください。',
            //'contents.required' =>'お問い合わせ内容を入力してください。',
            //];
        //$validator = Validator::make($request->all(), $rules, $errors);
        
        //if ($validator->fails()) {
                //return redirect('inquiry/form')
                    //->withErrors($validator)
                    //->withInput();
        //}
        
        //$param = [
            //'name' => $request->name,
            //'email' => $request->email,
            //'contents' => $request->contents,
        //];
        
        $inquiry = new Inquiry(); 
        
        $form = $request->all();
        unset($form['_token']);
        $inquiry->fill($form)->save();
        $flash_message = "お問い合わせを受け付けました。";
        
        return redirect()->route('inquiry.form')->with(compact('flash_message'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Inquiry  $inquiry
     * @return \Illuminate\Http\Response
     */
    public function show(Inquiry $inquiry)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Inquiry  $inquiry
     * @return \Illuminate\Http\Response
     */
    public function edit(Inquiry $inquiry)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Inquiry  $inquiry
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Inquiry $inquiry)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Inquiry  $inquiry
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inquiry $inquiry)
    {
        //
    }
}
