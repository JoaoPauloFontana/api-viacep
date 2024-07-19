# Como Rodar o Projeto

Este guia fornece instruções para executar o projeto usando Docker e Docker Compose.

## Pré-requisitos

- **Docker**: Certifique-se de que o Docker está instalado em sua máquina. [Instruções de instalação](https://docs.docker.com/get-docker/)
- **Docker Compose**: Certifique-se de que o Docker Compose está instalado. [Instruções de instalação](https://docs.docker.com/compose/install/)

## Configuração do Projeto

1. **Clone o Repositório**

   Primeiro, clone o repositório para sua máquina local:

   ```bash
   git clone https://github.com/JoaoPauloFontana/api-viacep.git
   cd api-viacep

2. **Construa e Inicie os Containers**

   Navegue até o diretório raiz do projeto e execute o seguinte comando para construir e iniciar os containers:

   ```bash
   docker-compose up -d --build
   ```

3. **Instale o composer no container**

   Após o container ser construído e iniciado, execute o seguinte comando para instalar o composer:

   ```bash
   docker-compose exec app composer install
   ```

4. **Teste a API**

   Após tudo pronto, já podemos testar a API:

   ### URL: http://localhost:8100

   ```bash
   curl --location 'http://localhost:8100/api/search/local/01001000,17560-246'
   ```
