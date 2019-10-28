<?php
// Step 1: Get a datase connection from our help class
$db = DbConnection::getConnection();
// Step 2: Create & run the query
if (isset($_GET['guid'])) {
  $stmt = $db->prepare(
    'SELECT m.memberID, m.firstName, m.lastName, c.certificationID, x.certificationName, x.certifyingAgency, c.certificationRecieved, c.memberCertification
FROM Member as m, MemberCertifications as c, Certifications as x
WHERE m.memberID = c.memberID AND c.certificationID = x.certificationID;'
  );
  $stmt->execute([$_GET['guid']]);
} else {
  $stmt = $db->prepare('SELECT m.memberID, m.firstName, m.lastName, c.certificationID, x.certificationName, x.certifyingAgency, c.certificationRecieved, c.memberCertification
FROM Member as m, MemberCertifications as c, Certifications as x
WHERE m.memberID = c.memberID AND c.certificationID = x.certificationID;');
  $stmt->execute();
}
$memberCertifications = $stmt->fetchAll();
// Step 3: Convert to JSON
$json = json_encode($memberCertifications, JSON_PRETTY_PRINT);
// Step 4: Output
header('Content-Type: application/json');
echo $json;
