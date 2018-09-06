<?php

namespace app\models;

use Codeception\Util\Debug;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Job;

/**
 * JobSearch represents the model behind the search form of `app\models\Job`.
 */
class JobSearch extends Job
{



    public $_attributes = [];

    public function attr(){
        for($i = 1; $i <= 24; $i++ ) {
            $this->_attributes[] = 'spec'.$i;
        }
        return $this->_attributes;


    }


    /**
     *  Динамическое создание свойств
     */

    public function attributes()
    {

        return array_merge(parent::attributes(), $this->attr());
    }

    public function rules()
    {
        return [
            [['id', 'price', 'status', 'employer'], 'integer'],
            [['title', 'spec', 'text', 'currency', 'date', 'time', ], 'safe'],
            [$this->attr(), 'safe'],// $this->attr() массив со свойствами созданными динамически
        ];
    }
    /**


    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Job::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'defaultPageSize' => 10,
            ],
            'sort'=> ['defaultOrder' => ['id'=>SORT_DESC]]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }


        $session = Yii::$app->session;
        $session->open();


        for($i = 0; $i <= 24; $i++ ) {

            if(isset(Yii::$app->request->post('JobSearch')['spec'.$i]) && Yii::$app->request->post('JobSearch')['spec'.$i] == $i){

                $query->orFilterWhere(['spec' => $this->spec.$i]);

            }
            else if(isset($session['spec'.$i]) && $session['spec'.$i] == $i){
                $query->orFilterWhere(['spec' => $session['spec'.$i]]);
            }




        }




        return $dataProvider;
    }
}
