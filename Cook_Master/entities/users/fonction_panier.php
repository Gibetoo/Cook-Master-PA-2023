<?php

require_once '../../assets/vendor/autoload.php';

use Stripe\Stripe;
use Stripe\Checkout\Session;

class StripePayment
{

    public function __construct()
    {
        Stripe::setApiKey("sk_test_51NH6IsLOGVjSlIkPeb4HcqX4O8WOoy90VNxxuizW6lElUxbVKdapQv3LG2vJfyWDickMpRLVAmBfk7ezbWVSpCz000dor7Yzh6");
        Stripe::setApiVersion('2022-11-15');
    }

    public function startPayment(array $products, string $email, string $succesPath = 'index', string $cancelPath = 'erreur404'): void
    {
        $session = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [
                array_map(function ($product) {
                    return [
                        'price_data' => [
                            'currency' => 'EUR',
                            'product_data' => [
                                'name' => $product['nom'],
                            ],
                            'unit_amount' => $product['prix'] * 100,
                        ],
                        'quantity' => $product['quantite'],
                    ];
                }, $products),
            ],
            'mode' => 'payment',
            'success_url' => $this->getDomainName() . $succesPath . '?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => $this->getDomainName() . $cancelPath . '?session_id={CHECKOUT_SESSION_ID}',
            'customer_email' => $email,
        ]);

        header('location: ' . $session->url);
    }

    /**
     * Get the payment status
     */
    public function getPaymentStatus(string $sessionId): string
    {
        $session = Session::retrieve($sessionId);
        return $session->payment_status;
    }

    public function getDomainName(): string
    {
        if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
            $link = "https";
        } else {
            $link = "http";
        }

        return $link . "://" . $_SERVER['HTTP_HOST'] . "/";
    }
}
