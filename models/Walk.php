<?php
class Walk {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function createWalk($owner, $latitude, $longitude, $dog_details) {
        $query = "INSERT INTO walks (owner, latitude, longitude, dog_details) 
                 VALUES (?, ?, ?, ?)";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([$owner, $latitude, $longitude, $dog_details]);
    }

    public function getWalks() {
        $query = "SELECT * FROM walks WHERE status = 'pending'";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function acceptWalk($walk_id, $walker) {
        $query = "UPDATE walks SET status = 'accepted', walker = ? WHERE id = ?";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([$walker, $walk_id]);
    }

    public function getUserWalks($username, $user_type) {
        $query = $user_type == 'owner' 
            ? "SELECT * FROM walks WHERE owner = ?"
            : "SELECT * FROM walks WHERE walker = ?";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$username]);
        return $stmt->fetchAll();
    }
}
?>