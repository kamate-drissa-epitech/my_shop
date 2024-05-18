<?php
setcookie('userEmail', '', time() - 3600, '/', false);
header('Location: ../');
exit;
