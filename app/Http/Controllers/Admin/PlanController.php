<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdatePlan;
use App\Models\Plan;
use Illuminate\Http\Request;
use ReturnTypeWillChange;

class PlanController extends Controller
{
    private $repository;

    public function __construct(Plan $plan)
    {
        $this->repository = $plan;
    }
    /* Index */
    public function index() 
    {
        $plans = $this->repository->latest()->paginate(); /* Páginar as páginas */
        return view('admin.pages.plans.index', [ 
         'plans' => $plans,
         ]);
    }
    /* Create */
    public function create()
    {
        return view('admin.pages.plans.create');
    }

    /* Store */
    /* StoreUpdatePlan valida a ação do plano */
    public function store(StoreUpdatePlan $request) /* Request pega os dados que vem do formulário */
    {
        $this->repository->create($request->all());

        return redirect()->route('plans.index');
    }

    /* Show */
    /* first() - retorna um único registro, get() - retorna collection */
    /* if(!$plan) - se não encontrar o plano retorna de onde veio a requisição  */
    public function show($url) /* Recupera o plano pela url */
     {
        $plan = $this->repository->where('url', $url)->first();
        if(!$plan) 
            return redirect()->back();

        return  view('admin.pages.plans.show', [
            'plan' => $plan
        ]);
    }

    /* Delete */
    public function delete($url) /* Recupera o plano pela url */
     { 
        /* Recupera o plano pela url */
        $plan = $this->repository->where('url', $url)->first();
        if(!$plan) 
            return redirect()->back();

        /* Objeto de plano para deletar o delete() */    
        $plan->delete();
        /* Plano removido retorna para a rota de listagens  */
        return redirect()->route('plans.index');
    }

    /* Search */
    public function search(Request $request)
    {   /* Resolvendo o bug do filtro na pesquisa */
        /* A váriavelç filters só será passado no método search */
        /* É um, array e pega todos os elementos da lista */
        $filters = $request->except('_token'); /* Não passar o token na URL */
        $plans = $this->repository->search($request->filter);

        /* Exibe todos os resultados */
        return view('admin.pages.plans.index', [ 
         'plans' => $plans,
         'filters' =>$filters,
         ]);            
    }

    /* Edit */
     public function edit($url) /* Recupera o plano pela url */
     { 
        /* Recupera o plano pela url */
        $plan = $this->repository->where('url', $url)->first();
        if(!$plan) 
            return redirect()->back();

        return view ('admin.pages.plans.edit', [
            'plan' => $plan
        ]);
    }

    /* Update */ 
    public function update(StoreUpdatePlan $request, $url) /* StoreUpdatePlan: Não deixa passar a alteração do plano, caso de edição */
    { 
        /* Recupera o plano pela url */
        $plan = $this->repository->where('url', $url)->first();
        if(!$plan) 
            return redirect()->back();
        $plan->update($request->all());
        return redirect()->route('plans.index'); /* Após a edição retorna para a lista dos planos */
    }

}
