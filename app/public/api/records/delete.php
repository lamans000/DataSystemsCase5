<?php

$db = DbConnection::getConnection();

$stmt = $db->prepare('DELETE FROM Member WHERE memberID = ?;');

$stmt->execute([
  $_POST['memberID']
]);
