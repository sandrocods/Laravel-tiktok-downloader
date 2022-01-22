<?php

namespace App\Http\Controllers;

use Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class GetDataController extends Controller
{
    public function getData(Request $request)
    {
        if ($request->isMethod('post')) {

            $validator = Validator::make($request->all(), [
                'urlvideo' => 'required|url|regex:/tiktok/m',
            ]);

            if ($validator->fails()) {
                Alert::error('Error', 'Please use valid url !');
                return redirect('/');
            }

            $headers = [
                'Host: www.tiktok.com',
                'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.71 Safari/537.36',
            ];

            $client = new \GuzzleHttp\Client();
            $response = $client->request('GET', $request->urlvideo, ['headers' => $headers, 'http_errors' => false]);

            if ($response->getStatusCode() == '404') {
                Alert::error('Error', 'Video Not Found !');
                return redirect('/');
            }
            $JsonDecode = json_decode(Str::between($response->getBody()->getContents(), "window['SIGI_STATE']=", ";window['SIGI_RETRY']="), true);
            return view('download', [
                'video_id' => $JsonDecode['ItemList']['video']['keyword'],
                'username' => $JsonDecode['ItemModule'][$JsonDecode['ItemList']['video']['keyword']]['author'],
                'nickname' => $JsonDecode['ItemModule'][$JsonDecode['ItemList']['video']['keyword']]['nickname'],
                'desc' => $JsonDecode['SEO']['metaParams']['description'],
                'play_url' => $JsonDecode['ItemModule'][$JsonDecode['ItemList']['video']['keyword']]['video']['playAddr'],
                'dynamic_cover' => $JsonDecode['ItemModule'][$JsonDecode['ItemList']['video']['keyword']]['video']['dynamicCover'],
            ]);

        } else {
            return view('index');
        }
    }

    public function downloadVideo(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'option' => 'required',
        ]);

        if ($validator->fails()) {
            Alert::error('Error', 'Please check your requests');
            return redirect('/');
        }

        if ($request->option == 'without_watermark') {
            $client = new \GuzzleHttp\Client();
            $response = $client->request(
                'GET',
                'https://api2.musical.ly/aweme/v1/aweme/detail/?aweme_id=' . $request->video_id,
                ['http_errors' => false]
            );
            $uri = json_decode($response->getBody()->getContents(), true)['aweme_detail']['video']['play_addr']['uri'];
            return redirect()->away('https://api2-16-h2.musical.ly/aweme/v1/play/?video_id=' . $uri . '&vr_type=0&is_play_url=1&source=PackSourceEnum_PUBLISH&media_type=4');
        } else {
            return redirect()->away($request->video_id);
        }

    }
}
