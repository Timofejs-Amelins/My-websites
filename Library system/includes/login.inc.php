<?php

// grab data from form
$member_id = $_POST["member_id"];
echo $member_id;

// create member based on data
$member = new MemberContr::login($member_id);