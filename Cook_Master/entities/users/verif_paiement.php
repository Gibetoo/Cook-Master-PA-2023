<?php 
require_once '../../assets/vendor/autoload.php';
\Stripe\Stripe::setApiKey('sk_test_51NH6IsLOGVjSlIkPeb4HcqX4O8WOoy90VNxxuizW6lElUxbVKdapQv3LG2vJfyWDickMpRLVAmBfk7ezbWVSpCz000dor7Yzh6');

$token = $_POST['stripeToken']; // Récupérez le jeton de paiement généré par Stripe.js
$email = $_POST['email']; // Récupérez l'e-mail de l'utilisateur

$customer = \Stripe\Customer::create([
    'email' => $email,
    'source' => $token,
]);

if ($_POST['mode'] == 'mensuel') {
    $plan = [['plan' => 'price_1NO3EMLOGVjSlIkPsNep7XJi']];
} else {
    $plan = [['plan' => 'price_1NO3F1LOGVjSlIkPxRlTNt4h']];
}

$subscription = \Stripe\Subscription::create([
    'customer' => $customer->id,
    'items' => $plan,
]);
