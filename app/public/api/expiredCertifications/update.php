<?php

$db = DbConnection::getConnection();

$stmt = $db->prepare('UPDATE MemberCertifications SET certificationRecieved = ? WHERE memberCertification = ?');

$stmt->execute([
  $_POST['certificationRecieved'],
  $_POST['memberCertification']
]);
