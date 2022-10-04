<?php
include_once "connection.php";

$sql = "SELECT * FROM menu";
$stmt = $conn->prepare($sql);
$stmt->execute();

$result = $stmt->fetchAll();

if (isset($POST['sendbtn']) && $_POST['sendbtn'] == 'add to cart') {
    $_SESSION['cart'][$_POST['id']] += 1;
}

echo '<pre>'.print_r($_POST,true).'</pre>';  
echo '<pre>'.print_r($_SESSION,true).'</pre>';



echo 'Example 1';
echo '<pre>'.print_r([
    ['id'], 'def', '123',
],true).'</pre>';



echo 'Example 1';
echo '<pre>'.print_r([
    'test' => 'abc',
    'example' => 123,
],true).'</pre>';

foreach($_SESSION['cart'] as $productId => $amount) {
    echo '<pre>'.print_r($productId,true).'</pre>'; 
    echo '<pre>'.print_r($amount,true).'</pre>'; 
}

unset($_SESSION['cart']);


?>