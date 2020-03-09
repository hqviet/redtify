<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function testApi(Request $request)
    {
        try {
            $api_key = '2205f7ef0ecefc2638d5d578f14181f4079b5f8c';
            $uri = 'http://rm.tspacevn.com';
            $time_entriest_uri = '/time_entries.json';
            $ch = \curl_init($uri . $time_entriest_uri. '?key='.$api_key);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_VERBOSE, 1);
            curl_setopt($ch, CURLOPT_HEADER, 1);
            curl_setopt($ch, CURLOPT_HTTPHEADER, [
                'Content-Type' => 'application/json',
            ]);
            $response = \curl_exec($ch);
            $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
            $header = substr($response, 0, $header_size);
            $body = substr($response, $header_size);
            \curl_close($ch);
            return response()->json([
                'header' => \json_decode($header),
                'body' => \json_decode($body)
            ]);
        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 400);
        }
    }
}
