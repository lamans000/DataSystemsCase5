<?php

$db = DbConnection::getConnection();

$stmt = $db->prepare('UPDATE Certifications SET certificationName = ?, certifyingAgency = ?, expirationPeriod = ? WHERE certificationID = ?;');

$stmt->execute([
    $_POST['certificationName'],
    $_POST['certifyingAgency'],
    $_POST['expirationPeriod'],
    $_POST['certificationID']
]);
