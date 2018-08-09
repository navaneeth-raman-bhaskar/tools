<?php

/**
 * This file is part of the Rathouz libraries (http://rathouz.cz)
 * Copyright (c) 2016 Tomas Rathouz <trathouz at gmail.com>
 */

namespace Rathouz\Tools\Console\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input;
use Symfony\Component\Console\Output;


/**
 * GenerateMarkdownCommand.
 *
 * @author Tomas Rathouz <trathouz at gmail.com>
 */
class GenerateMarkdownCommand extends Command
{


    /** Configure command. */
    protected function configure()
    {
        $this->setName('generate:md')
            ->setDescription('Generate markdown file from template')
            ->setDefinition(new Input\InputDefinition([
                new Input\InputArgument('template', Input\InputArgument::REQUIRED),
                new Input\InputArgument('output', Input\InputArgument::REQUIRED),
            ]));
    }


    /**
     * Execute command.
     * @param Input\InputInterface $input
     * @param Output\OutputInterface $output
     */
    protected function execute(Input\InputInterface $input, Output\OutputInterface $output)
    {
        $formatter = $this->getHelper('formatter');

        $templateFile = $input->getArgument('template');
        $outputFile = $input->getArgument('output');


        if (file_exists($templateFile) === FALSE) {
            $errorMessage = ['Error!', 'Template file could not be found.'];
            $formattedBlock = $formatter->formatBlock($errorMessage, 'error');
            $output->writeln($formattedBlock);
            exit();
        }

        $fileContent = file_get_contents($templateFile);
        $parameters = $this->loadTemplateParameters($fileContent);
        $replacement = $this->getTemplateParameters($output, $parameters);
        $this->generateOutputFile($output, $fileContent, $replacement, $outputFile);
    }


    /**
     * Get values for template parameters from STDIN.
     * @param Output\OutputInterface $output
     * @param array $parameters
     * @return array
     */
    private function getTemplateParameters(Output\OutputInterface $output, array $parameters)
    {
        $replacement = [];
        foreach ($parameters as $parameter) {
            $plainParameter = str_replace('%', '', $parameter);
            $output->write($plainParameter . ': ');
            $replacement[$parameter] = trim(fgets(STDIN));
        }

        return $replacement;
    }


    /**
     * Load parameters from template.
     * @param string $content
     * @return array
     */
    private function loadTemplateParameters($content)
    {
        preg_match_all("/%[\w]*%/", $content, $matches);
        return array_unique($matches[0]);
    }


    /**
     * Generate output file with replaced parameters.
     * @param Output\OutputInterface $output
     * @param string $fileContent
     * @param array $replacement
     * @param string $outputFile
     */
    private function generateOutputFile(Output\OutputInterface $output, $fileContent, array $replacement, $outputFile)
    {
        $replacedContent = str_replace(array_keys($replacement), $replacement, $fileContent);
        file_put_contents($outputFile, $replacedContent);
        $output->writeln('Output file sucessfully generated.');
    }


}
