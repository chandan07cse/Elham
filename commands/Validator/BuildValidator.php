<?php
namespace commands\Validator;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Filesystem\Filesystem;

class BuildValidator extends Command{

    //method used to apply any setters or accept some arguments
    public function configure()
    {
        $this->setName('build:validator')
             ->setDescription('Builds A New Validator For You')
             ->addArgument('ValidatorName',InputArgument::REQUIRED,'Requires Validator Name');
    }
    //method used to process the commands however we need to
    public function execute(InputInterface $input, OutputInterface $output)
    {
        $ValidatorName = $input->getArgument('ValidatorName');
        $file = new Filesystem();
        if($file->exists('app/Validation/'.$ValidatorName.'.php'))
            $output->writeln("<fg=red;options=bold>{$ValidatorName} Validator Already Exists</>");
        else {
            $validatorTemplate = file_get_contents('commands/Validator/template.php');
            $validatorTemplate = str_replace("YourValidator",$ValidatorName,$validatorTemplate);
            $file->dumpFile('app/Validation/' . $ValidatorName . '.php', $validatorTemplate);
            $output->writeln('<comment>' . $ValidatorName . ' Validator</comment><info> Built Successfully</info>');
        }
    }
}