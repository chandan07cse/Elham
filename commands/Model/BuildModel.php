<?php
namespace commands\Model;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Filesystem\Filesystem;

class BuildModel extends Command{

    //method used to apply any setters or accept some arguments
    public function configure()
    {
        $this->setName('build:model')
             ->setDescription('Builds A New Model For You')
             ->addArgument('ModelName',InputArgument::REQUIRED,'Requires Model Name');
    }
    //method used to process the commands however we need to
    public function execute(InputInterface $input, OutputInterface $output)
    {
        $ModelName = $input->getArgument('ModelName');
        $file = new Filesystem();
        if($file->exists('app/Model/'.$ModelName.'.php'))
            $output->writeln("<fg=red;options=bold>{$ModelName} Model Already Exists</>");
        else {
            $modelTemplate = file_get_contents('commands/Model/template.php');
            $modelTemplate = str_replace("YourModel",$ModelName,$modelTemplate);
            $file->dumpFile('app/Model/' . $ModelName . '.php', $modelTemplate);
            $output->writeln('<comment>' . $ModelName . ' Model</comment><info> Built Successfully</info>');
        }
    }
}