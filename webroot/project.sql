CREATE DATABASE wsqITManage CHARSET=utf8;
CREATE TABLE wsqITManage.`tbUser` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `fdNickName` varchar(64) DEFAULT '' COMMENT '用户昵称',
    `fdAccount` varchar(64) NOT NULL COMMENT '账号邮箱',
    `fdPassword` varchar(255) NOT NULL COMMENT '账号密码',
    `fdUserTypeID` tinyint(4) NOT NULL DEFAULT 0 COMMENT '用户工种，对应tbUserType.id',
    `fdUpdate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '更新时间',
    PRIMARY KEY (`id`),
    UNIQUE INDEX `it_user_account` (`fdAction`)
) ENGINE INNODB DEFAULT CHARSET=utf8 COMMENT='用户表';
# alter table tbUser modify `fdPassword` varchar(255) NOT NULl COMMENT '帐号密码';

CREATE TABLE wsqITManage.`tbUserType` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `fdName` varchar(32) DEFAULT '' COMMENT '工作类型',
    `fdAuthority` tinyint(4) NOT NULL DEFAULT 0 COMMENT'用户权限表 0-无权限 1-管理员',
    PRIMARY KEY (`id`)
) ENGINE INNODB DEFAULT CHARSET=utf8 COMMENT='工作类型表';
INSERT INTO wsqITManage.tbUserType (fdName, fdAuthority) VALUES ('管理员', 1),('产品经理', 0),('开发人员', 0),('测试员', 0);

CREATE TABLE wsqITManage.`tbProject` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `fdName` varchar(64) NOT NULL DEFAULT '' COMMENT '项目名称',
    `fdDesc` blob COMMENT '项目描述',
    `fdLeader` int(11) NOT NULL DEFAULT 0 COMMENT '项目组长 对应tbUser.id',
    `fdTimeStart` date NOT NULL COMMENT '项目开始时间',
    `fdTimeEnd` date NOT NULL COMMENT '项目上线时间',
    `fdUsers` varchar(64) NOT NULL DEFAULT '' COMMENT '项目所属人员',
    `fdBuilder` int(11) NOT NULl DEFAULT 0 COMMENT '项目创建者 对应tbUser.id',
    `fdRemind` tinyint(4) NOT NULL DEFAULT 0 COMMENT '延迟提醒：0-不开启 1-开启',
    `fdCreate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
    PRIMARY KEY (`id`),
    INDEX `it_project_create` (`fdCreate`)
) ENGINE INNODB DEFAULT CHARSET=utf8 COMMENT='项目详情表';

CREATE TABLE wsqITManage.`tbAnnouncement` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `fdName` varchar(64) NOT NULL DEFAULT '' COMMENT '公告名称',
    `fdDesc` blob COMMENT '公告描述',
    `fdMarkdown` blob COMMENT '公告markdown格式',
    `fdOperatorID` int(11) NOT NULL DEFAULT 1 COMMENT '公告操作人 对应tbUser.id',
    `fdSent` tinyint(4) NOT NULL DEFAULT 0 COMMENT '公告发送：0,1',
    `fdBatch` tinyint(4) NOT NULL DEFAULT 0 COMMENT '群发邮件:0,1',
    `fdDeleted` tinyint(4) NOT NULL DEFAULT 0 COMMENT '删除公告：0,1',
    `fdCreate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
    `fdUpdate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '更新时间',
    PRIMARY KEY (`id`),
    INDEX `it_announcement_create` (`fdCreate`)
)  ENGINE INNODB DEFAULT CHARSET=utf8 COMMENT='工作公告表';
#alter table wsqITManage.tbAnnouncement change `fdEmail` `fdBatch` tinyint(4)

CREATE TABLE wsqITManage.`tbDuty` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `fdName` varchar(64) NOT NULL DEFAULT '' COMMENT '任务名称',
    `fdDesc` blob COMMENT '任务描述',
    `fdProjectID` int(11) NOT NULL DEFAULT 0 COMMENT '任务所属项目，对应tbProject.id',
    `fdPrority` tinyint(4) NOT NULL DEFAULT 0 COMMENT '任务优先级， 对应tbDutyPrority.id',
    `fdManager` int(11) NOT NULL DEFAULT 0 COMMENT '产品经理 对应tbUser.id',
    `fdDeveloper` int(11) NOT NULL DEFAULT 0 COMMENT '开发人员 对应tbUser.id',
    `fdTester`  int(11) NOT NULL DEFAULT 0 COMMENT '测试人员 对应tbUser.id',
    `fdBuilder` int(11) NOT NULl DEFAULT 0 COMMENT '任务创建者 对应tbUser.id',
    `fdStatusID` int(11) NOT NULL DEFAULT 0 COMMENT '任务当前状态,对应tbDutyStatus.id',
    `fdTypeID` int(11) NOT NULL DEFAULT 0 COMMENT '任务类型，对应tbDutyType.id',
    `fdCreate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
    `fdPlanTime` date NOT NULL COMMENT '任务计划开发完成时间',
    `fdCompleteTime` date NOT NULL DEFAULT 0 COMMENT '任务开发完成时间',
    `fdUpdate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '更新时间',
    PRIMARY KEY (`id`),
    INDEX `it_duty_plantime` (`fdPlanTime`),
    INDEX `it_duty_status` (`fdStatusID`),
    INDEX `it_duty_manager` (`fdManager`),
    INDEX `it_duty_developer` (`fdDeveloper`),
    INDEX `it_duty_tester` (`fdTester`),
    INDEX `it_duty_project` (`fdProjectID`),
    FULLTEXT INDEX `it_duty_name` (`fdName`)
)  ENGINE INNODB DEFAULT CHARSET=utf8 COMMENT='任务内容表';

CREATE TABLE wsqITManage.`tbDutyType` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `fdName` varchar(64) NOT NULL DEFAULT '' COMMENT '任务类型',
    PRIMARY KEY (`id`)
) ENGINE INNODB DEFAULT CHARSET=utf8 COMMENT='任务类型表';
INSERT INTO wsqITManage.tbDutyType (fdName) VALUES ('需求'),('开发'),('测试');

CREATE TABLE wsqITManage.`tbDutyStatus` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `fdName` varchar(64) NOT NULL DEFAULT '' COMMENT '任务状态',
    PRIMARY KEY (`id`)
) ENGINE INNODB DEFAULT CHARSET=utf8 COMMENT='任务状态表';
INSERT INTO wsqITManage.`tbDutyStatus` (fdName) VALUES ('待确认'),('需求'),('待开发'),('开发'),('待修复'),('待测试'),('测试'),('完成'),('取消');

CREATE TABLE wsqITManage.`tbDutyLog` (
    `fdDutyID` int(11) NOT NULL DEFAULT 0 COMMENT '对于tbDuty.id',
    `fdLog` blob COMMENT '任务日志内容',
    UNIQUE INDEX `it_duty_log` (`fdDutyID`),
    CONSTRAINT fk_duty_id FOREIGN KEY (`fdDutyID`) REFERENCES `tbDuty` (`id`)
) ENGINE INNODB DEFAULT CHARSET=utf8 COMMENT '任务日志表';

CREATE TABLE wsqITManage.`tbDutyPrority` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `fdName` varchar(32) NOT NULL DEFAULT '' COMMENT '任务优先级别',
    PRIMARY KEY (`id`)
) ENGINE INNODB DEFAULT CHARSET=utf8 COMMENT '任务优先级别表';
INSERT INTO wsqITManage.`tbDutyPrority` (fdName) VALUES ('轻微'),('稳定'),('警告'),('严重');

CREATE TABLE wsqITManage.`tbBugFix` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `fdDutyID` int(11) NOT NULL DEFAULT 0 COMMENT '对应tbDuty.id',
    `fdStatus` tinyint(4) NOT NULL DEFAULT 0 COMMENT '问题：0-未修复 1-修复',
    `fdDesc` varchar(64) NOT NULL DEFAULT '' COMMENT '问题描述',
    `fdCreate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
    PRIMARY KEY (`id`),
    INDEX `it_bugfix_duty` (`fdDutyID`)
) ENGINE INNODB DEFAULT CHARSET=utf8 COMMENT='问题描述表';

CREATE TABLE wsqITManage.`tbMenu` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `fdName` varchar(32) NOT NULL DEFAULT '' COMMENT '菜单名称',
    `fdModule` varchar(32) NOT NULL DEFAULT '' COMMENT '菜单模块',
    `fdController` varchar(32) NOT NULL DEFAULT '' COMMENT '菜单控制器',
    `fdAction` varchar(32) NOT NULL DEFAULT '' COMMENT '菜单动作',
    `fdParentID` int(11) NOT NULL DEFAULT 0 COMMENT '菜单上级，对应 tbMenu.id',
    `fdPlatform` tinyint(3) NOT NULL DEFAULT 0 COMMENT '菜单显示平台位置，0-后台 1-前台',
    `fdStatus` tinyint(4) NOT NULL DEFAULT 0 COMMENT '菜单开启状态 0-不开启 1-开启',
    `fdCreate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
    `fdUpdate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '更新时间',
    PRIMARY KEY (`id`),
    INDEX `it_menu_id_parentid` (`id`,`fdParentID`)
) ENGINE INNODB DEFAULT CHARSET=utf8 COMMENT='系统菜单表';

GRANT ALL PRIVILEGES ON wsqITManage.* TO it@localhost IDENTIFIED BY "it";