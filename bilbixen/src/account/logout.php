<?php
// LOGOUT
session_start();
session_destroy();
header("Location: ../home");