<?php
declare(strict_types=1);

namespace AMartinNo1\AmaT3UpgradeAssistant\Controller;

use Symfony\Component\VarExporter\VarExporter;
use TYPO3\CMS\Core\Utility\ArrayUtility;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

class ConfigurationController extends ActionController
{
    protected $tca = [];

    public function __construct(?array $tca = null)
    {
        $this->tca = $tca ?? $GLOBALS['TCA'];
    }

    public function mainAction(): void
    {
        $tables = array_keys($this->tca);
        ArrayUtility::naturalKeySortRecursive($tables);

        $this->view->assignMultiple([
            'tables' => array_combine($tables, $tables),
            'table' => '',
        ]);
    }

    /**
     * @param string $table
     */
    public function showAction(string $table): void
    {
        $originalTca = $this->findTcaByTable($table);

        $tables = array_keys($this->tca);
        ArrayUtility::naturalKeySortRecursive($tables);

        $tcaAsPhp = VarExporter::export($this->tca[$table]);
        $tcaAsPhp = <<<TEXT
<?php
return {$tcaAsPhp};
TEXT;

        $this->view->assignMultiple([
            'tables' => array_combine($tables, $tables),
            'table' => $table,
            'tcaAsPhp' => $tcaAsPhp,
            'originalTca' => $originalTca,
        ]);
    }

    protected function findTcaByTable(string $table): ?string
    {
        $extensionList = ExtensionManagementUtility::getLoadedExtensionListArray();
        foreach ($extensionList as $extKey) {
            $pathTemplate = ExtensionManagementUtility::extPath($extKey) . 'Configuration/TCA/%s.php';
            $filename = sprintf($pathTemplate, $table);
            if (file_exists($filename)) {
                return file_get_contents($filename);
            }
        }
        return null;
    }
}