<?php


namespace AMartinNo1\AmaT3UpgradeAssistant\Domain\Model;


class SimpleFile
{
    public const DEFAULTS_INTENDS = 4;

    protected $intends = self::DEFAULTS_INTENDS;
    protected $content = '';

    public function __construct(int $intends = self::DEFAULTS_INTENDS)
    {
        $this->intends = $intends;
    }

    public function addRow(string $content, int $depth = 1): void {
        $this->content .= "\r\n";

        $totalIndents = $this->intends * $depth;
        for ($i = 0; $i < $totalIndents; $i++) {
            $this->content .= ' ';
        }

        $this->content .= $content;
    }

    public function getContent(): string {
        return $this->content;
    }
}