<?php

namespace App\Services\ECommerce;

use Illuminate\Support\Facades\Http;

/**
 * Class WooCommerceService
 * @package App\Services
 */
class WooCommerceService
{

    // **USAGE**
    // woocommerce docs = https://woocommerce.github.io/woocommerce-rest-api-docs/
    // $ck = woocommerce API consumer_key
    // $cs = woocommerce API consumer_secret_key
    // $baseUrl = https://domain.com/ (must be ssl -https://)
    // $suffix = wp-json/wc/v3/{something}

    //API Keys
    //ck_fa9c7f67685a4912d91164b74dd6fd8750b310da
    //secret : cs_d1cbab3c3a9f81a5b7fe2b20c51e1add787877ce

    public function batchUpdate($ck,$cs,$baseUrl,$data=[])
    {
        $headers =[];

        $url = $baseUrl.'wp-json/wc/v3/products/batch'.'?consumer_key='.$ck.'&consumer_secret='.$cs;

        $response = Http::withHeaders($headers)->post($url,$data);

        
      if($response->status() == 200) {
        return response($response->json(),200);
        } else {
            return response(json_encode("Something went wrong",403));
        }
    }
    
    public function deleteProduct($ck,$cs,$baseUrl,$id)
    {
        $headers =[];

        $url = $baseUrl.'wp-json/wc/v3/products/'.$id.'?consumer_key='.$ck.'&consumer_secret='.$cs;
        
        $response = Http::withHeaders($headers)->delete($url,$data=[]);

        
      if($response->status() == 201) {
        return response($response->json(),200);
        } else {
            return response(json_encode("Something went wrong",403));
        }
    }


    public function updateProduct($ck,$cs,$baseUrl,$id)
    {
        $headers =[];

        $url = $baseUrl.'wp-json/wc/v3/products/'.$id.'?consumer_key='.$ck.'&consumer_secret='.$cs;
        
        $response = Http::withHeaders($headers)->put($url,$data=[]);

        
      if($response->status() == 201) {
        return response($response->json(),200);
        } else {
            return response(json_encode("Something went wrong",403));
        }
    }

    public function allProducts($ck,$cs,$baseUrl)
    {
        $headers =[];

        $url = $baseUrl.'wp-json/wc/v3/products'.'?consumer_key='.$ck.'&consumer_secret='.$cs;

        $response = Http::withHeaders($headers)->get($url);

        
      if($response->status() == 200) {
        return response($response->json(),200);
        } else {
            return response(json_encode("Something went wrong",403));
        }

    }
    public function addProduct($ck,$cs,$baseUrl,$data=[])
    {
        $headers =[];

        $url = $baseUrl.'wp-json/wc/v3/products'.'?consumer_key='.$ck.'&consumer_secret='.$cs;

        $response = Http::withHeaders($headers)->post($url,$data);

        
      if($response->status() == 200) {
        return response($response->json(),200);
        } else {
            return response(json_encode("Something went wrong",403));
        }

    }

    public function post($ck,$cs,$suffix,$baseUrl,$data=[])
    {
        $headers =[];

        $url = $baseUrl.$suffix.'?consumer_key='.$ck.'&consumer_secret='.$cs;

        $response = Http::withHeaders($headers)->post($url,$data);

        
      if($response->status() == 200) {
        return response($response->json(),200);
        } else {
            return response(json_encode("Something went wrong",403));
        }

        

    }

    public function get($ck,$cs,$suffix,$baseUrl)
    {
        $headers =[];

        $url = $baseUrl.$suffix.'?consumer_key='.$ck.'&consumer_secret='.$cs;

        $response = Http::withHeaders($headers)->get($url);

        
      if($response->status() == 200) {
        return response($response->json(),200);
        } else {
            return response(json_encode("Something went wrong",403));
        }

        

    }




}
