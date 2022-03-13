<?php
declare(strict_types=1);

namespace Nostadt\Typo3UpgradeAssistant\Controller;

use Nostadt\Typo3UpgradeAssistant\Service\TcaService;
use Symfony\Component\VarExporter\VarExporter;
use TYPO3\CMS\Core\Http\HtmlResponse;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

class ConfigurationController extends ActionController
{
    protected TcaService $tcaService;

    public function __construct(TcaService $tcaService)
    {
        $this->tcaService = $tcaService;
    }

    public function mainAction(): HtmlResponse
    {
        $tables = $this->tcaService->getTables();

        $this->view->assignMultiple([
            'tables' => array_combine($tables, $tables),
            'table' => '',
        ]);

        return new HtmlResponse($this->view->render());
    }

    public function showAction(string $table): HtmlResponse
    {
        $tables = $this->tcaService->getTables();

        $tcaAsPhp = VarExporter::export($this->tcaService->getTableConfig($table));
        $tcaAsPhp = <<<TEXT
<?php
return {$tcaAsPhp};
TEXT;

        $this->view->assignMultiple([
            'tables' => array_combine($tables, $tables),
            'table' => $table,
            'tcaAsPhp' => $tcaAsPhp,
            'originalTca' => $this->tcaService->findOriginalTcaByTable($table),
        ]);

        return new HtmlResponse($this->view->render());
    }
}
