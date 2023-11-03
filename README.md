## Pré-requisitos

- [Git](https://git-scm.com/)
- [Docker Compose](https://docs.docker.com/compose/)
- [Composer](https://getcomposer.org/)

`Certifique-se de que você tenha todas as dependências acima instaladas antes de prosseguir.`

## Passos

#### 1. Clonar o repositório

```bash
git clone https://github.com/GuilhermeYamasaki/api-marketplace
```

#### 2. Entrar na pasta

```bash
cd api-marketplace
```

#### 3. Baixar dependencias

```bash
composer install
```

#### 4. Copiar .env 

```bash
cp .env.example .env
```

#### 5. Adicionar alias do Sail

```bash
alias sail='[ -f sail ] && sh sail || sh vendor/bin/sail'
```

#### 6. Construir container

```bash
sail up -d
```

#### 7. Rode os testes

```bash
sail artisan test
```

#### 8. Baixar dependencias Node

```bash
sail npm i
```

#### 9. Abrir terminal e deixar executando

```bash
sail artisan queue:work
```

#### 10. Abrir outro terminal e deixar executando

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
