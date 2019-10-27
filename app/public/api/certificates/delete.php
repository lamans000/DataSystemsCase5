<?php

$db = DbConnection::getConnection();

$stmt = $db->prepare('DELETE FROM Certifications WHERE certificationID = ?;');

$stmt->execute([
  $_POST['certificationID']
]);
