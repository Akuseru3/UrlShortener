<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\shorturl;

class ShortUrlController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Getting first 100 links
        return shorturl::orderBy('addCount','desc')->limit(100)->get();
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $bigUrl = $request->input('bigUrl');
        $compactUrl = '';
        if (filter_var($bigUrl, FILTER_VALIDATE_URL) === FALSE) {
            $compactUrl = 'NOT URL';
            return view('ShortUrl.shorturl', compact('compactUrl'));
        }
        $nsfwFlag = false;
        if(isset($request->all()['nsfw'])){
            $nsfwFlag = true;
        }
        $shortUrl = shorturl::where('bigUrl', $bigUrl)->first();

        if(!$shortUrl){

            $this->validate($request, [
                'bigUrl'=>'required'
            ]);
            $shortUrl = new ShortUrl;
            $shortUrl->bigUrl = $bigUrl;
            $compactUrl = $this->createSmallUrl();
            $shortUrl->smallUrl = $compactUrl;
            $shortUrl->addCount = 1;
            $shortUrl->nsfw = $nsfwFlag;
            $shortUrl->save();

        }
        else{
            $compactUrl = $shortUrl->smallUrl;
            $shortUrl->addCount = $shortUrl->addCount+1;
            $shortUrl->save();
            
        }
        
        return view('ShortUrl.shorturl', compact('compactUrl'));
    }

    private function createSmallUrl(){
        $base = "https://smallUrl.com/";
        
        $charset = str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ");
	    $code = substr($charset, 0, 5);

        $fullSmallUrl = $base.$code;

        $shortUrlObj = shorturl::where('smallUrl', $fullSmallUrl)->first();
        if($shortUrlObj){
            $this->createSmallUrl();
        }
        
        return $fullSmallUrl;
    }

    public function linkRedirect($smallUrl){
        $base = "https://smallUrl.com/";
        $smallUrl =  $base.$smallUrl;
        $shortUrlObj = shorturl::where('smallUrl', $smallUrl)->first();
        if($shortUrlObj)
            return redirect($shortUrlObj->bigUrl);
    }

    public function linkReturn($smallUrl){
        $base = "https://smallUrl.com/";
        $smallUrl =  $base.$smallUrl;
        $shortUrlObj = shorturl::where('smallUrl', $smallUrl)->first();
        if($shortUrlObj)
            return $shortUrlObj->bigUrl;
        else
            return "URL CODE NOT FOUND";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return shorturl::findorFail($id);
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
        $shortUrl = shorturl::findorFail($id);
        $shortUrl->addCount = $shortUrl->addCount+1;
        $shortUrl->save();
        return $shortUrl;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $shortUrl = shorturl::find($id); //searching for object in database using ID
        if($shortUrl && $shortUrl->delete()){ //deletes the object
            return true;
        }
        else{
            return false;
        }
    }
}
