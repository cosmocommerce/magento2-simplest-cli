<?php
namespace CosmoCommerce\Cli\Console\Command;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Test extends Command
{
    const TEST_ARGUMENT_NAME = 'argument_name';
    const TEST_OPTION_NAME = 'option_name';
    protected function configure()
    {
        $description = 'Test command to hello world.';
        
        $argument_name=self::TEST_ARGUMENT_NAME;
        $argument_description="argument description";
             
        $option_name=self::TEST_OPTION_NAME;
        $option_description="option description";
         
        $this->setName('cosmocommerce:cli:test')
            ->setDescription($description)
            ->setDefinition([
                /** 
                 * InputArgument construct
                 * @param string $name        The argument name
                 * @param int    $mode        The argument mode: self::REQUIRED or self::OPTIONAL
                 * @param string $description A description text
                 * @param mixed  $default     The default value (for self::OPTIONAL mode only)
                 */
                new InputArgument(
                    $argument_name,
                    InputArgument::REQUIRED,
                    $argument_description
                ),   
                /**
                 * InputOption construct
                 * @param string       $name        The option name
                 * @param string|array $shortcut    The shortcuts, can be null, a string of shortcuts delimited by | or an array of shortcuts
                 * @param int          $mode        The option mode: One of the VALUE_* constants
                 * @param string       $description A description text
                 * @param mixed        $default     The default value (must be null for self::VALUE_REQUIRED or self::VALUE_NONE)
                 */
                //option mode VALUE_NONE;VALUE_REQUIRED;VALUE_OPTIONAL;VALUE_IS_ARRAY;
                new InputOption(
                    $option_name,
                    '-t',
                    InputOption::VALUE_NONE,
                    $option_description
                ),
            ]);
        parent::configure();
    }
    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $argument = $input->getArgument(self::TEST_ARGUMENT_NAME);
        $option = $input->getOption(self::TEST_OPTION_NAME);
        
        if (!is_null($argument)) {
            if ($option) {
                $argument .= ' and you have enabled t option';
            }
        } else {
            throw new \InvalidArgumentException('Argument ' . self::TEST_ARGUMENT_NAME . ' is missing.');
        }
        $output->writeln('<info>Hello ' . $argument . '!</info>');
    }
}