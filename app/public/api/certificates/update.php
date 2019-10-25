<?php

$db = DbConnection::getConnection();

$stmt = $db->prepare('UPDATE Certifications SET certifyingAgency = ? WHERE certificateID = ?;');

$stmt->execute([
    $_POST['certifyingAgency'],
    $_POST['certificateID']
]);
