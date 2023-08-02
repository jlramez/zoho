<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Post\PostBodyInterface;

class Persons extends Component
{
    public function render()
    {
       $x_ca_key='21030946';
       $x_ca_signature='Tuby8I07NGjs0PBDsWjSdJGXbcYeok1v4ieE+PCpRnc=';
       $x_ca_signature_headers='x-ca-key';
       //body
       $pageNo='1';
       $pageSize='100';
       $body = [           
            "pageNo" => 1,
            "pageSize" => 100
        ];
        $bodyjson=json_encode($body);
        // dd($bodyjson);
        $responsehv = Http::
        withHeaders([
          'x-ca-key' => '21030946',
          'x-ca-signature' => 'oib/evxLyyPieO3XIxBKbfQiBkm+KiB6lrK0pOIcM4A=',
          'x-ca-signature-headers' => 'x-ca-key',
          'Content-Type' => 'application/json',
          'Accept' => '*/*'

        ])->post('https://52.26.7.30/artemis/api/common/v1/version');
        $datahv=json_decode($responsehv->getBody()->getContents()); 
            //dd($responsehv->json());
            $responsehp = Http::
            withHeaders([
              'x-ca-key' => '21030946',
              'x-ca-signature' => 'Tuby8I07NGjs0PBDsWjSdJGXbcYeok1v4ieE+PCpRnc=',
              'x-ca-signature-headers' => 'x-ca-key',
              'Content-Type' => 'application/json',
              'Accept' => '*/*'
    
            ])
            ->withBody(json_encode([
                "pageNo" => 1,
                "pageSize" => 500
            ]))
            ->post('https://52.26.7.30/artemis/api/resource/v1/person/personList');
            $datahp=json_decode($responsehp->getBody()->getContents(),true); 
                //dd($datahp->data->list);
                
                //dd($datahp);
                
       return view('livewire.persons.view',
        [
            'persons' => $datahp,
        ]);
    }
    public function edit($idPerson)
    {
        $record = Param::findOrFail($id);
        $this->selected_id = $id; 
		$this->code = $record-> code;
		$this->redirect_url = $record-> redirect_url;
		$this->client_id = $record-> client_id;
		$this->client_secret = $record-> client_secret;
		$this->grant_type = $record-> grant_type;
		$this->refresh_token = $record-> refresh_token;
    }
}
