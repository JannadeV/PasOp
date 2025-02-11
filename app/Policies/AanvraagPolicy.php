<?php

namespace App\Policies;

use App\Models\Aanvraag;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class AanvraagPolicy
{

    public function before(User $user, string $ability): bool
    {
        if ($user->isAdmin) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Aanvraag $aanvraag): bool
    {
        return ($user->id === $aanvraag->oppasser_id)
            || ($user->id === $aanvraag->oppastijds[0]->huisdier->baasje_id);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Aanvraag $aanvraag): bool
    {
        return $user->id === $aanvraag->oppastijds[0]->huisdier->baasje_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Aanvraag $aanvraag): bool
    {
        return ($user->id === $aanvraag->oppasser_id);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Aanvraag $aanvraag): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Aanvraag $aanvraag): bool
    {
        //
    }
}
