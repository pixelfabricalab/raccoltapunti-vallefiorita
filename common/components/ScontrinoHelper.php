<?php
    namespace common\components;

    use yii\web\Response;
    use yii\helpers\Json;

    class ScontrinoHelper {

        public static function scanOCRAsprise($nomefile) {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, \Yii::$app->params['endpoint_server_aspriseocr']);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            // passa i campi in POST alla curl
            curl_setopt($ch, CURLOPT_POSTFIELDS, array(
            'api_key' => \Yii::$app->params['api_key_asprise'],      // Use 'TEST' for testing purpose
            'recognizer' => \Yii::$app->params['recognizer'],     // can be 'US', 'CA', 'JP', 'SG' or 'auto'
            'ref_no' => \Yii::$app->params['ref_no'],  // optional caller provided ref code
            'file' => curl_file_create($nomefile) // the image file
            ));


            $response_curl = curl_exec($ch);
            // inizializzo response come un oggetto di tipo Response
            $response = new Response;
            // dichiaro che il formato della risposta che voglio ricevere è di tipo JSON
            $response->format = Response::FORMAT_JSON;
            // associo al contenuto di response la stringa generata precedentemente
            $response = $response_curl;

            curl_close($ch);
            $response = Json::decode($response);
            return $response;

        }

        // dummy scanner 
        public static function dummyOCR() {
            $dummyjson = '{
                "request_id" : "P_218.186.139.27_kl96a7ie_o9k",
                "ref_no" : "democasillo",
                "file_name" : "casillo.jpg",
                "request_received_on" : 1613550460551,
                "success" : true,
                "image_width" : 1200,
                "image_height" : 1600,
                "image_rotation" : -0.006,
                "recognition_completed_on" : 1613550461387,
                "receipts" : [ {
                  "merchant_name" : "Supermercato Conad",
                  "merchant_address" : "Via Pappacoda ang. Via Salvemini - 73100 Lecce",
                  "merchant_phone" : "0832307743",
                  "merchant_website" : null,
                  "merchant_tax_reg_no" : "0267929075",
                  "merchant_company_reg_no" : null,
                  "merchant_logo" : "/ocr/api/img/demo/logos/mcd.jpg",
                  "region" : null,
                  "mall" : "600 @ Toa Payoh",
                  "country" : "IT",
                  "receipt_no" : "1495-0096",
                  "date" : "2023-07-27",
                  "time" : "15:59",
                  "items" : [ {
                    "amount" : 0,85,
                    "description" : "FARINA \"0\" CASILLO K",
                    "flags" : "",
                    "qty" : 1,
                    "remarks" : null,
                    "unitPrice" : null
                  }, {
                    "amount" : 0.85,
                    "description" : "FARINA \"00\" 100% IT",
                    "flags" : "",
                    "qty" : 1,
                    "remarks" : null,
                    "unitPrice" : null
                  }, {
                    "amount" : 0.12,
                    "description" : "SHOPPER CONAD BIODEG",
                    "flags" : "",
                    "qty" : 1,
                    "remarks" : null,
                    "unitPrice" : null
                  },{
                    "amount" : 1.97,
                    "description" : "COCA COLA ZERO 1.5",
                    "flags" : "",
                    "qty" : 1,
                    "remarks" : null,
                    "unitPrice" : null
                  }, {
                    "amount" : 3.49,
                    "description" : "TONNO CONAD OLIO OLI",
                    "flags" : "",
                    "qty" : 1,
                    "remarks" : null,
                    "unitPrice" : null
                  } ],
                  "currency" : "EUR",
                  "total" : 7.28,
                  "subtotal" : null,
                  "tax" : 0.77,
                  "service_charge" : null,
                  "tip" : null,
                  "payment_method" : "cash",
                  "payment_details" : null,
                  "credit_card_type" : null,
                  "credit_card_number" : null,
                  "ocr_text" : "         McDonald\'s Toa Payoh Central\n            600 @ Toa Payoh #01-02,\n              Singapore 319515\n                Tel: 62596362\n       McDonald\'s Restaurants Pte Ltd\n          GST REGN NO : M2-0023981-4\n                 TAX INVOICE\n   INV# 002201330026\n  ORD $57 -REG # 1 - 13/01/2016 15:49:52\n  QTY ITEM                            TOTAL\n    1 Med Ice Lemon Tea                2.95\n    1 Coffee with Milk                 2.40\n Eat- In Total (incl GST)              5.35\n Cash Tendered                         10.00\n Change                                 4.65\n TOTAL INCLUDES GST OF                  0.35\n     Thank You and Have A Nice Day",
                  "ocr_confidence" : 96.60,
                  "width" : 954,
                  "height" : 1170,
                  "avg_char_width" : null,
                  "avg_line_height" : null,
                  "source_locations" : {
                    "date" : [ [ { "y" : 684, "x" : 500 }, { "y" : 681, "x" : 965 }, { "y" : 747, "x" : 966 }, { "y" : 750, "x" : 501 } ] ],
                    "total" : [ [ { "y" : 957, "x" : 936 }, { "y" : 957, "x" : 1041 }, { "y" : 1012, "x" : 1041 }, { "y" : 1012, "x" : 936 } ] ],
                    "receipt_no" : [ [ { "y" : 588, "x" : 246 }, { "y" : 587, "x" : 528 }, { "y" : 645, "x" : 528 }, { "y" : 646, "x" : 246 } ] ],
                    "doc" : [ [ { "y" : 163, "x" : 44 }, { "y" : 157, "x" : 1094 }, { "y" : 1444, "x" : 1102 }, { "y" : 1450, "x" : 52 } ] ],
                    "merchant_name" : [ [ { "y" : 223, "x" : 254 }, { "y" : 215, "x" : 876 }, { "y" : 260, "x" : 877 }, { "y" : 269, "x" : 255 } ] ],
                    "tax" : [ [ { "y" : 1200, "x" : 949 }, { "y" : 1201, "x" : 1057 }, { "y" : 1258, "x" : 1056 }, { "y" : 1257, "x" : 948 } ] ],
                    "merchant_address" : [ [ { "y" : 262, "x" : 318 }, { "y" : 261, "x" : 832 }, { "y" : 309, "x" : 832 }, { "y" : 309, "x" : 318 } ], [ { "y" : 308, "x" : 383 }, { "y" : 304, "x" : 768 }, { "y" : 356, "x" : 769 }, { "y" : 361, "x" : 384 } ] ],
                    "merchant_phone" : [ [ { "y" : 354, "x" : 539 }, { "y" : 354, "x" : 719 }, { "y" : 396, "x" : 719 }, { "y" : 397, "x" : 539 } ] ],
                    "merchant_tax_reg_no" : [ [ { "y" : 444, "x" : 574 }, { "y" : 438, "x" : 856 }, { "y" : 482, "x" : 857 }, { "y" : 488, "x" : 575 } ] ]
                  }
                } ]
              }';
              $response = Json::decode($dummyjson);
              return $response;
        }

        // scanner tesseract Alessandro Testa - da dismettere e da rimpiazzare successivamente

        public function scanOCR($nomefile, $dimensione, $modo, $engine, $dpi) {
            $curl = curl_init();

            curl_setopt_array($curl, array(
            CURLOPT_URL => \Yii::$app->params['endpoint_server_ocr'],
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array('image'=> new \CURLFILE($nomefile), 'dimensione' => "{$dimensione}",'modo' => "{$modo}",'engine' => "{$engine}", 'densita' => "{$dpi}"),
            ));

            $response_curl = curl_exec($curl);
            // inizializzo response come un oggetto di tipo Response
            $response = new Response;
            // dichiaro che il formato della risposta che voglio ricevere è di tipo JSON
            $response->format = Response::FORMAT_JSON;
            // associo al contenuto di response la stringa generata precedentemente
            $response->content = $response_curl;

            curl_close($curl);
            return $response;
        }

        public function validaJSON(string $response) {
            if ($response != null) {
                return false;
            } else {
                return true;
            }
        }
        
        public function isScontrinoValid($response) {
            return true;
        }

        public function getScontrinoData($response) {
            return true;
        }
    }