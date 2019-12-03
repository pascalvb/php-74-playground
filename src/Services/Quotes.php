<?php

namespace App\Services;

use App\Model\Quote;

class Quotes
{
    private array $quotes;

    public function __construct(array $quotes)
    {
        $this->quotes = $quotes;
    }


    public function getQuotes(int $limit): array
    {
        shuffle($this->quotes);
        return array_slice($this->quotes, 0, $limit);
    }


    public function getRandomQuote(): string
    {
        shuffle($this->quotes);
        return $this->quotes[0];
    }

    public static function factory(): self
    {
        $quotes = array_map(fn(string $text) => new Quote($text), self::getAllQuoteStrings());
        return new self($quotes);

    }


    private static function getAllQuoteStrings(): array
    {
        return [
            '„Die wür ich denn schön am Seil abela“',
            '„Ich denke ah alles, Ich han e gueti dänki',
            '„So jetzt wotti aber gah, dassi gliih wieder dihei bin.',
            '„Aber weisch, s’Groseli hätmers verbote“',
            'Jää Chasper du bisch denn en Pfüder',
            'Chum Köbbi mir saused grad los und denn gahts dem häxepack an chrage',
            'Zu zitterisch wines „Espeläubli"',
            'Jetzt gits halt kei Birre Köbi, jetzt mümmer wiiter.',
            'aber gäll, du gasch nöd zwiit weg chasper?',
            'Ouu jadu!',
            'Dörfemer ächt ässe vu dene?',
            'Du da hani kei schwachi ahnig vome dunst',
            'Oh mir wird schlächt und trümmlig und elend uuuh.',
            'de Dumm hagel hät sicher giftigi beeri gässe',
            'Wie sölem au nur hälfe? Am gschidschde isch ich springe wie en gölte blitz hei“',
            'Ufwiidrlüägeli',
            'Jetzt schwiig entli emal',
            'De böös Zauberer Krununkulus',
            'So bisch entli fertig mit dere Predigt? Ich han dir nur gsait was z sege gsi isch',
            'denn wenn ich dir ned alles gsait het was ich dir ha sege müesse hettisch du nachher gsait',
            'ich hetti dir ned alles gsait. Jetzt hör emal uf pluddere schwaffli es wird eim ja ganz trümlig.',
            'Schniräbeli schnurulus da isch de Krununkulus',
            'Oh du verbrännt jetzt eine das het mer jetzt grad no gfählt.',
            'Hou das wer den toll! Dem trurige Grüsel vomene Sinsalabim Hockusbockus',
            'Künstler mugg ich de Zauberstäcke e weg bevor er miteme einzelne Aug blinzlet het.',
            'Jaja ich han dich scho gseh du stachlige Kaktus',
            'Ja was du bisch en Autobus? Nei ich heisse Krununkulus. Aha du hesch scho alli',
            'Und du bisch no vill dümmer. Du bisch sogar eso dumm dasd ned emal chash uf 10 zähle. Was ich chan ned uf 10 zähle? Das isch eh Frechheit.',
            'Natürli chan ich das du chline Pfüder.',
            '„Und Du bisch de Prinz, du muesch mich begleite!“',
            '„Ohjeeeemineee!“',
            '„Hä-hä-häts no meh!?“',
            '„Haha jetzt ischer ohmächtig umgfalle, de dumm Bueb ischmer au id Falle gange, hihihi“',
            '„Dem lauft ja d Sauce nur so übers Chini abe und de Bart brucht er als Lätzli“',
        ];
    }
}