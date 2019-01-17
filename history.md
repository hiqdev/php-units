# hiqdev/php-units

## [1.0.0] - 2019-01-17

- Implemented units conversion through root unit
    - [194c0f8] 2019-01-17 Implemented units conversion through root unit [@SilverFire]
- Added more supported units: minute, hour, day, week, month, year, bps, kbps, mbps, gbps, kb, mb, gb, item
    - [236fa5d] 2018-05-16 added `unit` unit [@hiqsol]
    - [15fe250] 2018-01-16 added tests from `kb`, `mb`, `gb` [@hiqsol]
    - [f65299a] 2018-01-16 added `kb`, `mb`, `gb` units [@hiqsol]
    - [d099f54] 2018-01-07 improved `testConvert`, added tests for k/m/gbps and min/hour/day/week [@hiqsol]
    - [577318b] 2018-01-07 added bps, kbps, mbps, gbps units to tree [@hiqsol]
    - [7460142] 2018-01-07 added minute, hour, day, week units to tree [@hiqsol]
    - [719ee78] 2017-09-08 added `items` unit [@hiqsol]
    - [17264a4] 2017-06-06 added month/year units [@hiqsol]
    - [e4042e1] 2017-06-30 added `item` unit [@hiqsol]
- `AbstractQuantity` implements `JsonSerializable` interface now
    - [6482c33] 2017-06-06 added JsonSerializable to AbstractQuantity [@hiqsol]
- Added `Quantity::isPositive()`, `isNegative()` methods
    - [128ce60] 2017-04-01 added quantity isPositive/Negative functions with tests [@hiqsol]
- Other minor enhancements and fixes
    - [4b2ce17] 2018-12-22 Fixed typo [@SilverFire]
    - [3c053e1] 2018-09-10 Added `days` unit alias to day [@hiqsol]
    - [7c25118] 2018-09-05 Added `bytes` alias for `byte` [@hiqsol]
    - [19a4673] 2018-09-05 Added `bitps` alias to `bps` [@hiqsol]
    - [a53591e] 2018-09-05 csfixed [@hiqsol]
    - [5eb4368] 2018-09-04 Added check for uncompatible unit name in `Quantity::findUnit()` [@hiqsol]
    - [be37089] 2018-09-04 Added `InvalidArgumentException` [@hiqsol]
    - [0143b56] 2018-08-14 Added formatting capabilities [@SilverFire]
    - [92b395f] 2018-05-18 Enhanced PHPDocs [@SilverFire]
    - [f7140b9] 2018-01-19 Added ConverterInterface::getMeasure() [@SilverFire]
    - [6f18338] 2018-01-09 csfixed [@hiqsol]
    - [37a134d] 2017-07-14 opened autoloading for res and yii2 [@hiqsol]
    - [08c059d] 2017-09-08 added `AbstractUnit::create` method [@hiqsol]
    - [53bc11e] 2017-06-07 fixed AbstractQuantity::convert to return proper unit [@hiqsol]
    - [64278a0] 2017-06-06 fixed units controller [@hiqsol]
    - [2ec02e6] 2017-05-26 csfixed [@hiqsol]
    - [903a5ed] 2017-05-26 improved Quantity::findUnit to work when ready unit given [@hiqsol]
    - [9d6ccca] 2017-04-03 fixed add and subtract with missed getQuantity [@hiqsol]
    - [a3136e4] 2017-05-26 added `AbstractQuantity::create`, renamed repeat <- create [@hiqsol]
    - [6790725] 2017-05-26 csfixed [@hiqsol]
    - [be9a071] 2017-05-26 renamed `hidev.yml` [@hiqsol]
- Enhanced tests coverage
    - [d3939a2] 2018-01-07 added tests for byte <-> bit conversion [@hiqsol]
    - [1aa3bc6] 2017-04-03 added tests for add/subtract Quantity [@hiqsol]
    - [dfc97fb] 2017-04-03 added compatibility with PHPUnit 5.x [@hiqsol]

## [0.1.0] - 2017-03-31

- Added `Quantity` implementation and tests
    - [f61c7d2] 2017-03-31 csfixed [@hiqsol]
    - [653b9d5] 2017-03-31 added Quantity implementation and test [@hiqsol]
    - [72a657a] 2017-03-31 changed AbstractUnit::findConverter to non-abstract for PHP5 compatibility [@hiqsol]
    - [44c248e] 2017-03-31 added InvalidConfigException [@hiqsol]
- Added `Unit` implementation and tests
    - [e740cda] 2017-03-27 added unit name parameter to `AbstractUnit::findConverter` [@hiqsol]
    - [b7aa21b] 2017-03-26 redone Unit with AbstractUnit [@hiqsol]
    - [9058f8a] 2017-03-26 added skipping res folder fom php-cs-fixer [@hiqsol]
    - [1a8291a] 2017-03-26 small renamings [@hiqsol]
    - [cea64eb] 2017-03-26 added converting to equal unit [@hiqsol]
    - [95ad16b] 2017-03-26 redone isAlias with use of getCanon [@hiqsol]
    - [53d1f8a] 2017-03-26 added canon (normal name) support [@hiqsol]
    - [e55d724] 2017-03-26 added alias support [@hiqsol]
    - [e565131] 2017-03-26 renamed TreeUnit -> NodeUnit [@hiqsol]
    - [f773cd7] 2017-03-26 improved tree units constructions [@hiqsol]
    - [c576f24] 2017-03-26 fixed ExceptionInterface [@hiqsol]
    - [a28ab75] 2017-03-26 added default factor=1 in `units/prepare` [@hiqsol]
    - [e0ff775] 2017-03-26 renames UnitsController <- ToolsController [@hiqsol]
    - [7dd437d] 2017-03-26 csfixed [@hiqsol]
    - [36c3a00] 2017-03-25 fixed autoloads [@hiqsol]
    - [e11f18b] 2017-03-25 fixed tests [@hiqsol]
    - [b3a9b2a] 2017-03-25 added QuantityInterface [@hiqsol]
    - [97f4547] 2017-03-25 added calculators [@hiqsol]
    - [e7f66bd] 2017-03-25 added tree: unit and converter [@hiqsol]
    - [34d3af6] 2017-03-25 added exceptions [@hiqsol]
    - [98c97ab] 2017-03-25 added tests [@hiqsol]
    - [275d75e] 2017-03-25 csfixed [@hiqsol]
    - [f928eb8] 2017-03-23 hideved [@hiqsol]
    - [25bbe52] 2017-03-23 inited [@hiqsol]

## [Development started] - 2017-03-23

[@hiqsol]: https://github.com/hiqsol
[sol@hiqdev.com]: https://github.com/hiqsol
[@SilverFire]: https://github.com/SilverFire
[d.naumenko.a@gmail.com]: https://github.com/SilverFire
[@tafid]: https://github.com/tafid
[andreyklochok@gmail.com]: https://github.com/tafid
[@BladeRoot]: https://github.com/BladeRoot
[bladeroot@gmail.com]: https://github.com/BladeRoot
[f61c7d2]: https://github.com/hiqdev/php-units/commit/f61c7d2
[653b9d5]: https://github.com/hiqdev/php-units/commit/653b9d5
[72a657a]: https://github.com/hiqdev/php-units/commit/72a657a
[44c248e]: https://github.com/hiqdev/php-units/commit/44c248e
[e740cda]: https://github.com/hiqdev/php-units/commit/e740cda
[b7aa21b]: https://github.com/hiqdev/php-units/commit/b7aa21b
[9058f8a]: https://github.com/hiqdev/php-units/commit/9058f8a
[1a8291a]: https://github.com/hiqdev/php-units/commit/1a8291a
[cea64eb]: https://github.com/hiqdev/php-units/commit/cea64eb
[95ad16b]: https://github.com/hiqdev/php-units/commit/95ad16b
[53d1f8a]: https://github.com/hiqdev/php-units/commit/53d1f8a
[e55d724]: https://github.com/hiqdev/php-units/commit/e55d724
[e565131]: https://github.com/hiqdev/php-units/commit/e565131
[f773cd7]: https://github.com/hiqdev/php-units/commit/f773cd7
[c576f24]: https://github.com/hiqdev/php-units/commit/c576f24
[a28ab75]: https://github.com/hiqdev/php-units/commit/a28ab75
[e0ff775]: https://github.com/hiqdev/php-units/commit/e0ff775
[7dd437d]: https://github.com/hiqdev/php-units/commit/7dd437d
[36c3a00]: https://github.com/hiqdev/php-units/commit/36c3a00
[e11f18b]: https://github.com/hiqdev/php-units/commit/e11f18b
[b3a9b2a]: https://github.com/hiqdev/php-units/commit/b3a9b2a
[97f4547]: https://github.com/hiqdev/php-units/commit/97f4547
[e7f66bd]: https://github.com/hiqdev/php-units/commit/e7f66bd
[34d3af6]: https://github.com/hiqdev/php-units/commit/34d3af6
[98c97ab]: https://github.com/hiqdev/php-units/commit/98c97ab
[275d75e]: https://github.com/hiqdev/php-units/commit/275d75e
[f928eb8]: https://github.com/hiqdev/php-units/commit/f928eb8
[25bbe52]: https://github.com/hiqdev/php-units/commit/25bbe52
[Under development]: https://github.com/hiqdev/php-units/compare/0.1.0...HEAD
[0.1.0]: https://github.com/hiqdev/php-units/releases/tag/0.1.0
[194c0f8]: https://github.com/hiqdev/php-units/commit/194c0f8
[4b2ce17]: https://github.com/hiqdev/php-units/commit/4b2ce17
[3c053e1]: https://github.com/hiqdev/php-units/commit/3c053e1
[7c25118]: https://github.com/hiqdev/php-units/commit/7c25118
[19a4673]: https://github.com/hiqdev/php-units/commit/19a4673
[a53591e]: https://github.com/hiqdev/php-units/commit/a53591e
[5eb4368]: https://github.com/hiqdev/php-units/commit/5eb4368
[be37089]: https://github.com/hiqdev/php-units/commit/be37089
[0143b56]: https://github.com/hiqdev/php-units/commit/0143b56
[92b395f]: https://github.com/hiqdev/php-units/commit/92b395f
[236fa5d]: https://github.com/hiqdev/php-units/commit/236fa5d
[f7140b9]: https://github.com/hiqdev/php-units/commit/f7140b9
[15fe250]: https://github.com/hiqdev/php-units/commit/15fe250
[f65299a]: https://github.com/hiqdev/php-units/commit/f65299a
[6f18338]: https://github.com/hiqdev/php-units/commit/6f18338
[d099f54]: https://github.com/hiqdev/php-units/commit/d099f54
[577318b]: https://github.com/hiqdev/php-units/commit/577318b
[7460142]: https://github.com/hiqdev/php-units/commit/7460142
[d3939a2]: https://github.com/hiqdev/php-units/commit/d3939a2
[719ee78]: https://github.com/hiqdev/php-units/commit/719ee78
[08c059d]: https://github.com/hiqdev/php-units/commit/08c059d
[37a134d]: https://github.com/hiqdev/php-units/commit/37a134d
[e4042e1]: https://github.com/hiqdev/php-units/commit/e4042e1
[53bc11e]: https://github.com/hiqdev/php-units/commit/53bc11e
[64278a0]: https://github.com/hiqdev/php-units/commit/64278a0
[17264a4]: https://github.com/hiqdev/php-units/commit/17264a4
[6482c33]: https://github.com/hiqdev/php-units/commit/6482c33
[2ec02e6]: https://github.com/hiqdev/php-units/commit/2ec02e6
[903a5ed]: https://github.com/hiqdev/php-units/commit/903a5ed
[a3136e4]: https://github.com/hiqdev/php-units/commit/a3136e4
[6790725]: https://github.com/hiqdev/php-units/commit/6790725
[be9a071]: https://github.com/hiqdev/php-units/commit/be9a071
[1aa3bc6]: https://github.com/hiqdev/php-units/commit/1aa3bc6
[dfc97fb]: https://github.com/hiqdev/php-units/commit/dfc97fb
[9d6ccca]: https://github.com/hiqdev/php-units/commit/9d6ccca
[128ce60]: https://github.com/hiqdev/php-units/commit/128ce60
[1.0.0]: https://github.com/hiqdev/php-units/compare/0.1.0...1.0.0
