<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "authors".
 *
 * @property integer $id
 * @property string $author_name
 *
 * @property BooksAuthors[] $booksAuthors
 */
class Authors extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'authors';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['author_name'], 'required'],
            [['author_name'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'author_name' => 'Author Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBooksAuthors()
    {
        return $this->hasMany(BooksAuthors::className(), ['author_id' => 'id']);
    }
    
    /**
    * @return \yii\db\ActiveQuery
    */
    public function getBooks()
    {
        return $this->hasMany(Books::className(), ['id' => 'book_id']) // book_authors.book_id
                ->viaTable('books_authors', ['author_id' => 'id']);    // authors.id
    }
}
