# test-bossabox-backend-php-vuttr

<p><img src="https://github.com/henriqueweiand/test-bossabox-backend-php-vuttr/workflows/Laravel%20Workflow/badge.svg"></p>

## Proposta

[Dev. Back-End](https://www.notion.so/04cfd92927a045f6914ab1e2c9002c02)

Sua tarefa é construir uma API e banco de dados para a aplicação VUTTR (Very Useful Tools to Remember). A aplicação é um simples repositório para gerenciar ferramentas com seus respectivos nomes, links, descrições e tags. Utilize um repositório Git (público, de preferência) para versionamento e disponibilização do código.

A aplicação pode ser construída utilizando qualquer linguagem, banco de dados, frameworks, libraries e ferramentas de sua preferência (Ex: Node + Express + Mongoose + MongoDB, PHP + Lumen + RedBean + PostgreSQL, etc). Apesar disso, a stack mais comum para squads aqui na BossaBox é **Node.js,** seguida por **PHP. Ruby** é incomum, mas aparece em raros casos.

##O que será avaliado:

Queremos avaliar sua capacidade de desenvolver e documentar um back-end para uma aplicação. Serão avaliados:

- Código bem escrito e limpo;
- Quais ferramentas foram usadas, como e porquê, além do seu conhecimento das mesmas;
- Seu conhecimento em banco de dados, requisições HTTP, APIs REST, etc;
- Sua capacidade de se comprometer com o que foi fornecido;
- Sua capacidade de documentação da sua parte da aplicação.

## O mínimo necessário

- Uma aplicação contendo uma API real simples, sem autenticação, que atenda os requisitos descritos abaixo, fazendo requisições à um banco de dados para persistência;
- README.md contendo informações básicas do projeto e como executá-lo;
- [API Blueprint](https://apiblueprint.org/) ou [Swagger](https://swagger.io/docs/specification/basic-structure/) da aplicação.

## Bônus

Os seguintes itens não são obrigatórios, mas darão mais valor ao seu trabalho (os em negrito são mais significativos para nós, se destacando como características para se tornar **Tech Lead** em squads)

- Uso de ferramentas externas que facilitem o seu trabalho;
- Cuidados especiais com otimização, padrões, entre outros;
- Migrations ou script para configuração do banco de dados utilizado;
- **Testes**;
- **Conteinerização da aplicação**;
- **Autenticação e autorização** (**OAuth, JWT**);
- **Pipelines de CI/CD (GitLab, CircleCI, TravisCI, etc);**
- **Deploy em ambientes reais, utilizando serviços de cloud externos (AWS, Heroku, GCP, etc);**
- Sugestões sobre o challenge embasadas em alguma argumentação.

## Requisitos

Visite: https://www.notion.so/Dev-Back-End-04cfd92927a045f6914ab1e2c9002c02

## Dependências

- Docker

## Instruções para rodar

Você pode optar rodar de duas formas

Antes de tudo, entre na pasta lumen e renomeie o arquivo `.env.example` para `.env` e também o `phpunit.example.xml` para `phpunit.xml` afim de garantir que as variaveis de ambiente fiquem certas assim como para com os testes.

### 1) Execute o arquivo `run.sh` da pasta raiz, podendo ser via terminal com por exemplo:

`sh ./run.sh`

Este comando ira executar uma série de passos que você poderá acompanhar via terminal, referente a:
1) Build
2) Install das dependências do framework lumen
3) Run migrations para a criação das tabelas
4) O ambiente pode ser acessado no http://localhost

### 2) Execute os seguintes passos separadamente no seu terminal dentro da pasta do projeto:

`docker-compose up --build -d`

`docker run --rm --interactive --tty -v $PWD/lumen:/app composer install`

`docker exec -it php php /var/www/html/artisan migrate`

O ambiente pode ser acessado no http://localhost

### Material complementar

A documentação dos endpoints pode ser utilizada via Postman com o arquivo `send4.postman_collection.json` ou acesse para ter a base dos endpoint em https://app.swaggerhub.com/apis/henriqueweiand/test-bossabox-backend-php-vuttr/1.0.0

### Importante

Sempre fique atento que não exista outro processo rodando nas portas 3000, 9000 e 3306 pois serão as portas utilizadas ao executar o docker

### Tests

Para rodar os testes, apos os containers estarem de "pé", na pasta `/lumen` execute em seu terminal:  ./vendor/bin/phpunit