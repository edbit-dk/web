<?php

class ContactModel {

    /**
     * Every model needs a database connection, passed to the model
     * @param object $db A PDO database connection
     */
    function __construct($db) {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }

    /**
     * Add message to database
     */
    public function addMessage($subject, $email, $message) {
        $subject = strip_tags($subject);
        $email = strip_tags($email);
        $message = strip_tags($message);

        $sql = "INSERT INTO messages (message_subject, message_email, message_text) VALUES (:subject, :email, :text)";
        $query = $this->db->prepare($sql);
        $query->execute(array(':subject' => $subject, ':email' => $email, ':text' => $message));
    }

     /**
     * Delete message from database
     */
    public function deleteMessage($message_id) {
        $sql = "DELETE FROM messages WHERE id = :message_id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':message_id' => $message_id));
    }

}
