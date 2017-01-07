<?php
namespace commands\Form;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Filesystem\Filesystem;

class BuildForm extends Command{

    //method used to apply any setters or accept some arguments
    public function configure()
    {
        $this->setName('build:form')
             ->setDescription('Builds A New Blade Form For You')
             ->addArgument('FormName',InputArgument::REQUIRED,'Requires Form Name');
    }
    //method used to process the commands however we need to
    public function execute(InputInterface $input, OutputInterface $output)
    {
        $formName = $input->getArgument('FormName');
        $file = new Filesystem();
        if($file->exists('app/Views/_partials/'.$formName.'.blade.php'))
            $output->writeln("<fg=red;options=bold>{$formName} Form Already Exists</>");
        else {
            $formTemplate = file_get_contents('commands/Form/template.blade.php');
            $formTemplate = str_replace("YourValidator",$formName,$formTemplate);
            $file->dumpFile('app/Views/_partials/' . $formName . '.blade.php', $formTemplate);
            $output->writeln('<comment>' . $formName . ' Form</comment><info> Built Successfully</info>');
        }
    }
}