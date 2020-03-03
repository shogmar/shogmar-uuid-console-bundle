<?php
namespace Shogmar\UuidConsoleBundle\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Style\SymfonyStyle;
use Ramsey\Uuid\Uuid;

class CreateUuidCommand extends Command
{
    protected static $defaultName = 'shogmar:create-uuid';

    protected function configure()
    {
        $this
            ->addArgument('version', InputArgument::REQUIRED, 'Generate a version 4 (random) UUID.');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $io = new SymfonyStyle($input, $output);
        
        if ($input->getArgument('version') == 'uuid4') {
            $uuid = Uuid::uuid4();
        } else {
            $io->error(sprintf('You can only use "%s" option', 'uuid4'));
            return 1;
        }

        $output->writeln($uuid);

        return 0;
    }
}
