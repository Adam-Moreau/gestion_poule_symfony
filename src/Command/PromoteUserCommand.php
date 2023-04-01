<?php

namespace App\Command;

use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\User\UserInterface;

class PromoteUserCommand extends Command
{
    private $entityManager;
    private $userRepository;

    public function __construct(EntityManagerInterface $entityManager, UserRepository $userRepository)
    {
        parent::__construct();

        $this->entityManager = $entityManager;
        $this->userRepository = $userRepository;
    }

    protected function configure()
    {
        $this
            ->setName('app:make-user-admin')
            ->setDescription('Make a user an admin')
            ->addArgument('username', InputArgument::REQUIRED, 'The username of the user to make an admin');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $username = $input->getArgument('username');

        $user = $this->userRepository->findOneByUsername($username);

        if (!$user) {
            throw new UsernameNotFoundException(sprintf('User "%s" not found.', $username));
        }

        $user->setRoles(['ROLE_ADMIN']);

        $this->entityManager->flush();

        $output->writeln(sprintf('User "%s" has been made an admin', $username));
    }
}
