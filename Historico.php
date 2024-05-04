<?php
if (isset($_SESSION['historico'])) {
    foreach ($_SESSION['historico'] as $operacao) {
        $numero1 = isset($operacao['numero1']) ? $operacao['numero1'] : '';
        $numero2 = isset($operacao['numero2']) ? $operacao['numero2'] : '';
        $tipoOperacao = isset($operacao['operacao']) ? $operacao['operacao'] : '';
        $resultado = isset($operacao['resultado']) ? $operacao['resultado'] : '';

        echo "<p>• {$numero1} {$tipoOperacao} {$numero2} = {$resultado}</p>";
    }
}
if (isset($_POST['limparHistorico'])) {
    unset($_SESSION['historico']);
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit();
}
?>
