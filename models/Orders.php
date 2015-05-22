<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "orders".
 *
 * @property integer $id
 * @property integer $order_id
 * @property string $price
 * @property string $description
 * @property integer $available
 */
class Orders extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'orders';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['order_id', 'available'], 'integer'],
            [['price', 'description'], 'required'],
            [['price'], 'number'],
            [['description'], 'string', 'max' => 255]
        ];
    }
    
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'order_id' => 'Order ID',
            'price' => 'Price',
            'description' => 'Description',
            'available' => 'Available',
        ];
    }
}
