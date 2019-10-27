<?php

$db = DbConnection::getConnection();

$stmt = $db->prepare(
  'INSERT INTO MemberCertifications (memberCertification, memberID, certificationID, certificationRecieved)
  VALUES (?, ?, ?, ?)'
);
$stmt->execute([
  $_POST['memberCertification'],
  $_POST['memberID'],
  $_POST['certificationID'],
  $_POST['certificationReceived']
]);
