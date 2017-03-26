<?php
/**
 * PHP Units of Measure Library
 *
 * @link      https://github.com/hiqdev/php-units
 * @package   php-units
 * @license   BSD-3-Clause
 * @copyright Copyright (c) 2017, HiQDev (http://hiqdev.com/)
 */

namespace hiqdev\php\units\yii2\console;

use Symfony\Component\Yaml\Yaml;
use Yii;

class UnitsController extends \hidev\controllers\CommonController
{
    public function actionPrepare()
    {
        $src  = Yii::getAlias('@hiqdev/php/units/res/units-tree.yml');
        $tree = Yaml::parse(file_get_contents($src));
        $this->prepareUnits('', $tree);
        $dump = var_export($this->units, true);

        $dst = Yii::getAlias('@hiqdev/php/units/res/units-tree.php');
        $old = file_get_contents($dst);
        $new = "<?php\n\nreturn $dump;\n";
        if ($old !== $new) {
            echo "Written units-tree.php\n";
            file_put_contents($dst, $new);
        }
    }

    protected $units = [];

    protected function prepareUnits($parent, $units)
    {
        foreach ($units as $name => $data) {
            if (is_array($data)) {
                $this->units[$name] = [
                    'parent' => $parent,
                ];
                $this->prepareUnits($name, $data);
            } else {
                if ($name === $parent) {
                    $this->units[$name]['factor'] = $data;
                } else {
                    $this->units[$name] = [
                        'parent' => $parent,
                        'factor' => $data,
                    ];
                }
            }
        }
    }
}
