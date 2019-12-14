<?php /** @noinspection PhpUnused */

namespace Fhp\Segment\HITANS;

use Fhp\Segment\BaseDeg;

class VerfahrensparameterZweiSchrittVerfahrenV4 extends BaseDeg implements VerfahrensparameterZweiSchrittVerfahren
{
    /** @var int Allowed values: 900 through 997 */
    public $sicherheitsfunktion;
    /** @var int Allowed values: 1, 2; See specification for details */
    public $tanProzess;
    /** @var string */
    public $technischeIdentifikationTanVerfahren;
    /** @var string|null Max length: 32 */
    public $zkaTanVerfahren;
    /** @var string|null Max length: 10 */
    public $versionZkaTanVerfahren;
    /** @var string Max length: 30 */
    public $nameDesZweiSchrittVerfahrens;
    /** @var int */
    public $maximaleLaengeDesTanEingabewertes;
    /** @var int Allowed values: 1 = numerisch, 2 = alfanumerisch */
    public $erlaubtesFormat;
    /** @var string */
    public $textZurBelegungDesRueckgabewertes;
    /** @var int Allowed values: 1 through 256 */
    public $maximaleLaengeDesRueckgabewertes;
    /** @var int|null */
    public $anzahlUnterstuetzterAktiverTanListen;
    /** @var bool */
    public $mehrfachTanErlaubt;
    /**
     * 1 TAN nicht zeitversetzt / dialogübergreifend erlaubt
     * 2 TAN zeitversetzt / dialogübergreifend erlaubt
     * 3 beide Verfahren unterstützt
     * 4 nicht zutreffend
     * @var int
     */
    public $tanZeitUndDialogbezug;
    /** @var int Allowed values: 0 (cannot), 2 (must) */
    public $tanListennummerErforderlich;
    /** @var bool */
    public $auftragsstornoErlaubt;
    /** @var bool */
    public $smsAbbuchungskontoErforderlich;
    /** @var bool */
    public $challengeKlasseErforderlich;
    /** @var bool */
    public $challengeBetragErforderlich;
    /** @var bool */
    public $challengeStrukturiert;
    /** @var string Allowed values: 00 (cleartext PIN, no TAN), 01 (Schablone 01, encrypted PIN), 02 (reserved) */
    public $initialisierungsmodus;
    /** @var int Allowed values: 0 (cannot), 2 (must) */
    public $bezeichnungDesTanMediumsErforderlich;
    /** @var int|null */
    public $anzahlUnterstuetzterAktiverTanMedien;

    /** {@inheritdoc} */
    public function getId(): int
    {
        return $this->sicherheitsfunktion;
    }

    /** {@inheritdoc} */
    public function getName(): string
    {
        return $this->nameDesZweiSchrittVerfahrens;
    }

    /** {@inheritdoc} */
    public function getSmsAbbuchungskontoErforderlich(): bool
    {
        return $this->smsAbbuchungskontoErforderlich;
    }

    /** {@inheritdoc} */
    public function getAuftraggeberkontoErforderlich(): bool
    {
        return false;
    }

    /** {@inheritdoc} */
    public function getChallengeKlasseErforderlich(): bool
    {
        return $this->challengeKlasseErforderlich;
    }

    /** {@inheritdoc} */
    public function getAntwortHhdUcErforderlich(): bool
    {
        return false;
    }

    /** {@inheritdoc} */
    public function getChallengeLabel(): string
    {
        return $this->textZurBelegungDesRueckgabewertes;
    }

    /** {@inheritdoc} */
    public function getMaxChallengeLength(): int
    {
        return $this->maximaleLaengeDesRueckgabewertes;
    }

    /** {@inheritdoc} */
    public function getMaxTanLength(): int
    {
        return $this->maximaleLaengeDesTanEingabewertes;
    }

    /** {@inheritdoc} */
    public function getTanFormat(): int
    {
        return $this->erlaubtesFormat;
    }

    /** {@inheritdoc} */
    public function needsTanMedium(): bool
    {
        return $this->bezeichnungDesTanMediumsErforderlich === 2 && $this->anzahlUnterstuetzterAktiverTanMedien > 0;
    }
}
