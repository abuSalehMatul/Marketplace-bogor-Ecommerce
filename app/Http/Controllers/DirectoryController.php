<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SectorCategory;
use App\Models\SectorListing;
use App\Models\Country;
use App\Models\CountryListing;
use App\Models\SectorPurchase;
use App\Models\CountryPurchase;
use Srmklive\PayPal\Services\ExpressCheckout;
use Input;
use Response;
use Session;

class DirectoryController extends Controller {

    public function SectorDirectory($slug) {
        $sector = SectorCategory::where('sector_slug', $slug)->first();
        $data = SectorListing::where('sector_id', $sector->id)->first();
        return view('directory.sector', compact('sector', 'data'));
    }

    public function CountryDirectory($slug) {
        $country = Country::where('country_slug', $slug)->first();
        $data = CountryListing::where('country_id', $country->id)->first();
        return view('directory.country', compact('country', 'data'));
    }

    public function DirectoryList() {
        return view('directory.list');
    }

    public function DownloadSectorDirectory(Request $request, $id) {
        $row = SectorListing::find($id);
        $provider = new ExpressCheckout;
        $data = [];
        $data['items'] = [
                [
                'name' => $row->title . "-$row->id",
                'price' => $row->price,
                'qty' => 1,
            ]
        ];

        $data['invoice_id'] = "SD" . date('Ymd') . rand(100, 999);
        //$data['custom'] = "myland";
        $data['invoice_description'] = "Order #{$data['invoice_id']} Invoice";
        $data['return_url'] = url('/sector-diretory-purchase/payment-success');
        $data['cancel_url'] = url('/sector-diretory-purchase/purchase-cancel');
        $data['total'] = $row->price;
        //give a discount of 10% of the order amount
        $data['shipping_discount'] = 0;
        //$provider->setCurrency('EUR')->setExpressCheckout($data);//Set Cuurency
        $response = $provider->setExpressCheckout($data);

        return redirect($response['paypal_link']);
    }

    public function SuccessPaymentSectorDirectory() {
        $provider = new ExpressCheckout;
        $token = Input::get('token');
        $response = $provider->getExpressCheckoutDetails($token);
        //dd($response);
        $status = $response['ACK'];

        if ($status) {
            $plan = $response['L_NAME0'];
            $email_id = $response['EMAIL'];
            //echo substr($plan, strpos($plan, '-'));
            $id = substr($plan, strpos($plan, '-') + 1);
            $row = SectorListing::find($id);
            $invoice_no = $response['INVNUM'];
            $data = new SectorPurchase;
            $data->sector_id = $id;
            $data->email_id = $email_id;
            $data->invoice_no = $invoice_no;
            $data->purchase_price = $row->price;
            $data->save();


            Session::put('sectordata', $data);
            session()->flash('success_msg', "Thank you for pucrhase directory");
            $mydata = SectorCategory::find($row->sector_id);
            return redirect("sectors-directory/$mydata->sector_slug");
        } else {
            $status_message = $response['CHECKOUTSTATUS'];
            session()->flash('danger_msg', "Payment has been $status_message");
            return redirect('diretory-list');
        }
    }

    public function CancelPaymentSectorDirectory() {
        session()->flash('danger_msg', 'Payment has been cancelled.');
        return redirect('diretory-list');
    }

    public function DownlfileSector() {
        $data = Session::get('sectordata');
        $id = $data->sector_id;
        $row = SectorListing::find($id);
        $file = public_path() . "/$row->upload_file";
        $ext = pathinfo($file, PATHINFO_EXTENSION);
        //dd(mime_content_type( $file ));
        $headers = array(
            'Content-Type: ' . mime_content_type($file),
        );

        return Response::download($file, "$row->title.$ext", $headers);
    }

    //Purchase Country Directory
    public function DownloadCountryDirectory(Request $request, $id) {
        $row = CountryListing::find($id);
        $provider = new ExpressCheckout;
        $data = [];
        $data['items'] = [
                [
                'name' => $row->title . "-$row->id",
                'price' => $row->price,
                'qty' => 1,
            ]
        ];

        $data['invoice_id'] = "CD" . date('Ymd') . rand(100, 999);
        //$data['custom'] = "myland";
        $data['invoice_description'] = "Order #{$data['invoice_id']} Invoice";
        $data['return_url'] = url('/country-diretory-purchase/payment-success');
        $data['cancel_url'] = url('/country-diretory-purchase/purchase-cancel');
        $data['total'] = $row->price;

        //give a discount of 10% of the order amount
        $data['shipping_discount'] = 0;
        //$provider->setCurrency('EUR')->setExpressCheckout($data);//Set Cuurency
        $response = $provider->setExpressCheckout($data);
        return redirect($response['paypal_link']);
    }

    public function SuccessPaymentCountryDirectory() {
        $provider = new ExpressCheckout;
        $token = Input::get('token');
        $response = $provider->getExpressCheckoutDetails($token);
        //dd($response);
        $status = $response['ACK'];

        if ($status) {
            $plan = $response['L_NAME0'];
            $email_id = $response['EMAIL'];
            //echo substr($plan, strpos($plan, '-'));
            $id = substr($plan, strpos($plan, '-') + 1);
            $row = CountryListing::find($id);
            $invoice_no = $response['INVNUM'];
            $data = new CountryPurchase;
            $data->country_id = $id;
            $data->email_id = $email_id;
            $data->invoice_no = $invoice_no;
            $data->purchase_price = $row->price;
            $data->save();


            Session::put('countrydata', $data);
            session()->flash('success_msg', "Thank you for pucrhase directory");
            $mydata = Country::find($row->country_id);
            return redirect("countries-directory/$mydata->country_slug");
        } else {
            $status_message = $response['CHECKOUTSTATUS'];
            session()->flash('danger_msg', "Payment has been $status_message");
            return redirect('diretory-list');
        }
    }

    public function CancelPaymentCountryDirectory() {
        session()->flash('danger_msg', 'Payment has been cancelled.');
        return redirect('diretory-list');
    }

    public function DownlfileCountry() {
        $data = Session::get('sectordata');
        $id = $data->sector_id;
        $row = CountryListing::find($id);
        $file = public_path() . "/$row->upload_file";
        $ext = pathinfo($file, PATHINFO_EXTENSION);
        //dd(mime_content_type( $file ));
        $headers = array(
            'Content-Type: ' . mime_content_type($file),
        );

        return Response::download($file, "$row->title.$ext", $headers);
    }

}
