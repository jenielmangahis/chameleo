

<?php
 mysql_connect('localhost','jaxboys_coin','coindb$#123');
	mysql_select_db('jaxboys_coin');

		$s=0;


			mysql_query("UPDATE `email_templates` SET  `subject` = 'Coin registration confirmation', `sender` = 'admin@imagecoins.com', `content` = '<div style=\"padding:20px; line-height:20px;\">\r\n <font face=\"Times New Roman, serif\"><font size=\"3\"><font face=\"Arial, sans-serif\">Dear </font><font face=\"Arial, sans-serif\"><b>[[EMAIL_ADDRESS]]</b></font><font face=\"Arial, sans-serif\">,</font></font></font><br />\r\n <p style=\"margin-top: 0.07in; margin-bottom: 0.07in; line-height: 0.21in\">\r\n <font face=\"Times New Roman, serif\"><font size=\"3\"><font face=\"Arial, sans-serif\">Thank you for registering Coin Serial #[[COIN_SERIAL]] at </font><strong class=\"western\"><font face=\"Arial, sans-serif\"><b>[[PROJECT_NAME]]</b></font></strong><font face=\"Arial, sans-serif\"> at<br />\r\n the website </font></font></font><a href=\"http://[[PROJECT_HOMEPAGE_URL]]\"><span style=\"color:#3366ff;\"><font face=\"Arial, sans-serif\"><font size=\"3\"><u><b>[[PROJECT_HOMEPAGE_URL]]</b></u></font></font></span></a> <font face=\"Times New Roman, serif\"><font size=\"3\"><font face=\"Arial, sans-serif\">on </font><font face=\"Arial, sans-serif\"><b>[[COIN_REG_DATE]]</b></font><font face=\"Arial, sans-serif\">! </font></font></font><br />\r\n <br />\r\n &nbsp;</p>\r\n <p align=\"LEFT\" lang=\"en-US\" style=\"margin-bottom: 0in\">\r\n <font face=\"Calibri, sans-serif\"><font size=\"2\" style=\"font-size: 11pt;\"><font face=\"Arial, sans-serif\"><font size=\"3\">You will now be able to login to your account and enter the </font></font><strong class=\"western\"><font face=\"Arial, sans-serif\"><font size=\"3\"><b>[[PROJECT_NAME]]</b></font></font></strong><font face=\"Arial, sans-serif\"><font size=\"3\"> website at </font></font></font></font><a href=\"http://[[PROJECT_HOMEPAGE_URL]]\"><span style=\"color:#3366ff;\"><font face=\"Arial, sans-serif\"><font size=\"3\"><u><b>[[PROJECT_HOMEPAGE_URL]]</b></u></font></font></span></a><font face=\"Calibri, sans-serif\"><font size=\"2\" style=\"font-size: 11pt\"><font face=\"Arial, sans-serif\"><font size=\"3\">. </font></font></font></font></p>\r\n <p align=\"LEFT\" lang=\"en-US\" style=\"margin-bottom: 0in\">\r\n &nbsp;</p>\r\n <p align=\"LEFT\" lang=\"en-US\" style=\"margin-bottom: 0in\">\r\n <font face=\"Calibri, sans-serif\"><font size=\"2\" style=\"font-size: 11pt\"><font face=\"Arial, sans-serif\"><font size=\"3\">We look forward to you becoming a valued contributor to our community and welcome your comments. </font></font></font></font></p>\r\n <p align=\"LEFT\" lang=\"en-US\" style=\"margin-bottom: 0in\">\r\n &nbsp;</p>\r\n <p align=\"LEFT\" lang=\"en-US\" style=\"margin-bottom: 0in\">\r\n <br />\r\n <font face=\"Calibri, sans-serif\"><font size=\"2\" style=\"font-size: 11pt\"><font face=\"Arial, sans-serif\"><font size=\"3\">Thanks again! </font></font></font></font><br />\r\n &nbsp;</p>\r\n <p style=\"margin-top: 0.07in; margin-bottom: 0.07in; line-height: 0.21in\">\r\n <font color=\"#000000\"><font face=\"Arial, sans-serif\">The </font></font><font color=\"#000000\"><font face=\"Arial, sans-serif\"><font size=\"3\"><b>[[PROJECT_NAME]]</b></font></font></font><font color=\"#000000\"><font face=\"Arial, sans-serif\"><font size=\"3\"> Team</font></font></font><br />\r\n <a href=\"http://[[PROJECT_HOMEPAGE_URL]]\"><span style=\"color:#3366ff;\"><font face=\"Arial, sans-serif\"><font size=\"3\"><u><b>[[PROJECT_HOMEPAGE_URL]]</b></u></font></font></span></a></p>\r\n</div>\r\n<p>\r\n &nbsp;</p>\r\n', `modified` = '2011-08-04 22:18:11' WHERE `email_templates`.`email_template_name` = 'COIN REGISTER CONFIRMATION'");

			mysql_query("UPDATE `email_templates` SET  `subject` = 'Registration confirmation.', `sender` = 'admin@imagecoins.com', `content` = '<div style=\"padding:20px; line-height:20px;\">\r\n <p style=\"margin-top: 0.07in; margin-bottom: 0.07in; line-height: 0.21in\">\r\n <font face=\"Times New Roman, serif\"><font size=\"3\"><font face=\"Arial, sans-serif\">Dear </font><font face=\"Arial, sans-serif\"><b>[[EMAIL_ADDRESS]]</b></font><font face=\"Arial, sans-serif\">,</font><br />\r\n <br />\r\n <font color=\"#000000\"><font face=\"Arial, sans-serif\">Thank you for registering and becoming a supporter and Member of </font></font><strong class=\"western\"><font color=\"#000000\"><font face=\"Arial, sans-serif\"><b>[[PROJECT_NAME]] </b></font></font></strong><strong class=\"western\"><font color=\"#000000\"><font face=\"Arial, sans-serif\">at</font></font></strong></font></font></p>\r\n <p style=\"margin-top: 0.07in; margin-bottom: 0.07in; line-height: 0.21in;\">\r\n <a href=\"http://[[PROJECT_HOMEPAGE_URL]]\"><span style=\"color:#3366ff;\"><font face=\"Arial, sans-serif\"><font size=\"3\"><u><b>[[PROJECT_HOMEPAGE_URL]]</b></u></font></font></span></a><font face=\"Times New Roman, serif\"><font size=\"3\"><font color=\"#000000\"><font face=\"Arial, sans-serif\">!</font></font><br />\r\n <br />\r\n <font face=\"Arial, sans-serif\">Here are the details you provided during sign-up! </font></font></font><br />\r\n <br />\r\n &nbsp;</p>\r\n <p style=\"margin-top: 0.07in; margin-bottom: 0.07in; line-height: 0.21in\">\r\n <font face=\"Times New Roman, serif\"><font size=\"3\"><font face=\"Arial, sans-serif\"><b>Username :</b></font><font face=\"Arial, sans-serif\"> [[EMAIL_ADDRESS]]</font></font></font></p>\r\n <p style=\"margin-top: 0.07in; margin-bottom: 0.07in; line-height: 0.21in\">\r\n <font face=\"Times New Roman, serif\"><font size=\"3\"><font face=\"Arial, sans-serif\"><b>Password:</b></font><font face=\"Arial, sans-serif\"> [[PASSWORD]]</font></font></font></p>\r\n <p style=\"margin-top: 0.07in; margin-bottom: 0.07in; line-height: 0.21in\">\r\n <font face=\"Times New Roman, serif\"><font size=\"3\"><font face=\"Arial, sans-serif\">Thanks again!</font></font></font></p>\r\n <p style=\"margin-top: 0.07in; margin-bottom: 0.07in; line-height: 0.21in\">\r\n <font color=\"#000000\"><font face=\"Arial, sans-serif\">The </font></font><font color=\"#000000\"><font face=\"Arial, sans-serif\"><font size=\"3\"><b>[[PROJECT_NAME]]</b></font></font></font><font color=\"#000000\"><font face=\"Arial, sans-serif\"><font size=\"3\"> Team</font></font></font><br />\r\n <a href=\"http://[[PROJECT_HOMEPAGE_URL]]\"><span style=\"color:#3366ff;\"><font face=\"Arial, sans-serif\"><font size=\"3\"><u><b>[[PROJECT_HOMEPAGE_URL]]</b></u></font></font></span></a><font face=\"Times New Roman, serif\"><font size=\"3\"><font color=\"#000000\"><font face=\"Arial, sans-serif\">!</font></font></font></font></p>\r\n <p>\r\n &nbsp;</p>\r\n</div>\r\n<p>\r\n &nbsp;</p>\r\n', `modified` = '2011-08-04 22:20:40' WHERE `email_templates`.`email_template_name` = 'REGISTRATION CONFIRMATION'");


						mysql_query("UPDATE `email_templates` SET  `subject` = 'Forgot your password?', `sender` = 'admin@imagecoins.com', `content` = '<div style=\"padding:20px; line-height:20px;\">\r\n <p style=\"margin-top: 0.07in; margin-bottom: 0.07in; line-height: 100%\">\r\n <font face=\"Arial, sans-serif\"><font size=\"3\">Dear <b>[[EMAIL_ADDRESS]]</b>,<br />\r\n <br />\r\n Forgot your password? </font></font></p>\r\n <p style=\"margin-top: 0.07in; margin-bottom: 0.07in; line-height: 100%\">\r\n <br />\r\n <font face=\"Times New Roman, serif\"><font size=\"3\"><font face=\"Arial, sans-serif\">This message is a response to the &ldquo;Forgot Password&rdquo; request you made at</font></font></font><font><font><b><a href=\"http://[[PROJECT_HOMEPAGE_URL]]\"><span style=\"color:#3366ff;\"><font face=\"Arial, sans-serif\"><font size=\"3\"><b> [[PROJECT_HOMEPAGE_URL]]</b></font></font></span></a>.</b></font></font><br />\r\n <br />\r\n &nbsp;</p>\r\n <p style=\"margin-top: 0.07in; margin-bottom: 0.07in; line-height: 0.21in\">\r\n <font face=\"Arial, sans-serif\"><font size=\"3\">Your </font></font><font><font><u><b><a href=\"http://[[PROJECT_HOMEPAGE_URL]]\"><span style=\"color:#3366ff;\"><font face=\"Arial, sans-serif\"><font size=\"3\"><u><b>[[PROJECT_HOMEPAGE_URL]]</b></u></font></font></span></a></b></u></font></font><font face=\"Arial, sans-serif\"><font size=\"3\"> Username and Password is listed below: </font></font><br />\r\n <br />\r\n <font face=\"Arial, sans-serif\"><font size=\"3\"><b>Username :</b></font></font><font face=\"Arial, sans-serif\"><font size=\"3\"> [[USER_NAME]] </font></font><br />\r\n <font face=\"Arial, sans-serif\"><font size=\"3\"><b>Password:</b></font></font><font face=\"Arial, sans-serif\"><font size=\"3\"> [[USER_PASSWORD]]<br />\r\n <br />\r\n Thanks again! </font></font></p>\r\n <p style=\"margin-top: 0.07in; margin-bottom: 0.07in; line-height: 100%\">\r\n <font face=\"Times New Roman, serif\"><font size=\"3\"><font face=\"Arial, sans-serif\">The </font><font face=\"Arial, sans-serif\"><b>[[PROJECT_NAME]]</b></font><font face=\"Arial, sans-serif\"> Team</font></font></font></p>\r\n <p style=\"margin-top: 0.07in; margin-bottom: 0.07in; line-height: 100%;\">\r\n <br />\r\n <u><font><font><b><a href=\"http://[[PROJECT_HOMEPAGE_URL]]\"><span style=\"color:#3366ff;\"><font face=\"Arial, sans-serif\"><font size=\"3\"><b>[[PROJECT_HOMEPAGE_URL]] </b></font></font></span></a></b></font></font></u></p>\r\n <p style=\"margin-bottom: 0in\">\r\n &nbsp;</p>\r\n <p style=\"margin-bottom: 0in\">\r\n &nbsp;</p>\r\n <p>\r\n &nbsp;</p>\r\n</div>\r\n<p>\r\n &nbsp;</p>\r\n', `modified` = '2011-08-04 22:24:00' WHERE `email_templates`.`email_template_name` = 'FORGOT PASSWORD'");





mysql_query("UPDATE `email_templates` SET   `subject` = 'Sign up confirmation', `sender` = 'admin@imagecoins.com', `content` = '<div style=\"padding:20px; line-height:20px;\">\r\n <p style=\"margin-top: 0.07in; margin-bottom: 0.07in; line-height: 0.21in\">\r\n <font face=\"Arial, sans-serif\"><font size=\"3\">Dear </font><b>[[EMAIL_ADDRESS]]</b>,</font></p>\r\n <p style=\"margin-bottom: 0in; line-height: 0.21in\">\r\n <font face=\"Arial, sans-serif\"><font size=\"3\">To complete your registration process and confirm your sign up, please click the following link:</font></font><br />\r\n &nbsp;</p>\r\n <p style=\"margin-bottom: 0in; line-height: 0.21in\">\r\n <font face=\"Arial, sans-serif\"><a href=\"http://[[CONFIRM_SIGN_UP_LINK]]\"><font size=\"3\"><b>[[CONFIRM_SIGN_UP_LINK]]</b></font></a><br />\r\n <br />\r\n <font size=\"3\">Thanks again!</font></font><br />\r\n &nbsp;</p>\r\n <p style=\"margin-bottom: 0in; line-height: 0.21in\">\r\n <font face=\"Arial, sans-serif\"><font color=\"#000000\"><font size=\"3\">The </font></font><font color=\"#000000\"><font size=\"3\"><b>[[PROJECT_NAME]]</b></font></font><font color=\"#000000\"><font size=\"3\"> Team</font></font></font></p>\r\n <p style=\"margin-bottom: 0in; line-height: 0.21in\">\r\n <a href=\"http://[[PROJECT_HOMEPAGE_URL]] \"><span style=\"color:#0000ff;\"><font face=\"Arial, sans-serif\"><u><b>[[PROJECT_HOMEPAGE_URL]] </b></u></font></span></a></p>\r\n <p>\r\n &nbsp;</p>\r\n</div>\r\n<p>\r\n &nbsp;</p>\r\n', `modified` = '2011-08-04 22:26:02' WHERE `email_templates`.`email_template_name` = 'SIGN UP CONFIRMATION'");
 

mysql_query("UPDATE `email_templates` SET `is_sytem` = '0' WHERE `email_templates`.`email_template_name` ='THANKYOU FOR COMMENT'");
mysql_query("UPDATE `email_templates` SET `is_sytem` = '0' WHERE `email_templates`.`email_template_name` ='EMAIL TO A MEMBER WHO REPLY TO A COMMENT'");

mysql_query("UPDATE `email_templates` SET `delete_status` = '1',`active_status` = '0' WHERE `email_templates`.`email_template_name` ='COMMENT BY HOLDER'");


mysql_query("UPDATE `email_templates` SET  `is_sytem` = '0',`subject` = 'Offencive comments', `sender` = 'admin@imagecoins.com', `content` = '<div style=\"padding: 20px; line-height: 20px;\">\r\n <style type=\"text/css\">\r\n<!--\r\n @page { margin: 0.79in }\r\n P { margin-bottom: 0.08in }\r\n A:link { so-language: zxx }\r\n --> </style>\r\n <p style=\"margin-top: 0.07in; margin-bottom: 0.07in; line-height: 0.21in\">\r\n <font face=\"Arial, sans-serif\"><font size=\"3\">Hello </font><b>[[EMAIL_ADDRESS]]</b><font size=\"3\">,</font></font></p>\r\n <p style=\"margin-bottom: 0in; line-height: 0.21in\">\r\n <font face=\"Arial, sans-serif\"><font size=\"3\">You have posted a comment which has been reported as offensive. </font></font></p>\r\n <p style=\"margin-bottom: 0in; line-height: 0.21in\">\r\n &nbsp;</p>\r\n <p style=\"margin-bottom: 0in; line-height: 0.21in\">\r\n <font face=\"Arial, sans-serif\"><font size=\"3\"><b>[[COMMENT]]</b></font></font></p>\r\n <p style=\"margin-bottom: 0in; line-height: 0.21in\">\r\n &nbsp;</p>\r\n <p style=\"margin-bottom: 0in; line-height: 0.21in\">\r\n <font face=\"Arial, sans-serif\"><font size=\"3\">Please review your comment and edit it or remove the offensive parts. If you do not feel your comment was offensive, please reply to this communication as quickly as possible. Please state the reasons you feel you have been&nbsp; unfairly reported. </font></font></p>\r\n <p style=\"margin-top: 0.07in; margin-bottom: 0.07in; line-height: 0.21in\">\r\n <font face=\"Arial, sans-serif\"><font size=\"3\">Thanks again! </font></font></p>\r\n <p style=\"margin-top: 0.07in; margin-bottom: 0.07in; line-height: 0.21in;\">\r\n <font face=\"Arial, sans-serif\"><font size=\"3\">The </font></font><font face=\"Arial, sans-serif\"><font size=\"3\"><b>[[PROJECT_NAME]]</b></font></font><font face=\"Arial, sans-serif\"><font size=\"3\"> Team</font></font></p>\r\n <p style=\"margin-top: 0.07in; margin-bottom: 0.07in; line-height: 0.21in\">\r\n <a href=\"http://[[PROJECT_HOMEPAGE_URL]]\"><span style=\"color:#3366ff;\"><font face=\"Arial, sans-serif\"><font size=\"3\"><u><b>[[PROJECT_HOMEPAGE_URL]]</b></u></font></font></span></a></p>\r\n</div>\r\n<p>\r\n &nbsp;</p>\r\n', `modified` = '2011-08-05 01:41:00' WHERE `email_templates`.`email_template_name` = 'OFFENSIVE COMMENT REPORTED'");

mysql_query("UPDATE `email_templates` SET  `is_sytem` = '0', `subject` = 'Offensive Comment Reported', `sender` = 'admin@imagecoins.com', `content` = '<div style=\"padding:20px; line-height:20px;\">\r\n <p style=\"margin-top: 0.07in; margin-bottom: 0.07in; line-height: 0.21in\">\r\n <font face=\"Arial, sans-serif\"><font size=\"3\">Hello </font><b>[[EMAIL_ADDRESS]]</b><font size=\"3\">,</font></font></p>\r\n <p style=\"margin-bottom: 0in; line-height: 0.21in\">\r\n <font face=\"Arial, sans-serif\"><font size=\"3\">You have posted a comment which has been reported as offensive. </font></font></p>\r\n <p style=\"margin-bottom: 0in; line-height: 0.21in\">\r\n &nbsp;</p>\r\n <p style=\"margin-bottom: 0in; line-height: 0.21in\">\r\n <font face=\"Arial, sans-serif\"><font size=\"3\"><b>[[COMMENT]]</b></font></font></p>\r\n <p style=\"margin-bottom: 0in; line-height: 0.21in\">\r\n &nbsp;</p>\r\n <p style=\"margin-bottom: 0in; line-height: 0.21in\">\r\n <font face=\"Arial, sans-serif\"><font size=\"3\">Please review your comment and edit it or remove the offensive parts. If you do not feel your comment was offensive, please reply to this communication as quickly as possible. Please state the reasons you feel you have been&nbsp; unfairly reported. </font></font></p>\r\n <p style=\"margin-top: 0.07in; margin-bottom: 0.07in; line-height: 0.21in\">\r\n <font face=\"Arial, sans-serif\"><font size=\"3\">Thanks again! </font></font></p>\r\n <p style=\"margin-top: 0.07in; margin-bottom: 0.07in; line-height: 0.21in;\">\r\n <font face=\"Arial, sans-serif\"><font size=\"3\">The </font></font><font face=\"Arial, sans-serif\"><font size=\"3\"><b>[[PROJECT_NAME]]</b></font></font><font face=\"Arial, sans-serif\"><font size=\"3\"> Team</font></font></p>\r\n <p style=\"margin-top: 0.07in; margin-bottom: 0.07in; line-height: 0.21in\">\r\n <a href=\"http://[[PROJECT_HOMEPAGE_URL]]\"><span style=\"color:#3366ff;\"><font face=\"Arial, sans-serif\"><font size=\"3\"><u><b>[[PROJECT_HOMEPAGE_URL]]</b></u></font></font></span></a></p>\r\n</div>\r\n<p>\r\n &nbsp;</p>\r\n', `modified` = '2011-08-05 01:42:31' WHERE `email_templates`.`email_template_name` ='OFFENSIVE COMMENT POSTED'");




mysql_close();
?>