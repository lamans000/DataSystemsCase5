<?php
// Step 1: Get a datase connection from our help class
$db = DbConnection::getConnection();
// Step 2: Create & run the query
if (isset($_GET['guid'])) {
  $stmt = $db->prepare(
    'SELECT mc.memberCertification as memberCertification, m.firstName as firstName, m.lastName as lastName, c.certificationName as cName, mc.certificationRecieved as dateReceived, DATE_ADD(mc.certificationRecieved, INTERVAL c.expirationPeriod year) as dateExpired FROM ocfr.Member as m, ocfr.Certifications as c, ocfr.MemberCertifications as mc WHERE m.memberID = mc.memberID AND c.certificationID = mc.certificationID AND DATE_ADD(mc.certificationRecieved, INTERVAL c.expirationPeriod year) < CURDATE();'
  );
  $stmt->execute([$_GET['guid']]);
} else {
  $stmt = $db->prepare('SELECT mc.memberCertification as memberCertification, m.firstName as firstName, m.lastName as lastName, c.certificationName as cName, mc.certificationRecieved as dateReceived, DATE_ADD(mc.certificationRecieved, INTERVAL c.expirationPeriod year) as dateExpired FROM ocfr.Member as m, ocfr.Certifications as c, ocfr.MemberCertifications as mc WHERE m.memberID = mc.memberID AND c.certificationID = mc.certificationID AND DATE_ADD(mc.certificationRecieved, INTERVAL c.expirationPeriod year) < CURDATE();');
  $stmt->execute();
}
$members = $stmt->fetchAll();
// Step 3: Convert to JSON
$json = json_encode($members, JSON_PRETTY_PRINT);
// Step 4: Output
header('Content-Type: application/json');
echo $json;
