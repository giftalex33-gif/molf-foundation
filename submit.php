<?php
session_start();
require __DIR__ . '/config/db.php';
if ($_SERVER['REQUEST_METHOD'] !== 'POST') { header('Location: index.html'); exit; }
function clean(string $key, int $max=5000): string { $v=trim((string)($_POST[$key] ?? '')); return mb_substr($v, 0, $max); }
$type = clean('form_type', 40);
$allowed = ['contact','volunteer','registration','donation_enquiry'];
$name = clean('name',160); $email = clean('email',190); $phone = clean('phone',50); $interest = clean('interest',120); $message = clean('message',5000);
if (!in_array($type,$allowed,true) || $name==='' || !filter_var($email,FILTER_VALIDATE_EMAIL) || $message==='') {
  http_response_code(422); $error='Please go back and complete the required fields with a valid email address.';
} else {
  try {
    $stmt=$pdo->prepare('INSERT INTO submissions (form_type,name,email,phone,interest,message) VALUES (:type,:name,:email,:phone,:interest,:message)');
    $stmt->execute(['type'=>$type,'name'=>$name,'email'=>$email,'phone'=>$phone ?: null,'interest'=>$interest ?: null,'message'=>$message]);
    $success=true;
  } catch (Throwable $e) { http_response_code(500); $error='We could not save your message right now. Please try again later.'; }
}
?><!doctype html><html lang="en"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title>Submission | MOLF Foundation</title><link rel="stylesheet" href="css/style.css"></head><body><main class="wrap" style="padding-top:70px;max-width:760px"><section class="card" style="padding:32px;background:#fff;border-radius:16px"><div class="eyebrow">MOLF Foundation</div><?php if (!empty($success)): ?><h1>Thank you, <?= htmlspecialchars($name,ENT_QUOTES,'UTF-8') ?>.</h1><p>Your message has been received. The MOLF team can review it from the admin dashboard.</p><?php else: ?><h1>We couldn’t submit that yet</h1><p><?= htmlspecialchars($error ?? 'Please try again.',ENT_QUOTES,'UTF-8') ?></p><?php endif; ?><a class="btn green" href="<?= htmlspecialchars($type==='volunteer'?'volunteer.html':($type==='registration'?'register.html':($type==='donation_enquiry'?'donate.html':'contact.html')),ENT_QUOTES,'UTF-8') ?>">Return to website</a></section></main></body></html>