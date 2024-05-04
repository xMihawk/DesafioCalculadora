<?php
session_start();
include 'Calculadora.php';

?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora PHP</title>
    <link rel="stylesheet" href="Styles.css">
</head>
<body>
    <div class="calculadora">
        <h2>CALCULADORA PHP</h2>
        <form method="post">
            <div class="input-group">
                <label for="numero1">Número 1</label>
                <input type="text" id="numero1" name="numero1" value="<?php echo isset($_POST['numero1']) ? $_POST['numero1'] : ''; ?>">
            </div>
            <div class="input-group">
                <select name="operacao">
                    <option value="+">+</option>
                    <option value="-">-</option>
                    <option value="x">*</option>
                    <option value="÷">/</option>
                    <option value="n!">n!</option>
                    <option value="^">x^y</option>
                </select>
            </div>
            <div class="input-group">
                <label for="numero2">Número 2</label>
                <input type="text" id="numero2" name="numero2" value="<?php echo isset($_POST['numero2']) ? $_POST['numero2'] : '';  ?>">
            </div>
            <button type="submit" name="calcular">Calcular</button>
        </form>
            <div class="resultado">
            <?php 
            echo $resultadoOperacao; ?>
            </div>
        <form method="post">
            <button type="submit" name="save">Salvar</button>
            <button type="submit" name="get">Pegar Valores</button>
            <button type="submit" name="save_or_get">M</button>
            <button type="submit" name="limparHistorico">Apagar Histórico</button>
        </form>
        <div class="historico">
            <h3>Histórico</h3>
            <?php include 'Historico.php'; ?>
        </div>
    </div>
</body>
</html>
