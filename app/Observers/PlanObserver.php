<?php

namespace App\Observers;
use Illuminate\Support\Str;
use App\Models\Plan;

class PlanObserver
{
    /**
     * Handle the plan "creating" event.
     *
     * @param  \App\Models\\Plan  $plan
     * @return void
     */
    public function creating(Plan $plan)
    { // Automatizando o processo de pegar a url
        $plan->url = Str::kebab($plan->name);
    }

    /**
     * Handle the plan "updating" event.
     *
     * @param  \App\Models\\Plan  $plan
     * @return void
     */
    public function updating(Plan $plan)
    {
        $plan->url = Str::kebab($plan->name);
    }
    // Ant es de atualizar o plano, o nome e a url vai ser atualizadas
}
