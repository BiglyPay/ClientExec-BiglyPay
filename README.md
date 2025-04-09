# ClientExec-BiglyPay
# BiglyPay Crypto Payment Gateway for ClientExec

BiglyPay is a cryptocurrency payment gateway module for ClientExec that enables your business to accept crypto payments seamlessly. This module monitors blockchain transactions, updates invoice statuses (e.g., Partially Paid or Fully Paid), and logs transaction details within ClientExec for reconciliation and audit purposes. For fee details, please visit: https://biglypay.com/#Fees

## Register
https://biglypay.com/register.php

## Features

- **Seamless Integration:** Easily integrate with ClientExec using its native gateway system.
- **Multi-Crypto Support:** Accept payments in various cryptocurrencies (e.g., ETH, BNB, BIGLY, USDT, DOGE, TRX, BTC/LTC, etc.) via BiglyPay’s infrastructure.
- **Automatic Invoice Updates:** Automatically update invoice statuses based on blockchain payment confirmations.
- **Transaction Logging:** All transaction details are logged within ClientExec for audit and reconciliation purposes.
- **Centralized Settings:** Configure your API Key, IPN Key, and company logo directly from the ClientExec admin interface.

## Requirements

- **ClientExec:** A compatible version that supports plugin gateway modules.
- **PHP:** Version 7.2 or above.
- **MySQL:** Required for storing transaction and invoice data.

## Installation

1. **Clone the Repository:**

   git clone https://github.com/BiglyPay/ClientExec-BiglyPay.git

2. **Copy Files:**

   - Copy the entire folder `/plugins/gateways/biglypay/` from the repository into your ClientExec installation directory under `/plugins/gateways/`.

3. **Set Permissions:**

   Ensure all module files have the correct permissions so they are accessible by your web server.

## Activate and Configure the Gateway Module

1. **Activate the Module:**

   - Log in to your ClientExec admin area.
   - Navigate to the Plugins section.
   - Locate and activate **BiglyPay Crypto Gateway**.

2. **Configure Module Settings:**

   In the configuration screen, set the following:
   
   - **API Key:**  
     Enter the API Key provided by your BiglyPay account to authenticate transactions.
   
   - **IPN Key:**  
     Enter the IPN Key for secure callback validation. This must match the setting in your BiglyPay Merchant Settings.
   
   - **Company Logo URL (Optional):**  
     Specify the URL of your company logo to display on the BiglyPay checkout page.

## Usage

Once the module is activated and configured, the BiglyPay gateway in ClientExec will:

- Present a remote checkout option for customers via BiglyPay.
- Monitor blockchain transactions associated with invoices.
- Automatically update invoice statuses based on confirmed payments.
- Log transaction details for review and reconciliation within ClientExec.

## Contributing

Contributions are welcome! If you have suggestions or improvements, please open an issue or submit a pull request. Follow the project’s coding standards and include appropriate tests for any new functionality.

## License

This project is licensed under the MIT License. See the LICENSE file for additional details.

## Support

For further support or inquiries, please visit the BiglyPay website or contact support via the BiglyPay control panel.
