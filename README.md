# Soft10 PHP API Class

A simple PHP class for interacting with the Soft10 API. This class allows you to send WhatsApp messages, check phone number availability on WhatsApp, scan QR codes for connection, and more.

## Installation

To use the class, simply include the `Soft10.php` file in your project.

```php
require_once 'Soft10.php';
```

# Usage

Create an instance of the Soft10 class with your API secret key.

```php
$api = new Soft10('your_secret_key');
```

# Send Message

To send a message to a single number, use the sendMessage method:

```php
$api->sendMessage([
    'to' => '1234567890',
    'message' => 'Hello from Soft10!',
    "fileUrl" => 'http://example.com/file.pdf'
]);
```

# Check Phone WhatsApp Availability

To check if a phone number is registered on WhatsApp:

```php
$response = $api->checkPhoneWhatsappAvailability('1234567890');
```

# Scan QR Code

To get a QR code for scanning:

```php
$response = $api->scan();
```

# Check Connection

To check the connection status:

```php 
$response = $api->checkConnection();
```

# Logout

To log out from the current WhatsApp session:

```php
$response = $api->logout();
```

# Methods

- sendMessage($reqBody): Sends a message to a single number.
- checkPhoneWhatsappAvailability($phone): Checks if a phone number is registered on WhatsApp.
- scan(): Gets a QR code for scanning to log into WhatsApp.
- checkConnection(): Checks the connection status.
- logout(): Logs out from the current WhatsApp session.
