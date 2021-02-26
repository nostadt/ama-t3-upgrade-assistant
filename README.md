[![TYPO3](https://img.shields.io/badge/TYPO3-Extension-orange?logo=TYPO3)](https://extensions.typo3.org/extension/ama_t3_upgrade_assistant)
[![Latest Stable Version](https://poser.pugx.org/amartinno1/ama-t3-upgrade-assistant/v/stable)](https://packagist.org/packages/amartinno1/ama-t3-upgrade-assistant)
[![Crowdin](https://badges.crowdin.net/typo3-extension-amat3upgradeas/localized.svg)](https://crowdin.com/project/typo3-extension-amat3upgradeas)
![CI Process](https://github.com/AMartinNo1/ama_t3_upgrade_assistant/workflows/CI%20Process/badge.svg?branch=development)

# TYPO3 Upgrade Assistant

The extensions aim to assist you while upgrading your TYPO3 system.

## Feature set
* Get merged TCA as PHP code

## Outlook TYPO3 v11

While this repository contains v11 support, the extension does not support it yet. A quick
check made following issues visible:

- Backend Module View is screwed up
- registerModule call needs to be adjusted

In order to test v11 the `composer.json` will have to be adjusted.

> `"typo3/cms-core": "^8.7 || ^9.5.23 || ^10.4.10 || ^11.0"`

Then a call off `ddev install-v11` may be sufficient. If the exception "1588095935"
appears, the solution described [here](https://wiki.typo3.org/Exception/CMS/1588095935)
will fix it.

## Known issues

[See ext. manual for more](https://docs.typo3.org/p/amartinno1/ama-t3-upgrade-assistant/master/en-us/)

## Contribute
You may either contribute to the code base by creating a [PR](https://github.com/AMartinNo1/ama_t3_upgrade_assistant/pulls),
propose a new feature using the [issue tracker](https://github.com/AMartinNo1/ama_t3_upgrade_assistant/issues)
or contribute to [translations via crowdin](https://crowdin.com/project/typo3-extension-amat3upgradeas).

[Show all code-contributors](https://github.com/AMartinNo1/ama_t3_upgrade_assistant/graphs/contributors)

## Credits

* [PrismJS](https://prismjs.com)
* [Smooth synchronized scrolling is based on Artem Kachanovskyi post on StackOverflow.](https://stackoverflow.com/a/41998497)
* [Crowdin.com - Manage Translations Easily](https://crowdin.com)
* [UK Translation, Ukrainian TYPO3 community](https://www.typo3.org.ua/)
* [FR Translation, Crowdin User wembley](https://crowdin.com/profile/wembley)
* [DDEV for TYPO3, GitHub User a-r-m-i-n](https://github.com/a-r-m-i-n/ddev-for-typo3-extensions)
