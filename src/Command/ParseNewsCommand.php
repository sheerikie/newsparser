<?php

namespace App\Command;

use App\Message\NewsParser;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Messenger\MessageBusInterface;
use Psr\Log\LoggerInterface;

class ParseNewsCommand extends Command
{
    protected static $defaultName = 'ParseNews';
    protected static $defaultDescription = 'Add a short description for your command';
    private $logger;


    private MessageBusInterface $bus;

    public function __construct(/*...,*/ MessageBusInterface $bus, LoggerInterface $logger)
    {
        //...
        $this->bus = $bus;
        parent::__construct();
        $this->logger = $logger;
    }

    protected function configure()
    {
        $this
        ->setDescription('Fetches news article')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        try {
            $response = file_get_contents('/var/www/project/src/Command/parsed.json');

            $news_response=json_decode($response, true);

            foreach ($news_response["articles"] as $article) {
                $this->bus->dispatch(new NewsParser($article));
            }

            return Command::SUCCESS;
        } catch (\Throwable $th) {
            $output->writeln([
            json_encode($th->getMessage())
            ]);
            return Command::FAILURE;
        }
    }
}