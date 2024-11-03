<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controle de Armamento da Polícia Nacional</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="shortcut icon" href="src/img/Angola.ico" type="image/x-icon">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body>

    <header>
        <h1>Sistema de Controle de Armamento da Polícia Nacional</h1>
        <p>Bem-vindo ao Sistema de Controle de Armamento. Utilize os menus para cadastrar novos itens ou realizar consultas ao banco de dados.</p>
        <div id="message"></div>
        <nav>
            <ul class="menu">
                <!-- Menu de Cadastros -->
                <li><a href="#">Cadastros</a>
                    <ul class="dropdowns">
                        <li><a href="index.php?page=add_arma">Cadastrar Armas</a></li>
                        <li><a href="index.php?page=add_oficial">Cadastrar Oficiais</a></li>
                        <li><a href="index.php?page=unidades">Cadastrar Unidades</a></li>
                        <li><a href="index.php?page=add_atribuicao">Atribuir Armas</a></li>
                        <li><a href="index.php?page=manutencao">Registrar Manutenção</a></li>
                    </ul>
                </li>
                <!-- Menu de Consultas -->
                <li><a href="#">Consultas</a>
                    <ul class="dropdowns">
                        <li><a href="index.php?page=consulta_armas_disponiveis">Consultar Armas Disponíveis</a></li>
                        <li><a href="index.php?page=consulta_oficiais_sem_armas">Consultar Oficiais sem Armas</a></li>
                        <li><a href="index.php?page=consulta_historico_atribuicoes">Consultar Histórico de Atribuições</a></li>
                    </ul>
                </li>
                <li><a href="#">Relatorios</a>
                    <ul class="dropdowns">
                        <li><a href="index.php?page=relatorio_armas">Estados geral das Armas</a></li>
                        <li><a href="index.php?page=armas">Todas as Armas</a></li>
                        <li><a href="index.php?page=unidades">Cadastrar Unidades</a></li>
                        <li><a href="index.php?page=atribuicoes">Atribuir Armas</a></li>
                        <li><a href="index.php?page=manutencao">Registrar Manutenção</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </header>

    <main id="content" class="container overflow-auto" style="max-height: 80vh;">
        <section class="welcome-section">