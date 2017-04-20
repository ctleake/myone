<?php

namespace App\Providers;

use App\Permission;
use App\Role;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

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
     * @param  \Illuminate\Contracts\Auth\Access\Gate  $gate
     * @return void
     */
    // public function boot()
    public function boot(GateContract $gate)
    {
    //    $this->registerPolicies();
        parent::registerPolicies($gate);

        // Please note following code is run during a migration
        // - so comment out these lines if creating permissions
        // Dynamically register permissions with Laravel's Gate.
        foreach ($this->getPermissions() as $permission) {
            $gate->define($permission->name, function ($user) use ($permission) {
                //return $user->hasRole($permission->roles);
                return $user->hasPermission($permission);
            });
        }
        $gate->define('administrate', function ($user) {
            foreach ($user->roles as $role) {
                if ($role->name == 'administrator' || $role->name == 'Administrator') {
                    return true;
                }
            }
            return false;
        });
    }

    /**
     * Fetch the collection of site permissions.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    protected function getPermissions()
    {
        return Permission::with('roles')->get();
    }
}
