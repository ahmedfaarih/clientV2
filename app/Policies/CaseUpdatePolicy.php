<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\CaseUpdate;
use App\Models\User;

class CaseUpdatePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any CaseUpdate');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, CaseUpdate $caseupdate): bool
    {
        return $user->checkPermissionTo('view CaseUpdate');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionTo('create CaseUpdate');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, CaseUpdate $caseupdate): bool
    {
        return $user->checkPermissionTo('update CaseUpdate');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, CaseUpdate $caseupdate): bool
    {
        return $user->checkPermissionTo('delete CaseUpdate');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, CaseUpdate $caseupdate): bool
    {
        return $user->checkPermissionTo('restore CaseUpdate');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, CaseUpdate $caseupdate): bool
    {
        return $user->checkPermissionTo('force-delete CaseUpdate');
    }
}
