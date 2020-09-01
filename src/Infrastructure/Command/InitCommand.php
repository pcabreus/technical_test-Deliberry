<?php

namespace App\Infrastructure\Command;

use App\Application\CategoryService;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class InitCommand extends Command
{
    protected static $defaultName = 'app:init';
    private CategoryService $categoryService;

    public function __construct(CategoryService $categoryService, string $name = null)
    {
        parent::__construct($name);
        $this->categoryService = $categoryService;
    }

    protected function configure()
    {
        $this
            ->setDescription('Init the app configuration');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $this->categoryService->createCategoriesByName(['T-Shirt', 'Short']);

        $io->write('<success>You have created two new categories `Short` and `T-Shirt`.</success>');

        return Command::SUCCESS;
    }
}
