<?php

require_once 'propel/om/BaseObject.php';

require_once 'propel/om/Persistent.php';

include_once 'creole/util/Clob.php';
include_once 'creole/util/Blob.php';


include_once 'propel/util/Criteria.php';

include_once 'persistence/PurchasePeer.php';

/**
 * Base class that represents a row from the 'purchase' table.
 *
 * A ride on a itinerary
 *
 * This class was autogenerated by Propel on:
 *
 * Mon Mar  8 23:45:28 2010
 *
 * @package    persistence.om
 */
abstract class BasePurchase extends BaseObject  implements Persistent {


	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        PurchasePeer
	 */
	protected static $peer;


	/**
	 * The value for the key field.
	 * @var        int
	 */
	protected $key;


	/**
	 * The value for the user_id field.
	 * @var        string
	 */
	protected $user_id;


	/**
	 * The value for the store field.
	 * @var        string
	 */
	protected $store;


	/**
	 * The value for the cost field.
	 * @var        double
	 */
	protected $cost;


	/**
	 * The value for the date field.
	 * @var        int
	 */
	protected $date;


	/**
	 * The value for the notes field.
	 * @var        string
	 */
	protected $notes;


	/**
	 * The value for the billtype_key field.
	 * @var        int
	 */
	protected $billtype_key;

	/**
	 * @var        Billtype
	 */
	protected $aBilltype;

	/**
	 * @var        User
	 */
	protected $aUser;

	/**
	 * Flag to prevent endless save loop, if this object is referenced
	 * by another object which falls in this transaction.
	 * @var        boolean
	 */
	protected $alreadyInSave = false;

	/**
	 * Flag to prevent endless validation loop, if this object is referenced
	 * by another object which falls in this transaction.
	 * @var        boolean
	 */
	protected $alreadyInValidation = false;

	/**
	 * Get the [key] column value.
	 * user Id and cookie
	 * @return     int
	 */
	public function getKey()
	{

		return $this->key;
	}

	/**
	 * Get the [user_id] column value.
	 * user Id
	 * @return     string
	 */
	public function getUserId()
	{

		return $this->user_id;
	}

	/**
	 * Get the [store] column value.
	 * name
	 * @return     string
	 */
	public function getStore()
	{

		return $this->store;
	}

	/**
	 * Get the [cost] column value.
	 * 
	 * @return     double
	 */
	public function getCost()
	{

		return $this->cost;
	}

	/**
	 * Get the [optionally formatted] [date] column value.
	 * date time in line
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the integer unix timestamp will be returned.
	 * @return     mixed Formatted date/time value as string or integer unix timestamp (if format is NULL).
	 * @throws     PropelException - if unable to convert the date/time to timestamp.
	 */
	public function getDate($format = 'Y-m-d H:i:s')
	{

		if ($this->date === null || $this->date === '') {
			return null;
		} elseif (!is_int($this->date)) {
			// a non-timestamp value was set externally, so we convert it
			$ts = strtotime($this->date);
			if ($ts === -1 || $ts === false) { // in PHP 5.1 return value changes to FALSE
				throw new PropelException("Unable to parse value of [date] as date/time value: " . var_export($this->date, true));
			}
		} else {
			$ts = $this->date;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	/**
	 * Get the [notes] column value.
	 * Description of the ride
	 * @return     string
	 */
	public function getNotes()
	{

		return $this->notes;
	}

	/**
	 * Get the [billtype_key] column value.
	 * Foreign Key for billtype
	 * @return     int
	 */
	public function getBilltypeKey()
	{

		return $this->billtype_key;
	}

	/**
	 * Set the value of [key] column.
	 * user Id and cookie
	 * @param      int $v new value
	 * @return     void
	 */
	public function setKey($v)
	{

		// Since the native PHP type for this column is integer,
		// we will cast the input value to an int (if it is not).
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->key !== $v) {
			$this->key = $v;
			$this->modifiedColumns[] = PurchasePeer::KEY;
		}

	} // setKey()

	/**
	 * Set the value of [user_id] column.
	 * user Id
	 * @param      string $v new value
	 * @return     void
	 */
	public function setUserId($v)
	{

		// Since the native PHP type for this column is string,
		// we will cast the input to a string (if it is not).
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->user_id !== $v) {
			$this->user_id = $v;
			$this->modifiedColumns[] = PurchasePeer::USER_ID;
		}

		if ($this->aUser !== null && $this->aUser->getId() !== $v) {
			$this->aUser = null;
		}

	} // setUserId()

	/**
	 * Set the value of [store] column.
	 * name
	 * @param      string $v new value
	 * @return     void
	 */
	public function setStore($v)
	{

		// Since the native PHP type for this column is string,
		// we will cast the input to a string (if it is not).
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->store !== $v) {
			$this->store = $v;
			$this->modifiedColumns[] = PurchasePeer::STORE;
		}

	} // setStore()

	/**
	 * Set the value of [cost] column.
	 * 
	 * @param      double $v new value
	 * @return     void
	 */
	public function setCost($v)
	{

		if ($this->cost !== $v) {
			$this->cost = $v;
			$this->modifiedColumns[] = PurchasePeer::COST;
		}

	} // setCost()

	/**
	 * Set the value of [date] column.
	 * date time in line
	 * @param      int $v new value
	 * @return     void
	 */
	public function setDate($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { // in PHP 5.1 return value changes to FALSE
				throw new PropelException("Unable to parse date/time value for [date] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->date !== $ts) {
			$this->date = $ts;
			$this->modifiedColumns[] = PurchasePeer::DATE;
		}

	} // setDate()

	/**
	 * Set the value of [notes] column.
	 * Description of the ride
	 * @param      string $v new value
	 * @return     void
	 */
	public function setNotes($v)
	{

		// if the passed in parameter is the *same* object that
		// is stored internally then we use the Lob->isModified()
		// method to know whether contents changed.
		if ($v instanceof Lob && $v === $this->notes) {
			$changed = $v->isModified();
		} else {
			$changed = ($this->notes !== $v);
		}
		if ($changed) {
			if ( !($v instanceof Lob) ) {
				$obj = new Clob();
				$obj->setContents($v);
			} else {
				$obj = $v;
			}
			$this->notes = $obj;
			$this->modifiedColumns[] = PurchasePeer::NOTES;
		}

	} // setNotes()

	/**
	 * Set the value of [billtype_key] column.
	 * Foreign Key for billtype
	 * @param      int $v new value
	 * @return     void
	 */
	public function setBilltypeKey($v)
	{

		// Since the native PHP type for this column is integer,
		// we will cast the input value to an int (if it is not).
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->billtype_key !== $v) {
			$this->billtype_key = $v;
			$this->modifiedColumns[] = PurchasePeer::BILLTYPE_KEY;
		}

		if ($this->aBilltype !== null && $this->aBilltype->getKey() !== $v) {
			$this->aBilltype = null;
		}

	} // setBilltypeKey()

	/**
	 * Hydrates (populates) the object variables with values from the database resultset.
	 *
	 * An offset (1-based "start column") is specified so that objects can be hydrated
	 * with a subset of the columns in the resultset rows.  This is needed, for example,
	 * for results of JOIN queries where the resultset row includes columns from two or
	 * more tables.
	 *
	 * @param      ResultSet $rs The ResultSet class with cursor advanced to desired record pos.
	 * @param      int $startcol 1-based offset column which indicates which restultset column to start with.
	 * @return     int next starting column
	 * @throws     PropelException  - Any caught Exception will be rewrapped as a PropelException.
	 */
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->key = $rs->getInt($startcol + 0);

			$this->user_id = $rs->getString($startcol + 1);

			$this->store = $rs->getString($startcol + 2);

			$this->cost = $rs->getFloat($startcol + 3);

			$this->date = $rs->getTimestamp($startcol + 4, null);

			$this->notes = $rs->getClob($startcol + 5);

			$this->billtype_key = $rs->getInt($startcol + 6);

			$this->resetModified();

			$this->setNew(false);

			// FIXME - using NUM_COLUMNS may be clearer.
			return $startcol + 7; // 7 = PurchasePeer::NUM_COLUMNS - PurchasePeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating Purchase object", $e);
		}
	}

	/**
	 * Removes this object from datastore and sets delete attribute.
	 *
	 * @param      Connection $con
	 * @return     void
	 * @throws     PropelException
	 * @see        BaseObject::setDeleted()
	 * @see        BaseObject::isDeleted()
	 */
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(PurchasePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			PurchasePeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	/**
	 * Stores the object in the database.  If the object is new,
	 * it inserts it; otherwise an update is performed.  This method
	 * wraps the doSave() worker method in a transaction.
	 *
	 * @param      Connection $con
	 * @return     int The number of rows affected by this insert/update and any referring fk objects' save() operations.
	 * @throws     PropelException
	 * @see        doSave()
	 */
	public function save($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(PurchasePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			$affectedRows = $this->doSave($con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	/**
	 * Stores the object in the database.
	 *
	 * If the object is new, it inserts it; otherwise an update is performed.
	 * All related objects are also updated in this method.
	 *
	 * @param      Connection $con
	 * @return     int The number of rows affected by this insert/update and any referring fk objects' save() operations.
	 * @throws     PropelException
	 * @see        save()
	 */
	protected function doSave($con)
	{
		$affectedRows = 0; // initialize var to track total num of affected rows
		if (!$this->alreadyInSave) {
			$this->alreadyInSave = true;


			// We call the save method on the following object(s) if they
			// were passed to this object by their coresponding set
			// method.  This object relates to these object(s) by a
			// foreign key reference.

			if ($this->aBilltype !== null) {
				if ($this->aBilltype->isModified()) {
					$affectedRows += $this->aBilltype->save($con);
				}
				$this->setBilltype($this->aBilltype);
			}

			if ($this->aUser !== null) {
				if ($this->aUser->isModified()) {
					$affectedRows += $this->aUser->save($con);
				}
				$this->setUser($this->aUser);
			}


			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = PurchasePeer::doInsert($this, $con);
					$affectedRows += 1; // we are assuming that there is only 1 row per doInsert() which
										 // should always be true here (even though technically
										 // BasePeer::doInsert() can insert multiple rows).

					$this->setKey($pk);  //[IMV] update autoincrement primary key

					$this->setNew(false);
				} else {
					$affectedRows += PurchasePeer::doUpdate($this, $con);
				}
				$this->resetModified(); // [HL] After being saved an object is no longer 'modified'
			}

			$this->alreadyInSave = false;
		}
		return $affectedRows;
	} // doSave()

	/**
	 * Array of ValidationFailed objects.
	 * @var        array ValidationFailed[]
	 */
	protected $validationFailures = array();

	/**
	 * Gets any ValidationFailed objects that resulted from last call to validate().
	 *
	 *
	 * @return     array ValidationFailed[]
	 * @see        validate()
	 */
	public function getValidationFailures()
	{
		return $this->validationFailures;
	}

	/**
	 * Validates the objects modified field values and all objects related to this table.
	 *
	 * If $columns is either a column name or an array of column names
	 * only those columns are validated.
	 *
	 * @param      mixed $columns Column name or an array of column names.
	 * @return     boolean Whether all columns pass validation.
	 * @see        doValidate()
	 * @see        getValidationFailures()
	 */
	public function validate($columns = null)
	{
		$res = $this->doValidate($columns);
		if ($res === true) {
			$this->validationFailures = array();
			return true;
		} else {
			$this->validationFailures = $res;
			return false;
		}
	}

	/**
	 * This function performs the validation work for complex object models.
	 *
	 * In addition to checking the current object, all related objects will
	 * also be validated.  If all pass then <code>true</code> is returned; otherwise
	 * an aggreagated array of ValidationFailed objects will be returned.
	 *
	 * @param      array $columns Array of column names to validate.
	 * @return     mixed <code>true</code> if all validations pass; array of <code>ValidationFailed</code> objets otherwise.
	 */
	protected function doValidate($columns = null)
	{
		if (!$this->alreadyInValidation) {
			$this->alreadyInValidation = true;
			$retval = null;

			$failureMap = array();


			// We call the validate method on the following object(s) if they
			// were passed to this object by their coresponding set
			// method.  This object relates to these object(s) by a
			// foreign key reference.

			if ($this->aBilltype !== null) {
				if (!$this->aBilltype->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aBilltype->getValidationFailures());
				}
			}

			if ($this->aUser !== null) {
				if (!$this->aUser->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aUser->getValidationFailures());
				}
			}


			if (($retval = PurchasePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(PurchasePeer::DATABASE_NAME);

		if ($this->isColumnModified(PurchasePeer::KEY)) $criteria->add(PurchasePeer::KEY, $this->key);
		if ($this->isColumnModified(PurchasePeer::USER_ID)) $criteria->add(PurchasePeer::USER_ID, $this->user_id);
		if ($this->isColumnModified(PurchasePeer::STORE)) $criteria->add(PurchasePeer::STORE, $this->store);
		if ($this->isColumnModified(PurchasePeer::COST)) $criteria->add(PurchasePeer::COST, $this->cost);
		if ($this->isColumnModified(PurchasePeer::DATE)) $criteria->add(PurchasePeer::DATE, $this->date);
		if ($this->isColumnModified(PurchasePeer::NOTES)) $criteria->add(PurchasePeer::NOTES, $this->notes);
		if ($this->isColumnModified(PurchasePeer::BILLTYPE_KEY)) $criteria->add(PurchasePeer::BILLTYPE_KEY, $this->billtype_key);

		return $criteria;
	}

	/**
	 * Builds a Criteria object containing the primary key for this object.
	 *
	 * Unlike buildCriteria() this method includes the primary key values regardless
	 * of whether or not they have been modified.
	 *
	 * @return     Criteria The Criteria object containing value(s) for primary key(s).
	 */
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(PurchasePeer::DATABASE_NAME);

		$criteria->add(PurchasePeer::KEY, $this->key);

		return $criteria;
	}

	/**
	 * Returns the primary key for this object (row).
	 * @return     int
	 */
	public function getPrimaryKey()
	{
		return $this->getKey();
	}

	/**
	 * Generic method to set the primary key (key column).
	 *
	 * @param      int $key Primary key.
	 * @return     void
	 */
	public function setPrimaryKey($key)
	{
		$this->setKey($key);
	}

	/**
	 * Sets contents of passed object to values from current object.
	 *
	 * If desired, this method can also make copies of all associated (fkey referrers)
	 * objects.
	 *
	 * @param      object $copyObj An object of Purchase (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setUserId($this->user_id);

		$copyObj->setStore($this->store);

		$copyObj->setCost($this->cost);

		$copyObj->setDate($this->date);

		$copyObj->setNotes($this->notes);

		$copyObj->setBilltypeKey($this->billtype_key);


		$copyObj->setNew(true);

		$copyObj->setKey(NULL); // this is a pkey column, so set to default value

	}

	/**
	 * Makes a copy of this object that will be inserted as a new row in table when saved.
	 * It creates a new object filling in the simple attributes, but skipping any primary
	 * keys that are defined for the table.
	 *
	 * If desired, this method can also make copies of all associated (fkey referrers)
	 * objects.
	 *
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @return     Purchase Clone of current object.
	 * @throws     PropelException
	 */
	public function copy($deepCopy = false)
	{
		// we use get_class(), because this might be a subclass
		$clazz = get_class($this);
		$copyObj = new $clazz();
		$this->copyInto($copyObj, $deepCopy);
		return $copyObj;
	}

	/**
	 * Returns a peer instance associated with this om.
	 *
	 * Since Peer classes are not to have any instance attributes, this method returns the
	 * same instance for all member of this class. The method could therefore
	 * be static, but this would prevent one from overriding the behavior.
	 *
	 * @return     PurchasePeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new PurchasePeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a Billtype object.
	 *
	 * @param      Billtype $v
	 * @return     void
	 * @throws     PropelException
	 */
	public function setBilltype($v)
	{


		if ($v === null) {
			$this->setBilltypeKey(NULL);
		} else {
			$this->setBilltypeKey($v->getKey());
		}


		$this->aBilltype = $v;
	}


	/**
	 * Get the associated Billtype object
	 *
	 * @param      Connection Optional Connection object.
	 * @return     Billtype The associated Billtype object.
	 * @throws     PropelException
	 */
	public function getBilltype($con = null)
	{
		// include the related Peer class
		include_once 'persistence/om/BaseBilltypePeer.php';

		if ($this->aBilltype === null && ($this->billtype_key !== null)) {

			$this->aBilltype = BilltypePeer::retrieveByPK($this->billtype_key, $con);

			/* The following can be used instead of the line above to
			   guarantee the related object contains a reference
			   to this object, but this level of coupling
			   may be undesirable in many circumstances.
			   As it can lead to a db query with many results that may
			   never be used.
			   $obj = BilltypePeer::retrieveByPK($this->billtype_key, $con);
			   $obj->addBilltypes($this);
			 */
		}
		return $this->aBilltype;
	}

	/**
	 * Declares an association between this object and a User object.
	 *
	 * @param      User $v
	 * @return     void
	 * @throws     PropelException
	 */
	public function setUser($v)
	{


		if ($v === null) {
			$this->setUserId(NULL);
		} else {
			$this->setUserId($v->getId());
		}


		$this->aUser = $v;
	}


	/**
	 * Get the associated User object
	 *
	 * @param      Connection Optional Connection object.
	 * @return     User The associated User object.
	 * @throws     PropelException
	 */
	public function getUser($con = null)
	{
		// include the related Peer class
		include_once 'persistence/om/BaseUserPeer.php';

		if ($this->aUser === null && (($this->user_id !== "" && $this->user_id !== null))) {

			$this->aUser = UserPeer::retrieveByPK($this->user_id, $con);

			/* The following can be used instead of the line above to
			   guarantee the related object contains a reference
			   to this object, but this level of coupling
			   may be undesirable in many circumstances.
			   As it can lead to a db query with many results that may
			   never be used.
			   $obj = UserPeer::retrieveByPK($this->user_id, $con);
			   $obj->addUsers($this);
			 */
		}
		return $this->aUser;
	}

} // BasePurchase