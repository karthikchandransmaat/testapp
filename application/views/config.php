<?php
  require_once('../stripe/lib/Stripe.php');
  $stripe = array(
    'secret_key'      => 'sk_live_VzSXVg9Up7DIqEz1y0nNVIuf',
    'publishable_key' => 'pk_live_VOrskZDd0oBBmCc1KYcSJ7cg'
    );
  Stripe::setApiKey($stripe['secret_key']);
?>