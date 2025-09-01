<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SCAI-Sistema de Cadastro de Animais do Instituto</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&family=Roboto:wght@400;500;700&display=swap');
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Roboto', sans-serif;
            background: linear-gradient(135deg, #2d5016 0%, #4a7c59 50%, #8fbc8f 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow-x: hidden;
            position: relative;
        }

        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: 
                radial-gradient(circle at 20% 20%, rgba(139, 195, 74, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 80% 80%, rgba(76, 175, 80, 0.1) 0%, transparent 50%);
            pointer-events: none;
        }

        .construction-container {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 25px;
            padding: 50px;
            text-align: center;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
            max-width: 600px;
            width: 90%;
            margin: 30px;
            position: relative;
            overflow: hidden;
            border: 3px solid #4caf50;
        }

        .construction-container::before {
            content: '';
            position: absolute;
            top: -2px;
            left: -2px;
            right: -2px;
            bottom: -2px;
            background: linear-gradient(45deg, #4caf50, #8bc34a, #cddc39, #4caf50);
            border-radius: 27px;
            z-index: -1;
            animation: border-glow 3s ease-in-out infinite;
        }

        @keyframes border-glow {
            0%, 100% { opacity: 0.5; }
            50% { opacity: 1; }
        }

        .animals-animation {
            width: 100%;
            height: 200px;
            position: relative;
            margin: 40px 0;
        }

        .animal {
            position: absolute;
            font-size: 2rem;
            animation: move-to-center 4s ease-in-out infinite;
            z-index: 2;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }

        .cow { color: #795548; top: 10%; left: 5%; animation-delay: 0s; }
        .pig { color: #ffcdd2; top: 20%; right: 5%; animation-delay: 0.5s; }
        .sheep { color: #f5f5f5; bottom: 20%; left: 15%; animation-delay: 1s; }
        .chicken { color: #ffeb3b; bottom: 10%; right: 20%; animation-delay: 1.5s; }
        .rabbit { color: #bdbdbd; top: 30%; left: 25%; animation-delay: 2s; }

        @keyframes move-to-center {
            0%, 100% {
                transform: translate(0, 0) scale(1);
            }
            25% {
                transform: translate(calc(200px - 50%), calc(100px - 50%)) scale(1.2);
            }
            50% {
                transform: translate(calc(200px - 50%), calc(100px - 50%)) scale(1.3);
            }
            75% {
                transform: translate(calc(200px - 50%), calc(100px - 50%)) scale(1.2);
            }
        }

        .meeting-point {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, #4caf50, #8bc34a);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
            font-size: 0.8rem;
            box-shadow: 0 0 20px rgba(76, 175, 80, 0.5);
            z-index: 1;
        }

        h1 {
            color: #2e7d32;
            font-size: 2.8rem;
            font-weight: 700;
            margin-bottom: 20px;
            font-family: 'Poppins', sans-serif;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.1);
        }

        .subtitle {
            color: #4caf50;
            font-size: 1.4rem;
            font-weight: 600;
            margin-bottom: 10px;
        }

        p {
            color: #555;
            font-size: 1.1rem;
            line-height: 1.7;
            margin-bottom: 30px;
        }

        .features {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 20px;
            margin: 40px 0;
        }

        .feature {
            background: linear-gradient(135deg, #e8f5e8, #c8e6c9);
            padding: 20px;
            border-radius: 15px;
            border: 2px solid #4caf50;
            transition: transform 0.3s ease;
        }

        .feature:hover {
            transform: translateY(-5px);
        }

        .feature-icon {
            font-size: 2rem;
            color: #2e7d32;
            margin-bottom: 10px;
        }

        .feature-text {
            font-size: 0.9rem;
            color: #388e3c;
            font-weight: 500;
        }

        .progress-section {
            background: linear-gradient(135deg, #4caf50, #8bc34a);
            color: white;
            padding: 25px;
            border-radius: 20px;
            margin: 30px 0;
            position: relative;
            overflow: hidden;
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
            margin: 20px 0;
        }

        .progress {
            width: 75%;
            height: 100%;
            background: white;
            border-radius: 6px;
            animation: progress-grow 2s ease-in-out infinite;
            position: relative;
        }

        @keyframes progress-grow {
            0%, 100% { width: 75%; }
            50% { width: 78%; }
        }

        .contact-info {
            margin-top: 40px;
            padding-top: 30px;
            border-top: 3px dotted #4caf50;
        }

        .contact-button {
            display: inline-block;
            background: linear-gradient(135deg, #4caf50, #8bc34a);
            color: white;
            padding: 15px 35px;
            text-decoration: none;
            border-radius: 30px;
            font-weight: 600;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            margin-top: 20px;
            border: none;
            cursor: pointer;
            box-shadow: 0 5px 15px rgba(76, 175, 80, 0.3);
        }

        .contact-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(76, 175, 80, 0.4);
        }

        .social-links {
            margin-top: 25px;
            display: flex;
            justify-content: center;
            gap: 15px;
        }

        .social-link {
            width: 45px;
            height: 45px;
            background: linear-gradient(135deg, #4caf50, #8bc34a);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            text-decoration: none;
            color: white;
            font-weight: 600;
            font-size: 1.1rem;
        }

        .social-link:hover {
            background: linear-gradient(135deg, #388e3c, #4caf50);
            transform: translateY(-3px) rotate(5deg);
        }

        .floating-leaves {
            position: absolute;
            font-size: 1.5rem;
            color: #4caf50;
            opacity: 0.6;
            animation: float-around 8s linear infinite;
            pointer-events: none;
        }

        @keyframes float-around {
            0% {
                transform: translate(0, 0) rotate(0deg);
            }
            25% {
                transform: translate(100px, -50px) rotate(90deg);
            }
            50% {
                transform: translate(200px, 0) rotate(180deg);
            }
            75% {
                transform: translate(100px, 50px) rotate(270deg);
            }
            100% {
                transform: translate(0, 0) rotate(360deg);
            }
        }

        @media (max-width: 768px) {
            .construction-container {
                padding: 30px 20px;
            }
            
            h1 {
                font-size: 2.2rem;
            }
            
            .subtitle {
                font-size: 1.2rem;
            }
            
            .animals-animation {
                height: 150px;
            }
            
            .animal {
                font-size: 1.5rem;
            }
            
            .features {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <!-- Folhas flutuantes de fundo -->
    <div class="floating-leaves" style="top: 10%; left: 5%; animation-delay: 0s;">🍃</div>
    <div class="floating-leaves" style="top: 80%; right: 10%; animation-delay: 2s;">🌿</div>
    <div class="floating-leaves" style="top: 40%; left: 15%; animation-delay: 4s;">🌱</div>
    <div class="floating-leaves" style="top: 60%; right: 20%; animation-delay: 6s;">🍀</div>

    <div class="construction-container">
        <h1>AgroAnimals</h1>
        <div class="subtitle">Sistema de Coordenação e Cadastro</div>
        
        <div class="animals-animation">
            <div class="animal cow">🐄</div>
            <div class="animal pig">🐖</div>
            <div class="animal sheep">🐑</div>
            <div class="animal chicken">🐔</div>
            <div class="animal rabbit">🐇</div>
            <div class="meeting-point">CENTRO</div>
        </div>
        
        <p>Estamos construindo a melhor plataforma para gestão de animais agrícolas! Em breve, você poderá cadastrar, acompanhar e gerenciar todos os animais da sua propriedade com facilidade e eficiência.</p>
        
        <div class="features">
            <div class="feature">
                <div class="feature-icon">📋</div>
                <div class="feature-text">Cadastro Completo</div>
            </div>
            <div class="feature">
                <div class="feature-icon">📊</div>
                <div class="feature-text">Relatórios</div>
            </div>
            <div class="feature">
                <div class="feature-icon">📍</div>
                <div class="feature-text">Localização</div>
            </div>
            <div class="feature">
                <div class="feature-icon">⚕️</div>
                <div class="feature-text">Saúde</div>
            </div>
        </div>
        
        <div class="progress-section">
            <h3 style="margin-bottom: 20px; font-size: 1.3rem;">Progresso do Desenvolvimento</h3>
            <div class="progress-bar">
                <div class="progress"></div>
            </div>
            <p style="margin-top: 15px; font-size: 1rem; opacity: 0.9;">75% Completo - Lançamento Previsto: Dezembro 2024</p>
        </div>
        
        <div class="contact-info">
            <p style="margin-bottom: 20px; color: #2e7d32; font-weight: 600; font-size: 1.1rem;">
                Quer ser notificado sobre o lançamento?
            </p>
            <a href="mailto:contato@agroanimals.com.br" class="contact-button">
                📧 Entre em Contato
            </a>
            
            <div class="social-links">
                <a href="#" class="social-link">F</a>
                <a href="#" class="social-link">I</a>
                <a href="#" class="social-link">W</a>
            </div>
        </div>
    </div>

    <script>
        // Efeito adicional de animação dos animais
        document.addEventListener('DOMContentLoaded', function() {
            const animals = document.querySelectorAll('.animal');
            const meetingPoint = document.querySelector('.meeting-point');
            
            // Adicionar interação ao passar o mouse
            meetingPoint.addEventListener('mouseenter', function() {
                animals.forEach(animal => {
                    animal.style.animationPlayState = 'paused';
                    animal.style.transform = 'scale(1.5)';
                });
            });
            
            meetingPoint.addEventListener('mouseleave', function() {
                animals.forEach(animal => {
                    animal.style.animationPlayState = 'running';
                    animal.style.transform = '';
                });
            });
            
            // Adicionar mais folhas flutuantes
            for (let i = 0; i < 8; i++) {
                const leaf = document.createElement('div');
                leaf.className = 'floating-leaves';
                leaf.innerHTML = '🍃';
                leaf.style.top = Math.random() * 100 + '%';
                leaf.style.left = Math.random() * 100 + '%';
                leaf.style.animationDelay = Math.random() * 8 + 's';
                leaf.style.animationDuration = (Math.random() * 10 + 5) + 's';
                document.body.appendChild(leaf);
            }
        });
    </script>
</body>
</html>
