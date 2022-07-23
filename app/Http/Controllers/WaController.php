<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class WaController extends Controller
{
    public function index()
    {
        return view('teswa');
    }   

    public function store(Request $request)
    {
        $request->validate([
            'nomer' => 'required',
            'message' => 'required',
        ]);

        $response = Http::withHeaders([
            'device-key' => 'c156115c-5d23-4ab6-9afd-e65aef1ebd1c',
            'content-type' => 'application/json'
        ])->post('https://chatfire.alghiffaryenterprise.id/api/messages/send-text', [
            'to' => $request->nomer,
            'message' => $request->message,
            'reply_for'  => 0
        ]);

        return $response;
    }
}
