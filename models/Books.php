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
 */
class Books extends \yii\db\ActiveRecord
{
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
            [['book_title'], 'required'],
            [['book_title'], 'string'],
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
        
        return $this->hasMany(Authors::className(), ['id' => 'author_id'])  // books_authors.author_id
                ->viaTable('books_authors', ['book_id' => 'id']);
    }
}
