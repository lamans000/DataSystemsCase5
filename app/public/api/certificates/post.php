<?php

$db = DbConnection::getConnection();

$stmt = $db->prepare(
  'INSERT INTO Certifications (certificationID, certificationName, certifyingAgency, expirationPeriod)
  VALUES (?, ?, ?, ?)'
);
$stmt->execute([
  $_POST['certificationID'],
  $_POST['certificationName'],
  $_POST['certifyingAgency'],
  $_POST['expirationPeriod']
]);
