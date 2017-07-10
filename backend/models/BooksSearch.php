<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Books;
use yii\db\Query;


/**
 * BooksSearch represents the model behind the search form about `backend\models\Books`.
 */
class BooksSearch extends Books
{
    
    /**
     * @inheritdoc
     * search string - author name 
     */
    public $author_name;
    
    public $author_quantity;
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['book_title', 'author_name', 'author_quantity'], 'safe'],
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
        $query = Books::find()->innerJoinWith(['authors'])->groupBy(['books.id']); // relation 'authors'
        
        
        $subQuery = new Query();
        $subQuery->select('COUNT(author_id) AS author_quantity, book_id')
                ->from('books_authors')
                ->groupBy('book_id');
        
        // this string fot authors quantity of one book
        $query->leftJoin(['authors_sum' => $subQuery], 'authors_sum.book_id = books.id'); //authors_sum - alias table


        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => ['attributes' => ['id', 'book_title', 'author_name', 'author_quantity']],
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
            'books.id' => $this->id,
            'authors_sum.author_quantity' => $this->author_quantity,
            
        ]);

        $query->andFilterWhere(['like', 'book_title', $this->book_title])
                ->andFilterWhere(['like', 'author_name', $this->author_name]);

        return $dataProvider;
    }
}
