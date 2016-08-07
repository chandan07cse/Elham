<?php
namespace commands\Controller;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Filesystem\Filesystem;

class BuildController extends Command{

    //method used to apply any setters or accept some arguments
    public function configure()
    {
        $this->setName('build:controller')
             ->setDescription('Builds A New Controller For You')
             ->addArgument('ControllerName',InputArgument::REQUIRED,'Requires Controller Name')
             ->addArgument('Flag',InputArgument::OPTIONAL,'Pass plain as flag if plain controller needed i.e elham build:controller ControllerName plain');
    }
    //method used to process the commands however we need to
    public function execute(InputInterface $input, OutputInterface $output)
    {
        $ControllerName = $input->getArgument('ControllerName');
        $flag = $input->getArgument('Flag') ? $input->getArgument('Flag') : 'resource';
        $file = new Filesystem();
        if($file->exists('app/Controller/'.$ControllerName.'.php'))
            $output->writeln("<fg=red;options=bold>{$ControllerName} Already Exists</>");
        else {
            $controllerTemplate = file_get_contents('commands/Controller/'.$flag.'/template.blade.php');
            $controllerTemplate = str_replace("YourController",$ControllerName,$controllerTemplate);
            $file->dumpFile('app/Controller/' . $ControllerName . '.php', $controllerTemplate);
            $flag = $flag=='resource' ? 'Resourceful' : 'Plain';
            $output->writeln("<fg=magenta;options=bold>{$flag}</>".' <comment>' . $ControllerName . '</comment><info> Built Successfully</info>');
        }
    }
}