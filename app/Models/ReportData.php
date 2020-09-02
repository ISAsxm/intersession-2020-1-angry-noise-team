<?php


namespace App\Models;

use PhpCsFixer\Fixer\DefinedFixerInterface;
use PhpCsFixer\FixerFactory;

class ReportData implements \ArrayAccess
{
    public array $files;

    public function __construct(IndividualReport $individualReport)
    {
        if (isset($individualReport->getDecodedJson()['package']) && $individualReport->getDecodedJson()['package'] === 'phpmd') {
            $this->handlePhpMdData($individualReport);
        } elseif (isset($individualReport->getDecodedJson()['files'])) {
            $this->handlePhpCsFixerData($individualReport);
        } else {
            $this->handlePhpLocData($individualReport);
        }
    }

    private function handlePhpMdData(IndividualReport $individualReport)
    {
        foreach ($individualReport->getDecodedJson()['files'] as $key => $file) {
            $this->files[] = [
                'file' => $file['file'],
                'errors' => [],
            ];
            foreach ($file['violations'] as $violation) {
                $this->files[$key]['errors'][] = [
                    'name' => $violation['rule'],
                    'description' => $violation['description'],
                ];
            }
        }
    }

    private function handlePhpCsFixerData(IndividualReport $individualReport): void
    {
        $fixerFactory = new FixerFactory();
        $fixerFactory->registerBuiltInFixers();
        $fixers = [];
        foreach ($fixerFactory->getFixers() as $fixer) {
            $fixers[$fixer->getName()] = $fixer;
        }

        foreach ($individualReport->getDecodedJson()['files'] as $key => $file) {
            $this->files[] = [
                'file' => $this->formatFilePath($file['name']),
                'errors' => [],
            ];
            foreach ($file['appliedFixers'] as $appliedFixer) {
                $fixer = $fixers[$appliedFixer];
                if ($fixer instanceof DefinedFixerInterface) {
                    $summary = $fixer->getDefinition()->getSummary();
                }
                $this->files[$key]['errors'][] = [
                    'name' => $appliedFixer,
                    'description' => $summary ?? 'No description found',
                ];
            }
        }
    }

    private function handlePhpLocData(IndividualReport $individualReport): void
    {
        $this->files = ['numberOfLines' => $individualReport->getDecodedJson()['numberOfLines']];
    }

    public function offsetSet($offset, $value): void
    {
        if (is_null($offset)) {
            $this->files[] = $value;
        } else {
            $this->files[$offset] = $value;
        }
    }

    public function offsetExists($offset): bool
    {
        return isset($this->files[$offset]);
    }

    public function offsetUnset($offset): void
    {
        unset($this->files[$offset]);
    }

    public function offsetGet($offset)
    {
        return $this->files[$offset] ?? null;
    }

    /**
     * @param string $filePath the real absolute filepath
     *
     * @return string an absolute filepath starting from the tested project's root (ex: "/app/Models/ReportData.php")
     */
    private function formatFilePath(string $filePath): string
    {
        $repositoriesFolder = storage_path() . '/app/Repositories';
        // First, we remove the path of our server/project
        $stringWithProjectName = substr($filePath, strlen($repositoriesFolder) + 1);
        // Then, we get the length of the tested project name to also remove it
        $projectNameLength = strlen(substr($stringWithProjectName, 0, strpos($stringWithProjectName, '/')));

        return substr($stringWithProjectName, $projectNameLength);
    }
}
