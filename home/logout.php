<?php
if (isset($_SESSION['access_token'])) {
    print '<li id="#logoutNav"><a href="?logout" style="cursor: pointer;" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Logout" class="dev-main-color"><i class="fa fa-sign-out" aria-hidden="true"></i> <span id="logoutText">Logout</span></a></li>  ';

}

?>