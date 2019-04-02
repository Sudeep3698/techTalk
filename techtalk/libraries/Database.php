<?php
class Database {
	private $host = DB_HOST;
	private $user = DB_USER;
	private $pass = DB_PASS;
	private $dbname = DB_NAME;

	private $dbh; // database handler to interact with the database
	private $error; // variable to output errors
	private $stmt; // Used for prepared statements

	public function __construct(){
		//Set DSN
		$dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
		//Set Options
		$options = array (
			PDO::ATTR_PERSISTENT => true, //Persistent connection can create only one object and can have multiple interactions with it
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
		);
		// Create a new PDO instance
		try {
			$this->dbh = new PDO ($dsn, $this->user, $this->pass, $options);
			// Catch any errors
		}
		catch( PDOException $e ) {
			$this->error = $e->getMessage();
		}
	}

	// Query function to fetch from the database
	public function query($query) {
		$this->stmt = $this->dbh->prepare($query);
	}

	// Bind function to bind any values
	public function bind($param, $value, $type = null) {
		if(is_null($type)) {
			switch(true){
				case is_int( $value ) :
					$type = PDO::PARAM_INT;
					break;
				case is_bool( $value ) :
					$type = PDO::PARAM_BOOL;
					break;
				case is_null( $value ) :
					$type = PDO::PARAM_NULL;
					break;
				default :
					$type = PDO::PARAM_STR;
			}
		}
		$this->stmt->bindValue($param, $value, $type);
	}

	//Executing the statements with the queries 
	public function execute() {
		return $this->stmt->execute();
	}

	// function to get the result from the database for the tables 
	public function resultset() {
		$this->execute();
		return $this->stmt->fetchAll(PDO::FETCH_OBJ);
	}

	// function to fetch a single row from the database
	public function single() {
		$this->execute();
		return $this->stmt->fetch(PDO::FETCH_OBJ);
	}

	// function to get the amount of rows returned
	public function rowCount(){
		return $this->stmt->rowCount();
	}

	//function which gives the id which is inserted in the last
	public function lastInsertId() {
		return $this->dbh->lastInsertId();
	}

	public function beginTransaction() {
		return $this->dbh->beginTransaction();
	}

	public function endTransaction() {
		return $this->dbh->commit();
	}

	public function cancelTransaction() {
		return $this->dbh->rollBack();
	}

}

?>