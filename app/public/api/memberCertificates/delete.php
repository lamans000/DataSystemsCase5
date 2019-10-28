<?php

$db = DbConnection::getConnection();

$stmt = $db->prepare('DELETE FROM MemberCertifications WHERE memberCertification = ?;');

$stmt->execute([
  $_POST['memberCertification']
]);
