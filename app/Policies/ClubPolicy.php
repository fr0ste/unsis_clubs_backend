<?php

namespace App\Policies;

use App\Models\Club;
use App\Models\User;
use Illuminate\Auth\Access\Response;

/**
 * Class ClubPolicy
 * @package App\Policies
 *
 * Authorization policies for the Club model.
 */
class ClubPolicy
{   
    /**
     * Before method to grant full access to administrators.
     *
     * @param \App\Models\User $user
     * @param string $ability
     * @return bool|null
     */
    public function before($user, $ability)
    {
        // Grant full access to administrators
        if ($user->isGranted(User::ROLE_ADMIN)) {
            return true;
        }
    }

    /**
     * Determine whether the user can view any models.
     *
     * @param \App\Models\User $user
     * @return bool
     */
    public function viewAny(User $user): bool
    {
        // Deny access to view any models by default
        return false;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Club $club
     * @return bool
     */
    public function view(User $user, Club $club): bool
    {
        // Deny access to view the model by default
        return false;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param \App\Models\User $user
     * @return bool
     */
    public function create(User $user): bool
    {
        // Deny access to create models by default
        return false;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Club $club
     * @return bool
     */
    public function update(User $user, Club $club): bool
    {
        // Deny access to update the model by default
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Club $club
     * @return bool
     */
    public function delete(User $user, Club $club): bool
    {
        // Deny access to delete the model by default
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Club $club
     * @return bool
     */
    public function restore(User $user, Club $club): bool
    {
        // Deny access to restore the model by default
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Club $club
     * @return bool
     */
    public function forceDelete(User $user, Club $club): bool
    {
        // Deny access to permanently delete the model by default
        return false;
    }
}
