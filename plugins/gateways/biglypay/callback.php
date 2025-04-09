<?php
require_once '../../library/front.php';

$input = json_decode(file_get_contents('php://input'), true);

if (!isset($input['invoice_id'], $input['related_invoice_id'], $input['status'], $input['received_amount'], $input['ipn_key'], $input['tx_hash'])) {
    http_response_code(400);
    echo "Invalid data";
    exit;
}

// Load gateway settings
$plugin = PluginGateway::getPlugin('biglypay');
$settings = $plugin->getVariables();

if (empty($settings['ipnKey']) || $settings['ipnKey'] !== $input['ipn_key']) {
    http_response_code(403);
    echo "IPN Key Mismatch";
    exit;
}

$invoiceId = $input['related_invoice_id'];
$amount    = $input['received_amount'];
$txHash    = $input['tx_hash'];
$status    = $input['status'];

// Load invoice
$invoice = new UserInvoice($invoiceId);
if (!$invoice->getId()) {
    http_response_code(404);
    echo "Invoice not found";
    exit;
}

// Check for duplicate transaction
$transExists = $invoice->hasTransaction($txHash);
if ($transExists) {
    http_response_code(409);
    echo "Duplicate transaction";
    exit;
}

// Apply payment
if ($status === "Confirmed") {
    $invoice->AddPayment($amount, $txHash, "BiglyPay");
    echo "Payment successful";
} else {
    echo "Payment pending or failed";
}
