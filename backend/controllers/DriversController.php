<?php

namespace backend\controllers;

use Yii;
use backend\models\Drivers;
use backend\models\DriversSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\Query;

/**
 * DriversController implements the CRUD actions for Drivers model.
 */
class DriversController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Drivers models.
     * @return mixed
     */
    public function actionIndex()
    {
        
       //\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
       //header('Content-Type: application/json');
        
       $model = new Drivers();
       
        if ( Yii::$app->request->isAjax ) {
            
//            debug($_POST);
//            die;

            $api_key = "AIzaSyCJFHPBLlPl-S5GW26uklCKy7SzHkkoc9w";
            $orig_lat = floatval($_POST['orig_lat']);
            $orig_lng = floatval($_POST['orig_lng']);
            $search_rad = intval($_POST['search_rad']);
            $orig_text = $_POST['orig_text'];
            
            $orig_text_preg = preg_replace('/ /', '+', $orig_text);
                    

            
            //$drivers = [];
            
            //$drivers[] = ['orig_lat' => $orig_lat, 'orig_lng' => $orig_lng];

            $connection = Yii::$app->getDb();
            
            $params = [':orig_lat' => $orig_lat, ':orig_lng' => $orig_lng, ':search_rad' => $search_rad];
            
            $command = $connection->createCommand("SELECT *, ( 3959 * acos( cos( radians( :orig_lat ) )"
                    . " * cos( radians( lat ) ) * cos( radians( lng ) - radians( :orig_lng ) ) + sin( radians( :orig_lat ) )"
                    . " * sin( radians( lat ) ) ) ) AS distance FROM drivers"
                    . " HAVING distance < :search_rad ORDER BY distance LIMIT 100;", $params );
            
            
            
            
            
            $query = "https://maps.googleapis.com/maps/api/distancematrix/json?units=imperial&language=en&origins={$orig_text_preg}&destinations=";
            
            
            

            $drivers = $command->queryAll();
            
//            debug($drivers);
//            die;
            
            for ($x = 0; $x < count($drivers); $x++) {
                $query .= "{$drivers[$x]['lat']}%2C{$drivers[$x]['lng']}%7C";
            }
            
            $query .= "&key={$api_key}";
            
//            debug($query);
//            die;
            
            $roadDistance = json_decode( file_get_contents($query) );
            
            for ($n = 0; $n < count($drivers); $n++) {
                $drivers[$n]['road_distance'] = $roadDistance->rows[0]->elements[$n]->distance->text;
                $drivers[$n]['duration'] = $roadDistance->rows[0]->elements[$n]->duration->text;
            }
            
            $drivers_json = json_encode( $drivers );
            
//            debug($roadDistance);
//            debug($drivers);
//            die;
//            
            echo $drivers_json;

        } else {
            
            //$ddd = file_get_contents("https://maps.googleapis.com/maps/api/distancematrix/json?units=imperial&origins=40.6655101,-73.89188969999998&destinations=40.6905615%2C-73.9976592%7C40.6905615%2C-73.9976592%7C40.6905615%2C-73.9976592%7C40.6905615%2C-73.9976592%7C40.6905615%2C-73.9976592%7C40.6905615%2C-73.9976592%7C40.659569%2C-73.933783%7C40.729029%2C-73.851524%7C40.6860072%2C-73.6334271%7C40.598566%2C-73.7527626%7C40.659569%2C-73.933783%7C40.729029%2C-73.851524%7C40.6860072%2C-73.6334271%7C40.598566%2C-73.7527626&key=AIzaSyCS_UOJWmyS_oKkPDMH84xaToDOQX5_8Lk");
            
//            debug($ddd);
//            die;
            // либо страница отображается первый раз, либо есть ошибка в данных
            return $this->render('index', compact('model'));
        }

//        $searchModel = new DriversSearch();
//        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        
        //debug($dataProvider->query->all());
        //return $this->render('index', compact('model'));
    }
    
    

    /**
     * Displays a single Drivers model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Drivers model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Drivers();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }
    
    /**
     * Fills drivers table randomly.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionFill()
    {
        
        $drivers = [];
        
        for ($x = 0 ; $x < 20000 ; $x++ ) {
            $drivers[] = ["driver" . ($x + 1), rand(48, 30), rand(-123,-70)];
        }
        
//        debug($drivers);
//        die;
        if ( Yii::$app->db->createCommand()->batchInsert('markers', ['name', 'lat', 'lng'], $drivers)->execute()) {
            echo '!!!';
        }
       
        
        

    }

    /**
     * Updates an existing Drivers model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Drivers model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Drivers model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Drivers the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Drivers::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
