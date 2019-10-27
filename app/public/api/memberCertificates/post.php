<?php

$db = DbConnection::getConnection();

$stmt = $db->prepare(
  'INSERT INTO MemberCertifications (memberCertification, memberID, certificationID)
  VALUES (?, ?, ?)'
);
$stmt->execute([
  $_POST['memberCertification'],
  $_POST['memberID'],
  $_POST['certificationID']
]);
