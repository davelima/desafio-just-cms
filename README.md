# Desafio Just Digital - Micro CMS

Micro CMS desenvolvido para o teste de contratação descrito [neste link](https://github.com/justdigital/desafios/blob/master/cms/README.md).

Para rodar o projeto:

```
composer dump-autoload # Criará o arquivo de autoload do Composer
docker-compose up -d # Criará 3 containers: justcms-php7, justcms-nginx e justcms-mariadb
docker exec -i justcms-mariadb mysql -ujust -pjust just < Sql/database.sql # Importará o usuário padrão do sistema e publicações de exemplo
```

Após isso, o site poderá ser acessado via `http://localhost` e
`http://just.cms` (necessita configuração via `/etc/hosts`).

Para acessar a área administrativa, basta clicar no link `Admin`
no canto superior direito do site. Dados de acesso:

**Usuário**: just

**Senha**: just

-----

Todo o código neste projeto (exceto as bibliotecas de terceiros
listadas abaixo) são de minha autoria, desenvolvido da forma
mais simples possível e não deve ser utilizado em produção.


Bibliotecas/plugins de terceiros utilizados:
- Composer
- Bower
    - Bootstrap 3
        - jQuery
- TinyMCE
