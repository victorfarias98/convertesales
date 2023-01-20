# Converte Sales

Sistema de gestão de vendas da Converti - Sistema para teste vaga back-end




## Instalação

Instale (linux & mac) o projeto usando git e docker

```bash
  mkdir coverteSales
  git clone https://github.com/victorfarias98/convertesales.git
  cd coverteSales
  ./vendor/bin/sail up

```

Caso você utilize windows terá de utilizar uma distro do Linux dentro do Windows ( WSL)
para o docker funcionar perfeitamente, segue abaixo um tutorial de como fazer:

[Tutorial](https://nestcode.co/en/blog/begin-new-project-with-laravel-sail-and-docker-on-window-10)

Logo após a configuração do docker na sua WSL basta acessar a pasta e rodar o comando
```bash
    ./vendor/bin/sail/up
```

Após a instalação do docker vamos criar as tabelas do banco e rodar os seeders para que tenhamos os dados base do projeto:
```bash
    php artisan migrate --seed
```

*Disclaimer: Talvez você precise estar dentro do container do docker para executar o comando acima, basta rodar o comando:
```bash
    docker exec -it 30a7290b40a81c80cf61d45ce507b84264e977dc5d14bd317a5b488c52244c10 <- seu id do container do laravel php artisan migrate --seed
```


## Funcionalidades

- Login & Logout via API
- Cadastro de vendas dos vendedores
- Listagem total de vendas do sistema
- Listagem de vendas por unidade
- Listagem de vendas por diretoria
- Valor total das vendas por Diretoria
- Valor total das vendas por Unidade


## Documentação da API

[Documentação](https://documenter.getpostman.com/view/10017611/2s8ZDX5NpY)


## Roadmap

- Adicionar gestão de unidades
- Adicionar gestão de diretorias
- Adicionar gestão de usuários
- Adicionar testes unitários
- Retornar o mapa via API
- Refatorar os repositories com um ApiResource
- Organizar o código em namespaces separados
- Implementar UseCases
## Stack utilizada

**Back-end:** PHP, Laravel


## Autores

- [@victorfarias98](https://github.com/victorfarias98)


## Feedback

Se você tiver algum feedback, por favor nos deixe saber por meio de vgfr456@gmail.com

