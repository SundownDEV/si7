<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\Process\Process;

class GenerateKeysCommand extends Command
{
    private $params;

    protected static $defaultName = 'app:generate-keys';

    public function __construct(?string $name = null, ParameterBagInterface $parameterBag)
    {
        parent::__construct($name);

        $this->params = $parameterBag;
    }

    protected function configure()
    {
        $this
            ->setDescription('Generate RSA keys for JWT token')
            ->addArgument('passphrase', InputArgument::OPTIONAL, 'Enter the ssh key passphrase')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $io = new SymfonyStyle($input, $output);

        $configDir = $this->params->get('kernel.project_dir');

        $passphrase = $input->getArgument('passphrase') ?? 'symfony';

        $process = new Process('mkdir -p '.$configDir.'/config/jwt');
        $process->run();

        $process = new Process('openssl genrsa -out '.$configDir.'/config/jwt/private.pem -aes256 4096 -pass '.$passphrase);
        $process->run();

        $process = new Process('openssl rsa -pubout -in '.$configDir.'/config/jwt/private.pem -out '.$configDir.'/config/jwt/public.pem -pass '.$passphrase);
        $process->run();

        $process = new Process('openssl rsa -in '.$configDir.'/config/jwt/private.pem -out '.$configDir.'/config/jwt/private2.pem -pass '.$passphrase);
        $process->run();

        $process = new Process('mv '.$configDir.'/config/jwt/private.pem '.$configDir.'/config/jwt/private.pem-back');
        $process->run();

        $process = new Process('mv '.$configDir.'/config/jwt/private2.pem '.$configDir.'/config/jwt/private.pem');
        $process->run();

        $io->success('Success. SSH keys generated.');
    }
}
