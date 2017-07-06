<?php


namespace app\models;
use yii\db\ActiveRecord;
use app\models\Books;

/**
 * Description of booksAuthors
 *
 * @author User
 */
class BooksAuthors extends ActiveRecord {
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'books_authors';
    }
    
    /**
     * @inheritdoc
     */
    public function getBookIds()
    {
        return $this->hasOne(Books::className(), ['author_id' => 'author_id' ]);
    }
}
