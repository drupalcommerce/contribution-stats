<?php

// List of projects to skip.
// Taken from https://raw.githubusercontent.com/drupalcommerce/commerce-docs/master/user/pages/03.commerce2/02.developer-guide/05.payments/01.available-gateways/docs.md
$known = <<<EOF
[Adyen]: https://www.drupal.org/project/commerce_adyen
[Affirm]:https://www.drupal.org/project/commerce_affirm
[Atos SIPS]: https://www.drupal.org/project/commerce_atos_sips
[Bambora]: https://www.drupal.org/project/commerce_bambora
[Bambora Europe]: https://www.drupal.org/project/commerce_bambora_europe
[Barion Payment]: https://www.drupal.org/project/commerce_barion_payment
[Bluesnap]: https://www.drupal.org/project/commerce_bluesnap
[BTCPay]: https://www.drupal.org/project/commerce_btcpay
[Checkout.com]: https://www.drupal.org/project/commerce_checkoutcom
[CIB Bank]: https://www.drupal.org/project/commerce_cib
[Conekta Gateway]: https://www.drupal.org/project/commerce_conekta_gateway
[Credomatic]: https://www.drupal.org/project/commerce_credomatic
[Gestpay]: https://www.drupal.org/project/commerce_gestpay
[GoCardless Client]: https://www.drupal.org/project/commerce_gc_client
[Ifthenpay]: https://www.drupal.org/project/commerce_ifthenpay
[iTransact]: https://www.drupal.org/project/commerce_itransact
[Liqpay]: https://www.drupal.org/project/commerce_liqpay
[OnePAY.VN]: https://www.drupal.org/project/commerce_onepayvn
[Paymetric]: https://www.drupal.org/project/commerce_paymetric
[Suomen Verkkomaksut]:https://www.drupal.org/project/commerce_suomenverkkomaksut
[QuickPay]: https://www.drupal.org/project/commerce_quickpay_gateway
[Braintree]: https://www.drupal.org/project/commerce_braintree
[PayPal]: https://www.drupal.org/project/commerce_paypal
[Stripe]: https://www.drupal.org/project/commerce_stripe
[Authorize.Net]: https://www.drupal.org/project/commerce_authnet
[Vantiv]: https://www.drupal.org/project/commerce_vantiv
[Square]: https://www.drupal.org/project/commerce_square
[Paymill]: https://www.drupal.org/project/commerce_paymill
[Ingenico]: https://www.drupal.org/project/commerce_ingenico
[Instamojo]: https://www.drupal.org/project/commerce_instamojo
[Paytrail]: https://www.drupal.org/project/commerce_paytrail
[Payplug]: https://www.drupal.org/project/commerce_payplug
[PayU Money]: https://www.drupal.org/project/commerce_payumoney
[CC Avenue]: https://www.drupal.org/project/commerce_ccavenue
[Alipay]: https://www.drupal.org/project/commerce_alipay
[WeChat Pay]: https://www.drupal.org/project/commerce_wechat_pay
[Worldline]: https://www.drupal.org/project/commerce_worldline
[Datatrans]: https://www.drupal.org/project/commerce_datatrans
[EasyPaybg]: https://www.drupal.org/project/commerce_easyPaybg
[Epaybg]: https://www.drupal.org/project/commerce_epaybg
[Mollie]: https://www.drupal.org/project/commerce_mollie
[MoMo]: https://www.drupal.org/project/commerce_momo
[Moneris]: https://www.drupal.org/project/commerce_moneris
[Monetico]: https://www.drupal.org/project/commerce_monetico
[Paga+Tarde]: https://www.drupal.org/project/commerce_pagamastarde
[PartPay]: https://www.drupal.org/project/commerce_partpay
[Smartpay]: https://www.drupal.org/project/commerce_smartpay
[Pay.JP]: https://www.drupal.org/project/commerce_payjp
[Banklink payment gateway (multiple banks)]: https://www.drupal.org/project/commerce_banklink
[Razorpay Payment Integration]: https://www.drupal.org/project/commerce_razorpay
[Paytm]: https://www.drupal.org/project/commercepaytm
[Sermepa]: https://www.drupal.org/project/commerce_sermepa
[Sezzle pay]: https://www.drupal.org/project/commerce_sezzle_pay
[SimplePay by OTP]: https://www.drupal.org/project/commerce_otpsp
[Single Euro Payments Area (SEPA)]: https://www.drupal.org/project/commerce_sepa
[Bitpayir]: https://www.drupal.org/project/commerce_bitpayir
[PayONE]: https://www.drupal.org/project/commerce_payone
[Klarna Checkout]: https://www.drupal.org/project/commerce_klarna_checkout
[commerce_suomenverkkomaksut]: https://drupal.org/project/commerce_suomenverkkomaksut
[Payeezy]: https://www.drupal.org/project/commerce_payeezy
[PayDirect FPX]: https://www.drupal.org/project/paydirectfpx
[PayFort]: https://www.drupal.org/project/commerce_payfort
[PEI]: https://www.drupal.org/project/commerce_pei
[Omise]: https://www.drupal.org/project/commerce_omise
[Pasargad]: https://www.drupal.org/project/commerce_pasargad
[Zarinpal]: https://www.drupal.org/project/commerce_zarinpal
[Amazon Pay]: https://www.drupal.org/project/commerce_amazon_lpa
[Atom Payment]: https://www.drupal.org/project/commerce_atom_payment
[Braintree Marketplace]: https://www.drupal.org/project/commerce_braintree_marketplace
[China Payments]: https://www.drupal.org/project/commerce_cnpay
[DIBS integration]: https://www.drupal.org/project/commerce_dibs
[DPS]: https://www.drupal.org/project/commerce_dps
[Elavon]: https://www.drupal.org/project/commerce_elavon
[ePayco]: https://www.drupal.org/project/commerce_epayco
[GoCardless]: https://www.drupal.org/project/commerce_gocardless
[Liqpay Gateway]: https://www.drupal.org/project/commerce_liqpay_gateway
[MultiSafepay]: https://www.drupal.org/project/commerce_multisafepay
[Pagos Net]: https://www.drupal.org/project/commerce_pagos_net
[Payir]: https://www.drupal.org/project/commerce_payir
[Paylands]: https://www.drupal.org/project/commerce_paylands
[PayTabs]: https://www.drupal.org/project/commerce_paytabs
[PayU India Payment Gateway]: https://www.drupal.org/project/commerce_payu_india
[Payway]: https://www.drupal.org/project/commerce_payway
[Saman Gateway]: https://www.drupal.org/project/ms_commerce_saman
[Satispay]: https://www.drupal.org/project/commerce_satispay
[Swedbank Payment Portal]: https://www.drupal.org/project/commerce_payment_spp
[Tpay]: https://www.drupal.org/project/commerce_tpay
[USAePay]: https://www.drupal.org/project/commerce_usaepay
[E-Commerce Mellat]: https://www.drupal.org/project/mellat_gateway
[Cashpresso]: https://www.drupal.org/project/commerce_cashpresso
[Coinpayments]: https://www.drupal.org/project/commerce_coinpayments
[DPS PxPay]: https://www.drupal.org/project/commerce_dps_pxpay
[ECPay]: https://www.drupal.org/project/commerce_ecpay
[eProcessing Network (EPN)]: https://www.drupal.org/project/commerce_epn
[Euplatesc]: https://www.drupal.org/project/commerce_euplatesc
[Global Payments (Realex)]: https://www.drupal.org/project/commerce_globalpayments
[Iats]: https://www.drupal.org/project/commerce_iats
[iDEAL]: https://www.drupal.org/project/commerce_ideal
[Iyzipay]: https://www.drupal.org/project/iyzipay
[Moyasar]: https://www.drupal.org/project/commerce_moyasar
[Pagseguro]: https://www.drupal.org/project/commerce_pagseguro
[Pagseguro Transp]: https://www.drupal.org/project/commerce_pagseguro_transp
[Rave]: https://www.drupal.org/project/commerce_rave
[Rbspayment]: https://www.drupal.org/project/commerce_rbspayment
[Red Dot Payment]: https://www.drupal.org/project/commerce_reddotpayment
[Realex]: https://www.drupal.org/project/commerce_realex
[Saferpay]: https://www.drupal.org/project/commerce_saferpay
[Trustpay]: https://www.drupal.org/project/trustpay
[TurtleCoin]: https://www.drupal.org/project/commerce_turtlecoin
[Vipps]: https://www.drupal.org/project/commerce_vipps
[vPay]: https://www.drupal.org/project/commerce_vpay
[Wayforpay]: https://www.drupal.org/project/commerce_wayforpay
[Xem]: https://www.drupal.org/project/commerce_xem
[Fondy]: https://www.drupal.org/project/commerce_fondy
[Sofortbanking]: https://www.drupal.org/project/commerce_sofortbanking
[IDPay]: https://www.drupal.org/project/commerce_idpay
[QualPay]: https://www.drupal.org/project/commerce_qualpay
[Sberbank Acquiring]: https://www.drupal.org/project/commerce_sberbank_acquiring
[Worldpay]: https://www.drupal.org/project/commerce_worldpay
[Webpay.by]: https://www.drupal.org/project/commerce_webpay_by
[WebPayPlus (MIT)]: https://www.drupal.org/project/commerce_webpayplus
[Forte]: https://www.drupal.org/project/commerce_forte
[HyperPay]: https://www.drupal.org/project/commerce_hyperpay
[Klarna Payments]: https://www.drupal.org/project/commerce_klarna_payments
[MANGOPAY Direct PayIn]: https://www.drupal.org/project/commerce_mangopay_dpi
[Midtrans]: https://www.drupal.org/project/commerce_midtrans
[MultiSafepay payments]: https://www.drupal.org/project/commerce_multisafepay_payments
[Nets Payment Gateway]: https://www.drupal.org/project/commerce_nets
[Open Payment Platform]: https://www.drupal.org/project/commerce_opp
[Paylike]: https://www.drupal.org/project/commerce_paylike
[Pays.cz]: https://www.drupal.org/project/commerce_payscz
[Paystack]: https://www.drupal.org/project/commerce_paystack
[PayU Webcheckout]: https://www.drupal.org/project/commerce_payu_webcheckout
[Postfinance]: https://www.drupal.org/project/commerce_postfinance
[Privatbank payparts]: https://www.drupal.org/project/commerce_privatbank_payparts
[Swisscom Easypay]: https://www.drupal.org/project/commerce_swisscom_easypay
[Transbank Webpay]: https://www.drupal.org/project/commerce_webpay
[Valitor]: https://www.drupal.org/project/commerce_valitor
[Verifone]: https://www.drupal.org/project/commerce_verifone
EOF;
$known = explode("\n", $known);
foreach ($known as $index => $value) {
  $known[$index] = strstr($value, '/project/');
}

// We parse the HTML view because the REST endpoint has no obvious way
// to filter by core version.
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://www.drupal.org/project/project_module/index?project-status=full&drupal_core=7234');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.132 Safari/537.36');
$html = curl_exec($ch);

$doc = new DOMDocument();
@$doc->loadHTML($html);
$elements = $doc->getElementsByTagName('span');
$modules = [];
foreach ($elements as $element) {
  $url = $element->firstChild->getAttribute('href');
  if (strpos($url, '/project/commerce_') === 0 && !in_array($url, $known)) {
    $modules[$element->nodeValue] = $element->firstChild->getAttribute('href');
  }
}
print count($modules) . ' modules:' . PHP_EOL;
print json_encode($modules,  JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
