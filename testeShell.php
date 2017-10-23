<?php

print_r(

	json_decode("{
    \"_id\" : \"592872ad808c3c2a1d55204c\",
    \"client_id\" : \"56d48438d2c39468a21494a4\",
    \"customer_id\" : \"59286c5b9d1b502aa37210a4\",
    \"products\" : [ 
        {
            \"product_id\" : \"584c477ccd2f5b78d554dfbb\",
            \"price\" : 269.9,
            \"quantity\" : 1.0
        },
        {
            \"product_id\" : \"584c477ccd2f5b78d554dfb1\",
            \"price\" : 268.9,
            \"quantity\" : 3.0
        }
    ],
    \"amount\" : 269.9,
    \"info\" : {
        \"utm_source\" : false,
        \"utm_medium\" : false,
        \"utm_campaign\" : false,
        \"utm_term\" : false,
        \"utm_content\" : false
    },
    \"anonymous\" : false,
    \"complete\" : false,
    \"recovered\" : false,
    \"updated_at\" : \"2017-05-26T18:24:21.000Z\",
    \"created_at\" : \"2017-05-26T18:23:41.000Z\"
}")

	);



    "client_id" => "56d48438d2c39468a21494a4"
    "customer_id" => "???"
    "products" => [
            "0" => [
                    "product_id" => 584c477ccd2f5b78d554dfbb
                    "price" => 269.9
                    "quantity" => 1
                ]

            "1" => [
                    "product_id" => 584c477ccd2f5b78d554dfb1
                    "price" => 268.9
                    "quantity" => 3
                ]

        ]

    "amount" => 269.9
    "info" => [
            "utm_source" => "",
            "utm_medium" => "",
            "utm_campaign" => "",
            "utm_term" => "",
            "utm_content" => ""
        ]

    "anonymous" => ""
    "complete" => ""
    "recovered" => ""
    "updated_at" => new UTCDateTime(DateTime::createFromFormat("Y-m-d H:i:s.u", "2017-05-26 18:24:21.000"))
    "created_at" => new UTCDateTime(DateTime::createFromFormat("Y-m-d H:i:s.u", "2017-05-26 18:23:41.000"))
