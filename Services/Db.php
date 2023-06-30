<?php

namespace Services;

class Db{

    protected $db;
    function __construct(){
        $config = (require __DIR__ . '/../settings.php')['db'];
        $this->db = new \PDO('mysql:host='.$config['host'].';dbname=' . $config['dbname'], $config['user'], $config['password']);
    }

    public function query($sql, $params = []) {
		$stmt = $this->db->prepare($sql);
		if (!empty($params)) {
			foreach ($params as $key => $val) {
				$stmt->bindValue(':'.$key, $val);
			}
		}
		$stmt->execute();
		return $stmt;
	}

	public function row($sql, $params = []) {
		$result = $this->query($sql, $params);
		return $result->fetchAll(PDO::FETCH_ASSOC);
	}

	public function column($sql, $params = []) {
		$result = $this->query($sql, $params);
		return $result->fetchColumn();
	}

} 