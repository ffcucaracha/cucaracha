<?php

/**
 * This is the model class for table "geo_objects".
 *
 * The followings are the available columns in table 'geo_objects':
 * @property integer $id
 * @property string $coord
 * @property string $name
 * @property string $info
 */
class GeoObjects extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'geo_objects';
	}

    public function primaryKey()
    {
        return 'id';
    }


    /**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('coord1, coord2, name, type', 'required'),
			array('id,type', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>100),
            array('coord1, coord2', 'length', 'max'=>15),
            array('info', 'length', 'max'=>200),
            array('type', 'in', 'range'=>array('1','2','3','4','5','6','7')),
        );
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'coord1' => 'Широта',
            'coord2' => 'Долгота',
            'name' => 'Название',
			'info' => 'Информация',
            'type' => 'Тип',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('coord1',$this->coord1,true);
        $criteria->compare('coord2',$this->coord2,true);
        $criteria->compare('name',$this->name,true);
		$criteria->compare('info',$this->info,true);
        $criteria->compare('type',$this->type,true);

        return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return GeoObjects the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    public static function Getcoord()
    {
        $points = array();
        $sql = "select id, coord1, coord2, name, info, type from geo_objects";
        $array = Yii::app()->db->createCommand($sql)->query();
        foreach($array as $value)
        {
            $points[] = array(
                'id'     => $value['id'],
                'coord1' => $value['coord1'],
                'coord2' => $value['coord2'],
                'name'  => $value['name'],
                'info'  => $value['info'],
                'type'  => $value['type'],
                'type_name'  => self::getTypeName($value['type']),
            );
        }
        return $points;
    }

    public function types()
    {
        $types = array();
        $types[1] = 'тип1';
        $types[2] = 'тип2';
        $types[3] = 'тип3';
        $types[4] = 'тип4';
        $types[5] = 'тип5';
        $types[6] = 'тип6';
        $types[7] = 'тип7';

        return $types;
    }

    public function getTypeName($type=1)
    {
        $types = self::types();
        foreach($types as $key => $value)
        {
            if($key==$type) return $value;
        }
        return $types[1];
    }

    public function getType($type)
    {
        $types = self::types();
        foreach($types as $key => $value)
        {
            if($value==$type) return $key;
        }
        return 1;
    }
}
