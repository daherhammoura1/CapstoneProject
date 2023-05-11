<?php

namespace App\Console\Commands;

use App\Models\Policy;
use App\Models\Role;
use App\Models\User;
use Illuminate\Console\Command;

use App\Mail\PolicyReminderMail;
use Illuminate\Support\Facades\Mail;
use App\Mail\NotifyMail;

class PolicyEmailExpiration extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'PolicyEmail:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
        $role_user = Role::where('name', 'USER')->id;
        $user = User::where('role_id', $role_user)->id;
        $policyUser = Policy::where('user_id', $user)->whereMonth('policy_expiry_date', '=', date('m'))->whereDay('policy_expiry_date', '=', date('d'))->get();
        foreach ($policyUser as $key => $policyUser) {
            $email = $user->email;

            Mail::to($email)->send(new PolicyReminderMail($user));
        }
    }
}
