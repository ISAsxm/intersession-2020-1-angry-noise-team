<?php


namespace App\Models;


class IndividualReport
{
    public const PHP_CS_FIXER = 'PhpCsFixer';
    public const PHP_MESS_DETECTOR = 'PhpMessDetector';

    public string $name;
    public string $json;

    /**
     * @throws \JsonException
     */
    public function __construct(string $json, string $name)
    {
        $this->name = $name;
        if (json_decode($json)) {
            $this->json = $json;
        } else {
            throw new \JsonException('Invalid JSON');
        }
    }

    public function getJson(): string
    {
        return $this->json;
    }

    public function getDecodedJson(): array
    {
        return json_decode($this->json, true, 512, JSON_THROW_ON_ERROR);
    }
}
