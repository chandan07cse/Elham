<?php

namespace commands\Model;

use Dotenv\Dotenv;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Filesystem\Filesystem;
use config\Database;
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
        $env = new Dotenv(__DIR__.'/../../');
        $env->load();
        $db = Database::pdo();
        $ModelName = $input->getArgument('ModelName');
        $table = strtolower($ModelName).'s';
        if(getenv('DB_DRIVER') == 'mysql'){
            $select = $db->prepare("describe {$table}");
            $select->execute();
            $cols = $select->fetchAll(\PDO::FETCH_COLUMN);
        }

        elseif(getenv('DB_DRIVER') == 'sqlite'){
            $select = $db->prepare("PRAGMA table_info([{$table}]);");
            $select->execute();
            $cols = array();
            foreach ($select as $k) {
                $cols[] = $k['name'];
            }
        }
        $file = new Filesystem();
        if($file->exists('app/Model/'.$ModelName.'.php'))
            $output->writeln("<fg=red;options=bold>{$ModelName} Model Already Exists</>");
        else {
            $modelTemplate = file_get_contents('commands/Model/template.php');
            $modelTemplate = rtrim($modelTemplate, "}");
            $modelTemplate = str_replace("YourModel",$ModelName,$modelTemplate);
            $properties = "    protected ";
            foreach($cols as $property)
                $properties .= "$".$property.', ';

            $properties = rtrim($properties, ", ").';';

            $modelTemplate .= $properties;
            foreach($cols as $col){
                if($col!="created_at" && $col!="updated_at"){
                $modelTemplate .= "

    public function set_".$col."($$col)
    {
    ";
$modelTemplate .='  $';
$modelTemplate .="this->$col = $$col;
    }
   ";

$modelTemplate .= " public function get_".$col."()
    {
        return ";
$modelTemplate .= "$";
$modelTemplate .= "this->$col;
    }";
   }
            }
$modelTemplate .="
}";

            $file->dumpFile('app/Model/' . $ModelName . '.php', $modelTemplate);
            $output->writeln('<comment>' . $ModelName . ' Model</comment><info> Built Successfully</info>');
        }
    }
}