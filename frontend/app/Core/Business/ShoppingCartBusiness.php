<?php

namespace App\Core\Business;

use App\Core\Enums\ApiEnum;
use App\Models\ShoppingCart;
use Ixudra\Curl\Facades\Curl;

class ShoppingCartBusiness extends ShoppingCart
{
    public static function createOrders() {
        $dataCart = ShoppingCartBusiness::where([['order_id',  '=', 0], ['result', '=', 'create_new_order']])->get();

        if(count($dataCart) > 0) {
            foreach ($dataCart as $shoppingCart) {
                $shoppingCart->createNew();
            }
        }

    }

    public function createNew() {
        if($this->result == 'create_new_order') {
            $totalPrice = 0;
            $list_products = json_decode($this->content, true);
            $myBag = $this->createmyBag($list_products, $totalPrice);
            $data = array(
                'orderCode' => $this->order_code,
                'customerId' => $this->customer_id,
                'shipCustomerFullname' => $this->shipping_fullname,
                'shipProvinceId' => $this->province_id,
                'shipProvinceName' => $this->province_name,
                'shipDistrictId' => $this->district_id,
                'shipDistrictName' => $this->district_name,
                'shipSubDistrictId' => $this->sub_district_id,
                'shipSubDistrictName' => $this->sub_district_name,
                'shipAddressLine1' => $this->shipping_address,
                'shipCustomerEmail' => $this->shipping_email,
                'shipPhone1' => $this->shipping_phone,
                'customerNote' => $this->customer_note,
                'totalAmount' => $totalPrice + $this->shipping_fee,
                'discountCode' => $this->discount_code,
                'discountAmount' => $this->discount_amount,
                'customerName' => $this->customer_name,
                'customerPhone' => $this->customer_phone,
                'shipFee' => $this->shipping_fee,
                'paymentMethod' => $this->payment_method,
                'shipMethodId' => $this->shipping_method_id,
                'shipmentVendorId' => $this->shipping_method_name,
                'shipmentVendorName' => $this->shipment_method_output,
                'lineItems' => $myBag
            );

            $url = config()->get('constants.API_FC_ORDER') . ApiEnum::CUSTOMER_CREATE_NEW_ORDER;
            $server_output1 = Curl::to($url)->withData($data)->asJson()->post();
            $server_output1 = json_decode(json_encode($server_output1, JSON_UNESCAPED_UNICODE), true);
            if ($server_output1['statusCode'] == '200') {
                $this->result = 'complete';
                $this->order_id = $server_output1['data'][0]['orderId'];
                $this->save();
            }
        }
    }

    public function createmyBag($products, &$totalPrice) {
        $myBag = [];
        foreach ($products as $key=>$product) {
            $totalPrice += $product['item_price'] * $product['item_quantity'];
            $myBag[] = array(
                'itemId' => $product['item_id'],
                'itemSku' => $product['item_sku'],
                'itemName' => $product['item_name'],
                'salePrice' => $product['item_price'],
                'quantity' => $product['item_quantity'],
                'weight' => $product['item_weightgram'],
                'notes' => '',
                'originalPrice' => 0
            );
        }

        return $myBag;
    }
}
