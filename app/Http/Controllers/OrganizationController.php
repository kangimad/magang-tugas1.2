<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class OrganizationController extends Controller
{
    const API_URL = "http://localhost:8000/api/organizations";

    public function index(Request $request)
    {
        // - Laravel HTTP CLient setelah token diperlukan
        $current_url = url()->current();
        $url = static::API_URL;
        if ($request->input('page')) {
            $url .= "?page=" . $request->input('page');
        };
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Content-type' => 'application/json',
            'Authorization' => 'Bearer 4|p29fozrMpF86xBtTXa3FjrOAnx4vd2DM3WcQ3ncDbd94b105',
        ])->get($url);
        $data = $response['data'];
        foreach ($data['links'] as $key => $value) {
            $data['links'][$key]['new_url'] = str_replace(static::API_URL, $current_url, $value['url']);
        };

        // - Laravel HTTP CLient sebelum token diperlukan
        $current_url = url()->current();
        $url = static::API_URL;
        if ($request->input('page')) {
            $url .= "?page=" . $request->input('page');
        };
        $response = Http::get($current_url);
        $data = $response['data'];
        foreach ($data['links'] as $key => $value) {
            $data['links'][$key]['new_url'] = str_replace(static::API_URL, $current_url, $value['url']);
        };

        // $response = Http::withHeaders([
        //     'Accept' => 'application/json',
        //     'Content-type' => 'application/json',
        //     'Authorization' => 'Bearer 4|p29fozrMpF86xBtTXa3FjrOAnx4vd2DM3WcQ3ncDbd94b105',
        // ])->get("http://localhost:8000/api/organizations");
        // $data = $response['data'];
        // dd($data);

        // - GuzzleHttp Manual
        // $client = new Client();
        // $url = "http://localhost:8000/api/organizations";
        // $response = $client->request('GET', $url);
        // $content = $response->getBody()->getContents();
        // $contentArray = json_decode($content, true);
        // $data = $contentArray['data'];

        return view('organization.index', ['data' => $data]);
    }

    public function store(Request $request)
    {

        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Content-type' => 'application/json',
            'Authorization' => 'Bearer 4|p29fozrMpF86xBtTXa3FjrOAnx4vd2DM3WcQ3ncDbd94b105',
        ])
            ->post(
                'http://localhost:8000/api/organizations',
                [
                    'code' => $request->code,
                    'name' => $request->name,
                    'group_id' => $request->group_id,
                    'type_id' => $request->type_id,
                    'class' => $request->class,
                    'address' => $request->address,
                    'phone' => $request->phone,
                    'province_id' => $request->province_id,
                    'regency_id' => $request->regency_id,
                    'district_id' => $request->district_id,
                    'village_id' => $request->village_id,
                    'created_by' => $request->created_by,
                ]
            );

        $status = $response['status'];
        $message = $response['message'];
        $error = $response['data'];

        if ($status != true) {
            return redirect()->back()->withErrors($error)->withInput();
        } else {
            return redirect()->route('organization.index')->with('success', $message);
        }

        // $data = [
        //     'code' => $request->code,
        //     'name' => $request->name,
        //     'group_id' => $request->group_id,
        //     'type_id' => $request->type_id,
        //     'class' => $request->class,
        //     'address' => $request->address,
        //     'phone' => $request->phone,
        //     'province_id' => $request->province_id,
        //     'regency_id' => $request->regency_id,
        //     'district_id' => $request->district_id,
        //     'village_id' => $request->village_id,
        //     'created_by' => $request->created_by,
        // ];

        // $client = new Client();
        // $url = "http://localhost:8000/api/organizations";
        // $response = $client->request('POST', $url, [
        //     'headers' => [
        //         'Accept' => 'application/json',
        //         'Content-type' => 'application/json'
        //     ],
        //     'body' => json_encode($data),
        // ]);
        // $content = $response->getBody();
        // $contentArray = json_decode($content, true);
    }

    public function show(string $id)
    {
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Content-type' => 'application/json',
            'Authorization' => 'Bearer 4|p29fozrMpF86xBtTXa3FjrOAnx4vd2DM3WcQ3ncDbd94b105',
        ])->get('http://localhost:8000/api/organizations/' . $id);

        $status = $response['status'];
        $message = $response['message'];

        if ($status != true) {
            return redirect()->back()->withErrors($message);
        } else {
            $data = $response['data'];
            return view('organization.index', ['data' => $data]);
        }
    }

    public function update(Request $request, string $id)
    {
        // $id = $request->id;

        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Content-type' => 'application/json',
            'Authorization' => 'Bearer 4|p29fozrMpF86xBtTXa3FjrOAnx4vd2DM3WcQ3ncDbd94b105',
        ])
            ->put(
                'http://localhost:8000/api/organizations/' . $id,
                [
                    'code' => $request->code,
                    'name' => $request->name,
                    'group_id' => $request->group_id,
                    'type_id' => $request->type_id,
                    'class' => $request->class,
                    'address' => $request->address,
                    'phone' => $request->phone,
                    'province_id' => $request->province_id,
                    'regency_id' => $request->regency_id,
                    'district_id' => $request->district_id,
                    'village_id' => $request->village_id,
                    'created_by' => $request->created_by,
                ]
            );

        $status = $response['status'];
        $message = $response['message'];
        $error = $response['data'];

        if ($status != true) {
            return redirect()->back()->withErrors($error)->withInput();
        } else {
            return redirect()->route('organization.index')->with('success', $message);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Content-type' => 'application/json',
            'Authorization' => 'Bearer 4|p29fozrMpF86xBtTXa3FjrOAnx4vd2DM3WcQ3ncDbd94b105',
        ])->delete('http://localhost:8000/api/organizations/' . $id);

        // $status = $response['status'];
        $message = $response['message'];

        return redirect()->route('organization.index')->with('success', $message);
    }
}
