<?php
$resultado = '';
$resultadoOperacao = '';

if (isset($_POST['calcular'])) {
    $numero1 = $_POST['numero1'];
    $numero2 = isset($_POST['numero2']) ? $_POST['numero2'] : ''; // Verifica se numero2 foi enviado
    $operacao = $_POST['operacao'];

    // Verificar se os números são numéricos
    if (is_numeric($numero1) && (is_numeric($numero2) || $operacao === 'n!')) { // Modificado para incluir verificação de 'n!'
        // Verificar se o número 1 está preenchido
        if ($numero1 !== '') {
            switch ($operacao) {
                case '+':
                    $resultado = $numero1 + $numero2;
                    $resultadoOperacao = "$numero1 + $numero2 = $resultado";
                    break;
                case '-':
                    $resultado = $numero1 - $numero2;
                    $resultadoOperacao = "$numero1 - $numero2 = $resultado";
                    break;
                case 'x':
                    $resultado = $numero1 * $numero2;
                    $resultadoOperacao = "$numero1 * $numero2 = $resultado";
                    break;
                case '÷':
                    if ($numero2 != 0) {
                        $resultado = $numero1 / $numero2;
                        $resultadoOperacao = "$numero1 / $numero2 = $resultado";
                    } else {
                        $resultadoOperacao = "Erro: Divisão por zero!";
                    }
                    break;
                case '^':
                    $resultado = pow($numero1, $numero2);
                    $resultadoOperacao = "$numero1 ^ $numero2 = $resultado";
                    break;
                case 'n!':
                    if ($numero2 === '') {
                        $resultado = factorial($numero1);
                        $resultadoOperacao = "$numero1! = $resultado";
                    } else {
                        $resultadoOperacao = "Por favor, preencha apenas o número 1 para o fatorial.";
                    }
                   
                    break;
                default:
                    $resultadoOperacao = "Operação inválida!";
                    break;
            }

            // Se a operação não for inválida ou resultar em erro, armazenar no histórico
            if (!strstr($resultadoOperacao, 'Por favor') && !strstr($resultadoOperacao, 'Erro')) {
                $_SESSION['historico'][] = array(
                    'numero1' => $numero1,
                    'numero2' => $numero2,
                    'operacao' => $operacao,
                    'resultado' => $resultado
                );
            }
        } 
    } else { // Se algum dos números não for numérico, exibir mensagem de erro
        $resultadoOperacao = "Por favor, preencha todos os campos.";
    }
}
function factorial($n)
{
    if ($n <= 1) {
        return 1;
    } else {
        return $n * factorial($n - 1);
    }
}
