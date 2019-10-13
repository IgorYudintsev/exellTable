<?php

namespace app\controllers;

use app\models\Catalog;
use app\models\exel;
use app\models\MyTable;
use PHPExcel_IOFactory;
use Yii;
use yii\db\Exception;
use yii\web\Controller;
use app\models\UploadForm;
use yii\web\UploadedFile;

class UploadController extends Controller
{
    public function actionIndex()
    {
        $model = new UploadForm();
        if (Yii::$app->request->isPost) {
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            if ($model->upload()) {
                // file is uploaded successfully
                $exel = new exel();
                $exel->doc = $_FILES['UploadForm']['name']['imageFile'];
                $exel->save();
//                echo '<pre>';
//                var_dump($exel->doc);
                return;
            }
        }
        return $this->render('index', ['model' => $model]);
    }

    public function actionImportExcel()
    {
        $inputFile = 'uploads/pricelist.xls';
        try {
            $inputFileType = \PHPExcel_IOFactory::identify($inputFile);
            $objReader = \PHPExcel_IOFactory::createReader($inputFileType);
            $objPHPExcel = $objReader->load($inputFile);
        } catch (\Exception $e) {
            die('error');
        }
        $sheet = $objPHPExcel->getSheet(0);
        $highestRow = $sheet->getHighestRow();
        $highestColumn = $sheet->getHighestColumn();
        for ($row = 1; $row <= $highestRow; $row++) {
            $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, NULL, TRUE, FALSE);
            if ($row == 1) {
                continue;
            }
            $catalog = new Catalog();
//           echo '<pre>';
//           var_dump($rowData[0][0]);
//           die();
            $catalog->name = $rowData[0][0];
            $catalog->price = $rowData[0][1];
            $catalog->wholesale = $rowData[0][2];
            $catalog->availability_1 = $rowData[0][3];
            $catalog->availability_2 = $rowData[0][4];
            $catalog->country_maker = $rowData[0][5];
            $catalog->save();
            print_r($catalog->getErrors());
        }
        die('okay');
    }

    public function actionTable()
    {
        $table = MyTable::find()->all();
        $availability1 = MyTable::find()
            ->sum('availability_1');

        $availability2 = MyTable::find()
            ->sum('availability_2');

        $priceAvg=MyTable::find()
            ->average('price');

        $wholesale=MyTable::find()
            ->average('wholesale');

//        echo '<pre>';
//        var_dump( $maxPrice);
//        die();


        return $this->render('table',
            [
                'table' => $table,
                'availability1'=>$availability1,
                'availability2'=>$availability2,
                'priceAvg'=>$priceAvg,
                'wholesale'=>$wholesale,
//                'maxPrice'=>$maxPrice,
//                'maxwholesale'=>$maxwholesale,
            ]);
    }

}