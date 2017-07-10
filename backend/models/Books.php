<?php

namespace backend\models;

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
                'class' => \common\components\behaviors\ManyHasManyBehavior::className(),
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
            [['book_title'], 'unique'],
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

//    /**
//     * @return \yii\db\ActiveQuery
//     */
//    public function getBooksAuthors()
//    {
//        return $this->hasMany(BooksAuthors::className(), ['book_id' => 'id']);
//    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthors()
    {
        return $this->hasMany(Authors::className(), ['id' => 'author_id'])->viaTable('{{%books_authors}}', ['book_id' => 'id']);
    }
}
