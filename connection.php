<?php
class Connection
{
	private $servername = "mysql:host=localhost;dbname=Assessment_2";
	private $username = "adminer";
	private $password = "P@ssw0rd";
	private $options = [
		PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
		PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
		PDO::ATTR_CASE => PDO::CASE_NATURAL
	];
	protected $connection;

	public function open()
	{
		try {
			$this->connection = new PDO($this->servername, $this->username, $this->password, $this->options);
			return $this->connection;
		} 
		catch (PDOException $e) {
		}
	}

	public function close()
	{
		$connection = null;
	}
}
?>