<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\ClientCase;
use App\Models\User;

class ClientCasePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any ClientCase');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, ClientCase $clientcase): bool
    {
        return $user->checkPermissionTo('view ClientCase');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionTo('create ClientCase');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, ClientCase $clientcase): bool
    {
        return $user->checkPermissionTo('update ClientCase');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, ClientCase $clientcase): bool
    {
        return $user->checkPermissionTo('delete ClientCase');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, ClientCase $clientcase): bool
    {
        return $user->checkPermissionTo('restore ClientCase');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, ClientCase $clientcase): bool
    {
        return $user->checkPermissionTo('force-delete ClientCase');
    }
}
