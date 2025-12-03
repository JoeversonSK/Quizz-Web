# 🧠 Quiz TI - Sistema de Quiz Web Interativo

Projeto desenvolvido para a disciplina de **Frameworks** (2025.2), com o objetivo de criar uma aplicação Full Stack para testar conhecimentos através de um Quiz interativo.

O sistema utiliza uma API REST no Backend e uma SPA (Single Page Application) no Frontend.

![Status do Projeto](https://img.shields.io/badge/Status-Finalizado-brightgreen)
![Laravel](https://img.shields.io/badge/Laravel-11-red)
![Vue.js](https://img.shields.io/badge/Vue.js-3-green)


## 🚀 Tecnologias Utilizadas

- **Backend:** PHP 8.2+, Laravel 11, Sanctum (Auth).
- **Frontend:** Vue.js 3 (Composition API), Vue Router, Axios.
- **Banco de Dados:** MySQL 8.0 (via Docker).
- **Ambiente:** Docker & Docker Compose (para Banco de Dados e phpMyAdmin).

## ✨ Funcionalidades

- 🔐 **Autenticação:** Registro e Login de usuários com tokens seguros.
- 🎲 **Quiz Aleatório:** O sistema seleciona 10 perguntas aleatórias do banco a cada rodada.
- 🔀 **Embaralhamento:** As opções de resposta são embaralhadas para evitar padrões.
- ⏱️ **Cronômetro:** Contagem de tempo total gasto para responder o quiz.
- 🏆 **Ranking Global:** Tabela classificatória ordenada por maior pontuação e menor tempo.

---

## 🛠️ Como rodar o projeto

Siga os passos abaixo para rodar o projeto em sua máquina local.

### Pré-requisitos

Certifique-se de ter instalado:
- [PHP](https://www.php.net/) (8.2 ou superior)
- [Composer](https://getcomposer.org/)
- [Node.js](https://nodejs.org/) & NPM
- [Docker Desktop](https://www.docker.com/) (ou Docker Engine)

### 1. Clonar o repositório

```bash
git clone https://github.com/JoeversonSK/Quizz-Web.git
cd quiz-web
2. Configurar o Ambiente
Faça uma cópia do arquivo de exemplo .env:

Bash

cp .env.example .env
Abra o arquivo .env e configure a conexão com o banco de dados (certifique-se que corresponde ao docker-compose.yml):

Snippet de código

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=quiz_db
DB_USERNAME=root
DB_PASSWORD=root
3. Subir o Banco de Dados (Docker)
Inicie os containers do MySQL e phpMyAdmin:

Bash

docker-compose up -d
4. Instalar Dependências
Instale as bibliotecas do Backend (PHP) e do Frontend (JS):

Bash

# Backend
composer install

# Frontend
npm install
5. Configurar Aplicação e Banco
Gere a chave da aplicação e rode as migrações com os dados de teste (Seeders):

Bash

php artisan key:generate
php artisan migrate:fresh --seed
O comando --seed irá popular o banco com 20 perguntas iniciais sobre programação.

6. Executar o Projeto
Você precisará de dois terminais abertos:

Terminal 1 (Backend API):

Bash

php artisan serve
Terminal 2 (Frontend Vite):

Bash

npm run dev
7. Acessar
Acesse o sistema no navegador:

Aplicação: http://localhost:8000

Banco de Dados (phpMyAdmin): http://localhost:8081

🧪 Como Testar
Acesse crie uma conta.

No Dashboard, clique em "Iniciar Quiz".

Responda as 10 perguntas.

Veja seu resultado e confira sua posição no Ranking Global.

📄 Licença
Este projeto é de uso educacional.
