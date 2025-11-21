<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>SCAI - Sistema de Coordenação de Animais do Instituto</title>
    <link rel="stylesheet" href="css/estilo.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="JS/js.js"> </script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<style>

    html, body {
        height: 100%;
        margin: 0;
        padding: 0;
        flex-direction: column;
        font-family: 'Roboto', sans-serif;
        color: #e6f2d9;
        text-align: center;
    }

    body {
        font-family: 'Roboto', sans-serif;
        background: linear-gradient(135deg, #578538ff 0%, #5f9770ff 50%, #a3d6a3ff 100%);
        background-repeat: no-repeat;
        background-size: cover;
        background-attachment: fixed;
        color: #e6f2d9;
        text-align: center;
    }

    .container {
        max-width: 400px;
        width: 100%;
    }

    .cow-image {
        font-size: 6rem;
        margin-bottom: 20px;
        user-select: none;
        text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
    }

    h1 {
        font-weight: 700;
        margin-bottom: 10px;
        font-size: 2.5rem;
        font-family: 'Poppins', sans-serif;
    }

    p {
        font-size: 1.1rem;
        margin-bottom: 30px;
        color: #d9e6c2;
    }

    .features {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 20px;
        margin-bottom: 30px;
        justify-items: center;
    }

    .feature {
        width: 140px;
        background: rgba(255, 255, 255, 0.15);
        padding: 20px;
        border-radius: 15px;
        border: 2px solid rgba(255, 255, 255, 0.3);
        cursor: pointer;
        transition: transform 0.3s ease, background-color 0.3s ease;
        font-weight: 600;
        color: #e6f2d9;
        user-select: none;
        box-shadow: 0 0 5px rgba(255,255,255,0.1);
        text-align: center;
    }

    .feature:hover {
        transform: translateY(-8px) rotate(-3deg);
        background-color: rgba(255, 255, 255, 0.3);
        box-shadow: 0 8px 15px rgba(255, 255, 255, 0.4);
    }

    .feature:nth-child(3) {
        grid-column: 1 / span 2;
        justify-self: center;
    }

    .progress-section {
        background: rgba(255, 255, 255, 0.15);
        color: #e6f2d9;
        padding: 20px;
        border-radius: 20px;
        position: relative;
        overflow: hidden;
        box-shadow: 0 0 10px rgba(255,255,255,0.1);
    }

    .progress-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
        animation: shimmer 2s infinite;
    }

    @keyframes shimmer {
        0% { left: -100%; }
        100% { left: 100%; }
    }

    .progress-bar {
        width: 100%;
        height: 12px;
        background: rgba(255,255,255,0.3);
        border-radius: 6px;
        overflow: hidden;
        margin-top: 15px;
    }

    .progress {
        width: 25%;
        height: 100%;
        background: white;
        border-radius: 6px;
        animation: progress-grow 2s ease-in-out infinite;
    }

    @keyframes progress-grow {
        0%, 100% { width: 25%; }
        50% { width: 48%; }
    }
</style>
</head>
<body>

    <?php
      include __DIR__ . '/Includes/menuinclude.php';
    ?>


    <div class="container">
        <div class="cow-image" aria-label="Emoji de boi">🐄</div>
        <h1>SCAI</h1>
        <p>Estamos trabalhando para trazer a melhor plataforma de gestão de animais agrícolas. Em breve, tudo estará disponível!</p>

        <div class="features" role="list" aria-label="Principais funcionalidades em desenvolvimento">
            <div class="feature" role="listitem" tabindex="0">Cadastro Completo</div>
            <div class="feature" role="listitem" tabindex="0">Relatórios</div>
            <div class="feature" role="listitem" tabindex="0">Saúde</div>
        </div>

        <div class="progress-section" aria-label="Progresso do desenvolvimento">
            <h3>Progresso do Desenvolvimento</h3>
            <div class="progress-bar">
                <div class="progress"></div>
            </div>
            <p>25% Completo - Lançamento Previsto: Dezembro 2026</p>
        </div>
    </div>

<?php
    include 'Includes/rodapeinclude.php';
?>
    
</body>
</html>
