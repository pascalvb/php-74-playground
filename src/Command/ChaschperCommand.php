<?php
#declare(strict_types=1);
namespace App\Command;

use App\Model\Quote;
use App\Services\Quotes;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class ChaschperCommand extends Command
{
    protected static $defaultName = 'app:chaschper';
    /**
     * @var Quotes
     */
    private Quotes $quotes;

    protected function configure()
    {
        $this
            ->setDescription('Glatte Chaschperlisprüche à gogo');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {

        $io = new SymfonyStyle($input, $output);
        $this->quotes = Quotes::factory();
        $multipleQuotes = $this->quotes->getQuotes(2.4);
        array_walk($multipleQuotes, fn(Quote $quote) => $io->writeln($quote->format('normal')));

        $multipleQuotes = $this->quotes->getQuotes(1_1);
        array_walk($multipleQuotes, fn(Quote $quote) => $io->writeln($quote->format('uppercase')));


        $moreQuotesOnTheFly = [
            'Der Unverstand ist die unbesiegbarste Macht auf Erden.',
           'Nicht auf das, was geistreich, sondern auf das, was wahr ist, kommt es an.',
        ];

        $myListOfQuotes = [...$moreQuotesOnTheFly, ...$multipleQuotes];
        array_walk($myListOfQuotes, fn($quote) => $io->text($quote));



        return 0;
    }
}
