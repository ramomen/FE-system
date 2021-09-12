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

    /* PAYMENT */

    public function allPaymentGateways($ck,$cs,$baseUrl)
    {
        $suffix = "wp-json/wc/v3/payment_gateways";
        $this->get($ck,$cs,$suffix,$baseUrl);
    }

    public function storeGateway($ck,$cs,$baseUrl,$id)
    {
        $suffix = "wp-json/wc/v3/payment_gateways/".$id;
        $this->get($ck,$cs,$suffix,$baseUrl);
    }

    public function updateGateway($ck,$cs,$baseUrl,$id,$data)
    {   
        $suffix = "/wp-json/wc/v3/payment_gateways/".$id;
        $this->put($ck,$cs,$suffix,$baseUrl,$data);
    }


    /* TAX RATES */

    public function batchTax($ck,$cs,$baseUrl,$data=[])
    {
        $headers =[];

        $url = $baseUrl.'wp-json/wc/v3/taxes/batch'.'?consumer_key='.$ck.'&consumer_secret='.$cs;

        $response = Http::withHeaders($headers)->post($url,$data);

        
      if($response->status() == 201) {
        return response($response->json(),200);
        } else {
            return response(json_encode("Something went wrong",403));
        }
    }


    public function allTaxes($ck,$cs,$baseUrl)
    {
        $headers =[];

        $url = $baseUrl.'wp-json/wc/v3/taxes'.'?consumer_key='.$ck.'&consumer_secret='.$cs;

        $response = Http::withHeaders($headers)->get($url);

        
      if($response->status() == 200) {
        return response($response->json(),200);
        } else {
            return response(json_encode("Something went wrong",403));
        }

    }

    public function updateTax($ck,$cs,$baseUrl,$id,$data =[])
    {
        $headers =[];

        $url = $baseUrl.'wp-json/wc/v3/taxes/'.$id.'?consumer_key='.$ck.'&consumer_secret='.$cs;
        
        $response = Http::withHeaders($headers)->put($url,$data);

        
      if($response->status() == 201) {
        return response($response->json(),200);
        } else {
            return response(json_encode("Something went wrong",403));
        }
    }

    public function deleteTax($ck,$cs,$baseUrl,$id)
    {
        $headers =[];

        $url = $baseUrl.'/wp-json/wc/v3/taxes/'.$id.'?consumer_key='.$ck.'&consumer_secret='.$cs;
        
        $response = Http::withHeaders($headers)->delete($url,$data=[]);

        
      if($response->status() == 201) {
        return response($response->json(),200);
        } else {
            return response(json_encode("Something went wrong",403));
        }
    }

    public function storeTax($ck,$cs,$baseUrl,$id)
    {
        $headers =[];

        $url = $baseUrl.'/wp-json/wc/v3/taxes/'.$id.'?consumer_key='.$ck.'&consumer_secret='.$cs;
        
        $response = Http::withHeaders($headers)->get($url,$data=[]);

        
      if($response->status() == 200) {
        return response($response->json(),200);
        } else {
            return response(json_encode("Something went wrong",403));
        }
    }

    /* REPORTS*/
    public function salesReport($ck,$cs,$baseUrl)
    {
        $suffix = "wp-json/wc/v3/reports/sales";
        $this->get($ck,$cs,$baseUrl,$suffix);

    }

    public function topSellersReport($ck,$cs,$baseUrl)
    {
        $suffix = "wp-json/wc/v3/reports/top_sellers";
        $this->get($ck,$cs,$baseUrl,$suffix);

    }

    public function couponsReport($ck,$cs,$baseUrl)
    {
        $suffix = "wp-json/wc/v3/reports/coupons/totals";
        $this->get($ck,$cs,$baseUrl,$suffix);

    }

    public function customersReport($ck,$cs,$baseUrl)
    {
        $suffix = "wp-json/wc/v3/reports/customers/totals";
        $this->get($ck,$cs,$baseUrl,$suffix);

    }

    public function ordersReport($ck,$cs,$baseUrl)
    {
        $suffix = "wp-json/wc/v3/reports/orders/totals";
        $this->get($ck,$cs,$baseUrl,$suffix);

    }

    public function productsReport($ck,$cs,$baseUrl)
    {
        $suffix = "wp-json/wc/v3/reports/reviews/totals";
        $this->get($ck,$cs,$baseUrl,$suffix);

    }
    
     
    public function allReports($ck,$cs,$baseUrl)
    {
        $headers =[];

        $url = $baseUrl.'wp-json/wc/v3/reports'.'?consumer_key='.$ck.'&consumer_secret='.$cs;

        $response = Http::withHeaders($headers)->get($url);

        
      if($response->status() == 200) {
        return response($response->json(),200);
        } else {
            return response(json_encode("Something went wrong",403));
        }

    }

    /* CATEGORIES */
    public function batchCategories($ck,$cs,$baseUrl,$data=[])
    {
        $headers =[];

        $url = $baseUrl.'wp-json/wc/v3/products/categories/batch'.'?consumer_key='.$ck.'&consumer_secret='.$cs;

        $response = Http::withHeaders($headers)->post($url,$data);

        
      if($response->status() == 201) {
        return response($response->json(),200);
        } else {
            return response(json_encode("Something went wrong",403));
        }
    }


    public function allCategories($ck,$cs,$baseUrl)
    {
        $headers =[];

        $url = $baseUrl.'wp-json/wc/v3/products/categories'.'?consumer_key='.$ck.'&consumer_secret='.$cs;

        $response = Http::withHeaders($headers)->get($url);

        
      if($response->status() == 200) {
        return response($response->json(),200);
        } else {
            return response(json_encode("Something went wrong",403));
        }

    }

    public function updateCategory($ck,$cs,$baseUrl,$id)
    {
        $headers =[];

        $url = $baseUrl.'wp-json/wc/v3/products/categories/'.$id.'?consumer_key='.$ck.'&consumer_secret='.$cs;
        
        $response = Http::withHeaders($headers)->put($url,$data=[]);

        
      if($response->status() == 201) {
        return response($response->json(),200);
        } else {
            return response(json_encode("Something went wrong",403));
        }
    }

    public function deleteCategory($ck,$cs,$baseUrl,$id)
    {
        $headers =[];

        $url = $baseUrl.'wp-json/wc/v3/products/categories/'.$id.'?consumer_key='.$ck.'&consumer_secret='.$cs;
        
        $response = Http::withHeaders($headers)->delete($url,$data=[]);

        
      if($response->status() == 201) {
        return response($response->json(),200);
        } else {
            return response(json_encode("Something went wrong",403));
        }
    }




    /* Products */

    public function batchUpdate($ck,$cs,$baseUrl,$data=[])
    {
        $headers =[];

        $url = $baseUrl.'wp-json/wc/v3/products/batch'.'?consumer_key='.$ck.'&consumer_secret='.$cs;

        $response = Http::withHeaders($headers)->post($url,$data);

        
      if($response->status() == 201) {
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


    /* HTTP Actions */

    public function put($ck,$cs,$suffix,$baseUrl,$data=[])
    {
        $headers =[];

        $url = $baseUrl.$suffix.'?consumer_key='.$ck.'&consumer_secret='.$cs;

        $response = Http::withHeaders($headers)->put($url,$data);

        
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
