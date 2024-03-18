# Mail Service

Este guia explica como configurar e executar esse projeto corretamente.

Este microsserviço é dedicado exclusivamente ao envio de e-mails. Ele recebe mensagens diretamente do projeto principal "banco-digital" através do serviço de mensageria da AWS, o SQS, na fila "mail-queue", as quais contêm os dados da transação. Em seguida, o microsserviço utiliza esses dados para enviar um e-mail ao beneficiário da transação.

## Pré-requisitos

- [Docker](https://docs.docker.com/get-docker/)
- [Docker Compose](https://docs.docker.com/compose/install/)

## Configuração

1. Clone o repositório da aplicação Lumen:

   ```bash
   git clone https://github.com/seu-usuario/seu-repositorio-laravel.git

2. Navegue até o diretório da aplicação:

   ```bash
   cd seu-repositorio-laravel

3. Crie um arquivo .env na raiz do diretório da aplicação, baseando-se no arquivo .env.example. Você pode usar o comando cp no Unix/Linux ou copy no Windows:

   ```bash
   cp .env.example .env

4. Edite o arquivo .env com as configurações de banco de dados e outras configurações específicas da sua aplicação, se necessário.

### Fila

- Para execucao da fila, estou usando o servico de mensageria da AWS, o SQS. Portanto é necessário seguir os seguintes passos:

1. Crie um usuario administrativo na sua conta da AWS. Voce pode conferir como fazer isso [aqui](https://docs.aws.amazon.com/AWSSimpleQueueService/latest/SQSDeveloperGuide/sqs-setting-up.html).

2. Crie uma nova fila com o nome de "mail-queue".

3. Adicione sua chave de acesso da aws na variavel AWS_ACCESS_KEY_ID.

4. Adicione sua chave de acesso secreta da aws na variavel AWS_SECRET_ACCESS_KEY.

5. Adicione a url (https://sqs.us-east-2.amazonaws.com/<account-id>) na variavel SQS_PREFIX
    
## Execução

1. Execute o comando Docker Compose para construir os contêineres e iniciar a aplicação:

   ```bash
   docker-compose up -d --build

2. Após a construção e inicialização dos contêineres, você pode acessar a aplicação em seu navegador web através do seguinte endereço:

    ```bash
   http://localhost:8001

3. Para entrar no bash do projeto com o docker, execute o seguinte comando:

    ```bash
   docker exec -it mail-service_laravel /bin/sh
   
   ou
   
   docker exec -it <id-container-aplicacao> /bin/sh
   
4. Para executar a fila:

    ```bash
   php artisan queue:listen sqs
