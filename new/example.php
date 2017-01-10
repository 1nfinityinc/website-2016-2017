<?php



$accountBase = new Account();
$accountBase->SignIn($user, $pass);
if ($accountBase->Sucess()) {
  $redirect = new Redirct();
  $redirect->Page(PAGE_UUID);
}


$accountBase = new Account();
$accountBase->newAccount($first, $last, $email, $password)
$accountUUID = $accountBase->getLastAccountUUID();


$dt = new DataTable();
$dt->newTable(“table”);
// If table is already created it won’t override anything

$dt->addRow(“name”, “type”);
//If name of row is same as another it will give and error and the page will end;
//To change a table eg: text to integer or timestamp, then run DataTable.php for editing.

//Examples of creating rows too
$dt->addRow(“name”, “text”);
$dt->addRow(“new_time”, “timestamp:now”);
$dt->addRow(“likes”, “integer”);
$dt->addRow(“like”, “boolean”);



//ID - ACCOUNT_UUID - DATA


$pageBase = new Page();
$pageBase->createNew($name)
$uuid = $pageBase->getLastPageUUID(); OR $uuid = $pageBase->pageUUIDFromDir(<dir>); (eg:/home)
$pageBase->setPageContent($uuid, <html>);

-------------------
$pageBase->getPageContent($uuid,);











?>