# Sistema de Login

Este é um sistema de login simples desenvolvido em PHP para a cadeira de Backend da faculdade, com algumas funcionalidades básicas, como registro de usuário, login, e um dashboard para exibir informações sobre os usuários.

![2024-03-26_15-04](https://github.com/jonathan-laco/loginfacul/assets/39104938/bc9008a5-adc5-4a6d-b8da-9586e6f18146)
## Funcionalidades

- Registro de usuário
- Login de usuário
- Dashboard com informações sobre usuários logados
- Logout de usuário

## Requisitos

- Servidor web (Apache, Nginx, etc.)
- PHP 7.x ou superior
- MySQL ou outro sistema de gerenciamento de banco de dados compatível

## Instalação

1. Clone este repositório para o diretório do seu servidor web.
2. Importe o arquivo SQL `banco.sql` para criar o banco de dados e a tabela necessária.
3. Configure as credenciais do banco de dados no arquivo `config.php`.
4. Abra o sistema no seu navegador e teste o registro, login e dashboard.

## Estrutura do Projeto

- `index.php`: Página de login.
- `register.php`: Página de registro de usuário.
- `dashboard.php`: Página do dashboard com informações sobre usuários.
- `logout.php`: Script para realizar o logout do usuário.
- `assets/`: Diretório contendo arquivos CSS, JavaScript e imagens.
- `config.php`: Arquivo de configuração com as credenciais do banco de dados.
- `login.php`: Script para processar o login do usuário.
- `register_process.php`: Script para processar o registro de usuário.

## Contribuindo

Contribuições são bem-vindas! Sinta-se à vontade para abrir uma issue para relatar bugs ou propor novas funcionalidades. Se desejar contribuir com código, por favor abra um pull request.

## Licença

Este projeto está licenciado sob a [Licença MIT](LICENSE).
