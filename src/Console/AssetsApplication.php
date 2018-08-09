<?php

/**
 * This file is part of the Rathouz libraries (http://rathouz.cz)
 * Copyright (c) 2016 Tomas Rathouz <trathouz at gmail.com>
 */

namespace Rathouz\Tools\Console;

use Symfony\Component\Console\Application;
use Symfony\Component\Console\Input;


/**
 * AssetsApplication.
 *
 * @author Tomas Rathouz <trathouz at gmail.com>
 */
class AssetsApplication extends Application
{


    /**
     * Gets the name of the command based on input.
     * @param Input\InputInterface $input
     * @return string
     */
    protected function getCommandName(Input\InputInterface $input)
    {
        return 'generate:md';
    }


    /**
     * Get default commands.
     * @return array
     */
    protected function getDefaultCommands()
    {
        $defaultCommands = parent::getDefaultCommands();
        $defaultCommands[] = new Commands\GenerateMarkdownCommand();
        return $defaultCommands;
    }


    /**
     * Get definition.
     * @return Input\InputDefinition
     */
    public function getDefinition()
    {
        $inputDefinition = parent::getDefinition();
        $inputDefinition->setArguments();
        return $inputDefinition;
    }


}
