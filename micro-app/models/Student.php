<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "student".
 *
 * @property int $id
 * @property string $StudentName
 * @property int $Gender 性别：0 is 未知，1 is 男，2 is 女
 * @property string $NickName
 * @property string $Password
 * @property string $StudentNumber
 * @property int $Grade
 * @property int $CollegeID
 * @property int $MajorID
 * @property string $StudentPortrait
 * @property int $Privilege 0=普通用户 1=管理员
 * @property int $DeleteStatus 删除位：0 is 正常，1 is 已删除
 *
 * @property File[] $files
 * @property College $college
 * @property Major $major
 * @property StudentSelectCourse[] $studentSelectCourses
 */
class Student extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'student';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Gender', 'Grade', 'CollegeID', 'MajorID', 'Privilege', 'DeleteStatus'], 'integer'],
            [['StudentName', 'NickName', 'Password', 'StudentNumber', 'StudentPortrait'], 'string', 'max' => 255],
            [['CollegeID'], 'exist', 'skipOnError' => true, 'targetClass' => College::className(), 'targetAttribute' => ['CollegeID' => 'id']],
            [['MajorID'], 'exist', 'skipOnError' => true, 'targetClass' => Major::className(), 'targetAttribute' => ['MajorID' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'StudentName' => Yii::t('app', 'Student Name'),
            'Gender' => Yii::t('app', '性别：0 is 未知，1 is 男，2 is 女'),
            'NickName' => Yii::t('app', 'Nick Name'),
            'Password' => Yii::t('app', 'Password'),
            'StudentNumber' => Yii::t('app', 'Student Number'),
            'Grade' => Yii::t('app', 'Grade'),
            'CollegeID' => Yii::t('app', 'College ID'),
            'MajorID' => Yii::t('app', 'Major ID'),
            'StudentPortrait' => Yii::t('app', 'Student Portrait'),
            'Privilege' => Yii::t('app', '0=普通用户 1=管理员'),
            'DeleteStatus' => Yii::t('app', '删除位：0 is 正常，1 is 已删除'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFiles()
    {
        return $this->hasMany(File::className(), ['StudentID' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCollege()
    {
        return $this->hasOne(College::className(), ['id' => 'CollegeID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMajor()
    {
        return $this->hasOne(Major::className(), ['id' => 'MajorID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudentSelectCourses()
    {
        return $this->hasMany(StudentSelectCourse::className(), ['StudentID' => 'id']);
    }
}
