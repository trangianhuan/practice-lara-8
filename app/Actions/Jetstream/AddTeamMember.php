<?php

namespace App\Actions\Jetstream;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;
use Laravel\Jetstream\Contracts\AddsTeamMembers;
use Laravel\Jetstream\Events\TeamMemberAdded;
use Laravel\Jetstream\Jetstream;
use Laravel\Jetstream\Rules\Role;
use App\Models\User;
use DB;

class AddTeamMember implements AddsTeamMembers
{
    /**
     * Add a new team member to the given team.
     *
     * @param  mixed  $user
     * @param  mixed  $team
     * @param  string  $email
     * @param  string|null  $role
     * @return void
     */
    public function add($user, $team, string $email, string $role = null)
    {
        Gate::forUser($user)->authorize('addTeamMember', $team);

        $newTeamMember = Jetstream::findUserByEmailOrFail($email);

        $userHasOtherTeam = DB::table('team_user')
            ->where('user_id', $newTeamMember->id)
            ->where('team_id', '<>', function ($query) use ($newTeamMember) {
                $query->select('id')
                    ->from('teams')
                    ->where('teams.user_id', $newTeamMember->id)
                    ->where('teams.personal_team', 1)
                    ->limit(1);
            })->count();

        $numberMemberOfTeam = DB::table('team_user')
             // ->where('user_id', $newTeamMember->id)
            ->where('team_id', function ($query) use ($newTeamMember) {
                $query->select('team_id')
                    ->from('team_user as tu')
                    ->where('tu.user_id', $newTeamMember->id)
                    ->limit(1);
            })->selectRaw('count(team_id) as count')
            ->groupBy('team_id')
            ->first()->count ?? 0;

        $this->validate($team, $email, $role, $userHasOtherTeam, $numberMemberOfTeam);

        if (!$userHasOtherTeam) {
            $team->users()->attach(
                $newTeamMember,
                ['role' => $role]
            );

            $newTeamMember->update(['current_team_id' => $team->id]);

            TeamMemberAdded::dispatch($team, $newTeamMember);
        }
    }

    /**
     * Validate the add member operation.
     *
     * @param  mixed  $team
     * @param  string  $email
     * @param  string|null  $role
     * @return void
     */
    protected function validate($team, string $email, ?string $role, $userHasOtherTeam, $numberMemberOfTeam)
    {
        Validator::make([
            'email' => $email,
            'role' => $role,
            'userHasOtherTeam' => $userHasOtherTeam,
            'numberMemberOfTeam' => $numberMemberOfTeam,
        ], $this->rules(), [
            'email.exists' => __('We were unable to find a registered user with this email address.'),
            'userHasOtherTeam.size' => __('This user already belongs to the team.'),
            'numberMemberOfTeam.max' => __('This user already belongs to the team.'),
        ])->after(
            $this->ensureUserIsNotAlreadyOnTeam($team, $email)
        )->validateWithBag('addTeamMember');
    }

    /**
     * Get the validation rules for adding a team member.
     *
     * @return array
     */
    protected function rules()
    {
        return array_filter([
            'email' => ['required', 'email', 'exists:users'],
            'role' => Jetstream::hasRoles()
                            ? ['required', 'string', new Role]
                            : null,
            'userHasOtherTeam' => ['integer', 'size:0'],
            'numberMemberOfTeam' => ['integer', 'max:1'],
        ]);
    }

    /**
     * Ensure that the user is not already on the team.
     *
     * @param  mixed  $team
     * @param  string  $email
     * @return \Closure
     */
    protected function ensureUserIsNotAlreadyOnTeam($team, string $email)
    {
        return function ($validator) use ($team, $email) {
            $validator->errors()->addIf(
                $team->hasUserWithEmail($email),
                'email',
                __('This user already belongs to the team.')
            );
        };
    }
}
