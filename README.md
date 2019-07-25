# Teste MkData

## Instruções para instalação do ambiente

- Clone ou baixe os arquivos do projeto;
- Instale o Laravel e suas dependências (https://laravel.com/docs/5.8#installing-laravel);
- Em seu pacote de servidor preferido (para o desenvolvimento foi utilizado o XAMPP) e ative o MySQL;
- Abra o PHPMyAdmin e crie uma database com o nome desejado (para o desenvolvimento foi criada uma database entitulada "mkdata");
- Vá ao projeto do Laravel e altere o arquivo .env com as informações referentes a database criada;
- Abra um novo terminal (prompt de comando ou PowerShell), acesse a pasta na qual o projeto se encontra e digite os comandos "php artisan migrate" para que as tabelas sejam criadas, "php artisan db:seed" para que as tabelas sejam populadas através do [faker](https://github.com/fzaninotto/Faker) e "php artisan serve" para iniciar o servidor (caso a porta padrão já esteja sendo utilizada o servidor não iniciará e a porta precisará ser alterada com o comando "php artisan serve --port=PORTA");
- Acesse "localhost:PORTA".

## Screenshots

![](caminho até a imagem)

## Desenvolvido utilizando

- [Laravel](https://laravel.com/) e suas dependências
- [Select2](https://select2.org/)
- [FontAwesome](https://fontawesome.com/)
- [jQuery FileStyle](http://markusslima.github.io/jquery-filestyle/options.html)


## Autores

- [Marcio Câmara](https://marciocamara.github.io) - Desenvolvimento FullStack

Veja também a lista de [contribuidores](https://github.com/MarcioCamara/calculadora-imc/graphs/contributors) que participaram desse projeto.

## Licença

Esse projeto está licenciado sob a Licença [MIT](https://github.com/MarcioCamara/calculadora-imc/blob/master/LICENSE).
