<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Input;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\OrionNomesPublicacaoImport;
use App\Models\OrionNomesPublicacao;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orion1_nomes_publicacao', function (Blueprint $table) {
            $table->id();
            $table->string('codigo',25)->nullable()->comment('codigo')->index('codigo_nome_pulicacao');
            $table->string('pf',5)->nullable()->comment('pf');
            $table->string('tipo',10)->nullable()->comment('tipo publicacao');
            $table->string('oab',10)->nullable()->comment('oab publicacao');
            $table->string('uf',2)->nullable()->comment('uf publicacao');
            $table->string('cpf',15)->nullable()->comment('cpf publicacao');
            $table->string('nome',20)->nullable()->comment('nome publicacao');
            $table->string('dj',30)->nullable()->comment('dj publicacao');
            $table->string('quem_recebe',25)->nullable()->comment('quem recebe')->index('quem_recebe_nome_pulicacao');
            $table->string('status',15)->nullable()->comment('status publicacao');
            $table->string('possui_homonimo',5)->nullable()->comment('Possui homônimo publicacao');
            $table->string('permissoes_usuarios',25)->nullable()->comment('permissoes usuarios');
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->integer('deleted_by')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        echo "Tabela Criada \n";


        //Excel::import(new UsersImport, 'users.xlsx');
       // Excel::import(new OrionNomesPublicacaoImport, storage_path('c:\teste\nomes_publicacao.xlsx'));
        Excel::import(new OrionNomesPublicacaoImport, storage_path('teste\nomes_publicacao.xlsx'));

        // php artisan migrate --path="database/migrations/2023_02_01_142333_create_orion_nomes_de_publicacao_table.php"
        // php artisan migrate:rollback --path="database/migrations/2023_02_01_142333_create_orion_nomes_de_publicacao_table.php"




        /* tabelas adicionais
            clientes / responsavel
            qualificações
            usuarios



        Schema::create('publicacoes', function (Blueprint $table) {
            $table->id();
            $table->string('codigo',25)->nullable()->comment('codigo')->index('codigo_nome_pulicacao');
            $table->string('titulo',255)->nullable()->comment('titulo cad_processo');
            $table->string('codigo_clientes',25)->nullable()->comment('codigo_clientes')->index('codigo_clientes_nome_pulicacao');
            $table->string('codigo_qualificacoes',25)->nullable()->comment('codigo_qualificacoes')->index('codigo_qualificacoes_clientes_nome_pulicacao');
            $table->string('cliente principal',25)->nullable()->comment('Cliente principal');
            $table->string('responsavel',25)->nullable()->comment('codigo responsavel')->index('codigo_responsavel_nome_pulicacao');
            $table->string('tipo',15)->nullable()->comment('tipo publicacao');
            $table->string('status',15)->nullable()->comment('status publicacao');
            $table->string('usuarios',40)->nullable()->comment('usuarios publicacao');
            $table->string('permissoes_usuarios',25)->nullable()->comment('permissoes usuarios');
            $table->string('acesso',10)->nullable()->comment('acesso publicacoes');
            $table->string('quem_criou',25)->nullable()->comment('quem criou publicacoes');
            $table->string('ultima_movimentacao',15)->nullable()->comment('ultima movimentacao publicacoes');
            $table->string('data_criacao',15)->nullable()->comment('data de criação publicacoes');
            $table->string('etiquetas',255)->nullable()->comment('etiquetas publicacoes');
            $table->string('descricao',255)->nullable()->comment('descrição publicacoes');
            $table->string('contatos_partes',105)->nullable()->comment('contatos das partes publicacoes');
            $table->string('qualificacao_partes',105)->nullable()->comment('qualificação das partes publicacoes');

            $table->timestamps();
        });
        */
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orion1_nomes_publicacao');
    }
};
