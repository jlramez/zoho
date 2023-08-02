<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Post\PostBodyInterface;
use App\Models\Param;
use Carbon\Carbon;
 

class Invoices extends Component
{
   
    public $arrayinvoices=[];
   
    public function render()
    { 
        $record=Param::first();
        $time=$record->updated_at;
        $hour=carbon::parse($time);
        $actual_hour=carbon::parse(now())->toTimeString();
        $actual_date=carbon::parse(now())->toDateString();
        $update_hour=$hour->addMinutes(59)->toTimeString();
        $update_date=carbon::parse($time)->toDateString();
        //dd($actual_hour,$update_hour);
       if(($actual_hour>=$update_hour) && ($actual_date==$update_date))
            {            
                $client = new \GuzzleHttp\Client();
                $response = $client->request
                (
                    'POST', 'https://accounts.zoho.com/oauth/v2/token',
                    [
                            'form_params' => 
                            [
                                'refresh_token'=> $record->refresh_token,
                                'client_id' => $record->client_id,
                                'client_secret' => $record->client_secret,
                                'grant_type' => $record->grant_type,
                            ],
                    ]
                );
             $datart=json_decode($response->getBody()->getContents(),true);
             $access_token=$datart['access_token'];
             $record->access_token=$access_token;
             $record->save();
             $arrayinvoices=$this->refresh_token($access_token);
             
            }
            else
            {
                $access_token=$record->access_token;              
                $arrayinvoices=$this->refresh_token($access_token);
            }

            
       return view('livewire.invoices.view',
        [
            'invoices' => $arrayinvoices,
        ]);
    }
    public function refresh_token($access_token)
    {
        //dd('access token: '.$access_token);
        $authorization_code='Zoho-oauthtoken '.$access_token;
        
        $response = Http::withHeaders([
            'Authorization' => $authorization_code
        ])->get('https://www.zohoapis.com/books/v3/invoices');
       $datainvoices=json_decode($response->getBody()->getContents(),true); 
       //dd($datainvoices['invoices']);
       foreach($datainvoices['invoices'] as $row)
       {
        $invoices[]=$row;
       }
       
       return $invoices;
    }

}
