PHP Error[2]: include(EmailComponent.php): failed to open stream: No such file or directory
    in file /home/itmanage/ITManage/webroot/framework/YiiBase.php at line 432
#0 /home/itmanage/ITManage/webroot/framework/YiiBase.php(432): include()
#1 unknown(0): autoload()
#2 /home/itmanage/ITManage/webroot/backstage/protected/commands/SendEmailCommand.php(8): spl_autoload_call()
#3 unknown(0): SendEmailCommand->actionAnnouncementBatch()
#4 /home/itmanage/ITManage/webroot/framework/console/CConsoleCommand.php(172): ReflectionMethod->invokeArgs()
#5 /home/itmanage/ITManage/webroot/framework/console/CConsoleCommandRunner.php(71): SendEmailCommand->run()
#6 /home/itmanage/ITManage/webroot/framework/console/CConsoleApplication.php(92): CConsoleCommandRunner->run()
#7 /home/itmanage/ITManage/webroot/framework/base/CApplication.php(185): CConsoleApplication->processRequest()
#8 /home/itmanage/ITManage/webroot/framework/yiic.php(33): CConsoleApplication->run()
#9 /home/itmanage/ITManage/webroot/backstage/protected/yiic.php(7): require_once()
