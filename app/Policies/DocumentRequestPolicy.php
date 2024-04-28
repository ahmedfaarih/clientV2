<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\DocumentRequest;
use App\Models\User;

class DocumentRequestPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any DocumentRequest');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, DocumentRequest $documentrequest): bool
    {
        return $user->checkPermissionTo('view DocumentRequest');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionTo('create DocumentRequest');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, DocumentRequest $documentrequest): bool
    {
        return $user->checkPermissionTo('update DocumentRequest');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, DocumentRequest $documentrequest): bool
    {
        return $user->checkPermissionTo('delete DocumentRequest');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, DocumentRequest $documentrequest): bool
    {
        return $user->checkPermissionTo('restore DocumentRequest');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, DocumentRequest $documentrequest): bool
    {
        return $user->checkPermissionTo('force-delete DocumentRequest');
    }

    public function canUploadDocuments(User $user, DocumentRequest $documentrequest): bool
    {
        return true;
    }

    
}
