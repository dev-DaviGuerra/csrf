<?php
session_start();
// Se não tiver user autenticado, ele vai dar erro!
if (empty($_SESSION['user'])) {
    die('Usuário não autenticado');
}

$csrf = $_SESSION['csrf_token'];
if($_GET['csrf_token'] != $csrf){
    die('CSRF TOKEN não é válido');  
}

// Se tiver, ele faz a transferencia.
$contaDestino = $_GET['conta_destino'];
$valor = $_GET['valor'];
$_SESSION['saldo'] -= $valor;
echo "Olá, " . $_SESSION['user'] . ". Transferência de R$ $valor para a conta $contaDestino realizada com sucesso.";
echo '<br /> Seu novo saldo é: ' . $_SESSION['saldo'];
