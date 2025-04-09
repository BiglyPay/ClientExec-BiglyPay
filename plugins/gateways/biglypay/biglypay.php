<?php

class biglypay extends GatewayModule
{
    public $title = "BiglyPay";
    public $description = "Pay with Crypto using BiglyPay";
    public $version = "1.0";
    public $type = "invoice"; // Use for standard invoice-based checkout

    function __construct()
    {
        $this->SetName("biglypay");
        $this->SetFriendlyName("BiglyPay Crypto Gateway");
        $this->SetVersion("1.0");

        $this->SetGatewayVariables([
            "apiKey" => [
                "name" => "API Key",
                "type" => "text",
                "default" => "",
                "description" => "Enter your BiglyPay API Key"
            ],
            "ipnKey" => [
                "name" => "IPN Key",
                "type" => "text",
                "default" => "",
                "description" => "Enter your BiglyPay IPN Key"
            ],
            "clogo" => [
                "name" => "Company Logo URL (Optional)",
                "type" => "text",
                "default" => "",
                "description" => "URL of your company logo to show on BiglyPay checkout"
            ]
        ]);
    }

    function SupportedCurrencies()
    {
        return ['USD', 'USDT', 'BNB', 'BTC', 'ETH', 'LTC', 'TRX', 'DOGE'];
    }

    function DisplayPaymentForm($params)
    {
        $invoiceId = $params['invoiceNumber'];
        $amount = $params['amount'];
        $currency = $params['currency'];
        $userEmail = $params['userEmail'];
        $userId = $params['userId'];
        $apiKey = $params['apiKey'];
        $logo = $params['clogo'];
        $domain = $_SERVER['HTTP_HOST'];

        $returnUrl = $params['returnURL'];

        $formFields = [
            'userid'     => $userId,
            'invoiceid'  => $invoiceId,
            'amount'     => $amount,
            'currency'   => $currency,
            'returnurl'  => $returnUrl,
            'apiKey'     => $apiKey,
            'logo'       => (filter_var($logo, FILTER_VALIDATE_URL) ? $logo : ''),
            'domain'     => $domain,
            'email'      => $userEmail
        ];

        $form = '<form method="POST" action="https://biglypay.com/remote_payment.php">';
        foreach ($formFields as $key => $val) {
            $form .= '<input type="hidden" name="' . htmlspecialchars($key) . '" value="' . htmlspecialchars($val) . '">' . PHP_EOL;
        }
        $form .= '<p>Click below to pay with BiglyPay</p>';
        $form .= '<input type="submit" value="Pay with BiglyPay">';
        $form .= '</form>';

        return $form;
    }
}
