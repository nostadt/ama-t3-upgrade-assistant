v3.0.1
* TASK: Rename more areas
* TASK: Rename package name
* TASK #71: Remove superfluous .gitkeep file
* TASK: Remove note about v2-development branch

v3.0.0
* TASK: Update homepage url in composer.json
* TASK: Avoid usage of $_EXTKEY in ./ext_emconf.php
* TASK #45: Update typo3/cms-* to 11.5
* TASK: Configure PHPStan with level 5 (#69)
* TASK: Extract code from ConfigurationController into a TcaService (#66)
* TASK: Updat ddev .gitignore files
* TASK #67: Add PHP 8.0/8.1 support (#68)
* TASK #65: Remove outdated --dry-run from job title
* TASK #65: Remove non-existent --dry-run from composer normalize call in CI
* TASK #65: Replace ergebnis/composer-normalize with shell based normalize
* TASK: Remove amartinno1/typo3-ext-analyse
* TASK: composer normalize
* TASK: Integrate dev version of amartinno1/typo3-ext-analyse
* TASK #45: Use of HtmlResponse
* TASK #63: Use PHP 7.4 features
* TASK #62: Set version to 3.0.0-dev
* TASK #57: Raise min. dep. to PHP 7.4
* TASK #56: Remove obsolete bridge code recently introduced
* TASK #55: Remove obsolete ddev config
* TASK #59: Add v2 vs v3 development hint to README

v2.0.4
* FIX #58: Raise TYPO3 v11 dependency in composer.json / ext_emconf.php
* TASK: Remove obsolete v11 outlook

v2.0.3
* TASK #45: Add v11 .ddev support

v2.0.2
* TASK: composer normalize
* TASK: Add TER release via GH Actions
* TASK: Update Documentation/Settings.cfg

v2.0.1
* FIX: Set github_branch to development
* TASK #53: Introducde Xliff Lint in CI (#54)
* TASK #53: Update GH Workflow file
* TASK #53: Apply composer normalize
* TASK #53: Apply composer.json structure from ttn/tea
* TASK #53: Apply PHP CS config from ttn/tea
* TASK #53: Add .editorconfig
* FIX #49: Fix .ddev .gitignore setup
* TASK #48: Add crowdin description to the docs
* TASK: composer normalize
* TASK: Streamline CI
* TASK: Add PHP CS to GH workflow
* TASK: Streamline composer.json
* TASK: Update .gitignore
* TASK: Implement basic PHP CS
* TASK: Streamline Fluid Templates
* TASK: Update gitignore
* TASK: Simplify ConfigurationController
* TASK: Remove translations from vcs
* TASK: Update Crowdin Data in README.md
* TASK: Reformat php code
* TASK: Simplify implementation
* TASK: Add CI process badge
* TASK: Setup phpunit
* TASK: Update Extension and BE Module Icon
* Update Crowdin configuration file
* TASK: Update Crowdin file
* TASK: Update Crowdin file
* SECURITY: Raise TYPO3 dependency to ^9.5.23
* SECURITY: Raise TYPO3 dependency to ^10.4.10
* [TASK] Update .gitignore and composer.json and fix a docker file (armin config file)
* [FIX] Wording in README.md
* [TASK] #44 Implement ddev for TYPO3 Ext.
* Merge pull request #43 from AMartinNo1/master
* [TASK] Add TYPO3 icon to the badge

v2.0.0
* [TASK] Add .gitignore
* [TASK] #36 Replace RuntimeException with custom TcaNotFoundException
* [TASK] Drop v7 and add v10 support
* [TASK] #31 Add php version constraint to ext_emconf.php
* [TASK] Update badges in README.md
* [TASK] Fix replace section of composer manifest

v1.0.5
* [TASK] #27 Add new translations: UK, FR. Thanks UK Community and wembley

v1.0.4
* [TASK] #15 Support of TYPO3 v7.6
* [TASK] #19 Define minimum PHP version of v7.1.3
* [OTHER] README.md updated, remove unwanted files.

v1.0.3
* [TASK] Add German translation
* [TASK] #10 Add t3 v8 compatibility
* [TASK] #9 Create a side-by-side diff with merged and original TCA
* [TASK] #8 Add prismjs for syntax highlighting

v1.0.2
* [TASK] #6 Update ext. description
* [TASK] #3 Update documentation

v1.0.1
* [TASK] #2 Switch from `SimpleFile` to `symfony/var-exporter`
* [TASK] Add CHANGELOG
* [TASK] #3 Update documentation

v1.0.0
* Initial release
