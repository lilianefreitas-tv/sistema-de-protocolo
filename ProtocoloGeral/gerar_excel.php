<?php
// Incluir a conexão com BD
include_once 'src/conexao.php';

// Receber dados da URL com PHP
$data_inicio = filter_input(INPUT_GET, 'data_inicio', FILTER_DEFAULT);
$data_final = filter_input(INPUT_GET, 'data_final', FILTER_DEFAULT);
$encaminhamento = filter_input(INPUT_GET, 'encaminhamento', FILTER_DEFAULT);
//var_dump($data_inicio);
//var_dump($data_final);

// QUERY sql para pesquisar entre datas
$query_usuarios = "SELECT data,id_protocolo,documento,interessado,encaminhamento,resumo,saj,obs 
					FROM protocolo
					
					WHERE :encaminhamento IS NULL or encaminhamento = :encaminhamento and
					data BETWEEN :data_inicio AND :data_final ";
                    
// Preparar a QUERY com PDO
$result_usuarios = $conn->prepare($query_usuarios);

// Substituir o link da QUERY usando bindParam
$result_usuarios->bindParam(':data_inicio', $data_inicio);
$result_usuarios->bindParam(':data_final', $data_final);
$result_usuarios->bindParam(':encaminhamento', $encaminhamento);

// Executar a QUERY com PDO
$result_usuarios->execute();

// Verificar se encontrou algum registro no banco de dados com PHP e acessar o IF
if (($result_usuarios) and ($result_usuarios->rowCount() != 0)) {

    // Aceitar csv ou texto para gerar Excel
    header('Content-Type: text/csv; charset=utf-8');

    // Nome do arquivo para gerar Excel
    header('Content-Disposition: attachment; filename=arquivo.csv');

    // Gravar no buffer
    $resultado = fopen("php://output", 'w');

    // Criar o cabeçalho do Excel - Usar a função mb_convert_encoding para converter carateres especiais
    $cabecalho = ['Data', 'Numero de Protocolo', 'Documento','Interessado','Encaminhamento','Resumo da Demanda','N SAJ','OBS'];

    // Escrever o cabeçalho no arquivo
    fputcsv($resultado, $cabecalho, ';');

    // Ler os registros que vem do banco de dados
    while ($row_usuario = $result_usuarios->fetch(PDO::FETCH_ASSOC)) {

        // Como usar array_walk_recursive para criar função recursiva com PHP
        array_walk_recursive($row_usuario, 'converter');
        
        // Escrever o conteúdo no arquivo
        fputcsv($resultado, $row_usuario, ';');
    }

    // Fechar arquivo
    fclose($resultado);
} else {
    echo "<p style='color: #f00;'>Erro: Nenhum usuário encontrado!</p>";
}

// Como criar função valor por referência, isto é, quando alter o valor dentro da função, vale para a variável fora da função.
function converter(&$dados_usuario){
    // Converter dados de UTF-8 para ISO-8859-1
    $dados_usuario = mb_convert_encoding($dados_usuario, 'ISO-8859-1', 'UTF-8');
}
