<?php

namespace App\Policies;

use App\Models\Huisdier;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class HuisdierPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(?User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(?User $user, Huisdier $huisdier): bool
    {
        return true;
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
    public function update(User $user, Huisdier $huisdier): bool
    {
        return $user->id === $huisdier->baasje_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Huisdier $huisdier): bool
    {
        return $user->id === $huisdier->baasje_id;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Huisdier $huisdier): bool
    {
        return $user->id === $huisdier->baasje_id;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Huisdier $huisdier): bool
    {
        return false;
    }
}
