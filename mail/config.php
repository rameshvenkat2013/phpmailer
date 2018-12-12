<?php

define('SMTP_HOST', 'smtp.gmail.com');
define('SENDER_EMAIL_ID', 'rameshh.venkat@gmail.com');
define('SENDER_EMAIL_PASSCODE', 'ramesh@321');
define('SMTP_SECURE', 'ssl');
define('SMTP_PORT', '465');
define('SENDER_NAME', 'ramesh');

//Multiple email with comma separated
define('RECIPIENT_EMAIL_ID', 'rameshh.venkat@gmail.com,ramesh.hv@lnttechservices.com');

//Multiple files with comma separated
define('ATTACHMENT_FILES', 'filename2.txt,agkiya_feedback_points.txt,attachment.txt,bikelife.jpg,cPanel X - File Manager.html,Form 16 Guidelines.pdf');

//This is the folder name, need not be modified. store the attachment in this folder path.
define('ATTACHMENT_PATH', 'attachments');
define('EMAIL_SUBJECT', 'test subject');
define('EMAIL_BODY', 'test body');