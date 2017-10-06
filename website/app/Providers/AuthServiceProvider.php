<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Models\Admin\Users\User;
use App\Models\Admin\NivelAcesso\Permission;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // Executa o gate antes das demais permissões verificando se o usuário é administrador
        Gate::before(function(User $user, $ability){
            if($user->hasRole('administrador')){
                return true;
            }
        });

        // Registra todas as permissões do sistema automaticamente
        if(!\App::runningInConsole()){
            foreach ($this->getPermissions() as $key => $permission) {
                Gate::define($permission->slug, function(User $user) use ($permission){
                    return $user->hasRole($permission->roles) /*|| $user->isAdmin()*/;
            });
          }
        }
    }

    private function getPermissions()
    {
        return Permission::with('roles')->get();
    }
}
