<?php

namespace Convene\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\HttpFoundation\ParameterBag;

class CreateUserCommand extends Command
{
    const ROLE = "System Administrator";

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'convene:create-user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a user within Convene';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $first_name = $this->ask("First Name");
        $last_name = $this->ask("Last Name");
        $username = md5(microtime());
        $email = $this->ask("Email");
        $password = $this->secret("Password");
        $confirm = $this->secret("Password");
        $is_root = true;
        $is_active = true;

        if($password !== $confirm) {
            $this->error("Passwords do not match");
            return 2;
        }

        /** @var \Convene\Storage\Service\UserRoleService $userRoleService */
        $userRoleService = app('userRole.service');
        $role_id = $userRoleService->findByName(self::ROLE)->getKey();

        /** @var \Convene\Storage\Service\UserService $userService */
        $userService = app('user.service');

        /** @var \Convene\Storage\Entity\UserEntity $user */
        if($user = $userService->create(new ParameterBag(compact('first_name', 'last_name', 'email', 'username', 'password', 'is_active', 'is_root', 'role_id'))))
            $this->info("User '{$user->getKey()}' has been created.");
        else
            $this->error("Failed to create user.");

        return 0;
    }
}
