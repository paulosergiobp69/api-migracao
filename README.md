<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 2000 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[OP.GG](https://op.gg)**
- **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**
- **[Lendio](https://lendio.com)**

## PREAMBULO Geração de Api

Procedimento de Desenvolvimento API - Engepecas

C:\preambulo>git clone https://github.com/paulosergiobp69/api-migracao.git
 
C:\preambulo\api-integracao>composer install

--> copiar arquivo .env  para a pasta instalada

Criar as migrations iniciais de usuatios etc:
C:\preambulo\api-integracao>	php artisan  migrate (todos)


caso seja necessario reiniciar tabelas utilizar para carregar usuario:
C:\preambulo\api-integracao>php artisan db:seed

1. C:\preambulo\api-integracao>php artisan make:migration create_nome_tabel_table --create=tabela_desejada

						  php artisan make:migration create_fornecedor_table --create=fornecedor

ou
   C:\preambulo\api-integracao>php artisan make:model MODELS\Fornecedor -m
   
	<trata informações migration>
	
	<gera migration>
	php artisan  migrate (todos)

	C:\preambulo\api-integracao>php artisan migrate --path="database/migrations/2020_11_04_111650_create_fornecedor_table.php"   (uma tabela)

     para desfazer:
     C:\preambulo\api-integracao>php artisan migrate:rollback --path="database/migrations/2023_02_01_142333_create_orion_nomes_de_publicacao_table.php"   
	
## https://github.com/kitloong/laravel-migrations-generator
     UTILIZANDO TABELA EXISTENTE:
     php artisan migrate:generate --tables="table1,table2,table3,table4,table5"
     OU
     php artisan migrate:generate --ignore="table3,table4,table5"
   
2. C:\preambulo\api-integracao>php artisan infyom:api PurchaseHistOrders  --fromTable --tableName=purchase_hist_orders  --primary=id 


     caso precise outra conexão de bd:
     ---> php artisan infyom:api Config --connection=name --fromTable --tableName=nomeTabela

rollback
php artisan infyom:rollback <classes> api
    
C:\preambulo\api-integracao>php artisan infyom:rollback PurchaseHistOrders api     




3. MODEL:

        a) $fillable --> Remove created_at ... (campos que vao ser inseridos)
        b) $hidden --> campo que serão ocultados se precisar mostrar tem que retira deste parametro
		
		
        c) $cast --> deixa
        d) $rules ---> copia para usar no Create????APIRequest.php e UpdateApi
		
		
		
4:Altera HTTP -> Request -> API -> Create????APIRequest.php
		adiciona Rules e trata a informação.

5: Altera HTTP -> Request -> API -> Update????APIRequest.php
		adiciona Rules e trata a informação.

6: Controller:

	adiciona em todos as chamadas de metrodo da classe, ma posição indicada abaixo:
     *      path="/fornecedors",
     *      summary="Get a listing of the Fornecedors.",
--->     *      security={{ "EngepecasAuth": {} }},  
     *      tags={"Fornecedor"},
     *      description="Get all Fornecedors",
     *      produces={"application/json"},
		 
	
7: routes
     copia o caminho da api para dentro da estrutura de jwt
     ajusta o nome da rota para o que esta no controler 

     ex: 
     De: purchase_hist_incoming_invoices
     Para: purchaseHistIncomingInvoices


Após o mapeamento dos campos sempre proceder com o a limpeza do cache do laravel 

`php artisan cache:clear` e `php artisan config:cache`  

C:\preambulo\api-integracao>php artisan optimize:clear

Iniciar desenv: php artisan serve --host=192.168.10.183 --port=9000


php artisan cache:clear

cache
Colocar as configurações em cache

php artisan route:cache
Colocar as rotas em cache

C:\preambulo\api-integracao>php artisan optimize:clear

## Final PREAMBULO





## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
