<?php

$db = DbConnection::getConnection();

$stmt = $db->prepare('UPDATE Certifications SET certifyingAgency = ? WHERE certificationID = ?;');

$stmt->execute([
    $_POST['certifyingAgency'],
    $_POST['certificationID']
]);
