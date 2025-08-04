<?php

// ROTA PARA EXIBIR O FORMULÁRIO DE CADASTRO DE NOVO PLANO
Route::get('admin/plans/create', 'Admin\PlanController@create')->name('plans.create');

// ROTA PARA CADASTRAR (ENVIAR) UM NOVO PLANO
Route::post('admin/plans/create', 'Admin\PlanController@store')->name('plans.store');

// ROTA PARA LISTAR TODOS OS PLANOS
Route::get('admin/plans', 'Admin\PlanController@index')->name('plans.index');

/* 
   ROTA PARA FILTRAR OS PLANOS (FILTRO E PAGINAÇÃO)
   ATENÇÃO: ESSA ROTA DEVE VIR ANTES DA ROTA DINÂMICA ({url}),
   SENÃO O LARAVEL ENTENDE 'search' COMO {url} E CHAMA O MÉTODO ERRADO.
   ACEITA QUALQUER VERBO HTTP POR CONTA DO USO DO FORM POR POST E DA PAGINAÇÃO POR GET.
*/
Route::any('admin/plans/search', 'Admin\PlanController@search')->name('plans.search');

/*
   ROTA PARA EXIBIR O FORMULÁRIO DE EDIÇÃO DE UM PLANO
   DEVE VIR ANTES DA ROTA DINÂMICA {url}!
*/
Route::get('admin/plans/{url}/edit', 'Admin\PlanController@edit')->name('plans.edit');

/*
   ROTA PARA ATUALIZAR (ENVIAR EDIÇÃO) DE UM PLANO
   Usando PUT (ou PATCH), padrão RESTful.
*/
Route::put('admin/plans/{url}', 'Admin\PlanController@update')->name('plans.update');
// Se quiser aceitar PATCH também, pode duplicar a linha acima com Route::patch

// ROTA PARA EXIBIR DETALHES DE UM PLANO ESPECÍFICO (usa o parâmetro dinâmico {url})
Route::get('admin/plans/{url}', 'Admin\PlanController@show')->name('plans.show');

// ROTA PARA DELETAR UM PLANO ESPECÍFICO (usa o parâmetro dinâmico {url})
Route::delete('admin/plans/{url}', 'Admin\PlanController@delete')->name('plans.delete');

// ROTA ADMIN PARA UTILIZAR O BREADCRUMB
Route::get('admin', 'Admin\PlanController@index')->name('admin.index');

// ROTA RAIZ DO SISTEMA (TELA DE BOAS-VINDAS)
Route::get('/', function () {
    return view('welcome');
});
