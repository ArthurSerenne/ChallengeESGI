<?php 

// src/Command/CreateAdminUserCommand.php
namespace App\Command;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\Question;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class CreateAdminUserCommand extends Command
{
    protected static $defaultName = 'app:create-admin';

    private $entityManager;
    private $passwordHasher;

    public function __construct(EntityManagerInterface $entityManager, UserPasswordHasherInterface $passwordHasher)
    {
        $this->entityManager = $entityManager;
        $this->passwordHasher = $passwordHasher;

        parent::__construct();
    }

    protected function configure()
    {
        $this
            ->setDescription('Creates a new admin user.')
            ->setHelp('This command allows you to create an admin user...');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $helper = $this->getHelper('question');

        $firstnameQuestion = new Question('Entrer un nom: ');
        $firstname = $helper->ask($input, $output, $firstnameQuestion);

        $lastnameQuestion = new Question('Entrer un prénom: ');
        $lastname = $helper->ask($input, $output, $lastnameQuestion);

        $emailQuestion = new Question('Entrer une adresse mail: ');
        $email = $helper->ask($input, $output, $emailQuestion);

        $passwordQuestion = new Question('Entrer un mot de passe: ');
        $password = $helper->ask($input, $output, $passwordQuestion);

        $genderQuestion = new Question('Entrer un genre: (homme,femme,autres) ');
        $gender = $helper->ask($input, $output, $genderQuestion);

        $user = new User();
        $user->setFirstname($firstname);
        $user->setLastname($lastname);
        $user->setEmail($email);
        $user->setGender($gender);
        $user->setPassword($this->passwordHasher->hashPassword($user, $password));
        $user->setRoles(['ROLE_ADMIN']);
        $user->setVerified(true); // Assuming the admin user should be verified

        $this->entityManager->persist($user);
        $this->entityManager->flush();

        $output->writeln('Admin user successfully generated!');

        return Command::SUCCESS;
    }
}
