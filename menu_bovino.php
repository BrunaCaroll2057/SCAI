<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<title>Página em Construção</title>
<style>
  body {
    background: #f4f4f4;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
    font-family: Arial, sans-serif;
  }
  svg {
    max-width: 800px;
  }
  /* Animação guindaste */
  #gancho {
    animation: subirDescer 2s infinite ease-in-out;
  }
  @keyframes subirDescer {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(20px); }
  }
  /* Caminhão andando */
  #caminhao {
    animation: andar 6s infinite linear;
  }
  @keyframes andar {
    0% { transform: translateX(-200px); }
    50% { transform: translateX(200px); }
    100% { transform: translateX(-200px); }
  }
  /* Escavadeira braço */
  #braco {
    transform-origin: top right;
    animation: mexerBraco 2s infinite ease-in-out;
  }
  @keyframes mexerBraco {
    0%, 100% { transform: rotate(0deg); }
    50% { transform: rotate(-15deg); }
  }
  /* Texto piscando */
  #texto {
    animation: piscar 1s infinite alternate;
  }
  @keyframes piscar {
    from { opacity: 1; }
    to { opacity: 0.4; }
  }
</style>
</head>
<body>

<svg viewBox="0 0 800 400">
  <!-- Guindaste -->
  <g id="guindaste">
    <rect x="50" y="100" width="20" height="200" fill="#555"/>
    <rect x="50" y="80" width="150" height="20" fill="#777"/>
    <line x1="200" y1="90" x2="200" y2="150" stroke="#333" stroke-width="4"/>
    <rect id="gancho" x="195" y="150" width="10" height="20" fill="#f00"/>
  </g>

  <!-- Caminhão -->
  <g id="caminhao">
    <rect x="300" y="250" width="120" height="50" fill="#ffcc00"/>
    <rect x="380" y="230" width="40" height="20" fill="#ffcc00"/>
    <circle cx="320" cy="300" r="15" fill="#333"/>
    <circle cx="400" cy="300" r="15" fill="#333"/>
  </g>

  <!-- Escavadeira -->
  <g id="escavadeira">
    <rect x="550" y="250" width="80" height="50" fill="#ffa500"/>
    <circle cx="570" cy="300" r="15" fill="#333"/>
    <circle cx="620" cy="300" r="15" fill="#333"/>
    <rect id="braco" x="630" y="220" width="15" height="40" fill="#ffa500"/>
    <rect x="645" y="230" width="20" height="15" fill="#555"/>
  </g>

  <!-- Texto -->
  <text id="texto" x="400" y="380" font-size="28" text-anchor="middle" fill="#333" font-weight="bold">
    Página em Construção
  </text>
</svg>

</body>
</html>
