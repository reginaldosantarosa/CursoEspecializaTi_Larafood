<?php

namespace App\Listeners;

use App\Empresa\Events\EmpresaCreated;
use App\Models\Role;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class AddRoleEmpresa
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(EmpresaCreated $event)
    {
        $user = $event->user();

        if (!$role = Role::first())
            return;

        $user->roles()->attach($role);

        return 1;
    }
}
