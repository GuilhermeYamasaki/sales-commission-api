## Pré-requisitos

- [Git](https://git-scm.com/)
- [Docker Compose](https://docs.docker.com/compose/)
- [Composer](https://getcomposer.org/)

`Certifique-se de que você tenha todas as dependências acima instaladas antes de prosseguir.`

## Passos

#### Clonar o repositório

```bash
git clone https://github.com/GuilhermeYamasaki/sales-commission-api.git
```

#### Entrar na pasta

```bash
cd sales-commission-api
```

#### Baixar dependencias

```bash
composer install
```

#### Copiar .env 

```bash
cp .env.example .env
```

#### Adicionar alias do Sail

```bash
alias sail='[ -f sail ] && sh sail || sh vendor/bin/sail'
```

#### Construir container

```bash
sail up -d
```

#### Gerar chave criptografada

```bash
sail artisan key:generate
```

#### Criar banco de dados

```bash
sail artisan migrate:fresh --seed
```

#### Rode os testes

```bash
sail artisan test
```

#### Baixar dependencias Node

```bash
sail npm i
```

#### Abrir terminal e deixar executando

```bash
sail artisan queue:work
```

#### Abrir outro terminal e deixar executando

```bash
sail npm run dev
```

#### Por fim, acesse no navegador

```
http://localhost:8000
```

## Tecnologias

- [Laravel 10.x](https://laravel.com/)
- [Typescript](https://www.typescriptlang.org/)
- [TailwindCss](https://tailwindcss.com/)
- [Axios](https://axios-http.com/)
- [Husky](https://typicode.github.io/husky/)
- [Pint](https://laravel.com/docs/10.x/pint)
