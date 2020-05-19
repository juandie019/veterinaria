<?php

namespace App\Policies;

use App\User;
use App\Venta;
use Illuminate\Auth\Access\HandlesAuthorization;

class VentaPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        if(!isset($user->empleado)){
            return true;
        }

        return $user->empleado->esGerente() || $user->empleado->esCajero();
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\Venta  $venta
     * @return mixed
     */
    public function view(User $user, Venta $venta)
    {
        if(!isset($user->empleado)){
            return true;
        }

        return $user->empleado->esGerente() || $user->empleado->esCajero();
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        if(!isset($user->empleado)){
            return true;
        }

        return $user->empleado->esGerente() || $user->empleado->esCajero();
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Venta  $venta
     * @return mixed
     */
    public function update(User $user, Venta $venta)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Venta  $venta
     * @return mixed
     */
    public function delete(User $user, Venta $venta)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Venta  $venta
     * @return mixed
     */
    public function restore(User $user, Venta $venta)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Venta  $venta
     * @return mixed
     */
    public function forceDelete(User $user, Venta $venta)
    {
        //
    }
}
