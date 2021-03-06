<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Authors;

/**
 * AuthorsSearch represents the model behind the search form about `backend\models\Authors`.
 */
class AuthorsSearch extends Authors
{
    
    /**
     * @inheritdoc
     * search string - book title 
     */
    public $book_title;
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['author_name', 'book_title'], 'safe'],
        ];
    }

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
        $query = Authors::find()->joinWith(['books'])->groupBy(['authors.id']); // relation 'books';

        // add conditions that should always apply here
        
        //debug(Authors::find()->joinWith(['books'])->groupBy(['authors.id'])->all());
        //die;

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => ['attributes' => ['id', 'author_name', 'book_title']],
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'authors.id' => $this->id,
        ]);

        $query->andFilterWhere(['like', 'author_name', $this->author_name])
                ->andFilterWhere(['like', 'book_title', $this->book_title]);

        return $dataProvider;
    }
}
