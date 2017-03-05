<?php
/**
 * Class DbConnection
 * 初始化数据库连接的时候通过cDbConnection指向CDbConnection。
 * 事务嵌套的时候，DbTransaction的事务层级($_level)配合mysql的savepoint来满足Yii 1.x无法进行事务嵌套的问题。
 * 改进之后父事务里面可以嵌套子事务，子事务可以提交和回滚，
 * 子事务提交的话，父事务提交的时候会把子事务也一并提交，
 * 子事务回滚的话，父事务提交的时候子事务依然还是回滚，(*这一点可能需要注意)
 * 如果父事务回滚的话，子事务不管怎么操作，都是跟父事务一并回滚。
 * 可以实现如下例子：
 *      $transaction1 = Yii::app()->db->beginTransaction();
 *      $transaction2 = Yii::app()->db->beginTransaction();
 *      $transaction2->rollback();
 *      $transaction1->commit();
 * 关于mysql savepoint的资料可以参考 http://dev.mysql.com/doc/refman/5.5/en/savepoint.html
 * @author linyl <linyl@yikuaiqu.com>
 * @package application.components
 * @since 1.0
 */
class DbConnection  extends CApplicationComponent
{
    private  $cDbConnection;
    private  $transaction;

    public function __construct($dsn='',$username='',$password='')
    {
        $this->cDbConnection = new CDbConnection($dsn,$username,$password);
        return $this->cDbConnection;
    }

    public function __set($name, $value)
    {
        $this->cDbConnection->$name = $value;
    }

    public function __get($name)
    {
        return $this->cDbConnection->$name;
    }
    public function __call( $functionName,  $arguments){
        return call_user_func_array(array($this->cDbConnection, $functionName), $arguments);
    }





    public function beginTransaction()
    {
        if(empty($this->transaction)){
            $this->transaction = new DbTransaction($this->cDbConnection);
        }
        $this->transaction->begin();
        return $this->transaction;
    }

}



class DbTransaction
{
    public $cDbTransaction ;
    public $cDbConnection;
    public $_level = 0;
    public function __construct($cDbConnection)
    {
        $this->cDbConnection=$cDbConnection;
    }

    public function log($message){
        Yii::trace($message,'system.components.DbTransaction');
    }
    public function begin(){
        $this->log(__FUNCTION__ . " begin-level: " . $this->_level);
        if($this->_level == 0){
            $this->cDbTransaction = $this->cDbConnection->beginTransaction();
            $this->log(__FUNCTION__ . " Transaction");
        }else{
            $this->cDbConnection->createCommand("SAVEPOINT LEVEL" . $this->_level)->execute();
            $this->log(__FUNCTION__ . " SAVEPOINT LEVEL" . $this->_level);
        }
        $this->_level++;
        $this->log(__FUNCTION__ . " end-level: " . $this->_level);
    }

    public function commit()
    {
        $this->log(__FUNCTION__ . " before-level: " . $this->_level);
        $this->_level--;
        if($this->_level == 0){
            $this->cDbTransaction->commit();
            $this->log(__FUNCTION__ . " commit");
        }elseif($this->_level > 0){
            $this->cDbConnection->createCommand("SAVEPOINT LEVEL" . $this->_level)->execute();
            $this->log(__FUNCTION__ . " SAVEPOINT LEVEL" . $this->_level);
        }elseif($this->_level < 0){
            throw new CDbException("事务commit的层级为： " . $this->_level);
        }
        $this->log(__FUNCTION__ . "  end-level: " . $this->_level);
    }

    public function rollback()
    {
        $this->log(__FUNCTION__ . " before-level: " . $this->_level);
        $this->_level--;
        if($this->_level == 0){
            $this->cDbTransaction->rollback();
            $this->log("rollback");
        }elseif($this->_level > 0){
            $this->log(__FUNCTION__ . " ROLLBACK TO SAVEPOINT LEVEL" . $this->_level);
            $this->cDbConnection->createCommand("ROLLBACK TO SAVEPOINT LEVEL" . $this->_level)->execute();
        }elseif($this->_level < 0){
            throw new CDbException("事务rollback的层级为： " . $this->_level);
        }
        $this->log(__FUNCTION__ . " end-level: " . $this->_level);
    }

    public function __set($name, $value)
    {
        $this->cDbTransaction->$name = $value;
    }
    public function __get($name)
    {
        return $this->cDbTransaction->$name;
    }
    public function __call( $functionName,  $arguments){
        return call_user_func_array(array($this->cDbTransaction, $functionName), $arguments);
    }




}
