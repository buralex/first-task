<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%books}}".
 *
 * @property integer $id
 * @property string $book_title
 *
 * @property BooksAuthors[] $booksAuthors
 * @property Authors[] $authors
 */
class Books extends \yii\db\ActiveRecord
{
    
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            [
                'class' => \app\components\behaviors\ManyHasManyBehavior::className(),
                'relations' => [
                    'authors' => 'author_list',                   
                ],
            ],
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%books}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['book_title'], 'string', 'max' => 255],
            [['author_list'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'book_title' => 'Book Title',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBooksAuthors()
    {
        return $this->hasMany(BooksAuthors::className(), ['book_id' => 'id']);
    }
    
    
//    /**
//     * 
//     */
//    public function getAuthorsQuantity()
//    {
//        return $this->authors;
//    }
    

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthors()
    {
        return $this->hasMany(Authors::className(), ['id' => 'author_id'])
                ->viaTable('{{%books_authors}}', ['book_id' => 'id']);
    }
}
