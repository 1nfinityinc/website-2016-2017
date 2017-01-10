<?php
require 'vendor/autoload.php';
use Mailgun\Mailgun;
$mg = new Mailgun("key-47bafcb0c0225fd5adea0c297b8b2c1c");
$domain = "mg.1nfinityinc.cf";
$html = require_once "email.php";
# Now, compose and send your message.
$mg->sendMessage($domain, array('from'    => 'noreply@1nfinityinc.cf', 
                                'to'      => 'brendanmfuller48@gbstu.org', 
                                'subject' => 'Account Confirmation', 
                                'text'    => $html));

?>