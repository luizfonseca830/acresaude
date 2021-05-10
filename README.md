<p align="center">AcreSaude</p>

# Sobre o projeto

http://acresaude.com.br/

É um e-commerce, de compras de serviços de profissionais que atendente a distancia ou a domicílio.
Mediante a agendamentos e pagamentos online via cartão.


## Metodo de pagamento seguro usando PAGARME
<img src="https://avatars1.githubusercontent.com/u/3846050?v=4&s=200" width="127px" height="127px" align="center"/>


## Layout mobile
![Mobile 1](https://github.com/acenelio/assets/raw/main/sds1/mobile1.png) ![Mobile 2](https://github.com/acenelio/assets/raw/main/sds1/mobile2.png)

## Layout web
![Web 1](https://github.com/acenelio/assets/raw/main/sds1/web1.png)

![Web 2](https://github.com/acenelio/assets/raw/main/sds1/web2.png)

## Modelo conceitual
![Modelo Conceitual](https://github.com/acenelio/assets/raw/main/sds1/modelo-conceitual.png)

# Tecnologias utilizadas
## Back end
- PHP 7*
- Laravel
- Composer

## Front end
- HTML / CSS / JS /
- BootStrap
- 
## Implantação em produção
- Back e Font end: Hostgator
- Banco de dados: Mysql

# Como executar o projeto

## Back end e Frond end
Pré-requisitos: PHP 7*, composer

```bash
# clonar repositório
git clone https://github.com/luizfonseca830/acresaude.git

# entrar na pasta do projeto
cd acresaude

# instalar dependências
composer install

# dar permissões
sudo chmod -R 777 storage bootstrap/cache

# criar chave do app
php artisan key:generate

# subir o banco de dados
php artisan migrate --seed


# executar o projeto
php artisan serve
```

# Autor
Jorge Luiz Almeida Fonseca

https://www.linkedin.com
